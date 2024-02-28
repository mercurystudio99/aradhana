@if($list_item)
    <div class="bravo-testimonial">
        <div class="container">
            <h3>{{$title}}</h3>
            <div class="row">
                @foreach($list_item as $item)
                    <?php $avatar_url = get_file_url($item['avatar'], 'full') ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="item has-matchHeight" >

                            <p >
                                {{$item['desc']}}
                            </p>
  
                        </div>
                        <div class="author d-flex justify-content-center" >
                            <img src="{{$avatar_url}}" alt="{{$item['name']}}">
                            
                        </div>
                        <div class="author-meta text-center" >
                            <h6>{{$item['name']}}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif