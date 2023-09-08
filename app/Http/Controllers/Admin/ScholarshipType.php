<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScholarshipList;
use Yajra\DataTables\Facades\DataTables;

class ScholarshipType extends Controller
{
    //
    public function index()
    {
        return view('admin.scholarshiptype.index');
    }

    public function create()
    {
        return view('admin.scholarshiptype.add');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "name"=>"required",
                "status"=>"required",
            ]
            );
        ScholarshipList::create([
            "name" => $request->name,
            "description" => $request->description,
            "status" => $request->status,
        ]);
        return redirect(route('admin.scholarshiptype.index'))->with("msg", "Scholarship Added Successfully");
    }

    public function display(Request $request)
    {
        if ($request->ajax()) {
            $data = ScholarshipList::latest()->get(['id','name','description','status']);
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id = encrypt($row->id);
                    $editlink = route('admin.scholarshiptype.edit', ['id' => $id]);
                    $btn = "<div class='d-flex justify-content-around'><a href='$editlink' data-id='$id' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit' class='btn limegreen btn-primary  edit'><i class='fas fa-edit'></i></a><a href='javascript:void(0)' data-id='$id' class='delete btn red-btn btn-danger  '  data-bs-toggle='tooltip' data-bs-placement='top' title='Delete'><i class='fa fa-trash' aria-hidden='true'></i></a></div>";
                    return $btn;
                })->addColumn('status', function ($row) {
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
        $data = ScholarshipList::where("id",decrypt($id))->first();
        return view('admin.scholarshiptype.add')->with([
            "data"=>$data
        ]);
    }
    public function update(Request $request)
    {
        ScholarshipList::where("id",decrypt($request['id']))->update([
            "name" => $request->name,
            "description" => $request->description,
            "status" => $request->status,
        ]);
        return redirect(route('admin.scholarshiptype.index'))->with("msg", "Scholarship Updated Successfully");
    }


    public function destroy($id)
    {
        //
        $request->validate(
            [
                "id"=>'required',
            ]
        );
            ScholarshipList::where("id",decrypt($request['id']))->delete();
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
            $status = ScholarshipList::where('id',decrypt($request['id']))->first('status');
            $status = ($status['status'] == "active") ? "inactive" : "active";
            ScholarshipList::where('id',decrypt($request['id']))->Update([
                "status"=>$status,
            ]);
        $msg = "Status Updated Successfully";
        return response()->json(array("msg" => $msg), 200);
    }

}
