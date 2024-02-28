
    <article id="post-1446" class="post-1446 agent type-agent status-publish has-post-thumbnail hentry agent_location-new-york agent_category-apartment">
        <div class="agent-list agent-item">
            <div class="flex">

                <div class="member-thumbnail-wrapper flex-middle justify-content-center">
                    @if(!empty($row->avatar_id))
                    @php $image_url = get_file_url($row->avatar_id, 'full'); @endphp
                    <div class="agent-logo-wrapper">

                        <a class="agent-logo"  @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($row->role_id)}}">
                            <div class="image-wrapper image-loaded">
                                <img width="420" height="325" src="{{$image_url}}" class="attachment-homeo-agent-grid size-homeo-agent-grid unveil-image" alt="" data-xblocker="passed" style="visibility: visible;">
                            </div>                    
                        </a>
                    </div>
                    @if($row->role_id != 2)
                        <div class="nb-property">
                            2 Properties    
                        </div>
                    @endif
                    @endif 
                </div>
                          
                <div class="agent-information flex-middle ">
                    <div class="inner">
                        <h2 class="agent-title"><a href="#" rel="bookmark">{{$row->name}}</a></h2>                    
                        <div class="property-job">Marketing</div>                    
                        <div class="metas">
                            <div class="phone-wrapper agent-phone with-title phone-hide">
                                <span>Phone:</span>
                                <a class="" href="tel:91 456 9874">{{$row->phone}}</a>
                            </div>                                               
                            <div class="agent-email with-title">
                                <span>Email:</span>
                                <a href="mailto:tomwilson@apus.com">{{$row->email}}</a>
                            </div>                        
                            <div class="agent-website with-title">
                                <span>Address</span>
                                <a href="#" target="_blank">{{$row->city}}{{$row->address}}</a>
                            </div>                    
                        </div>
                    
                        <div class="agent-information-bottom flex-middle">
                            <div class="ali-right">
                                <a class="view-my-listings text-theme" @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($row->role_id)}}">View My Listings<i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
