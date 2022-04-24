<?php
declare(strict_types=1);
namespace App\Trax\Domain;

use Illuminate\Database\Eloquent\Collection;

class TripService
{
    /**
     * INEFFICIENT solution
     *
     * @param \DateTime $date
     * @param float $miles
     * @return void
     */
    public function updateFutureTripsByMiles(\DateTime $date, float $miles): void
    {
        /** @var Collection $trips */
        $trips = Trip::where('date', '>', $date->format('Y-m-d'))
            ->orderBy('date', 'desc')
            ->get();

        /** @var Trip $trip */
        foreach ($trips as $trip) {
            $trip->total += $miles;
            $trip->save();
        }
    }
}
