<?php
declare(strict_types=1);
namespace App\Trax\Application\Query;

use App\Trax\Domain\Car;

final class CarView extends AbstractView
{
    public $id;
    public $make;
    public $model;
    public $year;
    public $trip_count;
    public $trip_miles;

    private function __construct()
    {
    }

    public static function fromModel(Car $car): self
    {
        $self = new self();
        $self->id = (int) $car->id;
        $self->make = (string) $car->make;
        $self->model = (string) $car->model;
        $self->year = (int) $car->year;
        $self->trip_count = $car->countTrips();
        $self->trip_miles = $car->countMiles();

        return $self;
    }
}
