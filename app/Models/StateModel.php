<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateModel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code','description','status','examdate','examstarttime','examendtime'];

    public function getStates()
    {
        return StateModel::all();
    }

    public function getStatesList()
    {
        return StateModel::pluck('name','code');
    } 
    
    public function getStateName($statecode)
    {
        return StateModel::where('code',$statecode)->value('name');
    }
}
