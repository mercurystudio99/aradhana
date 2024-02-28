<div class="agent-detail-tabs detail-tabs-member">
    <ul role="tablist" class="nav nav-tabs nav-member">
        <li class="nav-item">
            <a href="#tab-agent-overviews" class="nav-link" id="tab-agent-overview" role="tab" aria-controls="tab-agent-overviews" aria-selected="false">Overview</a>
        </li>
        <li class="nav-item">
            <a href="#tab-agent-properties" class="nav-link" id="tab-agent-property" role="tab" aria-controls="tab-agent-properties" aria-selected="false">Properties</a>
        </li>
        <li class="nav-item">
            <a href="#tab-agent-reviews"   class="nav-link" id="tab-agent-review" role="tab" aria-controls="tab-agent-reviews" aria-selected="false">Reviews</a>
        </li>
        <li class="nav-item">
            <a href="#tab-agent-documentations"   class="nav-link" id="tab-agent-documentation" role="tab" aria-controls="tab-agent-documentations" aria-selected="false">Documentations</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="tab-agent-overviews" class="tab-pane fade show active">
            <div class="description inner">
                <div class="description-inner">
                    {{$user->bio}}
                </div>
            </div>
            <div class="location-single-member">
                <div class="title-wrapper flex-middle">
                    <h3 class="title">Location</h3>
                    <div class="location ali-right">
                        <div class="property-location">
                            <a href="#" target="_blank">{{$user->city}}</a>
                        </div>
                    </div>
                </div>
                <div class="location-map">
                    <div id="map_content1"></div>
                </div>
            </div>
        </div>
        <div id="tab-agent-properties" class="tab-pane fade">
            <?php 
                $services = "Modules\Space\Models\Space"::getVendorServicesQuery($user->id)->orderBy('id','desc')->get();
            ?>
            @foreach($services as $prow)
            <article
                class="map-item property-list property-list-member property-item post-1459 property type-property status-publish has-post-thumbnail hentry property_type-apartment property_location-new-york property_status-for-rent property_amenity-air-conditioning property_amenity-barbeque property_amenity-dryer property_amenity-gym property_amenity-microwave property_amenity-outdoor-shower property_amenity-refrigerator property_amenity-sauna property_amenity-swimming-pool property_amenity-tv-cable property_amenity-washer property_amenity-wifi property_amenity-window-coverings property_material-block property_material-wood"
                data-latitude="40.754565"
                data-longitude="-73.965335"
            >
                <div class="flex">
                    <div class="left-inner flex-middle justify-content-center">
                        <div class="property-thumbnail-wrapper">
                            <div class="image-thumbnail">
                                @if(!empty($prow->image_id))
                                @php $image_url = get_file_url($prow->image_id, 'thumb'); @endphp
                                <a class="property-image" href="#">
                                    <div class="image-wrapper image-loaded">
                                        <img
                                            width="260"
                                            height="240"
                                            src="{{$image_url}}"
                                            class="attachment-homeo-property-list size-homeo-property-list unveil-image"
                                            alt=""
                                            data-xblocker="passed"
                                            style="visibility: visible; max-height:240px !important;"
                                        >
                                    </div>
                                </a>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="right-inner flex-middle">
                        <div class="inner">
                            <div class="property-information">
                                <div class="property-information-top flex-middle">
                                    <div class="top-label">
                                            @if ($prow->search_class == '0')<span class='status-property-label'>{{__("For Rent")}}</span>@endif
                                            @if ($prow->search_class == '1')<span class='status-property-label'>{{__("For Sale")}}</span>@endif
                                            @if ($prow->search_class == '2') <span class='status-property-label'>{{__("Sold")}}</span> @endif
                                            @if($prow->is_featured == "1")<span class="featured-property">{{__("Featured")}}</span>@endif    
                                    </div>
                                    <div class="ali-right">
                                        <div class="property-price">
                                            <span class="price-text">{{ $prow->display_price }}</span>
                                            <span class="suffix-text additional-text">/mo</span>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="property-title">
                                    <a @if(!empty($blank)) target="_blank" @endif href="{{ route('space.search') }}/{{$prow->slug}}" rel="bookmark">{{$prow->title}}</a>
                                </h2>
                                <div class="property-location with-icon">
                                    <i class="flaticon-maps-and-flags"></i>
                                    <span>{{$prow->address}}</span>
                                </div>
                                <div class="property-metas flex-middle flex-wrap hidden-xs">
                                    <div class="property-meta with-icon-title">
                                        <div class="property-meta">
                                            <i class="icofont-hotel" style='color:#5e6d77'></i>
                                            <span class="title-meta">
                                                Beds:
                                            </span>
                                            {{$prow->bed}}
                                        </div>
                                    </div>
                                    <div class="property-meta with-icon-title">
                                        <div class="property-meta">
                                            <i class="icofont-bathtub" style='color:#5e6d77'></i>
                                            <span class="title-meta">
                                                Baths:
                                            </span>
                                            {{$prow->bathroom}}
                                        </div>
                                    </div>
                                    <div class="property-meta with-icon-title">
                                        <div class="property-meta">
                                            <i class="icofont-ruler-compass-alt" style='color:#5e6d77'></i>
                                            <span class="title-meta">
                                                sqft:
                                            </span>
                                            {{$prow->square}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="property-metas-bottom flex-middle hidden-xs">
                                <div class="avatar-wrapper flex-middle">
                                    <div class="avatar-img">
                                        <a href="#">
                                            @if(!empty($user->avatar_id))
                                            @php $image_url = get_file_url($user->avatar_id, 'full'); @endphp
                                            <div class="image-wrapper image-loaded">
                                                <img
                                                    width="150"
                                                    height="150"
                                                    src="{{$image_url}}"
                                                    class="attachment-thumbnail size-thumbnail unveil-image"
                                                    alt=""
                                                    data-xblocker="passed"
                                                    style="visibility: visible;"
                                                    sizes="(max-width: 150px) 100vw, 150px"
                                                >
                                            </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="name-author">
                                        <a href="#">
                                            {{$user->name}}
                                        </a>
                                    </div>
                                </div>
                                <div class="ali-right">
                                    <div class="property-postdate">{{$user->created_at}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        <div id="tab-agent-reviews" class="tab-pane fade">
            <!-- Review -->
            <?php
                /**
                 * Created by PhpStorm.
                 * User: h2 gaming
                 * Date: 8/17/2019
                 * Time: 3:39 PM
                 */
                $reviews = \Modules\Review\Models\Review::query()->where([
                    'vendor_id'=>$user->id,
                    'status'=>'approved'
                ])
                    ->orderBy('id','desc')
                    ->with('author')->paginate(10);
                ?>
                @if($reviews->total())
                    <div class="bravo-reviews">
                        <h3>{{__('Reviews from guests')}}</h3>
                        <div class="review-list">
                            @if($reviews)
                                @foreach($reviews as $item)
                                    @php $userInfo = $item->author;
                                        if(!$userInfo){
                                            continue;
                                        }
                                    @endphp
                                    <div class="review-item">
                                        <div class="review-item-head">
                                            <div class="media">
                                                <div class="media-left">
                                                    @if($avatar_url = $userInfo->getAvatarUrl())
                                                        <img class="avatar" src="{{$avatar_url}}" alt="{{$userInfo->getDisplayName()}}">
                                                    @else
                                                        <span class="avatar-text">{{ucfirst($userInfo->getDisplayName()[0])}}</span>
                                                    @endif
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{$userInfo->getDisplayName()}}</h4>
                                                    <div class="date">{{display_datetime($item->created_at)}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-item-body">
                                            <h4 class="title"> {{$item->title}} </h4>
                                            @if($item->rate_number)
                                                <ul class="review-star">
                                                    @for( $i = 0 ; $i < 5 ; $i++ )
                                                        @if($i < $item->rate_number)
                                                            <li><i class="fa fa-star"></i></li>
                                                        @else
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        @endif
                                                    @endfor
                                                </ul>
                                            @endif
                                            <div class="detail">
                                                {{$item->content}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="bravo-pagination">
                            {{$reviews->appends(request()->query())->links()}}
                        </div>
                        <div class="review-pag-text">
                            {{ __("Showing :from - :to of :total total",["from"=>$reviews->firstItem(),"to"=>$reviews->lastItem(),"total"=>$reviews->total()]) }}
                        </div>
                    </div>
                @endif

        </div>
        <div id="tab-agent-documentations" class="tab-pane fade">
        <?php 
                $services = "Modules\Space\Models\Space"::getVendorServicesQuery($user->id)->orderBy('id','desc')->get();
            ?>
            @foreach($services as $prow)
            <article
                class="map-item property-list property-list-member property-item post-1459 property type-property status-publish has-post-thumbnail hentry property_type-apartment property_location-new-york property_status-for-rent property_amenity-air-conditioning property_amenity-barbeque property_amenity-dryer property_amenity-gym property_amenity-microwave property_amenity-outdoor-shower property_amenity-refrigerator property_amenity-sauna property_amenity-swimming-pool property_amenity-tv-cable property_amenity-washer property_amenity-wifi property_amenity-window-coverings property_material-block property_material-wood"
                data-latitude="40.754565"
                data-longitude="-73.965335"
            >
                <div class="flex">
                    <div class="left-inner flex-middle justify-content-center">
                        <div class="property-thumbnail-wrapper">
                            <div class="image-thumbnail">
                                @if(!empty($prow->image_id))
                                @php $image_url = get_file_url($prow->image_id, 'thumb'); @endphp
                                <a class="property-image" href="#">
                                    <div class="image-wrapper image-loaded">
                                        <img
                                            width="260"
                                            height="240"
                                            src="{{$image_url}}"
                                            class="attachment-homeo-property-list size-homeo-property-list unveil-image"
                                            alt=""
                                            data-xblocker="passed"
                                            style="visibility: visible; max-height:240px !important;"
                                        >
                                    </div>
                                </a>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="right-inner flex-middle">
                        <div class="inner">
                            <div class="property-information">
                                <div class="property-information-top flex-middle">
                                    <div class="top-label">
                                            @if ($prow->search_class == '0')<span class='status-property-label'>{{__("For Rent")}}</span>@endif
                                            @if ($prow->search_class == '1')<span class='status-property-label'>{{__("For Sale")}}</span>@endif
                                            @if ($prow->search_class == '2') <span class='status-property-label'>{{__("Sold")}}</span> @endif
                                            @if($prow->is_featured == "1")<span class="featured-property">{{__("Featured")}}</span>@endif    
                                    </div>

                                </div>

                                <h2 class="property-title">
                                    <a @if(!empty($blank)) target="_blank" @endif href="{{ route('space.search') }}/{{$prow->slug}}" rel="bookmark">{{$prow->title}}</a>
                                </h2>
                                <div class="property-location with-icon pb-3">
                                    <i class="flaticon-maps-and-flags"></i>
                                    <span>{{$prow->address}}</span>
                                </div>
                                <div class="property-metas flex-middle flex-wrap hidden-xs">
                                    @if(!empty($prow->getDocument()) && $prow->getDocument()!=NULL)
                                        @foreach($prow->getDocument() as $key=>$docitem)
                                            @if(!empty($docitem['thumb']))
                                                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                                                    <i class='fa fa-file'></i>
                                                    <span >
                                                        {{$docitem['thumb']}}
                                                    </span>
                                                    <span style='padding-left:30px;'><a href="{{$docitem['large']}}" style=' color:#007bff;' download="{{$docitem['thumb']}}">Download</a></span>
                                                </div>
                                            @endif
                                        @endforeach 
                                    @endif   
                                </div>
                            </div>
                            <div class="property-metas-bottom flex-middle hidden-xs pt-3">
                                <div class="avatar-wrapper flex-middle">
                                    <div class="avatar-img">
                                        <a href="#">
                                            @if(!empty($user->avatar_id))
                                            @php $image_url = get_file_url($user->avatar_id, 'full'); @endphp
                                            <div class="image-wrapper image-loaded">
                                                <img
                                                    width="150"
                                                    height="150"
                                                    src="{{$image_url}}"
                                                    class="attachment-thumbnail size-thumbnail unveil-image"
                                                    alt=""
                                                    data-xblocker="passed"
                                                    style="visibility: visible;"
                                                    sizes="(max-width: 150px) 100vw, 150px"
                                                >
                                            </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="name-author">
                                        <a href="#">
                                            {{$user->name}}
                                        </a>
                                    </div>
                                </div>
                                <div class="ali-right">
                                    <div class="property-postdate">{{$user->created_at}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</div>