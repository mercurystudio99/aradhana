<div class="panel">
    <div class="panel-title"><strong>{{__("Facilities")}}</strong></div>
    <div class="panel-body">
        <div class="form-group-item">
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-5">{{__("Name")}}</div>
                    <div class="col-md-5">{{__('Distance')}}</div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                @if(!empty($row->facilities))
                    <?php $facilities = json_decode($row->facilities);?>
                    @foreach($facilities as $key=>$facility)
                        <div class="item" data-number="{{$key}}">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="facilities[{{$key}}][name]" class="form-control" value="{{$facility->name}}" placeholder="{{__('City Center')}}">
                                </div>
                                <div class="col-md-6">
                                    <textarea name="facilities[{{$key}}][distance]" class="form-control" placeholder="...">{{$facility->distance}}</textarea>
                                </div>
                                <div class="col-md-1">
                                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="text-right">
                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" __name__="facilities[__number__][name]" class="form-control" placeholder="{{__('City Center')}}">
                        </div>
                        <div class="col-md-6">
                            <textarea __name__="facilities[__number__][distance]" class="form-control" placeholder=""></textarea>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>