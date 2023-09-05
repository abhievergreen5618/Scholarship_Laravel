<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ClassModel extends Model
{
    use HasFactory;

    protected $fillable = [
        "class",
        "description",
        "status",
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
} 
