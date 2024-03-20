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
        $booking = Booking::find($id);
        $booking->booking_status = 'Cancel';
        $booking->save();

        return redirect()->route('catalog.booking')
            ->with('success', 'Booking status Update');

    }

    public function compelete($id)
    {
        $booking = Booking::find($id);
        $booking->booking_status = 'Completed';
        $booking->save();

        return redirect()->route('catalog.booking')
            ->with('success', 'Booking status Update');

    }

    public function noShow($id)
    {
        $booking = Booking::find($id);
        $booking->booking_status = 'NoShow';
        $booking->save();

        return redirect()->route('catalog.booking')
            ->with('success', 'Booking status Update');

    }
}
