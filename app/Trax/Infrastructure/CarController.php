<?php
declare(strict_types=1);
namespace App\Trax\Infrastructure;

use App\Http\Controllers\Controller;
use App\Trax\Application\Query\CarMinimalView;
use App\Trax\Application\Query\CarView;
use App\Trax\Application\Query\ListView;
use App\Trax\Domain\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarController extends Controller
{
    public function listAction(): ListView
    {
        $cars = Car::whereNull('deleted_at')
            ->get()
            ->map(function (Car $car) { return CarMinimalView::fromModel($car); })
            ->toArray();

        return ListView::fromData($cars);
    }

    public function viewAction(int $id): ListView
    {
        $carView = (array) CarView::fromModel(Car::find($id));

        return ListView::fromData($carView);
    }

    public function createAction(Request $request): Response
    {
        $payload = $request->validate([
            'year' => 'required|integer',
            'make' => 'required|string|max:150',
            'model' => 'required|string|max:150'
        ]);

        $car = new Car($payload);
        $car->save();

        return response($car->id, Response::HTTP_CREATED);
    }

    public function deleteAction(int $id): Response
    {
        /** @var Car $car */
        $car = Car::find($id);
        $car->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
