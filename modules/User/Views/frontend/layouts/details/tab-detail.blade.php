<div class="agent-detail-tabs detail-tabs-member">
    <ul role="tablist" class="nav nav-tabs nav-member">
        <li class="nav-item">
            <a href="#tab-agent-overviews" class="nav-link" id="tab-agent-overview" role="tab" aria-controls="tab-agent-overviews" aria-selected="false">Overview</a>
        </li>
        <li class="nav-item">
            <a href="#tab-agent-properties" class="nav-link" id="tab-agent-property" role="tab" aria-controls="tab-agent-properties" aria-selected="false">Portfolio</a>
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
                    {{$row->bio}}
                </div>
            </div>
            <div class="location-single-member">
                <div class="title-wrapper flex-middle">
                    <h3 class="title">Location</h3>
                    <div class="location ali-right">
                        <div class="property-location">
                            <a href="https://maps.google.com/maps?q=49th+Ave%2C+Long+Island+City%2C+NY&amp;zoom=14&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" target="_blank">49th Ave, Long Island City, NY</a>
                        </div>
                    </div>
                </div>
                <div class="location-map">
                    <div id="map_content1"></div>
                </div>
            </div>
        </div>
        <div id="tab-agent-properties" class="tab-pane fade">
                <div class="d-flex">
                    @if(!empty($row->gallery))
                        @foreach($row->getGallery() as $key=>$item)
                            @if($item['large'])
                            <div class="col-sm-4 col-xs-4 ">
                                <a href="#"  class="p-popup-image ">
                                    <div class="image-wrapper image-loaded">
                                        <img
                                            width="400"
                                            height="400"
                                            src="{{$item['large']}}"
                                            class="attachment-houzing-gallery-second size-houzing-gallery-second unveil-image"
                                            alt=""
                                            data-xblocker="passed"
                                            style="visibility: visible;"
                                            
                                        >
                                    </div>
                                </a>
                            </div>
                            @endif
                        @endforeach 
                    @endif  
                </div>
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
                    'vendor_id'=>$row->id,
                    'status'=>'approved'
                ])
                    ->orderBy('id','desc')
                    ->with('author')->paginate(10);
                ?>
                @if($reviews->total())
                    <div class="bravo-reviews">
                        <h3>{{__('Reviews To Vendors')}}</h3>
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
        <div id="tab-agent-documentations" class="tab-pane">

        </div>
    </div>
</div>