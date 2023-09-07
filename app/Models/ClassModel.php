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
        "status",  
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'class_id');
    }
}
