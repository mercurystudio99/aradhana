<div class="panel">
    <div class="panel-title"><strong>{{__("Property Content")}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <label>{{__("Title")}}</label>
            <input type="text" value="{!! clean($translation->title) !!}" placeholder="{{__("Name of the property")}}" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">{{__("Content")}}</label>
            <div class="">
                <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10">{{$translation->content}}</textarea>
            </div>
        </div>
        @if(is_default_lang())
            <div class="form-group">
                <label class="control-label">{{__("Youtube Video")}}</label>
                <input type="text" name="video" class="form-control" value="{{$row->video}}" placeholder="{{__("Youtube link video")}}">
            </div>
        @endif
        <div class="form-group-item">
            <label class="control-label">{{__('Floor Plans')}}</label>
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-5">{{__("Title")}}</div>
                    <div class="col-md-5">{{__('Content')}}</div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                @if(!empty($translation->faqs))
                    @php if(!is_array($translation->faqs)) $translation->faqs = json_decode($translation->faqs); @endphp
                    @foreach($translation->faqs as $key=>$faq)
                        <div class="item" data-number="{{$key}}">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="faqs[{{$key}}][title]" class="form-control" value="{{$faq['title']}}" placeholder="{{__('Eg: When and where does the tour end?')}}">
                                </div>
                                <div class="col-md-6">
                                    <textarea name="faqs[{{$key}}][content]" class="d-none has-ckeditor" cols="20" rows="10">{{$faq['content']}}</textarea>

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
                            <input type="text" __name__="faqs[__number__][title]" class="form-control" placeholder="{{__('Eg: Can I bring my pet?')}}">
                        </div>
                        <div class="col-md-6">
                            <textarea __name__="faqs[__number__][content]" class="d-none has-ckeditor" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(is_default_lang())
            <div class="form-group">
                <label class="control-label">{{__("Banner Image")}}</label>
                <div class="form-group-image">
                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('banner_image_id',$row->banner_image_id) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">{{__("Gallery")}}</label>
                {!! \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery',$row->gallery) !!}
            </div>
        @endif
    </div>
</div>
@if(is_default_lang())
<div class="panel">
    <div class="panel-title"><strong>{{__("Extra Info")}}</strong></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("No. Bed")}}</label>
                    <input type="number" value="{{$row->bed}}" placeholder="{{__("Example: 3")}}" name="bed" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("No. Room")}}</label>
                    <input type="number" value="{{$row->room}}" placeholder="{{__("Example: 3")}}" name="room" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("No. Bathroom")}}</label>
                    <input type="number" value="{{$row->bathroom}}" placeholder="{{__("Example: 5")}}" name="bathroom" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("No. Garage")}}</label>
                    <input type="number" value="{{$row->garage}}" placeholder="{{__("Example: 5")}}" name="garage" class="form-control">
                </div>
            </div>

        </div>
        @if(is_default_lang())
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Minimum advance reservations")}}</label>
                        <input type="number" name="min_day_before_booking" class="form-control" value="{{$row->min_day_before_booking}}" placeholder="{{__("Ex: 3")}}">
                        <i>{{ __("Leave blank if you dont need to use the min day option") }}</i>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Minimum day stay requirements")}}</label>
                        <input type="number" name="min_day_stays" class="form-control" value="{{$row->min_day_stays}}" placeholder="{{__("Ex: 2")}}">
                        <i>{{ __("Leave blank if you dont need to set minimum day stay option") }}</i>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endif
<div class="panel">
    <div class="panel-title"><strong>{{__("Home info")}}</strong></div>
    <div class="panel-body">
        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("Square")}}</label>
                    <input type="number" value="{{$row->square}}" placeholder="{{__("Example: 100")}}" name="square" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("Home Square")}}</label>
                    <input type="number" value="{{$row->homesquare}}" placeholder="{{__("Example: 100")}}" name="homesquare" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("Square Dimension")}}</label>
                    <input type="text" value="{{$row->squaredimension}}" placeholder="{{__("Example: 100x100x100")}}" name="squaredimension" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("Built Year")}}</label>
                    <input type="number" value="{{$row->builtyear}}" placeholder="{{__("Example: 1985")}}" name="builtyear" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("Expire Date")}}</label>
                    <input type="date" value="{{$row->expiredate}}" placeholder="{{__("Example: 1985-01-01")}}" name="expiredate" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-title"><strong>{{__("Home Price")}}</strong></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("Total Amount")}}</label>
                    <input type="number" value="{{$row->total_amount}}" placeholder="{{__("Example: 100")}}" name="total_amount" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("Down Payment")}}</label>
                    <input type="number" value="{{$row->down_payment}}" placeholder="{{__("Example: 100")}}" name="down_payment" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("Interest Rate")}}</label>
                    <input type="number" value="{{$row->interest_rate}}" placeholder="{{__("Example: 10")}}" name="interest_rate" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("Loan Terms")}}</label>
                    <input type="number" value="{{$row->loan_term}}" placeholder="{{__("Example: 10")}}" name="loan_term" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("Property Tax")}}</label>
                    <input type="number" value="{{$row->property_tax}}" placeholder="{{__("Example:100")}}" name="property_tax" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__("Home Insurance")}}</label>
                    <input type="number" value="{{$row->insurance}}" placeholder="{{__("Example:100")}}" name="insurance" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>