<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function checkOut()
    {
        return $this->hasOne(Attendance::class, 'work_orders_id', 'work_orders_id')
            ->where('attendance', 'CheckOut');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
