<?php
declare(strict_types=1);
namespace App\Trax\Application\Query;

abstract class AbstractView implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
