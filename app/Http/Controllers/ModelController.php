<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Http\Request;

/**
 * Class ModelController
 * @package App\Http\Controllers
 */
class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = CarModel::all();
        return view('content.model.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new CarModel();
        return view('content.model.create', compact('model'));
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
                'name' => 'required',
            ]);
            $model = CarModel::create($request->all());
            return redirect()->route('catalog.models.index')
                ->with('success', 'Model created successfully.');
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
        $model = CarModel::find($id);

        return view('content.model.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = CarModel::find($id);

        return view('content.model.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param CarModel $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarModel $model)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
            ]);
            $model->update($request->all());
            return redirect()->route('catalog.models.index')
                ->with('success', 'Model updated successfully');
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
        $model = CarModel::find($id)->delete();

        return redirect()->route('catalog.models.index')
            ->with('success', 'Model deleted successfully');
    }
}
