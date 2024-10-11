<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/job/edit.customer_homeowner') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <textarea  class="form-control" name="customer_homeowner" placeholder="Customer Homeowner">{{ isset($job->customer_homeowner) ? old('customer_homeowner', $job->customer_homeowner) : '' }}</textarea>
        </div>
    </div>
</div>
</hr>
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/job/edit.customer_unit_cordination') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <textarea  class="form-control" name="customer_unit_cordination" placeholder="Customer Unit Cordination">{{ isset($job->customer_unit_cordination) ? old('customer_unit_cordination', $job->customer_unit_cordination) : '' }}</textarea>
        </div>
    </div>
</div>
