@extends('portal.layouts.master')

@section('content')

{{-- <div class="container">
    <div class="row m-3">
            <h3 class="sec_title">{{ __($post->title) }}</h3>

        <div class="col-md-6 about" data-animation-name="customAnimationIn" data-animation-duration="1500"
            data-animation-delay="500">

            <img class="mt-3 service-img" src="{{ asset('uploads/posts/' . $post->image ?? '') }}" style="width: 100%;"
                alt="">

        </div>
        <div class="col-md-6" data-animation-name="customAnimationIn" data-animation-duration="1500"
            data-animation-delay="0">
            <p class="para">
                <?=$post->content?>
            </p>

        </div>

    </div>

</div> --}}

<div class="container">
    <div class="row m-3">
        <h3 class="sec_title">{{ __($post->title) }}</h3>
        <div class="social-media-icons">
            <!-- Facebook Share Button -->
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"
                target="_blank">
                <i class='fab fa-facebook-square' style='font-size:36px'></i>
            </a>
            <!-- Twitter Share Button -->
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}"
                target="_blank">
                <i class='fab fa-twitter-square' style='font-size:36px'></i>
            </a>
        </div>
    </div>
    <div class="row m-3">
        <div class="col-md-6 about" data-animation-name="customAnimationIn" data-animation-duration="1500"
            data-animation-delay="500">
            <img class="mt-3 service-img" src="{{ asset('uploads/posts/' . $post->image ?? '') }}"
                style="width: 100%;" alt="">
        </div>
        <div class="col-md-6  text-justify" data-animation-name="customAnimationIn" data-animation-duration="1500"
            data-animation-delay="0">
            <p class="para" >
                <?= $post->content ?>
            </p>
        </div>
    </div>
</div>




<div class="col-md-3">
    <div class="card-wel">
        <h5 class="title_card">Other Posts</h5>
        @foreach ($postslist as $list )
        <a class="card-wel-title" href="{{ route('render_posts', $list->slug) }}">
            <li style="list-style: none">{{ $list->title }}</li>
        </a>
        @endforeach

    </div>
</div>

</div>
</div>







@endsection
