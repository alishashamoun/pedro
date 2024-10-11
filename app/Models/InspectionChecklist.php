<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionChecklist extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function locations()
{
    return $this->belongsToMany(Job::class, 'location_name');
}
public function checklistItems()
{
    return $this->hasMany(ChecklistItem::class,'inspection_checklist_id');
}
public function users()
{
    return $this->belongsTo(User::class,'createdBy');
}
}
