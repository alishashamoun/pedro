<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaOfWork extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function users()
    {
        return $this->belongsToMany(User::class, 'area_of_work_user');
    }
}
