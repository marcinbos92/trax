<?php
declare(strict_types=1);
namespace App\Trax\Infrastructure;

use App\Http\Controllers\Controller;
use App\Trax\Application\Query\CarView;
use App\Trax\Application\Query\ListView;
use App\Trax\Domain\Car;

class CarController extends Controller
{
    public function listAction()
    {
        $cars = Car::all()->map(function (Car $car) {
            return CarView::fromModel($car);
        })->toArray();

        return ListView::fromData($cars);
    }

    public function createAction()
    {

    }
}
