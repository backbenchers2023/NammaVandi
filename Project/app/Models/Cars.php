<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function carDetails()
    {
        return $this->hasOne(CarDetails::class, 'car_id');
    }

    public function bookings()
    {
        return $this->hasMany(CarBookings::class, 'car_id');
    }

    public function notifications()
    {
        return $this->hasMany(CarNotifications::class);
    }

    public function services()
    {
        return $this->hasMany(CarServices::class, 'car_id');
    }
}
