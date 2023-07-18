@extends('portal.layouts.master')


@section('content')

<div class="container">

    <h3 class="sec_title">{{ __($page_title) }}</h3>

    <form action="{{ route('render_local_members') }}" method="GET" class="mb-4 mt-4 d-flex gap-2">
        <div class="form-group">
            <select name="campus_id" id="campus" class="form-control" style="width: 15rem;">
                @foreach ($campuses as $campus)
                    <option style="" class="drop-down-members" value="{{ $campus->id }}" @if ($campus->id == $selectedCampusId) selected @endif>
                        {{ $campus->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="filter-btn" style="">Filter</button>
    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">{{ __("S.N.") }}</th>
            <th scope="col">{{ __("District") }}</th>
            <th scope="col">{{ __("Name")}}</th>
            <th scope="col">{{ __("Position") }}</th>
            <th scope="col">{{ __("Phone No.") }}</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($campuscommitteedetails as $cd)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $cd->district ?? '' }}</td>
                        <td>{{ $cd->name ?? '' }}</td>
                        <td>{{ $cd->position }}</td>
                        <td>{{ $cd->phone ?? '' }}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>

</div>

<div class="d-flex justify-content-center">
    @if ($campuscommitteedetails->count() > 0)
        {!! $campuscommitteedetails->links() !!}
    @endif
</div>

@endsection