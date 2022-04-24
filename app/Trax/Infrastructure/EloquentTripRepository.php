<?php
declare(strict_types=1);
namespace App\Trax\Infrastructure;

use App\Trax\Domain\Trip;
use App\Trax\Domain\TripRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentTripRepository implements TripRepositoryInterface
{
    public function getLastCreatedTrip(): ?Trip
    {
        dd(Trip::orderBy('created_at', 'desc')->limit(1)->get());

        return Trip::orderBy('created_at', 'desc')->limit(1)->get();
    }

    public function getTotalMilesFromTripsBasedOnDate(\DateTime $date): float
    {
        /** @var Collection $trip */
        $trip = Trip::where('date', '<=', $date->format('Y-m-d'))
            ->orderBy('date', 'desc')
            ->get();

        return $trip->isEmpty() ? 0 : $trip->first()->total;
    }
}
