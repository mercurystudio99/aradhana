<table class="compare-tables">
    <thead>
        <tr>
            <th></th>
            @foreach($rows as $row)
            <th>
                <div class="thumb">
                {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive']) !!}

                    @if($row->is_featured)
                        <span class="featured-property">Featured</span>
                    @endif
                </div>
            </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        <tr class="tr-0">
            <td>Title</td>
            @foreach($rows as $row)
            <td>
                <h3><a  href="">{{$row->title}}</a></h3>
            </td>
            @endforeach
        </tr>
        <tr class="tr-0">
            <td>ID</td>
            @foreach($rows as $row)
            <td>
                {{$row->id}} </td>
            @endforeach
        </tr>
        <tr class="tr-1">
            <td>Status</td>
            @foreach($rows as $row)
            <td>
                @if($row->search_class==0) For Rent
                @elseif($row->search_class==1) For Sale
                @else Sold
                @endif
            </td>
            @endforeach
        </tr>
        <tr class="tr-0">
            <td>Label</td>
            @foreach($rows as $row)
            <td>
                <?php echo $row->content;?>
            </td>
            @endforeach
        </tr>
        <tr class="tr-1">
            <td>Rooms</td>
            @foreach($rows as $row)
            <td>
                {{$row->room}} </td>
            @endforeach
        </tr>
        <tr class="tr-0">
            <td>Beds</td>
            @foreach($rows as $row)
            <td>
                {{$row->bed}} </td>
            @endforeach
        </tr>
        <tr class="tr-1">
            <td>Baths</td>
            @foreach($rows as $row)
            <td>
                {{$row->bathroom}} </td>
            @endforeach
        </tr>
        <tr class="tr-0">
            <td>Garages</td>
            @foreach($rows as $row)
            <td>
                {{$row->garage}} </td>
            @endforeach
        </tr>
        <tr class="tr-1">
            <td>Year built</td>
            @foreach($rows as $row)
            <td>
                {{$row->builtyear}} </td>
            @endforeach
        </tr>
        <tr class="tr-0">
            <td>Home area</td>
            @foreach($rows as $row)
            <td>
                {{$row->homesquare}} </td>
            @endforeach
        </tr>
        <tr class="tr-1">
            <td>Lot area</td>
            @foreach($rows as $row)
            <td>
               {{$row->square}} </td>
            @endforeach
        </tr>
        <tr class="tr-0">
            <td>Material</td>
            @foreach($rows as $row)
            <td>
                Block, Brick, Rock
            </td>
            @endforeach
        </tr>
        <tr class="tr-1">
            <td>Price ($)</td>
            @foreach($rows as $row)
            <td>
                <span class="suffix">$</span><span class="price-text" style=" text-decoration: line-through;">{{$row->price}}</span><span
                    class="suffix-text additional-text">/mo</span>
            </td>
            @endforeach
        </tr>
        <tr class="tr-1">
            <td>Sale Price ($)</td>
            @foreach($rows as $row)
            <td>
                <span class="suffix">$</span><span class="price-text">{{$row->sale_price}}</span><span
                    class="suffix-text additional-text">/mo</span>
            </td>
            @endforeach
        </tr>
        <tr class="tr-0">
            <td>Regions</td>
            @foreach($rows as $row)
            <td>{{$row->address}}</td>
            @endforeach
        </tr>

        <tr class="tr-1">
            <td>Energy</td>
            @foreach($rows as $row)
            <td>
                {{$row->energy_class}} </td>
            @endforeach
        </tr>
        <tr class="tr-0">
            <td>Energy Index</td>
            @foreach($rows as $row)
            <td>
               {{$row->energy_index}} </td>
               @endforeach
        </tr>
    </tbody>
</table>