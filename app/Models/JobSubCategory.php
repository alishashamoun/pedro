<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function job_category()
    {
        return $this->hasOne(job_Category::class,'id','job_cat_id');
    }
}
