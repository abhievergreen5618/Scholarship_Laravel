<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ScholarshipSession;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = [
            [
                "name" => "2023-01",
                "session_duration_start" => "01/01/2023",
                "session_duration_end"=>"06/30/2023",
                "exam_date"=>"06/15/2023",
                "current"=>"inactive"
            ],
            [
                "name" => "2023-02",
                "session_duration_start" => "07/01/2023",
                "session_duration_end"=>"12/31/2023",
                "exam_date"=>"12/15/2023",
                "current"=>"active"
            ],
        ];
        ScholarshipSession::insert($type);
    }
}
