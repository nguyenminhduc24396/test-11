<?php

namespace App\Repositories;

interface BookingRepositoryInterface
{
    public function getListBookings(
        $customerName,
        $customerContact,
        $checkinTime,
        $checkoutTime
    );
}
