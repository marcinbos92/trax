<?php
declare(strict_types=1);
namespace App\Trax\Domain;

interface TripRepositoryInterface
{
    public function getLastCreatedTrip(): ?Trip;
}
