<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CentralCommitteeDetail;
use Illuminate\Support\Facades\Storage;
use App\Exports\CentralCommitteeDetailExport;
use App\Imports\CentralCommitteeDetailImport;


class CentralCommitteeDetailController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function fileImportExport()
     {
         
         return view('admin.centralcommitteedetail.upload', [
             "page_title" => "Import Central Committee Members"
         ]);
     }

     public function fileImport(Request $request) 
     {
         $request->validate([
             'file'=>'required|mimes:xlsx,csv',
         ]);
 
 
         if(Excel::import(new CentralCommitteeDetailImport, $request->file('file')->store('temp'))){
             return redirect('admin/centralcommitteedetails/index')->with("success", "Central Committee Details Imported!");
         }else{
             return redirect()->back()->with('error', 'There was an error while uploading.');
         }
     }

     public function fileExport() 
     {
         
        return Excel::download(new CentralCommitteeDetailExport, 'central-committee-members.xlsx');
 
     } 


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centralcommitteedetails = CentralCommitteeDetail::latest()->paginate(10);
        return view('admin.centralcommitteedetail.index', [
            "page_title" => "Central Committee Details",
            "centralcommitteedetails" => $centralcommitteedetails
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $lastSn = CentralCommitteeDetail::latest('sn')->value('sn');
        return view('admin.centralcommitteedetail.create',[
            'page_title' => "Create Central Committee Detail",
            // 'lastSn' => $lastSn,
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
            // 'sn' => 'required',
            "name" => 'required|string',
            "image" => 'image|mimes:jpg,png,peg,gif,svg|max:2048',
            "phone" => 'required|string',
            "email" => 'required|string',
            "position" => 'required|string',
        ]);

        if($request->hasfile('image')){
            $newImage = time() . "-" . $request->name . "." . $request->image->extension();
            $request->image->move(public_path('uploads/centralcommitteedetail/'), $newImage);
        }
        else{
            $newImage = null;
        }

        $centralcommitteedetail = new CentralCommitteeDetail();
        // $centralcommitteedetail->sn = $request->sn;
        $centralcommitteedetail->name = $request->name;
        $centralcommitteedetail->phone = $request->phone;
        $centralcommitteedetail->image = $newImage;
        $centralcommitteedetail->position = $request->position;
        $centralcommitteedetail->email = $request->email;

        $centralcommitteedetail->save();

        return redirect('admin/centralcommitteedetails/index')->with("message", "Executive Detail Stored!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CentralCommitteeDetail  $centralCommitteeDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CentralCommitteeDetail $centralCommitteeDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CentralCommitteeDetail  $centralCommitteeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CentralCommitteeDetail $centralCommitteeDetail, $id)
    {
        $centralcommitteedetail = CentralCommitteeDetail::find($id);
        return view('admin.centralcommitteedetail.update', [
            'centralcommitteedetail' => $centralcommitteedetail,
            'page_title' => "Central Committee Detail Update"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CentralCommitteeDetail  $centralCommitteeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CentralCommitteeDetail $centralCommitteeDetail)
    {
        $request->validate([
            // 'sn' => 'required',
            "name" => 'required|string',
            "image" => 'image|mimes:jpg,png,peg,gif,svg|max:2048',
            "phone" => 'required|string',
            "email" => 'required|string',
            "position" => 'required|string',
        ]);

        $centralcommitteedetail = CentralCommitteeDetail::find($request->id);

        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/centralcommitteedetail/'), $newImageName );
            Storage::delete('uploads/centralcommitteedetail/' . $centralcommitteedetail->image);
            $centralcommitteedetail->image = $newImageName;
        }else{
            unset($request['image']);
        
        }

        $centralcommitteedetail->name = $request->name;
        $centralcommitteedetail->phone = $request->phone;
        $centralcommitteedetail->email = $request->email;
        $centralcommitteedetail->position = $request->position;

        if($centralcommitteedetail->save()){
       

            return redirect('admin/centralcommitteedetails/index')->with("successMessage", "Central Committee Member Updated!");
        } else{
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CentralCommitteeDetail  $centralCommitteeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CentralCommitteeDetail $centralCommitteeDetail, $id)
    {
        $centralcommitteedetail = CentralCommitteeDetail::find($id);

        if($centralcommitteedetail->delete()){
       
            return redirect('admin/centralcommitteedetails/index')->with("successMessage", "Central Committee Member Deleted!");
        } else{
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }
}
