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