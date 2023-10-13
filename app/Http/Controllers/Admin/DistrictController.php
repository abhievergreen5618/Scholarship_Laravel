<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DistrictModel;
use App\Models\ScholarshipSession;
use Illuminate\Http\Request;
use App\Models\StateModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;
use Exception;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.district.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StateModel $state)
    {
        return view('admin.district.add')->with([
            "states" => $state->getStatesList()
        ]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DistrictModel $district)
    {
        $request->validate(
            [
                "name" => "required",
                "state" => "required",
                "status" => "required",
            ],
            [
                "required" => "The field is required."
            ]
        );

        try {
            $district->name = $request->input('name');
            $district->statecode = $request->input('state');
            $district->description = $request->input('description', null); // Use null as default if not provided
            $district->status = $request->input('status');
            $district->save();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            // Log the exception for debugging: Log::error($e->getMessage());
            return redirect()->back()->with("error", "Something Went Wrong.");
        }

        return redirect()->route('admin.district.index')->with("msg", "State Created Successfully.");
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
    public function edit($id, StateModel $state)
    {
        // $data = DistrictModel::where("id", decrypt($id))->first();
        return view('admin.district.add')->with([
            "data" => DistrictModel::where("id", decrypt($id))->first(),
            "states" => $state->getStatesList()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DistrictModel $district)
    {
        $request->validate(
            [
                "id" => "required",
                "name" => "required",
                "status" => "required",
            ],
            [
                "required" => "The field is required.",
            ]
        );
        try {

            // Retrieve the session by ID
            $district = DistrictModel::find(decrypt($request->input('id')));

            if (!$district) {
                return redirect()->back()->with("error", "District not found.");
            }

            $district->name = $request->input('name');
            $district->description = $request->input('description', null); // Use null as default if not provided
            $district->status = $request->input('status');
            $district->save();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            // Log the exception for debugging: Log::error($e->getMessage());
            return redirect()->back()->with("error", "Something Went Wrong.");
        }
        return redirect()->route('admin.district.index')->with("msg", "District Updated Successfully.");
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
            DistrictModel::where("id", decrypt($request['id']))->delete();
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
            $status = DistrictModel::where('id', decrypt($request['id']))->first('status');
            $status = ($status['status'] == "active") ? "inactive" : "active";
            DistrictModel::where('id', decrypt($request['id']))->Update([
                "status" => $status,
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            // Log the exception for debugging: Log::error($e->getMessage());
            return response()->json(array("msg" => "Something Went Wrong."), 500);
        }
        return response()->json(array("msg" => "Status Updated Successfully"), 200);
    }


    public function display(Request $request, DistrictModel $district, StateModel $state, ScholarshipSession $session)
    {
        if ($request->ajax()) {
            $data = $district->getDistricts();
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
                ->addColumn('description', function ($row) {
                    return !empty($row->description) ? $row->description : "N/A";
                })
                ->addColumn('statecode', function ($row) use ($state) {
                    return $state->getStateName($row->statecode);
                })
                ->addColumn('action', function ($row) use ($session) {
                    $id = encrypt($row->id);
                    $editlink = route('admin.district.edit', ['id' => $id]);
                    if ($session->isAdmitCardGenerationEnabledForCurrentSession()) {
                        $admitcardbtn = "<a href='javascript:void(0)' data-id='$id' class='btn btn-success admitcardtimedate ml-2' data-bs-toggle='tooltip' data-bs-placement='top' title='Set Exam Date'><i class='fa fa-calendar' aria-hidden='true'></i></a></div>";
                    }
                    else
                    {
                        $admitcardbtn = "";
                    }
                    $btn = "<div class='d-flex justify-content-around'><a href='$editlink' data-id='$id' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit' class='btn limegreen btn-primary edit ml-2'><i class='fas fa-edit'></i></a><a href='javascript:void(0)' data-id='$id' class='delete btn red-btn btn-danger ml-2'  data-bs-toggle='tooltip' data-bs-placement='top' title='Delete'><i class='fa fa-trash' aria-hidden='true'></i></a>$admitcardbtn</div>";
                    return $btn;
                })
                ->rawColumns(['status', 'action'])->make(true);
        }
    }
}
