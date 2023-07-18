<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $local = Local::first();

        if ($local) {
            $locals = Local::paginate(10);
        } else {
            $locals = collect([]); // An empty collection
        }
        return view('admin.local.index', [
            'page_title' => 'Locals',
            'locals' => $locals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.local.create', [
            'page_title' => 'Create Local'
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

        $local = new Local();
        $local->name = $request->name;

        if ($local->save()){
            return redirect('admin/local/index')->with("success", "Local is Created!");
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function edit(Local $local, $id)
    {
        $local = Local::find($id);
        return view('admin.local.update', [
            'page_title' => 'Update Local',
            'local' => $local
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Local $local)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $local = Local::find($request->id);

        $local->name = $request->name;

        if ($local->save()) {
            return redirect('admin/local/index')->with("success", "Local Updated");
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function destroy(Local $local, $id)
    {
        $local = Local::find($id);

        if ($local->delete()){
            return redirect('admin/local/index')->with("success", "Local Deleted!");
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }
}
