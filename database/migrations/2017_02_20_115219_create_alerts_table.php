<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->integer('sensor_data_id')->unsigned();
            $table->text('message');
            $table->timestamps();
            
            $table->foreign('patient_id')
            ->references('id')->on('patients')
            ->onDelete('cascade');
            
            $table->foreign('doctor_id')
            ->references('id')->on('doctors')
            ->onDelete('cascade');

            $table->foreign('sensor_data_id')
            ->references('id')->on('sensor_data')
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
        $table->dropForeign('alerts_patient_id_foreign');
        $table->dropForeign('alerts_doctor_id_foreign');
        $table->dropForeign('alerts_sensor_data_id_foreign');
        
        Schema::dropIfExists('alerts');
    }
}
