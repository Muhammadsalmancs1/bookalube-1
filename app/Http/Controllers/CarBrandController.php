<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use Illuminate\Http\Request;

/**
 * Class CarBrandController
 * @package App\Http\Controllers
 */
class CarBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carBrands = CarBrand::all();

        return view('content.car-brand.index', compact('carBrands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carBrand = new CarBrand();
        return view('content.car-brand.create', compact('carBrand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
            ]);
            $carBrand = CarBrand::create($request->all());
            return redirect()->route('catalog.car-brands.index')
                ->with('success', 'CarBrand created successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['msg' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carBrand = CarBrand::find($id);

        return view('content.car-brand.show', compact('carBrand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carBrand = CarBrand::find($id);

        return view('content.car-brand.edit', compact('carBrand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CarBrand $carBrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarBrand $carBrand)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
            ]);
            $carBrand->update($request->all());
            return redirect()->route('catalog.car-brands.index')
                ->with('success', 'CarBrand updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['msg' => $th->getMessage()]);
        }
        request()->validate(CarBrand::$rules);


    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $carBrand = CarBrand::find($id)->delete();

        return redirect()->route('catalog.car-brands.index')
            ->with('success', 'CarBrand deleted successfully');
    }
}
