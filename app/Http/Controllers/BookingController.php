<?php

namespace App\Http\Controllers;

use App\Models\AirFilter;
use App\Models\Booking;
use App\Models\EngineOil;
use App\Models\Vechile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    public function getVechile($id)
    {
        $allData['booking'] = Booking::with(['vechile','vechile.engine','vechile.carYear','vechile.carModel','vechile.carBrand'])->find($id);
        $allData['engineOil'] = EngineOil::all();
        $allData['airFilter'] = AirFilter::all();
        return response()->json($allData);
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


    public function bookingNote(Request $request)
    {

        $booking = Booking::find($request->book_id);

//        dd($request->all());
        $emailfrom = env('MAIL_FROM_ADDRESS') ?? 'info@t2jb.com';
        $to = $booking->users->email;
        $subject = 'Booking Information';
        $maildata = [
            'title' => $request->title,
            'description' => $request->message,
        ];
        Mail::send('auth.booking', $maildata, function ($message) use ($emailfrom, $to, $subject) {
            $message->from($emailfrom, 'Book A Lube');
            $message->to($to);
            $message->subject($subject);
        });
    }

    public function updateVechile(Request $request)
    {
        dd($request->all());
        $vech = Vechile::find($request->vid);
        $vech->air_filter_id = $request->air_filter_id;
        $vech->engine_oil_id = $request->engine_oil_id;
        $vech->kilometer  = $request->kilometer;
        $vech->save();
        return redirect()->route('catalog.booking')
            ->with('success', 'Booking Information Update');
    }
}
