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
            $table->integer('sensor_data_id')->unsigned();
            $table->text('message');
            $table->timestamps();
            
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
        Schema::table('alerts', function (Blueprint $table) {
            $table->dropForeign('alerts_sensor_data_id_foreign');
        
        });
        
        Schema::dropIfExists('alerts');
    }
}
