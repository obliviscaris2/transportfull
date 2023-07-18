@extends('portal.layouts.master')

@section('content')
    <div class="container">

        <div class="row mt-3">
            <h3 class="sec_title">{{ __("Press Release") }}</h3>
           
            @foreach ($press as $press ) 
           <div class="col-md-4">
                <iframe src="{{ asset('uploads/information/file/' . $press->file) }}" width="100%" height="300px">
                </iframe>
                <p class="oth_title"><span class="events_i"><i class="fa fa-download" aria-hidden="true"></i></span> {{ $press->title }} </p>
               <p class="events_cal"><i class="fa fa-calendar" aria-hidden="true"></i> {{date('F jS,Y', strtotime($press->created_at)) }}</p> 
               <hr>
                {{-- <img class="show_image" src=""> --}}
            </div>
            @endforeach

        </div>




    </div>



@endsection
