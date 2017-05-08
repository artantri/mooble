<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->string('request_session');
            $table->date('request_date');
            $table->integer('appoint_number')->nullable();
            $table->time('appoint_time')->nullable();
            $table->string('status')->nullable();
            $table->text('status_decline')->nullable();
            $table->timestamps();
            
            $table->foreign('staff_id')
            ->references('id')->on('staffs')
            ->onDelete('cascade');

            $table->foreign('patient_id')
            ->references('id')->on('patients')
            ->onDelete('cascade');

            $table->foreign('doctor_id')
            ->references('id')->on('doctors')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
