<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class SensorDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //$temp = $this->randomTemp();
        DB::table('sensor_data')->insert([
        	'patient_id' => '1',
            'temperature' => $this->randomTemp(),
            'systolic_pressure' => mt_rand(90,250),
            'diastolic_pressure' => mt_rand(60,90),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    protected function randomTemp($min = 36, $max = 45) {
    	$divider = 5;
    	return $min + mt_rand(0,($max-$min)*$divider) / $divider;
	}

}

