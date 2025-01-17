<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'customer_id',
        'seat_number',
        'status',
        'qr_code',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }


public function payments()
{
    return $this->hasMany(Payment::class);
}

}
