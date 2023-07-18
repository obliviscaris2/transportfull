@extends('portal.layouts.master')


@section('content')

<head>
    <title>All Nepal Transport Worker's Union</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            text-decoration: 0;
        }

        input:invalid {
            border-color: red;
            border: 2px solid red;
        }

        input:valid {
            border-color: green;
            border: 2px solid green;
        }

        textarea:valid {
            border-color: green;
        }

        textarea:invalid {
            border-color: red;
        }

        .error-field {
            display: none;
            color: red;
        }

        .invalid {
            display: inline-block;
        }

        .card-body {
            display: flex;
            gap: 5px;

        }

        @media only screen and (min-width: 320px) and (max-width: 780px) {
            .card-body {
                flex-direction: column;
            }
        }
    </style>
</head>

<body class="antialiased">

    @if (session('successMessage'))
        <div style="height: 100px; display:flex; align-items:center; justify-content:center" class="alert alert-success">
            {!! session('successMessage') !!}
        </div>
    @endif

    <div class="container d-flex align-items-center justify-content-center">

        <div class="col-md-12 mb-5">
            <h1 class="text-center">REGISTRATION FORM</h1>

            <form id="quickForm" method="POST" action="{{ route('userinfo.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">

                    <div class="col-md-6">

                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <span style="color:red; font-size:large"> *</span>
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            <span class="error-field">Type your Full Name</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Permanent Address</label>
                            <span style="color:red; font-size:large">*</span>
                            <input type="text" name="perma_address" class="form-control"
                                placeholder="Permanent Address" required>
                            <span class="error-field">Type your Permanent Address</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Mobile Phone</label>
                            <span style="color:red; font-size:large"> *</span>
                            <input type="number" name="mobile_phone" class="form-control" placeholder="123-459-6789"
                                required>
                            <span class="error-field">Type your Mobile Phone Number</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Father's OR Mother's Name</label>
                            {{-- <span style="color:red; font-size:large"> *</span> --}}
                            <input type="text" name="parent_name" class="form-control"
                                placeholder="Father's/Mother's Name">
                        </div>

                        <div class="d-flex gap-2">
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Marital Status</label>
                                {{-- <span style="color:red; font-size:large"> *</span> --}}
                                <select name="marital_status" id="marital_status">
                                    <option disabled selected value> -- select an option -- </option>
                                    <option value="Married">Married</option>
                                    <option value="Unmarried">Unmarried</option>
                                </select>
                            </div>
                            <div class="form-group mb-3 d-flex">
                                <label for="exampleInputEmail1">Spouse's Name</label>
                                {{-- <span style="color:red; font-size:large"> *</span> --}}
                                <input type="text" name="spouse_name" class="form-control" placeholder="Spouse Name">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Postion</label>
                            {{-- <span style="color:red; font-size:large"> *</span> --}}
                            <input type="text" name="position" class="form-control" placeholder="Position">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Committee</label>
                            <span style="color:red; font-size:large"> *</span>
                            <input type="text" name="committee" class="form-control" placeholder="Committee"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Levi Rate</label>
                            {{-- <span style="color:red; font-size:large"> *</span> --}}
                            <input type="text" name="levi" class="form-control" placeholder="Levi">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Work Province</label>
                            <span style="color:red; font-size:large"> *</span>
                            <select name="work_province" id="work_province" required>
                                <option disabled selected value> -- select an option -- </option>
                                @foreach ($provinces as $province )
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                            <span class="error-field">Select Your Province</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Work Route</label>
                            {{-- <span style="color:red; font-size:large"> *</span> --}}
                            <input type="text" name="work_route" class="form-control" placeholder="Work Route">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Old Membership Date (IF ANY)</label>
                            {{-- <span style="color:red; font-size:large"> *</span> --}}
                            <input type="date" name="old_membership" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Email</label>
                            <span style="color:red; font-size:large"> *</span>
                            <input type="email" name="email" class="form-control" placeholder="Your Email"
                                required>
                            <span class="error-field">Type your Email</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Temporary Address</label>
                            <span style="color:red; font-size:large">*</span>
                            <input type="text" name="temp_address" class="form-control"
                                placeholder="Temporary Address" required>
                            <span class="error-field">Type your Temporary Address</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Home/Office Phone</label>
                            {{-- <span style="color:red; font-size:large"> *</span> --}}
                            <input type="number" name="home_phone" class="form-control" placeholder="123-459-6789"
                                required>
                            <span class="error-field">Type your Home Phone Number</span>
                        </div>

                        <div class="d-flex gap-4">

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Blood Group</label>
                                <span style="color:red; font-size:large"> *</span>
                                <select name="blood_group" id="blood_group" required>
                                    <option disabled selected value> -- select an option -- </option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                <span class="error-field">Select your Blood Group</span>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Education Level</label>
                                <span style="color:red; font-size:large">*</span>
                                <select name="edu_level" id="edu_level" required>
                                    <option disabled selected value> -- select an option -- </option>
                                    <option value="School Level">School Level</option>
                                    <option value="+2">+2</option>
                                    <option value="Bachelors">Bachelors</option>
                                    <option value="Masters">Masters</option>
                                    <option value="PhD">PhD</option>
                                </select>
                                {{-- <input type="text" name="edu_level" class="form-control" placeholder="Education Level" required> --}}
                                <span class="error-field">Select your Education Level</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Social Security</label>
                                <span style="color:red; font-size:large"> *</span>
                                <br>
                                <input type="radio" id="social_security" name="social_security" value="Yes">
                                <label for="social_security">Yes</label><br>
                                <input type="radio" id="social_security" name="social_security" value="No">
                                <label for="social_security">No</label><br>
                                <span class="error-field">Select an option</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Receive Minimum Labor Fee</label>
                                <span style="color:red; font-size:large"> *</span>
                                <br>
                                <input type="radio" id="min_labor" name="min_labor" value="Yes">
                                <label for="min_labor">Yes</label><br>
                                <input type="radio" id="min_labor" name="min_labor" value="No">
                                <label for="min_labor">No</label><br>
                                <span class="error-field">Select an option</span>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Citizenship ID No.</label>
                            <span style="color:red; font-size:large"> *</span>
                            <input type="text" name="id_number" class="form-control"
                                placeholder="Citizenship Id No." required>
                            <span class="error-field">Type your Citizenship Id</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Some ID No.</label>
                            <span style="color:red; font-size:large"> *</span>
                            <input type="text" name="some_number" class="form-control" placeholder="Some Id No."
                                required>
                            <span class="error-field">Type your Some Id</span>
                        </div>


                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Form Issue Date</label>
                            <span style="color:red; font-size:large"> *</span>
                            <input type="date" name="issue_date" class="form-control" required>
                            <span class="error-field">Select form Issue Date</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">District</label>
                            {{-- <span style="color:red; font-size:large"> *</span> --}}
                            <select name="district" id="district" required>
                                <option disabled selected value> -- select an option -- </option>
                                @foreach ($districts as $district )
                                <option value="{{ $district->name }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Branch</label>
                            {{-- <span style="color:red; font-size:large"> *</span> --}}
                            <input type="text" name="branch" class="form-control" placeholder="Branch">
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Profile Picture <span style="color:red;">(Less Than 5
                                    MB)</span></label>
                            <span style="color:red; font-size:large">*</span>
                            <input type="file" name="photo" class="form-control" onchange="previewImage(event)"
                                required>
                        </div>
                        <img id="preview" style="max-width: 500px; max-height:500px" />
                    </div>


                </div>

                <!-- /.card-body -->
                <div class="" style="">
                    <button type="submit" class="btn-primary"
                        style="width: 100%; border-radius: 8px; height: 50px; background-color: #540e05;">Submit</button>
                </div>

            </form>
        </div>

    </div>




    <script>
        const previewImage = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
            };
        };
        const previewImage1 = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview1');
                preview.src = reader.result;
            };
        };
        const previewImage2 = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview2');
                preview.src = reader.result;
            };
        };
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        const submitButton = document.querySelector('.form-button');
        const errorField = document.querySelectorAll(".error-field");

        const validate = (e) => {

            // Remove any already displayed error
            errorField.forEach(function(error) {
                error.classList.remove("invalid");
            })

            // Loop through all inputs to check the value length
            document.querySelectorAll("form input").forEach(function(input) {
                if (input.value.length < 1) {
                    input.nextElementSibling.classList.toggle("invalid");
                }
            })

            // Prevent submit only if there are errors shown
            let errorCount = document.querySelectorAll(".error-field.invalid").length
            if (errorCount) {
                e.preventDefault();
            }
        }

        submitButton.addEventListener('click', validate);
    </script>
</body>

@endsection
