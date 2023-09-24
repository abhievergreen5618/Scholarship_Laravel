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
            $data = PaymentsDetails::where('status','')->get(['id','user_id','razorpay_id','code','description','source','step','reason']);
            return Datatables::of($data)
            ->addColumn('actions', function ($row)
            {
                return '<button>Edit</button>';
            })->rawColumns(['actions'])->make(true);
        }
    }
}
