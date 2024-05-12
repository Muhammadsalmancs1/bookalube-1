<?php

namespace App\Http\Controllers;
use App\Models\differntialoil_model;

use Illuminate\Http\Request;

class differntialoil_controller extends Controller
{
    public function index(){
        $show = differntialoil_model::get();
        return view('content/differntialoil.index',compact('show'));

    }

    public function store(Request $request)
    {
        $store = new differntialoil_model;
        $store->title = $request->title;
        $store->price = $request->price;
        $store->save();

        return redirect()->back()
            ->with('success', 'Differntial Oil created successfully.');
    }

    public function update(Request $request)
    {
        $store = differntialoil_model::find($request->id);
        $store->title = $request->title;
        $store->price = $request->price;
        $store->update();

        return redirect()->back()
            ->with('success', 'Differntial Oil Updated successfully.');
    }

    public function delete($id){
        $delete = differntialoil_model::find($id)->delete();
        return redirect()->back()
            ->with('success', 'Differntial Oil Deleted successfully.');

    }
}
