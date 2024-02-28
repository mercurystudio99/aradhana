<div class="panel">
    <div class="panel-title"><strong>{{__("Property Detail")}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <label class="control-label">{{__("Overview")}}</label>
            <div class="">
                <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10">{{$translation->content}}</textarea>
            </div>
            
        </div>
        <div class="form-group">
            <label class="control-label">{{__("Home Info")}}</label>
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
                        <label>{{__("Possession Date")}}</label>
                        <input type="date" value="{{$row->expiredate}}" placeholder="{{__("Example: 1985-01-01")}}" name="expiredate" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class="control-label">{{__("Extra Info")}}</label>
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">{{__("Price")}}</label>
                        <input type="number" step="any" min="0" name="price" class="form-control" value="{{$row->price}}" placeholder="{{__("Space Price")}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">{{__("Sale Price")}}</label>
                        <input type="number" step="any" name="sale_price" class="form-control" value="{{$row->sale_price}}" placeholder="{{__("Space Sale Price")}}">
                        <span><i>{{__("If the regular price is less than the discount , it will show the regular price")}}</i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class="control-label">{{__("Valuation")}}</label>

            <div class="form-group-item">
                <div class="g-items-header">
                    <div class="row">
                        <div class="col-md-5">{{__("Name")}}</div>
                        <div class="col-md-5">{{__('Value')}}</div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="g-items">
                    @if(!empty($row->valuations))
                        <?php $valuations = json_decode($row->valuations);?>
                        @foreach($valuations as $key=>$valuation)
                            <div class="item" data-number="{{$key}}">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" name="valuations[{{$key}}][name]" class="form-control" value="{{$valuation->name}}" placeholder="{{__('Medical')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type='number' name="valuations[{{$key}}][value]" class="form-control" placeholder="..." value="{{$valuation->value}}">
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
                                <input type="text" __name__="valuations[__number__][name]" class="form-control" placeholder="{{__('Medical')}}">
                            </div>
                            <div class="col-md-6">
                                <input type='number' __name__="valuations[__number__][value]" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-1">
                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class="control-label">{{__("Energy Class")}}</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__("Energy")}}</label>
                        <select name="energy_class" class="form-control">
                            <option @if($row->energy_class == 'A+') selected @endif value="A+">{{__("A+")}}</option>
                            <option @if($row->energy_class == 'A') selected @endif value="A">{{__("A")}}</option>
                            <option @if($row->energy_class == 'B') selected @endif value="B">{{__("B")}}</option>
                            <option @if($row->energy_class == 'C') selected @endif value="C">{{__("C")}}</option>
                            <option @if($row->energy_class == 'D') selected @endif value="D">{{__("D")}}</option>
                            <option @if($row->energy_class == 'E') selected @endif value="E">{{__("E")}}</option>
                            <option @if($row->energy_class == 'F') selected @endif value="F">{{__("F")}}</option>
                            <option @if($row->energy_class == 'G') selected @endif value="G">{{__("G")}}</option>
                            <option @if($row->energy_class == 'H') selected @endif value="H">{{__("H")}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{__("Energy Index")}}</label>
                        <input type="number" value="{{$row->energy_index}}" placeholder="{{__("20")}}" name="energy_index" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <label class="control-label">{{__("Documents")}}</label>
            {!! \Modules\Media\Helpers\FileHelper::fieldDocumentUpload('documents',$row->documents) !!}
        </div>
    </div>
</div>
<div id="edit_filename_modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
            <div class="modal-content">
                    <div class="document_modal_header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title float-left">Edit Name</h4>
                    </div>
                    <div class="modal-body">
                            <div class='row'>
                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                <div class="col-sm-12 pt-1">
                                        <div class="flex-row form-group d-flex">
                                            <label class="flex-row-reverse px-2 col-md-3 control-label align-items-center d-flex">Name</label>
                                            <div class="col-md-9">
                                            <div class="input-icon">
                                                <input type="text" class="form-control" name='documentname' id='documentname' placeholder="FileName">
                                            </div>
                                                <input type='hidden' name='documentid' id='documentid'>
                                            </div>
                                        </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                            <button type="button"  class="btn green" onclick='updateFileName()'>Update</button>
                    </div>
            </div>
    </div>
</div>