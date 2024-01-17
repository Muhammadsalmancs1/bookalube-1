<?php

namespace App\Http\Controllers;

use App\Models\TransmissionFilter;
use Illuminate\Http\Request;

/**
 * Class TransmissionFilterController
 * @package App\Http\Controllers
 */
class TransmissionFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transmissionFilters = TransmissionFilter::paginate();

        return view('content.transmission-filter.index', compact('transmissionFilters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TransmissionFilter::$rules);

        $transmissionFilter = TransmissionFilter::create($request->all());

        return redirect()->route('catalog.transmission-filters.index')
            ->with('success', 'TransmissionFilter created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TransmissionFilter $transmissionFilter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransmissionFilter $transmissionFilter)
    {
        request()->validate(TransmissionFilter::$rules);

        $transmissionFilter->update($request->all());

        return redirect()->route('catalog.transmission-filters.index')
            ->with('success', 'TransmissionFilter updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $transmissionFilter = TransmissionFilter::find($id)->delete();

        return redirect()->route('catalog.transmission-filters.index')
            ->with('success', 'TransmissionFilter deleted successfully');
    }
}
