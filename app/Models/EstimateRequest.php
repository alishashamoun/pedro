<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateRequest extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class, 'createdBy');
    }
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}
