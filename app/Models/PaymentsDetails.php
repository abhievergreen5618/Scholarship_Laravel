<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function failedTransaction()
    {
        return PaymentsDetails::with('user')->where('status', 'failed')->get();
    }

    public function successfulPayment()
    {
        return PaymentsDetails::with('user')->where('status', 'authorized')->get();
    }

    public function totalIncome()
    {
        return PaymentsDetails::where('status', 'authorized')->sum('amount');
    }

    public function sessionPayments($session)
    {
        $session = ScholarshipSession::where('id', $session)->first(["session_duration_start", "session_duration_end"]);

        // Convert session dates to the same format as payment_created_at
        $startDate = date('Y-m-d H:i:s', strtotime($session['session_duration_start']));
        $endDate = date('Y-m-d H:i:s', strtotime($session['session_duration_end']));

        return PaymentsDetails::where('status', 'authorized')
            ->whereBetween('payment_created_at', [$startDate, $endDate])
            ->get();
    }
}
