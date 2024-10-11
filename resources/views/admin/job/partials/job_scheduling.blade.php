<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/job/edit.current_status') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <select id="fruits" name="current_status" class="form-control">
                <option value="" selected hidden disabled>Select status</option>
                <option {{ old('current_status', isset($job) ? $job->current_status : '') == '1' ? 'selected' : '' }}
                    value="1">{{ __('admin/job/edit.unscheduled') }}</option>
                <option {{ old('current_status', isset($job) ? $job->current_status : '') == '2' ? 'selected' : '' }}
                    value="2">{{ __('admin/job/edit.scheduled') }}</option>
                <option {{ old('current_status', isset($job) ? $job->current_status : '') == '3' ? 'selected' : '' }}
                    value="3">{{ __('admin/job/edit.dispatch') }}</option>
                <option {{ old('current_status', isset($job) ? $job->current_status : '') == '4' ? 'selected' : '' }}
                    value="4">{{ __('admin/job/edit.canceled') }}</option>
                <option {{ old('current_status', isset($job) ? $job->current_status : '') == '5' ? 'selected' : '' }}
                    value="5">{{ __('admin/job/edit.rescheduled') }}</option>
                <option {{ old('current_status', isset($job) ? $job->current_status : '') == '6' ? 'selected' : '' }}
                    value="6">{{ __('admin/job/edit.on_site') }}</option>
                <option {{ old('current_status', isset($job) ? $job->current_status : '') == '7' ? 'selected' : '' }}
                    value="7">{{ __('admin/job/edit.in_process') }}</option>
                <option {{ old('current_status', isset($job) ? $job->current_status : '') == '8' ? 'selected' : '' }}
                    value="8">{{ __('admin/job/edit.partially') }}</option>
                <option {{ old('current_status', isset($job) ? $job->current_status : '') == '9' ? 'selected' : '' }}
                    value="9">{{ __('admin/job/edit.completed') }}</option>
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
        <strong>{{ __('admin/job/edit.start_end_dates') }}</strong>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input value="{{ isset($job->start_date) ? $job->start_date : '' }}" type="datetime-local"
                class="form-control" name="start_date" placeholder="{{ __('admin/job/edit.start_date') }}" step="1">
            <p class="start-date-error error-message error-messages" style="display: none;">Enter a valid start date</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input value="{{ isset($job->end_date) ? $job->end_date : '' }}" type="datetime-local"
                class="form-control" name="end_date" placeholder="{{ __('admin/job/edit.end_date') }}">
            <p class="end-date-error error-message error-messages" style="display: none;">Enter a valid start date</p>
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/job/edit.arrival_time_window') }}</strong>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input value="{{ isset($job->start_time) ? old('start_time', $job->start_time) : '' }}" type="time"
                class="form-control" name="start_time" placeholder="{{ __('admin/job/edit.start_time') }}">
            <p class="start-time-error error-message error-messages" style="display: none;">Enter a valid start time</p>
        </div>
    </div>
    <div class="col-md-4">
        <input value="{{ isset($job->end_time) ? old('end_time', $job->end_time) : '' }}" type="time"
            class="form-control" name="end_time" placeholder="{{ __('admin/job/edit.end_time') }}">
        <p class="end-time-error error-message error-messages" style="display: none;">Enter a valid start time</p>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/job/edit.estimated_duration') }}</strong>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input value="{{ isset($job->start_duration) ? old('start_duration', $job->start_duration) : '' }}"
                type="number" class="form-control" name="start_duration" placeholder="{{ __('admin/job/edit.start_duration') }}">
            <p class="start-duration-error error-message error-messages" style="display: none;">Enter a valid start
                duration</p>
        </div>
    </div>
    <div class="col-md-4">
        <input value="{{ isset($job->end_duration) ? old('end_duration', $job->end_duration) : '' }}" type="number"
            class="form-control" name="end_duration" placeholder="{{ __('admin/job/edit.end_duration') }}">
        <p class="start-duration-error error-message error-messages" style="display: none;">Enter a valid end duration
        </p>

    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/job/edit.job_priority') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <select id="job_pro" name="job_priority" class="form-control">
                <option value="">Select {{ __('admin/job/edit.job_priority') }}</option>
                @foreach ($job_prioirty as $job_por)
                    <option
                        {{ isset($job->job_priority) ? (old('job_priority', $job->job_priority) ? 'selected' : '') : '' }}
                        value="{{ $job_por->id }}">{{ $job_por->name }}</option>
                @endforeach
            </select>
            <p class="job-priority-error error-message error-messages" style="display: none;">Select a {{ __('admin/job/edit.job_priority') }}</p>
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/job/edit.assign_techs') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <input value="{{ isset($job->assigned_tech) ? old('assigned_tech', $job->assigned_tech) : '' }}"
                type="text" class="form-control" name="assigned_tech" placeholder="techs">
            <p class="assigned-tech-error error-message error-messages" style="display: none;">Please enter the assigned
                tech(s)</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input {{ isset($job->notify_tech_assign) && $job->notify_tech_assign ? 'checked' : '' }} type="checkbox"
                name="notify_tech_assign" placeholder="Location Name(e.g Home or Office)"> {{ __('admin/job/edit.notify_tech_assign') }}
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/job/edit.notes_for_techs') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <textarea class="form-control" name="notes_for_tech" placeholder="{{ __('admin/job/edit.notes_for_techs') }}.">{{ isset($job->notes_for_tech) ? old('notes_for_tech', $job->notes_for_tech) : '' }}</textarea>
            <p class="notes-for-tech-error error-message error-messages" style="display: none;"></p>
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-4">
        <strong>{{ __('admin/job/edit.completion_notes') }}</strong>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <textarea class="form-control" name="completion_notes" placeholder="{{ __('admin/job/edit.completion_notes') }}.">{{ isset($job->completion_notes) ? old('completion_notes', $job->completion_notes) : '' }}</textarea>
            <p class="completion-notes-error error-message error-messages" style="display: none;">Please enter
                completion notes</p>

        </div>
    </div>
</div>
