@extends('admin.layouts.master')


@section('content')
    <div style="display: flex; justify-content: flex-end">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard v1</li>
      </ol>
    </div>

    <h2 class="mb-2">{{ $page_title }}</h2>
    <div class="col-sm-12 d-flex gap-4">
        <a href="{{ route('admin.campuscommitteedetails.file') }}">
            <button class="btn-primary btn-sm">
                <i class="fa fa-plus"></i>
                Import
            </button>
        </a>
        <a href="{{ route('admin.campuscommitteedetails.create') }}">
            <button class="btn-primary btn-sm">
                <i class="fa fa-plus"></i>
                Add New Member
            </button>
        </a>

        <form action="{{ route('admin.campuscommitteedetails.filee-export-exe') }}" method="POST" class="d-flex gap-2">
            @csrf
            <div class="form-group d-flex">
                <label for="district_id" style="width: 100px;">To Export:</label>
                <select name="district_id" class="form-control" style="height: 30px;">
                    <option value="">Select Campus</option>
                    <!-- Populate the options with districts from your database -->
                    @foreach ($campuses as $campus)
                        <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn-sm btn-primary" style="height: 30px;">Export Campus Committee Details</button>
        </form>
    </div><!-- /.col -->


    @if (session('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {!! session('error') !!}
        </div>
    @endif

    <form action="{{ route('admin.campuscommitteedetails.index') }}" method="GET" class="mb-4 mt-4">
        <div class="form-group">
            <label for="campus">Select Campus for Viewing:</label>
            <select name="campus_id" id="campus" class="form-control" style="width: 700px;">
                <option value="">All Campuses</option>
                @foreach ($campuses as $campus)
                    <option value="{{ $campus->id }}" @if ($campus->id == $selectedCampusId) selected @endif>
                        {{ $campus->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn-primary mt-2">Filter</button>
    </form>



    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Sn</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Position</th>
                <th>Email</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($campuscommitteedetails as $ed)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ed->name ?? '' }}</td>
                    <td>{{ $ed->phone }}</td>
                    <td>
                        <img id="preview" src="{{ url('uploads/campuscommitteedetail/' . $ed->image) }}"
                            style="width: 100px; height:100px; object-fit:cover;" />
                    </td>
                    <td>{{ $ed->position ?? '' }}</td>
                    <td>{{ $ed->email ?? '' }}</td>
                    <td>

                        {{-- <a href="edit/{{ $ed->id }}"> --}}
                        <div style="display: flex; flex-direction:row;">
                            <button type="button" class="btn-warning button-size" data-bs-toggle="modal"
                                data-bs-target="#edit{{ $ed->id }}">
                                Update
                            </button>
                            {{-- </a> --}}

                            {{-- <a href="{{ url('admin/executivedetails/destroy/'.$ed->id) }}"> --}}
                            <button type="button" class="btn-danger button-size" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $ed->id }}">
                                Delete
                            </button>
                            {{-- </a> --}}

                    </td>
                </tr>
            @endforeach
        </tbody>

        {{-- destroy --}}

        @foreach ($campuscommitteedetails as $ed)
            <div class="modal fade" id="delete{{ $ed->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                            <a href="{{ url('admin/campuscommitteedetails/destroy/' . $ed->id) }}">
                                <button type="button" class="btn btn-danger">Yes
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- update --}}

        @foreach ($campuscommitteedetails as $ed)
            <div class="modal fade" id="edit{{ $ed->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                            <a href="{{ url('admin/campuscommitteedetails/edit/' . $ed->id) }}">
                                <button type="button" class="btn btn-danger">Yes
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </table>

    <div class="d-flex justify-content-center">
        {!! $campuscommitteedetails->links() !!}
    </div>

    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
@endsection
