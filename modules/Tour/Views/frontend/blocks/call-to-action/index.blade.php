
<div class='container'>
    <div class="cards-list">
    
        <div class="cards 1">
            <a href="{{ route("space.search") }}" >
                <div class="card_image"> <img src="{{asset("/uploads/for_all.jpg")}}" style="width:100%;height:100%"/> </div>
                <div class="card_title ">
                    <p>Featured Property</p>
                </div>
            </a>
        </div>

        <div class="cards 2">
            <a href="{{ route("space.search_rent") }}" >

                <div class="card_image">
                    <img src="{{asset("/uploads/for_rent.jpg")}}" style="width:100%;height:100%"/>
                    </div>
                <div class="card_title ">
                    <p>Rent Agreement</p>
                </div>
            </a>
        </div>

        <div class="cards 3">
            <a href="{{ route("space.search_sale") }}" >

                <div class="card_image">
                    <img src="{{asset("/uploads/for_sale.jpg")}}" style="width:100%;height:100%"/>
                </div>
                <div class="card_title ">
                    <p>For Sale</p>
                </div>
            </a>
        </div>
        
        <div class="cards 4">
            <a href="{{ route("space.search_sold") }}" >
                <div class="card_image">
                    <img src="{{asset("/uploads/for_sold.jpg")}}" style="width:100%;height:100%"/>
                    </div>
                <div class="card_title ">
                    <p>For Sold</p>
                </div>
            </a>
        </div>

    </div>
</div>