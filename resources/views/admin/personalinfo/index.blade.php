@extends('admin.layouts.master')

@section('content')

@if (session('successMessage'))
<div class="alert alert-success">
    {!! session('successMessage') !!}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {!! session('error') !!}
</div>
@endif

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
        {{-- <a href="{{ url('admin/personalinfo/create') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i>Add
                New Member</button></a> --}}
    </div><!-- /.col -->
</div><!-- /.row -->

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Membership No.</th>
            {{-- <th>Email</th> --}}
            {{-- <th>Fullname NP</th> --}}
            <th>Fullname EN</th>
            {{-- <th>DOB</th> --}}
            {{-- <th>Permanent Address</th> --}}
            {{-- <th>Temporary Address</th> --}}
            {{-- <th>Gender</th> --}}
            <th>Position</th>
            {{-- <th>Old Membership Date</th> --}}
            {{-- <th>Class</th> --}}
            {{-- <th>Ethnicity</th> --}}
            {{-- <th>Marital Status</th> --}}
            {{-- <th>Father's Name</th> --}}
            {{-- <th>Mother's Name</th> --}}
            <th>College</th>
            {{-- <th>Faculty</th> --}}
            {{-- <th>Education</th> --}}
            <th>Phone</th>
            {{-- <th>Description</th> --}}
            {{-- <th>Blood Group</th> --}}
            {{-- <th>ID No.</th> --}}
            <th>Profile Image</th>
            {{-- <th>Citizenship/College ID</th> --}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($personalinfo as $personal)
        <tr data-widget="expandable-table" aria-expanded="false">
            <td>{{ $personal->membershipno ?? '' }}</td>
            {{-- <td>{{ $personal->email ?? '' }}</td> --}}
            {{-- <td>{{ $personal->np_fullname ?? '' }}</td> --}}
            <td>{{ $personal->en_fullname ?? '' }}</td>
            {{-- <td>{{ $personal->dob ?? '' }}</td> --}}
            {{-- <td>{{ $personal->perma_address ?? '' }}</td> --}}
            {{-- <td>{{ $personal->temp_address ?? '' }}</td> --}}
            {{-- <td>{{ $personal->gender ?? '' }}</td> --}}
            <td>{{ $personal->position ?? '' }}</td>
            {{-- <td>{{ $personal->old_membership ?? '' }}</td> --}}
            {{-- <td>{{ $personal->class ?? '' }}</td> --}}
            {{-- <td>{{ $personal->ethnicity ?? '' }}</td> --}}
            {{-- <td>{{ $personal->marital_status ?? '' }}</td> --}}
            {{-- <td>{{ $personal->father_name ?? '' }}</td> --}}
            {{-- <td>{{ $personal->mother_name ?? '' }}</td> --}}
            <td>{{ $personal->college ?? '' }}</td>
            {{-- <td>{{ $personal->faculty ?? '' }}</td> --}}
            {{-- <td>{{ $personal->edu_level ?? '' }}</td> --}}
            <td>{{ $personal->phone ?? '' }}</td>
            {{-- <td>{{ $personal->description ?? '' }}</td> --}}
            {{-- <td>{{ $personal->blood_group ?? '' }}</td> --}}
            {{-- <td>{{ $personal->id_number ?? '' }}</td> --}}
            <td> 
                <img id="preview1" src="{{ asset('uploads/images/profileimage/' . $personal->profile_image) }}" style="width: 80px; height:80px" />
            </td>
            {{-- <td> 
                <img id="preview1" src="{{ asset('uploads/images/citizenshipimage/' . $personal->citizenship) }}" style="width: 150px; height:150px" />
            </td> --}}
            
            <td>

                <a href="{{ url('admin/personalinfo/show/' .$personal->id) }}">
                    <button type="button" class="btn-block btn-success btn-sm mb-1" data-toggle="modal"
                    data-target="#modal-default" style="width:80px;" onclick="replaceLinkFunction">
                        Show to Mail
                    </button>
                </a>

                {{-- <div style="display: flex; flex-direction:row;">
                        <button 
                        style="width:80px;"
                        type="button" 
                        class="btn-warning btn-block btn-sm mb-1" 
                        data-bs-toggle="modal"
                        data-bs-target="#edit{{ $personal->id }}"
                        >
                            Update
                        </button>
                </div> --}}

                <div style="display: flex; flex-direction:row;">
                        <button 
                        style="width:80px;"
                        type="button" 
                        class="btn-danger btn-block btn-sm" 
                        data-bs-toggle="modal"
                        data-bs-target="#delete{{ $personal->id }}"
                        >
                            Delete
                        </button>
                </div>  

            </td>
        </tr>
        @endforeach
    </tbody>

    @foreach ($personalinfo as $personal)
    <div class="modal fade" id="edit{{ $personal->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <a href="{{ url('admin/personalinfo/edit/' . $personal->id) }}">
                        <button type="button" class="btn btn-danger">Yes
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($personalinfo as $personal)
    <div class="modal fade" id="delete{{ $personal->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <a href="{{ url('admin/personalinfo/destroy/' . $personal->id) }}">
                        <button type="button" class="btn btn-danger">Yes
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</table>


<script>
    var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
</script>

@endsection