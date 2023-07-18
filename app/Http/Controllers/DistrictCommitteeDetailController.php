<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\DistrictCommitteeDetail;
use Illuminate\Support\Facades\Storage;
use App\Exports\DistrictCommitteeDetailExport;
use App\Imports\DistrictCommitteeDetailImport;


class DistrictCommitteeDetailController extends Controller
{
    //
    public function fileImportExport()
    {
        $districts = District::pluck('name', 'id');
        return view('admin.districtcommitteedetail.upload', [
            "page_title" => "Import District Committee Members",
            "districts" => $districts,
        ]);
    }

    public function fileImport(Request $request) 
    {
        $request->validate([
            'file'=>'required|mimes:xlsx,csv',
            'district_id' => 'required|exists:districts,id',
        ]);

        $districtId = $request->input('district_id');
        $district = District::findOrFail($districtId);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            Excel::import(new DistrictCommitteeDetailImport($district), $file->store('temp'));

            return redirect('admin/districtcommitteedetails/index')->with("success", "District Committee Details Imported!");
        }else{
            return redirect()->back()->with('error', 'There was an error while uploading.');
        }
    }

    public function fileExport(Request $request) 
    {
        $request->validate([
            'district_id' => 'required|exists:districts,id',
        ]);

        $districtId = $request->input('district_id');
        $district = District::findOrFail($districtId);


        $exportFile = $district->name . "district-committee-collection.xlsx";
        
        return Excel::download(new DistrictCommitteeDetailExport($district), $exportFile);

    } 

    public function index(Request $request)
    {

        $selectedDistrictId = $request->input('district_id');
        $districts = District::all();

        if ($selectedDistrictId) {
            $districtcommitteedetails = District::findOrFail($selectedDistrictId)
                ->districtDetails()
                ->paginate(10);
        } else {
            $districtcommitteedetails = DistrictCommitteeDetail::paginate(10);
        }

        $data = [
            'page_title' => 'District Committee Details',
            'districtcommitteedetails' => $districtcommitteedetails,
            'districts' => $districts,
            'selectedDistrictId' => $selectedDistrictId
        ];

        return view('admin.districtcommitteedetail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create(Request $request)
    {
        $selectedDistrictId = $request->input('district_id');
        $districts = District::all();

        return view('admin.districtcommitteedetail.create', [
            'districts' => $districts,
            'page_title' => 'Create Member',
            'selectedDistrictId' => $selectedDistrictId
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
            $request->image->move(public_path('uploads/districtcommitteedetail/'), $newImage);
        }
        else{
            $newImage = null;
        }

        $selectedDistrictId = $request->input('district_id');

        $districtcommitteedetail = new DistrictCommitteeDetail();
        $districtcommitteedetail->name = $request->name;
        $districtcommitteedetail->phone = $request->phone;
        $districtcommitteedetail->image = $newImage;
        $districtcommitteedetail->position = $request->position;
        $districtcommitteedetail->email = $request->email;
        $districtcommitteedetail->district_id = $selectedDistrictId;

        $districtcommitteedetail->save();

        return redirect('admin/districtcommitteedetails/index')->with("message", "District Committee Member Stored!");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function edit(Request $request, $id)
    {
        $selectedDistrictId = $request->input('district_id');
        $districts = District::all();
        $districtcommitteedetail = DistrictCommitteeDetail::find($id);
        return view('admin.districtcommitteedetail.update', [
            'districtcommitteedetail' => $districtcommitteedetail,
            'page_title' => "District Committee Detail Update",
            'districts' => $districts,
            'selectedDistrictId' => $selectedDistrictId
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
        $request->validate([
            "name" => 'required|string',
            "image" => 'image|mimes:jpg,png,peg,gif,svg|max:2048',
            "phone" => 'required|string',
            "email" => 'required|string',
            "position" => 'required|string',
        ]);

        $selectedDistrictId = $request->input('district_id');
        
        
        $districtcommitteedetail = DistrictCommitteeDetail::find($request->id);
        
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/districtcommitteedetail/'), $newImageName );
            Storage::delete('uploads/districtcommitteedetail/' . $districtcommitteedetail->image);
            $districtcommitteedetail->image = $newImageName;
        }else{
            unset($request['image']);
            
        }

        $districtcommitteedetail->name = $request->name;
        $districtcommitteedetail->phone = $request->phone;
        $districtcommitteedetail->email = $request->email;
        $districtcommitteedetail->position = $request->position;
        $districtcommitteedetail->district_id = $selectedDistrictId;
        
        if($districtcommitteedetail->save()){
       
            return redirect('admin/districtcommitteedetails/index')->with("successMessage", "District Committee Member Updated!");
        } else{
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $districtcommitteedetail = DistrictCommitteeDetail::find($id);

        if($districtcommitteedetail->delete()){
       
            return redirect('admin/districtcommitteedetails/index')->with("successMessage", "District Committee Member Deleted!");
        } else{
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }
}
