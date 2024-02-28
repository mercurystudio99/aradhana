
<div class="row">

    <div class="col-lg-3 col-md-12">
        @include('User::frontend.layouts.search.filter-search')
    </div>
    <div class="col-lg-9 col-md-12">
        <div class="bravo-list-item">
            <div class="topbar-search">
                <h2 class="text">
                    <div class="bravo-pagination">
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
                                    @case("from_new")
                                    {{ __("Newest") }}
                                    @break
                                    @case("from_old")
                                    {{ __("Oldest") }}
                                    @break
                                    @case("from_name")
                                    {{ __("Name") }}
                                    @break
                                    @default
                                    {{ __("Default") }}
                                @endswitch
                            </span>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                @php $param['orderby'] = "" @endphp
                                @if($vendor_role==1)
                                <a class="dropdown-item" href="{{ route("vender.search",$param) }}">{{ __("Default") }}</a>
                                @endif
                                @if($vendor_role==0)
                                <a class="dropdown-item" href="{{ route("customer.search",$param) }}">{{ __("Default") }}</a>
                                @endif
                                @php $param['orderby'] = "from_new" @endphp
                                @if($vendor_role==1)
                                <a class="dropdown-item" href="{{ route("vender.search",$param) }}">{{ __("Newest") }}</a>
                                @endif
                                @if($vendor_role==0)
                                <a class="dropdown-item" href="{{ route("customer.search",$param) }}">{{ __("Newest") }}</a>
                                @endif
                                @php $param['orderby'] = "from_old" @endphp
                                @if($vendor_role==1)
                                <a class="dropdown-item" href="{{ route("vender.search",$param) }}">{{ __("Oldest") }}</a>
                                @endif
                                @if($vendor_role==0)
                                <a class="dropdown-item" href="{{ route("customer.search",$param) }}">{{ __("Oldest") }}</a>
                                @endif
                                @php $param['orderby'] = "from_name" @endphp
                                @if($vendor_role==1)
                                <a class="dropdown-item" href="{{ route("vender.search",$param) }}">{{ __("Name") }}</a>
                                @endif
                                @if($vendor_role==0)
                                <a class="dropdown-item" href="{{ route("customer.search",$param) }}">{{ __("Name") }}</a>
                                @endif
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
                            <div class='row'>
                                @if($rows->total() > 0)
                                    @foreach($rows as $row)
                                        <div class="col-lg-4 col-md-4">
                                            @include('User::frontend.layouts.search.loop-grid')
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-lg-12">
                                        {{__("Not found")}}
                                    </div>
                                @endif
                            </div>
                    </div>
                    <div class="tab-pane fade" id='list' >
                        <div class='list-item '>
                            <div class="agents-wrapper items-wrapper clearfix">
                                @if($rows->total() > 0)
                                    @foreach($rows as $row)
                                        
                                            @include('User::frontend.layouts.search.loop-list')
                                        
                                    @endforeach
                                @else
                                    <div class="col-lg-12">
                                        {{__("Not found")}}
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>         
            <div class="bravo-pagination">
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