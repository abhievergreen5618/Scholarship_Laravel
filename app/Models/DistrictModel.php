<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'statecode',
        'description',
        'examdate',
        'examstarttime',
        'examendtime',
        'status',
    ];

    public function getDistricts()
    {
        return DistrictModel::all();
    }

    public function getDistrictsList($statecode)
    {
        return DistrictModel::where('statecode',$statecode)->pluck('name','id');
    }

    public function getDistrictNameByID($id)
    {
        return DistrictModel::where('id',$id)->value('name');
    }
}
