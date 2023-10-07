<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Stmt\Switch_;
use App\Models\FeeDetail;
use App\Models\PaymentsDetails;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'scholarshipname',
        'fathername',
        'mothername',
        'examcentre',
        'caddress',
        'paddress',
        'dob',
        'aadhaarno',
        'hsmarksheetmatric',
        'hsmarksheet',
        'nationality',
        'mobileno',
        'gender',
        'singlegirlchild',
        'subjects',
        'physicallychallenged',
        'category',
        'physicallychallengedproof',
        'categorycertificate',
        'fee',
        'step1_updated_at',
        'step2_updated_at',
        'step3_updated_at',
        'step4_updated_at',
        'step5_updated_at',
        'social_id',
        'social_type',
        'reference_number',
        'roll_number',
        'application_number',
        'transaction_id',
        'class',
        'examdistrict',
        'amount',
        'session',
    ];




    public function getGenderAttribute($value)
{
    return $value === 'F' ? 'Female' : 'Male';
}


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'subjects' => 'array',
    ];

    protected $appends = ['ExamCenterName','scholarshipNameSummary','nationalitySummary','genderSummary'];

    // Relations

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function scholarshipList()
    {
        return $this->belongsTo(ScholarshipList::class, 'scholarshipname', 'id');
    }

    public function bankDetails()
    {
        return $this->hasOne(BankDetails::class, 'user_id', 'id');
    }

    public function educationDetails()
    {
        return $this->hasOne(EducationDetails::class, 'user_id', 'id');
    }

    public function paymentDetails()
    {
        return $this->hasMany(PaymentsDetails::class,'user_id', 'id');
    }

    //accessors
    public function getSubjectsNameAttribute()
    {
         // Assuming you have a Subject model with a 'name' attribute
        $subjectNames = Subject::whereIn('id', $this->subjects)->pluck('name')->toArray();
        return implode(', ', $subjectNames);
    }

    protected function getExamCenterNameAttribute()
    {
        $examCenterId = $this->attributes['examdistrict'];
        $examCenter = DistrictModel::where('id', $examCenterId)->first('name');

        if ($examCenter === null) {
            // If no record is found in DistrictModel, try StateModel
            $examCenter = StateModel::where('id', $examCenterId)->first('name');
        }

        // Check if $examCenter is still empty and provide a default value
        if (empty($examCenter)) {
            $defaultExamCenter = 'Default Exam Center'; // Replace with your desired default value
            return $defaultExamCenter;
        }

        return $examCenter->name;
    }

    protected function getnationalitySummaryAttribute()
    {
        $nationalitycode = $this->attributes['nationality'];

        switch ($nationalitycode) {
            case 'I':
                $nationality = "Indian";
                break;
            case 'O':
                $nationality = "Others";
                break;
            default:
                // Add a default case to handle situations where examcenter_id doesn't match any case
                $nationality = "Unknown Nationality";
                break;
        }

        return $nationality;

    }

    protected function getgenderSummaryAttribute()
    {
        $gendercode = $this->attributes['gender'];

        switch ($gendercode) {
            case 'M':
                $gender = "Male";
                break;
            case 'F':
                $gender = "Female";
                break;
            default:
                // Add a default case to handle situations where examcenter_id doesn't match any case
                $gender = "Unknown Gender";
                break;
        }

        return $gender;
    }



    protected function getscholarshipNameSummaryAttribute()
    {
        return $this->scholarshipList->name ?? null;
    }

    protected function getfeeAttribute()
    {
        $physicallychallenged = $this->attributes['physicallychallenged'];
        if($physicallychallenged != "no")
        {
            $fee = FeeDetail::where("feecode","physicallychallenged")->first('fee');
            return $fee->fee;
        }
        else
        {
            $physicallychallenged = $this->attributes['category'];
            $fee = FeeDetail::where("feecode",$physicallychallenged)->first('fee');
            return $fee->fee;
        }
    }

    protected function getrazorpayFeeAttribute()
    {
        $physicallychallenged = $this->attributes['physicallychallenged'];
        if($physicallychallenged != "no")
        {
            $fee = FeeDetail::where("feecode","physicallychallenged")->first('fee');
            return $fee->fee*100;
        }
        else
        {
            $physicallychallenged = $this->attributes['category'];
            $fee = FeeDetail::where("feecode",$physicallychallenged)->first('fee');
            return $fee->fee*100;
        }
    }

    public function sessionStudents($session)
    {

        return User::where('role','student')
            ->where('session',$session)
            ->get();
    } 

    public function students()
    {
        return User::where('role', 'student')->latest()->get();
    }

    public function getUserClass($userid)
    {
        return EducationDetails::where('user_id',$userid)->value('classes');
    }

}
