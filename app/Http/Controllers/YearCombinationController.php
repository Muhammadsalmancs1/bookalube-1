<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use App\Models\CarYear;
use App\Models\YearCombination;
use Illuminate\Http\Request;

/**
 * Class YearCombinationController
 * @package App\Http\Controllers
 */
class YearCombinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yearCombinations = CarYear::with('brands')
            ->has('yearCombinations') // Assuming the relationship is named "yearCombinations"
            ->get();
        $carYears = CarYear::get()->pluck('year', 'id');
        $carBrands = CarBrand::get()->pluck('name', 'id');
        return view('content.year-combination.index', compact('yearCombinations','carYears','carBrands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $yearCombination = new YearCombination();
        $carYears = CarYear::get()->pluck('year', 'id');
        $carBrands = CarBrand::get()->pluck('name', 'id');
        return view('content.year-combination.create', compact('yearCombination', 'carYears', 'carBrands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'years' => 'required',
                'car_brand' => 'required',
            ]);
            $carYearId = $request->input('years');
            $carBrandIds = $request->input('car_brand');
            $carYear = CarYear::find($carYearId);
            if ($carYear) {
                $carYear->brands()->sync($carBrandIds);
            }
            return redirect()->route('year-combinations.index')
                ->with('success', 'CarBrand created successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['msg' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $yearCombination = YearCombination::find($id);

        return view('content.year-combination.show', compact('yearCombination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yearCombination = YearCombination::find($id);

        return view('content.year-combination.edit', compact('yearCombination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param YearCombination $yearCombination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {
            $validatedData = $request->validate([
                'years' => 'required',
                'car_brand' => 'required',
            ]);


            $carYearId = $request->input('years');
            $carBrandIds = $request->input('car_brand');

            $carYear = CarYear::find($carYearId);

            if ($carYear) {
                $carYear->brands()->sync($carBrandIds);
            }
            return redirect()->route('year-combinations.index')
                ->with('success', 'CarBrand updated successfully.');
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
        $carYear = CarYear::find($id);

        if ($carYear) {
            // To delete the relationships, pass an empty array to sync
            $carYear->brands()->sync([]);
        }
        return redirect()->route('year-combinations.index')
            ->with('success', 'YearCombination deleted successfully');
    }
}
