<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClassModel;
use App\Models\User;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "classes",
        "description",
        "status",
    ];

    protected $casts = [
        "classes" => "array",
    ];

    public function classes()
    {
        return $this->belongsToMany(ClassModel::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
