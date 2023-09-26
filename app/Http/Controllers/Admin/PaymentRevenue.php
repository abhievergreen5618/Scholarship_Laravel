<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentsDetails;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class PaymentRevenue extends Controller
{

    public function index(PaymentsDetails $payment)
    {
        $totalincome = $payment->totalIncome();
        return view('admin.payment.index')->with(["totalincome"=>$totalincome]);
    }

    public function displayfailure(Request $request,PaymentsDetails $payment)
    {
        if ($request->ajax()) {
            $data = $payment->failedTransaction();
            return Datatables::of($data)
            ->addColumn('name', function ($row)
            {
                return $row->user->name;
            })
            ->addColumn('email', function ($row)
            {
                return $row->user->email;
            })
            ->addColumn('mobileno', function ($row)
            {
                return $row->user->mobileno;
            })
            ->addColumn('status', function ($row)
            {
                return '<span class="badge bg-danger">'.$row->status.'</span>';
            })
            ->addColumn('action', function ($row)
            {
                $link = route('admin.user.viewdata',encrypt($row->user->id));
                $btn = "<div class='d-flex justify-content-around'><a href='$link' target='_blank' data-bs-toggle='tooltip' data-bs-placement='top' title='View User Details' class='btn limegreen btn-primary ml-2'><i class='fa fa-user' aria-hidden='true'></i></a></div>";
                return $btn;
            })
            ->rawColumns(['name','email','mobileno','status','action'])->make(true);
        }
    }
    
    public function displaysuccess(Request $request,PaymentsDetails $payment)
    {
        if ($request->ajax()) {
            $data = $payment->successfulPayment();
            return Datatables::of($data)
            ->addColumn('name', function ($row)
            {
                return $row->user->name;
            })
            ->addColumn('email', function ($row)
            {
                return $row->user->email;
            })
            ->addColumn('mobileno', function ($row)
            {
                return $row->user->mobileno;
            })
            ->addColumn('status', function ($row)
            {
                return '<span class="badge bg-success">'.$row->status.'</span>';
            })
            ->addColumn('action', function ($row)
            {
                $link = route('admin.user.viewdata',encrypt($row->user->id));
                $btn = "<div class='d-flex justify-content-around'><a href='$link' target='_blank' data-bs-toggle='tooltip' data-bs-placement='top' title='View User Details' class='btn limegreen btn-primary ml-2'><i class='fa fa-user' aria-hidden='true'></i></a></div>";
                return $btn;
            })
            ->rawColumns(['name','email','mobileno','status','action'])->make(true);
        }
    }
}
