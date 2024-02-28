@if(!empty($style) and $style == "carousel" and !empty($list_slider))
    <div class="effect" >
        <div class="owl-carousel">
            @foreach($list_slider as $item)
                @php $img = get_file_url($item['bg_image'],'full') @endphp
                <div class="item">
                    <div class="item-bg" style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('{{$img}}') !important"></div>
                </div>
            @endforeach
        </div>
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <div class="sub-heading text-center">{{$sub_title}}</div>
        <h1 class="text-heading text-center">{{$title}}</h1>
            @if(empty($hide_form_search))
                <div class="g-form-control ">
                    <ul class="nav nav-tabs d-flex justify-content-center " role="tablist" style='padding-bottom:30px;'>
                        <li role="bravo_rent">
                            <a href="#bravo_rent" class="active" aria-controls="bravo_rent" role="tab" data-toggle="tab">   
                                Rent
                            </a>
                        </li>
                        <li role="bravo_sale">
                            <a href="#bravo_sale"  aria-controls="bravo_sale" role="tab" data-toggle="tab">
                                Sale
                            </a>
                        </li>
                        <li role="bravo_sold">
                            <a href="#bravo_sold" aria-controls="bravo_sold" role="tab" data-toggle="tab">
                                Sold                                    
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content " style='max-width:1050px;margin:0px auto !important;'>
                        <div role="tabpanel" class="fade show active tab-pane"  id="bravo_rent">
                            @include('Space::frontend.layouts.search.form-search_rent')
                        </div>
                        <div role="tabpanel " id="bravo_sale" class='fade tab-pane'>
                            @include('Space::frontend.layouts.search.form-search_sale')
                        </div>
                        <div role="tabpanel"  id="bravo_sold" class='fade tab-pane'>
                            @include('Space::frontend.layouts.search.form-search_sold')
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>