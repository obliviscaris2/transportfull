@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="mt-2  float-end">
        <a href="{{ route('admin.index') }}" >
            <button type="button" class="btn-block btn-dark btn-sm mb-1" data-toggle="modal"
            data-target="#modal-default" style="width:80px;" onclick="replaceLinkFunction">
                Home
            </button>
        </a>
        
    </div>

    <div class="row mb-2">
        <div class="col-sm-6 mb-2">
            <h2 class="mt-2 mb-2">{{ $page_title }}</h2>
            <a href="{{ url('admin/memberinfo/index') }}">
                <button class="btn-primary btn-sm">
                    <i class="fa fa-plus"></i>
                    Back
                </button>
            </a>
        </div><!-- /.col -->
    </div><!-- /.row -->


    <form id="quickForm" method="POST" action="{{ route('admin.memberinfo.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="name">Name</label>
                <span style="color:red; font-size:large"> *</span>
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Permanent Address</label>
                <span style="color:red; font-size:large">*</span>
                <input type="text" name="perma_address" class="form-control" placeholder="Permanent Address" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Temporary Address</label>
                <span style="color:red; font-size:large">*</span>
                <input type="text" name="temp_address" class="form-control" placeholder="Temporary Address"
                    required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Father's Name</label>
                {{-- <span style="color:red; font-size:large"> *</span> --}}
                <input type="text" name="father_name" class="form-control" placeholder="Father's Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mother's Name</label>
                {{-- <span style="color:red; font-size:large"> *</span> --}}
                <input type="text" name="mother_name" class="form-control" placeholder="Mother's Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Marital Status</label>
                {{-- <span style="color:red; font-size:large"> *</span> --}}
                <select name="marital_status" id="marital_status">
                    <option disabled selected value> -- select an option -- </option>
                    <option value="Married">Married</option>
                    <option value="Unmarried">Unmarried</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Spouse's Name</label>
                {{-- <span style="color:red; font-size:large"> *</span> --}}
                <input type="text" name="spouse_name" class="form-control" placeholder="Spouse Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Postion</label>
                {{-- <span style="color:red; font-size:large"> *</span> --}}
                <input type="text" name="position" class="form-control" placeholder="Position">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Levi</label>
                {{-- <span style="color:red; font-size:large"> *</span> --}}
                <input type="text" name="levi" class="form-control" placeholder="Levi">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Work Province</label>
                <span style="color:red; font-size:large"> *</span>
                <select name="work_province" id="work_province" required>
                    <option disabled selected value> -- select an option -- </option>
                    <option value="Province 1">1</option>
                    <option value="Province 2">2</option>
                    <option value="Province 3">3</option>
                    <option value="Province 4">4</option>
                    <option value="Province 5">5</option>
                    <option value="Province 6">6</option>
                    <option value="Province 7">7</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">District</label>
                {{-- <span style="color:red; font-size:large"> *</span> --}}
                <input type="text" name="district" class="form-control" placeholder="District">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Branch</label>
                {{-- <span style="color:red; font-size:large"> *</span> --}}
                <input type="text" name="branch" class="form-control" placeholder="Branch">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Work Route</label>
                {{-- <span style="color:red; font-size:large"> *</span> --}}
                <input type="text" name="work_route" class="form-control" placeholder="Work Route">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Old Membership Date (IF ANY)</label>
                {{-- <span style="color:red; font-size:large"> *</span> --}}
                <input type="date" name="old_membership" class="form-control">
            </div>
            <div class="form-group">
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
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Home/Offile Phone</label>
                {{-- <span style="color:red; font-size:large"> *</span> --}}
                <input type="number" name="home_phone" class="form-control" placeholder="123-459-6789" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mobile Phone</label>
                <span style="color:red; font-size:large"> *</span>
                <input type="number" name="mobile_phone" class="form-control" placeholder="123-459-6789" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label> 
                <span style="color:red; font-size:large"> *</span>
                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                
            </div>
            <div class="form-group">
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
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Citizenship ID No.</label>
                <span style="color:red; font-size:large"> *</span>
                <input type="text" name="id_number" class="form-control"
                    placeholder="Citizenship Id No." required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Some ID No.</label>
                <span style="color:red; font-size:large"> *</span>
                <input type="text" name="some_number" class="form-control"
                    placeholder="Some Id No." required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Social Security</label>
                <span style="color:red; font-size:large"> *</span>
                <br>
                <input type="radio" id="social_security" name="social_security" value="Yes">
                <label for="social_security">Yes</label><br>
                <input type="radio" id="social_security" name="social_security" value="No">
                <label for="social_security">No</label><br>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Receive Minimum Labor Fee</label>
                <span style="color:red; font-size:large"> *</span>
                <br>
                <input type="radio" id="min_labor" name="min_labor" value="Yes">
                <label for="min_labor">Yes</label><br>
                <input type="radio" id="min_labor" name="min_labor" value="No">
                <label for="min_labor">No</label><br>
            </div>

            <div class="form-groupmb-3">
                <label for="exampleInputEmail1">Form Issue Date</label>
                <span style="color:red; font-size:large"> *</span>
                <input type="date" name="issue_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Profile Picture <span style="color:red;">(Less Than 5
                        MB)</span></label>
                <span style="color:red; font-size:large">*</span>
                <input type="file" name="photo" class="form-control"
                    onchange="previewImage(event)" required>
            </div>
            <img id="preview" style="max-width: 500px; max-height:500px" />

        </div>

        <!-- /.card-body -->
        <div class="card-footer" style="">
            <button type="submit" class="btn-primary form-button"
                style="width: 100%; border-radius: 8px; height: 50px;">Submit</button>
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
