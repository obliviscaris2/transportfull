@extends('portal.layouts.master')

@section('content')
    <div class="container">

        <div class="row mt-3">
            <h3 class="sec_title">{{ __("Central Committee Members") }}</h3>
           
        @foreach ($teams as $team)
            <div class="col-md-3">
                <div class="card team_card mt-2 mb-2">
                    <img src="{{ asset($team->image) }}" class="card-img-top image">
                    <div class="card-body">
                    <p>
                        <span class="team_name">{{ __($team->name) }}</span><br>
                        <span class="team_position">{{ __($team->position) }}</span><br>
                        <span class="team_email">{{ $team->email }}</span><br>
                        <span class="team_contact">{{ $team->contact_number }}</span>
                    </p>
                    </div>
                </div>
            </div>
        @endforeach

        </div>

    


    </div>

    {{-- @include('portal.includes.all_in_one')
    @include('portal.includes.small_gallery')
   --}}
   <div class="d-flex justify-content-center">
    @if ($teams->count() > 0)
        {!! $teams->links() !!}
    @endif
</div>

@endsection
