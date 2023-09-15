<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\ClassModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.subject.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $classes = ClassModel::where('status', 'active')->orderBy('class', 'asc')->pluck("class","id");
        return view("admin.subject.add")->with("classes", $classes);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function display(Request $request)
     {
         if ($request->ajax()) {
            $data = Subject::orderBy('created_at', 'desc')->get(['id', 'name', 'classes', 'description', 'status','created_at']);
             return Datatables::of($data)->addIndexColumn()
                 ->addColumn('action', function ($row) {
                     $id = encrypt($row->id);
                     $editlink = route('admin.subject.edit', ['id' => $id]);
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
         return view('admin.subject.index');
     }



    public function store(Request $request)
    {
        $request->validate(
            [
                "name" => 'required',
                "classes"=>'required',
                "status"=>'required',
            ]
        );
        $subject = Subject::create([
            "name" => $request->name,
            "classes" => $request->classes,
            "description" => $request->description,
            "status" => $request->status,
        ]);
        $subject->classes()->sync($request->classes);
        return redirect(route('admin.subjects.index'))->with("msg", "Subject Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $data = Subject::where("id",decrypt($id))->first();
        return view('admin.subject.editdata')->with([
            "data"=>$data
        ]);
    }


    public function editdata()
    {
        $classes = ClassModel::where('status', 'active')
            ->orderBy('class', 'asc')
            ->get();

        $classSelect = $classes->pluck('class')->toArray();
        return view("admin.subject.editdata")->with('classSelect',$classSelect);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request)
    {
        $request->validate(
            [
                "classes"=>'required',
                "status"=>'required',
            ]
            );

        Subject::where("id",decrypt($request['id']))->update([
            "classes" => $request->classes,
            "description" => $request->description,
            "status" => $request->status,
        ]);
        return redirect(route('admin.subjects.index'))->with("msg", "Subject Updated Successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
            $request->validate(
                [
                    "id"=>'required',
                ]
            );
            $subject = Subject::find(decrypt($request['id']));
            dd(($subject) ? 'true' : 'false');
            if ($subject) {
                $subject->delete();
                $subject->syncWithoutDetaching([decrypt($request['id'])]);
                $msg = "Deleted Successfully";
                return response()->json(array('msg' => $msg),200);
            } else {
                $msg = "Failed to delete";
                return response()->json(array('msg' => $msg),500);
            }


    }


    public function status(Request $request)
    {
        $request->validate(
            [
                "id"=>"required",
            ]
            );
            $status = Subject::where('id',decrypt($request['id']))->first('status');
            $status = ($status['status'] == "active") ? "inactive" : "active";
            Subject::where('id',decrypt($request['id']))->Update([
                "status"=>$status,
            ]);

        $msg = "Status Updated Successfully";
        return response()->json(array("msg" => $msg), 200);
    }



}
