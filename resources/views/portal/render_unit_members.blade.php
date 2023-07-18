
@extends('portal.layouts.master')


@section('content')

<div class="container">

    <h3 class="sec_title">{{ __($page_title) }}</h3>

    <form action="{{ route('render_unit_members') }}" method="GET" class="mb-4 mt-4 d-flex gap-2">
        <div class="form-group">
            <select name="unit_id" id="unit" class="form-control" style="width: 15rem;">
                @foreach ($units as $unit)
                    <option style="" class="drop-down-members" value="{{ $unit->id }}" @if ($unit->id == $selectedUnitId) selected @endif>
                        {{ $unit->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="filter-btn" style="">Filter</button>
    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">{{ __("S.N.") }}</th>
            <th scope="col">{{ __("Name")}}</th>
            <th scope="col">{{ __("Email") }}</th>
            <th scope="col">{{ __("Position") }}</th>
            <th scope="col">{{ __("Phone No.") }}</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($unitcommitteedetails as $cd)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $cd->name ?? '' }}</td>
                        <td>{{ $cd->email ?? '' }}</td>
                        <td>{{ $cd->position }}</td>
                        <td>{{ $cd->phone ?? '' }}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>

</div>

<div class="d-flex justify-content-center">
    @if ($unitcommitteedetails->count() > 0)
        {!! $unitcommitteedetails->links() !!}
    @endif
</div>

@endsection