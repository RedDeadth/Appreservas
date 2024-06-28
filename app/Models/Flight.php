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
        'price'
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
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    // Método para obtener el precio con todas las ofertas aplicadas
    public function getPriceWithOffersAttribute()
    {
    $price = $this->price;
    $offers = $this->offers()->whereDate('start_date', '<=', now())
                             ->whereDate('end_date', '>=', now())
                             ->get();

    foreach ($offers as $offer) {
        if ($offer->discount_percentage > 0) {
            $discount = ($price * $offer->discount_percentage) / 100;
            $price -= $discount;
            $price = round($price, 2);
        }
    }

    return $price;
    }
}