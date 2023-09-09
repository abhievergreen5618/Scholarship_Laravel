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
