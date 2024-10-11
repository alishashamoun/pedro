<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_code',
        'password',
        'is_email_verified'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function scopeWithRole($query, $roleName)
    {
        return $query->whereHas('roles', function ($query) use ($roleName) {
            $query->where('name', $roleName);
        });
    }
    public function userdetail()
    {
        return $this->hasOne(CompanyProfile::class, 'vendor_id');
    }
    public function files()
    {
        return $this->hasMany(CompanyDocuments::class, 'vendor_id', 'id');
    }
    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_id', 'id');
    }
    public function services()
    {
        return $this->belongsToMany(Services::class, 'service_user');
    }
    public function service()
    {
        return $this->hasMany(StoredService::class,'customer_id');
    }
    public function pricontact()
    {
        return $this->hasMany(PrimaryContact::class,'customer_id');
    }

    public function areasOfWork()
    {
        return $this->belongsToMany(AreaOfWork::class, 'area_of_work_user');
    }

}
