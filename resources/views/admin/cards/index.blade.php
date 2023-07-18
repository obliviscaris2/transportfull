@extends('admin.layouts.master') 


@section('content')

<div class="personal-cards-container">
    
    @foreach ($cards as $card )
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
                <p class="membership_number"><span class="member-number-title">Membership No:</span> {{ $card->membershipno}}</p>

                <div class="information-container">
                    
                    {{-- <p style="margin:0; margin-top: 10px;"><span style="font-weight: 800; color: rgb(0, 81, 255); margin-right: 5px;">नाम:</span> {{ $card->name}}</p>
                    <p style="margin:0; margin-top: 10px;"><span style="font-weight: 800; color: rgb(0, 81, 255); margin-right: 5px;">इमेल:</span> {{ $card->email}}</p>
                    <p style="margin:0; margin-top: 10px;"><span style="font-weight: 800; color: rgb(0, 81, 255); margin-right: 5px;">कलेज:</span> {{ $card->college}}</p>
                    <p style="margin:0; margin-top: 10px;"><span style="font-weight: 800; color: rgb(0, 81, 255); margin-right: 5px;">ठेगाना:</span> {{ $card->address}}</p>
                    <p style="margin:0; margin-top: 10px;"><span style="font-weight: 800; color: rgb(0, 81, 255); margin-right: 5px;">फोन नं:</span> {{ $card->phone}}</p>
                    <p style="margin:0; margin-top: 10px;"><span style="font-weight: 800; color: rgb(0, 81, 255); margin-right: 5px;">पद:</span> {{ $card->position}}</p>
                    <p style="margin:0; margin-top: 10px;"><span style="font-weight: 800; color: rgb(0, 81, 255); margin-right: 5px;">रक्त समूह:</span> {{ $card->blood_group}}</p> --}}

                    <p><span class="info-title">Name:</span> {{ $card->name}}</p>
                    <p><span class="info-title">Email:</span> {{ $card->email}}</p>
                    <p><span class="info-title">College:</span> {{ $card->college}}</p>
                    <p><span class="info-title">Address:</span> {{ $card->address}}</p>
                    <p><span class="info-title">Phone:</span> {{ $card->phone}}</p>
                    <p><span class="info-title">Position:</span> {{ $card->position}}</p>
                    <p><span class="info-title">Blood Group:</span> {{ $card->blood_group}}</p>
                </div>

                <div class="profile-pic-container">
                    <img src="{{ asset('uploads/images/profileimage/' . $card->profile_image) }}" alt="">

                    <p>Signature of Attestor</p>

                </div>
                
                <div class="approve-details">
                    {{-- <p><span style="font-weight: 800; color: rgb(0, 81, 255);margin-right: 5px;" >नाम:</span>{{ $card->approval_name }}</p>
                    <p><span style="font-weight: 800; color: rgb(0, 81, 255);margin-right: 5px;">पद:</span>{{ $card->approval_position }}</p> --}}
                    <p><span style="font-weight: 800; color: rgb(0, 81, 255);margin-right: 5px;" >Name:</span>{{ $card->approval_name }}</p>
                    <p><span style="font-weight: 800; color: rgb(0, 81, 255);margin-right: 5px;">Position:</span>{{ $card->approval_position }}</p>
                </div>

            </div>

            <div style="background-color: rgb(0, 81, 255); color: white; font-size: 12px; display: flex; gap: 1rem; padding-top: 4px; justify-content: center; height: 28px;">
                <p>Peris Danda, Koteshwor-32, Kathmandu, Nepal</p>
                <p>Tel.: +977-9840073130</p>
                <p>Email: annisur22@gmail.com</p>
            </div>
            
            
        </div>

        <div style="width: 650px; height: 382px; border: 1px solid black; background-color: rgba(0, 81, 255, 0.2); ">
            <div style="text-align: center; padding-top: 8px; font-size: 20px; color:#540e05; font-weight: 800;">
                <p>Membership Renewal Detail</p>
            </div>

            <p style="margin-left: 10px; color:#540e05; font-weight: 600;">Membership Issue Date: <span style="color:black;"> {{ $card->issue_date }}</span></p>

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
                <p style="background-color: #540e05; color:white; font-size: 14px;">Card renewal on time is your responsibility</p>

            </div>
        </div>
    @endforeach
</div>

@endsection
