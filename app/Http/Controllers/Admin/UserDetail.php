<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB; 

class UserDetail extends Controller
{
    //

    public function index()
    {
        
        return view('admin.user.index');
    }

    public function create()
    {
        return view("admin.user.add");
    }

    public function display(Request $request)
    {
        
        $class = User::where('class')->get();
        $class = collect($class);
        $classfilter = $class->filter( function($value,$key)
        {
            return data_get($value , 'class');
        } );

        $classfilter = $classfilter->all();

        if ($request->ajax()) {
            $data = DB::table('users')->select(['id','name','email','mobileno','class','gender','dob','paddress','status'])->where('role','student')->latest()->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id = encrypt($row->id);
                    $editlink = route('admin.user.edit', ['id' => $id]);
                    $btn = "<div class='d-flex justify-content-around'><a href='$editlink' data-id='$id' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit' class='btn limegreen btn-primary  edit'><i class='fas fa-edit'></i></a><a href='javascript:void(0)' data-id='$id' class='delete btn red-btn btn-danger  '  data-bs-toggle='tooltip' data-bs-placement='top' title='Delete' '><i class='fa fa-trash' aria-hidden='true'></i></a></div>";
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == "inactive") {
                        $class = "btn btn-danger ms-2 status";
                        $btntext = "Inactive";
                    } else {
                        $class = "btn btn-success ms-2 status";
                        $btntext = "Active";
                    }
                    $id = encrypt($row->id);
                    $statusBtn = "<div class='d-flex justify-content-center'><a href='javascript:void(0)' data-id='$id' data-bs-toggle='tooltip' data-bs-placement='top' title='Task $btntext' class='$class'>$btntext</a></div>";
                    return $statusBtn;
                })
               
                ->rawColumns(['action','status']) 
                ->make(true);
        }
    }

    public function edit($id)
    {
        $data = User::where("id",decrypt($id))->first();
        return view('admin.user.add')->with([
            "data"=>$data
        ]);
    }

    public function update(ClassRequest $request)
    {
 
        $request->validate(
            [
                "name"=>'required',
                "email"=>'required',
                "mobileno"=>'required',
                "class"=>'required',
                "gender"=>'required',
                "dob"=>'required',
                "paddress"=>'required',
                "status"=>'required',
            ]
            );
            $class = EducationDetails::where('classes')->get();

             


        User::where("id",decrypt($request['id']))->update([
            "name" => $request->name,
            "email" => $request->email,
            "mobileno" => $request->mobileno,
            "class" => $class,
            "gender" => $request->gender,
            "dob" => $request->dob,
            "paddress" => $request->address,
            "status" => $request->status,
        ]);
        return redirect(route('admin.user.index'))->with("msg", "User Updated Successfully");
    }

    public function destroy(Request $request)
    {
        $request->validate(
        [
            "id"=>'required',
        ]
    );
    User::where("id",decrypt($request['id']))->delete();
        $msg = "Deleted Successfully";
        return response()->json(array('msg' => $msg),200);
    }

    public function status(Request $request) 
    {
        $request->validate(
            [
                "id"=>"required",
            ]
            );
            $status = User::where('id',decrypt($request['id']))->first('status');
            $status = ($status['status'] == "active") ? "inactive" : "active";
            User::where('id',decrypt($request['id']))->Update([
                "status"=>$status,
            ]);
        $msg = "Status Updated Successfully";
        return response()->json(array("msg" => $msg), 200);
    }
}
