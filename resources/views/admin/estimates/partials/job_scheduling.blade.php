<style>
    .rating {
        display: inline-block;
    }

    .rating input {
        display: none;
    }

    .rating label {
        font-size: 30px;
        color: #ccc;
        cursor: pointer;
    }

    .rating label:hover,
    .rating label:hover~label {
        color: #d37312;
    }

    .rating input:checked~label {
        color: #d37312;
    }
</style>
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.date_of_request') }}
        </strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <input value="{{ isset($estimate->requested_on) ? old('requested_on', $estimate->requested_on) : '' }}" type="date" class="form-control" name="requested_on" placeholder="Start Date" >
            <p class="start-date-error error-message error-messages" style="display: none;">Enter a valid start date</p>
        </div>
    </div>
</div>

<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.status') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <select id="fruits" name="current_status" class="form-control">
                <option value="" disabled hidden selected>Quotation Request</option>
                <option value="1" {{ isset($estimate->current_status) && $estimate->current_status == 1 ? 'selected' : '' }}>Unscheduled</option>
                <option value="2" {{ isset($estimate->current_status) && $estimate->current_status == 2 ? 'selected' : '' }}>Scheduled</option>
                <option value="3" {{ isset($estimate->current_status) && $estimate->current_status == 3 ? 'selected' : '' }}>Dispatch</option>
                <option value="4" {{ isset($estimate->current_status) && $estimate->current_status == 4 ? 'selected' : '' }}>Canceled</option>
                <option value="5" {{ isset($estimate->current_status) && $estimate->current_status == 5 ? 'selected' : '' }}>Rescheduled</option>
                <option value="6" {{ isset($estimate->current_status) && $estimate->current_status == 6 ? 'selected' : '' }}>On Site</option>
                <option value="7" {{ isset($estimate->current_status) && $estimate->current_status == 7 ? 'selected' : '' }}>In Process</option>
                <option value="8" {{ isset($estimate->current_status) && $estimate->current_status == 8 ? 'selected' : '' }}>Partially</option>
            </select>

            <p class="current-status-error error-message error-messages" style="display: none;">Please select a current
                status</p>
        </div>
    </div>
    <div class="col-md-2">
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.source_of_referral') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <select id="fruits" name="referral_source" class="form-control">
                <option value="" disabled hidden>Unknown Source</option>
                <option {{ old('referral_source', isset($estimate) ? $estimate->referral_source : '') == '1' ? 'selected' : '' }} value="1">Presonal</option>
                <option {{ old('referral_source', isset($estimate) ? $estimate->referral_source : '') == '2' ? 'selected' : '' }} value="2">Contacts</option>
            </select>
            <p class="current-status-error error-message error-messages" style="display: none;">Please select a current
                status</p>
        </div>
    </div>
    <div class="col-md-2">
    </div>
</div>
<hr />

<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.rating_scale') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <div class="rating">
                <input type="radio" id="star5" name="opportunity_rating" value="5" {{ isset($estimate->opportunity_rating) && $estimate->opportunity_rating == '5' ? 'checked' : '' }} />
                <label for="star5">&#9733;</label>

                <input type="radio" id="star4" name="opportunity_rating" value="4" {{ isset($estimate->opportunity_rating) && $estimate->opportunity_rating == '4' ? 'checked' : '' }} />
                <label for="star4">&#9733;</label>

                <input type="radio" id="star3" name="opportunity_rating" value="3" {{ isset($estimate->opportunity_rating) && $estimate->opportunity_rating == '3' ? 'checked' : '' }} />
                <label for="star3">&#9733;</label>

                <input type="radio" id="star2" name="opportunity_rating" value="2" {{ isset($estimate->opportunity_rating) && $estimate->opportunity_rating == '2' ? 'checked' : '' }} />
                <label for="star2">&#9733;</label>

                <input type="radio" id="star1" name="opportunity_rating" value="1" {{ isset($estimate->opportunity_rating) && $estimate->opportunity_rating == '1' ? 'checked' : '' }} />
                <label for="star1">&#9733;</label>

            </div>
        </div>
    </div>
    <div class="col-md-2">
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.labels') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <input value="{{ isset($estimate->tags) ? old('tags', $estimate->tags) : '' }}" type="text" class="form-control" name="tags" placeholder="Type to add a Tags">
            <p class="tags-error error-message error-messages" style="display: none;">Please select a current status</p>
        </div>
    </div>
    <div class="col-md-2">
    </div>
</div>
<hr />

{{-- <div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.opportunity_holder') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <input value="{{ isset($estimate->opportunity_owner) ? old('opportunity_owner', $estimate->opportunity_owner) : '' }}" type="text" class="form-control" name="opportunity_owner" placeholder="Opportunity Owner">
            <p class="opportunity-owner-error error-message error-messages" style="display: none;">Please select a
                current status</p>
        </div>
    </div>
    <div class="col-md-2">
    </div>
</div> --}}
<hr />

<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.on_site_date') }}
        </strong>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input value="{{ isset($estimate->start_date) ? old('start_date', $estimate->start_date) : '' }}" type="date" class="form-control" name="start_date" placeholder="Start Date">
            <p class="start-date-error error-message error-messages" style="display: none;">Enter a valid start date
            </p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input value="{{ isset($estimate->end_date) ? old('end_date', $estimate->end_date) : '' }}" type="date" class="form-control" name="end_date" placeholder="End Date">
            <p class="end-date-error error-message error-messages" style="display: none;">Enter a valid start date</p>
        </div>
    </div>

    <div class="col-md-4">
        <strong></strong>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input value="{{ isset($estimate->arrival_start) ? old('arrival_start', $estimate->arrival_start) : '' }}" type="text" class="form-control" name="arrival_start" placeholder="Arrival Start">
            <p class="start-time-error error-message error-messages" style="display: none;">Enter a valid Arrival
                Start</p>
        </div>
    </div>
    <div class="col-md-4">
        <input value="{{ isset($estimate->arrival_end) ? old('arrival_end', $estimate->arrival_end) : '' }}" type="text" class="form-control" name="arrival_end" placeholder="Arrival End">
        <p class="end-time-error error-message error-messages" style="display: none;">Enter a valid Arrival End</p>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <strong></strong>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <input value="{{ isset($estimate->start_duration) ? old('start_duration', $estimate->start_duration) : '' }}" type="number" class="form-control" name="start_duration" placeholder="1">
            <p class="start-duration-error error-message error-messages" style="display: none;">Enter a valid start
                duration</p>
        </div>

    </div>
    <span style="margin: 5px;color: #7b7878;">h</span>
    <div class="col-md-2">
        <input value="{{ isset($estimate->end_duration) ? old('end_duration', $estimate->end_duration) : '' }}" type="number" class="form-control" name="end_duration" placeholder="1">
        <p class="start-duration-error error-message error-messages" style="display: none;">Enter a valid end duration
        </p>
    </div>
    <span style="margin: 5px;color: #7b7878;">m</span>
</div>
<hr />

<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.technician_assigned') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <input value="{{ isset($estimate->assigned_tech) ? old('assigned_tech', $estimate->assigned_tech) : '' }}" type="text" class="form-control" name="assigned_tech" placeholder="techs">
            <p class="assigned-tech-error error-message error-messages" style="display: none;">Please enter the
                assigned team(s)</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input {{ isset($estimate->notify_tech_assign) && $estimate->notify_tech_assign ? 'checked' : '' }} type="checkbox" name="notify_tech_assign" placeholder="Location Name(e.g Home or Office)"> Notifiy
            all tech(s)assigned
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.technician_instructions') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <textarea class="form-control" name="notes_for_tech" placeholder="Technical Instructions.">{{ isset($estimate->notes_for_tech) ? old('notes_for_tech', $estimate->notes_for_tech) : '' }}</textarea>
            <p class="notes-for-tech-error error-message error-messages" style="display: none;">Please enter Technical
                Instructions</p>
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/estimates/edit.notes_of_completion') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <textarea class="form-control" name="completion_notes" placeholder="Finish Notes.">{{ isset($estimate->completion_notes) ? old('completion_notes', $estimate->completion_notes) : '' }}</textarea>
            <p class="completion-notes-error error-message error-messages" style="display: none;">Please enter Finish
                Notes</p>

        </div>
    </div>
</div>
