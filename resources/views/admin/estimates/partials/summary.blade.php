<div class="row">

    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.customer') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">

            <select name="customer_id" id="customer_id" class="form-control">
                <option value="">select {{ __('admin/estimates/edit.customer') }}</option>
                @foreach ($customer as $cust)
                    <option data-contacts="{{ json_encode($cust->pricontact) }}"
                        {{ isset($estimate->customer_id) ? (old('customer_id', $estimate->customer_id) ? 'selected' : '') : '' }}
                        value="{{ $cust->id }}">{{ $cust->name }}</option>
                @endforeach
            </select>
            <span class="error-message error-messages" id="customer_id_error"></span><br>
        </div>
    </div>
    <template id="contact-template">
        <div class="row">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="tel" class="form-control" disabled name="phone[]" placeholder="Phone number">
                    <p class="error-message phone-error error-messages" style="display: none;">
                        {{ __('admin/job/edit.add_at_least_phone') }}
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="tel" class="form-control" disabled name="ext[]" placeholder="Ext">
                    <p class="ext-error error-messages" style="display: none;">
                        {{ __('admin/job/edit.add_at_least_ext') }}</p>
                </div>
            </div>
            {{-- <div class="col-md-1">
                <button type="button" class="btn btn-danger remove-contact"><i class="fas fa-trash"></i></button>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="email" class="form-control" disabled name="email[]" placeholder="Email">
                    <p class="email-error error-messages" style="display: none">
                        {{ __('admin/job/edit.add_at_least_email') }}</p>
                </div>
            </div>
            {{-- <div class="col-md-2">
                <button type="button" class="btn btn-primary add-contact"><i class="fas fa-plus"></i></button>
            </div> --}}
        </div>
    </template>
    <!-- <div class="col-md-4">
            <div class="form-group">
                <button class="form-control"><i class="fas fa-link"></i> Link to parent</button>
            </div>
        </div> -->
</div>

<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.main_contact') }}</strong>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input value="{{ isset($estimate->first_name) ? old('first_name', $estimate->first_name) : '' }}"
                class="form-control" name="first_name" id="first_name" placeholder="First Name">
            <span class="error-message error-messages" id="first_name_error"></span><br>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input value="{{ isset($estimate->last_name) ? old('last_name', $estimate->last_name) : '' }}"
                class="form-control" name="last_name" id="last_name" placeholder="Last Name">
            <span class="error-message error-messages" id="last_name_error"></span><br>
        </div>
    </div>
</div>
<div id="primary-contacts-container">
    <!-- Primary contacts will be appended here -->
</div>
{{-- @if (isset($estimate->prim_cont))

    @foreach ($estimate->prim_cont as $jobprim)
        <div>
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <input value="{{ isset($jobprim->phone) ? old('phone', $jobprim->phone) : '' }}" type="tel"
                            class="form-control" name="phone[]" id="" placeholder="Phone number">
                        <p class="error-message phone-error error-messages" style="display: none;"> Add at least phone
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input value="{{ isset($jobprim->ext) ? old('ext', $jobprim->ext) : '' }}" type="tel"
                            class="form-control" name="ext[]" placeholder="Ext">
                        <p class="ext-error error-messages" style="display: none;">Add at least ext</p>
                    </div>

                </div>

            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-md-4">&nbsp;</div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input value="{{ isset($jobprim->email) ? old('email', $jobprim->email) : '' }}" type="email"
                            class="form-control" name="email[]" placeholder="Email">
                        <p class="email-error error-messages" style="display: none">Add at least email.</p>
                    </div>
                </div>
                <!-- Add a Remove button -->
                @if (!$loop->last)
                    <div class="col-md-2">
                        <a href="{{ route('estpri.destroy', $jobprim->id) }}" class="btn"><i
                                class="fas fa-trash text-danger"></i></a>
                    </div>
                @else
                    <div class="col-md-2">
                        <button type="button" class="btn" id="add-primary"><i
                                class="fas fa-plus text-primary"></i></button>
                    </div>
                @endif

            </div>
        </div>
    @endforeach
@else
    <div>
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <input type="tel" class="form-control" name="phone[]" id=""
                        placeholder="{{ __('admin/estimates/edit.phone') }}">
                    <p class="error-message phone-error error-messages" style="display: none;"> Add at least phone
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="tel" class="form-control" name="ext[]"
                        placeholder="{{ __('admin/estimates/edit.ext') }}">
                    <p class="ext-error error-messages" style="display: none;">Add at least ext</p>
                </div>

            </div>

        </div>
    </div>
    <div>
        <div class="row">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="email" class="form-control" name="email[]"
                        placeholder="{{ __('admin/estimates/edit.email') }}">
                    <p class="email-error error-messages" style="display: none">Add at least email.</p>
                </div>
            </div>
            <!-- Add a Remove button -->
            <div class="col-md-2">
                <button type="button" class="btn" id="add-primary"><i
                        class="fas fa-plus text-primary"></i></button>
            </div>

        </div>
    </div>

@endif --}}
<p class="primary_append">

</p>
<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.service_location') }}</strong>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input value="{{ isset($estimate->location_name) ? old('location_name', $estimate->location_name) : '' }}"
                type="text" class="form-control" name="location_name"
                placeholder="Location Name(e.g Home or Office)">
        </div>
    </div>
    <div class="col-md-4">
        <input {{ isset($estimate->location_gated_property) && $estimate->location_gated_property ? 'checked' : '' }}
            type="checkbox" name="location_gated_property" class="form-check-input"
            placeholder="Location Name(e.g Home or Office)">{{ __('admin/estimates/edit.location_gated_property') }}
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        &nbsp;
    </div>
    <div class="col-md-5">
        <div class="form-group">
            <input
                value="{{ isset($estimate->location_address) ? old('location_address', $estimate->location_address) : '' }}"
                type="text" class="form-control" name="location_address"
                placeholder="{{ __('admin/estimates/edit.location_address') }}">
        </div>
    </div>
    <div class="col-md-3">
        <input value="{{ isset($estimate->location_unit) ? old('location_unit', $estimate->location_unit) : '' }}"
            type="text" class="form-control" name="location_unit"
            placeholder="{{ __('admin/estimates/edit.location_unit') }}">
    </div>
</div>
<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <input type="text"
                value="{{ isset($estimate->location_city) ? old('location_city', $estimate->location_city) : '' }}"
                class="form-control" name="location_city"
                placeholder="{{ __('admin/estimates/edit.location_city') }}">
        </div>
    </div>
    <div class="col-md-3">
        <input type="text"
            value="{{ isset($estimate->location_state) ? old('location_state', $estimate->location_state) : '' }}"
            class="form-control" name="location_state"
            placeholder="{{ __('admin/estimates/edit.location_state') }}">
    </div>
    <div class="col-md-2">
        <input type="text"
            value="{{ isset($estimate->location_zipcode) ? old('location_zipcode', $estimate->location_zipcode) : '' }}"
            class="form-control" name="location_zipcode"
            placeholder="{{ __('admin/estimates/edit.location_zipcode') }}">
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.work_category') }}</strong>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="jobCategory">{{ __('admin/estimates/edit.work_category') }}</label>
            <select id="job-cat-id" name="job_cat_id" class="form-control">
                <option value="">Select a {{ __('admin/estimates/edit.work_category') }}</option>
                @foreach ($jobCategories as $category)
                    <option
                        {{ isset($estimate->job_cat_id) ? (old('job_cat_id', $estimate->job_cat_id) ? 'selected' : '') : '' }}
                        value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <span class="error-message error-messages" id="job-cat-id_error"></span><br>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="showDescription">{{ __('admin/estimates/edit.work_sub_category') }}</label>
            <input type="checkbox"
                {{ isset($estimate->job_sub_cat_id) && $estimate->job_sub_cat_id ? 'checked' : '' }}
                id="showDescription" name="job_sub_cat_id" class="form-check-input">
            {{-- <select id="jobSubcategory" name="job_sub_cat_id" class="form-control">
                <option value="">Select a job subcategory</option>
            </select> --}}
            <span class="error-message error-messages" id="jobSubcategory_error"></span><br>
        </div>
    </div>

</div>
<div class="row" id="descriptionContainer"
    style="{{ isset($estimate->job_sub_cat_id) && $estimate->job_sub_cat_id ? '' : 'display: none;' }}">
    <div class="col-md-4">
        <strong>&nbsp;</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="jobSubDescription">Work Sub Description</label>
            <textarea id="jobSubDescription" name="job_sub_description" class="form-control"
                placeholder="Work Sub Category Description">{{ isset($estimate->job_sub_description) ? old('job_sub_description', $estimate->job_sub_description) : '' }}</textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.work_description') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <textarea class="form-control" name="job_description"
                placeholder="{{ __('admin/estimates/edit.work_description') }}">{{ isset($estimate->job_description) ? old('job_description', $estimate->job_description) : '' }}</textarea>
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.po_number') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <input value="{{ isset($estimate->po_no) ? old('po_no', $estimate->po_no) : '' }}" type="tel"
                class="form-control" name="po_no" placeholder="{{ __('admin/estimates/edit.po_number') }}">
        </div>
    </div>
</div>
<hr />
{{-- <div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.work_source') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <select id="job_sour" name="job_source" class="form-control">
                <option value="">Select {{ __('admin/estimates/edit.work_source') }}</option>
                @foreach ($job_source as $job_sour)
                    <option
                        {{ isset($estimate->job_source) ? (old('job_source', $estimate->job_source) ? 'selected' : '') : '' }}
                        value="{{ $job_sour->id }}">{{ $job_sour->name }}</option>
                @endforeach
            </select>
            <span class="error-message error-messages" id="job_sour_error"></span><br>
        </div>
    </div>
</div> --}}
<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.representative') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <select name="agent" id="agent" class="form-control">
                <option value="">select Agent</option>
                @foreach ($agent as $cust)
                    <option {{ isset($estimate->agent) ? (old('agent', $estimate->agent) ? 'selected' : '') : '' }}
                        value="{{ $cust->id }}">{{ $cust->name }}</option>
                @endforeach
            </select>
            <span class="error-message error-messages" id="customer_id_error"></span><br>
        </div>

    </div>
</div>
@section('scripts')
    <script>
        $(document).ready(function() {
            function appendContact(contact) {
                const template = $('#contact-template').html();
                const $contact = $(template);
                $contact.find('input[name="phone[]"]').val(contact.number || '');
                $contact.find('input[name="ext[]"]').val(contact.ext || '');
                $contact.find('input[name="email[]"]').val(contact.email || '');
                $('#primary-contacts-container').append($contact);
            }

            $('#customer_id').change(function() {
                const contacts = $(this).find('option:selected').data('contacts');
                console.log(contacts);

                $('#primary-contacts-container').empty();
                if (contacts) {
                    contacts.forEach(contact => appendContact(contact));
                } else {
                    appendContact({});
                }
            });

            $(document).on('click', '.add-contact', function() {
                appendContact({});
            });

            $(document).on('click', '.remove-contact', function() {
                $(this).closest('.row').next('.row').remove(); // Remove email row
                $(this).closest('.row').remove(); // Remove phone and ext row
            });

            // Trigger change event on page load to populate contacts if a customer is already selected
            if ($('#customer_id').val()) {
                $('#customer_id').trigger('change');
            }
        });
    </script>
@endsection
