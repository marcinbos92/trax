<?php
declare(strict_types=1);
namespace App\Trax\Domain;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['date', 'total', 'miles', 'car_id'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
