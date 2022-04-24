<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /** @return void */
    public function run()
    {
        $timestamp = Carbon::now()->toDateTimeString();

        $trips = [
            [
                'id' => 1,
                'date' => Carbon::now()->subDays(1),
                'miles' => 11.3,
                'total' => 45.3,
                'car_id' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'id' => 2,
                'date' => Carbon::now()->subDays(2),
                'miles' => 12,
                'total' => 34.1,
                'car_id' => 4,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'id' => 3,
                'date' => Carbon::now()->subDays(3),
                'miles' => 6.8,
                'total' => 22.1,
                'car_id' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'id' => 4,
                'date' => Carbon::now()->subDays(4),
                'miles' => 5,
                'total' => 15.3,
                'car_id' => 2,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'id' => 5,
                'date' => Carbon::now()->subDays(5),
                'miles' => 10.3,
                'total' => 10.3,
                'car_id' => 3,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
        ];

        DB::table('trips')->insert($trips);
    }
}
