<?php

namespace App\Http\Controllers;

use App\Models\Engine;
use Illuminate\Http\Request;

/**
 * Class EngineController
 * @package App\Http\Controllers
 */
class EngineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engines = Engine::all();
        return view('content.engine.index', compact('engines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            $engine = Engine::create($request->all());
            return redirect()->route('catalog.engines.index')
                ->with('success', 'Engine created successfully.');
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
        $engine = Engine::find($id);

        return view('content.engine.show', compact('engine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $engine = Engine::find($id);

        return view('content.engine.edit', compact('engine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Engine $engine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Engine $engine)
    {

        try {
            $validatedData = $request->validate([
                'name' => 'required',
            ]);
            $engine->update($request->all());
            return redirect()->route('catalog.engines.index')
                ->with('success', 'Engine updated successfully.');
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
        $engine = Engine::find($id)->delete();

        return redirect()->route('catalog.engines.index')
            ->with('success', 'Engine deleted successfully');
    }
}
