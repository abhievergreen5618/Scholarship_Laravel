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
            $table->string('amount');
            $table->string('status');
            $table->string('method');
            $table->string('description')->nullable();
            $table->string('vpa')->nullable();
            $table->string('bank')->nullable();
            $table->string('card_id')->nullable();
            $table->string('wallet')->nullable();
            $table->string('error_code')->nullable();
            $table->string('error_description')->nullable();
            $table->string('error_source')->nullable();
            $table->string('error_step')->nullable();
            $table->string('error_reason')->nullable();
            $table->timestamp('payment_created_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
