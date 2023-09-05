<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use Illuminate\Http\Request;
use App\Models\Subject;
use Yajra\DataTables\Facades\DataTables;

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
        return view("admin.subject.add");
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
             $data = Subject::latest()->get(['id','name','classes','description','status']);
             return Datatables::of($data)->addIndexColumn()
                 ->addColumn('action', function ($row) {
                     $id = encrypt($row->id);
                     $editlink = route('admin.subject.edit', ['id' => $id]);
                     $deletelink = route('admin.subject.delete',['id' => $id]);
                     $btn = "<div class='d-flex justify-content-around'><a href='$editlink' data-id='$id' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit' class='btn limegreen btn-primary  edit'><i class='fas fa-edit'></i></a><a href='$deletelink' data-id='$id' class='delete btn red-btn btn-danger  '  data-bs-toggle='tooltip' data-bs-placement='top' title='Delete'><i class='fa fa-trash' aria-hidden='true'></i></a></div>";
                     return $btn;
                 })
                 ->rawColumns(['action'])
                 ->make(true);
         }
         return view('admin.subject.index');
     }



    public function store(SubjectRequest $request)
    {
        Subject::create([
            "name" => $request->name,
            "classes" => $request->classes,
            "description" => $request->description,
            "status" => $request->status,
        ]);
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
        //
        $data = Subject::where("id",decrypt($id))->first();
        return view('admin.subject.add')->with([
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
    public function update(Request $request)
    {
        //

        Subject::where("id",decrypt($request['id']))->update([
            "name" => $request->name,
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
    public function destroy($id)
    {
        //
        $subject = Subject::where("id",decrypt($id))->first();
   
        if (!$subject) {
            return redirect()->route('admin.subject.index')->with("error", "Subject not found");
        }
    
        try {
            $subject->delete();
            return redirect()->route('admin.subject.index')->with("success", "Subject Deleted Successfully");
        } catch (\Exception $e) {
            // Handle any other exceptions if necessary
            return redirect()->route('admin.subject.index')->with("error", "Failed to delete Subject");
        }
    }
}
