<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB; 
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ResultImport;
use Illuminate\Validation\Validator;
use App\Models\Result;
use App\Models\StateModel;
use App\Models\Subject;
use App\Models\ScholarshipList;
use App\Models\ClassModel;
use App\Models\EducationDetails;
use App\Models\BankDetails;


class UserDetail extends Controller
{
    //

    public function index()
    {
        
        return view('admin.user.index');
    }

    public function create()
    {

        $states = StateModel::orderBy('name','asc')->orderBy('code','asc')->get();

         
        $subjects = Subject::where('status','active')
        ->orderBy('name', 'asc')->get();
        $subjectSelect = $subjects->pluck('name')->toArray();
        $subjectSelect = json_encode($subjectSelect);

        $scholarshipname = ScholarshipList::where('status','active')
        ->orderBy('name','asc')->get();
        $scholarshipSelect = $scholarshipname->pluck('name')->toArray();
        $scholarshipSelect = json_encode($scholarshipSelect);

        $classes = ClassModel::where('status','active')
        ->orderBy('class','asc')->get();


        return view("admin.user.add")->with([
            'states' => $states,
            'subjectSelect' => $subjectSelect,
            'classes' => $classes,
            'scholarshipSelect' => $scholarshipSelect
        ]);
    }

    public function display(Request $request)
    {

        if ($request->ajax()) {
            $data =  DB::table('users')
            ->where('role', 'student')
                ->select(['id', 'name', 'email', 'mobileno', 'class', 'gender', 'dob', 'paddress', 'status'])->latest()->get();
                return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id = encrypt($row->id);
                    $editlink = route('admin.user.edit', ['id' => $id]);
                    $viewdatalink = route('admin.user.viewdata',['id' => $id]);
                    $btn = "<div class='d-flex justify-content-around'><a href='$viewdatalink' data-id='$id' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit' class='btn limegreen btn-primary  edit'><i class='fa fa-eye'></i></a><a href='$editlink' data-id='$id' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit' class='btn limegreen btn-primary  edit'><i class='fas fa-edit'></i></a><a href='javascript:void(0)' data-id='$id' class='delete btn red-btn btn-danger  '  data-bs-toggle='tooltip' data-bs-placement='top' title='Delete' '><i class='fa fa-trash' aria-hidden='true'></i></a></div>";
                    return $btn;
                })
                ->addColumn('gender', function ($row) {
                    return $row->gender === 'F' ? 'Female' : 'Male';;
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

    public function edit($id)
    {
        $data = User::where("id",decrypt($id))->first();
        return view('admin.user.add')->with([
            "data"=>$data
        ]);
    }

    public function update(ClassRequest $request)
    {
 
        $request->validate(
            [
                "name"=>'required',
                "email"=>'required',
                "mobileno"=>'required',
                "class"=>'required',
                "gender"=>'required',
                "dob"=>'required',
                "paddress"=>'required',
                "status"=>'required',
            ]
            );
            $class = EducationDetails::where('classes')->get();

             


        User::where("id",decrypt($request['id']))->update([
            "name" => $request->name,
            "email" => $request->email,
            "mobileno" => $request->mobileno,
            "class" => $class,
            "gender" => $request->gender,
            "dob" => $request->dob,
            "paddress" => $request->address,
            "status" => $request->status,
        ]);
        return redirect(route('admin.user.index'))->with("msg", "User Updated Successfully");
    }

    public function destroy(Request $request)
    {
        $request->validate(
        [
            "id"=>'required',
        ]
    );
    User::where("id",decrypt($request['id']))->delete();
        $msg = "Deleted Successfully";
        return response()->json(array('msg' => $msg),200);
    }

    public function status(Request $request) 
    {
        $request->validate(
            [
                "id"=>"required",
            ]);
            $status = User::where('id',decrypt($request['id']))->first('status');
            $status = ($status['status'] == "active") ? "inactive" : "active";
            User::where('id',decrypt($request['id']))->Update([
                "status"=>$status,
            ]);
        $msg = "Status Updated Successfully";
        return response()->json(array("msg" => $msg), 200);
    }



    public function view($id)
    { 
        $viewdata = User::where("id",decrypt($id))->first();
        return view('admin.user.viewdata')->with('viewdata',$viewdata);
    }


    public function result()
    { 
        return view('admin.user.result');
    }



    public function showresult(Request $request)
    { 
        if ($request->ajax()) {
            $data = Result::orderBy('roll_no', 'asc')->get();
        //    return view('admin.user.showresult')->with('data',$data);
            return Datatables::of($data)
                ->addColumn('actions', function ($row) {
                    return '<button>Edit</button>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        } 
    }
    

    public function uploadresult(Request $request)
    {             
        $request->validate([
            'file' => 'required|file|mimes:xlsx', 
        ]);
            $file = $request->file('file');
            Excel::toCollection(new ResultImport, $file);
        
            return redirect()->route('admin.user.showresult')->with([
                'success' => 'User Imported Successfully'
            ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "name" => 'required',
                "fathername"=>'required',
                "mothername"=>'required',
                "examcentre" => "required",
            "districtDropdown" =>"required",
            "caddress" => "required",
            "mobileno" => "required",
            "paddress" => "required",
            "physicallychallenged" => "required",
            'physicallychallengedproof' => 'required_if:physicallychallenged,yes',
            "category" => "required",
            // 'categorycertificate' => 'required',
            // 'fee' => "required",
            "email" => "required|email",
        ],
        [
             "required" => "This field is required.",
             "required_if" => "This field is required.",
        ]
        );
        
        User::create([
            "name" => $request->name,
            "fathername" => $request->fathername,
            "mothername" => $request->mothername,
            "examcentre" => $request['examcentre'],
                "districtDropdown" =>$request['districtDropdown'],
                "caddress" => $request['caddress'],
                "paddress" => $request['paddress'],
                "dob" => $request['dob'] ?? "",
                "aadhaarno" => $request['aadhaarno'] ?? "",
                "nationality" =>  $request['nationality'] ?? "",
                "mobileno" => $request['mobileno'],
                "gender" => $request['gender'] ?? "",
                "singlegirlchild" => $request['singlegirlchild'] ?? "",
                "subjects" => $request['subjects'],
                "physicallychallenged" => $request['physicallychallenged'],
                "category" => $request['category'],
                "fee" => $request['fee'],
                "physicallychallengedproof" => $imageName ?? "",
                "categorycertificate" => $certificateName ??"",
             
        ]);
        return redirect(route('admin.user.store'))->with("msg", "Student Added Successfully");
    }

    public function storedocument(Request $request)
    {
        $classmarks = $request['class_marks'];
        $maximummarks = $request['class_max_marks'];
        $percentage = $classmarks/$maximummarks*100 ;

        $request->validate( [
            "profile_photo" => "required",
            "sign_photo" => "required",
            "disqualified/suspended" => "required",
            'details' => 'required_if:disqualified/suspended,yes',
        ],
        [
             "required" => "This field is required.",
             "required_if" => "This field is required.",
        ]
    );
                $matchThese = ['user_id'=>decrypt($request['id']),'type'=>'school'];
                EducationDetails::updateOrCreate($matchThese,[
                    'user_id'=> decrypt($request['id']),
                    'resultstatus'=>$request['class_status'],
                    'classes'=>$request['classes'],
                    'name_of_the_board_university'=>$request['class_board'],
                    'passing_year'=>$request['class_passing_year'],
                    'credits_marks_Obtained'=>$classmarks,
                    'maximum_marks'=>$maximummarks,
                    'percentage_marks'=>$percentage,
                    'exam_roll_no'=>$request['class_rollno'],
                    'disqualified/suspended'=>$request['disqualified/suspended'],
                    'disqualified/suspended_details'=>$request['details'] ?? "",
                    'type'=>'school',
                 ]);


            if ($request->hasFile('profile_photo')) {
                $image = $request->file('profile_photo');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/proofdoc'), $imageName);
            }
            if ($request->hasFile('sign_photo')) {
                $image = $request->file('sign_photo');
                $sign_photo = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/proofdoc'), $sign_photo);
            }
            User::where('id',decrypt($request['id']))->update([
                "photo"=>$imageName,
                "signature"=>$sign_photo,
                "step2_updated_at" => now(),
            ]);

            return back()->with("msg", "Document Added Successfully");
        }

    public function storebankdata(Request $request)
    {
        $request->validate([
            "accountno" => "required",
            "cnfrmaccountno" => "required_with:accountno|same:accountno",
            "holdername" => "required",
            "ifsccode" => "required",
            "passbook_photo" => "required",
        ]);
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->getMessages() as $index => $error) {
                $errors[$index] = $error[0];
            }
            return response()->json([
                'message'  => "!OOPs Something went wrong",
                'error' => $errors
            ],422);
        }
        else
        {
            
            
            if ($request->hasFile('passbook_photo')) {
                $image = $request->file('passbook_photo');
                $passbook_photo = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/proofdoc'), $passbook_photo);
            }
            $matchThese = ['user_id'=>decrypt($request['id'])];
            BankDetails::updateOrCreate($matchThese,[
            'user_id'=> decrypt($request['id']),
            "accountno" => $request['accountno'],
            "cnfrmaccountno" => $request['cnfrmaccountno'],
            "holdername" => $request['holdername'],
            "ifsccode" => $request['ifsccode'],
            "passbook_photo" =>$passbook_photo,
        ]);
    }
    return back()->with("msg", "Bank Details Added Successfully");

    }

        
}
