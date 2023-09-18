<?php

namespace App\Imports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ResultImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Result([
            //
            "roll_no" => $row['roll_no'],
            "obtained_marks" => $row['obtained_marks'],
            "total_marks" => $row['total_marks'],
            "percentage" => $row['percentage'],
            "status" => $row['status']
        ]);
    }

  
}
