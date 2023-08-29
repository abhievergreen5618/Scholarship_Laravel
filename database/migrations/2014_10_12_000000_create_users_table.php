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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('social_id')->nullable();
            $table->string('social_type')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('scholarshipname')->nullable();
            $table->string('fathername')->nullable();
            $table->string('mothername')->nullable();
            $table->string('examcentre')->nullable();
            $table->string('districtDropdown')->nullable();
            $table->string('caddress')->nullable();
            $table->string('paddress')->nullable();
            $table->string('dob')->nullable();
            $table->string('aadhaarno')->nullable();
            $table->string('nationality')->nullable();
            $table->string('mobileno')->nullable();
            $table->string('gender')->nullable();
            $table->string('singlegirlchild')->nullable();
            $table->string('applyingfor')->nullable();
            $table->string('applyingforsubject')->nullable();
            $table->string('physicallychallenged')->nullable();
            $table->string('category')->nullable();
            $table->string('physicallychallengedproof')->nullable();
            $table->string('photo')->nullable();
            $table->string('signature')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('roll_number')->nullable();
            $table->string('application_number')->nullable();
            $table->string('transaction_id')->nullable();
            $table->timestamp('step1_updated_at')->nullable();
            $table->timestamp('step2_updated_at')->nullable();
            $table->timestamp('step3_updated_at')->nullable();
            $table->timestamp('step4_updated_at')->nullable();
            $table->timestamp('step5_updated_at')->nullable();
            $table->timestamp('step6_updated_at')->nullable();
            $table->string('role')->default("student")->nullable();
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
        Schema::dropIfExists('users');
    }
};
