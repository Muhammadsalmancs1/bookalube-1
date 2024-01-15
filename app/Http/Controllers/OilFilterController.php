<?php

namespace App\Http\Controllers;

use App\Models\OilFilter;
use Illuminate\Http\Request;

/**
 * Class OilFilterController
 * @package App\Http\Controllers
 */
class OilFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oilFilters = OilFilter::all();

        return view('content.oil-filter.index', compact('oilFilters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oilFilter = new OilFilter();
        return view('content.oil-filter.create', compact('oilFilter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(OilFilter::$rules);

        $oilFilter = OilFilter::create($request->all());

        return redirect()->route('oil-filters.index')
            ->with('success', 'OilFilter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oilFilter = OilFilter::find($id);

        return view('content.oil-filter.show', compact('oilFilter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oilFilter = OilFilter::find($id);

        return view('content.oil-filter.edit', compact('oilFilter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  OilFilter $oilFilter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OilFilter $oilFilter)
    {
        request()->validate(OilFilter::$rules);

        $oilFilter->update($request->all());

        return redirect()->route('oil-filters.index')
            ->with('success', 'OilFilter updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $oilFilter = OilFilter::find($id)->delete();

        return redirect()->route('oil-filters.index')
            ->with('success', 'OilFilter deleted successfully');
    }
}
