<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'payment_id',
        'payer_id',
        'amount',
        'currency',
        'payment_status',
        
    ];
}
