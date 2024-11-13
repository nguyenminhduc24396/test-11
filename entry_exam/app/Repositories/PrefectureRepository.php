<?php

namespace App\Repositories;

use App\Models\Prefecture;

class PrefectureRepository extends BaseRepository implements PrefectureRepositoryInterface
{
    public function __construct(Prefecture $model)
    {
        parent::__construct($model);
    }
}