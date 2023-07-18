<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\CardGenerate;
use Illuminate\Http\Request;
use App\Models\PersonalInformation;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PersonalInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personalinfo = PersonalInformation::all();
        $users = User::all();

        // $pdf = $personalinfo->pdf;
        // $fileName = $pdf->file_name; // Retrieve the file name of the associated PDF


        return view('admin.personalinfo.index', [
            'personalinfo' => $personalinfo,
            'users' => $users,
            'page_title' => 'Members'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.personalinfo.create', [
            'page_title' => 'Create Personal Info'
        ]);
    }

    // FUNCTION TO CONVERT IMAGE

    private function convertProfileImage($image)
    {
        $ext = 'webp';
        $new_name = hexdec(uniqid()) . '-'. time() . '.' . $ext;
        $profiledestinationPath = public_path('uploads/images/profileimage/') . $new_name;
        $imageConvert = Image::make($image->getRealPath());
        $imageConvert->save($profiledestinationPath, 10);
        
        return $new_name;
    }

    private function convertCitizenImages($images)
    {
        $ext = 'webp';
        $citizen_names = [];

        foreach ($images as $image) {
            $citizen_name = hexdec(uniqid()) . '-' . time() . '.' . $ext;
            $citizen_destination_path = public_path('uploads/images/citizenshipimage/') . $citizen_name;
            $image_convert = Image::make($image->getRealPath());
            $image_convert->save($citizen_destination_path, 10);
            $citizen_names[] = $citizen_name;
        }

        return $citizen_names;
    }
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'membershipno' => 'required',
            'email' => 'required',
            'np_fullname' => 'required',
            'en_fullname' => 'required',
            'dob' => 'required',
            'perma_address' => 'nullable',
            'temp_address' => 'required',
            'gender' => 'required',
            'position' => 'required',
            'college' => 'required',
            'faculty' => 'required',
            'edu_level' => 'required',
            'phone' => 'required',
            'description' => 'nullable',
            'blood_group' => 'required',
            'id_number' => 'nullable',
            'profile_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5555',
            'citizenship.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5555',
            'approval_name' => 'required',
            'approval_position' => 'required',
            'issue_date' => 'required',
            'expiry_date' => 'required',
        ]);

        $personalinfo = new PersonalInformation();

        $personalinfo->membershipno = $request->membershipno;
        $personalinfo->email = $request->email;
        $personalinfo->np_fullname = $request->np_fullname;
        $personalinfo->en_fullname = $request->en_fullname;
        $personalinfo->dob = $request->dob;
        $personalinfo->perma_address = $request->perma_address;
        $personalinfo->temp_address = $request->temp_address;
        $personalinfo->gender = $request->gender;
        $personalinfo->position = $request->position;
        $personalinfo->college = $request->college;
        $personalinfo->faculty = $request->faculty;
        $personalinfo->edu_level = $request->edu_level;
        $personalinfo->phone = $request->phone;
        $personalinfo->description = $request->description;
        $personalinfo->blood_group = $request->blood_group;
        $personalinfo->id_number = $request->id_number;

        $personalinfo->profile_image = $request->hasFile('profile_image') ? $this->convertProfileImage($request->file('profile_image')) : null;

        $personalinfo->citizenship = $request->hasFile('citizenship') ? json_encode($this->convertCitizenImages($request->file('citizenship'))) : [];

        $personalinfo->approval_name = $request->approval_name;
        $personalinfo->approval_position = $request->approval_position;
        $personalinfo->issue_date = $request->issue_date;
        $personalinfo->expiry_date = $request->expiry_date;
        
        
        if ($personalinfo->save()) {

            $user = User::create([
                'name' => $personalinfo->en_fullname,
                'email' => $personalinfo->email,
                'password' => bcrypt(Str::random(40)),
                // 'api_token' => Str::random(30)
            ]);

            $card = CardGenerate::create([
                'profile_image' => $personalinfo->profile_image,
                'membershipno' => $personalinfo->membershipno,
                'name' => $personalinfo->en_fullname,
                'email' => $personalinfo->email,
                'college' => $personalinfo->college,
                'address' => $personalinfo->temp_address,
                'phone' => $personalinfo->phone,
                'position' => $personalinfo->position,
                'blood_group' => $personalinfo->blood_group,
                'approval_name' => $personalinfo->approval_name,
                'approval_position' => $personalinfo->approval_position,
                'issue_date' => $personalinfo->issue_date,
                'expiry_date' => $personalinfo->expiry_date,
            ]);

            $token = $request->user()->createToken(Str::random(40));

            return redirect()->route('admin.personalinfo.index')->with(['successMessage' => 'Success !! Personal Info Created!']);
        }   
        
        else {
            return redirect()->back()->with(['errorMessage' => 'Error!! Personal Info not created']);
        }
           
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalInformation $personalInformation, $id)
    {
        $personalinfo = PersonalInformation::find($id);
        $card = CardGenerate::find($id);

        
        $pdf = $personalinfo->pdf; 
        $email = $personalinfo->email; // Get the recipient's email address

        $fileName = $personalinfo->pdf; // Retrieve the file name of the associated PDF

        $mailtoLink = '<a href="mailto:' . $email . '?attach=' . $fileName . '">Send Email</a>';

        return view('admin.personalinfo.show', [
            "personalinfo" => $personalinfo,
            "page_title" => "Personal Details",
            'card' => $card,
            'pdf' => $pdf,
            'mailtoLink' => $mailtoLink
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonalInformation $personalInformation, $id)
    {
        $personalinfo = PersonalInformation::find($id);

        return view('admin.personalinfo.update', [
            'personalinfo' => $personalinfo,
            'page_title' => 'Update Info'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PersonalInformation $personalInformation)
    {
        $this->validate($request, [
            'email' => 'required',
            'np_fullname' => 'required',
            'en_fullname' => 'required',
            'dob' => 'required',
            'perma_address' => 'nullable',
            'temp_address' => 'required',
            'gender' => 'required',
            'position' => 'required',
            'college' => 'required',
            'faculty' => 'required',
            'edu_level' => 'required',
            'phone' => 'required',
            'description' => 'nullable',
            'blood_group' => 'required',
            'id_number' => 'nullable',
            'profile_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5555',
            'citizenship.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5555',
            'approval_name' => 'required',
            'approval_position' => 'required',
        ]);

        $personalinfo = PersonalInformation::find($request->id);

        $personalinfo->email = $request->email;
        $personalinfo->np_fullname = $request->np_fullname;
        $personalinfo->en_fullname = $request->en_fullname;
        $personalinfo->dob = $request->dob;
        $personalinfo->perma_address = $request->perma_address;
        $personalinfo->temp_address = $request->temp_address;
        $personalinfo->gender = $request->gender;
        $personalinfo->position = $request->position;
        $personalinfo->college = $request->college;
        $personalinfo->faculty = $request->faculty;
        $personalinfo->edu_level = $request->edu_level;
        $personalinfo->phone = $request->phone;
        $personalinfo->description = $request->description;
        $personalinfo->blood_group = $request->blood_group;
        $personalinfo->id_number = $request->id_number;
        $personalinfo->approval_name = $request->approval_name;
        $personalinfo->approval_position = $request->approval_position;


        $personalinfo->profile_image = $request->hasFile('profile_image') ? $this->convertProfileImage($request->file('profile_image')) : null;

        $personalinfo->citizenship = $request->hasFile('citizenship') ? json_encode($this->convertCitizenImages($request->file('citizenship'))) : [];


        if($personalinfo->save()){
            return redirect()->route('admin.personalinfo.index')->with(['successMessage' => 'Success!! Personal Info Updated!']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalInformation $personalInformation, $id)
    {
        $personalinfo = PersonalInformation::find($id);

        $profile_image = public_path('uploads/images/profileimage/' . $personalinfo->profile_image);

        unlink($profile_image);


        $user = User::where('email', $personalinfo->email)->first();
        $card = CardGenerate::where('name', $personalinfo->en_fullname)->first();

        $card->delete();
        $user->delete();
        $personalinfo->delete();

        return redirect('admin/personalinfo/index')->with(['successMessage' => 'Success! Member Deleted!']);
    }
}
