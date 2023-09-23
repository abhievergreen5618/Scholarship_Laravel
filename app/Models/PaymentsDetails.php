<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentsDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'razorpay_id',
        'code',
        'description',
        'source',
        'step',
        'reason',
        'user_id',
    ];

}
