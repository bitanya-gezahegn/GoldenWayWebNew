<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'customer_id',
        'refund_amount',
        'reason',
        'refund_status',
        'refund_date',
    ];
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id'); // Links refund to customer
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'payment_id', 'payment_id');
    }

}
