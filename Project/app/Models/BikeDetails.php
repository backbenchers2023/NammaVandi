<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeDetails extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bike()
    {
        return $this->belongsTo(Bikes::class);
    }
}
