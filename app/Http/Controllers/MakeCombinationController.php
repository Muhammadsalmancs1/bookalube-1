<?php

namespace App\Http\Controllers;

use App\Models\MakeCombination;
use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Http\Request;

/**
 * Class MakeCombinationController
 * @package App\Http\Controllers
 */
class MakeCombinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makeCombinations = CarBrand::with('models')
            ->has('makeCombinations') // Assuming the relationship is named "yearCombinations"
            ->get();
        $carModels = CarModel::get()->pluck('name', 'id');
        $carBrands = CarBrand::get()->pluck('name', 'id');
        return view('content.make-combination.index', compact('makeCombinations','carModels','carBrands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makeCombination = new MakeCombination();
        $carModels = CarModel::get()->pluck('name', 'id');
        $carBrands = CarBrand::get()->pluck('name', 'id');
        return view('content.make-combination.create', compact('makeCombination','carModels','carBrands'));
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
                'brand' => 'required',
                'car_model' => 'required',
            ]);
            $carbrandId = $request->input('brand');
            $carModelIds = $request->input('car_model');
            $carbrand = CarBrand::find($carbrandId);
            if ($carbrand) {
                $carbrand->models()->sync($carModelIds);
            }
            return redirect()->route('make-combinations.index')
                ->with('success', 'Make Combination created successfully.');
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
        $makeCombination = MakeCombination::find($id);

        return view('make-combination.show', compact('makeCombination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $makeCombination = MakeCombination::find($id);

        return view('make-combination.edit', compact('makeCombination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MakeCombination $makeCombination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MakeCombination $makeCombination)
    {
        try {
            $validatedData = $request->validate([
                'brand' => 'required',
                'car_model' => 'required',
            ]);
            $carbrandId = $request->input('brand');
            $carModelIds = $request->input('car_model');

            $carBrand = CarBrand::find($carbrandId);

            if ($carBrand) {
                $carBrand->models()->sync($carModelIds);
            }
            return redirect()->route('make-combinations.index')
                ->with('success', 'Make Combination updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['msg' => $th->getMessage()]);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $carYear = CarBrand::find($id);

        if ($carYear) {
            // To delete the relationships, pass an empty array to sync
            $carYear->brands()->sync([]);
        }

        return redirect()->route('make-combinations.index')
            ->with('success', 'MakeCombination deleted successfully');
    }
}
