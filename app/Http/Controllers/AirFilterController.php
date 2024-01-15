<?php

namespace App\Http\Controllers;

use App\Models\AirFilter;
use Illuminate\Http\Request;

/**
 * Class AirFilterController
 * @package App\Http\Controllers
 */
class AirFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airFilters = AirFilter::all();

        return view('content.air-filter.index', compact('airFilters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airFilter = new AirFilter();
        return view('content.air-filter.create', compact('airFilter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AirFilter::$rules);

        $airFilter = AirFilter::create($request->all());

        return redirect()->route('air-filters.index')
            ->with('success', 'AirFilter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $airFilter = AirFilter::find($id);

        return view('content.air-filter.show', compact('airFilter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airFilter = AirFilter::find($id);

        return view('content.air-filter.edit', compact('airFilter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AirFilter $airFilter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AirFilter $airFilter)
    {
        request()->validate(AirFilter::$rules);

        $airFilter->update($request->all());

        return redirect()->route('air-filters.index')
            ->with('success', 'AirFilter updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $airFilter = AirFilter::find($id)->delete();

        return redirect()->route('air-filters.index')
            ->with('success', 'AirFilter deleted successfully');
    }
}
