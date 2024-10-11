<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPrimaryContact extends Model
{
    use HasFactory;
    protected $table = 'job_primary_contacts';
    protected $guarded = [];
}
