<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $fillable = [
        "class",
        "description",
        "subject_id",
        "status",
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    } 

    public function classesList()
    {
        return ClassModel::orderBy('id','asc')->pluck('class','id');
    }

}


