<?php

namespace App\Http\Controllers;

use App\Models\Bay;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarYear;
use App\Models\Engine;
use App\Models\LeaveManagement;
use App\Models\MakeCombination;
use App\Models\ModelCombination;
use App\Models\Vechile;
use App\Models\YearCombination;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vechiles = Vechile::where('user_id',auth()->user()->id)->get();
        return view('frontend.home',compact('vechiles'));
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
        return view('frontend.booking',compact('disabledDates','vechiles','bays'));
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
     * Display the specified resource.
     */
    public function getModelsForBrand($brand)
    {
        $models = MakeCombination::where('car_brand_id', $brand)->with('carModel')->get();
        return response()->json($models);
    }

    public function getDisabledDates(Request $request) {
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
}
