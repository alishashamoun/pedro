<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer_details';

    protected $guarded = [];

    protected $casts = [
        'active' => 'array',
        'fname' => 'array',
        'lname' => 'array',
        'phone_type' => 'array',
        'number' => 'array',
        'ext' => 'array',
        'department' => 'array',
        'job_title' => 'array',
        'email_type' => 'array',
        'email' => 'array',
        'nick_name' => 'array',
        'primary' => 'array',
        'billing_address' => 'array',
        'contact_type' => 'array',
        'address' => 'array',
        'aptNo' => 'array',
        'city' => 'array',
        'state' => 'array',
        'zip' => 'array',
        'assigned_rep' => 'array',
        'commission_sign' => 'array',
        'commission' => 'array',
    ];

    public function service()
    {
        return $this->hasMany(StoredService::class);
    }
    public function pricontact()
    {
        return $this->hasMany(PrimaryContact::class);
    }
    public function usname()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    
}
