<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'customer_id',
        'amount',
        'payment_method',
        'payment_status',
        'ticket_status',
        'payment_date',
        'tx_ref', // Add tx_ref here
    ];
    
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * Get the customer associated with the payment.
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Get the refund associated with the payment.
     */
    public function refund()
    {
        return $this->hasOne(Refund::class);
    }

}
