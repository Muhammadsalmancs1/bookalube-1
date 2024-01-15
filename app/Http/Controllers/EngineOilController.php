<?php

namespace App\Http\Controllers;

use App\Models\EngineOil;
use Illuminate\Http\Request;

/**
 * Class EngineOilController
 * @package App\Http\Controllers
 */
class EngineOilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engineOils = EngineOil::all();

        return view('content.engine-oil.index', compact('engineOils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $engineOil = new EngineOil();
        return view('content.engine-oil.create', compact('engineOil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EngineOil::$rules);

        $engineOil = EngineOil::create($request->all());

        return redirect()->route('engine-oils.index')
            ->with('success', 'EngineOil created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $engineOil = EngineOil::find($id);

        return view('content.engine-oil.show', compact('engineOil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $engineOil = EngineOil::find($id);

        return view('content.engine-oil.edit', compact('engineOil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EngineOil $engineOil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EngineOil $engineOil)
    {
        request()->validate(EngineOil::$rules);

        $engineOil->update($request->all());

        return redirect()->route('engine-oils.index')
            ->with('success', 'EngineOil updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $engineOil = EngineOil::find($id)->delete();

        return redirect()->route('engine-oils.index')
            ->with('success', 'EngineOil deleted successfully');
    }
}
