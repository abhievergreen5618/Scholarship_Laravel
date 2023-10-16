<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdmitCard;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Option $option)
    {
        // $students = User::with(['educationDetails', 'subjects'])->where([
        //     'role' => 'student',
        //     'status' => 'active',
        // ]);

        // // $students->where($this->columnname, $this->id);
        // $students->where("examdistrict",2);

        // $students = $students->get();
        // foreach ($students as $student) {
        //     $body = "";
        //     $admitcardlink = route('admin.user.admitcard',["id"=>encrypt($student->id)]);
        //     $body = $option->get_option('admitcardtemplate');
        //     $body = str_replace('[student_name]', $student->name, $body);
        //     $body = str_replace('[mother_name]', $student->mothername, $body);
        //     $body = str_replace('[father_name]', $student->fathername, $body);
        //     $body = str_replace('[student_address]', $student->caddress, $body);
        //     $body = str_replace('[student_dob]', $student->dob, $body);
        //     $body = str_replace('[exam_date]', $student->exam_date, $body);
        //     $body = str_replace('[exam_center]', $student->examcentre, $body);
        //     $body= str_replace('[exam_venue]',$student->exam_venue,$body);
        //     $body= str_replace('[admit_card_link]',$admitcardlink,$body);
        //     dd($student->exam_date);
        //     Mail::to($student->email)->send(new AdmitCard($body));
        // }
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
    }
}
