<?php

namespace App\Http\Controllers;

use App\Models\CarYear;
use App\Models\ModelCombination;
use App\Models\CarModel;
use App\Models\Engine;
use Illuminate\Http\Request;

/**
 * Class ModelCombinationController
 * @package App\Http\Controllers
 */
class ModelCombinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelCombinations = CarModel::with('engines')
            ->has('modelCombinations')
            ->get();
        $carModels = CarModel::get()->pluck('name', 'id');
        $carEngines = Engine::get()->pluck('name', 'id');
        return view('content.model-combination.index', compact('modelCombinations','carModels','carEngines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelCombination = new ModelCombination();
        $carModels = CarModel::get()->pluck('name', 'id');
        $carEngines = Engine::get()->pluck('name', 'id');
        return view('content.model-combination.create', compact('modelCombination','carModels','carEngines'));
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
                'car_model' => 'required',
                'engine' => 'required',
            ]);

            $carModelId = $request->input('car_model');
            $carEngineIds = $request->input('engine');
            $carmodel = CarModel::find($carModelId);
            if ($carmodel) {
                $carmodel->engines()->sync($carEngineIds);
            }
            return redirect()->route('catalog.model-combinations.index')
                ->with('success', 'ModelCombination created successfully.');
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
        $modelCombination = ModelCombination::find($id);

        return view('content.model-combination.show', compact('modelCombination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelCombination = ModelCombination::find($id);

        return view('content.model-combination.edit', compact('modelCombination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ModelCombination $modelCombination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelCombination $modelCombination)
    {

        try {
            $validatedData = $request->validate([
                'engine' => 'required',
                'car_model' => 'required',
            ]);

            $carModelId = $request->input('car_model');
            $carEngineIds = $request->input('engine');
            $carModel = CarModel::find($carModelId);
            if ($carModel) {
                $carModel->engines()->sync($carEngineIds);
            }
            return redirect()->route('catalog.model-combinations.index')
                ->with('success', 'ModelCombination updated successfully.');
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
        $carModel = CarModel::find($id);

        if ($carModel) {
            // To delete the relationships, pass an empty array to sync
            $carModel->engines()->sync([]);
        }


        return redirect()->route('catalog.model-combinations.index')
            ->with('success', 'ModelCombination deleted successfully');
    }
}
