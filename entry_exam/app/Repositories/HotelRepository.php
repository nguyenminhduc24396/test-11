<?php

namespace App\Repositories;

use App\Models\Hotel;

class HotelRepository implements HotelRepositoryInterface
{
    protected $model;

    public function __construct(Hotel $model)
    {
        $this->model = $model;
    }
}