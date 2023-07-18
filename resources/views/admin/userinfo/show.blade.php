@extends('admin.layouts.master')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6 mb-2">
            <h2 class="mt-4 mb-2">{{ $userinfo->name }}</h2>
            <a href="{{ route('admin.userinfo.index') }}">
                <button class="btn-primary btn-sm">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </button>
            </a>
            <a href="{{ url('admin/userinfo/destroy/' . $userinfo->id) }}">
                <button type="button" class="btn-primary btn-danger btn-sm">
                    Delete
                </button>
            </a>
        </div>
    </div>

    <div class="mt-4">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <label for="exampleInputEmail1">Profile Picture:</label>
                <span style="margin-left: 5px;">
                    <a href="{{ asset('uploads/images/profileimage/' . $userinfo->photo) }}" data-lightbox="image1" data-title="{{ $userinfo->name }}">
                        <img 
                        id="preview" 
                        src="{{ asset('uploads/images/profileimage/' .$userinfo->photo ?? '') }}"
                        style="max-width: 100px; max-height:100px" 
                        /> 
                    </a>
                </span>
            </li>

            <li class="list-group-item">
                <label for="exampleInputEmail1">Name:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->name }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Permanent Address:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->perma_address }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Temporary Address:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->temp_address }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Father/Mother's Name:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->parent_name }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Marital Status:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->marital_status }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Spouse's Name:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->spouse_name }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Position:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->position }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Levi:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->levi }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Work Province:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->work_province }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Committee:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->committee }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">District:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->district }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Branch:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->branch }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Work Route:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->work_route }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Old Membership Date:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->old_membership }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Blood Group:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->blood_group }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Home/Office Phone:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->home_phone }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Mobile Phone:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->mobile_phone }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Email:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->email }}</span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Education Level:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->edu_level }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Citizenship ID No. :</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->id_number }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Some No. :</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->some_number }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Social Security:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->social_security }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Received Minimum Labor:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->min_labor }} </span>
            </li>
            <li class="list-group-item">
                <label for="exampleInputEmail1">Date of issue:</label>
                <span style="margin-left: 5px; font-weight:900;">{{ $userinfo->issue_date }} </span>
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
        <div class="mt-4">
            {{-- <form action="{{route('admin.userinfo.acceptuser',$userinfo->id)}}" method="POST"> --}}
                {{-- @csrf --}}
                {{-- <button type="submit" class="btn btn-primary btn-sm" >Accept <i class="fas fa-chevron-right"></i></button> --}}
                <button 
                        style="width:auto;"
                        type="button" 
                        class="btn-success btn-block btn-sm" 
                        data-bs-toggle="modal"
                        data-bs-target="#accept{{ $userinfo->id }}"
                        >
                            Accept
                        </button>
            </form>
        </div>
    </div>

    <div class="modal fade" id="accept{{ $userinfo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <form action="{{route('admin.userinfo.acceptuser',$userinfo->id)}}" method="POST">
                        @csrf

                        <div class="approval_section">

                            <li lass="list-group-item">
                                <label for="approval_name">Approved By:</label>
                                <input type="text" name="approval_name" id="approval_name" required>
                            </li>
                
                            <li lass="list-group-item">
                                <label for="approval_name">Position:</label>
                                <input type="text" name="approval_position" id="approval_position" required>
                            </li>
                            <div class="d-flex mt-2 gap-1">
                                <li lass="list-group-item">
                                    <label for="issue_date">Issued At:</label>
                                    <input style="border-radius: 4px;" type="date" name="card_issue_date" id="issue_date" required>
                                </li>
                                <li lass="list-group-item">
                                    <label for="expiry_date">Expires At:</label>
                                    <input style="border-radius: 4px;" type="date" name="expiry_date" id="expiry_date" required>
                                </li>
                            </div>
                        </div>


                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                        {{-- <a href="{{ url('admin/userinfo/destroy/' . $user->id) }}"> </a> --}}
                        <button type="submit" class="btn btn-success">Yes</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="destroy{{ $userinfo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                        <a href="{{ url('admin/userinfo/destroy/' . $userinfo->id) }}"> 
                            <button type="submit" class="btn btn-success">Yes</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
