<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <div>

        <div style="border:1px solid black; width: 650px; height: auto;">
            <table style="width: 650px; background-color:#540e05">
                <thead>

                    <tr>
                        <td>
                            <img src="{{ public_path('cardlogo.jpg') }}" style="width: 70px; height:70px;" alt="">
                        </td>
                        <td style="padding-left: 50px;">
                            <p style="font-size: 1.6em; color: white; ">All Nepal Transport Worker's Union</p>
                        </td>
                    </tr>
                </thead>
            </table>

            <table style="width: 650px; height: 20px; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: rgb(0, 81, 255); font-size: 10px; height: 20px;">
                        <td style="padding-left: 8px; height: 20px; border-collapse:collapse; font-size: 10px; color: white;">
                            <p>R.N - 156 Department of Labour and Occupational Safety</p>
                        </td>
                        <td style="padding-left: 8px; height: 20px; font-size: 10px; color: white;">
                            <p>Associated with All Nepal Federation of Trade Union (ANTUF)</p>
                        </td>
                    </tr>
                </thead>
            </table>

            <div style="background-color: rgba(0, 81, 255, 0.2);">
                <div style="padding-top: 5px; background-color: rgba(0, 81, 255, 0.2)">
                    <p
                        style="margin: 0; background-color: #540e05; padding: 5px; border-radius: 8px; color: #fff; width: 90px; font-size: 14px; font-weight: 800; margin-left: 250px;">
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
                                <img src="{{ public_path('uploads/images/profileimage/' . $card->photo) }}"
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
                            <td style="padding-left: 100px;">
                                <img src="{{ public_path('signature.png') }}" style="width: 100px; height: 30px;" alt="">
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

</body>

</html>
