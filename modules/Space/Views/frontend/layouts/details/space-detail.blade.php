
<ul class="nav nav-tabs nav-justified" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a
      class="nav-link active"
      id="ex3-tab-1"
      data-mdb-toggle="tab"
      href="#ex3-tabs-1"
      role="tab"
      aria-controls="ex3-tabs-1"
      aria-selected="true"
      >DETAILS</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex3-tab-2"
      data-mdb-toggle="tab"
      href="#ex3-tabs-2"
      role="tab"
      aria-controls="ex3-tabs-2"
      aria-selected="false"
      >FEATURES</a
    >
  </li>

  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex3-tab-3"
      data-mdb-toggle="tab"
      href="#ex3-tabs-3"
      role="tab"
      aria-controls="ex3-tabs-3"
      aria-selected="false"
      >LOCATIONS</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex3-tab-4"
      data-mdb-toggle="tab"
      href="#ex3-tabs-4"
      role="tab"
      aria-controls="ex3-tabs-4"
      aria-selected="false"
      >MEDIA</a
    >
  </li>

  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex3-tab-6"
      data-mdb-toggle="tab"
      href="#ex3-tabs-6"
      role="tab"
      aria-controls="ex3-tabs-6"
      aria-selected="false"
      >CALCULATOR</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex3-tab-7"
      data-mdb-toggle="tab"
      href="#ex3-tabs-7"
      role="tab"
      aria-controls="ex3-tabs-7"
      aria-selected="false"
      >FACILITIES</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex3-tab-8"
      data-mdb-toggle="tab"
      href="#ex3-tabs-8"
      role="tab"
      aria-controls="ex3-tabs-8"
      aria-selected="false"
      >REVIEWS</a
    >
  </li>
</ul>
<!-- Tabs navs -->

<!-- Tabs content -->
<div class="tab-content" id="ex2-content">
  <div
    class="tab-pane fade show active tab_content "
    id="ex3-tabs-1"
    role="tabpanel"
    aria-labelledby="ex3-tab-1"
    
  >

        @if($translation->content)
            <div class="g-overview">
                <h3>{{__("Overview")}}</h3>
                <div class="description">
                    <?php echo $translation->content ?>
                </div>
            </div>
        @endif
        <div class='detail_component'> 
            <h4>Details</h4>
            <div class='row' style='padding-top:20px'>
                <div class='col-sm-4 col-md-4 col-lg-4'>
                    <div class='row'>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                            <label class='sub_label'>ID:</label>
                        </div>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                            {{$row->id}}
                        </div>
                    </div>
                </div>
                <div class='col-sm-4 col-md-4 col-lg-4'>
                <div class='row'>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                            <label class='sub_label'>Lot area:</label>
                        </div>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                        @if(!empty($row->square))
                            {{$row->square}}
                        @endif
                        </div>
                    </div>
                </div>
                <div class='col-sm-4 col-md-4 col-lg-4'>
                <div class='row'>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                            <label class='sub_label'>Home area:</label>
                        </div>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                        @if(!empty($row->homesquare))
                            {{$row->homesquare}}
                        @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class='row' style='padding-top:20px'>
                <div class='col-sm-4 col-md-4 col-lg-4'>
                    <div class='row'>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                            <label class='sub_label'>Lot dimensions:</label>
                        </div>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                        @if(!empty($row->squaredimension))
                            {{$row->squaredimension}}
                        @endif
                        </div>
                    </div>
                </div>
                <div class='col-sm-4 col-md-4 col-lg-4'>
                <div class='row'>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                            <label class='sub_label'>Rooms:</label>
                        </div>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                        @if(!empty($row->room))
                            {{$row->room}}
                        @endif
                        </div>
                    </div>
                </div>
                <div class='col-sm-4 col-md-4 col-lg-4'>
                <div class='row'>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                            <label class='sub_label'>Beds:</label>
                        </div>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                        @if(!empty($row->bed))
                            {{$row->bed}}
                        @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class='row' style='padding-top:20px'>
                <div class='col-sm-4 col-md-4 col-lg-4'>
                    <div class='row'>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                            <label class='sub_label'>Baths:</label>
                        </div>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                        @if(!empty($row->bathroom))
                            {{$row->bathroom}}
                        @endif
                        </div>
                    </div>
                </div>
                <div class='col-sm-4 col-md-4 col-lg-4'>
                <div class='row'>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                            <label class='sub_label'>Prices:</label>
                        </div>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                        @if(!empty($row->price))
                            {{$row->display_price}}/mo
                        @endif
                        </div>
                    </div>
                </div>
                <div class='col-sm-4 col-md-4 col-lg-4'>
                <div class='row'>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                            <label class='sub_label'>Year built:</label>
                        </div>
                        <div class='col-sm-6 col-md-6 col-lg-6'>
                        @if(!empty($row->builtyear))
                            {{$row->builtyear}}
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='valuation_component'> 
            <h4>Valuation</h4>
            <div class='row' style='padding-top:20px'>
                @if(!empty($row->valuations))
                    <?php $valuations = json_decode($row->valuations);?>
                    @foreach($valuations as $key=>$valuation)
                        <div class="valuation-item clearfix col-sm-12 col-md-12 col-lg-12">
                            <div class="clearfix">
                                <div class="valuation-label pull-left " >{{$valuation->name}}</div>
                                <span class="percentage-valuation pull-right">{{$valuation->value}}</span>
                            </div>
                            <div class="property-valuation-item progress">
                                <div class="bar-valuation progress-bar progress-bar-success progress-bar-striped" style="width: {{$valuation->value}}%" data-percentage="{{$valuation->value}}"></div>
                            </div>
                            <!-- /.property-valuation-item -->
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
        <div class='energy_component' > 
            <h4>Energy</h4>
            <div class='row' style='padding-top:20px'>
                    <div class='col-sm-12 col-md-12 col-lg-12'>
                        <div class='row'>
                            <div class='col-sm-6 col-md-6 col-lg-6 sub_label' >Energy</div>
                            <div class='col-sm-6 col-md-6 col-lg-6' style='text-align:right'>
                                @if(!empty($row->energy_class))
                                    {{$row->energy_class}}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-12 col-md-12 col-lg-12 pt-4'>
                        <div class='row'>
                            <div class='col-sm-6 col-md-6 col-lg-6 sub_label'>Energy Index</div>
                            <div class='col-sm-6 col-md-6 col-lg-6' style='text-align:right'>
                                @if(!empty($row->energy_index))
                                    {{$row->energy_index}}
                                @endif
                            </div>
                        </div>
                    </div>
            </div>

        </div>
        <div class='document_component' style='padding-top:30px;'>
            <h4>Document</h4>
            <div class="row " style='padding-top:20px;'>                
                    @if(!empty($row->getDocument()) && $row->getDocument()!=NULL)
                        @foreach($row->getDocument() as $key=>$docitem)
                            @if(!empty($docitem['thumb']))
                                <div class="col-sm-4 col-xs-4 ">
                                    <i class='fa fa-file'></i>
                                    <span >
                                        {{$docitem['thumb']}}
                                    </span>
                                    <span style='padding-left:30px;'><a href="{{$docitem['large']}}" style=' color:#007bff;' download="{{$docitem['thumb']}}">Download</a></span>
                                </div>
                            @endif
                        @endforeach 
                    @endif   
                </div>
        </div>
  </div>
  <div
    class="tab-pane fade"
    id="ex3-tabs-2"
    role="tabpanel"
    aria-labelledby="ex3-tab-2"
  >
    @include('Space::frontend.layouts.details.space-attributes')
  </div>
  <div
    class="tab-pane fade"
    id="ex3-tabs-3"
    role="tabpanel"
    aria-labelledby="ex3-tab-3"
  >
    @if($row->map_lat && $row->map_lng)
    <div class="g-location">
        <h3 style='padding-bottom:30px'>{{__("Location")}}</h3>
        <div class="location-map">
            <div id="map_content"></div>
        </div>
    </div>
    @endif
  </div>
  <div
    class="tab-pane fade"
    id="ex3-tabs-4"
    role="tabpanel"
    aria-labelledby="ex3-tab-4"
  >
    @if($translation->faqs)
        <div class="g-faq">
            <h3 style='padding-bottom:30px'> {{__("Floor Plans")}} </h3>
            @foreach($translation->faqs as $item)
                <div class="item" >
                    <div class="header" style='border:1px solid #E6E9EC; padding-left:15px; padding-right:15px;'>
                        <h5>{{$item['title']}}</h5>
                        <span class="arrow"><i class="fa fa-angle-down"></i></span>
                    </div>
                    <div class="body">
                        <?php echo $item['content'] ?>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
        <div class='property-detail-gallery' style='padding-top:30px;'>
            <h4>Media Gallery</h4>
            <div class="row " style='padding-top:20px;'>
                    @if(!empty($row->getMediaGallery()))
                        @foreach($row->getMediaGallery() as $key=>$item)
                            @if(!empty($item['thumb']))
                                <div class="col-sm-4 col-xs-4 ">
                                    <a href="#"  class="p-popup-image ">
                                        <div class="image-wrapper image-loaded">
                                            <img
                                                
                                                src="{{$item['large']}}"
                                                class="attachment-houzing-gallery-second size-houzing-gallery-second unveil-image"
                                                alt=""
                                                data-xblocker="passed"
                                                style="visibility: visible; width:400px; height:300px; "
                                                
                                            >
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach 
                    @endif   
                </div>
        </div>

        <div class="tabs-video-virtual" style='padding-top:30px !important;'>
            <ul class="nav nav-tabs nav-member">
                <li class="nav-item ">
                    <a href="#tab-gallery-map-video" class=' nav-link active'>
                        Property video
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#tab-gallery-map-virtual_tour"  class=' nav-link'>
                        360° Virtual Tour
                    </a>
                </li>
            </ul>
            <div class="tab-content tab-content-descrip">
                <div id="tab-gallery-map-video" class="tab-pane active">
                    <div class="bravo_gallery">
                        <div class="">
                            <span class="btn-transparent has-icon bravo-video-popup d-flex justify-content-center"  @if(!empty($row->video)) data-toggle="modal" @endif data-src="{{$row->video}}" data-target="#video-register">
                                @if($row->banner_image_id)
                                    <img src="{{$row->getBannerImageUrlAttribute('full')}}" class="img-fluid" alt="Youtube">
                                @endif
                                @if(!empty($row->video))
                                    <div class="play-icon ">
                                        <img src="{{asset('module/vendor/img/ico-play.svg')}}" alt="Play background" class="img-fluid play-image">
                                    </div>
                                @endif
                            </span>
                        </div>
                        @if(!empty($row->video))
                            <div class="modal fade" id="video-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content p-0">
                                        <div class="modal-body">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item bravo_embed_video " src="" allowscriptaccess="always" allow="autoplay" ></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div id="tab-gallery-map-virtual_tour" class="tab-pane ">
                    <div class="bravo_gallery">
                        <div class="btn-group">
                            <img src="" class="img-fluid" width='912' height='548' alt="Youtube">
                            
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>

    <div
        class="tab-pane fade"
        id="ex3-tabs-6"
        role="tabpanel"
        aria-labelledby="ex3-tab-6"
    >
        <div class='interest_payment' style='padding-bottom:30px'>
            <div class='row'>
                <div class='col-sm-4 col-lg-4'>
                    <section>
                        <div class="pieID pie">
                            <span class='total_monthly' id='total_monthly' ><p style='font-size:20px;margin-bottom:0px;padding-left:5px' id='monthly_price'></p><p style='margin-top:0px;padding-top:5px;padding-left:5px;'>monthly</p></span>
                        </div>
                    </section>
                    <ul class="list list-result-calculator">
                        <li class="flex-middle">
                            <span class="name-result">Principal &amp; Interest</span>
                            <span class="principal-interest-val" id='view_principal'></span>
                        </li>
                        <li class="flex-middle">
                            <span class="name-result">Property Tax</span>
                            <span class="property-tax-val" id='view_tax'></span>
                        </li>
                        <li class="flex-middle">
                            <span class="name-result">Home Insurance</span>
                            <span class="home-insurance-val" id='view_insurance'></span>
                        </li>
                    </ul>
                </div>
                <div class='col-sm-8 col-lg-8 pieID legend'>
                    <div class='row'>
                        <div class='col-sm-6 col-lg-6'>
                            <div class="login_form" style='margin-bottom:25px;'>
                                <input type="number" name="total_amount" id="total_amount" autocomplete="off" required value='{{$row->total_amount}}'/>
                                <label for="total_amount" class="label-name">
                                    <span class="content-name">
                                        Total Amount($)
                                    </span>
                                    <span class="invalid-feedback error "></span>
                                </label>
                            </div>
                        </div>
                        <div class='col-sm-6 col-lg-6'>
                            <div class="login_form" style='margin-bottom:25px;'>
                                <input type="number" name="down_payment" id="down_payment" autocomplete="off" required value='{{$row->down_payment}}'/>
                                <label for="down_payment" class="label-name">
                                    <span class="content-name">
                                        Down Payment
                                    </span>
                                    <span class="invalid-feedback error "></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class='row '>
                        <div class='col-sm-6 col-lg-6'>
                            <div class="login_form" style='margin-bottom:25px;'>
                                <input type="number" name="interest_rate" id="interest_rate" autocomplete="off" required value='{{$row->interest_rate}}'/>
                                <label for="interest_rate" class="label-name">
                                    <span class="content-name">
                                        Interest Rate(%)
                                    </span>
                                    <span class="invalid-feedback error "></span>
                                </label>
                            </div>
                        </div>
                        <div class='col-sm-6 col-lg-6'>
                            <div class="login_form" style='margin-bottom:25px;'>
                                <input type="number" name="loan_term" id="loan_term" autocomplete="off" required value='{{$row->loan_term}}'/>
                                <label for="down_payment" class="label-name">
                                    <span class="content-name">
                                        Loan Terms(Years)
                                    </span>
                                    <span class="invalid-feedback error "></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-6 col-lg-6'>
                            <div class="login_form" style='margin-bottom:25px;'>
                                <input type="number" name="property_tax" id="property_tax" autocomplete="off" required value='{{$row->property_tax}}'/>
                                <label for="property_tax" class="label-name">
                                    <span class="content-name">
                                        Property Tax($)
                                    </span>
                                    <span class="invalid-feedback error "></span>
                                </label>
                            </div>
                        </div>
                        <div class='col-sm-6 col-lg-6'>
                            <div class="login_form" style='margin-bottom:25px;'>
                                <input type="number" name="insurance" id="insurance" autocomplete="off" required  value='{{$row->insurance}}'/>
                                <label for="insurance" class="label-name">
                                    <span class="content-name">
                                        Home Insurance($)
                                    </span>
                                    <span class="invalid-feedback error "></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-6 col-lg-6'>
                        <div class="wrapper-submit">
                            <button class="btn btn-theme btn-mortgage-calculator" type="button" onclick="calculateInterest()">CALCULATE</button>
                        </div>
                        </div>
                        <div class='col-sm-6 col-lg-6'>

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div
        class="tab-pane fade"
        id="ex3-tabs-7"
        role="tabpanel"
        aria-labelledby="ex3-tab-7"
    >
        <h3 style=''> {{__("Facilities")}} </h3>


                <div class='row' >
                    <div class='col-sm-12 col-md-12 col-lg-12'>
                        <div class='row'>
                            @if(!empty($row->facilities))
                                <?php $facilities = json_decode($row->facilities);?>
                                @foreach($facilities as $key=>$facility)
                                    <div class="col-sm-6 col-md-6 col-lg-6" style='padding-top:20px ; '>
                                        <div class="row">
                                            <div class="col-md-6 sub_label">
                                                {{$facility->name}}
                                            </div>
                                            <div class="col-md-6" style='color:#696969 ;'>
                                               {{$facility->distance}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

    </div>
    <div
        class="tab-pane fade"
        id="ex3-tabs-8"
        role="tabpanel"
        aria-labelledby="ex3-tab-8"
    >
        @include('Space::frontend.layouts.details.space-review')
    </div>
</div>

<script>
$(document).ready(function(){
  $(".nav-tabs a").click(function(){
    $(this).tab('show');
  });
});
function sliceSize(dataNum, dataTotal) {
  return (dataNum / dataTotal) * 360;
}
function addSlice(sliceSize, pieElement, offset, sliceID, color) {
  $(pieElement).append("<div class='slice "+sliceID+"'><span></span></div>");
  var offset = offset - 1;
  var sizeRotation = -179 + sliceSize;
  $("."+sliceID).css({
    "transform": "rotate("+offset+"deg) translate3d(0,0,0)"
  });
  $("."+sliceID+" span").css({
    "transform"       : "rotate("+sizeRotation+"deg) translate3d(0,0,0)",
    "background-color": color
  });
}
function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
  var sliceID = "s"+dataCount+"-"+sliceCount;
  var maxSize = 179;
  if(sliceSize<=maxSize) {
    addSlice(sliceSize, pieElement, offset, sliceID, color);
  } else {
    addSlice(maxSize, pieElement, offset, sliceID, color);
    iterateSlices(sliceSize-maxSize, pieElement, offset+maxSize, dataCount, sliceCount+1, color);
  }
}
function createPie(dataElement, pieElement) {
    var total=$('#total_amount').val();
    var down=$('#down_payment').val();
    var rate=$('#interest_rate').val();
    var term=$('#loan_term').val();
    var tax=$('#property_tax').val();
    var insurance=$('#insurance').val();
    var principal=(total-down)*(1+0.57*rate*term/100)/12/term;
    var per_tax= tax/12
    var per_insurance=insurance/12

    var listData = [principal, per_tax, per_insurance];

  var listTotal = 0;
  for(var i=0; i<listData.length; i++) {
    listTotal += listData[i];
  }
  var offset = 0;
  var color = [
    "#0061df", 
    "#81ade7", 
    "#c2d7f1", 
    "#cdd7e3", 
  ];
  for(var i=0; i<listData.length; i++) {
    var size = sliceSize(listData[i], listTotal);
    iterateSlices(size, pieElement, offset, i, 0, color[i]);
    $(dataElement+" li:nth-child("+(i+1)+")").css("border-color", color[i]);
    offset += size;
  }
  $('#monthly_price').html('$'+Math.round(principal+per_tax+per_insurance))
  $('#view_principal').html(Math.round(principal))
  $('#view_tax').html(Math.round(per_tax))
  $('#view_insurance').html(Math.round(per_insurance))
}
createPie(".pieID.legend", ".pieID.pie");
function calculateInterest(){
    var total=$('#total_amount').val();
    var down=$('#down_payment').val();
    var rate=$('#interest_rate').val();
    var term=$('#loan_term').val();
    var tax=$('#property_tax').val();
    var insurance=$('#insurance').val();
    var principal=(total-down)*(1+0.57*rate*term/100)/12/term;
    var per_tax= tax/12
    var per_insurance=insurance/12
    console.log(principal)
    console.log(per_tax)
    console.log(per_insurance)
    var listData = [principal, per_tax, per_insurance];

    var listTotal = 0;
    for(var i=0; i<listData.length; i++) {
    listTotal += listData[i];
    }
    var offset = 0;
    var color = [
    "#0061df", 
    "#81ade7", 
    "#c2d7f1", 
    "#cdd7e3", 
    ];
    for(var i=0; i<listData.length; i++) {
    var size = sliceSize(listData[i], listTotal);
    iterateSlices(size, '.pieID.pie', offset, i, 0, color[i]);
    $(".pieID.legend"+" li:nth-child("+(i+1)+")").css("border-color", color[i]);
    offset += size;
    }
    $('#monthly_price').html('$'+Math.round(principal+per_tax+per_insurance))
    $('#view_principal').html(Math.round(principal))
  $('#view_tax').html(Math.round(per_tax))
  $('#view_insurance').html(Math.round(per_insurance))
}
</script>