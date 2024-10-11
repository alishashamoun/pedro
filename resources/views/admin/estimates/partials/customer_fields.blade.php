<div class="row">
    <div class="col-md-4">
        <strong>Customer Homeowner</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <textarea  class="form-control" name="customer_homeowner" placeholder="Customer Homeowner">{{ isset($estimate->customer_homeowner) ? old('customer_homeowner', $estimate->customer_homeowner) : '' }}</textarea>
        </div>
    </div>
</div>
</hr>
<div class="row">
    <div class="col-md-4">
        <strong>Customer Unit/Cordination</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <textarea  class="form-control" name="customer_unit_cordination" placeholder="Customer Unit Cordination">{{ isset($estimate->customer_unit_cordination) ? old('customer_unit_cordination', $estimate->customer_unit_cordination) : '' }}</textarea>
        </div>
    </div>
</div>
