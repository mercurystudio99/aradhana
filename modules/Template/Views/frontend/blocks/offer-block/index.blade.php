@if(!empty($list_item))
    <div class="bravo-offer">
        <div class="container">
            <div class="row">
                @foreach($list_item as $key=>$item)
                    @php $size = 4 ;  @endphp
                    <div class="col-lg-{{$size}}">
                        <div class="item">
                            @if(!empty($item['featured_text']))
                                <div class="featured-text">{{$item['featured_text']}}</div>
                            @endif
                            @if(!empty($item['featured_icon']))
                                <div class="featured-icon"><i class="{{$item['featured_icon']}}"></i></div>
                            @endif
                            <h2 class="item-title">{{$item['title']}}</h2>
                            <p class="item-sub-title">{!! $item['desc'] !!}</p>
                            <!-- <a href="{{$item['link_more']}}" class="btn btn-default">{{$item['link_title']}}</a> -->
                            <a href="#" class="btn btn-default">{{$item['link_title']}}</a>

                            <div class="img-cover" style="background: url('{{ get_file_url($item['background_image'],'full') ?? "" }}')"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

<div class="bravo-form-search-car @if(!empty($style) and $style == "carousel") bravo-form-search-slider @endif" @if(empty($style)) style="height:500px;background-attachment:fixed;background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('{{ asset(`/`)}}/uploads/0000/1/2023/01/06/h1-1.png') !important" @endif>
    <div class='text-center'>
        <p style='color:white;font-size:16px;font-weight:bold;'>
            Trends
        </p>
        <h3 style='color:white'>
            Vermont Farmhouse With Antique Jail Is<br>
            <br>
            the Week's Most Popular Home
        </h3>
        <br>
        <button class='btn' style='background-color:#10174B;color:white' >Read More</button>
    </div>

</div>
<script src="{{asset('jquery.min.js')}}"></script>
<script>
    
        
        
$(document).ready(function() {

$('.counter').each(function () {
$(this).prop('Counter',0).animate({
Counter: $(this).text()
}, {
duration: 4000,
easing: 'swing',
step: function (now) {
    $(this).text(Math.ceil(now));
}
});
});

});  




</script>
<div class="container" style='border-bottom: 1px solid #d2d2d2'>
    
    <div class="row">

	<div class="four col-md-3">
		<div class="counter-box ">
			<span class="counter">2147</span>
			<p>HOMES FOR SALE</p>
		</div>
	</div>
	<div class="four col-md-3">
		<div class="counter-box">
			<span class="counter">1275</span>
			<p>OPEN HOUSES</p>
		</div>
	</div>
	<div class="four col-md-3">
		<div class="counter-box">
			<span class="counter">557</span>
			<p>RECENTLY SOLD</p>
		</div>
	</div>
	<div class="four col-md-3">
		<div class="counter-box">
			<span class="counter">1563</span>
			<p>PRICE REDUCED</p>
		</div>
	</div>
  </div>	
</div>