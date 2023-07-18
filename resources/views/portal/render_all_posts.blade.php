@extends('portal.layouts.master')

@section('content')

<section class="u-align-center u-clearfix u-palette-5-light-1 u-section-9" id="carousel_3ac4">
    <div class="u-clearfix u-sheet u-sheet-1">
        <h3 class="sec_title">{{ __('Blog') }}</h3>

        <div class="u-blog u-expanded-width u-blog-1">
            <div class="u-repeater u-repeater-1">
                <!--blog_post-->
                @foreach ($posts as $post)
                <div
                    class="u-align-left u-blog-post u-container-style u-repeater-item u-video-cover u-white u-repeater-item-1">
                    <div
                        class="u-container-layout u-similar-container u-valign-top-sm u-valign-top-xs u-container-layout-1 ">

                        <a class="u-post-header-link" href="">
                            <!--blog_post_image-->
                            <img alt="" class="u-blog-control u-expanded-width-xs u-image u-image-default u-image-1"
                                src="{{ asset('uploads/posts/' . $post->image) }}" data-image-width="567"
                                data-image-height="696">
                            <!--/blog_post_image-->
                        </a>
                        <!--blog_post_header-->
                        <h4 class="u-blog-control u-text u-text-2">

                            <a href="/render_posts/{{ $post->slug }}">
                                {{ $post->title }}

                            </a>
                        </h4>
                        <!--/blog_post_header-->
                        <!--blog_post_metadata-->
                        <div class="u-blog-control u-metadata u-text-grey-30 u-metadata-1">
                            <!--blog_post_metadata_date-->
                            <span class="u-meta-date u-meta-icon">
                                <!--blog_post_metadata_date_content-->Wed Mar 15 2023
                                <!--/blog_post_metadata_date_content-->
                            </span>
                            <!--/blog_post_metadata_date-->
                            <!--blog_post_metadata_comments-->
                            <span class="u-meta-comments u-meta-icon">
                                <!--blog_post_metadata_comments_content-->Comments (0)
                                <!--/blog_post_metadata_comments_content-->
                            </span>
                            <!--/blog_post_metadata_comments-->
                        </div>
                        <!--/blog_post_metadata-->

                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <!--/blog-->
    </div>
</section>



@endsection
