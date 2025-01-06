<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'origin',
        'destination',
        'bus_stops',
    ];

    /**
     * Define a relationship with the Trip model.
     */
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
