<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentsDetails;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class PaymentRevenue extends Controller
{

    public function index()
    {
        return view('admin.payment.index');
    }

    public function display(Request $request)
    {
        if ($request->ajax()) {
            $data = PaymentsDetails::latest()->get(['id','razorpay_id']);
           
            return Datatables::of($data) 
            ->addColumn('actions', function ($row) {
                return '<button>Edit</button>';
            })
            ->rawColumns(['actions']) 
            ->make(true);
        }
    }
}
 