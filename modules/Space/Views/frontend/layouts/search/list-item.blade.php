
<div class="row">

    <div class="col-lg-3 col-md-12">
        @include('Space::frontend.layouts.search.filter-search')
    </div>
    <div class="col-lg-9 col-md-12">
        <div class="bravo-list-item">
            <div class="topbar-search">
                <h2 class="text">
                    <div class="bravo-pagination">
                        {{$rows->appends(request()->query())->links()}}
                        @if($rows->total() > 0)
                            <span class="count-string">{{ __("Showing :from - :to results",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                        @endif
                    </div>
                </h2>
                <div class="control">
                    
                    <div class="item nav-tabs" >
                        @php
                            $param = request()->input();
                            $orderby =  request()->input("orderby");
                        @endphp
                        <div class="item-title">
                            {{ __("Sort by:") }}
                        </div>
                        <div class="dropdown">
                            <span class=" dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @switch($orderby)
                                    @case("price_low_high")
                                    {{ __("Price (Low to high)") }}
                                    @break
                                    @case("price_high_low")
                                    {{ __("Price (High to low)") }}
                                    @break
                                    @case("rate_high_low")
                                    {{ __("Rating (High to low)") }}
                                    @break
                                    @default
                                    {{ __("Default") }}
                                @endswitch
                            </span>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                @php $param['orderby'] = "" @endphp
                                <a class="dropdown-item" href="{{ route("space.search",$param) }}">{{ __("Default") }}</a>
                                @php $param['orderby'] = "price_low_high" @endphp
                                <a class="dropdown-item" href="{{ route("space.search",$param) }}">{{ __("Price (Low to high)") }}</a>
                                @php $param['orderby'] = "price_high_low" @endphp
                                <a class="dropdown-item" href="{{ route("space.search",$param) }}">{{ __("Price (High to low)") }}</a>
                                @php $param['orderby'] = "rate_high_low" @endphp
                                <a class="dropdown-item" href="{{ route("space.search",$param) }}">{{ __("Rating (High to low)") }}</a>
                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                            <a class="nav-link active" href="#grid"><i class='icon-grid' style='font-size:20px;'></i></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#list"><i class='icon-list' style='font-size:20px;'></i></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>            
                <div class='tab-content'>
                    <div class="tab-pane active" id='grid' >
                        <div class='list-item '>
                            <div class='row'>
                                @if($rows->total() > 0)
                                    @foreach($rows as $row)
                                        <div  class="col-lg-4 col-md-6 ">
                                            @include('Space::frontend.layouts.search.loop-grid')
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-lg-12">
                                        {{__("Space not found")}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id='list' >
                        <div class='list-item '>
                            <div class='row'>
                                @if($rows->total() > 0)
                                    @foreach($rows as $row)
                                        <div  class="col-lg-12 col-md-12 ">
                                            @include('Space::frontend.layouts.search.loop-list')
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-lg-12">
                                        {{__("Space not found")}}
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

            <div class="bravo-pagination">
                {{$rows->appends(request()->query())->links()}}
                @if($rows->total() > 0)
                    <span class="count-string">{{ __("Showing :from - :to results",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
  $(".nav-tabs a").click(function(){
    $(this).tab('show');
  });
});
</script>