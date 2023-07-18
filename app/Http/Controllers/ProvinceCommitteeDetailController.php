<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ProvinceCommitteeDetail;
use Illuminate\Support\Facades\Storage;
use App\Exports\ProvinceCommitteeDetailExport;
use App\Imports\ProvinceCommitteeDetailImport;

class ProvinceCommitteeDetailController extends Controller
{

    public function fileImportExport()
    {
        $provinces = Province::pluck('name', 'id');
        return view('admin.provincecommitteedetail.upload', [
            "page_title" => "Import Province Committee Members",
            "provinces" => $provinces,
        ]);
    }

    public function fileImport(Request $request) 
    {
        $request->validate([
            'file'=>'required|mimes:xlsx,csv',
            'province_id' => 'required|exists:provinces,id',
        ]);

        $provinceId = $request->input('province_id');
        $province = Province::findOrFail($provinceId);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            Excel::import(new ProvinceCommitteeDetailImport($province), $file->store('temp'));

            return redirect('admin/provincecommitteedetails/index')->with("success", "Province Committee Details Imported!");
        }else{
            return redirect()->back()->with('error', 'There was an error while uploading.');
        }
    }

    public function fileExport(Request $request) 
    {
        $request->validate([
            'province_id' => 'required|exists:provinces,id',
        ]);

        $provinceId = $request->input('province_id');
        $province = Province::findOrFail($provinceId);

        $exportFile = $province->name . "-committee-collection.xlsx";
        
        return Excel::download(new ProvinceCommitteeDetailExport($province), $exportFile);

    } 


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $selectedProvinceId = $request->input('province_id');
        $provinces = Province::all();

        if ($selectedProvinceId) {
            $provincecommitteedetails = Province::findOrFail($selectedProvinceId)
                ->committeeDetails()
                ->paginate(10);
        } else {
            $provincecommitteedetails = ProvinceCommitteeDetail::paginate(10);
        }

        $data = [
            'page_title' => 'Province Committee Details',
            'provincecommitteedetails' => $provincecommitteedetails,
            'provinces' => $provinces,
            'selectedProvinceId' => $selectedProvinceId
        ];

        return view('admin.provincecommitteedetail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $selectedProvinceId = $request->input('province_id');
        $provinces = Province::all();

        return view('admin.provincecommitteedetail.create', [
            'provinces' => $provinces,
            // 'lastSn' => $lastSn,
            'page_title' => 'Create Member',
            'selectedProvinceId' => $selectedProvinceId
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
            $request->image->move(public_path('uploads/provincecommitteedetail/'), $newImage);
        }
        else{
            $newImage = null;
        }

        $selectedProvinceId = $request->input('province_id');

        $provincecommitteedetail = new ProvinceCommitteeDetail();
        $provincecommitteedetail->name = $request->name;
        $provincecommitteedetail->phone = $request->phone;
        $provincecommitteedetail->image = $newImage;
        $provincecommitteedetail->position = $request->position;
        $provincecommitteedetail->email = $request->email;
        $provincecommitteedetail->province_id = $selectedProvinceId;

        $provincecommitteedetail->save();

        return redirect('admin/provincecommitteedetails/index')->with("message", "Province Committee Member Stored!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $selectedProvinceId = $request->input('province_id');
        $provinces = Province::all();
        $provincecommitteedetail = ProvinceCommitteeDetail::find($id);
        return view('admin.provincecommitteedetail.update', [
            'provincecommitteedetail' => $provincecommitteedetail,
            'page_title' => "Province Committee Detail Update",
            'provinces' => $provinces,
            'selectedProvinceId' => $selectedProvinceId
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
            // 'sn' => 'required',
            "name" => 'required|string',
            "image" => 'image|mimes:jpg,png,peg,gif,svg|max:2048',
            "phone" => 'required|string',
            "email" => 'required|string',
            "position" => 'required|string',
        ]);

        $selectedProvinceId = $request->input('province_id');
        
        
        $provincecommitteedetail = ProvinceCommitteeDetail::find($request->id);
        
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/provincecommitteedetail/'), $newImageName );
            Storage::delete('uploads/provincecommitteedetail/' . $provincecommitteedetail->image);
            $provincecommitteedetail->image = $newImageName;
        }else{
            unset($request['image']);
            
        }
        
        $provincecommitteedetail->name = $request->name;
        $provincecommitteedetail->phone = $request->phone;
        $provincecommitteedetail->email = $request->email;
        $provincecommitteedetail->position = $request->position;
        $provincecommitteedetail->province_id = $selectedProvinceId;
        
        if($provincecommitteedetail->save()){
       
            return redirect('admin/provincecommitteedetails/index')->with("successMessage", "Province Committee Member Updated!");
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
        $provincecommitteedetail = ProvinceCommitteeDetail::find($id);

        if($provincecommitteedetail->delete()){
       
            return redirect('admin/provincecommitteedetails/index')->with("successMessage", "Province Committee Member Deleted!");
        } else{
            return redirect()->back()->with('error', 'An error occurred while performing the operation.');
        }
    }
}
