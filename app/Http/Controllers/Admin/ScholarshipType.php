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
}
