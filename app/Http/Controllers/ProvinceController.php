<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProvinceController extends Controller
{
    public function index(Request $req){
        $provinces = Province::all();
        return view('admin.province.index', [
            'page_title' => 'Provinces',
            'provinces' => $provinces
        ]);

    }

    public function create()
    {
        return view('admin.province.create', [
            'page_title' => 'Create Province'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $province = new Province();
        $province->name = $request->name;

        if ($province->save()){
            return redirect('admin/province/index')->with("success", "Province is Created!");
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }

    public function edit(Province $province,$id)
    {
        $province = Province::find($id);
        return view('admin.province.update', [
            'page_title' => 'Update Province',
            'province' => $province
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $province = Province::find($request->id);

        $province->name = $request->name;

        if ($province->save()) {
            return redirect('admin/province/index')->with("success", "Province Updated");
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }

    public function destroy(Request $request, $id)
    {
        $province = Province::find($id);

        if ($province->delete()){
            return redirect('admin/province/index')->with("success", "Province Deleted!");
        }else {
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }


    }


}
