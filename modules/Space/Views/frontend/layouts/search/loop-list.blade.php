@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp

<div class="item-loop-list-space {{$wrap_class ?? ''}}">
    @if($row->is_featured == "1")
        <div class="featured">
            {{__("Featured")}}
        </div>

    @endif
    <div class="thumb-image">
        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
            @if($row->image_url)
                @if(!empty($disable_lazyload))
                    <img src="{{$row->image_url}}" class="img-responsive" alt="">
                @else
                    {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$translation->title]) !!}
                @endif
            @endif
        </a>
        <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
            <i class="fa fa-heart"></i>
        </div>
    </div>
    <div class="g-info" style='border-bottom:1px solid #E6E9EC; margin-bottom:50px'>

        <div class="item-title">
            <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}">
                @if($row->is_instant)
                    <i class="fa fa-bolt d-none"></i>
                @endif
                    {!! clean($translation->title) !!}
            </a>
        </div>

        <div >
            @if(!empty($row->location->name))
                @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
                
                {{$location->name ?? ''}}
            @endif
        </div>
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
    </div>
    <div class="g-rest" style='border-bottom:1px solid #E6E9EC; margin-bottom:50px'></div>
    <div class="g-rate-price">

        <div class="g-price">
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
                <i class="fa fa-icon" style='padding:0 5px 0 5px'></i>
            </div>
            <div class="service-compare {{$row->isCompare()}}" data-id="{{$row->id}}" data-type="{{$row->type}}" style='color:grey'>
                <i class="fa fa-plus" style='padding:0 5px 0 5px'></i>
            </div>    
        </div>
    </div>
</div>
