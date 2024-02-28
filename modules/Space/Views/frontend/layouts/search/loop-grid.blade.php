@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp
<div class="item-loop {{$wrap_class ?? ''}}">
    @if($row->is_featured == "1")
        <div class="featured">
            {{__("Featured")}}
        </div>
    @endif
        <div class="for_rent">
            @if ($row->search_class == '0') {{__("For Rent")}} @endif
            @if ($row->search_class == '1') {{__("For Sale")}} @endif
            @if ($row->search_class == '2') {{__("Sold")}} @endif
        </div>
    <div class="thumb-image ">
        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
            @if($row->image_url)
                @if(!empty($disable_lazyload))
                    <img src="{{$row->image_url}}" class="img-responsive" alt="">
                @else
                    {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]) !!}
                @endif
            @endif
        </a>
        <div class="price-wrapper">
            <div class="price">
                <span class="onsale">{{ $row->display_sale_price }}</span>
            </div>
        </div>
    </div>
    <div class="item-title">
        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
            @if($row->is_instant)
                <i class="fa fa-bolt d-none"></i>
            @endif
                {!! clean($translation->title) !!}
        </a>
        
            <div class="sale_info">
                <img src="{{asset('uploads\0000\1\2023\01\06\5.jpg')}}" width='50' height='50' style='border-radius:50%;border:2px solid white;'>
            </div>
        
    </div>
    <div class="location">
        @if(!empty($row->location->name))
            @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
            {{$location->name ?? ''}}
        @endif
    </div>
    @if(setting_item('space_enable_review'))
    <?php
    $reviewData = $row->getScoreReview();
    $score_total = $reviewData['score_total'];
    ?>

    @endif
    <div class="amenities" style='border:none;'>

        @if($row->bed)
            <span class="amenity bed" data-toggle="tooltip" title="{{__("No. Bed")}}">
                <i class="input-icon field-icon icofont-hotel"></i> {{$row->bed}}
            </span>
        @endif
        @if($row->bathroom)
            <span class="amenity bath" data-toggle="tooltip" title="{{__("No. Bathroom")}}" >
                <i class="input-icon field-icon icofont-bathtub"></i> {{$row->bathroom}}
            </span>
        @endif
        @if($row->garage)
            <span class="amenity total" data-toggle="tooltip"  title="{{ __("No. People") }}">
                <i class="input-icon field-icon icofont-car  "></i> {{$row->garage}}
            </span>
        @endif
        @if($row->square)
            <span class="amenity size" data-toggle="tooltip" title="{{__("Square")}}" >
                <i class="input-icon field-icon icofont-ruler-compass-alt"></i> {!! size_unit_format($row->square) !!}
            </span>
        @endif
    </div>
    <div class='prices'>
        <div class="price-wrapper">
            <div class="price">
                <span class="text-price">
                    {{ $row->display_price }}
                    @if($row->getBookingType()=="by_day")
                        <span class="unit">{{__("/mo")}}</span>
                    @else
                        <span class="unit">{{__("")}}</span>
                    @endif
                </span>
            </div>
        </div>
            <div class='g-theme d-flex align-items-center'>
                <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}" class="service-extend" style='color:grey'>
                    <i class="fa fa-expand" style='padding:0px 5px 0px 5px'></i>
                </a>
                <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}" style='color:grey'>
                    <i class="fa fa-heart" style='padding:0 5px 0 5px'></i>
                </div>
                <div class="service-compare {{$row->isCompare()}}" data-id="{{$row->id}}" data-type="{{$row->type}}" style='color:grey'>
                    <i class="fa fa-plus" style='padding:0 5px 0 5px'></i>
                </div>    
            </div> 
    </div>
</div>
