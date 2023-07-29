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
        'applyingfor',
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

    protected function getExamCenterNameAttribute()
    {
        $examCenterId = $this->attributes['examcenter'];
        dd($examCenterId);
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
}
