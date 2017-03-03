<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NIK');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('salt');
            $table->string('email')->unique();
            $table->string('name');
            $table->string('phone_number');
            $table->text('address');
            $table->string('gender');
            $table->string('blood_type');
            $table->date('birth_date');
            $table->string('weight');
            $table->string('height');
            $table->string('job');
            $table->text('job_description');
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
        Schema::dropIfExists('patients');
    }
}
