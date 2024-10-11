<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyRequest extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function users()
    {
        return $this->belongsTo(User::class, 'createdBy');
    }
    public function supply_item()
    {
        return $this->hasMany(SupplyItem::class);
    }
}
