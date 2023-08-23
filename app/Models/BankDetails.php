<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'accountno',
        'cnfrmaccountno',
        'holdername',
        'ifsccode',
        'passbook_photo'
    ];
}
