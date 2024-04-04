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
            'engine_oils', 'airFilters', 'fuelFilters', 'oilFilters', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required',
        ]);
        if ($request->engine_oil_id) {
            $oilPrice = EngineOil::find($request->engine_oil_id);
            $costOfOil = ((float)$oilPrice->price + (float) $request->percentage) ?? 0;
        }
        if ($request->air_filter_id || $request->fuel_filter_id || $request->oil_filter_id) {
            $airFilters = AirFilter::find($request->air_filter_id);
            $fuelFilters = FuelFilter::find($request->fuel_filter_id);
            $oilFilters = OilFilter::find($request->oil_filter_id);
            $costOfFuel = (isset($airFilters->price) ? (float) $airFilters->price : 0) + (isset($fuelFilters->price) ? (float) $fuelFilters->price : 0) + (isset($oilFilters->price) ? (float)$oilFilters->price : 0);
//         $costOfFuel = $request->total_value + $costOfFuel1;
        }
        IncomingService::create([
            'service_id' => $request->service_id,
            'price_to_add' => $request->add_price,
            'percentage' => $request->percentage,
            'cost_oil' => $costOfOil,
            'cost_of_fuel' => $costOfFuel,
            'cost_of_oil' => $costOfOil,
            'total_value' => $request->add_price,
        ]);

        return redirect()->route('catalog.incoming-services.index')
            ->with('success', 'Incoming Service Created successfully.');
    }


    public function destroy($id)
    {
        IncomingService::find($id)->delete();
        return redirect()->route('catalog.incoming-services.index')
            ->with('success', 'Incoming Service deleted successfully');
    }

}
