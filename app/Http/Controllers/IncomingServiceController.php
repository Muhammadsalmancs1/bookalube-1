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
        if ($request->service_id == 2) {
            if ($request->engine_oil_id) {
                $oilPrice = EngineOil::find($request->engine_oil_id);
                $percentage = $request->percentage / 100; 
                $percentagefilter = $request->percentagefilter / 100; 

            }

            if ($request->air_filter_id || $request->fuel_filter_id || $request->oil_filter_id) {
                $airFilters = AirFilter::find($request->air_filter_id);
                $fuelFilters = FuelFilter::find($request->fuel_filter_id);
                $oilFilters = OilFilter::find($request->oil_filter_id);
                $costOfairfilter = ((isset($airFilters->price) ? (float) $airFilters->price : 0) + $percentagefilter)+$request->airfiltercount ? (float) $request->airfiltercount : 0;
                $costoffuelfilter = ((isset($fuelFilters->price) ? (float) $fuelFilters->price : 0) + $percentagefilter)+$request->fuelfiltercount ? (float) $request->fuelfiltercount : 0;
                $costofoilfilter = ((isset($oilFilters->price) ? (float)$oilFilters->price : 0) + $percentagefilter)+$request->fuelfiltercount ? (float) $request->fuelfiltercount : 0;
                $costOffilters = $costOfairfilter + $costoffuelfilter + $costofoilfilter;
            }
            $castofoil = $costOffilters+$request->add_price ?? 0;
            $totalcost = (isset($oilPrice->price) ? (float)$oilPrice->price : 0 + $percentage)+$castofoil;
            IncomingService::create([
                'service_id' => $request->service_id,
                'price_to_add' => $request->add_price,
                'percentage' => $request->percentage,
                'cost_oil' => $oilPrice->price,
                'cost_of_fuel' => $costOffilters,
                'cost_of_oil' => $castofoil,
                'total_value' => $totalcost,
            ]);
        }
       
        if ($request->service_id == 3) {
            if ($request->engine_oil_id) {
                $oilPrice = EngineOil::find($request->engine_oil_id);
                $percentage = $request->percentage / 100; 
                $percentagefilter = $request->percentagefilter / 100; 

            }

            if ($request->air_filter_id || $request->fuel_filter_id || $request->oil_filter_id) {
                $airFilters = AirFilter::find($request->air_filter_id);
                $fuelFilters = FuelFilter::find($request->fuel_filter_id);
                $oilFilters = OilFilter::find($request->oil_filter_id);
                $costOfairfilter = ((isset($airFilters->price) ? (float) $airFilters->price : 0) + $percentagefilter)+$request->airfiltercount ? (float) $request->airfiltercount : 0;
                $costoffuelfilter = ((isset($fuelFilters->price) ? (float) $fuelFilters->price : 0) + $percentagefilter)+$request->fuelfiltercount ? (float) $request->fuelfiltercount : 0;
                $costofoilfilter = ((isset($oilFilters->price) ? (float)$oilFilters->price : 0) + $percentagefilter)+$request->fuelfiltercount ? (float) $request->fuelfiltercount : 0;
                $costOffilters = $costOfairfilter + $costoffuelfilter + $costofoilfilter;
            }
            $castofoil = $costOffilters+$request->add_price ?? 0;
            $totalcost = (isset($oilPrice->price) ? (float)$oilPrice->price : 0 + $percentage)+$castofoil;
            IncomingService::create([
                'service_id' => $request->service_id,
                'price_to_add' => $request->add_price,
                'percentage' => $request->percentage,
                'cost_oil' => $oilPrice->price,
                'cost_of_fuel' => $costOffilters,
                'cost_of_oil' => $castofoil,
                'total_value' => $totalcost,
            ]);
        }

        if ($request->service_id == 4) {
            if ($request->service_id) {
                $percentagefilter = $request->percentagefilter / 100; 
            if ($request->air_filter_id) {
                $airFilters = AirFilter::find($request->air_filter_id);
                $airFilterPrice = $airFilters->price ?? 0;
                $addPrice = $request->add_price ?? 0;
                
                $costOfAirFilter = floatval($airFilterPrice) + $percentagefilter + floatval($addPrice);
               
                $costOffilters = $costOfAirFilter;
            }
           
            IncomingService::create([
                'service_id' => $request->service_id,
                'price_to_add' => $request->add_price,
                'cost_of_fuel' => $costOffilters,
                'total_value' => $costOffilters,
            ]);
        }
    }
       
       
    if ($request->service_id == 5) {
        if ($request->service_id) {
            $percentagefilter = $request->percentagefilter / 100; 
        if ($request->air_filter_id) {
            $fuelFilters = FuelFilter::find($request->fuel_filter_id);
            $fuelFilterPrice = $fuelFilters->price ?? 0;
            $addPrice = $request->add_price ?? 0;
            
            $costOffuelFilter = floatval($fuelFilterPrice) + $percentagefilter + floatval($addPrice);
           
            $costOffilters = $costOffuelFilter;
        }
       
        IncomingService::create([
            'service_id' => $request->service_id,
            'price_to_add' => $request->add_price,
            'cost_of_fuel' => $costOffilters,
            'total_value' => $costOffilters,
        ]);
    }
}
   
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
