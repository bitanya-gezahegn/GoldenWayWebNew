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

    /**
     * Get the customer associated with the ticket.
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Get the payment associated with the ticket.
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * Get the refund associated with the ticket.
     */
    public function refund()
    {
        return $this->hasOne(Refund::class, 'payment_id', 'payment_id');
    }
 
}
