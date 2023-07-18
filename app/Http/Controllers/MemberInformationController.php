<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\CardGenerate;
use Illuminate\Http\Request;
use App\Models\MemberInformation;
use App\Mail\SendPersonalInfoEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MemberInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberinfo = MemberInformation::paginate(20);
        $users = User::all();

        return view('admin.memberinfo.index', [
            'memberinfo' => $memberinfo,
            'users' => $users,
            'page_title' => 'Member Information',
            // 'member' => $member
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.memberinfo.create', [
            'page_title' => 'Create Member Info'
        ]);
    }

    // private function convertProfileImage($image)
    // {
    //     $ext = 'webp';
    //     $new_name = hexdec(uniqid()) . '-'. time() . '.' . $ext;
    //     $profiledestinationPath = public_path('uploads/images/profileimage/') . $new_name;
    //     $imageConvert = Image::make($image->getRealPath());
    //     $imageConvert->save($profiledestinationPath, 10);
        
    //     return $new_name;
    // }

    public function sendEmail(Request $request)
    {
        $pdfPath = public_path('pdf/members/' . $request->pdf);
        $email = $request->email;
    
        try {
            Mail::to($email)->send(new SendPersonalInfoEmail($pdfPath));
            // Email sent successfully
            return redirect()->back()->with(['successMessage' => 'Success! Your email has been sent.']);
        } catch (\Exception $e) {
            // Error occurred while sending email
            return redirect()->back()->with(['errorMessage' => 'Failed to send email. Please try again later.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5555',
            'name' => 'required',
            'perma_address' => 'nullable',
            'temp_address' => 'required',
            'father_name' => 'nullable',
            'mother_name' => 'nullable',
            'marital_status' => 'nullable',
            'spouse_name' => 'required',
            'position' => 'nullable',
            'levi' => 'nullable',
            'work_province' => 'nullable',
            'district' => 'required',
            'branch' => 'required',
            'work_route' => 'required',
            'old_membership' => 'nullable',
            'blood_group' => 'required',         
            'home_phone' => 'required',
            'mobile_phone' => 'required',
            'email' => 'required',
            'edu_level' => 'required',
            'id_number' => 'required',
            'some_number' => 'required',
            'social_security' => 'required',
            'min_labor' => 'required',
            'issue_date' => 'required',
        ]);

        $memberinfo = new MemberInformation();

        $memberinfo->photo = $request->hasFile('photo') ? $this->convertProfileImage($request->file('photo')) : null;
        $memberinfo->name = $request->name;
        $memberinfo->perma_address = $request->perma_address;
        $memberinfo->temp_address = $request->temp_address;
        $memberinfo->marital_status = $request->marital_status;
        $memberinfo->spouse_name = $request->spouse_name;
        $memberinfo->position = $request->position;
        $memberinfo->levi = $request->levi;
        $memberinfo->work_province = $request->work_province;
        $memberinfo->old_membership = $request->old_membership;
        $memberinfo->district = $request->district;
        $memberinfo->branch = $request->branch;
        $memberinfo->work_route = $request->work_route;
        $memberinfo->old_membership = $request->old_membership;
        $memberinfo->blood_group = $request->blood_group;
        $memberinfo->home_phone = $request->home_phone;
        $memberinfo->mobile_phone = $request->mobile_phone;
        $memberinfo->email = $request->email;
        $memberinfo->edu_level = $request->edu_level;
        $memberinfo->id_number = $request->id_number;
        $memberinfo->some_number = $request->some_number;
        $memberinfo->social_security = $request->social_security;
        $memberinfo->min_labor = $request->min_labor;
        $memberinfo->issue_date = $request->issue_date;

        if ($memberinfo->save()) {

            $user = User::create([
                'name' => $memberinfo->en_fullname,
                'email' => $memberinfo->email,
                'password' => bcrypt(Str::random(40)),
                // 'api_token' => Str::random(30)
            ]);

            $token = $request->user()->createToken(Str::random(40));

            return redirect()->route('admin.memberinfo.index')->with(['successMessage' => 'Success !! Member Info Created!']);
        }else {
            return redirect()->back()->with(['errorMessage' => 'Error!! Member Info NOT Created']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $memberinfo = MemberInformation::find($id);
        // $member = User::where('email', $memberinfo->email)->first();
        $card = CardGenerate::find($id);

        
        $pdf = $memberinfo->pdf; 
        $email = $memberinfo->email; // Get the recipient's email address

        return view('admin.memberinfo.show', [
            'memberinfo' => $memberinfo,
            'page_title' => 'Member Details',
            // 'member' => $member,
            'card' => $card,
            'pdf' => $pdf,
            // 'mailtoLink' => $mailtoLink
            'email' => $email,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $memberinfo = MemberInformation::find($id);

        return view('admin.memberinfo.update', [
            'memberinfo' => $memberinfo,
            'page_title' => 'Update Info'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5555',
            'name' => 'required',
            'perma_address' => 'nullable',
            'temp_address' => 'required',
            'father_name' => 'nullable',
            'mother_name' => 'nullable',
            'marital_status' => 'nullable',
            'spouse_name' => 'required',
            'position' => 'nullable',
            'levi' => 'nullable',
            'work_province' => 'nullable',
            'district' => 'required',
            'branch' => 'required',
            'work_route' => 'required',
            'old_membership' => 'nullable',
            'blood_group' => 'required',         
            'home_phone' => 'required',
            'mobile_phone' => 'required',
            'email' => 'required',
            'edu_level' => 'required',
            'id_number' => 'required',
            'some_number' => 'required',
            'social_security' => 'required',
            'min_labor' => 'required',
            'issue_date' => 'required',
        ]);

        $memberinfo = MemberInformation::find($request->id);

        $memberinfo->photo = $request->hasFile('photo') ? $this->convertProfileImage($request->file('photo')) : null;
        $memberinfo->name = $request->name;
        $memberinfo->perma_address = $request->perma_address;
        $memberinfo->temp_address = $request->temp_address;
        $memberinfo->marital_status = $request->marital_status;
        $memberinfo->spouse_name = $request->spouse_name;
        $memberinfo->position = $request->position;
        $memberinfo->levi = $request->levi;
        $memberinfo->work_province = $request->work_province;
        $memberinfo->old_membership = $request->old_membership;
        $memberinfo->district = $request->district;
        $memberinfo->branch = $request->branch;
        $memberinfo->work_route = $request->work_route;
        $memberinfo->old_membership = $request->old_membership;
        $memberinfo->blood_group = $request->blood_group;
        $memberinfo->home_phone = $request->home_phone;
        $memberinfo->mobile_phone = $request->mobile_phone;
        $memberinfo->email = $request->email;
        $memberinfo->edu_level = $request->edu_level;
        $memberinfo->id_number = $request->id_number;
        $memberinfo->some_number = $request->some_number;
        $memberinfo->social_security = $request->social_security;
        $memberinfo->min_labor = $request->min_labor;
        $memberinfo->issue_date = $request->issue_date;

        if($memberinfo->save()){
            return redirect()->route('admin.memberinfo.index')->with(['successMessage' => 'Success!! Member Info Updated!']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $memberinfo = MemberInformation::find($id);
        $user = User::where('email', $memberinfo->email)->first();

        $user->delete();
        $memberinfo->delete();

        return redirect('admin/memberinfo/index')->with(['successMessage' => 'Success !!Member Information Deleted!']);
    }
}
