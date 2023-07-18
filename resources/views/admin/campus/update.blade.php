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

        <form id="quickForm" novalidate="novalidate" method="POST" action="{{ route('admin.campus.update') }}"
            enctype="multipart/form-data">
            @csrf
            <input name="id" id="" value="{{ $campus->id }}" hidden>


            <div class="card-body">
                <div class="form-group">
                    <label for="name">Campus</label><span style="color:red; font-size:large"> *</span>
                    <input style="width:auto;" type="text" name="name" class="form-control" id="name"
                        placeholder="name" value="{{ $campus->name }}">
                </div>


            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn-primary">Submit</button>
            </div>
        </form>
@stop