
<div class='container'>
        <p class='banner_subtitle' >
            <span><a href='/'>Home </a></span> / <span><a href='{{url("/property")}}'> Properties</a></span> / <span style='color:#10174B'>{!! clean($translation->title) !!}</span>
        </p>
</div>

<div class="g-header  col-sm-12 col-lg-12">

    <div class="left">
        <h1>{!! clean($translation->title) !!}</h1>
        <div class="d-flex justify-content-start">
            @if($translation->address)
                <p class="address" style='color:#5e6d77'><i class="fa fa-map-marker" style='color:#5e6d77'></i>
                    {{$translation->address}}
                </p>
            @endif
            @if($row->rera_id && $row->is_rera)
                <p style='color:#5e6d77' class="px-5"><i class="fa  fa-check" style='color:#5e6d77'></i> {{$row->rera_id}}</p>
            @endif
        </div>
    </div>

    <div class="right">
        <div class="flex-middle list-action">
            <div class="property-action-detail ali-right">                
                <a
                    href="javascript:void(0)"
                    class="btn-add-property-favorite {{$row->isWishList()}}"
                    data-id="{{$row->id}}"
                    data-type="{{$row->type}}"
                    data-toggle="tooltip"
                    title=""
                    data-original-title="Add Favorite"
                >
                    <i class="icon-heart"></i>
                    <span>Save</span>
                </a>

                <a
                    href="javascript:void(0)"
                    class="btn-add-property-compare {{$row->isCompare()}}"
                    data-property_id="{{$row->id}}"
                    data-id="{{$row->id}}"
                    data-type="{{$row->type}}"
                    data-nonce="dc83860bd4"
                    data-toggle="tooltip"
                    title=""
                    data-original-title="Add Compare"
                >
                    <i class="icon-plus"></i>
                    <span>Compare</span>
                </a>

                <a
                    href="{{route('space.download_excel',['id'=>($row->id)])}}"
                    class="btn-print-property"
                    data-property_id="188"
                    data-nonce="af08c258e5"
                    data-toggle="tooltip"
                    title=""
                    data-original-title="Download"
                >
                    <i class="icon-cloud-download"></i>
                    <span>Download</span>
                </a>
            </div>
        </div>

    </div>
</div>
<div id="wp-realestate-popup-message" style="display:none"></div>
<div class="g-header  col-sm-12 col-lg-12 d-flex justify-content-between">
        <div class="g-space-feature ">
            <div class="row ">
                @if(!empty($row->bed))
                    <div class="col-xs-4 col-lg-2 col-md-4 px-5">
                        <div class="item">
                            <div class="icon">
                                <i class="icofont-hotel" style='color:#5e6d77'></i>
                            </div>
                            <div class="info">
                                <h4 class="name" style='color:#5e6d77'>{{__("No. Bed")}}</h4>
                                <p class="value">
                                    {{$row->bed}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                @if($row->bathroom)
                    <div class="col-xs-4 col-lg-2 col-md-4 px-5">
                        <div class="item">
                            <div class="icon">
                                <i class="icofont-bathtub" style='color:#5e6d77'></i>
                            </div>
                            <div class="info">
                                <h4 class="name" style='color:#5e6d77'>{{__("No. Bathroom")}}</h4>
                                <p class="value">
                                    {{$row->bathroom}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                @if($row->square)
                    <div class="col-xs-4 col-lg-2 col-md-4 px-5">
                        <div class="item">
                            <div class="icon">
                                <i class="icofont-ruler-compass-alt" style='color:#5e6d77'></i>
                            </div>
                            <div class="info">
                                <h4 class="name" style='color:#5e6d77'>{{__("Square")}}</h4>
                                <p class="value">
                                    {!! size_unit_format($row->square) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($row->location->name))
                        @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
                    <div class="col-xs-4 col-lg-2 col-md-4 px-5">
                        <div class="item">
                            <div class="icon">
                                <i class="icofont-island-alt" style='color:#5e6d77'></i>
                            </div>
                            <div class="info">
                                <h4 class="name" style='color:#5e6d77'>{{__("Location")}}</h4>
                                <p class="value">
                                    {{$location->name ?? ''}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                @if($row->expiredate)
                    <div class="col-xs-4 col-lg-2 col-md-4 px-5">
                        <div class="item">
                            <div class="icon">
                                <i class="icofont-calendar" style='color:#5e6d77'></i>
                            </div>
                            <div class="info">
                                <h4 class="name" style='color:#5e6d77'>{{__("Date")}}</h4>
                                <p class="value">
                                    
                                    <?php echo date_format(date_create($row->expiredate),'Y/m/d'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                @if($row->is_rera)
                    <div class="col-xs-4 col-lg-2 col-md-4 d-flex align-items-center px-5">
                        <div class="item ">
                            <div class="icon  ">
                                <img src="{{asset('icon/marked.png')}}" class='detail_avatar' >
                            </div>

                        </div>
                    </div>
                @endif
            </div>
            
        </div>

        <div class='g-space-feature'>
                <div class="item">
                <span >        
                    <h2> {{ $row->display_price }}</h2>
                </span>
                <span>/ mo</span>
                </div>
        </div>
</div>



<div class='content'>
    <div class="property-detail-gallery">
        <div class="row row-10 list-gallery-property-v1">
            <div class="col-sm-7 c1 col-xs-12">
                <div class="gallery-property-main-detail">
                    <a  href="{{$row->getBannerImageUrlAttribute('full')}}" data-elementor-lightbox-slideshow="houzing-gallery" class="p-popup-image">
                        <div class="image-wrapper image-loaded">
                            <img
                                width="912"
                                height="548"
                                src="{{$row->getBannerImageUrlAttribute('full')}}"
                                class="attachment-houzing-gallery-large size-houzing-gallery-large unveil-image"
                                alt=""
                                data-xblocker="passed"
                                style="visibility: visible;"
                            >

                        </div>
                    </a>
                    <div class="gallery-metas flex">
                        <span class="featured-property ">Featured</span>
                        <div class="ali-right">
                            <a class="status-property-label" href="#" style="background-color:#10174B;text-decoration:none;">For Rent</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 c2 col-xs-12">
                <div class="row row-10">
                    @if(!empty($row->gallery))
                        @foreach($row->getGallery() as $key=>$item)
                            @if($item['large'])
                                <div class="col-sm-4 col-xs-4 ">
                                    <a href="{{$item['large']}}"  class="p-popup-image " data-elementor-lightbox-slideshow="houzing-gallery" class="p-popup-image ">
                                        <div class="image-wrapper image-loaded" >
                                            <img
                                                width="400"
                                                height="400"
                                                src="{{$item['large']}}"
                                                class="attachment-houzing-gallery-second size-houzing-gallery-second unveil-image"
                                                alt=""
                                                sizes="(max-width: 400px) 100vw, 400px"
                                            >
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach 
                    @endif   
                </div>
            </div>   
        </div>
    </div>
</div>


