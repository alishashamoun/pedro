        <label for="description">Description:</label>
        <input value="{{ isset($invoice->no_bill_amount_description) ? old('amount_description', $invoice->no_bill_amount_description) : '' }}" type="text" name="no_bill_amount_description" class="form-control"  >


        <label for="amount">Amount:</label>
        <input value="{{ isset($invoice->no_bill_amount) ? old('amount', $invoice->no_bill_amount) : '' }}" type="number" step="0.01" name="no_bill_amount" class="form-control " >
