<?php

namespace App\Http\Controllers;

use App\Models\Bay;
use Illuminate\Http\Request;

/**
 * Class BayController
 * @package App\Http\Controllers
 */
class BayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bays = Bay::paginate();

        return view('content.bay.index', compact('bays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bay = new Bay();
        return view('content.bay.create', compact('bay'));
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
            $engine = Bay::create($request->all());
            return redirect()->route('management.bays.index')
                ->with('success', 'Bay created successfully.');
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
        $bay = Bay::find($id);

        return view('content.bay.show', compact('bay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bay = Bay::find($id);

        return view('content.bay.edit', compact('bay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Bay $bay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bay $bay)
    {

        try {
            $validatedData = $request->validate([
                'name' => 'required',
            ]);
            $bay->update($request->all());
            return redirect()->route('management.bays.index')
                ->with('success', 'Bay updated successfully');
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
        $bay = Bay::find($id)->delete();
        return redirect()->route('management.bays.index')
            ->with('success', 'Bay deleted successfully');
    }
}
