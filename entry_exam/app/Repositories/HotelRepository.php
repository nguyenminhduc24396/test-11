<?php

namespace App\Repositories;

use App\Models\Hotel;

class HotelRepository extends BaseRepository implements HotelRepositoryInterface
{
    protected $model;

    public function __construct(Hotel $model)
    {
        $this->model = $model;
    }

    public function getHotelListByNameAndPrefecture(string $hotelName = null, int $prefectureId = null): array
    {
        $query = $this->model->query();

        if (!empty($hotelName)) {
            $query->where('hotel_name', 'like', '%' . $hotelName . '%');
        }

        if (!empty($prefectureId)) {
            $query->where('prefecture_id', $prefectureId);
        }

        $result = $query->with('prefecture')->get()->toArray();

        return $result;
    }
}
