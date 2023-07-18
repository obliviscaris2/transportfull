<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campus = Campus::first();

        if ($campus) {
            $campuses = Campus::paginate(10);
        } else {
            $campuses = collect([]); // An empty collection
        }
        return view('admin.campus.index', [
            'page_title' => 'Campuses',
            'campuses' => $campuses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campus.create', [
            'page_title' => 'Create Campus'
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

        $campus = new Campus();
        $campus->name = $request->name;

        if ($campus->save()) {
            return redirect('admin/campus/index')->with('success', 'Campus is Created!');
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus, $id)
    {
        $campus = Campus::find($id);
        return view('admin.campus.update', [
            'page_title' => 'Update Campus',
            'campus' => $campus
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $campus = Campus::find($request->id);
        $campus->name = $request->name;

        if ($campus->save()) {
            return redirect('admin/campus/index')->with("success", "Campus Updated");
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus,$id)
    {
        $campus = Campus::find($id);

        if ($campus->delete()){
            return redirect('admin/campus/index')->with("success", "Campus Deleted!");
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }
}
