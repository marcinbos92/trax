<?php
declare(strict_types=1);
namespace App\Trax\Application\Query;

use App\Trax\Domain\Trip;

final class TripView extends AbstractView
{
    public $id;
    public $date;
    public $miles;
    public $total;
    public $car;

    public static function fromModel(Trip $trip): self
    {
        $self = new self();
        $self->id = (int) $trip->id;
        $self->date = $trip->date;
        $self->miles = $trip->miles;
        $self->total = $trip->total;
        $self->car = CarMinimalView::fromModel($trip->car()->withTrashed()->first());

        return $self;
    }
}
