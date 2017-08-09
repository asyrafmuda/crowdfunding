<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('username', 32)->nullable()->unique();
            $table->mediumText('bio')->nullable();
            $table->string('picture')->nullable();
            $table->string('website')->nullable();
            $table->string('job_title')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('blood_type', 5)->nullable();
            $table->enum('status', ['live', 'active', 'verified', 'block', 'trashed']);
            $table->string('bank_name', '100')->nullable();
            $table->integer('bank_code')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_number', 20)->nullable();
            $table->rememberToken();
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
}
