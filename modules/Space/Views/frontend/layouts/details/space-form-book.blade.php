<?php
//if(!setting_item('tour_enable_inbox')) return;
$vendor = $row->author;
?>
<div class="bravo_single_book_wrap">
    <div class="bravo_single_book">
        <div id="bravo_space_book_app" v-cloak>
            @if($row->discount_percent)
                <div class="tour-sale-box">
                    <span class="sale_class box_sale sale_small">{{$row->discount_percent}}</span>
                </div>
            @endif
            <div class="form-head">
                <!-- <div class="price">
                    <span class="label">
                        {{__("from")}}
                    </span>
                    <span class="value">
                        <span class="onsale">{{ $row->display_sale_price }}</span>
                        <span class="text-lg">{{ $row->display_price }}</span>
                    </span>
                </div> -->

                @if(!empty($vendor->id))
                    <div class="media">
                        <div class="media-left">
                            <a href="{{route('user.profile',['id'=>$vendor->user_name ?? $vendor->id])}}"  >
                                <img src="{{asset($vendor->getAvatarUrl())}}" class='detail_avatar'> 
                            </a>
                        </div>
                        <div class="media-body" style="padding-left: 30px">
                            <h4 class="media-heading"><a class="author-link" href="{{route('user.profile',['id'=>$vendor->user_name ?? $vendor->id])}}" target="_blank" style='text-decoration:none;'>{{$vendor->getDisplayName()}}</a>
                                @if($vendor->is_verified)
                                    <img data-toggle="tooltip" data-placement="top" src="{{asset('icon/ico-vefified-1.svg')}}" title="{{__("Verified")}}" alt="{{__("Verified")}}">
                                @else
                                    <img data-toggle="tooltip" data-placement="top" src="{{asset('icon/ico-not-vefified-1.svg')}}" title="{{__("Not verified")}}" alt="{{__("Verified")}}">
                                @endif
                            </h4>
                            <p style="padding-left: 20px; margin-bottom:5px">{{$vendor->phone}}</p>
                            <p style="padding-left: 20px;">{{$vendor->email}}</p>

                        </div>
                    </div>
                @endif
            </div>
            <div class='contact_container'>
                <div class='row'>
                    <input type="hidden" name="service_id" value="{{$row->id}}">
                    <input type="hidden" name="service_type" value="{{$service_type ?? ''}}">
                    <div class="col-lg-12 col-md-12">
                        <div class="login_form" style='margin-bottom:25px;'>
                            <input type="text" name="enquiry_name" autocomplete="off" required />
                            <label for="enquiry_name" class="label-name">
                                <span class="content-name">
                                    Name
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="login_form" style='margin-bottom:25px;'>
                            <input type="text" name="enquiry_email" autocomplete="off" required />
                            <label for="enquiry_email" class="label-name">
                                <span class="content-name">
                                    Email
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="login_form" style='margin-bottom:25px;'>
                            <input type="text" name="enquiry_phone" autocomplete="off" required />
                            <label for="enquiry_phone" class="label-name">
                                <span class="content-name">
                                    Phone
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="login_textarea" style='margin-bottom:25px;'>
                            <textarea name="enquiry_note"  autocomplete="off" required rows='4'></textarea>
                            <label for="enquiry_note" class="label-name">
                                <span class="content-textarea">
                                    Message
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="message_box"></div>
                </div>
            </div>
            <div class='row d-flex justify-content-center pb-3'>
                <button type="button" class="btn btn-primary btn-submit-enquiry">{{__("Contact Property")}}
                <i class="fa icon-loading fa-spinner fa-spin fa-fw" style="display: none"></i>
            </div>
        </div>
    </div>
</div>
<div class="detail_carousel" style='padding:20px; margin-top:30px'>
    <div class="item-title">
        <h5 style='padding-bottom:20px'>{{__("Latest Properties")}}</h5>
        
    </div> 
    <div class="bravo-form-search-all carousel bravo-form-search-slider">
        <div class="effect" >
            <div class="owl-carousel property-item">
                @if(!empty($row->gallery))

                @foreach($row->getGallery() as $key=>$item)
                    <div class="item carousel_img property-image">
                        <img src="{{$item['large']}}" class=" img-responsive" alt="" style=''>
                        <div class='sale_price'>
                            <a  href="#" style='color:white; font-size:20px;text-decoration:none;'>
                                @if($row->is_instant)
                                    <i class="fa fa-bolt d-none"></i>
                                @endif
                                    {{$row->title}}
                            </a>
                            <div class="text-price">
                                ${{ $row->price }}/mo
    
                            </div>  
                        </div>
                    </div>

                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>