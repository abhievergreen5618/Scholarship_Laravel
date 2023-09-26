<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        "roll_no",
        "obtained_marks",
        "total_marks",
        "percentage",
        "status",  
    ]; 
}
