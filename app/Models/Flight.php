<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'airline_id',
        'route_id',
        'departure_date_time',
        'arrival_date_time',
        'available_seats',
    ];
    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function getOccupiedSeats()
    {
        return $this->reservations->pluck('seat_number')->toArray();
    }
    public function getAvailableSeats()
    {
        $occupiedSeats = $this->getOccupiedSeats();
        return $this->available_seats - count($occupiedSeats);
    }
}