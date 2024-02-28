@include('Layout::parts.header_detail')

<div style="background-attachment:fixed;background-image:linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('{{asset("/uploads/member_banner.jpg")}}') !important;    background-repeat: no-repeat;background-size: 100% auto; background-position: center top; height:300px;position:relative" >
        <div class="sub-heading " style='position:absolute; left:0%; right:0%; top:50%;text-align: center;color:white;'><h1>Welcome Members</h1></div>
    </div>

<div class='container d-flex justify-content-center'>
    
    
    <div class='container pt-5 pb-5'>
        <h1 class="pb-3">All serveices({{count($rows)-2}})<h1>
        <div class="row">
            @foreach($rows as $item)
                @if($item->id != 2 && $item->id != 3)
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="dashboard-stat blue user-card">
                            <div class="visual">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    {{$item->name}}
                                </div>
                            </div>

                            <a class="more" @if ($item->id == 1) href="{{url('/user/vendors')}}" @else href="{{url('/user/other-vendors')}}" @endif>
                            View more <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    </div>

</div>
