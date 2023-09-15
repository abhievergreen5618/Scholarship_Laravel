<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentsDetails;

class PaymentRevenue extends Controller
{
    //
    public function index()
    {
        return view('admin.payment.index');
    }
    public function display(Request $request)
    {
        if ($request->ajax()) {
            $GLOBALS['count'] = 0;
            $data = PaymentsDetails::latest()->get(['id','razorpay_id']);
            return Datatables::of($data);
    }
}
}
 