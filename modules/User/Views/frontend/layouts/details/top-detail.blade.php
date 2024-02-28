@if($row->banner_id)
<div class="bravo_banner"  style="height:300px;background-image: url({{get_file_url($row->banner_id, 'full')}})"  >

</div>
@endif
<div id="apus-main-content" style="padding-top: 0px;">
    <section id="primary" class="content-area inner">
        <main id="main" class="site-main content" role="main">
            <div class="clearfix container">
                <div class="single-agent-wrapper single-listing-wrapper single-listing-agent-agency" data-latitude="40.743457" data-longitude="-73.954088">
                    <article id="post-1446" class="post-1446 agent type-agent status-publish has-post-thumbnail hentry agent_location-new-york agent_category-apartment">
                        <!-- Main content -->
                        <div class="row">
                            <div class="col-xs-12 list-content-agent col-md-8">
                                <!-- Breadscrumb -->
                                <section id="apus-breadscrumb" class="breadcrumb-page apus-breadscrumb  ">
                                    <div class="container">
                                        <div class="wrapper-breads">
                                            <div class="wrapper-breads-inner">
                                                <div class="left-inner">
                                                    <ol class="breadcrumb">
                                                        
                                                            <a href="/">Home</a>/
                                                        
                                                        
                                                            <a href="{{url('/user/other-vendors')}}">Other Vendors</a>/
                                                        
                                                        
                                                            <span class="active">{{$row->name}}</span>
                                                        
                                                    </ol>
                                                </div>
                                                <div class="breadscrumb-inner clearfix">
                                                    <h2 class="bread-title">{{$row->name}}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="agent-detail-header top-detail-member">
                                    <div class="flex">
                                        <div class="member-thumbnail-wrapper flex-middle justify-content-center">
                                            @if(!empty($row->avatar_id))
                                            @php $image_url = get_file_url($row->avatar_id, 'full'); @endphp
                                            
                                            <div class="agent-logo-wrapper">
                                                <a class="agent-logo" href="/">
                                                    <div class="image-wrapper image-loaded">
                                                        <img
                                                            width="420"
                                                            height="420"
                                                            src="{{$image_url}}"
                                                            class="attachment-full size-full unveil-image"
                                                            alt=""
                                                            data-xblocker="passed"
                                                            style="visibility: visible;"
                                                            sizes="(max-width: 420px) 100vw, 420px"
                                                        >
                                                    </div>
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="member-information flex-middle">
                                            <div class="inner">
                                                <div class="title-wrapper">
                                                    <h1 class="member-title">{{$row->name}}</h1>
                                                    <span
                                                        class="featured featured-property"
                                                        data-toggle="tooltip"
                                                        title=""
                                                    >
                                                    </span>
                                                </div>
                                                <div class="property-job">Marketing</div>
                                                <div class="member-metas">
                                                    <div class="phone-wrapper agent-phone with-title phone-hide">
                                                        <span>Phone:</span>
                                                        <a  href="tel:91 456 9874">{{$row->phone}}</a>
                                                    </div>
                                                    <div class="agent-email with-title">
                                                        <span>Email:</span>
                                                        <a href="mailto:tomwilson@apus.com">{{$row->email}}</a>
                                                    </div>
                                                    <div class="agent-website with-title">
                                                        <span>Address:</span>
                                                        <a href="#" target="_blank">{{$row->city}}{{$row->address}}</a>
                                                    </div>
                                                </div>
                                                <div class="agency-socials socials-member">
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-dribbble"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @include('User::frontend.layouts.details.tab-detail')

                            </div>
        @include('User::frontend.layouts.details.side-detail')

                        </div>
                    </article>
                    <!-- #post-## -->
                </div>
            </div>
        </main>
        <!-- .site-main -->
    </section>
    <!-- .content-area -->
</div>
<script>
    
    $(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
    });
</script>
