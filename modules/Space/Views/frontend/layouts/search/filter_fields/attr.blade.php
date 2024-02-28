
@if(!empty($field['attr']) and !empty($attr = \Modules\Core\Models\Attributes::find($field['attr'])))
    @php
        $attr_translate = $attr->translateOrOrigin(app()->getLocale());
        if(request()->query('term_id'))
            $selected = \Modules\Core\Models\Terms::find(request()->query('term_id'));
        else $selected = false;
        $list_cat_json = [];
    @endphp
    @if($attr)
        <div class="filter-item">
            <div class="form-group" style='border-bottom: 1px solid #e6e9ec; margin-top:40px; margin-bottom:20px;'>
                <div class="smart-search">
                    <div class="form-group">
                        <select name="sale_class" class="form-control"  style='appearance:none !important; color:#808080'>
                            <option @if(!empty($sale_class) && $sale_class == '-1') selected @endif value="-1">{{__("Status")}}</option>
                            <option @if(!empty($sale_class) && $sale_class == '0') selected @endif value="0">{{__("For Rent")}}</option>
                            <option @if(!empty($sale_class) && $sale_class == '1') selected @endif value="1">{{__("For Sale")}}</option>
                            <option @if(!empty($sale_class) && $sale_class == '2') selected @endif value="2">{{__("Sold")}}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-item">
            <div class="form-group" style='border-bottom: 1px solid #e6e9ec; margin-top:40px; margin-bottom:20px;'>
                @foreach($attr->terms as $term)
                    @php $translate = $term->translateOrOrigin(app()->getLocale());
                    $list_cat_json[] = [
                        'id' => $term->id,
                        'title' => $translate->name,
                    ];
                    @endphp
                @endforeach
                <div class="smart-search">
                    <input type="text" class="smart-select parent_text form-control" readonly placeholder="{{__("Type")}}" value="{{ $selected ? $selected->name ?? '' :'' }}" data-default="{{ json_encode($list_cat_json) }}">
                    <input type="hidden" class="child_id" name="terms[]" value="{{Request::query('term_id')}}">
                </div>
            </div>
        </div>
    @endif
@endif

<div class="filter-item">
    <div class="form-group" style='border-bottom: 1px solid #e6e9ec; margin-top:40px; margin-bottom:20px;'>
        <div class="smart-search">
            <div class="form-group">
                <select name="bedroom_class" class="form-control"  style='appearance:none !important; color:#808080'>
                    <option  value="">{{__("Bedrooms")}}</option>
                    <option  value="1">{{__("+1")}}</option>
                    <option  value="2">{{__("+2")}}</option>
                    <option  value="3">{{__("+3")}}</option>
                    <option  value="4">{{__("+4")}}</option>
                    <option  value="5">{{__("+5")}}</option>
                </select>
            </div>
        </div>
    
    </div>
</div>
<div class="filter-item">
    <div class="form-group" style='border-bottom: 1px solid #e6e9ec; margin-top:40px; margin-bottom:20px;'>     
        <div class="smart-search">
            <div class="form-group">
                <select name="garage_class" class="form-control"  style='appearance:none !important; color:#808080'>
                    <option  value="">{{__("Garages")}}</option>
                    <option  value="1">{{__("+1")}}</option>
                    <option  value="2">{{__("+2")}}</option>
                    <option  value="3">{{__("+3")}}</option>
                    <option  value="4">{{__("+4")}}</option>
                    <option  value="5">{{__("+5")}}</option>
                </select>
            </div>
        </div> 
    </div>
</div>