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
}
