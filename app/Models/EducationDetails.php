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
}
