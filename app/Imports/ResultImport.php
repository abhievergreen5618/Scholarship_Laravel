<?php

namespace App\Imports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;


class ResultImport implements ToModel, WithHeadingRow, WithChunkReading, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $percentage = ($total_marks > 0) ? ($obtained_marks / $total_marks) * 100 : 0;

        return new Result([
            //
            "roll_no" => $row['roll_no'],
            "obtained_marks" => $row['obtained_marks'],
            "total_marks" => $row['total_marks'],
            "percentage" => $percentage,
            "status" => $row['status']
        ]);
    }
    
    public function chunkSize(): int
    {
        return 20;
    }

    public function rules(): array
    {
        return [
            'roll_no' => 'required|integer',
            'obtained_marks' => 'required|integer',
            'total_marks' => 'required|integer|gt:0', 
            'status' => 'required|string',
        ];
    }
  
}
