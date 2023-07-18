<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\CardGenerate;
use Illuminate\Http\Request;
use Mpdf\Output\Destination;
use App\Models\UserInformation;
use App\Models\MemberInformation;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class UserInformationController extends Controller
{
    public function index()
    {
        $userinfo = UserInformation::all();

        return view('admin.userinfo.index', [
            'userinfo' => $userinfo,
            'page_title' => 'Pending Users'
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


    // FUNCTION TO GENERATE MEMBERSHIP NUMBER

    public function generateMembershipNumber() {
        // Get the last membership number from the database
        $lastMembershipNumber = DB::table('member_information')->orderBy('id', 'desc')->value('membershipno');
    
        // $lastMembershipNumber = 100000;
        // If there are no members yet, start from 100000
        if (!$lastMembershipNumber) {
            $membershipNumber = 100000;
        } else {
            // Otherwise, increment the last membership number by 1
            $membershipNumber = $lastMembershipNumber + 1;
        }

    
        return $membershipNumber;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5555',
            'name' => 'required',
            'perma_address' => 'nullable',
            'temp_address' => 'required',
            'parent_name' => 'nullable',
            'marital_status' => 'nullable',
            'spouse_name' => 'required',
            'position' => 'nullable',
            'committee' => 'nullable',
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

        $userinfo = new UserInformation();
        
        $userinfo->photo = $request->hasFile('photo') ? $this->convertProfileImage($request->file('photo')) : null;
        $userinfo->name = $request->name;
        $userinfo->perma_address = $request->perma_address;
        $userinfo->temp_address = $request->temp_address;
        $userinfo->parent_name = $request->parent_name;
        $userinfo->marital_status = $request->marital_status;
        $userinfo->spouse_name = $request->spouse_name;
        $userinfo->position = $request->position;
        $userinfo->committee = $request->committee;
        $userinfo->levi = $request->levi;
        $userinfo->work_province = $request->work_province;
        $userinfo->old_membership = $request->old_membership;
        $userinfo->district = $request->district;
        $userinfo->branch = $request->branch;
        $userinfo->work_route = $request->work_route;
        $userinfo->old_membership = $request->old_membership;
        $userinfo->blood_group = $request->blood_group;
        $userinfo->home_phone = $request->home_phone;
        $userinfo->mobile_phone = $request->mobile_phone;
        $userinfo->email = $request->email;
        $userinfo->edu_level = $request->edu_level;
        $userinfo->id_number = $request->id_number;
        $userinfo->some_number = $request->some_number;
        $userinfo->social_security = $request->social_security;
        $userinfo->min_labor = $request->min_labor;
        $userinfo->issue_date = $request->issue_date;

        if($userinfo->save()){
            return redirect()->route('registermember')->with(['successMessage' => 'Success !! Form Submitted!']);
        }else{
            return redirect()->route('registermember');
        }

    }
    public function acceptuser(Request $request, $id) 
    {
        $first = UserInformation::find($id);


        $first->photo;
        $first->name;
        $first->perma_address;
        $first->temp_address;
        $first->parent_name;
        $first->marital_status;
        $first->spouse_name;
        $first->position;
        $first->committee;
        $first->levi;
        $first->work_province;
        $first->district;
        $first->branch;
        $first->work_route;
        $first->old_membership;
        $first->blood_group;
        $first->home_phone;
        $first->mobile_phone;
        $first->email;
        $first->edu_level;
        $first->id_number;
        $first->some_number;
        $first->social_security;
        $first->min_labor; 
        $first->issue_date; 

        $second = new MemberInformation();

        $second->photo = $first->photo;
        $second->name = $first->name;
        $second->perma_address = $first->perma_address;
        $second->temp_address = $first->temp_address;
        $second->parent_name = $first->parent_name;
        $second->marital_status = $first->marital_status;
        $second->spouse_name = $first->spouse_name;
        $second->position = $first->position;
        $second->committee = $first->committee;
        $second->levi = $first->levi;
        $second->work_province = $first->work_province;
        $second->district = $first->district;
        $second->branch = $first->branch;
        $second->work_route = $first->work_route;
        $second->old_membership = $first->old_membership;
        $second->blood_group = $first->blood_group;
        $second->home_phone = $first->home_phone;
        $second->mobile_phone = $first->mobile_phone;
        $second->email = $first->email;
        $second->edu_level = $first->edu_level;
        $second->id_number = $first->id_number;
        $second->some_number = $first->some_number;
        $second->social_security = $first->social_security;
        $second->min_labor = $first->min_labor;
        $second->issue_date = $first->issue_date;

        $second->membershipno = $this->generateMembershipNumber();
        $second->approval_name = $request->input('approval_name');
        $second->approval_position = $request->input('approval_position');
        $second->card_issue_date = $request->input('card_issue_date');
        $second->expiry_date = $request->input('expiry_date');

        


        if($second->save()){

            $user = User::create([
                'name' => $second->name,
                'email' => $second->email,
                'password' => bcrypt(Str::random(40)),
                // 'api_token' => Str::random(30)
            ]);


            $card = CardGenerate::create([
                'photo' => $second->photo,
                'name' => $second->name,
                'email' => $second->email,
                'address' => $second->temp_address,
                'position' => $second->position,
                'phone' => $second->mobile_phone,
                'blood_group' => $second->blood_group,
                'committee' => $second->committee,
                'id_number' => $second->id_number,
                'membershipno' => $second->membershipno,
                'approval_name' => $second->approval_name,
                'approval_position' => $second->approval_position,
                'card_issue_date' => $second->card_issue_date,
                'expiry_date' => $second->expiry_date,
            ]);

            $pdf = new Mpdf();
            $pdf->WriteHTML(view('emails.memberCard', compact('card'))->render());
            
            // Generate a unique name for the PDF file
            $fileName = $card->name . uniqid() . '.pdf';

            // Save the PDF file to the public/pdf/members/ directory
            $pdf->Output(public_path('pdf/members/' . $fileName), Destination::FILE);

            // Associate the PDF with the PersonalInformation model
            $second->pdf()->create(['pdf' => $fileName]);

            $first->delete();

            $token = $user->createToken('api_token')->plainTextToken;
 
            // return ['token' => $token->plainTextToken];

            return redirect()->route('admin.userinfo.index')->with('message','Member Accepted');
        }

        
    }

    public function show(UserInformation $userInformation, $id)
    {
        $userinfo = UserInformation::find($id);
        return view('admin.userinfo.show', [
            'userinfo' => $userinfo,
            'page_title' => 'User Details'
        ]);
    }

    public function destroy(UserInformation $userInformation, $id)
    {
        $userinfo = UserInformation::find($id);

        $userinfo->delete();

        return redirect('admin/userinfo/index')->with(['successMessage' => 'Success!! User Information Deleted!']);
    }

}

