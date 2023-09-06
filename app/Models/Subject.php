<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "classes",
        "description",
        "class_id",
        "status",  
    ];

    protected $casts = [
        "classes" => "array",
    ];

    public function classModel()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
    
}
 