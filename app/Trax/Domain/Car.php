<?php
declare(strict_types=1);
namespace App\Trax\Domain;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    protected $fillable = ['make', 'model', 'year'];

    public function countTrips(): int
    {
        return $this->trips()->count();
    }

    public function countMiles(): float
    {
        $totalMiles = 0;

        /** @var Trip $trip */
        foreach ($this->trips()->get() as $trip) {
            $totalMiles += $trip->miles;
        }

        return $totalMiles;
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
