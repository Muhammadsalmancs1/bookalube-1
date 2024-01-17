<?php

namespace App\Http\Controllers;

use App\Models\CarYear;
use Illuminate\Http\Request;

/**
 * Class CarYearController
 * @package App\Http\Controllers
 */
class CarYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carYears = CarYear::all();

        return view('content.car-year.index', compact('carYears'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carYear = new CarYear();
        return view('content.car-year.create', compact('carYear'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CarYear::$rules);

        $carYear = CarYear::create($request->all());

        return redirect()->route('catalog.car-years.index')
            ->with('success', 'CarYear created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carYear = CarYear::find($id);

        return view('content.car-year.show', compact('carYear'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carYear = CarYear::find($id);

        return view('content.car-year.edit', compact('carYear'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CarYear $carYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarYear $carYear)
    {
        request()->validate(CarYear::$rules);

        $carYear->update($request->all());

        return redirect()->route('catalog.car-years.index')
            ->with('success', 'CarYear updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $carYear = CarYear::find($id)->delete();

        return redirect()->route('catalog.car-years.index')
            ->with('success', 'CarYear deleted successfully');
    }
}
