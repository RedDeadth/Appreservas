<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        
        'flight_id',
        
        'start_date',
        'end_date',
        'discount_percentage',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
