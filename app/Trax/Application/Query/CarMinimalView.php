<?php
declare(strict_types=1);
namespace App\Trax\Application\Query;

use App\Trax\Domain\Car;

final class CarMinimalView extends AbstractView
{
    public $id;
    public $make;
    public $model;
    public $year;

    public static function fromModel(Car $car): self
    {
        $self = new self();
        $self->id = (int) $car->id;
        $self->make = (string) $car->make;
        $self->model = (string) $car->model;
        $self->year = (int) $car->year;

        return $self;
    }
}
