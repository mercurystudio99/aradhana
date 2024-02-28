@if(count($space_related) > 0)
<div class="bravo_search_space">
    <div class="bravo-list-space">
        <h2 class='text-center'>{{__("Related Properties")}}</h2>
        <div class="bravo-list-item">
            <div class='list-item '>
                <div class="row">
                    @foreach($space_related as $k=>$item)
                        <div class="col-md-3">
                            @include('Space::frontend.layouts.search.loop-grid',['row'=>$item,'include_param'=>0])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
<div>
@endif