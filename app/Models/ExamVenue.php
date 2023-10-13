<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamVenue extends Model
{
    use HasFactory;
    protected $table = 'exam_venue';

    protected $fillable = [
        "state",
        "district",
        "name",
        "address",
        "status",  
    ];

    public function getVenues()
    {
        return ExamVenue::all();
    }
}
