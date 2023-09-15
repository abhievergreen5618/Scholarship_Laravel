<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentDetails;

class PaymentRevenue extends Controller
{
    //
    public function index()
    {
        return view('admin.payment.index');
    }
    public function display()
    {
        if ($request->ajax()) {
            $GLOBALS['count'] = 0;
            $data = PaymentDetails::latest()->get(['id','razorpay_id']);
            dd($data);
            return Datatables::of($data);
    }
}
}
 