<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        "feetype",
        "fee",
        "description",
        "status",  
    ]; 
}
