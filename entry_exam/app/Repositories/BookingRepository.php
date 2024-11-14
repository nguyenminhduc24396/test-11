<?php

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository extends BaseRepository implements BookingRepositoryInterface
{
    protected $model;

    public function __construct(Booking $model)
    {
        $this->model = $model;
    }

    public function getListBookings(
        $customerName,
        $customerContact,
        $checkinTime,
        $checkoutTime
    ) {
        $query = $this->model->query();

        if ($customerName) {
            $query->where('customer_name', 'like', '%' . $customerName . '%');
        }

        if ($customerContact) {
            $query->where('customer_contact', 'like', '%' . $customerContact . '%');
        }

        if ($checkinTime) {
            $query->where('checkin_time', '>=', $checkinTime);
        }

        if ($checkoutTime) {
            $query->where('checkout_time', '<=', $checkoutTime);
        }

        return $query->get();
    }
}
