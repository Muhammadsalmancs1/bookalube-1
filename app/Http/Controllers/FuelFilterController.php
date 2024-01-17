<?php

namespace App\Http\Controllers;

use App\Models\FuelFilter;
use Illuminate\Http\Request;

/**
 * Class FuelFilterController
 * @package App\Http\Controllers
 */
class FuelFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuelFilters = FuelFilter::all();

        return view('content.fuel-filter.index', compact('fuelFilters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fuelFilter = new FuelFilter();
        return view('content.fuel-filter.create', compact('fuelFilter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(FuelFilter::$rules);

        $fuelFilter = FuelFilter::create($request->all());

        return redirect()->route('catalog.fuel-filters.index')
            ->with('success', 'FuelFilter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fuelFilter = FuelFilter::find($id);

        return view('content.fuel-filter.show', compact('fuelFilter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fuelFilter = FuelFilter::find($id);

        return view('content.fuel-filter.edit', compact('fuelFilter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  FuelFilter $fuelFilter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FuelFilter $fuelFilter)
    {
        request()->validate(FuelFilter::$rules);

        $fuelFilter->update($request->all());

        return redirect()->route('catalog.fuel-filters.index')
            ->with('success', 'FuelFilter updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fuelFilter = FuelFilter::find($id)->delete();

        return redirect()->route('catalog.fuel-filters.index')
            ->with('success', 'FuelFilter deleted successfully');
    }
}
