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

        // Define the list of attributes that should be appended to the model
        protected $appends = ['resultStatusSummary','examinationPassedSummary'];

        // Method to get the modified result status summary attribute
        public function getResultStatusSummaryAttribute()
        {
            $resultStatus = $this->attributes['resultstatus'];

            switch ($resultStatus) {
                case 'P':
                    $resultStatus = "Passed";
                    break;
                case 'A':
                    $resultStatus = "Awaited";
                    break;
                case 'N':
                    $resultStatus = "Not Applicable";
                    break;
                default:
                    $resultStatus = "Unknown result status";
                    break;
            }

            return $resultStatus;
    }


    protected function examinationPassedsummary()
    {

        $examination_passed = $this->attributes['examination_passed'];
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
