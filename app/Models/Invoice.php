<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function boot() {
        parent::boot();

        static::deleting(function ($invoice) {
            $invoice->service->each->delete();
        });
    }

    public function service()
    {
        return $this->hasMany(ProductandService::class,'invoice_id','id');
    }
    public function job()
    {
        return $this->belongsTo(Job::class,'job_id');
    }
    public function unpaid()
    {
        return $this->belongsTo(ProductandService::class,'id','invoice_id');
    }
    public function users()
{
    return $this->belongsTo(User::class,'createdBy');
}
}
