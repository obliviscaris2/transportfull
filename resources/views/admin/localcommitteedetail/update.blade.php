@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="m-0">{{ $page_title }}</h2>
                    <a href="{{ url('admin') }}"><button class="btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                            Back</button></a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(session('successMessage'))
            <div class="alert alert-success">
              {!! session('successMessage') !!}
            </div>
            @endif
            
            @if(session('error'))
            <div class="alert alert-danger">
              {!! session('error') !!}
            </div>
            @endif

      
        <form id="quickForm" novalidate="novalidate" method="POST" action="{{ route('admin.localcommitteedetails.update') }}"
        enctype="multipart/form-data">
        @csrf
        <input name="id" id="" value = "{{ $localcommitteedetail->id }}" hidden>
        
        <div class="form-group">
            <label for="local">Select Campus:</label>
            <select name="local_id" id="local" class="form-control">
                @foreach ($locals as $local)
                    <option value="{{ $local->id }}" @if ($local->id == $selectedLocalId) selected @endif>
                        {{ $local->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label for="name">Name</label>
                <input style="width:auto;" type="text" name="name" class="form-control" id="name" value="{{ $localcommitteedetail->name }}" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input style="width:auto;" type="text" name="phone" class="form-control" id="phone" value="{{ $localcommitteedetail->phone }}">
            </div>
            <div class="form-group">
                <label for="image">Image</label><span style="color:red; font-size:large"> *</span>
                <input type="file" name="image" class="form-control" id="image" onchange="previewImage(event)"
                    placeholder="image" value="">
              </div>
              <img id="preview" style="max-width: 500px; max-height:500px" src="{{ asset('uploads/campuscommitteedetail/' . $localcommitteedetail->image) }}" />
              
            <div class="form-group">
                <label for="position">Position</label>
                <input style="width:auto;" type="text" name="position" class="form-control" id="position" value="{{ $localcommitteedetail->position }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input style="width:auto;" type="text" name="email" class="form-control" id="email" value="{{ $localcommitteedetail->email }}">
            </div>
            

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn-primary">Submit</button>
        </div>
    </form>

  @stop