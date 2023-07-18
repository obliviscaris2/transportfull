@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="m-0">{{ $page_title }}</h2>
                    <a href="{{ route('admin.centralcommitteedetails.file') }}">
                      <button class="btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        Import
                      </button>
                    </a>
                    <a href="{{ route('admin.centralcommitteedetails.create') }}">
                      <button class="btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        Add New
                      </button>
                    </a>
                    <a href="{{ route('admin.centralcommitteedetails.file-export-exe') }}">
                      <button class="btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        Export
                      </button>
                    </a>    
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->


            @if(session('success'))
            <div class="alert alert-success">
              {!! session('success') !!}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
              {!! session('error') !!}
            </div>
            @endif

 

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
            @foreach ($centralcommitteedetails as $ed)
                <tr data-widget="expandable-table" aria-expanded="false">
                    {{-- <td>{{ $ed->sn}}</td> --}}
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ed->name ?? '' }}</td>
                    <td>{{ $ed->phone }}</td>
                    <td>
                      <img id="preview" src="{{ url('uploads/centralcommitteedetail/' . $ed->image) }}"
                        style="width: 100px; height:100px; object-fit:cover;" />
                    </td>
                    <td>{{ $ed->position ?? '' }}</td>
                    <td>{{ $ed->email ?? '' }}</td>
                    <td>
                        
                        {{-- <a href="edit/{{ $ed->id }}"> --}}
                            <div style="display: flex; flex-direction:row;">
                              <button type="button" class="btn-warning button-size" data-bs-toggle="modal" data-bs-target="#edit{{ $ed->id }}">
                                Update
                              </button>
                        {{-- </a> --}}
                        
                        {{-- <a href="{{ url('admin/executivedetails/destroy/'.$ed->id) }}"> --}}
                          <button type="button" class="btn-danger button-size" data-bs-toggle="modal" data-bs-target="#delete{{ $ed->id }}">
                            Delete
                          </button>
                        {{-- </a> --}}

                    </td>
                </tr>
            @endforeach
        </tbody>

        {{-- destroy --}}
        
        @foreach($centralcommitteedetails as $ed)

        <div class="modal fade" id="delete{{ $ed->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
             
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                 <a href="{{ url('admin/centralcommitteedetails/destroy/' .$ed->id) }}">
                  <button type="button" class="btn btn-danger">Yes
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        @endforeach

        {{-- update --}}

        @foreach($centralcommitteedetails as $ed)

        <div class="modal fade" id="edit{{ $ed->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
             
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                 <a href="{{ url('admin/centralcommitteedetails/edit/' .$ed->id) }}">
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
      {!! $centralcommitteedetails->links() !!}
    </div>

    <script>

      var myModal = document.getElementById('myModal')
      var myInput = document.getElementById('myInput')

      myModal.addEventListener('shown.bs.modal', function () {
      myInput.focus()
      })
      </script>

@endsection