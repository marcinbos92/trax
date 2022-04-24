<?php
declare(strict_types=1);
namespace App\Trax\Infrastructure;

use App\Http\Controllers\Controller;
use App\Trax\Application\Query\ListView;
use App\Trax\Application\Query\TripView;
use App\Trax\Domain\Trip;
use App\Trax\Domain\TripRepositoryInterface;
use App\Trax\Domain\TripService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TripController extends Controller
{
    /** @var TripRepositoryInterface */
    private $repository;
    /** @var TripService */
    private $tripService;

    public function __construct(TripRepositoryInterface $repository, TripService $tripService)
    {
        $this->repository = $repository;
        $this->tripService = $tripService;
    }

    public function listAction(): ListView
    {
        $trips = Trip::orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function (Trip $trip) { return TripView::fromModel($trip); })->toArray();

        return ListView::fromData($trips);
    }

    public function createAction(Request $request): Response
    {
        $payload = $request->validate([
            'date' => 'required|date', // ISO 8601 string
            'car_id' => 'required|integer',
            'miles' => 'required|numeric'
        ]);

        //TIP: Could be wrapped into handler class with create method.
        $date = new \DateTime($payload['date']);
        $payload['date'] = $date->format('Y-m-d');

        $miles = (float) $payload['miles'];
        $trip = new Trip($payload);
        $trip->total = $miles + $this->repository->getTotalMilesFromTripsBasedOnDate($date);

        $trip->save();
        $this->tripService->updateFutureTripsByMiles($date, $miles);

        return response($trip->id, Response::HTTP_CREATED);
    }
}
