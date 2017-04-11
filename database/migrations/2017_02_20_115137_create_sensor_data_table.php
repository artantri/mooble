<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->double('temperature', 5, 2);
            $table->double('heart_rate', 5, 2);
            $table->timestamps();
            
            $table->foreign('patient_id')
            ->references('id')->on('patients')
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
        Schema::table('sensor_data', function (Blueprint $table) {
            $table->dropForeign('sensor_data_patient_id_foreign');
        
        });
        
        Schema::dropIfExists('sensor_data');
    }
}
