<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Stmt\Switch_;

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
    ];

      // Define the 'gender' column as a cast attribute
      protected $casts = [
        'gender' => 'string',
    ];


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
    ];

    protected $appends = ['ExamCenterName','scholarshipNameSummary','nationalitySummary','genderSummary'];

    protected function getExamCenterNameAttribute()
    {
        $examCenterId = $this->attributes['examcentre'];
        // $examCenterId = $this->getAttribute('examcenter');

        switch ($examCenterId) {
            case 3:
                $examCenter = "Solan";
                break;
            case 17:
                $examCenter = "SHIMLA";
                break;
            case 18:
                $examCenter = "DHARAMSHALA";
                break;
            case 19:
                $examCenter = "UNA";
                break;
            case 20:
                $examCenter = "HAMIRPUR";
                break;
            case 21:
                $examCenter = "PALAMPUR";
                break;
            case 24:
                $examCenter = "MANDI";
                break;
            case 33:
                $examCenter = "AMB (UNA)";
                break;
            case 34:
                $examCenter = "BILASPUR";
                break;
            case 35:
                $examCenter = "CHAMBA";
                break;
            case 36:
                $examCenter = "KANGRA";
                break;
            case 37:
                $examCenter = "KULLU";
                break;
            case 38:
                $examCenter = "NAHAN";
                break;
            case 39:
                $examCenter = "RAMPUR";
                break;
            case 40:
                $examCenter = "SUNDER NAGAR";
                break;
            default:
                // Add a default case to handle situations where examcenter_id doesn't match any case
                $examCenter = "Unknown Exam Center";
                break;
        }

        return $examCenter;
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

    public function getgenderSummaryAttribute()
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
        $scholarshipname = $this->attributes['scholarshipname'];

        switch ($scholarshipname) {
            case '3':
                $scholarshipname = "open scholarships ";
                break;
            case '17':
                $scholarshipname = "vidyabharti scholarship";
                break;
            default:
                // Add a default case to handle situations where examcenter_id doesn't match any case
                $scholarshipname = "Unknown scholarship";
                break;
        }

        return $scholarshipname;
    }

}
