<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bikes extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bikeDetails()
    {
        return $this->hasOne(BikeDetails::class, 'bike_id');
    }

    public function bookings()
    {
        return $this->hasMany(BikeBookings::class, 'bike_id');
    }

    public function notifications()
    {
        return $this->hasMany(BikeNotifications::class);
    }

    public function services()
    {
        return $this->hasMany(BikeServices::class, 'bike_id');
    }
}
