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
        'payment_date',
    ];
    public function ticket()
{
    return $this->belongsTo(Ticket::class);
}

public function customer()
{
    return $this->belongsTo(User::class, 'customer_id');
}

}
