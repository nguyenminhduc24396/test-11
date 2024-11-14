<?php

namespace App\Repositories;

interface HotelRepositoryInterface
{
    public function getHotelListByNameAndPrefecture(string $hotelName);
}
