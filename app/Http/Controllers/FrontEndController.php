<?php

namespace App\Http\Controllers;

use App\Models\Bay;
use App\Models\Booking;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarYear;
use App\Models\Engine;
use App\Models\LeaveManagement;
use App\Models\MakeCombination;
use App\Models\ModelCombination;
use App\Models\User;
use App\Models\Vechile;
use App\Models\YearCombination;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vechiles = Vechile::where('user_id', auth()->user()->id)->get();
        return view('frontend.home', compact('vechiles'));
    }

    public function addVechiles()
    {
        $years = CarYear::all();
        return view('frontend.step1', compact('years'));
    }

    public function addVechilesStore(Request $request)
    {
        $request->validate([
            'car_name.*' => 'required|string|max:255',
            'car_year_id.*' => 'required',
            'car_brand_id.*' => 'required',
            'car_model_id.*' => 'required',
            'engine_id.*' => 'required',
        ]);
        foreach ($request->car_name as $index => $carName) {
            $car = new Vechile();
            $car->car_name = $carName;
            $car->car_year_id = $request->car_year_id[$index];
            $car->car_brand_id = $request->car_brand_id[$index];
            $car->car_model_id = $request->car_model_id[$index];
            $car->engine_id = $request->engine_id[$index];
            $car->user_id = auth()->user()->id;
            $car->save();
        }
        return redirect()->route('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function booking($id)
    {
        $disabledDates = LeaveManagement::select('leave_date')->get();
        $vechiles = Vechile::find($id);
        $bays = Bay::with('bayTimeSlot')->get();
        return view('frontend.booking', compact('disabledDates', 'vechiles', 'bays'));
    }

    /**
     * Display the specified resource.
     */
    public function getBrandsForYear($year)
    {
        $brands = YearCombination::where('car_year_id', $year)->with('carBrand')->get();
        return response()->json($brands);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function bookingEdit($id)
    {
        $vechiles = Vechile::find($id);
        $years = CarYear::all();
        $carModels = CarModel::get()->pluck('name', 'id');
        $carEngines = Engine::get()->pluck('name', 'id');
        $carBrands = CarBrand::all()->pluck('name', 'id');
        return view('frontend.booking-edit', compact('vechiles', 'years', 'carEngines', 'carModels', 'carBrands'));
    }


    /**
     * Display the specified resource.
     */
    public function bookingStore(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'date' => 'required',
                'time_slot' => 'required',
                'bay_id' => 'required',
            ]);
            $booking = new Booking();
            $date = Carbon::createFromFormat('m/d/Y', $request->date);
            $formattedDate = $date->format('Y-m-d');
            $booking->booking_date = $formattedDate;
            $booking->bay_id = $request->bay_id;
            $booking->vechile_id = $request->vechile_id;
            $booking->bay_timeslot_id = $request->time_slot;
            $booking->user_id = auth()->user()->id;
            $booking->booking_status = 'Active';
            $booking->extra_services = (json_encode($request->extra_services)) ? json_encode($request->extra_services) : null;
            $booking->save();
            return view('frontend.conifrm')
                ->with('success', 'Booking created successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['msg' => $th->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function getModelsForBrand($brand)
    {
        $models = MakeCombination::where('car_brand_id', $brand)->with('carModel')->get();
        return response()->json($models);
    }

    public function getDisabledDates(Request $request)
    {
        $disabledDates = LeaveManagement::pluck('leave_date')->all();
        return response()->json($disabledDates);
    }

    /**
     * Display the specified resource.
     */
    public function getEnginesForModel($model)
    {
        $engines = ModelCombination::where('car_model_id', $model)->with('engine')->get();
        return response()->json($engines);
    }


    public function updateBooking(Request $request, $id)
    {
        $request->validate([
            'car_name' => 'required|string|max:255',
            'car_year_id' => 'required',
            'car_brand_id' => 'required',
            'car_model_id' => 'required',
            'engine_id' => 'required',
        ]);
        $vechicle = Vechile::find($id);
        $vechicle->update($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Updated successfully');
    }

    /**
     *
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function setting()
    {
        return view('frontend.setting');
    }


    public function updateEmail(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->email = $request->email;
        $user->save();
        return redirect()->route('dashboard')
            ->with('success', 'Updated successfully');
    }

    public function password()
    {
        return view('frontend.update-password');
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::find(auth()->user()->id);

        // Check if the old password matches
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Your old password does not match our records.']);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->route('dashboard')
            ->with('success', 'Updated successfully');
    }


    public function referralCredit()
    {
        return view('frontend.referral-credit');
    }

    public function updateReferralCredit(Request $request)
    {

        $user = User::find(auth()->user()->id);
        $user->referral = $request->referral;
        $user->employee_name = $request->employee_name;
        $user->employee_number = $request->employee_number;
        $user->save();
        return redirect()->route('dashboard')
            ->with('success', 'Updated successfully');
    }

    public function serviceHistory($id)
    {
        $bookingInfos = Booking::with(['vechile','vechile.engine','vechile.carYear','vechile.carModel','vechile.carBrand','bay','bayTimeSlot'])
            ->where('vechile_id',$id)->get();
        return view('frontend.service-history',compact('bookingInfos'));
    }

    public function upcomingService($id)
    {
        $bookingInfo = Booking::with(['vechile','vechile.engine','vechile.carYear','vechile.carModel','vechile.carBrand','bay','bayTimeSlot'])
            ->where('vechile_id',$id)->where('booking_status','Active')->orderBy('id','desc')->first();
        return view('frontend.upcoming-service',compact('bookingInfo'));
    }

    public function changeStatus($id)
    {
        $bookingInfo = Booking::find($id);
        $bookingInfo->booking_status = 'Cancel';
        $bookingInfo->save();
        return redirect()->route('dashboard')
            ->with('success', 'Updated successfully');
    }

}
