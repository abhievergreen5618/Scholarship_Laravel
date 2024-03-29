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
        Schema::create('scholarship_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('session_duration_start');
            $table->string('session_duration_end');
            $table->string('exam_date')->nullable();
            $table->string('description')->nullable();
            $table->string('current')->default('inactive');
            $table->string('admitcard')->default('inactive');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('scholarship_sessions');
    }
};
