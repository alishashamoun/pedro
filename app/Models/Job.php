<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'phone' => 'array',
        'ext_id' => 'array',
        'ext' => 'array',
        'email' => 'array',
    ];

    public function customer()
    {
        return $this->hasOne(User::class, 'id', 'customer_id');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class, );
    }
    public function manager()
    {
        return $this->hasOne(User::class, 'id', 'account_manager_id');
    }
    public function agentname()
    {
        return $this->hasOne(User::class, 'id', 'agent');
    }

    public function job_category()
    {
        return $this->hasOne(job_Category::class, 'id', 'job_cat_id');
    }

    public function job_prioirty()
    {
        return $this->hasOne(job_priority_category::class, 'id', 'job_priority');
    }

    public function job_source_name()
    {
        return $this->hasOne(job_source_category::class, 'id', 'job_source');
    }
    // 'customer','job_category','job_prioirty','job_source',
    public function jobPri()
    {
        return $this->hasMany(JobPrimaryContact::class);
    }
    public function customerPri()
    {
        return $this->hasManyThrough(PrimaryContact::class, Customer::class);
    }

    public function task()
    {
        return $this->hasOne(Task::class, 'job_id');
    }
    public function workOrder()
    {
        return $this->hasOne(WorkOrders::class, 'job_id');
    }
    public function estimate()
    {
        return $this->hasOne(Estimate::class, 'id', 'estimate_id');
    }
    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }
    public function inspectionChecklists()
    {
        return $this->belongsToMany(InspectionChecklist::class, 'location_inspection_checklist');
    }
    public function inspectionResponse()
    {
        return $this->hasMany(InspectionResponse::class, 'location_id');
    }

    public function getParsedStatusAttribute()
    {
        if ($this->attributes['current_status'] == 1) {
            return 'Unscheduled';
        } else if ($this->attributes['current_status'] == 2) {
            return 'Scheduled';
        } else if ($this->attributes['current_status'] == 3) {
            return 'Dispatch';
        } else if ($this->attributes['current_status'] == 4) {
            return 'Canceled';
        } else if ($this->attributes['current_status'] == 5) {
            return 'Rescheduled';
        } else if ($this->attributes['current_status'] == 6) {
            return 'On Site';
        } else if ($this->attributes['current_status'] == 7) {
            return 'In Process';
        } else if ($this->attributes['current_status'] == 8) {
            return 'Partially';
        } else if ($this->attributes['current_status'] == 9) {
            return 'Completed';
        } else if ($this->attributes['current_status'] == 10) {
            return 'Awaiting Checklist';
        }
        return '';
    }


    protected $appends = ['parsedStatus'];
}
