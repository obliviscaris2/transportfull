@extends('portal.layouts.master')

@section('content')
    <div class="container">

        <div class="row mt-3">
            <h3 class="sec_title">{{ __("Video Gallery") }}</h3>
           
        @foreach ($videos as $video)
            <div class="col-md-4">
                <div class="card video_card mt-2 mb-2">
                    <iframe src="https://www.youtube.com/embed/{{ $video->vid_url }}" title="{{ $video->vid_desc }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="card-body">
                    <p>
                        <span class="vid_desc">{{ $video->vid_desc }}</span><br>
                       
                    </p>
                    </div>
                </div>
            </div>
        @endforeach

        </div>




    </div>

   

@endsection
