@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp
<div class="item-loop {{$wrap_class ?? ''}}">
    @if($row->is_featured == "1")
        <div class="featured">
            {{__("Featured")}}
        </div>
        <div class="for_rent">
            {{__("For Rent")}}
        </div>
    @endif
    <div class="thumb-image ">
        <a @if(!empty($blank)) target="_blank" @endif href="/">
            @if($row->image_url)
                @if(!empty($disable_lazyload))
                    <img src="{{$row->image_url}}" class="img-responsive" alt="">
                @else
                    {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$translation->title]) !!}
                @endif
            @endif
        </a>


    </div>
    <div class="item-title">
        <a @if(!empty($blank)) target="_blank" @endif href="/">
            @if($row->is_instant)
                <i class="fa fa-bolt d-none"></i>
            @endif
                {!! clean($translation->title) !!}
        </a>
        
            <div class="sale_info">
            <img src="uploads\0000\1\2023\01\06\5.jpg" width='48' height='48' style='border-radius:50%;border:2px solid white;'>

            </div>
        
    </div>
    <div class="location">
        @if(!empty($row->location->name))
            @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
            {{$location->name ?? ''}}
        @endif
    </div>
    @if(setting_item('hotel_enable_review'))
    <?php
    $reviewData = $row->getScoreReview();
    $score_total = $reviewData['score_total'];
    ?>

    @endif
    
    <div class="amenities" >
            <span class="amenity bed" data-toggle="tooltip" title="{{__("No. Bed")}}">
                <i class="input-icon field-icon icofont-hotel"></i> 3
            </span>
        
            <span class="amenity bath" data-toggle="tooltip" title="{{__("No. Bathroom")}}" >
                <i class="input-icon field-icon icofont-bathtub"></i> 1
            </span>
        
            <span class="amenity total" data-toggle="tooltip"  title="{{ __("No. People") }}">
                <i class="input-icon field-icon icofont-car  "></i> 1
            </span>
       
            <span class="amenity size" data-toggle="tooltip" title="{{__("Square")}}" >
                <i class="input-icon field-icon icofont-ruler-compass-alt"></i> 186
            </span>
        
    </div>


    <div class="info" style='border-top:1px solid #ddd; padding-top:10px;'>
        <div class="g-price d-flex justify-content-between">
            <div class="price">
                <span class="text-price">{{ $row->display_price }} <span class="unit">{{__("/mo")}}</span></span>
            </div>
            <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}" style='color:grey'>
            <i class="fa fa-expand" style='padding:0px 3px 0px 3px'></i>
            <i class="icon-heart" style='padding:0 3px 0 3px'></i>
            <i class="icon-plus" style='padding:0 3px 0 3px'></i>
        </div>
        </div>
    </div>
</div>
