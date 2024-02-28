
<div class="bravo_filter">
    <form action="{{route("vender.search") }}" class="bravo_form_filter">
        <div class="form bravo_form" method="get" style='box-shadow: 0 0 0 0;'>
            <label style='font-size:20px; font-weight:600;float:left !important; padding-top:30px; '>Find Vendor</label>
            <div class="g-field-search">
                <div class="form-group" style='border-bottom: 1px solid #e6e9ec; margin-top:30px; margin-bottom:20px;'>   
                    <div class="input-search">
                        <input type="text" name="vendor_name" class="form-control"  placeholder="{{__("Enter Vendor Name")}}" value="{{ request()->input("vendor_name") }}">
                    </div>
                </div>
                <div class="form-group" style='border-bottom: 1px solid #e6e9ec; margin-top:30px; margin-bottom:20px;'>   
                    <div class="input-search">
                        <input type="text" name="vendor_email" class="form-control"  placeholder="{{__("Vendor Email")}}" value="{{ request()->input("vendor_email") }}">
                    </div>
                </div>     
                <div class="form-group" style='border-bottom: 1px solid #e6e9ec; margin-top:30px; margin-bottom:20px;'>   
                    <div class="input-search">
                        <input type="text" name="vendor_location" class="form-control"  placeholder="{{__("Enter Location")}}" value="{{ request()->input("vendor_location") }}">
                    </div>
                </div>
            </div>
        </div>
        <div class='d-flex justify-content-center' style='padding-top:10px; padding-bottom:10px;'>
            <button type="submit" class="btn btn-primary-custom btn-search" style='text-center'><i class="field-icon fa icofont-search"></i> {{__("Search")}}</button>
        </div>
    </form>
</div>
<div class="bravo_filter" style='padding:20px;'>
    <div class="item-title">
        <h5 style='padding-bottom:20px'>{{__("Latest Properties")}}</h5>
    </div> 
    <div class="bravo-form-search-all carousel bravo-form-search-slider">
        <div class="effect d-flex justify-content-center" >
            <div class="owl-carousel property-item d-flex justify-content-center">
                @foreach($properties as $row)
                    @if(!empty($row->banner_image_id))
                    @php $image_url = get_file_url($row->banner_image_id, 'thumb'); @endphp
                    <div class="item carousel_img property-image">
                        <img src="{{$row->image_url}}" class=" img-responsive" alt="" style='max-height:200px;'>
                        <div class='sale_price'>
                            <div class="text-price">
                                {{ $row->display_price }}
                                @if($row->getBookingType()=="by_day")
                                    <span class="unit">{{__("/mo")}}</span>
                                @else
                                    <span class="unit">{{__("")}}</span>
                                @endif
                            </div>  
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>