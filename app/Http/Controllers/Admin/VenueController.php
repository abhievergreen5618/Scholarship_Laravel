<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamVenue;
use Illuminate\Http\Request;
use App\Models\StateModel;
use App\Models\DistrictModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;
use Exception;


class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.venue.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StateModel $state, DistrictModel $district)
    {
        return view('admin.venue.add')->with([
            "states" => $state->getStatesList(),
            "districts" => $district
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ExamVenue $venue)
    {
        $request->validate(
            [
                "state"  => "required",
                "district"  => "required",
                "name" => "required",
                "address" => "required",
                "status" => "required",
            ],
            [
                "required" => "The field is required."
            ]
        );

        try {
            $venue->statecode = $request->input('state');
            $venue->district = $request->input('district');
            $venue->name = $request->input('name');
            $venue->address = $request->input('address'); // Use null as default if not provided
            $venue->status = $request->input('status');
            $venue->save();
        } catch(Exception $e) {
            Log::error($e->getMessage());
            // Log the exception for debugging: Log::error($e->getMessage());
            return redirect()->back()->with("error", "Something Went Wrong.");
        }
        return redirect()->route('admin.state.index')->with("msg", "Exam Venue Created Successfully.");
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
    public function edit(StateModel $state, DistrictModel $district,$id)
    {
        $data = ExamVenue::where("id", decrypt($id))->first();
        return view('admin.venue.add')->with([
            "data" => $data,
            "states" => $state->getStatesList(),
            "district" => $district
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                "state"  => "required",
                "district"  => "required",
                "name" => "required",
                "address" => "required",
                "status" => "required",
            ],
            [
                "required" => "The field is required."
            ]
        );

        try {

            // Retrieve the session by ID
            $venue = ExamVenue::find(decrypt($request->input('id')));

            if (!$venue) {
                return redirect()->back()->with("error", "Exam Venue not found.");
            }

            $venue->statecode = $request->input('state');
            $venue->district = $request->input('district');
            $venue->name = $request->input('name');
            $venue->address = $request->input('address'); // Use null as default if not provided
            $venue->status = $request->input('status');
            $venue->save();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            // Log the exception for debugging: Log::error($e->getMessage());
            return redirect()->back()->with("error", "Something Went Wrong.");
        }
        return redirect()->route('admin.venue.index')->with("msg", "Exam Venue Updated Successfully.");
    }

    public function destroy(Request $request)
    {
        try {
            $request->validate(
                [
                    "id" => "required",
                ]
            );
            ExamVenue::where("id", decrypt($request['id']))->delete();
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
            $status = ExamVenue::where('id', decrypt($request['id']))->first('status');
            $status = ($status['status'] == "active") ? "inactive" : "active";
            ExamVenue::where('id', decrypt($request['id']))->Update([
                "status" => $status,
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            // Log the exception for debugging: Log::error($e->getMessage());
            return response()->json(array("msg" => "Something Went Wrong."), 500);
        }
        return response()->json(array("msg" => "Status Updated Successfully"), 200);
    }

    public function display(Request $request, ExamVenue $venue,StateModel $state,DistrictModel $district)
    {
        if ($request->ajax()) {
            $data = $venue->getVenues();
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
                ->addColumn('statecode', function ($row) use ($state) {
                    return $state->getStateName($row->statecode);
                })
                ->addColumn('district', function ($row) use ($district) {
                    return $district->getDistrictNameByID($row->district);
                })
                ->addColumn('action', function ($row) {
                    $id = encrypt($row->id);
                    $editlink = route('admin.venue.edit', ['id' => $id]);
                    $btn = "<div class='d-flex justify-content-around'><a href='$editlink' data-id='$id' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit' class='btn limegreen btn-primary  edit'><i class='fas fa-edit'></i></a><a href='javascript:void(0)' data-id='$id' class='delete btn red-btn btn-danger  '  data-bs-toggle='tooltip' data-bs-placement='top' title='Delete' '><i class='fa fa-trash' aria-hidden='true'></i></a></div>";
                    return $btn;
                })
                ->rawColumns(['status', 'action'])->make(true);
        }
    }

    
}
