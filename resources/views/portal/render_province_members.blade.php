@php
   $executivedetail = App\Models\ExecutiveDetail::all();
@endphp

@extends('portal.layouts.master')

@section('content')
    <div class="container">

        <div class="row mt-3">
            <h3 class="sec_title">{{ __("Province Committee Members") }}</h3>

            <form action="{{ route('render_province_members') }}" method="GET" class="mb-4 mt-4 d-flex gap-2">
                <div class="form-group">
                    <select name="province_id" id="province" class="form-control" style="width: 15rem;">
                        {{-- <option value="">All Provinces</option> --}}
                        @foreach ($provinces as $province)
                            <option style="" class="drop-down-members" value="{{ $province->id }}" @if ($province->id == $selectedProvinceId) selected @endif>
                                {{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="filter-btn" style="">Filter</button>
            </form>
           
        @foreach ($provincecommitteedetails as $ex)
            <div class="col-md-3">
                <div class="card team_card mt-2 mb-2">
                    <img src="{{ asset('uploads/executivedetail/' . $ex->image) }}" class="card-img-top image">
                    <div class="card-body">
                    <p>
                        <span class="exe_name">{{ $ex->name }}</span><br>
                        <span class="exe_position">{{ $ex->post }}</span><br>
                        <span class="exe_email">{{ $ex->email }}</span><br>
                        <span class="exe_contact">{{ $ex->phone }}</span>
                        <span class="">{{ $ex->position }}</span>
                    </p>
                    </div>
                </div>
            </div>
        @endforeach

        </div>




    </div>

    <div class="d-flex justify-content-center">
        @if ($provincecommitteedetails->count() > 0)
            {!! $provincecommitteedetails->links() !!}
        @endif
    </div>
    

@endsection