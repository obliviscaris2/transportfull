<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExecutiveDetail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExecutiveDetailExport;
use App\Imports\ExecutiveDetailImport;
use Illuminate\Support\Facades\Storage;


class ExecutiveDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function fileImportExport()
    {
        
        return view('admin.executivedetail.upload', [
            "page_title" => "Import Executive members"
        ]);
    }

    public function fileImport(Request $request) 
    {
        $request->validate([
            'file'=>'required|mimes:xlsx,csv',
        ]);


        if(Excel::import(new ExecutiveDetailImport, $request->file('file')->store('temp'))){
            return redirect('admin/executivedetails/index')->with("success", "Executive Details Imported!");
        }else{
            return redirect()->back()->with('error', 'There was an error while uploading.');
        }
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        
        return Excel::download(new ExecutiveDetailExport, 'users-collection.xlsx');
        return redirect('admin/executivedetails/index')->with("success", "Executive Details Exported!");

    }  
    
    public function index()
    {

       
        $executivedetails = ExecutiveDetail::latest()->paginate(10);
        return view('admin.executivedetail.index', [
            "page_title" => "Executive Details",
            "executivedetails" => $executivedetails
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.executivedetail.create',[
            'page_title' => "Create Executive Detail"
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
            "name" => "required|string",
            "image" => "image|mimes:jpg,png,peg,gif,svg|max:2048",
            "phone" => 'required|string',
            "email" => 'required|string',
            "position" => 'required|string',
        ]);


        if($request->hasfile('image')){
            $newImage = time() . "-" . $request->name . "." . $request->image->extension();
            $request->image->move(public_path('uploads/executivedetail/'), $newImage);
        }
        else{
            $newImage = null;
        }

        $executivedetail = new ExecutiveDetail;
        $executivedetail->name = $request->name;
        $executivedetail->phone = $request->phone;
        $executivedetail->image = $newImage;
        $executivedetail->email = $request->email;
        $executivedetail->position = $request->position;

        $executivedetail->save();

        return redirect('admin/executivedetails/index')->with("message", "Executive Detail Stored!");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExecutiveDetail  $executiveDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ExecutiveDetail $executiveDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExecutiveDetail  $executiveDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ExecutiveDetail $executiveDetail, $id)
    {
        $executivedetail = ExecutiveDetail::find($id);
        return view('admin.executivedetail.update', [
            'executivedetail' => $executivedetail,
            'page_title' => "Executive Update"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExecutiveDetail  $executiveDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExecutiveDetail $executiveDetail)
    {
        $request->validate([
            "name" => "required|string",
            "image" => "image|mimes:jpg,png,peg,gif,svg|max:2048",
            "phone" => 'required|string',
            "email" => 'required|string',
            "position" => 'required|string',
        ]);

        $executivedetail = ExecutiveDetail::find($request->id);

        $executivedetail->name = $request->name;

        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/executivedetail/'), $newImageName );
            Storage::delete('uploads/executivedetail/' . $executivedetail->image);
            $executivedetail->image = $newImageName;
        }else{
            unset($request['image']);
        
        }
        

        
        $executivedetail->phone = $request->phone;
        // $executivedetail->image = $newImageName;
        $executivedetail->email = $request->email;
        $executivedetail->position = $request->position;

        if($executivedetail->save()){
       

        return redirect('admin/executivedetails/index')->with("successMessage", "Executive Member Updated!");
    } else{
        return redirect()->back()->with('error', 'An error occurred while performing the operation.');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExecutiveDetail  $executiveDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExecutiveDetail $executiveDetail, $id)
    {
        $executivedetail = ExecutiveDetail::find($id);
        $executivedetail->delete();

        return redirect('admin/executivedetails/index');
    }
}
