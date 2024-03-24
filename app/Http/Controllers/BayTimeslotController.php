<?php

namespace App\Http\Controllers;

use App\Models\Bay;
use App\Models\BayTimeslot;
use Illuminate\Http\Request;

/**
 * Class BayTimeslotController
 * @package App\Http\Controllers
 */
class BayTimeslotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bayTimeslots = BayTimeslot::with('bay')->get();
        $bays = Bay::all()->pluck('name','id');
        return view('content.bay-timeslot.index', compact('bayTimeslots','bays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bayTimeslot = new BayTimeslot();
        $bays = Bay::all()->pluck('name','id');
        return view('content.bay-timeslot.create', compact('bayTimeslot','bays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bay_id' => 'required',
            'start_time.*' => 'required',
            'end_time.*' => 'required',
        ]);
        foreach ($request->start_time as $index => $time) {
            $bayslot = new BayTimeslot();
            $bayslot->bay_id = $request->bay_id;
            $bayslot->start_time = $request->start_time[$index];
            $bayslot->end_time = $request->end_time[$index];
            $bayslot->save();
        }
        return redirect()->route('management.bay-timeslots.index')
            ->with('success', 'BayTimeslot created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bayTimeslot = BayTimeslot::find($id);

        return view('bay-timeslot.show', compact('bayTimeslot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bayTimeslot = BayTimeslot::with('bay')->find($id);
        $bays = Bay::all()->pluck('name','id');

        return view('content.bay-timeslot.edit', compact('bayTimeslot','bays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BayTimeslot $bayTimeslot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BayTimeslot $bayTimeslot)
    {
        $validatedData = $request->validate([
            'bay_id' => 'required',
        ]);
        $bayTimeslot->update($request->all());

        return redirect()->route('management.bay-timeslots.index')
            ->with('success', 'BayTimeslot updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bayTimeslot = BayTimeslot::find($id)->delete();
        return redirect()->route('management.bay-timeslots.index')
            ->with('success', 'BayTimeslot deleted successfully');
    }
}
