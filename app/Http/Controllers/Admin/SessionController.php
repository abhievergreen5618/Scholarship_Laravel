<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScholarshipSession;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.session.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.session.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ScholarshipSession $session)
    {
        try {
            $request->validate([
                "name" => "required",
                "session_duration" => "required",
                "description" => "required",
                "status" => "required",
            ], [
                "required" => "The field is required.",
            ]);

            $session->name = $request->input('name');
            $session->session_duration = $request->input('session_duration');
            $session->exam_date = $request->input('exam_date', null); // Use null as default if not provided
            $session->description = $request->input('description', null); // Use null as default if not provided
            $session->status = $request->input('status');
            $session->save();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            // Log the exception for debugging: Log::error($e->getMessage());
            return redirect()->back()->with("error", "Something Went Wrong.");
        }

        return redirect()->route('admin.session.index')->with("msg", "Session Created Successfully.");
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
        $data = ScholarshipSession::where("id", decrypt($id))->first();
        return view('admin.session.add')->with([
            "data" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScholarshipSession $session)
    {
        try {
            $request->validate(
                [
                    "id" => "required",
                    "name" => "required",
                    "session_duration" => "required",
                    "description" => "required",
                    "status" => "required",
                ],
                [
                    "required" => "The field is required.",
                ]
            );

            // Retrieve the session by ID
            $session = ScholarshipSession::find(decrypt($request->input('id')));

            if (!$session) {
                return redirect()->back()->with("error", "Session not found.");
            }

            $session->name = $request->input('name');
            $session->session_duration = $request->input('session_duration');
            $session->exam_date = $request->input('exam_date', null); // Use null as default if not provided
            $session->description = $request->input('description', null); // Use null as default if not provided
            $session->status = $request->input('status');
            $session->save();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            // Log the exception for debugging: Log::error($e->getMessage());
            return redirect()->back()->with("error", "Something Went Wrong.");
        }
        return redirect()->route('admin.session.index')->with("msg", "Session Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $request->validate(
                [
                    "id" => "required",
                ]
            );
            ScholarshipSession::where("id",decrypt($request['id']))->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            // Log the exception for debugging: Log::error($e->getMessage());
            return response()->json(array("msg" => "Something Went Wrong."), 500);
        }
        return response()->json(array('msg' => "Deleted Successfully"),200);
    }

    public function status(Request $request)
    {
        try {
            $request->validate(
                [
                    "id" => "required",
                ]
            );
            $status = ScholarshipSession::where('id', decrypt($request['id']))->first('status');
            $status = ($status['status'] == "active") ? "inactive" : "active";
            ScholarshipSession::where('id', decrypt($request['id']))->Update([
                "status" => $status,
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            // Log the exception for debugging: Log::error($e->getMessage());
            return response()->json(array("msg" => "Something Went Wrong."), 500);
        }
        return response()->json(array("msg" => "Status Updated Successfully"), 200);
    }

    public function display(Request $request, ScholarshipSession $session)
    {
        if ($request->ajax()) {
            $data = $session->getSession();
            return Datatables::of($data)
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
                ->addColumn('action', function ($row) {
                    $id = encrypt($row->id);
                    $editlink = route('admin.session.edit', ['id' => $id]);
                    $btn = "<div class='d-flex justify-content-around'><a href='$editlink' data-id='$id' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit' class='btn limegreen btn-primary  edit'><i class='fas fa-edit'></i></a><a href='javascript:void(0)' data-id='$id' class='delete btn red-btn btn-danger  '  data-bs-toggle='tooltip' data-bs-placement='top' title='Delete' '><i class='fa fa-trash' aria-hidden='true'></i></a></div>";
                    return $btn;
                })
                ->rawColumns(['status', 'action'])->make(true);
        }
    }
}
