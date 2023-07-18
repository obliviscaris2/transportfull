@extends('admin.layouts.master')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6 mb-2">
            <h2 class="mt-4 mb-2">{{ $personalinfo->np_fullname }}</h2>
            <a href="{{ route('admin.personalinfo.index') }}">
                <button class="btn-primary btn-sm">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </button>
            </a>
            {{-- <a href="{{ url('admin/personalinfo/edit/' . $personalinfo->id) }}">
                <button type="button" class="btn-primary btn-danger btn-sm">
                    Edit
                </button>
            </a> --}}
        </div>
    </div>

    <div style="text-align: center; margin-top: 1rem;">

        {{-- <p>{{ $pdf->pdf }}</p> --}}
        <iframe src="{{ asset('pdf/members/' . $pdf->pdf) }}" width="30%" height="300px">
        </iframe>
        <p>Download The File</p>
        <p>To Mail the user, click <span style="background-color:#540e05; color: white">{!! $mailtoLink !!}</span></p>

    </div>
    <div style="text-align: center; margin-top: 1rem;">

        <h4>Details</h4>
    </div>
    
    <div class="mt-4">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <label for="exampleInputEmail1">Approved By/ Position:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->approval_name }}</span>
                <span style="margin-left: 5px; font-weight:900;">({{ $personalinfo->approval_position }})</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Issued At / Expires At:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->issue_date }}</span>
                <span style="color: black; font-weight: 800; font-size: 16px; margin: 0 5px 0 5px;">/</span>
                <span style="margin-left: 5px; font-weight:900;">({{ $personalinfo->expiry_date }})</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Membership Number:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->membershipno }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Email:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->email }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Full Name (Nepali):</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->np_fullname }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Full Name (English):</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->en_fullname }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Date of Birth:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->dob }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Permanent Address:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->perma_address }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Temporary Address:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->temp_address }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Gender:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->gender }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Position:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->position }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">College:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->college }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Faculty:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->faculty }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Education Level:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->edu_level }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Phone:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->phone }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Description:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->description }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Blood Group:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->blood_group }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Citizenship/College ID No. :</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $personalinfo->id_number }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Profile Picture:</label>
                <span style="margin-left: 5px;">
                    <a href="{{ asset('uploads/images/profileimage/' . $personalinfo->profile_image) }}" class="venobox">
                        <img id="preview"
                            src="{{ asset('uploads/images/profileimage/' . $personalinfo->profile_image ?? '') }}"
                            style="max-width: 100px; max-height:100px" />
                    </a>
                </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Citizenship/College ID:</label>
                <span style="margin-left: 25px;">

                    @if ($personalinfo->citizenship)
                        @foreach (json_decode($personalinfo->citizenship) as $image)
                            <a href="{{ asset('uploads/images/citizenshipimage/' . $image) }}" class="venobox">
                                <img src="{{ asset('uploads/images/citizenshipimage/' . $image) }}" id="preview"
                                    style="width: 150px; height: 150px">
                            </a>
                        @endforeach
                    @endif

                </span>
            </li>
        </ul>

    </div>
    <div style="display: flex; justify-content: center; flex-direction: column;">
        <div style="text-align: center; margin-top: 1rem;">

            <h4>Card</h4>
        </div>

        <div style="display: flex; justify-content: center;">

            <div class="personal-cards-container">
    
                    <div class="personal-card">
    
                        <div class="top-section">
    
                            <div class="logo-container">
                                <img src="{{ asset('cardlogo.png') }}" alt="">
                            </div>
                            <div>
                                {{-- <p style="font-size: 1.6em;">अनेरास्ववियू (क्रान्तिकारी) केन्द्रिय समिति</p> --}}
                                <p style="font-size: 1.6em;">Annisu Revolutionary Central Committee</p>
                                {{-- <p style="font-size: 1em; margin-left: 10%;">Annisu Revolutionary Central Committee</p> --}}
                            </div>
    
                        </div>
    
                        <div class="bottom-section">
                            <div class="member-title-container">
                                <p>Identity Card</p>
                            </div>
                            <p class="membership_number"><span class="member-number-title">Membership No:</span>
                                {{ $card->membershipno }}</p>
    
                            <div class="information-container">
                                <p><span class="info-title">Name:</span> {{ $card->name }}</p>
                                <p><span class="info-title">Email:</span> {{ $card->email }}</p>
                                <p><span class="info-title">College:</span> {{ $card->college }}</p>
                                <p><span class="info-title">Address:</span> {{ $card->address }}</p>
                                <p><span class="info-title">Phone:</span> {{ $card->phone }}</p>
                                <p><span class="info-title">Position:</span> {{ $card->position }}</p>
                                <p><span class="info-title">Blood Group:</span> {{ $card->blood_group }}</p>
                            </div>
    
                            <div class="profile-pic-container">
                                <img src="{{ asset('uploads/images/profileimage/' . $card->profile_image) }}"
                                    alt="">
    
                                <p>Signature of Attestor</p>
    
                            </div>
    
                            <div class="approve-details">
                                {{-- <p><span style="font-weight: 800; color: rgb(0, 81, 255);margin-right: 5px;" >नाम:</span>{{ $card->approval_name }}</p>
                    <p><span style="font-weight: 800; color: rgb(0, 81, 255);margin-right: 5px;">पद:</span>{{ $card->approval_position }}</p> --}}
                                <p><span
                                        style="font-weight: 800; color: rgb(0, 81, 255);margin-right: 5px;">Name:</span>{{ $card->approval_name }}
                                </p>
                                <p><span
                                        style="font-weight: 800; color: rgb(0, 81, 255);margin-right: 5px;">Position:</span>{{ $card->approval_position }}
                                </p>
                            </div>
    
                        </div>
    
                        <div
                            style="background-color: rgb(0, 81, 255); color: white; font-size: 12px; display: flex; gap: 1rem; padding-top: 4px; justify-content: center; height: 28px;">
                            <p>Peris Danda, Koteshwor-32, Kathmandu, Nepal</p>
                            <p>Tel.: +977-9840073130</p>
                            <p>Email: annisur22@gmail.com</p>
                        </div>
    
    
                    </div>
    
                    <div
                        style="width: 650px; height: 382px; border: 1px solid black; background-color: rgba(0, 81, 255, 0.2); ">
                        <div
                            style="text-align: center; padding-top: 8px; font-size: 20px; color:#540e05; font-weight: 800;">
                            <p>Membership Renewal Detail</p>
                        </div>
    
                        <p style="margin-left: 10px; color:#540e05; font-weight: 600;">Membership Issue Date: <span
                                style="color:black;"> {{ $card->issue_date }}</span></p>
    
                        <table style="border: 2px solid black; border-radius: 12px; width: 95%; margin: 0px 15px 0 15px;">
                            <thead>
                                <tr style="text-align: center; font-weight: 600; color:#540e05; ">
                                    <th style="border: 1px solid black; width: 31.6%; ">From</th>
                                    <th style="border: 1px solid black; width: 31.6%; ">Till</th>
                                    <th style="border: 1px solid black; width: 31.6%; ">Approved By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="height: 50px; border: 1px solid black;"> </td>
                                    <td style="height: 50px; border: 1px solid black;"> </td>
                                    <td style="height: 50px; border: 1px solid black;"> </td>
    
                                </tr>
                                <tr>
                                    <td style="height: 50px; border: 1px solid black;"> </td>
                                    <td style="height: 50px; border: 1px solid black;"> </td>
                                    <td style="height: 50px; border: 1px solid black;"> </td>
    
                                </tr>
                                <tr>
                                    <td style="height: 50px; border: 1px solid black;"> </td>
                                    <td style="height: 50px; border: 1px solid black;"> </td>
                                    <td style="height: 50px; border: 1px solid black;"> </td>
    
                                </tr>
                                <tr>
                                    <td style="height: 50px; border: 1px solid black;"> </td>
                                    <td style="height: 50px; border: 1px solid black;"> </td>
                                    <td style="height: 50px; border: 1px solid black;"> </td>
    
                                </tr>
                            </tbody>
                        </table>
    
                        <div style="height: 50px; width: 95%; margin: 0px 15px 0 15px; text-align: center;">
                            <p style="background-color: #540e05; color:white; font-size: 14px;">Card renewal on time is
                                your responsibility</p>
    
                        </div>
                    </div>
    
            </div>
        </div>



    </div>
@endsection
