<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function class()
    {
        return $this->hasOne('ClassModel::class');
    }
}
