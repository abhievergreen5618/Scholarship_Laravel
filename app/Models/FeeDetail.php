<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        "feetype",
        "fee",
        "description",
        "status",  
    ]; 
}
