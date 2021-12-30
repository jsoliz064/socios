<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeudaPago extends Model
{
    use HasFactory;
    protected $table="deuda_pagos";
    protected $guarded=['id','created_at','updated_at'];
}
