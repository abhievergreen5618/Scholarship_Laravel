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
        Schema::create('district_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('statecode', 2);
            $table->string('description')->nullable();
            $table->date('examdate')->nullable();
            $table->time('examstarttime')->nullable();
            $table->time('examendtime')->nullable();
            $table->string('status')->default("active");
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
        Schema::dropIfExists('district_models');
    }
};
