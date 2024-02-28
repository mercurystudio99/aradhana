<div class="form-group">
    
    <div class="form-content">
        <label>{{ $field['title'] }}</label>
        <div class="input-search">
            <input type="text" name="service_name" class="form-control" placeholder="{{__("Enter keywards")}}" value="{{ request()->input("service_name") }}">
        </div>
    </div>
</div>