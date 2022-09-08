<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = "id_customer";
    public $timestamps = false;
    protected $fillable = ['id_customer', 'name', 'lastName', 'phone', 'email'];
}
