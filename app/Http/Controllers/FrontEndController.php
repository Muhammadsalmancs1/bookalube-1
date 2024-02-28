<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarYear;
use App\Models\Engine;
use App\Models\MakeCombination;
use App\Models\ModelCombination;
use App\Models\YearCombination;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.home');
    }

    public function addVechiles()
    {
        $years = CarYear::all();
        return view('frontend.step1', compact('years'));
    }

    public function addVechilesStore(Request $request)
    {
        dd($request->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function booking()
    {
        return view('frontend.booking');
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
