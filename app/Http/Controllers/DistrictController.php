<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    public function index(Request $req){
        $districts = District::first()->paginate(10);
        return view('admin.district.index', [
            'page_title' => 'Districts',
            'districts' => $districts
        ]);

    }

    public function create()
    {
        return view('admin.district.create', [
            'page_title' => 'Create District'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $district = new District();
        $district->name = $request->name;

        if ($district->save()){
            return redirect('admin/district/index')->with("success", "District is Created!");
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }

    public function edit(District $district,$id)
    {
        $district = District::find($id);
        return view('admin.district.update', [
            'page_title' => 'Update District',
            'district' => $district
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $district = District::find($request->id);

        $district->name = $request->name;

        if ($district->save()) {
            return redirect('admin/district/index')->with("success", "District Updated");
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }

    public function destroy(Request $request, $id)
    {
        $district = District::find($id);

        if ($district->delete()){
            return redirect('admin/district/index')->with("success", "District Deleted!");
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }


    }


}
