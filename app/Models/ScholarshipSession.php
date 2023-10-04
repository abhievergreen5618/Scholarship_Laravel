<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipSession extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "session_duration_start",
        "session_duration_end",
        "exam_date",
        "description",
        "status",
    ];

    public function getSession()
    {
        return ScholarshipSession::latest()->get();
    }

    public function sessionList()
    {
        $sessions = ScholarshipSession::where('status','active')->get();
        if (!$sessions->isEmpty()) {
            $data = [];
            foreach($sessions as $session)
            {
                $data[$session->id] = $session->name." (".$session->session_duration_start." - ".$session->session_duration_end.") ";
            }
            return $data;
        } else {
            return [];
        }   
    }

    public function sessionnameList()
    {
        $sessions = ScholarshipSession::where('status','active')->get();
        if (!$sessions->isEmpty()) {
            $data = [];
            foreach($sessions as $session)
            {
                $data[$session->id] = $session->name;
            }
            return $data;
        } else {
            return [];
        }   
    }

    public function getExamDateAttribute()
    {
        // Replace 'exam_date' with the actual attribute name
        $examDate = $this->attributes['exam_date'];

        // Check if exam_date is not provided or is null
        if ($examDate === null) {
            return "N/A"; // or "Not available", "No date", etc.
        }
        else
        {
            return $examDate;
        }
    }

    public function getSessionDurationAttribute()
    {
        $sessionduration = $this->attributes['session_duration_start']." - ".$this->session_duration_end;

        // Check if exam_date is not provided or is null
        if ($sessionduration === null) {
            return "N/A";
        }
        else
        {
            return $sessionduration;
        }
    }

    public function getdescriptionAttribute()
    {
        // Replace 'exam_date' with the actual attribute name
        $description = $this->attributes['description'];

        // Check if exam_date is not provided or is null
        if ($description === null) {
            return "N/A"; // or "Not available", "No date", etc.
        }
        else
        {
            return $description;
        }
    }
}
