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
        'classes',
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
        protected $appends = ['resultStatusSummary'];

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
}
