<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /** @return void */
    public function run()
    {
        $timestamp = Carbon::now()->toDateTimeString();

        $cars = [
            ['id' => 1, 'make' => 'Land Rover',     'model' => 'Range Rover Sport', 'production_year' => 2017, 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['id' => 2, 'make' => 'Ford',           'model' => 'F150',              'production_year' => 2014, 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['id' => 3, 'make' => 'Chevy',          'model' => 'Tahoe',             'production_year' => 2015, 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['id' => 4, 'make' => 'Aston Martin',   'model' => 'Vanquish',          'production_year' => 2018, 'created_at' => $timestamp, 'updated_at' => $timestamp],
        ];

        DB::table('cars')->insert($cars);
    }
}
