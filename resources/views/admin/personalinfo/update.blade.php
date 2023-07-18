@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

    <div class="mt-2  float-end">
        <a href="{{ route('admin.index') }}">
            <button type="button" class="btn-block btn-dark btn-sm mb-1" data-toggle="modal" data-target="#modal-default"
                style="width:80px;" onclick="replaceLinkFunction">
                Home
            </button>
        </a>

    </div>

    <div class="row mb-2">
        <div class="col-sm-6 mb-2">
            <h2 class="mt-2 mb-2">{{ $page_title }}</h2>
            <a href="{{ url('admin/personalinfo/index') }}">
                <button class="btn-primary btn-sm">
                    <i class="fa fa-plus"></i>
                    Back
                </button>
            </a>
        </div><!-- /.col -->
    </div><!-- /.row -->



    <form id="quickForm" method="POST" action="{{ route('admin.personalinfo.update') }}" enctype="multipart/form-data">
        @csrf
        <input name="id" id="" value="{{ $personalinfo->id }}" hidden>
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Approved By:</label>
                <span style="color:red; font-size:large"> *</span>
                <input type="text" name="approval_name" class="form-control" value="{{ $personalinfo->approval_name }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Approval Position</label>
                <span style="color:red; font-size:large"> *</span>
                <input type="text" name="approval_position" class="form-control" value="{{ $personalinfo->approval_position }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Issued Date:</label>
                <span style="color:red; font-size:large"> *</span>
                <input type="date" name="issue_date" class="form-control" value="{{ $personalinfo->issue_date }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Expiry Date</label>
                <span style="color:red; font-size:large"> *</span>
                <input type="date" name="expiry_date" class="form-control" value="{{ $personalinfo->expiry_date }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label><span style="color:red; font-size:large"> *</span>
                <input type="email" name="email" class="form-control" placeholder="Email"
                    value="{{ $personalinfo->email }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Full Name NP</label><span style="color:red; font-size:large"> *</span>
                <input type="text" name="np_fullname" class="form-control" placeholder="Name in Nepali"
                    value="{{ $personalinfo->np_fullname }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Full Name EN</label><span style="color:red; font-size:large"> *</span>
                <input type="text" name="en_fullname" class="form-control" placeholder="Name in English"
                    value="{{ $personalinfo->en_fullname }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Date of Birth</label>
                <span style="color:red; font-size:large"> *</span>
                <input type="date" name="dob" class="form-control" value="{{ $personalinfo->dob }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Permanent Address</label><span style="color:red; font-size:large"> *</span>
                <input type="text" name="perma_address" class="form-control" placeholder="Permanent Address"
                    value="{{ $personalinfo->perma_address }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Temporary Address</label><span style="color:red; font-size:large"> *</span>
                <input type="text" name="temp_address" class="form-control" placeholder="Temporary Address"
                    value="{{ $personalinfo->temp_address }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Gender</label><span style="color:red; font-size:large"> *</span>
                <input type="text" name="gender" class="form-control" placeholder="Gender"
                    value="{{ $personalinfo->gender }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Position</label>
                <input type="text" name="position" class="form-control" placeholder="Position"
                    value="{{ $personalinfo->position }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">College</label><span style="color:red; font-size:large"> *</span>
                <input type="text" name="college" class="form-control" placeholder="College"
                    value="{{ $personalinfo->college }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Faculty</label><span style="color:red; font-size:large"> *</span>
                <input type="text" name="faculty" class="form-control" placeholder="Faculty"
                    value="{{ $personalinfo->faculty }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Education Level</label><span style="color:red; font-size:large"> *</span>
                <input type="text" name="edu_level" class="form-control" placeholder="Education Level"
                    value="{{ $personalinfo->edu_level }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label><span style="color:red; font-size:large"> *</span>
                <input type="text" name="phone" class="form-control" placeholder="Phone No."
                    value="{{ $personalinfo->phone }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                {{-- <span style="color:red; font-size:large"> *</span> --}}
                <input type="text" name="description" class="form-control" placeholder="Description"
                    value="{{ $personalinfo->description }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Blood Group</label>
                {{-- <span style="color:red; font-size:large"> *</span> --}}
                <select name="blood_group" id="blood_group">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Citizenship/College ID No.</label>
                <span style="color:red; font-size:large"> *</span>
                <input type="text" name="id_number" class="form-control" placeholder="Citizenship Id No."
                    value="{{ $personalinfo->id_number }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Profile Picture</label><span style="color:red; font-size:large"> *</span>
                <input type="file" name="profile_image" class="form-control" onchange="previewImage(event)" required>
            </div>
            <img id="preview" src="{{ asset('uploads/images/profileimage/' . $personalinfo->profile_image ?? '') }}"
                style="max-width: 500px; max-height:500px" />

            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Citizenship OR College ID <span style="color:red;">(Less Than
                        5 MB)</span></label>
                <span style="color:red; font-size:large"> *</span>
                {{-- <input type="file" name="citizenship" class="form-control"
                    onchange="previewImage1(event)" required> --}}
                <input type="file" name="citizenship[]" id="" class="form-control" multiple onchange="previewImage1(event)" required>
            </div>
            <img id="preview1" src="{{ asset('uploads/images/profileimage/' . $personalinfo->citizenship ?? '') }}"
            style="max-width: 500px; max-height:500px" />


        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn-primary">Update Personal Info</button>
        </div>

        </div>

    </form>

    @if (isset($links) && is_array($links))


        <div class="p-4">

            @foreach ($links as $link)
                <a href="{{ $link[1] }}">
                    <button class="btn-primary">{{ $link[0] }}</button>
                </a>
            @endforeach
        </div>

    @endif
    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->


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


@stop
