@extends('portal.layouts.master')

@section('content')



    <section class="u-clearfix u-white u-section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="u-align-left u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                        <div class="u-container-fluid u-container-layout-2">
                            <div class="u-carousel u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-gallery u-gallery-slider u-layout-carousel u-lightbox u-no-transition u-show-text-on-hover u-gallery-1"
                                id="carousel-f035" data-interval="5000" data-u-ride="carousel">
                                <ol class="u-absolute-hcenter u-carousel-indicators u-carousel-indicators-1">
                                    <li data-u-target="#carousel-f035" data-u-slide-to="0"
                                        class="u-active u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
                                    <li data-u-target="#carousel-f035" data-u-slide-to="1" class="u-grey-70 u-shape-circle"
                                        style="width: 10px; height: 10px;"></li>
                                    <li data-u-target="#carousel-f035" data-u-slide-to="2" class="u-grey-70 u-shape-circle"
                                        style="width: 10px; height: 10px;"></li>


                                </ol>
                                <div class="u-carousel-inner u-gallery-inner" role="listbox">
                                    <div class="u-active u-carousel-item u-effect-fade u-gallery-item u-carousel-item-1">
                                        <div class="u-back-slide" data-image-width="1280" data-image-height="853">
                                            <img class="u-back-image u-expanded" src="{{ asset('img/yuwa.jpg') }}"
                                                style="object-fit: cover">
                                        </div>
                                        <div class="u-align-center u-over-slide u-shading u-valign-bottom u-over-slide-1">
                                            <h3 class="u-gallery-heading">{{ __('Akhil Krantikari') }}</h3>

                                        </div>
                                    </div>

                                    @foreach ($coverimages as $coverimage)
                                        <div class="u-carousel-item u-effect-fade u-gallery-item u-carousel-item-2">
                                            <div class="u-back-slide" data-image-width="1280" data-image-height="853">
                                                <img class="u-back-image u-expanded"
                                                    src="{{ asset('uploads/coverimage/' . $coverimage->image) }}"
                                                    alt="National Youth Council Cover Image" style="object-fit: cover">
                                            </div>
                                            <div
                                                class="u-align-center u-over-slide u-shading u-valign-bottom u-over-slide-2">
                                                <h3 class="u-gallery-heading">{{ $coverimage->title }}</h3>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-1"
                                    href="#carousel-f035" role="button" data-u-slide="prev">
                                    <span aria-hidden="true">
                                        <svg viewBox="0 0 451.847 451.847">
                                            <path
                                                d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
                                                    c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
                                                    c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="sr-only">
                                        <svg viewBox="0 0 451.847 451.847">
                                            <path
                                                d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
                                            c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
                                            c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                                <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-2"
                                    href="#carousel-f035" role="button" data-u-slide="next">
                                    <span aria-hidden="true">
                                        <svg viewBox="0 0 451.846 451.847">
                                            <path
                                                d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
                                            L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
                                            c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="sr-only">
                                        <svg viewBox="0 0 451.846 451.847">
                                            <path
                                                d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
                                                L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
                                                c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </section>





    {{-- For Over Lay Image and the java script --}}

 @if (!empty($noticepop))
   

    <div id="popup-overlay">
        <div id="popup">
            <img src="{{ asset('uploads/information/image/' . $noticepop->image) }}" alt="Pop-up Image">
            <button id="close-btn">Close</button>
        </div>
    </div>


@endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var popup = document.getElementById('popup-overlay');
            var closeButton = document.getElementById('close-btn');

            popup.style.display = 'block';

            closeButton.addEventListener('click', function() {
                popup.style.display = 'none';
            });
        });
    </script>




    {{-- <section class="u-align-center u-clearfix u-white u-section-2" id="carousel_8e8e">
        <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-sheet-1">
            <div class="u-expanded-width u-list u-list-1">
                <div class="u-repeater u-repeater-1">


                    <div class="u-container-style u-custom-item u-list-item u-palette-2-dark-2 u-repeater-item u-shape-rectangle u-list-item-3"
                        data-animation-name="customAnimationIn" data-animation-duration="1750" data-animation-delay="0">
                        <div class="u-container-layout u-similar-container u-container-layout-7">
                            <div
                                class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xl u-group u-palette-4-dark-1 u-group-5">
                                <div class="u-container-layout u-container-layout-8">
                                    <h3 class="u-align-center u-text u-text-1"> {{ __('Chairperson') }}</h3>
                                </div>
                            </div><span class="u-align-center-xs u-file-icon u-icon u-icon-7"
                                data-animation-name="customAnimationIn" data-animation-duration="1500"
                                data-animation-delay="500"><img src="{{ asset('img/prachanda.PNG') }}"
                                    alt=""></span>
                            <div
                                class="u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-palette-4-dark-1 u-group-6">
                                <div class="u-container-layout u-container-layout-3">
                                    <h4 class="u-align-center u-text u-text-6">{{ __('Pushpa Kamal Dahal (Prachanda)') }}
                                    </h4>
                                    <p class="u-align-center u-text u-text-11"><span class="u-icon"><svg
                                                class="u-svg-content" viewBox="0 0 60 60" x="0px" y="0px"
                                                style="width: 1em; height: 1em;">
                                                <g>
                                                    <path
                                                        d="M56.612,4.569c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414c3.736,3.736,3.736,9.815,0,13.552
                                                    c-0.391,0.391-0.391,1.023,0,1.414c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293
                                                    C61.128,16.434,61.128,9.085,56.612,4.569z">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M52.401,6.845c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414c1.237,1.237,1.918,2.885,1.918,4.639
                                                    s-0.681,3.401-1.918,4.638c-0.391,0.391-0.391,1.023,0,1.414c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293
                                                    c1.615-1.614,2.504-3.764,2.504-6.052S54.017,8.459,52.401,6.845z">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M4.802,5.983c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0c-4.516,4.516-4.516,11.864,0,16.38
                                                    c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414
                                                    C1.065,15.799,1.065,9.72,4.802,5.983z">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M9.013,6.569c-0.391-0.391-1.023-0.391-1.414,0c-1.615,1.614-2.504,3.764-2.504,6.052s0.889,4.438,2.504,6.053
                                                    c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414
                                                    c-1.237-1.237-1.918-2.885-1.918-4.639S7.775,9.22,9.013,7.983C9.403,7.593,9.403,6.96,9.013,6.569z">
                                                                                                        </path>
                                                                                                        <circle cx="30" cy="53" r="2"></circle>
                                                                                                        <path
                                                                                                            d="M42.595,0H17.405C14.976,0,13,1.977,13,4.405v51.189C13,58.023,14.976,60,17.405,60h25.189C45.024,60,47,58.023,47,55.595
                                                    V4.405C47,1.977,45.024,0,42.595,0z M33,3h1c0.552,0,1,0.447,1,1s-0.448,1-1,1h-1c-0.552,0-1-0.447-1-1S32.448,3,33,3z M26,3h4
                                                    c0.552,0,1,0.447,1,1s-0.448,1-1,1h-4c-0.552,0-1-0.447-1-1S25.448,3,26,3z M30,57c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4
                                                    S32.206,57,30,57z M45,46H15V8h30V46z">
                                                                                                        </path>
                                                </g>
                                            </svg><img></span>&nbsp;{{ __('+९७७-०१-४२००५३९') }}
                                        <span class="u-file-icon u-icon u-text-white"><img src="img/542689-e094886c.png"
                                                alt=""></span>&nbsp;info@nyc.gov.np
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="u-container-style u-custom-item u-list-item u-palette-2-dark-2 u-repeater-item u-shape-rectangle u-list-item-3"
                        data-animation-name="customAnimationIn" data-animation-duration="1750" data-animation-delay="0">
                        <div class="u-container-layout u-similar-container u-container-layout-7">
                            <div
                                class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xl u-group u-palette-4-dark-1 u-group-5">
                                <div class="u-container-layout u-container-layout-8">
                                    <h3 class="u-align-center u-text u-text-1">{{ __('Vice Chairperson') }}</h3>
                                </div>
                            </div><span class="u-align-center-xs u-file-icon u-icon u-icon-7"
                                data-animation-name="customAnimationIn" data-animation-duration="1500"
                                data-animation-delay="500"><img src="{{ asset('img/surendra.jpg') }}"
                                    alt="Surendra Basnet Image"></span>
                            <div
                                class="u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-palette-4-dark-1 u-group-6">
                                <div class="u-container-layout u-container-layout-3">
                                    <h4 class="u-align-center u-text u-text-6">{{ __('Shree Surendra Basnet') }}</h4>
                                    <p class="u-align-center u-text u-text-11"><span class="u-icon"><svg
                                                class="u-svg-content" viewBox="0 0 60 60" x="0px" y="0px"
                                                style="width: 1em; height: 1em;">
                                                <g>
                                                    <path
                                                        d="M56.612,4.569c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414c3.736,3.736,3.736,9.815,0,13.552
                                c-0.391,0.391-0.391,1.023,0,1.414c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293
                                C61.128,16.434,61.128,9.085,56.612,4.569z">
                                                                                    </path>
                                                                                    <path
                                                                                        d="M52.401,6.845c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414c1.237,1.237,1.918,2.885,1.918,4.639
                                s-0.681,3.401-1.918,4.638c-0.391,0.391-0.391,1.023,0,1.414c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293
                                c1.615-1.614,2.504-3.764,2.504-6.052S54.017,8.459,52.401,6.845z">
                                                                                    </path>
                                                                                    <path
                                                                                        d="M4.802,5.983c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0c-4.516,4.516-4.516,11.864,0,16.38
                                c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414
                                C1.065,15.799,1.065,9.72,4.802,5.983z">
                                                                                    </path>
                                                                                    <path
                                                                                        d="M9.013,6.569c-0.391-0.391-1.023-0.391-1.414,0c-1.615,1.614-2.504,3.764-2.504,6.052s0.889,4.438,2.504,6.053
                                c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414
                                c-1.237-1.237-1.918-2.885-1.918-4.639S7.775,9.22,9.013,7.983C9.403,7.593,9.403,6.96,9.013,6.569z">
                                                                                    </path>
                                                                                    <circle cx="30" cy="53" r="2"></circle>
                                                                                    <path
                                                                                        d="M42.595,0H17.405C14.976,0,13,1.977,13,4.405v51.189C13,58.023,14.976,60,17.405,60h25.189C45.024,60,47,58.023,47,55.595
                                V4.405C47,1.977,45.024,0,42.595,0z M33,3h1c0.552,0,1,0.447,1,1s-0.448,1-1,1h-1c-0.552,0-1-0.447-1-1S32.448,3,33,3z M26,3h4
                                c0.552,0,1,0.447,1,1s-0.448,1-1,1h-4c-0.552,0-1-0.447-1-1S25.448,3,26,3z M30,57c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4
                                S32.206,57,30,57z M45,46H15V8h30V46z">
                                                    </path>
                                                </g>
                                            </svg><img></span>&nbsp;{{ __('+९७७-०१-६६३८१५२') }}
                                        <span class="u-file-icon u-icon u-text-white"><img src="img/542689-e094886c.png"
                                                alt=""></span>&nbsp;surendradamak@gmail.com
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($teams as $team)
                        <div class="u-container-style u-custom-item u-list-item u-palette-2-dark-2 u-repeater-item u-shape-rectangle u-list-item-3"
                            data-animation-name="customAnimationIn" data-animation-duration="1750"
                            data-animation-delay="0">
                            <div class="u-container-layout u-similar-container u-container-layout-7">
                                <div
                                    class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xl u-group u-palette-4-dark-1 u-group-5">
                                    <div class="u-container-layout u-container-layout-8">
                                        <h3 class="u-align-center u-text u-text-1">{{ __($team->role) }}</h3>
                                    </div>
                                </div><span class="u-align-center-xs u-file-icon u-icon u-icon-7"
                                    data-animation-name="customAnimationIn" data-animation-duration="1500"
                                    data-animation-delay="500"><img src="{{ asset('uploads/team/' . $team->image) }}"
                                        alt=""></span>
                                <div
                                    class="u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-palette-4-dark-1 u-group-6">
                                    <div class="u-container-layout u-container-layout-3">
                                        <h4 class="u-align-center u-text u-text-6"> {{ __($team->name) }}</h4>
                                        <p class="u-align-center u-text u-text-11"><span class="u-icon"><svg
                                                    class="u-svg-content" viewBox="0 0 60 60" x="0px"
                                                    y="0px" style="width: 1em; height: 1em;">
                                                    <g>
                                                        <path
                                                            d="M56.612,4.569c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414c3.736,3.736,3.736,9.815,0,13.552
                                                c-0.391,0.391-0.391,1.023,0,1.414c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293
                                                C61.128,16.434,61.128,9.085,56.612,4.569z">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M52.401,6.845c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414c1.237,1.237,1.918,2.885,1.918,4.639
                                                s-0.681,3.401-1.918,4.638c-0.391,0.391-0.391,1.023,0,1.414c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293
                                                c1.615-1.614,2.504-3.764,2.504-6.052S54.017,8.459,52.401,6.845z">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M4.802,5.983c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0c-4.516,4.516-4.516,11.864,0,16.38
                                                c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414
                                                C1.065,15.799,1.065,9.72,4.802,5.983z">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M9.013,6.569c-0.391-0.391-1.023-0.391-1.414,0c-1.615,1.614-2.504,3.764-2.504,6.052s0.889,4.438,2.504,6.053
                                                c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414
                                                c-1.237-1.237-1.918-2.885-1.918-4.639S7.775,9.22,9.013,7.983C9.403,7.593,9.403,6.96,9.013,6.569z">
                                                                                                    </path>
                                                                                                    <circle cx="30" cy="53" r="2"></circle>
                                                                                                    <path
                                                                                                        d="M42.595,0H17.405C14.976,0,13,1.977,13,4.405v51.189C13,58.023,14.976,60,17.405,60h25.189C45.024,60,47,58.023,47,55.595
                                                V4.405C47,1.977,45.024,0,42.595,0z M33,3h1c0.552,0,1,0.447,1,1s-0.448,1-1,1h-1c-0.552,0-1-0.447-1-1S32.448,3,33,3z M26,3h4
                                                c0.552,0,1,0.447,1,1s-0.448,1-1,1h-4c-0.552,0-1-0.447-1-1S25.448,3,26,3z M30,57c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4
                                                S32.206,57,30,57z M45,46H15V8h30V46z">
                                                                                                    </path>
                                                    </g>
                                                </svg><img></span>&nbsp;{{ __($team->contact_number) }}
                                            <span class="u-file-icon u-icon u-text-white"><img
                                                    src="img/542689-e094886c.png"
                                                    alt=""></span>&nbsp;{{ $team->email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                   
            

                </div>
            </div>
        </div>
    </section> --}}



    <section class="u-align-center u-clearfix u-white u-section-3" id="sec-3ce5">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="u-shape u-shape-svg u-text-palette-2-dark-1 u-shape-1" data-animation-name="customAnimationIn"
                data-animation-duration="1500" data-animation-delay="500">
                <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 160" style="">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-a0bf"></use>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                    xml:space="preserve" class="u-svg-content" viewBox="0 0 160 160" x="0px" y="0px"
                    id="svg-a0bf" style="enable-background:new 0 0 160 160;">
                    <path
                        d="M80,30c27.6,0,50,22.4,50,50s-22.4,50-50,50s-50-22.4-50-50S52.4,30,80,30 M80,0C35.8,0,0,35.8,0,80s35.8,80,80,80
                        s80-35.8,80-80S124.2,0,80,0L80,0z">
                    </path>
                </svg>
            </div>
            <div class="u-palette-2-dark-1 u-shape u-shape-circle u-shape-2" data-animation-name="customAnimationIn"
                data-animation-duration="1500" data-animation-delay="500"></div>
            <img class="u-border-palette-4-dark-1 u-expanded-width-xs u-image u-image-round u-radius-50 u-image-1"
                src="{{ asset('uploads/about/' . $about->image) }}" data-image-width="1017" data-image-height="543">
            <div class="u-palette-2-base u-shape u-shape-circle u-shape-3" data-animation-name="customAnimationIn"
                data-animation-duration="1500" data-animation-delay="500"></div>
            <div class="u-shape u-shape-svg u-text-palette-2-dark-1 u-shape-4" data-animation-name="customAnimationIn"
                data-animation-duration="1500" data-animation-delay="750">
                <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 160" style="">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-2818"></use>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                    xml:space="preserve" class="u-svg-content" viewBox="0 0 160 160" x="0px" y="0px"
                    id="svg-2818" style="enable-background:new 0 0 160 160;">
                    <path
                        d="M80,30c27.6,0,50,22.4,50,50s-22.4,50-50,50s-50-22.4-50-50S52.4,30,80,30 M80,0C35.8,0,0,35.8,0,80s35.8,80,80,80
            s80-35.8,80-80S124.2,0,80,0L80,0z">
                    </path>
                </svg>
            </div>
            <div class="u-expanded-width-xs u-palette-4-dark-1 u-radius-50 u-shape u-shape-round u-shape-5"
                data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="750">
            </div>
            <div class="u-align-center u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-group-1"
                data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="750">
                <div class="u-container-layout u-container-layout-1">
                    <h3 class="u-text u-text-body-alt-color u-text-1"> {{ __($about->title) }}</h3>
                    <p class="u-text u-text-body-alt-color u-text-2">{!! Str::substr($about->content, 0, 550) !!}...</p>
                    <a href="{{ route('render_about') }}"
                        class="u-border-hover-palette-2-dark-1 u-border-palette-4-dark-1 u-btn u-btn-round u-button-style u-hover-palette-2-dark-1 u-palette-4-dark-1 u-radius-50 u-text-body-alt-color u-btn-1">
                        {{ __('Read More') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="skrollable u-align-center u-clearfix u-image u-parallax u-section-4" id="carousel_2eca"
        data-image-width="1280" data-image-height="853">
        <div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
            <div class="u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    <div class="u-align-center u-container-style u-list-item u-opacity u-opacity-40 u-palette-5-dark-2 u-radius-50 u-repeater-item u-shape-round u-list-item-1"
                        data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="0"
                        data-href="{{ route('render_central_members') }}">
                        <div class="u-container-layout u-similar-container u-container-layout-1"><span
                                class="u-file-icon u-icon u-text-white u-icon-1">
                                {{-- <img
                                    src="{{ asset('img/45010-756f759e.png') }}" alt=""> --}}
                                    {{-- <i class="fa fa-home" aria-hidden="true" style="font-size: 60px"></i> --}}
                                    <p aria-hidden="true" style="font-size: 60px">{{ $centralCount }}</p>
                                </span>
                            <h4 class="" data-animation-name="customAnimationIn"
                                data-animation-duration="1500" data-animation-delay="500">{{ __('Central Committee') }}</h4>
                        </div>
                    </div>
                    <div class="u-align-center u-container-style u-list-item u-opacity u-opacity-40 u-palette-5-dark-2 u-radius-50 u-repeater-item u-shape-round u-list-item-2"
                        data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="0"
                        data-href="{{ route('render_province_members') }}">
                        <div class="u-container-layout u-similar-container u-container-layout-2">
                            <span class="u-file-icon u-icon u-text-white u-icon-2">
                                <p aria-hidden="true" style="font-size: 60px">{{ $provinceCount }}</p>
                            </span>
                            <h4 class="" data-animation-name="customAnimationIn"
                                data-animation-duration="1500" data-animation-delay="500">{{ __('Province Committee') }}</h4>
                        </div>
                    </div>
                    <div class="u-align-center u-container-style u-list-item u-opacity u-opacity-40 u-palette-5-dark-2 u-radius-50 u-repeater-item u-shape-round u-list-item-3"
                        data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="0"
                        data-href="{{ route('render_district_members') }}">
                        <div class="u-container-layout u-similar-container u-container-layout-3">
                            <span
                                class="u-file-icon u-icon u-text-white u-icon-3">
                                <p aria-hidden="true" style="font-size: 60px">{{ $districtCount }}</p>
                                </span>
                            <h4 class="" data-animation-name="customAnimationIn"
                                data-animation-duration="1500" data-animation-delay="500">{{ __('District Committee') }}
                            </h4>
                        </div>
                    </div>
                    <div class="u-align-center u-container-style u-list-item u-opacity u-opacity-40 u-palette-5-dark-2 u-radius-50 u-repeater-item u-shape-round u-list-item-4"
                        data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="0"
                        data-href="{{ route('render_local_members') }}">
                        <div class="u-container-layout u-similar-container u-container-layout-4"><span
                                class="u-file-icon u-icon u-text-white u-icon-4">
                                <p aria-hidden="true" style="font-size: 60px">{{ $localCount }}</p>
                            </span>
                            <h4 class="" data-animation-name="customAnimationIn"
                                data-animation-duration="1500" data-animation-delay="500">{{ __('Local Committee') }}</h4>
                        </div>
                    </div>
                    <div class="u-align-center u-container-style u-list-item u-opacity u-opacity-40 u-palette-5-dark-2 u-radius-50 u-repeater-item u-shape-round u-list-item-5"
                        data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="0"
                        data-href="{{ route('render_campus_members') }}">
                        <div class="u-container-layout u-similar-container u-container-layout-5">
                            <span
                                class="u-file-icon u-icon u-text-white u-icon-5">

                                    <p aria-hidden="true" style="font-size: 60px">{{ $campusCount }}</p>
                                
                                </span>
                            <h4 class="" data-animation-name="customAnimationIn"
                                data-animation-duration="1500" data-animation-delay="500">
                                {{ __('Campus Committee') }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    
    <section class="u-clearfix u-palette-5-light-3 u-section-5" id="carousel_457a">
        <div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
            <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <div class="u-container-style u-layout-cell u-shape-rectangle u-size-36 u-layout-cell-1"
                            data-animation-name="customAnimationIn" data-animation-duration="1500"
                            data-animation-delay="500">
                            <div class="u-container-layout u-container-layout-1">
                                <div class="u-expanded-width u-tab-links-align-left u-tabs u-tabs-1">
                                    <ul class="u-border-2 u-border-palette-1-base u-spacing-10 u-tab-list u-unstyled"
                                        role="tablist">
                                        <li class="u-tab-item" role="presentation">
                                            <a class="active u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-1"
                                                id="link-tab-0da5" href="#tab-0da5" role="tab"
                                                aria-controls="tab-0da5" aria-selected="true">{{ __('News') }}</a>
                                        </li>
                                      

                                        <li class="u-tab-item" role="presentation">
                                            <a class="u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-2"
                                                id="link-tab-14b7" href="#tab-14b7" role="tab"
                                                aria-controls="tab-14b7" aria-selected="false">{{ __('Notice') }}</a>
                                        </li>
                                        <li class="u-tab-item" role="presentation">
                                            <a class="u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-3"
                                                id="link-tab-2917" href="#tab-2917" role="tab"
                                                aria-controls="tab-2917"
                                                aria-selected="false">{{ __('Publication') }}</a>
                                        </li>
                                        <li class="u-tab-item u-tab-item-4" role="presentation">
                                            <a class="u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-4"
                                                id="tab-93fc" href="#link-tab-93fc" role="tab"
                                                aria-controls="link-tab-93fc"
                                                aria-selected="false">{{ __('Press Release') }}</a>
                                        </li>
                                    </ul>

                     
                                    <div class="u-tab-content">

                                        <div class="u-container-style u-tab-active u-tab-pane" id="tab-0da5" role="tabpanel"
                                            data-animation-name="" data-animation-duration="0" data-animation-delay="0"
                                            data-animation-direction="" >
                                            <div
                                                class="u-container-layout u-valign-top-lg u-valign-top-md u-valign-top-sm u-valign-top-xl u-container-layout-17">
                                                <div class="u-expanded-width u-list u-list-4">
                                                    <div class="u-repeater u-repeater-4">
                                                        @if (count($news) === 0)
                                                            <p>{{ __('There are no files to Display') }}</p>
                                                        @else
                                                            @foreach ($news as $new)
                                                                <div class="u-container-style u-list-item u-repeater-item">
                                                                    <div
                                                                        class="u-container-layout u-similar-container u-container-layout-18">
                                                                        <span class="u-file-icon u-icon u-icon-61">

                                                                            <a class="nodecoration" target="_blank"
                                                                                href="{{ asset('uploads/information/file/' . $new->file) }}" download><span
                                                                                    class="events_i"><i
                                                                                        class="fa fa-download"
                                                                                        aria-hidden="true"></i></span>
                                                                            </a>

                                                                        </span>
                                                                        <span class="u-file-icon u-icon u-icon-62">
                                                                            <a class="nodecoration" href="{{ asset('uploads/information/file/' . $new->file) }}" target="_blank">
                                                                            <i
                                                                                class="fas fa-eye"></i>
                                                                            </a>
                                                                            </span><span
                                                                            class="u-file-icon u-icon u-icon-63">
                                                                            
                                                                          
                                                                             
                                                                             @if (isset($new->image)) 
                                                                            
                                                                            <img
                                                                                src="{{ asset('uploads/information/image/' . $new->image) }}"
                                                                                alt="">
                                                                            
                                                                            @else
                                                                          
                                                                            <img src="{{ url('img/logo.png') }}">
                                                                            @endif
                                                                            </span>
                                                                        <h5 class="u-text u-text-37">{{ $new->title }}
                                                                        </h5>
                                                                        <p class="u-text u-text-38"><span
                                                                                class="u-file-icon u-icon"><img
                                                                                    src="img/8110713.png"
                                                                                    alt=""></span>&nbsp;

                                                                        </p>
                                                                        <p class="u-text u-text-39"><i
                                                                                class="fa fa-calendar"
                                                                                aria-hidden="true"></i>
                                                                            {{ date('F jS,Y', strtotime($new->created_at)) }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- <img src="{{ $new->image ? asset('uploads/other/image/'.$new->image) : asset('img/logo.png') }}" alt="News Image"> --}}



                                        <div class="u-container-style u-tab-pane" id="tab-14b7" role="tabpanel"
                                            data-animation-name="" data-animation-duration="0" data-animation-delay="0"
                                            data-animation-direction="">
                                            <div
                                                class="u-container-layout u-valign-top-lg u-valign-top-md u-valign-top-sm u-valign-top-xl u-container-layout-17">
                                                <div class="u-expanded-width u-list u-list-4">
                                                    <div class="u-repeater u-repeater-4">

                                                        @if (count($notices) === 0)
                                                            <p>{{ __('There are no files to Display') }}</p>
                                                        @else
                                                            @foreach ($notices as $notice)
                                                                <div class="u-container-style u-list-item u-repeater-item">
                                                                    <div
                                                                        class="u-container-layout u-similar-container u-container-layout-18">
                                                                        <span class="u-file-icon u-icon u-icon-61">

                                                                            <a class="nodecoration" target="_blank"
                                                                                href="{{ asset('uploads/information/file/' . $notice->file) }}" download><span
                                                                                    class="events_i"><i
                                                                                        class="fa fa-download"
                                                                                        aria-hidden="true"></i></span>
                                                                            </a>

                                                                        </span>
                                                                        <span class="u-file-icon u-icon u-icon-62">
                                                                            <a class="nodecoration" href="{{ asset('uploads/information/file/' . $notice->file) }}" target="_blank">
                                                                            <i
                                                                                class="fas fa-eye"></i>
                                                                            </a>
                                                                            </span><span
                                                                            class="u-file-icon u-icon u-icon-63">
                                                                            
                                                                            @if (isset($notice->image))
                                                                                

                                                                            <img
                                                                                src="{{ asset('uploads/information/image/' . $notice->image) }}"
                                                                                alt=""> 

                                                                                @else
                                                                                    <img src="{{ url('logo.png') }}" alt="{{ $notice->title }}">
                                                                                
                                                                            @endif
                                                                            </span>
                                                                        <h5 class="u-text u-text-37">{{ $notice->title }}
                                                                        </h5>
                                                                        <p class="u-text u-text-38"><span
                                                                                class="u-file-icon u-icon"><img
                                                                                    src="img/8110713.png"
                                                                                    alt=""></span>

                                                                        </p>
                                                                        <p class="u-text u-text-39"><i
                                                                                class="fa fa-calendar"
                                                                                aria-hidden="true"></i>
                                                                            {{ date('F jS,Y', strtotime($notice->created_at)) }}
                                                                        </p>

                                                                    </div>

                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="u-container-style u-tab-pane" id="tab-2917" role="tabpanel"
                                            data-animation-name="" data-animation-duration="0" data-animation-delay="0"
                                            data-animation-direction="">
                                            <div
                                                class="u-container-layout u-valign-top-lg u-valign-top-md u-valign-top-sm u-valign-top-xl u-container-layout-17">
                                                <div class="u-expanded-width u-list u-list-4">
                                                    <div class="u-repeater u-repeater-4">

                                                        @if (count($publications) === 0)
                                                            <p>{{ __('There are no files to Display') }}</p>
                                                        @else
                                                            @foreach ($publications as $publication)
                                                                <div class="u-container-style u-list-item u-repeater-item">
                                                                    <div
                                                                        class="u-container-layout u-similar-container u-container-layout-18">
                                                                        <span class="u-file-icon u-icon u-icon-61">

                                                                            <a class="nodecoration" target="_blank"
                                                                                href="{{ asset('uploads/documents/file/' . $publication->file) }}" download><span
                                                                                    class="events_i"><i
                                                                                        class="fa fa-download"
                                                                                        aria-hidden="true"></i></span>
                                                                            </a>

                                                                        </span>
                                                                        <span class="u-file-icon u-icon u-icon-62">
                                                                            <a class="nodecoration" href="{{ asset('uploads/documents/file/' . $publication->file) }}" target="_blank">
                                                                            <i
                                                                                class="fas fa-eye"></i>
                                                                            </a>
                                                                            </span><span
                                                                            class="u-file-icon u-icon u-icon-63">
                                                                            @if(isset($publication->image))
                                                                            <img
                                                                                src="{{ asset('uploads/documents/image/' . $publication->image) }}"
                                                                                alt="{{ $publication->title }}">
                                                                            @else
                                                                            <img src="{{ url('img/logo.png') }}" alt="{{ $publication->title }}">

                                                                            @endif
                                                                            </span>
                                                                        <h5 class="u-text u-text-37">
                                                                            {{ $publication->title }}
                                                                        </h5>
                                                                        <p class="u-text u-text-38"><span
                                                                                class="u-file-icon u-icon"><img
                                                                                    src="img/8110713.png"
                                                                                    alt=""></span>&nbsp;
                                                                        </p>
                                                                        <p class="u-text u-text-39"><i
                                                                                class="fa fa-calendar"
                                                                                aria-hidden="true"></i>
                                                                            {{ date('F jS,Y', strtotime($publication->created_at)) }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="u-container-style u-tab-pane" id="link-tab-93fc" role="tabpanel"
                                            data-animation-name="" data-animation-duration="0" data-animation-delay="0"
                                            data-animation-direction="">
                                            <div
                                                class="u-container-layout u-valign-top-lg u-valign-top-md u-valign-top-sm u-valign-top-xl u-container-layout-17">
                                                <div class="u-expanded-width u-list u-list-4">
                                                    <div class="u-repeater u-repeater-4">

                                                        @if (count($press) === 0)
                                                            <p>{{ __('There are no files to Display') }}</p>
                                                        @else
                                                            @foreach ($press as $pre)
                                                                <div class="u-container-style u-list-item u-repeater-item">
                                                                    <div
                                                                        class="u-container-layout u-similar-container u-container-layout-18">
                                                                        <span class="u-file-icon u-icon u-icon-61">

                                                                            <a class="nodecoration" target="_blank"
                                                                                href="{{ asset('uploads/information/file/' . $pre->file) }}" download><span
                                                                                    class="events_i"><i
                                                                                        class="fa fa-download"
                                                                                        aria-hidden="true"></i></span>
                                                                            </a>

                                                                        </span>
                                                                        <span class="u-file-icon u-icon u-icon-62">
                                                                            <a class="nodecoration" href="{{ asset('uploads/information/file/' . $pre->file) }}" target="_blank">

                                                                            <i
                                                                                class="fas fa-eye"></i>
                                                                            </a>
                                                                            
                                                                            </span><span
                                                                            class="u-file-icon u-icon u-icon-63">
                                                                            @if(isset($pre->image))
                                                                            <img
                                                                                src="{{ asset('uploads/information/image/' . $pre->image) }}"
                                                                                alt="{{ $pre->title }}">
                                                                            @else
                                                                            <img src="{{ url('img/logo.png') }}" alt="{{ $pre->title }}">
                                                                            @endif
                                                                            </span>
                                                                        <h5 class="u-text u-text-37">{{ $pre->title }}
                                                                        </h5>
                                                                        <p class="u-text u-text-38"><span
                                                                                class="u-file-icon u-icon"><img
                                                                                    src="img/8110713.png"
                                                                                    alt=""></span>&nbsp;


                                                                        </p>
                                                                        <p class="u-text u-text-39"><i
                                                                                class="fa fa-calendar"
                                                                                aria-hidden="true"></i>
                                                                            {{ date('F jS,Y', strtotime($pre->created_at)) }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="u-align-justify u-container-style u-layout-cell u-size-24 u-layout-cell-2"
                            data-animation-name="customAnimationIn" data-animation-duration="1500"
                            data-animation-delay="0">
                            <div class="u-container-layout u-valign-top-xs u-container-layout-22">
                                <div class="u-container-style u-expanded-width u-group u-image u-image-contain"
                                    data-image-width="264" data-image-height="276">

                                    <iframe src="{{ $sitesetting->face_page }}" width="100%" height="600"
                                        style="border:none; margin-left:5px;" scrolling="no" frameborder="0"
                                        allowfullscreen="true"
                                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


   
       


 

    <section class="u-align-center u-clearfix u-palette-5-light-3 u-section-6" id="carousel_f852">
        <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-sheet-1">
            <h3 class="u-text u-text-default u-text-1"> {{ __('Gallery') }}<span style="font-weight: 700;"></span>
            </h3>
            <div class="u-expanded-width u-gallery u-layout-grid u-lightbox u-show-text-on-hover u-gallery-1">
                <div class="u-gallery-inner u-gallery-inner-1">
                    @foreach ($images as $img)
                        <div class="u-effect-fade u-gallery-item">
                            <div class="u-back-slide" data-image-width="513" data-image-height="300">
                                <img class="u-back-image u-expanded u-back-image-1"
                                    src="{{ asset('uploads/image/' . $img->img) }}">
                            </div>
                            <div class="u-over-slide u-shading u-over-slide-1">
                                <h3 class="u-gallery-heading"></h3>
                                <p class="u-gallery-text"></p>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    <section class="u-clearfix u-palette-5-light-2 u-section-7" id="sec-931a">
        <div class="u-clearfix u-sheet u-sheet-1">
            <h3 class="u-text u-text-default u-text-1"> {{ __('Video') }}</h3>
            <div class="u-clearfix u-expanded-width u-gutter-22 u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        @foreach ($videos as $vid)
                            <div
                                class="u-align-left u-container-style u-layout-cell u-left-cell u-size-15 u-layout-cell-1">
                                <div class="u-container-layout u-container-layout-1">
                                    <div class="u-align-left u-expanded u-uploaded-video u-video">
                                        <div class="embed-responsive embed-responsive-1">
                                            <iframe style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;"
                                                class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $vid->vid_url }}" frameborder="0"
                                                allowfullscreen=""></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="u-clearfix u-white u-section-8" id="carousel_15ea">
        <div class="u-expanded-width u-palette-5-light-1 u-shape u-shape-rectangle u-shape-1"></div>
        <div class="u-clearfix u-gutter-0 u-layout-wrap u-layout-wrap-1">
            <div class="u-gutter-0 u-layout">
                <div class="u-layout-row">
                    <div class="u-container-style u-layout-cell u-palette-3-base u-shape-rectangle u-size-22-lg u-size-22-xl u-size-30-md u-size-30-sm u-size-30-xs u-layout-cell-1"
                        data-animation-name="customAnimationIn" data-animation-duration="1500"
                        data-animation-delay="500">
                        <div class="u-container-layout u-container-layout-1">
                            <div class="u-absolute-hcenter u-expanded u-grey-light-2 u-map">
                                <div class="embed-responsive">
                              
                                   
                                   
                                    <iframe src="{{ $sitesetting->google_map }}"
                                    width="600" height="450" style="border:0;" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                  
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="u-align-left u-container-style u-layout-cell u-shape-rectangle u-size-23-lg u-size-23-xl u-size-30-md u-size-30-sm u-size-30-xs u-white u-layout-cell-2"
                        data-animation-name="customAnimationIn" data-animation-duration="1500"
                        data-animation-delay="500">


                        <div class="u-container-layout u-container-layout-2">
                            <h3 class="u-text u-text-1">{{ __('Contact Us') }}</h3>
                            <div class="u-expanded-width u-form u-form-1">
                                {{-- <form id="quick_contact" action="{{ route('admin.contactus.store') }}" method="POST" role="form"
                                    class="u-clearfix u-form-spacing-27 u-form-vertical u-inner-form"
                                    style="padding: 0px;">
                                    @csrf
                                    <div class="u-form-group u-form-name u-label-none u-form-group-1">
                                        <label for="name-319a"
                                            class="u-label u-text-body-alt-color u-label-1">{{ __('Name') }}</label>
                                        <input type="text" placeholder="Enter your Name" id="name-319a"
                                            name="name"
                                            class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle"
                                            required="">
                                    </div>
                                    <div class="u-form-email u-form-group u-label-none u-form-group-2">
                                        <label for="email-319a"
                                            class="u-label u-text-body-alt-color u-label-2">{{ __('Email') }}</label>
                                        <input type="email" placeholder="Enter a valid email" id="email-319a"
                                            name="email"
                                            class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle"
                                            required="">
                                    </div>
                                    <div class="u-form-address u-form-group u-label-none u-form-group-3">
                                        <label for="address-452f"
                                            class="u-label u-text-body-alt-color u-label-3">{{ __('Phone') }}</label>
                                        <input type="text" placeholder="Enter your phone number" id="address-452f"
                                            name="phone"
                                            class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle"
                                            required="">
                                    </div>
                                    <div class="u-form-group u-form-message u-label-none">
                                        <label for="message-319a"
                                            class="u-label u-text-body-alt-color u-label-4">{{ __('Message') }}</label>
                                        <textarea placeholder="Enter your message" rows="4" cols="50" id="message-319a" name="message"
                                            class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle"
                                            required=""></textarea>
                                    </div>
                                    
                                    <div class="u-align-left u-form-group u-form-submit u-label-none">
                                        {!! htmlFormSnippet() !!}
                                        <button class="btn send-button" id="submit" type="submit" value="SEND">
                                            <div class="alt-send-button">
                                                <i class="fa fa-paper-plane"></i><span class="send-text">Let's Connect</span>
                                            </div>
                
                                        </button>
                
                                    </div>
                                    

                                </form> --}}
                                <form id="quick_contactindex" class="form-horizontal" method="POST" role="form"
                                action="{{ route('admin.contactus.store') }}">
                                @csrf
                                <div class="form-group">
            
                                    <input type="text" class="form-control" id="name" placeholder="NAME" name="name"
                                        value="" required>
            
                                </div>
            
                                <div class="form-group">
            
                                    <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email"
                                        value="" required>
            
                                </div>
            
                                <div class="form-group">
            
            
                                    <input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone No."
                                        required>
            
            
                                </div>
            
                                <textarea class="form-control" rows="10" placeholder="MESSAGE" name="message" required></textarea>
            
            
            
            
            
                                {{-- <div class="g-recaptcha" data-sitekey="{{ getenv('RECAPTCHA_SITE_KEY') }}"></div>
            
            
            
                             
                                    <button class="btn send-button g-recaptcha" id="submit" type="submit" value="SEND" data-sitekey="{{ getenv('RECAPTCHA_SITE_KEY') }}" 
                                    data-callback='onSubmit' 
                                    data-action='submit'>
                                        <div class="alt-send-button">
                                            <i class="fa fa-paper-plane"></i><span class="send-text">Let's Connect</span>
                                        </div>
            
                                    </button> --}}
            
                                {{-- {!! htmlFormSnippet() !!} --}}
                                {{-- <div class="g-recaptcha" data-sitekey="{{ getenv('RECAPTCHA_SITE_KEY') }}"></div>
                                <button class="btn send-button" id="submit" type="submit" value="SEND">
                                    <div class="alt-send-button">
                                        <i class="fa fa-paper-plane"></i><span class="send-text">Let's Connect</span>
                                    </div>
            
                                </button> --}}
            
            
                        <button class="btn btn-primary p-2 mt-2 mx-auto g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" 
                        data-callback='onSubmit' 
                        data-action='submit' style="background: #540e05; border: 0px;">
                            <div class="alt-send-button">
                                <i class="fa fa-paper-plane"></i><span class="send-text">Let's Connect</span>
                            </div>

                        </button> 
            
            
                            </form>
                            <script>
                                function onSubmit(token) {
                                    document.getElementById("quick_contactindex").submit();
                                }
            
                            </script>
                            </div>
                        </div>
                    </div>
                    <div class="u-container-style u-image u-image-contain u-layout-cell u-size-15-lg u-size-15-xl u-size-60-md u-size-60-sm u-size-60-xs u-image-1"
                        data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500"
                        data-image-width="396" data-image-height="768">
                     



                        <div class="u-container-layout u-container-layout-3">

                            <img class="u-back-image u-expanded u-back-image-1" src="{{ asset('img/bakas.jpg') }}">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="u-align-center u-clearfix u-palette-5-light-1 u-section-9" id="carousel_3ac4">
        <div class="u-clearfix u-sheet u-sheet-1">
            <h3 class="u-text u-text-1">{{ __('Blog') }}</h3>
           
            <div class="u-blog u-expanded-width u-blog-1">
                <div class="u-repeater u-repeater-1">
               
                    @foreach ($posts as $post)
                        <div
                            class="u-align-left u-blog-post u-container-style u-repeater-item u-video-cover u-white u-repeater-item-1">
                            <div
                                class="u-container-layout u-similar-container u-valign-top-sm u-valign-top-xs u-container-layout-1 ">

                                <a class="u-post-header-link" href="">
                                    
                                    <img alt=""
                                        class="u-blog-control u-expanded-width-xs u-image u-image-default u-image-1"
                                        src="{{ asset('uploads/posts/' . $post->image) }}" data-image-width="567"
                                        data-image-height="696">
                                    
                                </a>
                              
                                <h4 class="u-blog-control u-text u-text-2">
                                   
                                    <a href="/render_posts/{{ $post->slug }}">
                                        {{ $post->title }}

                                    </a>
                                </h4>
                               
                                <div class="u-blog-control u-metadata u-text-grey-30 u-metadata-1">
                                   
                                    <span class="u-meta-date u-meta-icon">
                                       
                                        {{ date('Y-m-d', strtotime($post->created_at)) }}
                                       
                                    </span>
                                    
                                    <span class="u-meta-comments u-meta-icon">
                                        Comments (0)
                                    </span>
                                </div>

                            </div>
                        </div>
                    @endforeach
       
                </div>
            </div>
         
        </div>
    </section>
@endsection





