<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use function Ramsey\Uuid\v1;

class BookingController extends Controller
{
    public function index()
    {

         $activeBookings = Booking::with(['users','bay','bayTimeSlot','vechile'])->where('booking_status','Active')->get();
         $bookings = Booking::with(['users','bay','bayTimeSlot','vechile'])->get();
         $cancelBookings = Booking::with(['users','bay','bayTimeSlot','vechile'])->where('booking_status','Cancel')->get();
         $completeBookings = Booking::with(['users','bay','bayTimeSlot','vechile'])->where('booking_status','Completed')->get();
         $noShowBookings = Booking::with(['users','bay','bayTimeSlot','vechile'])->where('booking_status','NoShow')->get();
        return view('content.bookings.index',compact('activeBookings','bookings','cancelBookings','completeBookings','noShowBookings'));
    }

    public function cancel($id)
    {

        dd($id);
    }
}
