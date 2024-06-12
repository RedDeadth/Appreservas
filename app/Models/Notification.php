<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = [
        "titulo",
        "descripcion",
        "flight_id",
        "start_date",
        "end_date",
    ];
}
