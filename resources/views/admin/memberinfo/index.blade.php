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
        {{-- <a href="{{ url('admin/memberinfo/create') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i>Add
                Member Info</button></a> --}}
    </div><!-- /.col -->
</div><!-- /.row -->

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Profile Image</th>
            <th>Name</th>
            {{-- <th>Permanent Address</th> --}}
            {{-- <th>Temporary Address</th> --}}
            {{-- <th>Father/Mother's Name</th> --}}
            {{-- <th>Marital Status</th> --}}
            {{-- <th>Spouse's Name</th> --}}
            <th>Position</th>
            <th>Committee</th>
            {{-- <th>Levi</th> --}}
            {{-- <th>Work Province</th> --}}
            {{-- <th>District</th> --}}
            {{-- <th>Branch</th> --}}
            {{-- <th>Work Route</th> --}}
            {{-- <th>Old Membership Date</th> --}}
            {{-- <th>Blood Group</th> --}}
            {{-- <th>Home/Office Phone</th> --}}
            <th>Mobile Phone</th>
            {{-- <th>Email</th> --}}
            {{-- <th>Edu Level</th> --}}
            {{-- <th>ID No.</th> --}}
            {{-- <th>Some No.</th> --}}
            {{-- <th>Social Security</th> --}}
            {{-- <th>Minimum Labor</th> --}}
            {{-- <th>Issue Date</th> --}}
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($memberinfo as $user)
        <tr data-widget="expandable-table" aria-expanded="false">
            <td> 
                <img id="preview1" src="{{ asset('uploads/images/profileimage/' . $user->photo) }}" style="width: 30px; height:30px" />
            </td>
            <td>{{ $user->name ?? '' }}</td>
            {{-- <td>{{ $user->perma_address ?? '' }}</td> --}}
            {{-- <td>{{ $user->temp_address ?? '' }}</td> --}}
            {{-- <td>{{ $user->parent_name ?? '' }}</td> --}}
            {{-- <td>{{ $user->marital_status ?? '' }}</td> --}}
            {{-- <td>{{ $user->spouse_name ?? '' }}</td> --}}
            <td>{{ $user->position ?? '' }}</td>
            <td>{{ $user->committee ?? '' }}</td>
            {{-- <td>{{ $user->levi ?? '' }}</td> --}}
            {{-- <td>{{ $user->work_province ?? '' }}</td> --}}
            {{-- <td>{{ $user->district ?? '' }}</td> --}}
            {{-- <td>{{ $user->branch ?? '' }}</td> --}}
            {{-- <td>{{ $user->work_route ?? '' }}</td> --}}
            {{-- <td>{{ $user->old_membership ?? '' }}</td> --}}
            {{-- <td>{{ $user->blood_group ?? '' }}</td> --}}
            {{-- <td>{{ $user->home_phone ?? '' }}</td> --}}
            <td>{{ $user->mobile_phone ?? '' }}</td>
            {{-- <td>{{ $user->email ?? '' }}</td> --}}
            {{-- <td>{{ $user->edu_level ?? '' }}</td> --}}
            {{-- <td>{{ $user->id_number ?? '' }}</td> --}}
            {{-- <td>{{ $user->some_number ?? '' }}</td> --}}
            {{-- <td>{{ $user->social_security ?? '' }}</td> --}}
            {{-- <td>{{ $user->min_labor ?? '' }}</td> --}}
            {{-- <td>{{ $user->issue_date ?? '' }}</td> --}}
            {{-- <td> 
                <img id="preview1" src="{{ asset('uploads/images/citizenshipimage/' . $user->citizenship) }}" style="width: 150px; height:150px" />
            </td> --}}
            
            <td>

                <a href="{{ url('admin/memberinfo/show/' .$user->id) }}">
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
                        data-bs-target="#edit{{ $user->id }}"
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
                        data-bs-target="#delete{{ $user->id }}"
                        >
                            Delete
                        </button>
                </div>  

            </td>
        </tr>
        @endforeach
    </tbody>

    {{-- @foreach ($userinfo as $user)
    <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <a href="{{ url('admin/$userinfo/edit/' . $$user->id) }}">
                        <button type="button" class="btn btn-danger">Yes
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach --}}

    @foreach ($memberinfo as $user)
    <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <a href="{{ url('admin/memberinfo/destroy/' . $user->id) }}">
                        <button type="button" class="btn btn-danger">Yes
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</table>

<div>
    {{ $memberinfo->links() }}
</div>
<script>
    var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
</script>

@endsection