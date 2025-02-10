<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_id',
        'date',

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
 
     /**
      * Get the schedules associated with the trip.
      */
     public function schedules()
     {
         return $this->hasMany(Schedule::class);
     }
     public function tickets()
     {
         return $this->hasMany(Ticket::class);
     }
 
}
