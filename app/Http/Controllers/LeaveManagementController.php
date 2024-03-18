<?php

namespace App\Http\Controllers;

use App\Models\LeaveManagement;
use Illuminate\Http\Request;

/**
 * Class LeaveManagementController
 * @package App\Http\Controllers
 */
class LeaveManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaveManagements = LeaveManagement::all();
        return view('content.leave-management.index', compact('leaveManagements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaveManagement = new LeaveManagement();
        return view('content.leave-management.create', compact('leaveManagement'));
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
                'leave_date' => 'required',
            ]);
            $leaveManagement = LeaveManagement::create($request->all());
            return redirect()->route('management.leave-managements.index')
                ->with('success', 'LeaveManagement created successfully.');
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
        $leaveManagement = LeaveManagement::find($id);

        return view('leave-management.show', compact('leaveManagement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leaveManagement = LeaveManagement::find($id);

        return view('content.leave-management.edit', compact('leaveManagement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LeaveManagement $leaveManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeaveManagement $leaveManagement)
    {
        request()->validate(LeaveManagement::$rules);

        $leaveManagement->update($request->all());

        return redirect()->route('management.leave-managements.index')
            ->with('success', 'LeaveManagement updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $leaveManagement = LeaveManagement::find($id)->delete();

        return redirect()->route('management.leave-managements.index')
            ->with('success', 'LeaveManagement deleted successfully');
    }
}
