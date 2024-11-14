<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Repositories\BookingRepositoryInterface;

class BookingController extends Controller
{
    protected $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function search()
    {
        return view('admin.booking.search');
    }

    public function searchResults(Request $request)
    {
        $bookings = $this->bookingRepository->getListBookings(
            $request->input('customer_name'),
            $request->input('customer_contact'),
            $request->input('checkin_time'),
            $request->input('checkout_time')
        );

        return view('admin.booking.result', compact('bookings'));
    }
}
