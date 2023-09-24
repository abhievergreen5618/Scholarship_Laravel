<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentsDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'razorpay_id',
        'amount',
        'status',
        'method',
        'description',
        'vpa',
        'bank',
        'card_id',
        'wallet',
        'error_code',
        'error_description',
        'error_source',
        'error_step',
        'error_reason',
        'payment_created_at',
        'user_id',
    ];

}
