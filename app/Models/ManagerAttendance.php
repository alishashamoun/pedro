<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerAttendance extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function checkOut()
    {
        return $this->hasOne(ManagerAttendance::class)
            ->where('attendance', 'CheckOut');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
