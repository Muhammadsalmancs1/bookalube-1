<?php

namespace App\Http\Controllers;

use App\Models\AirFilter;
use App\Models\Engine;
use App\Models\EngineOil;
use App\Models\FuelFilter;
use App\Models\IncomingService;
use App\Models\OilFilter;
use App\Models\Service;
use Illuminate\Http\Request;

class IncomingServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomingServices = IncomingService::all();
        return view('content.incoming-services.index', compact('incomingServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $incomingService = new IncomingService();
        $services = Service::all();
        $engine_oils = EngineOil::all();
        $airFilters = AirFilter::all();
        $fuelFilters = FuelFilter::all();
        $oilFilters = OilFilter::all();
        return view('content.incoming-services.create', compact('incomingService',
             'engine_oils', 'airFilters', 'fuelFilters', 'oilFilters','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'liter.*' => 'required|string|max:255',
            'car_year_id.*' => 'required',
            'car_brand_id.*' => 'required',
            'car_model_id.*' => 'required',
            'engine_id.*' => 'required',
        ]);
        foreach ($request->liter as $index => $liter) {
            $car = new LiterCombination();
            $car->liter = $liter;
            $car->car_year_id = $request->car_year_id[$index];
            $car->car_brand_id = $request->car_brand_id[$index];
            $car->car_model_id = $request->car_model_id[$index];
            $car->engine_id = $request->engine_id[$index];
            $car->save();
        }
        return redirect()->route('catalog.liter-combinations.index')
            ->with('success', 'LiterCombination created successfully.');
    }


}
