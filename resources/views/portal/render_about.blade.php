

@extends('portal.layouts.master')


@section('content')
    <div class="container about">
        <div class="row m-3 ">
            <h3 class="sec_title" data-animation-name="customAnimationIn"
            data-animation-duration="1500">{{ __(!empty($abouts->title) ? $abouts->title:'') }}</h3>

            <div class="col-md-6" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500"
            data-image-width="396" data-image-height="768">

                <img src="{{ asset('uploads/about/' . $abouts->image) }}" class="u-image-1 image" alt="National Youth Council Cover-image">

            </div>
            <div class="col-md-6">
                <p class="para">
                    <?=$abouts->content?>
                </p>

            </div>

            {{-- <div class="col-md-3">
                @include('portal.includes.staff_detail')
            </div> --}}

        </div>

    </div>

    {{-- <section>
        <div class="container">
            <div class="row">

                @foreach ($mvcs as $mvc)

                <div class="col-md-3">
                    <h3>{{ __($mvc->title) }}</h3>
                    <p>{{ $mvc->description }}</p>
                </div>
                                  
                @endforeach

            </div>
        </div>
    </section> --}}
    <div class="container mvc_section">
        <div class="row">
            
            @foreach ($mvcs as $mvc)
            <div class="col-md-6 row mt-2 mb-2">
                <div class="col-md-6">
                    <h3>{{ __($mvc->title) }}</h3>

                   <?php 
                    $text = $mvc->description;
                   
                   
                   if(strlen($text) > 500){
                   $part1 = Str::limit($text,500);
                   $part2 = substr($text, 500);
                   $formatted_text = "$part1<span id= 'read-more' style='display:none'>$part2</span><a href='#read-more' onclick='toggle_visibility()'>More...</a>";
                }
                else {
                    $formatted_text = $text;
                }
                echo $formatted_text;
                   
                   
                   ?>
                  
        
                  <script>
                    function toggle_visibility() {
                        var x = document.getElementById("read-more");
                        if (x.style.display === "none" || x.style.display === "") {
                            x.style.display = "inline";
                        } else {
                            x.style.display = "none";
                        }
                    }
                </script>
                    
                </div>
                <div class="col-md-6">
                    <img src="{{asset('uploads/mvc/' . $mvc->image)}}" alt="">
                </div>
            </div>
            @endforeach

            {{-- @foreach($mvcs as $mvc)
        
            <div class="column">
              <img src="{{asset('uploads/mvc/' . $mvc->image)}}" alt="">
              <p>{{ $mvc->title }}</p>
            </div>
        
       
        @endforeach --}}
    </div>
      </div> 
      
       
    




@endsection

