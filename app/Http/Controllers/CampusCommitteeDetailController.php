<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CampusCommitteeDetail;
use Illuminate\Support\Facades\Storage;
use App\Exports\CampusCommitteeDetailExport;
use App\Imports\CampusCommitteeDetailImport;

class CampusCommitteeDetailController extends Controller
{
    public function fileImportExport()
    {
        $campuses = Campus::pluck('name', 'id');
        return view('admin.campuscommitteedetail.upload', [
            "page_title" => "Import Campus Committee Members",
            "campuses" => $campuses,
        ]);
    }

    public function fileImport(Request $request) 
    {
        $request->validate([
            'file'=>'required|mimes:xlsx,csv',
            'campus_id' => 'required|exists:campuses,id',
        ]);

        $campusId = $request->input('campus_id');
        $campus = Campus::findOrFail($campusId);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            Excel::import(new CampusCommitteeDetailImport($campus), $file->store('temp'));

            return redirect('admin/campuscommitteedetails/index')->with("success", "Campus Committee Details Imported!");
        }else{
            return redirect()->back()->with('error', 'There was an error while uploading.');
        }
    }

    public function fileExport(Request $request) 
    {
        $request->validate([
            'campus_id' => 'required|exists:campuses,id',
        ]);

        $campusId = $request->input('campus_id');
        $campus = Campus::findOrFail($campusId);


        $exportFile = $campus->name . "campus-committee-collection.xlsx";
        
        return Excel::download(new CampusCommitteeDetailExport($campus), $exportFile);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $selectedCampusId = $request->input('campus_id');
        $campuses = Campus::all();

        if ($selectedCampusId) {
            $campuscommitteedetails = Campus::findOrFail($selectedCampusId)
                ->campusDetails()
                ->paginate(10);
        } else {
            $campuscommitteedetails = CampusCommitteeDetail::paginate(10);
        }

        $data = [
            'page_title' => 'Campus Committee Details',
            'campuscommitteedetails' => $campuscommitteedetails,
            'campuses' => $campuses,
            'selectedCampusId' => $selectedCampusId
        ];

        return view('admin.campuscommitteedetail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $selectedCampusId = $request->input('campus_id');
        $campuses = Campus::all();

        return view('admin.campuscommitteedetail.create', [
            'campuses' => $campuses,
            'page_title' => 'Create Member',
            'selectedCampusId' => $selectedCampusId
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
            $request->image->move(public_path('uploads/campuscommitteedetail/'), $newImage);
        }
        else{
            $newImage = null;
        }

        $selectedCampusId = $request->input('campus_id');

        $campuscommitteedetail = new CampusCommitteeDetail();
        $campuscommitteedetail->name = $request->name;
        $campuscommitteedetail->phone = $request->phone;
        $campuscommitteedetail->image = $newImage;
        $campuscommitteedetail->position = $request->position;
        $campuscommitteedetail->email = $request->email;
        $campuscommitteedetail->campus_id = $selectedCampusId;

        $campuscommitteedetail->save();

        return redirect('admin/campuscommitteedetails/index')->with("message", "Campus Committee Member Stored!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CampusCommitteeDetail  $campusCommitteeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $selectedCampusId = $request->input('campus_id');
        $campuses = Campus::all();
        $campuscommitteedetail = CampusCommitteeDetail::find($id);
        return view('admin.campuscommitteedetail.update', [
            'campuscommitteedetail' => $campuscommitteedetail,
            'page_title' => "Campus Committee Detail Update",
            'campuses' => $campuses,
            'selectedCampusId' => $selectedCampusId
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CampusCommitteeDetail  $campusCommitteeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CampusCommitteeDetail $campusCommitteeDetail)
    {
        $request->validate([
            "name" => 'required|string',
            "image" => 'image|mimes:jpg,png,peg,gif,svg|max:2048',
            "phone" => 'required|string',
            "email" => 'required|string',
            "position" => 'required|string',
        ]);

        $selectedCampusId = $request->input('campus_id');
        
        
        $campuscommitteedetail = CampusCommitteeDetail::find($request->id);
        
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/campuscommitteedetail/'), $newImageName );
            Storage::delete('uploads/campuscommitteedetail/' . $campuscommitteedetail->image);
            $campuscommitteedetail->image = $newImageName;
        }else{
            unset($request['image']);
            
        }
        
        $campuscommitteedetail->name = $request->name;
        $campuscommitteedetail->phone = $request->phone;
        $campuscommitteedetail->email = $request->email;
        $campuscommitteedetail->position = $request->position;
        $campuscommitteedetail->campus_id = $selectedCampusId;
        
        if($campuscommitteedetail->save()){
       
            return redirect('admin/campuscommitteedetails/index')->with("successMessage", "Campus Committee Member Updated!");
        } else{
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CampusCommitteeDetail  $campusCommitteeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampusCommitteeDetail $campusCommitteeDetail, $id)
    {
        $campuscommitteedetail = CampusCommitteeDetail::find($id);

        if($campuscommitteedetail->delete()){
       
            return redirect('admin/campuscommitteedetails/index')->with("successMessage", "Campus Committee Member Deleted!");
        } else{
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }
}
