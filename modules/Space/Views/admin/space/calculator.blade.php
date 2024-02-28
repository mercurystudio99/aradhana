<div class="panel">
    <div class="panel-title"><strong>{{__("Calculator")}}</strong></div>
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