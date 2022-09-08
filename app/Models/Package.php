<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['details', 'weight', 'delivery_to', 'fk_id_customer', 'fk_id_status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'fk_id_customer');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'fk_id_status');
    }
}
