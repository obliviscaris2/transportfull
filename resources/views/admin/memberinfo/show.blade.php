@extends('admin.layouts.master')

@section('content')

    @if (session('successMessage'))
    <div style="height: 100px; display:flex; align-items:center; justify-content:center" class="alert alert-success">
        {!! session('successMessage') !!}
    </div>
    @endif
    @if (session('errorMessage'))
    <div style="height: 100px; display:flex; align-items:center; justify-content:center" class="alert alert-danger">
        {!! session('errorMessage') !!}
    </div>
    @endif

    <div class="row mb-2">
        <div class="col-sm-6 mb-2">
            <h2 class="mt-4 mb-2">{{ $memberinfo->name }}</h2>
            <a href="{{ route('admin.memberinfo.index') }}">
                <button class="btn-primary btn-sm">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </button>
            </a>
            <a href="{{ url('admin/memberinfo/edit/' . $memberinfo->id) }}">
                <button type="button" class="btn-primary btn-danger btn-sm">
                    Edit
                </button>
            </a>
        </div>
    </div>


    <div style="text-align: center; margin-top: 1rem;">

        <iframe src="{{ asset('pdf/members/' . $pdf->pdf) }}" width="50%" height="300px">
        </iframe>
        <form action="{{ route('admin.memberinfo.sendemail') }}" method="POST">
            @csrf
            <input type="hidden" name="pdf" value="{{ $pdf->pdf }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <button type="submit">Send Email</button>
        </form>

    </div>
    <div style="text-align: center; margin-top: 1rem;">

        <h4>Details</h4>
    </div>

    <div class="mt-4">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <label for="exampleInputEmail1">Member No:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->membershipno }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Profile Picture:</label>
                <span style="margin-left: 5px;">
                    <a href="{{ asset('uploads/images/profileimage/' . $memberinfo->photo) }}" data-lightbox="image1" data-title="{{ $memberinfo->name }}">
                        <img 
                        id="preview" 
                        src="{{ asset('uploads/images/profileimage/' .$memberinfo->photo ?? '') }}"
                        style="max-width: 100px; max-height:100px" 
                        /> 
                    </a>
                </span>
            </li>

            <li class="list-group-item">
                <label for="exampleInputEmail1">Name:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->name }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Permanent Address:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->perma_address }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Temporary Address:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->temp_address }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Father/Mother's Name:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->parent_name }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Marital Status:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->marital_status }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Spouse's Name:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->spouse_name }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Position:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->position }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Committee:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->committee }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Levi:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->levi }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Work Province:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->work_province }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">District:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->district }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Branch:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->branch }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Work Route:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->work_route }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Old Membership Date:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->old_membership }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Blood Group:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->blood_group }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Home/Office Phone:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->home_phone }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Mobile Phone:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->mobile_phone }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Email:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->email }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Education Level:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->edu_level }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Citizenship ID No. :</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->id_number }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Some No. :</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->some_number }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Social Security:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->social_security }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Received Minimum Labor:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->min_labor }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Date of issue:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $memberinfo->issue_date }} </span>
            </li>
            

            {{-- <li class="list-group-item">
                <label for="exampleInputEmail1">Citizenship/College ID:</label>
                <span style="margin-left: 25px;">
                    <a href="{{ asset('uploads/images/citizenshipimage/' . $userinfo->citizenship) }}" data-lightbox="image2" data-title="{{ $userinfo->np_fullname }}">
                        <img 
                        id="preview" 
                        src="{{ asset('uploads/images/citizenshipimage/' .$userinfo->citizenship ?? '') }}"
                        style="max-width: 100px; max-height:100px" 
                        /> 
                    </a>
                    
                </span>
            </li> --}}
        </ul>
    </div>

    <div style="display: flex; justify-content: center; align-items:center; flex-direction: column;">
        <div style="text-align: center; margin-top: 1rem;">

            <h4>Card</h4>
        </div>

        <div>

            <div style="border:1px solid black; width: 650px; height: auto;">
                <table style="width: 650px; background-color:#540e05">
                    <thead>

                        <tr>
                            <td style="background-color: ">
                                <img src="{{ asset('cardlogo.jpg') }}" style="width: 70px; height:70px;" alt="">
                            </td>
                            <td style="padding-left: 50px;">
                                <p style="font-size: 1.6em; color: white; ">All Nepal Transport Worker's Union</p>
                            </td>
                        </tr>
                    </thead>
                </table>

                <table style="width: 650px; height: 20px;">
                    <thead>
                        <tr style="color: white; background-color: rgb(0, 81, 255); font-size: 10px; height: 20px;">
                            <td style="padding-left: 8px; height: 20px;">
                                <p>R.N - 156 Department of Labour and Occupational Safety</p>
                            </td>
                            <td style="padding-left: 8px; height: 20px;">
                                <p>Associated with All Nepal Federation of Trade Union (ANTUF)</p>
                            </td>
                        </tr>
                    </thead>
                </table>

                <div style="background-color: rgba(0, 81, 255, 0.2);">
                    <div style="padding-top: 5px; background-color: rgba(0, 81, 255, 0.2)">
                        <p
                            style="margin: 0; background-color: #540e05; padding: 5px; border-radius: 8px; color: #fff; width: 105px; font-size: 14px; font-weight: 800; margin-left: 250px;">
                            Identity Card
                        </p>

                    </div>

                    <table style="width: 650px; padding-bottom: 5px; background-color: rgba(0, 81, 255, 0.2); border-collapse: collapse; border-top: none;">
                        <tbody>
                            <tr>
                                <td style="padding-left:10px;">
                                    <span style="color: #540e05; font-weight: 800;">Membership No:</span>
                                    <span>{{ $card->membershipno }}</span>
                                </td>
                                <td style="padding-left: 120px; padding-top: 15px;">
                                    <img src="{{ asset('uploads/images/profileimage/' . $card->photo) }}"
                                        alt=""
                                        style="width: 90px; height: 80px; border: 1px solid black; border-radius: 8px">

                                </td>

                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">
                                    <span style="font-weight: 800; color: rgb(0, 81, 255); margin-right: 5px;">Name:</span>
                                    <span>{{ $card->name }}</span>

                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">

                                    <span style="font-weight: 800; color: rgb(0, 81, 255); margin-right: 5px;">Citizenship/License No.:</span>
                                        <span>{{ $card->id_number }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">
                                    <span
                                        style="font-weight: 800; color: rgb(0, 81, 255); margin-right: 5px;">Position:</span>
                                    <span>{{ $card->position }}</span>

                                </td>
                                <td style="padding-left: 100px;">
                                    <p style="font-size: 11px; color: #540e05; font-weight: 800; padding-top: 1.5rem;">
                                        Signature of Attestor
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">
                                    <span
                                        style="font-weight: 800; color: rgb(0, 81, 255); margin-right: 5px;">Address:</span>
                                    <span>{{ $card->address }}<span>

                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">
                                    <span style="font-weight: 800; color: rgb(0, 81, 255); margin-right: 5px;">Phone:</span>
                                    <span>{{ $card->phone }}</span>

                                </td>
                                <td style="padding-left: 100px;">
                                    <span style="font-weight: 800; color: rgb(0, 81, 255);margin-right: 5px;">Name:</span>
                                    <span>{{ $card->approval_name }}</span>

                                </td>

                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">

                                    <span
                                        style="font-weight: 800; color: rgb(0, 81, 255); margin-right: 5px;">Committee:</span>
                                    <span>{{ $card->committee }}</span>
                                </td>
                                <td style="padding-left: 100px;">

                                    <span
                                        style="font-weight: 800; color: rgb(0, 81, 255);margin-right: 5px;">Position:</span>
                                    <span>{{ $card->approval_position }}</span>
                                </td>

                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">

                                    <span style="font-weight: 800; color: rgb(0, 81, 255); margin-right: 5px;">Blood
                                        Group:</span>
                                    <span>{{ $card->blood_group }} </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>

                <div
                    style="background-color: rgb(0, 81, 255); color: white; font-size: 12px; padding-top: 4px; height: 28px; text-align:center;">
                    <span>Peris Danda, Koteshwor-32, Kathmandu, Nepal</span>
                    <span>Tel.: +977-1-4602758</span>
                    <span>Email: antwul156@gmail.com</span>
                </div>


            </div>

        </div>

        <div
            style="margin-top: 50px; width: 650px; height: 382px; border: 1px solid black; background-color: rgba(0, 81, 255, 0.2); ">
            <div style="text-align: center; padding-top: 8px; font-size: 20px; color:#540e05; font-weight: 800;">
                <p>Membership Renewal Detail</p>
            </div>

            <p style="margin-left: 10px; color:#540e05; font-weight: 600;">Membership Issue Date: <span
                    style="color:black;"> {{ $card->card_issue_date }}</span></p>

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

            <div style="height: 50px; width: 620px; margin: 0px 15px 0 15px; text-align: center;">
                <p style="background-color: #540e05; color:white; font-size: 14px;">Card renewal on time is your
                    responsibility</p>

            </div>
        </div>
    </div>
@endsection
