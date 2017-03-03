<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('body_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->string('pain_rate');
            $table->text('pain_description');
            $table->timestamps();
            
            $table->foreign('patient_id')
            ->references('id')->on('patients')
            ->onDelete('cascade');
            
            $table->foreign('body_id')
            ->references('id')->on('body_parts')
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
        $table->dropForeign('health_reports_body_id_foreign');
        
        Schema::dropIfExists('health_reports');
    }
}
