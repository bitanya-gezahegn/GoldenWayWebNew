<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'customer_id',
        'rating',
        'feedback',
    ];

    // Relationship to the customer (who gave the rating)
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    // Relationship to the driver (who received the rating)
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
