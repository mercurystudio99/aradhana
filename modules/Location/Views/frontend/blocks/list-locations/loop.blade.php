@php
    /**
    * @var $row \Modules\Location\Models\Location
    * @var $to_location_detail bool
    * @var $service_type string
    */
    $translation = $row->translateOrOrigin(app()->getLocale());
    $link_location = false;
    if(is_string($service_type)){
        $link_location = $row->getLinkForPageSearch($service_type);
    }
    if(is_array($service_type) and count($service_type) == 1){
        $link_location = $row->getLinkForPageSearch($service_type[0] ?? "");
    }
    if($to_location_detail){
        $link_location = $row->getDetailUrl();
    }
@endphp
<div class="destination-item text-center ">
            <div class="content" >
                <h4 class="title">{{$translation->name}}</h4>
                <p style='font-size:15px;'>1 project</p>
            </div>
    @if(!empty($link_location)) </a> @endif
</div>
