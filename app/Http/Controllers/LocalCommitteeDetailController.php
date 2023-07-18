<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LocalCommitteeDetail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Exports\LocalCommitteeDetailExport;
use App\Imports\LocalCommitteeDetailImport;

class LocalCommitteeDetailController extends Controller
{

    public function fileImportExport()
    {
        $locals = Local::pluck('name', 'id');
        return view('admin.localcommitteedetail.upload', [
            "page_title" => "Import Local Committee Members",
            "locals" => $locals,
        ]);
    }

    public function fileImport(Request $request) 
    {
        $request->validate([
            'file'=>'required|mimes:xlsx,csv',
            'local_id' => 'required|exists:locals,id',
        ]);

        $localId = $request->input('local_id');
        $local = Local::findOrFail($localId);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            Excel::import(new LocalCommitteeDetailImport($local), $file->store('temp'));

            return redirect('admin/localcommitteedetails/index')->with("success", "Local Committee Details Imported!");
        }else{
            return redirect()->back()->with('error', 'There was an error while uploading.');
        }
    }

    public function fileExport(Request $request) 
    {
        $request->validate([
            'local_id' => 'required|exists:locals,id',
        ]);

        $localId = $request->input('local_id');
        $local = Local::findOrFail($localId);


        $exportFile = $local->name . "local-committee-collection.xlsx";
        
        return Excel::download(new LocalCommitteeDetailExport($local), $exportFile);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $selectedLocalId = $request->input('local_id');
        $locals = Local::all();

        if ($selectedLocalId) {
            $localcommitteedetails = Local::findOrFail($selectedLocalId)
                ->localDetails()
                ->paginate(10);
        } else {
            $localcommitteedetails = LocalCommitteeDetail::paginate(10);
        }

        $data = [
            'page_title' => 'Local Committee Details',
            'localcommitteedetails' => $localcommitteedetails,
            'locals' => $locals,
            'selectedLocalId' => $selectedLocalId
        ];

        return view('admin.localcommitteedetail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $selectedLocalId = $request->input('local_id');
        $locals = Local::all();

        return view('admin.localcommitteedetail.create', [
            'locals' => $locals,
            'page_title' => 'Create Member',
            'selectedLocalId' => $selectedLocalId
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
            $request->image->move(public_path('uploads/localcommitteedetail/'), $newImage);
        }
        else{
            $newImage = null;
        }

        $selectedLocalId = $request->input('local_id');

        $localcommitteedetail = new LocalCommitteeDetail();
        $localcommitteedetail->name = $request->name;
        $localcommitteedetail->phone = $request->phone;
        $localcommitteedetail->image = $newImage;
        $localcommitteedetail->position = $request->position;
        $localcommitteedetail->email = $request->email;
        $localcommitteedetail->local_id = $selectedLocalId;

        $localcommitteedetail->save();

        return redirect('admin/localcommitteedetails/index')->with("message", "Local Committee Member Stored!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LocalCommitteeDetail  $localCommitteeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $selectedLocalId = $request->input('local_id');
        $locals = Local::all();
        $localcommitteedetail = LocalCommitteeDetail::find($id);
        return view('admin.localcommitteedetail.update', [
            'localcommitteedetail' => $localcommitteedetail,
            'page_title' => "Local Committee Detail Update",
            'locals' => $locals,
            'selectedLocalId' => $selectedLocalId
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LocalCommitteeDetail  $localCommitteeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LocalCommitteeDetail $localCommitteeDetail)
    {
        $request->validate([
            "name" => 'required|string',
            "image" => 'image|mimes:jpg,png,peg,gif,svg|max:2048',
            "phone" => 'required|string',
            "email" => 'required|string',
            "position" => 'required|string',
        ]);

        $selectedLocalId = $request->input('local_id');
        
        
        $localcommitteedetail = LocalCommitteeDetail::find($request->id);
        
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/localcommitteedetail/'), $newImageName );
            Storage::delete('uploads/localcommitteedetail/' . $localcommitteedetail->image);
            $localcommitteedetail->image = $newImageName;
        }else{
            unset($request['image']);
            
        }
        
        $localcommitteedetail->name = $request->name;
        $localcommitteedetail->phone = $request->phone;
        $localcommitteedetail->email = $request->email;
        $localcommitteedetail->position = $request->position;
        $localcommitteedetail->local_id = $selectedLocalId;
        
        if($localcommitteedetail->save()){
       
            return redirect('admin/localcommitteedetails/index')->with("successMessage", "Local Committee Member Updated!");
        } else{
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocalCommitteeDetail  $localCommitteeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocalCommitteeDetail $localCommitteeDetail, $id)
    {
        $localcommitteedetail = LocalCommitteeDetail::find($id);

        if($localcommitteedetail->delete()){
       
            return redirect('admin/localcommitteedetails/index')->with("successMessage", "Local Committee Member Deleted!");
        } else{
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }
}
