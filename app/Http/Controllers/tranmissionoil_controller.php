<?php

namespace App\Http\Controllers;
use App\Models\tranmissionoil_model;

use Illuminate\Http\Request;

class tranmissionoil_controller extends Controller
{
    public function index(){
        $show = tranmissionoil_model::get();
        return view('content/tranmissionoil.tranmissionoil',compact('show'));

    }

    public function store(Request $request)
    {
        $store = new tranmissionoil_model;
        $store->title = $request->title;
        $store->price = $request->price;
        $store->save();

        return redirect()->back()
            ->with('success', 'Tranmission Oil created successfully.');
    }

    public function update(Request $request)
    {
        $store = tranmissionoil_model::find($request->id);
        $store->title = $request->title;
        $store->price = $request->price;
        $store->update();

        return redirect()->back()
            ->with('success', 'Tranmission Oil Updated successfully.');
    }

    public function delete($id){
        $delete = tranmissionoil_model::find($id)->delete();
        return redirect()->back()
            ->with('success', 'Tranmission Oil Deleted successfully.');

    }
}
