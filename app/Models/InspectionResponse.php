<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionResponse extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function job()
{
    return $this->belongsTo(Job::class);
}

public function checklistItem()
{
    return $this->belongsTo(ChecklistItem::class);
}
public function checklist()
{
    return $this->belongsTo(InspectionChecklist::class);
}
public function notess()
    {
        return $this->hasOne(Notes::class,'job_id','location_id');
    }
}
