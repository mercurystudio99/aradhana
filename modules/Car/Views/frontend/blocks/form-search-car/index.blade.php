<div class="bravo-form-search-car @if(!empty($style) and $style == "carousel") bravo-form-search-slider @endif" @if(empty($style)) style="height:500px;background-attachment:fixed;background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('{{$bg_image_url}}') !important" @endif>
    @if(!empty($style) and $style == "carousel" and !empty($list_slider))
        <div class="effect">
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