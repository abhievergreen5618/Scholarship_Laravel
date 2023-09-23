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
        Schema::create('payments_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('razorpay_id');
            $table->string('code')->nullable();
            $table->string('description')->nullable();
            $table->string('source')->nullable();
            $table->string('step')->nullable();
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('payments_details');
    }
};
