<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::first();

        if ($unit) {
            $units = Unit::paginate(10);
        } else {
            $units = collect([]); // An empty collection
        }
        return view('admin.unit.index', [
            'page_title' => 'Units',
            'units' => $units
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.unit.create', [
            'page_title' => 'Create Unit'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $unit = new Unit();
        $unit->name = $request->name;

        if ($unit->save()) {
            return redirect('admin/unit/index')->with('success', 'Unit is Created!');
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit, $id)
    {
        $unit = Unit::find($id);
        return view('admin.unit.update', [
            'page_title' => 'Update Unit',
            'unit' => $unit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $unit = Unit::find($request->id);
        $unit->name = $request->name;

        if ($unit->save()) {
            return redirect('admin/unit/index')->with("success", "Unit Updated");
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit, $id)
    {
        $unit = Unit::find($id);

        if ($unit->delete()){
            return redirect('admin/unit/index')->with("success", "Unit Deleted!");
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }
}
