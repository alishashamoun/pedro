<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function manager()
    {
        return $this->hasOne(User::class,'id','manager_id');
    }

    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function jobs()
    {
        return $this->hasOne(Job::class,'id','job_id');
    }
}
