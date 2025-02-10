<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'driver_id',
        'bus_id',
        'status',
    ];

  
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
   
    
    
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    /**
     * Get the driver associated with the schedule.
     */
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    /**
     * Get the tickets associated with the schedule.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
