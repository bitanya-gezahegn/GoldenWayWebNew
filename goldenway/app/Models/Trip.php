<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_id',
        'departure_time',
        'arrival_time',
        'price',
        'capacity',
    ];

    /**
     * Define a relationship with the Route model.
     */
    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
