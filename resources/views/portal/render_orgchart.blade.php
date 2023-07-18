@extends('portal.layouts.master')

@section('content')
    <div class="container">

        <div class="row mt-3 mb-3">
            <h3 class="sec_title">{{ __("Organizational Chart") }}</h3>
           
        
            
   <img src="{{ asset('uploads/orgchart/' . $orgchart->image) }}" class="img-resposive">

        </div>




    </div>



@endsection
