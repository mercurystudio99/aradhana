
<div class="bravo_filter">
<form action="{{route("space.search") }}" class="bravo_form_filter">
        @include('Space::frontend.layouts.search.form-list-search')

        @if( !empty(Request::query('location_id')) )
            <input type="hidden" name="location_id" value="{{Request::query('location_id')}}">
        @endif
        @if( !empty(Request::query('map_place')) )
            <input type="hidden" name="map_place" value="{{Request::query('map_place')}}">
        @endif
        @if( !empty(Request::query('map_lat')) )
            <input type="hidden" name="map_lat" value="{{Request::query('map_lat')}}">
        @endif
        @if( !empty(Request::query('map_lgn')) )
            <input type="hidden" name="map_lgn" value="{{Request::query('map_lgn')}}">
        @endif
        @if( !empty(Request::query('start')) and !empty(Request::query('end')) )
            <input type="hidden" value="{{Request::query('start',date("d/m/Y",strtotime("today")))}}" name="start">
            <input type="hidden" value="{{Request::query('end',date("d/m/Y",strtotime("+1 day")))}}" name="end">
            <input type="hidden" name="date" value="{{Request::query('date')}}">
        @endif

        <div class="g-filter-item " style='border:none;'>

            <div class="item-title">
                <h3>{{__("Home Area")}}</h3>
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </div>
            <div class="item-content">
                <div class="bravo-filter-price">
                    <?php
                    $square_min = $squ_from = floor ($space_min_max_square[0]);
                    $square_max = $squ_to = ceil ($space_min_max_square[1]);
                    if (!empty($square_range = Request::query('square_range'))) {
                        $squ_from = explode(";", $square_range)[0];
                        $squ_to = explode(";", $square_range)[1];
                    }
                    ?>                
                    <input type="hidden" class="filter-price irs-hidden-input" name="square_range"
                           data-symbol=" {{'Sqrt'}}"
                           data-min="{{$square_min}}"
                           data-max="{{$square_max}}"
                           data-from="{{$squ_from}}"
                           data-to="{{$squ_to}}"
                           readonly="" value="{{$square_range}}">
                </div>
            </div>
            

            <div class="item-title">
                <h3>{{__("Price")}}</h3>
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </div>
            <div class="item-content">
                <div class="bravo-filter-price">
                    <?php
                    $price_min = $pri_from = floor ( App\Currency::convertPrice($space_min_max_price[0]) );
                    $price_max = $pri_to = ceil ( App\Currency::convertPrice($space_min_max_price[1]) );
                    if (!empty($price_range = Request::query('price_range'))) {
                        $pri_from = explode(";", $price_range)[0];
                        $pri_to = explode(";", $price_range)[1];
                    }
                    $currency = App\Currency::getCurrency( App\Currency::getCurrent() );
                    ?>
                    
                    <input type="hidden" class="filter-price irs-hidden-input" name="price_range"
                           data-symbol=" {{$currency['symbol'] ?? ''}}"
                           data-min="{{$price_min}}"
                           data-max="{{$price_max}}"
                           data-from="{{$pri_from}}"
                           data-to="{{$pri_to}}"
                           readonly="" value="{{$price_range}}">
                </div>
            </div>

        </div>

        @php
            $selected = (array) Request::query('terms');
        @endphp
        @foreach ($attributes as $item)
            @if(empty($item['hide_in_filter_search']))
                @php
                    $translate = $item->translateOrOrigin(app()->getLocale());
                @endphp
                <div class="g-filter-item" style='border:none;'>
                    <div class="item-title">
                        <h3> Other Features </h3>
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </div>
                    <div class="item-content">
                        <ul>
                            @foreach($item->terms as $key => $term)
                                @php $translate = $term->translateOrOrigin(app()->getLocale()); @endphp
                                <li @if($key > 2 and empty($selected)) class="hide" @endif>
                                    <div class="bravo-checkbox">
                                        <label>
                                            <input @if(in_array($term->id,$selected)) checked @endif type="checkbox" name="terms[]" value="{{$term->id}}"> {!! $translate->name !!}
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        @if(count($item->terms) > 3 and empty($selected))
                            <button type="button" class="btn btn-link btn-more-item">{{__("More")}} <i class="fa fa-caret-down"></i></button>
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
        <div class='d-flex justify-content-center' style='padding-top:10px; padding-bottom:10px;'>
            <button type="submit" class="btn btn-primary-custom btn-search" style='text-center'><i class="field-icon fa icofont-search"></i> {{__("Search")}}</button>
        </div>
    </form>
</div>
<div class="bravo_filter" style='padding:20px;'>
    <div class="item-title">
        <h5 style='padding-bottom:20px'>{{__("Latest Properties")}}</h5>
        
    </div> 
    <div class="bravo-form-search-all carousel bravo-form-search-slider">
        <div class="effect" >
            <div class="owl-carousel property-item">
                @foreach($rows as $row)
                    @php
                        $translation = $row->translateOrOrigin(app()->getLocale());
                    @endphp
                    <div class="item carousel_img property-image">
                        <img src="{{$row->image_url}}" class=" img-responsive" alt="" style=''>
                        <div class='sale_price'>
                            <a  href="#" style='color:white; font-size:20px;text-decoration:none;'>
                                @if($row->is_instant)
                                    <i class="fa fa-bolt d-none"></i>
                                @endif
                                    {!! clean($translation->title) !!}
                            </a>
                            <div class="text-price">
                                {{ $row->display_price }}
                                @if($row->getBookingType()=="by_day")
                                    <span class="unit">{{__("/mo")}}</span>
                                @else
                                    <span class="unit">{{__("")}}</span>
                                @endif
                            </div>  
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>





