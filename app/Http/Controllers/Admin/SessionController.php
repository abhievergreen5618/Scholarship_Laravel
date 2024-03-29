<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScholarshipSession;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Rules\UniqueDateRange;
use App\Jobs\AdmitCardEmailToUsers;




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
        $request->validate(
            [
                "name" => "required",
                "session_duration" => ['required', new UniqueDateRange],
                "status" => "required",
            ],
            [
                "required" => "The field is required.",
                'session_duration.unique_date_range' => 'The session duration conflicts with an existing record.',
            ]
        );

        try {
            $sessionduration = splitDateRange($request->input('session_duration'));
            $session->name = $request->input('name');
            $session->session_duration_start = $sessionduration['startDate'];
            $session->session_duration_end = $sessionduration['endDate'];
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
        $request->validate(
            [
                "id" => "required",
                "name" => "required",
                "session_duration" => "required",
                "status" => "required",
            ],
            [
                "required" => "The field is required.",
            ]
        );
        try {

            $sessionduration = splitDateRange($request->input('session_duration'));

            // Retrieve the session by ID
            $session = ScholarshipSession::find(decrypt($request->input('id')));

            if (!$session) {
                return redirect()->back()->with("error", "Session not found.");
            }

            $session->name = $request->input('name');
            $session->session_duration_start = $sessionduration['startDate'];
            $session->session_duration_end = $sessionduration['endDate'];
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
            ScholarshipSession::where("id", decrypt($request['id']))->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            // Log the exception for debugging: Log::error($e->getMessage());
            return response()->json(array("msg" => "Something Went Wrong."), 500);
        }
        return response()->json(array('msg' => "Deleted Successfully"), 200);
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
                ->addColumn('session_duration', function ($row) {
                    return $row->session_duration_start . " - " . $row->session_duration_end;
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
                ->addColumn('action', function ($row) {
                    $id = encrypt($row->id);
                    $editlink = route('admin.session.edit', ['id' => $id]);
                    $btn = "<div class='d-flex justify-content-around'><a href='$editlink' data-id='$id' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit' class='btn limegreen btn-primary  edit'><i class='fas fa-edit'></i></a><a href='javascript:void(0)' data-id='$id' class='delete btn red-btn btn-danger  '  data-bs-toggle='tooltip' data-bs-placement='top' title='Delete' '><i class='fa fa-trash' aria-hidden='true'></i></a></div>";
                    return $btn;
                })
                ->addColumn('current', function ($row) {
                    $id = encrypt($row->id);
                    $checked = ($row->current == "active") ? "checked" : "";
                    if($row->current == "active")
                    {
                        $admitcardchecked = ($row->admitcard == "active") ? "checked" : "";
                        $admitcard = "<div>Admit Card <input type='checkbox' name='my-checkbox' $admitcardchecked data-bootstrap-switch data-off-color='danger' data-on-color='success' data-req-id='$id'></div>";
                    }
                    else
                    {
                        $admitcard = "";
                    }
                    $btn = "<div class='icheck-primary d-inline'><input type='checkbox' class='current' data-id='$id' $checked></div>$admitcard";
                    return $btn;
                })
                ->rawColumns(['status', 'action', 'current'])->make(true);
        }
    }

    public function admitcardupdate(Request $request,ScholarshipSession $session)
    {
        if($request->ajax())
        {
            try
            {
                $request->validate([
                    "id" => "required",
                    "state" => "required",
                ]);
                $session->admitcardupdate($request->all());
            }
            catch (Exception $e) {
                $message = $e->getMessage();
                $line = $e->getLine();
                $file = $e->getFile();

                Log::error("Error in file $file at line $line: $message");
                return response()->json(array("msg" => "Something Went Wrong."), 500);
            }
            return response()->json(array("msg" => "Status Updated Successfully"), 200);
        }
    }

    public function currentsessionupdate(Request $request,ScholarshipSession $session)
    {
        if($request->ajax())
        {
            try
            {
                $request->validate([
                    "id" => "required",
                ]);
                $session->currentsessionupdate($request->id);
            }
            catch (Exception $e) {
                $message = $e->getMessage();
                $line = $e->getLine();
                $file = $e->getFile();

                Log::error("Error in file $file at line $line: $message");
                return response()->json(array("msg" => "Something Went Wrong."), 500);
            }
            return response()->json(array("msg" => "Status Updated Successfully"), 200);
        }
    }
}
