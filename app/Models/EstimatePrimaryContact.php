<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimatePrimaryContact extends Model
{
    use HasFactory;

    protected $table = 'estimate_primary_contacts';
    protected $guarded = [];
}
