<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('education_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string("resultstatus");
            $table->string("examination_passed");
            $table->string("classes");
            $table->string("name_of_the_board_university");
            $table->string("passing_year");
            $table->string("credits_marks_Obtained");
            $table->string("maximum_marks");
            $table->string("percentage_marks");
            $table->string("exam_roll_no");
            $table->string("disqualified/suspended");
            $table->string("disqualified/suspended_details")->nullable();
            $table->string("type");
            // Add a foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Optional: add this if you want cascading delete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_details');
    }
};
