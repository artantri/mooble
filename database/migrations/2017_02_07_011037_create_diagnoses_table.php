<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnoses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->text('diagnose_result');
            $table->text('treatment');
            $table->timestamps();
            
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
        $table->dropForeign('health_reports_patient_id_foreign');
        $table->dropForeign('health_reports_doctor_id_foreign');
        
        Schema::dropIfExists('diagnoses');
    }
}
