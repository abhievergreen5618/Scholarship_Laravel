<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Option;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = ["admitcardtemplate"=>"<h1>Admit Card - [student_name]</h1><p>Dear [student_name],</p><p>We are pleased to inform you that your admit card has been successfully generated for the upcoming examination. Below are the details:</p><ul style='margin-left:30px'><li><strong>Student Name:</strong> [student_name]</li><li><strong>Exam Date:</strong> [exam_date]</li><li><strong>Exam Time:</strong> [exam_time]</li><li><strong>Exam Venue:</strong>[exam_venue]</li><!-- Add more details as needed --></ul><p>Please make sure to carry a printout of this admit card with you to the examination center. Arrive at least 30 minutes before the exam begins and bring a valid photo ID for verification.</p><p>If you have any questions or concerns, please do not hesitate to contact our support team at .</p><p style='text-align:center'><a href='[admit_card_link]' style='display: inline-block; padding: 10px 20px; background-color: #007BFF; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 18px;'>Download Admit Card</a></p><p>Best regards,</p>"];
        foreach($options as $key => $value)
        {
            Option::create([
                "option_name" =>  $key,
                "option_value" => $value,
            ]);
        }
    }
}
