<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class IssueReport extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'description',
        'reported_at',
    ];

   

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}


