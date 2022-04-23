<?php
declare(strict_types=1);
namespace App\Trax\Domain;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function car()
    {
        return $this->hasOne('car');
    }
}
