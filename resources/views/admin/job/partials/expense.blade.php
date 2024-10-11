        <label for="description">Description:</label>
        <input value="{{ isset($invoice->amount_description) ? old('amount_description', $invoice->amount_description) : '' }}" type="text" name="amount_description" class="form-control job_description" id="job_description" >


        <label for="amount">Amount:</label>
        <input value="{{ isset($invoice->amount) ? old('amount', $invoice->amount) : '' }}" type="number" step="0.01" name="amount" class="form-control job_amount" id="job_amount" >
