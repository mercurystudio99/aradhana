<?php
namespace Modules\User\Controllers;
use App\User;
use App\Notifications\AdminChannelServices;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Matrix\Exception;
use Modules\Boat\Models\Boat;
use Modules\Booking\Models\Service;
use Modules\Car\Models\Car;
use Modules\Event\Models\Event;
use Modules\Flight\Models\Flight;
use Modules\FrontendController;
use Modules\Hotel\Models\Hotel;
use Modules\Space\Models\Space;
use Modules\Tour\Models\Tour;
use Modules\User\Emails\UserPermanentlyDelete;
use Modules\User\Events\NewVendorRegistered;
use Modules\User\Events\SendMailUserRegistered;
use Modules\User\Events\UserSubscriberSubmit;
use Modules\User\Models\Subscriber;
// use Modules\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Modules\Vendor\Models\VendorRequest;
use Validator;
use Modules\Booking\Models\Booking;
use App\Helpers\ReCaptchaEngine;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\Booking\Models\Enquiry;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use DB;
use Modules\Page\Models\Page;
use Modules\News\Models\NewsCategory;
use Modules\News\Models\Tag;
use Modules\News\Models\News;
class UserController extends FrontendController
{
    use AuthenticatesUsers;

    protected $enquiryClass;

    public function __construct()
    {
        $this->userClass = User::class;
        $this->enquiryClass = Enquiry::class;
        parent::__construct();
    }

    public function dashboard(Request $request)
    {
        $this->checkPermission('dashboard_vendor_access');
        $user_id = Auth::id();
        $data = [
            'cards_report'       => Booking::getTopCardsReportForVendor($user_id),
            'earning_chart_data' => Booking::getEarningChartDataForVendor(strtotime('monday this week'), time(), $user_id),
            'page_title'         => __("Vendor Dashboard"),
            'breadcrumbs'        => [
                [
                    'name'  => __('Dashboard'),
                    'class' => 'active'
                ]
            ]
        ];
        return view('User::frontend.dashboard', $data);
    }
    public function vendors(Request $request){
            $vendor_name=$request->vendor_name;
            $vendor_email=$request->vendor_email;
            $vendor_location=$request->vendor_location;
            $list = User::join('core_model_has_roles as cmhr','cmhr.model_id','users.id')
            ->leftjoin('media_files','users.avatar_id','media_files.id')
            ->select('users.*','cmhr.role_id','media_files.file_path')
            ->where('cmhr.role_id','1');
            if($vendor_name != ""){
                $list=$list->where('name' , 'like', '%'.$vendor_name .'%' );
            }
            if($vendor_email != ""){
                $list=$list->where('email' , 'like', '%'.$vendor_email .'%' );
            }
            if($vendor_location != ""){
                $list=$list->where('city' , 'like', '%'.$vendor_loaction .'%' );
            }
            if($request->query('orderby')=='from_new'){
                $list=$list->orderby('users.created_at','asc');
                
            }else if($request->query('orderby')=='from_old'){
                $list=$list->orderby('users.created_at','desc');
                
            }else if($request->query('orderby')=='from_name'){
                $list=$list->orderby('users.name','asc');
               
            }else{

                $list=$list->orderby('users.id','asc');
                
            }
            $list=$list->paginate(10);
            $properties=Space::where('default_state','1')->get();
        $data = [
            'rows'          => $list,
            'query'         => $request->query('orderby'),
            'properties'    => $properties,
            'vendor_email'  => $vendor_email,
            'vendor_name'  => $vendor_name,
            'vendor_role'=>'1',

        ];
        return view('User::frontend.search', $data);
    }
    public function customers(Request $request){
        $vendor_name=$request->vendor_name;
        $vendor_email=$request->vendor_email;
        $vendor_location=$request->vendor_location;
        $list = User::join('core_model_has_roles as cmhr','cmhr.model_id','users.id')
        ->leftjoin('media_files','users.avatar_id','media_files.id')
        ->select('users.*','cmhr.role_id','media_files.file_path')
        ->where('cmhr.role_id','4');
        if($vendor_name != ""){
            $list=$list->where('name' , 'like', '%'.$vendor_name .'%' );
        }
        if($vendor_email != ""){
            $list=$list->where('email' , 'like', '%'.$vendor_email .'%' );
        }
        if($vendor_location != ""){
            $list=$list->where('city' , 'like', '%'.$vendor_loaction .'%' );
        }
        if($request->query('orderby')=='from_new'){
            $list=$list->orderby('users.created_at','asc');
            
        }else if($request->query('orderby')=='from_old'){
            $list=$list->orderby('users.created_at','desc');
            
        }else if($request->query('orderby')=='from_name'){
            $list=$list->orderby('users.name','asc');
           
        }else{

            $list=$list->orderby('users.id','asc');
            
        }
        $list=$list->paginate(10);
        $properties=Space::where('default_state','1')->get();
    $data = [
        'rows'          => $list,
        'query'         => $request->query('orderby'),
        'properties'    => $properties,
        'vendor_email'  => $vendor_email,
        'vendor_name'  => $vendor_name,
        'vendor_role'=>'4',

    ];
    return view('User::frontend.search_customer', $data);
}
    public function reloadChart(Request $request)
    {
        $chart = $request->input('chart');
        $user_id = Auth::id();
        switch ($chart) {
            case "earning":
                $from = $request->input('from');
                $to = $request->input('to');
                return $this->sendSuccess([
                    'data' => Booking::getEarningChartDataForVendor(strtotime($from), strtotime($to), $user_id)
                ]);
                break;
        }
    }
    public function detail(Request $request)
    {
        $id=$request->id;
        $row = User::join('core_model_has_roles as cmhr','cmhr.model_id','users.id')
        ->select('users.*','cmhr.role_id')
        ->where('users.id', $id)
        ->first();
        if ( empty($row)) {
            return redirect('/');
        }
        $property_row=Space::where('create_user',$id)->get();
        $data = [
            'row'          => $row,
            'property_row' =>$property_row
        ];
        return view('User::frontend.detail',$data);
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        $data = [
            'dataUser'         => $user,
            'query'       => $request->query('_ajax'),
            'breadcrumbs'      => [
                [
                    'name'  => __('Setting'),
                    'class' => 'active'
                ]
            ],
            'is_vendor_access' => $this->hasPermission('dashboard_vendor_access')
        ];
        return view('User::frontend.profile', $data);
    }
    public function members(){
        $user = Auth::user();
        if($user->role_id==2){
            return redirect('/');
        }else{
            $model=DB::select('select * from core_roles');
            $data = [
                'rows'          => $model,        
            ];
            return view('User::frontend.members',$data);
        }

    }
    public function profileUpdate(Request $request){
        $user = Auth::user();
        $messages = [
            'user_name.required'      => __('The User name field is required.'),
        ];
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'email'      => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id)
            ],
            'user_name'=> [
                'required',
                'max:255',
                'min:4',
                'string',
                'alpha_dash',
                Rule::unique('users')->ignore($user->id)
            ],
            'phone'       => [
                'required',
                Rule::unique('users')->ignore($user->id)
            ],
        ],$messages);
        $input = $request->except('bio');
        $user->fill($input);
        $user->bio = clean($request->input('bio'));
        $user->birthday = date("Y-m-d", strtotime($user->birthday));
        $user->user_name = Str::slug( $request->input('user_name') ,"_");
        $user->save();
        return redirect()->back()->with('success', __('Update successfully'));
    }

    public function changePassword(Request $request)
    {
        $data = [
            'breadcrumbs' => [
                [
                    'name' => __('Setting'),
                    'url'  => route("user.profile.index")
                ],
                [
                    'name'  => __('Change Password'),
                    'class' => 'active'
                ]
            ],
            'page_title'  => __("Change Password"),
        ];
        return view('User::frontend.changePassword', $data);
    }

    public function changePasswordUpdate(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", __("Your current password does not matches with the password you provided. Please try again."));
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", __("New Password cannot be same as your current password. Please choose a different password."));
        }
        $request->validate([
            'current-password' => 'required',
            'new-password'     => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with('success', __('Password changed successfully !'));
    }

    public function bookingHistory(Request $request)
    {
        $user_id = Auth::id();
        $data = [
            'bookings'    => Booking::getBookingHistory($request->input('status'), $user_id),
            'statues'     => config('booking.statuses'),
            'breadcrumbs' => [
                [
                    'name'  => __('Booking History'),
                    'class' => 'active'
                ]
            ],
            'page_title'  => __("Booking History"),
        ];
        return view('User::frontend.bookingHistory', $data);
    }

    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255'
        ]);
        $check = Subscriber::withTrashed()->where('email', $request->input('email'))->first();
        if ($check) {
            if ($check->trashed()) {
                $check->restore();
                return $this->sendSuccess([], __('Thank you for subscribing'));
            }
            return $this->sendError(__('You are already subscribed'));
        } else {
            $a = new Subscriber();
            $a->email = $request->input('email');
            $a->first_name = $request->input('first_name');
            $a->last_name = $request->input('last_name');
            $a->save();

            event(new UserSubscriberSubmit($a));

            return $this->sendSuccess([], __('Thank you for subscribing'));
        }
    }

    public function upgradeVendor(Request $request){
        $user = Auth::user();
        $vendorRequest = VendorRequest::query()->where("user_id",$user->id)->where("status","pending")->first();
        if(!empty($vendorRequest)){
            return redirect()->back()->with('warning', __('You have just done the become vendor request, please wait for the Admin\'s approved'));
        }
        // check vendor auto approved
        $vendorAutoApproved = setting_item('vendor_auto_approved');
         $dataVendor['role_request'] = setting_item('vendor_role');
        if ($vendorAutoApproved) {
            if ($dataVendor['role_request']) {
                $user->assignRole($dataVendor['role_request']);
            }
            $dataVendor['status'] = 'approved';
            $dataVendor['approved_time'] = now();
        } else {
            $dataVendor['status'] = 'pending';
        }
        $vendorRequestData = $user->vendorRequest()->save(new VendorRequest($dataVendor));
        try {
            event(new NewVendorRegistered($user, $vendorRequestData));
        } catch (Exception $exception) {
            Log::warning("NewVendorRegistered: " . $exception->getMessage());
        }
        return redirect()->back()->with('success', __('Request vendor success!'));
    }

    public function enquiryReport(Request $request){
        $this->checkPermission('enquiry_view');
        $user_id = Auth::id();
        $rows = $this->enquiryClass::where("vendor_id",$user_id)
            ->whereIn('object_model',array_keys(get_bookable_services()))
            ->orderBy('id', 'desc');
        $data = [
            'rows'        => $rows->paginate(5),
            'statues'     => $this->enquiryClass::$enquiryStatus,
            'has_permission_enquiry_update' => $this->hasPermission('enquiry_update'),
            'breadcrumbs' => [
                [
                    'name'  => __('Enquiry Report'),
                    'class' => 'active'
                ],
            ],
            'page_title'  => __("Enquiry Report"),
        ];
        return view('User::frontend.enquiryReport', $data);
    }

    public function enquiryReportBulkEdit($enquiry_id, Request $request)
    {
        $status = $request->input('status');
        if (!empty( $this->hasPermission('enquiry_update') ) and !empty($status) and !empty($enquiry_id)) {
            $query = $this->enquiryClass::where("id", $enquiry_id);
            $query->where("vendor_id", Auth::id());
            $item = $query->first();
            if (!empty($item)) {
                $item->status = $status;
                $item->save();
                return redirect()->back()->with('success', __('Update success'));
            }
            return redirect()->back()->with('error', __('Enquiry not found!'));
        }
        return redirect()->back()->with('error', __('Update fail!'));
    }


    public function permanentlyDelete(Request $request){
        if(!empty(setting_item('user_enable_permanently_delete')))
        {
            $user = Auth::user();
            \DB::beginTransaction();
            try {
                Service::where('create_user',$user->id)->delete();
                Tour::where('create_user',$user->id)->delete();
                Car::where('create_user',$user->id)->delete();
                Space::where('create_user',$user->id)->delete();
                Hotel::where('create_user',$user->id)->delete();
                Event::where('create_user',$user->id)->delete();
                Boat::where('create_user',$user->id)->delete();
                Flight::where('create_user',$user->id)->delete();
                $user->sendEmailPermanentlyDelete();
                $user->delete();
                \DB::commit();
                Auth::logout();
                return redirect(route('home'));
            }catch (\Exception $exception){
                \DB::rollBack();
            }
        }
        return back()->with('error',__('Error. You can\'t permanently delete'));

    }


}
