<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScholarshipList;

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
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
