<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'resultstatus',
        'examination_passed',
        'name_of_the_board_university',
        'passing_year',
        'credits_marks_Obtained',
        'maximum_marks',
        'percentage_marks',
        'exam_roll_no',
        'disqualified/suspended',
        'disqualified/suspended_details',
        'type'
    ];

    protected function resultStatussummary()
    {
        $resultstatus = $this->attributes['resultstatus'];
        switch ($resultstatus) {
            case 'P':
                $resultstatus = "Passed";
                break;
            case 'A':
                $resultstatus = "Awaited";
                break;
            case 'N':
                $resultstatus = "Not Applicable";
                break;
            default:
                // Add a default case to handle situations where examcenter_id doesn't match any case
                $resultstatus = "Unknown resultstatus";
                break;
        }

        return $resultstatus;
    }


    protected function examinationPassedsummary()
    {

        $examination_passed = $this->attributes['examination_passed'];
        dd($examination_passed);
        switch ($examination_passed) {
            case 18:
                $examination_passed = "B.A";
                break;
            case 19:
                $examination_passed = "B.Com";
                break;
            case 20:
                $examination_passed = "B.Sc";
                break;
            case 21:
                $examination_passed = "Other";
                break;
            case 22:
                $examination_passed = "M.A";
                break;
            case 23:
                $examination_passed = "M.Sc";
                break;
            case 24:
                $examination_passed = "M.Com";
                break;
            case 25:
                $examination_passed = "Other";
                break;
            default:
                // Add a default case to handle situations where examcenter_id doesn't match any case
                $examination_passed = $examination_passed;
                break;
        }

        return $examination_passed;
    }
}
