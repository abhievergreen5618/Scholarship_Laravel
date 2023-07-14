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
            $table->string('scholarshipname');
            $table->string('fathername');
            $table->string('mothername');
            $table->string('examcentre');
            $table->string('caddress');
            $table->string('paddress');
            $table->string('dob')->nullable();
            $table->string('aadhaarno')->nullable();
            $table->string('hsmarksheetmatric');
            $table->string('hsmarksheet');
            $table->string('nationality')->nullable();
            $table->string('mobileno');
            $table->string('gender')->nullable();
            $table->string('singlegirlchild')->nullable();
            $table->string('applyingfor');
            $table->string('physicallychallenged');
            $table->string('category');
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
