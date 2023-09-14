<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeDetail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB; 


class FeeController extends Controller
{
    //

    public function index()
    {
        
        return view('admin.fee.index');
    }

    public function display(Request $request)
    {

        
        if ($request->ajax()) {
            $GLOBALS['count'] = 0;
            $data = FeeDetail::latest()->get(['id','feetype','fee','description','status']);
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id = encrypt($row->id);
                    $editlink = route('admin.fee.edit', ['id' => $id]);
                    $btn = "<div class='d-flex justify-content-around'><a href='$editlink' data-id='$id' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit' class='btn limegreen btn-primary  edit'><i class='fas fa-edit'></i></a>
                    </div>";
                    // <a href='javascript:void(0)' data-id='$id' class='delete btn red-btn btn-danger  '  data-bs-toggle='tooltip' data-bs-placement='top' title='Delete' '><i class='fa fa-trash' aria-hidden='true'></i></a>
                    
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

    public function create()
    {
        return view("admin.fee.add");
    }


    public function editdata()
    {
        return view("admin.fee.editdata");
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "feetype" => "required",
                "fee"=>'required',
                "description"=>'required',
                "status"=>'required',
            ]
            );


            FeeDetail::create([
            "feetype" => $request->feetype,
            "fee" => $request->fee,
            "description" => $request->description,
            "status" => $request->status,
        ]);
        
        return redirect(route('admin.fee.index'))->with("msg", "Fee Created Successfully");
    }

    public function edit($id)
    {
        $data = FeeDetail::where("id",decrypt($id))->first();
        return view('admin.fee.editdata')->with([
            "data"=>$data
        ]);
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                "fee"=>'required',
                "description"=>'required',
                "status"=>'required',
            ]
            );

            FeeDetail::where("id",decrypt($request['id']))->update([
            "fee" => $request->fee,
            "description" => $request->description,
            "status" => $request->status,
        ]);
        return redirect(route('admin.fee.index'))->with("msg", "Fee Updated Successfully");
    }

    public function destroy(Request $request)
{
    $request->validate(
    [
        "id"=>'required',
    ]
);
FeeDetail::where("id",decrypt($request['id']))->delete();
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
        $status = FeeDetail::where('id',decrypt($request['id']))->first('status');
        $status = ($status['status'] == "active") ? "inactive" : "active";
        FeeDetail::where('id',decrypt($request['id']))->Update([
            "status"=>$status,
        ]);
    $msg = "Fee Updated Successfully";
    return response()->json(array("msg" => $msg), 200);
}


}

