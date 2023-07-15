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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('scholarshipname')->nullable();
            $table->string('fathername')->nullable();
            $table->string('mothername')->nullable();
            $table->string('examcentre')->nullable();
            $table->string('caddress')->nullable();
            $table->string('paddress')->nullable();
            $table->string('dob')->nullable();
            $table->string('aadhaarno')->nullable();
            $table->string('hsmarksheetmatric')->nullable();
            $table->string('hsmarksheet')->nullable();
            $table->string('nationality')->nullable();
            $table->string('mobileno')->nullable();
            $table->string('gender')->nullable();
            $table->string('singlegirlchild')->nullable();
            $table->string('applyingfor')->nullable();
            $table->string('physicallychallenged')->nullable();
            $table->string('category')->nullable();
            $table->string('physicallychallengedproof')->nullable();
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
