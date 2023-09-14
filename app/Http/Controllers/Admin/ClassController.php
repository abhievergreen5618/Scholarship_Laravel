<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClassRequest;
use App\Models\ClassModel;
use App\Models\Subject;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.class.index');
        $class = ClassModel::find(2);
        dd($class);
    }

    public function display(Request $request)
    {


        if ($request->ajax()) {
            $GLOBALS['count'] = 0;
            $data = ClassModel::latest()->get(['id','class','description','status']);
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id = encrypt($row->id);
                    $editlink = route('admin.class.edit', ['id' => $id]);
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = ClassModel::orderByRaw('CAST(class AS UNSIGNED)')->get();

        return view("admin.class.add")->with('classes',$classes);
    }

    public function editdata()
    {
        return view("admin.class.editdata");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRequest $request)
    {

        $validatedData = $request->validated();

        $class = $validatedData['class'];

        $request->validate(
            [
                "description"=>'required',
                "status"=>'required',
            ]
            );
       try{
        ClassModel::create([
            "class" => $request->class,
            "description" => $request->description,
            "status" => $request->status,
        ]);

        return redirect(route('admin.class.index'))->with("msg", "Class Created Successfully");
    }
    catch (QueryException $e) {
        $errorCode = $e->getCode();

        if ($errorCode == 23000) {
            return redirect()->back()->with('error', 'Class already exists in the database.');
        } else {
            return redirect()->back()->with('error', 'An error occurred while saving the class.');
        }
    }
    }



    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ClassModel::where("id",decrypt($id))->first();
        return view('admin.class.editdata')->with([
            "data"=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassRequest $request)
    {
        $request->validate(
            [
                "description"=>'required',
                "status"=>'required',
            ]
            );

        ClassModel::where("id",decrypt($request['id']))->update([
            "description" => $request->description,
            "status" => $request->status,
        ]);
        return redirect(route('admin.class.index'))->with("msg", "Class Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate(
        [
            "id"=>'required',
        ]
    );
        ClassModel::where("id",decrypt($request['id']))->delete();
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
            $status = ClassModel::where('id',decrypt($request['id']))->first('status');
            $status = ($status['status'] == "active") ? "inactive" : "active";
            ClassModel::where('id',decrypt($request['id']))->Update([
                "status"=>$status,
            ]);
        $msg = "Status Updated Successfully";
        return response()->json(array("msg" => $msg), 200);
    }

}
