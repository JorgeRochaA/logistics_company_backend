<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['details', 'weight', 'delivery_from', 'delivery_to', 'fk_id_customer', 'fk_id_status'];
}
