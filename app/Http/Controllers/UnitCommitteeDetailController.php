<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\UnitCommitteeDetail;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Exports\UnitCommitteeDetailExport;
use App\Imports\UnitCommitteeDetailImport;

class UnitCommitteeDetailController extends Controller
{

    public function fileImportExport()
    {
        $units = Unit::pluck('name', 'id');
        return view('admin.unitcommitteedetail.upload', [
            "page_title" => "Import Unit Committee Members",
            "units" => $units,
        ]);
    }

    public function fileImport(Request $request) 
    {
        $request->validate([
            'file'=>'required|mimes:xlsx,csv',
            'unit_id' => 'required|exists:units,id',
        ]);

        $unitId = $request->input('unit_id');
        $unit = Unit::findOrFail($unitId);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            Excel::import(new UnitCommitteeDetailImport($unit), $file->store('temp'));

            return redirect('admin/unitcommitteedetails/index')->with("success", "Unit Committee Details Imported!");
        }else{
            return redirect()->back()->with('error', 'There was an error while uploading.');
        }
    }

    
    public function fileExport(Request $request) 
    {
        $request->validate([
            'unit_id' => 'required|exists:units,id',
        ]);

        $unitId = $request->input('unit_id');
        $unit = Unit::findOrFail($unitId);


        $exportFile = $unit->name . "unit-committee-collection.xlsx";
        
        return Excel::download(new UnitCommitteeDetailExport($unit), $exportFile);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $selectedUnitId = $request->input('unit_id');
        $units = Unit::all();

        if ($selectedUnitId) {
            $unitcommitteedetails = Unit::findOrFail($selectedUnitId)
                ->unitDetails()
                ->paginate(10);
        } else {
            $unitcommitteedetails = UnitCommitteeDetail::paginate(10);
        }

        $data = [
            'page_title' => 'Unit Committee Details',
            'unitcommitteedetails' => $unitcommitteedetails,
            'units' => $units,
            'selectedUnitId' => $selectedUnitId
        ];

        return view('admin.unitcommitteedetail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $selectedUnitId = $request->input('unit_id');
        $units = Unit::all();

        return view('admin.unitcommitteedetail.create', [
            'units' => $units,
            'page_title' => 'Create Member',
            'selectedUnitId' => $selectedUnitId
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
            "name" => 'required|string',
            "image" => 'image|mimes:jpg,png,peg,gif,svg|max:2048',
            "phone" => 'required|string',
            "email" => 'required|string',
            "position" => 'required|string',
        ]);

        if($request->hasfile('image')){
            $newImage = time() . "-" . $request->name . "." . $request->image->extension();
            $request->image->move(public_path('uploads/unitcommitteedetail/'), $newImage);
        }
        else{
            $newImage = null;
        }

        $selectedUnitId = $request->input('unit_id');

        $unitcommitteedetail = new UnitCommitteeDetail();
        $unitcommitteedetail->name = $request->name;
        $unitcommitteedetail->phone = $request->phone;
        $unitcommitteedetail->image = $newImage;
        $unitcommitteedetail->position = $request->position;
        $unitcommitteedetail->email = $request->email;
        $unitcommitteedetail->unit_id = $selectedUnitId;

        $unitcommitteedetail->save();

        return redirect('admin/unitcommitteedetails/index')->with("message", "Unit Committee Member Stored!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitCommitteeDetail  $unitCommitteeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $selectedUnitId = $request->input('unit_id');
        $units = Unit::all();
        $unitcommitteedetail = UnitCommitteeDetail::find($id);
        return view('admin.unitcommitteedetail.update', [
            'unitcommitteedetail' => $unitcommitteedetail,
            'page_title' => "Unit Committee Detail Update",
            'units' => $units,
            'selectedUnitId' => $selectedUnitId
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnitCommitteeDetail  $unitCommitteeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitCommitteeDetail $unitCommitteeDetail)
    {
        $request->validate([
            "name" => 'required|string',
            "image" => 'image|mimes:jpg,png,peg,gif,svg|max:2048',
            "phone" => 'required|string',
            "email" => 'required|string',
            "position" => 'required|string',
            "unit_id" => 'required|string'
        ]);

        $selectedUnitId = $request->input('unit_id');
        
        
        $unitcommitteedetail = UnitCommitteeDetail::find($request->id);

        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/unitcommitteedetail/'), $newImageName );
            Storage::delete('uploads/unitcommitteedetail/' . $unitcommitteedetail->image);
            $unitcommitteedetail->image = $newImageName;
        }else{
            unset($request['image']);
            
        }
        
        
        $unitcommitteedetail->name = $request->name;
        $unitcommitteedetail->phone = $request->phone;
        $unitcommitteedetail->email = $request->email;
        $unitcommitteedetail->position = $request->position;
        $unitcommitteedetail->unit_id = $selectedUnitId;
        
        if($unitcommitteedetail->save()){
       
            return redirect('admin/unitcommitteedetails/index')->with("successMessage", "Unit Committee Member Updated!");
        } else{
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitCommitteeDetail  $unitCommitteeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitCommitteeDetail $unitCommitteeDetail, $id)
    {
        $unitcommitteedetail = UnitCommitteeDetail::find($id);

        if($unitcommitteedetail->delete()){
       
            return redirect('admin/unitcommitteedetails/index')->with("successMessage", "Unit Committee Member Deleted!");
        } else{
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }
}
