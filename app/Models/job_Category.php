<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function job_sub_category()
    {
        return $this->hasOne(JobSubCategory::class,'id','job_sub_cat_id');
    }
    
}
