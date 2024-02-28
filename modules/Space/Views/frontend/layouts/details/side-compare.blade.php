@if(Auth::check())
    <compare-aside class="sidebar">
      <div class="toggle">
        <a href="#" class="js-menu-toggle menu-toggle">
            <span class="sidebar_icon text-black">Compare</span>
        </a>
        </div>
        <div class="side-inner">
        <h3 class="title">Compare Properties</h3>
            <div class="compare-sidebar-inner pt-5">
                <div class="compare-list ps">
                    @if($side_row)
                        @foreach($side_row as $item)
                    <article class="property-list-simple post-3754 property type-property status-publish has-post-thumbnail hentry property_type-family-house property_location-new-york property_status-for-rent property_amenity-air-conditioning property_amenity-barbeque property_amenity-central-heating property_amenity-cleaning-service property_amenity-dining-room property_amenity-dryer property_amenity-gym property_amenity-laundry property_amenity-microwave property_amenity-outdoor-shower property_amenity-parking property_amenity-refrigerator property_amenity-sauna property_amenity-swimming-pool property_material-block property_material-brick property_material-rock py-2 pl-2">
                        <div class="flex-middle">
                            <div class="property-thumbnail-wrapper flex-middle justify-content-center p-relative">
                                <div class="image-thumbnail">
                                    <a class="property-image" href="">
                                        <div class="image-wrapper image-loaded">
                                            {!! get_image_tag($item->image_id,'medium',['class'=>'img-responsive']) !!}
                                        </div>
                                    </a>
                                </div>
                                <a
                                    href="{{route('space.remove_compareitem',['id'=>($item->id)])}}"
                                    class="btn-remove-property-compare-list btn-action-icon btn-action-sm"
                                    data-property_id="3754"
                                    data-nonce="7172a804ff"
                                >
                                    <i style="text-decoration:none !important">X</i>
                                </a>
                            </div>
                            <div class="property-information">
                                <h2 class="entry-title property-title">
                                    <a href="" rel="bookmark">{{$item->title}}</a>
                                </h2>
                                <div class="property-price">
                                    <span class="suffix">$</span>
                                    <span class="price-text">{{$item->price}}</span>
                                    <span class="suffix-text additional-text">/mo</span>
                                </div>
                                <div class="property-metas">
                                    <div class="property-meta with-icon">
                                        <span class="value-suffix">
                                            {{$item->bed}}				Beds
                                        </span>
                                    </div>
                                    <div class="property-meta with-icon">
                                        <span class="value-suffix">
                                            {{$item->bathroom}}				Baths
                                        </span>
                                    </div>
                                    <div class="property-meta with-icon">
                                        <span class="value-suffix">
                                            {{$item->square}}				sqft
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    @endif
                    <!-- #post-## -->
                              <!-- #post-## -->
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                    </div>
                </div>
                <div class="compare-actions">
                    <div class="row ">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <a href="{{route('space.compare_properties',['id'=>(Auth::id())])}}" class="btn btn-theme btn-block btn-sm">Compare</a>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <a href="{{route('space.remove_allcompare',['id'=>(Auth::id())])}}" class="btn btn-danger btn-block btn-sm" data-nonce="7172a804ff">Clear</a>
                        </div>
                    </div>
                </div>
            </div>
        
      </div>
      
</compare-aside>
    @endif