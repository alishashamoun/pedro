<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemReporting extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jobname(){
        return $this->belongsTo(Job::class,'job', 'id');
    }
    public function usname(){
        return $this->belongsTo(User::class,'createdBy', 'id');
    }
}
