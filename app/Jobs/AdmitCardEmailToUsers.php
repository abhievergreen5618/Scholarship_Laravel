<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdmitCard;
use App\Models\Option;
use App\Models\User;

class AdmitCardEmailToUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $id;
    protected $columnname;

    public function __construct($id, $columnname)
    {
        $this->id = $id;
        $this->columnname = $columnname;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Option $option)
    {
        $students = User::with(['educationDetails', 'subjects'])->where([
            'role' => 'student',
            'status' => 'active',
        ]);

        $students->where($this->columnname, $this->id);
        $students = $students->get();
        
        foreach ($students as $student) {
            $body = "";
            $admitcardlink = route('admin.user.admitcard',["id"=>encrypt($student->id)]);
            $body = $option->get_option('admitcardtemplate');
            $body = str_replace('[student_name]', $student->name, $body);
            $body = str_replace('[mother_name]', $student->mothername, $body);
            $body = str_replace('[father_name]', $student->fathername, $body);
            $body = str_replace('[student_address]', $student->caddress, $body);
            $body = str_replace('[student_dob]', $student->dob, $body);
            $body = str_replace('[exam_date]', $student->exam_date, $body);
            $body = str_replace('[exam_center]', $student->examcentre, $body);
            $body= str_replace('[exam_venue]',$student->exam_venue,$body);
            $body= str_replace('[admit_card_link]',$admitcardlink,$body);
            Mail::to($student->email)->send(new AdmitCard($body));
        }
    }
}
