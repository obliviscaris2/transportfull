{{-- <section class="topnav">
    <div class="container main_nav">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 mainlogo">

                <img src="{{ asset('uploads/sitesetting/' . $sitesetting->main_logo) }}" class="top_nav_mainlogo">

            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 top_nav_topic" style="margin-top:3px">
                <h4 style="color: black"> {{ __($sitesetting->govn_name) }} </h4>
                <h5>{{ __($sitesetting->ministry_name) }}</h5>
                <h6 class="nav_text">{{ __($sitesetting->office_name) }}</h6>
                <h6>
                    {{ __($sitesetting->office_address) }}
                </h6>

            </div>
            <div class="col-md-3 col-lg-3 col-sm-12 flag_container">

                <img class="top_nav_flag" src="{{ asset('uploads/sitesetting/' . $sitesetting->flag_logo) }}"
                    alt="nyc flag logo">

            </div>

        </div>

    </div>
    <div class="button en_ne">
        @foreach (config('app.languages') as $langLocale => $langName)
            <a href="{{ url()->current() }}?change_language={{ $langLocale }}"
                class="u-active-palette-4-dark-1 u-border-none u-btn u-button-style u-palette-4-light-1 u-btn-4">
                {{ strtoupper($langLocale) }}
            </a>
        @endforeach
    </div>
</section> --}}



<section class="topheader">
    <style>
        @media screen and (min-width: 600px) {
            .mobile-break {
                display: none;
            }
        }
    </style>

    <section class="topheader">
        <div class="container">

            <div class="row">
                <div class="col-md-3 col-6 top_nav_first">
                    <p class="top_nav_first_p">
                        <a href="{{ $sitesetting->face_link }}" target="_blank">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        </a>
                        <a href="{{ $sitesetting->social_link }}" target="_blank">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="{{ $sitesetting->linked_link }}" target="_blank">
                            <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                        </a>
                    </p>
                </div>
                <div class="col-md-9 top_nav_second">
                    <p class="top_nav_p">
                        <span class="top_nav_loc">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            {{ $sitesetting->office_address ?? '' }}
                        </span>
                        <br class="mobile-break">

                        <span class="top_nav_loc">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            {{ $sitesetting->office_contact ?? '' }}
                        </span>
                        <br class="mobile-break">
                        <span class="top_nav_loc">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            {{ $sitesetting->office_mail ?? '' }}
                        </span>
                        <br class="mobile-break">
                        <span class="top_nav_loc">
                            <a href="{{ route('registermember') }}" style="color: #540e05;">
                                <button type="button" style="background-color:#540e05; color: white;">
                                    <i class="fa fa-registered" aria-hidden="true"></i>
                                    Membership Registration

                                </button>
                            </a>
                        </span>

                    </p>
                </div>
            </div>




        </div>
    </section>

</section>









<header class=" u-clearfix u-header u-section-row-container" id="sec-05f6">
    {{-- <div class="u-section-rows">
        <div class="u-align-center u-palette-4-dark-2 u-section-row" id="sec-b03b">
            <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-sheet-1">
                <div class="u-social-icons u-social-icons-1">
                    <img src="{{ asset($sitesetting->main_logo)}}" class="top_image_nav" data-image-width="100">



                </div>

                        <div class="top-info">
                        <h4 style="color: black"> नेपाल सरकार </h4>
                        <h5>युवा तथा खेलकुद मन्त्रालय</h5>
                        <h6>राष्ट्रिय युवा परिषद्</h6>
                        <h7>
                            सानोठिमी, भक्तपुर
                        </h7>
                    </div>

                @foreach (config('app.languages') as $langLocale => $langName)
                <a href="{{ url()->current() }}?change_language={{ $langLocale }}"
                    class="u-active-palette-4-dark-1 u-border-none u-btn u-button-style u-palette-4-light-1 u-btn-4">
                    {{ strtoupper($langLocale) }}
                </a>
                @endforeach

                <img class="flag_image" src="{{ asset('img/nepal_flag.gif') }}" alt="">
            </div>


        </div>
    </div> --}}



    <div class="u-align-center-xs u-palette-4-dark-1 u-section-row u-sticky navigation_media" id="sec-71fa">
        <div
            class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-valign-middle-xs mainlogo_container_media">
            <a href="{{ route('home') }}" class="u-image u-logo u-image-1" data-image-width="3000"
                data-image-height="2984">
                <img src="{{ asset('uploads/sitesetting/' . $sitesetting->side_logo) }}"
                    class="u-logo-image u-logo-image-1" data-image-width="80" />

            </a>
            <nav class="u-menu u-menu-hamburger u-offcanvas u-menu-1 hamburger_media">
                <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700;">
                    <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link"
                        href="#" style="padding: 6px 0px; font-size: calc(1em + 12px);">
                        <svg class="u-svg-link" viewBox="0 0 24 24">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger">
                            </use>
                        </svg>
                        <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px"
                            y="0px" xmlns:xlink="http://www.w3.org/1999/xlink"
                            xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <rect y="1" width="16" height="2"></rect>
                                <rect y="7" width="16" height="2"></rect>
                                <rect y="13" width="16" height="2"></rect>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="u-custom-menu u-nav-container">
                    <ul class="u-nav u-spacing-20 u-unstyled u-nav-1">
                        <li class="u-nav-item"><a
                                class="u-active-white u-button-style u-hover-white u-nav-link u-text-active-palette-4-dark-1 u-text-body-alt-color u-text-hover-palette-4-base"
                                href="{{ route('home') }}" style="padding: 10px 16px;">{{ __('Home') }}</a>
                        </li>
                        <li class="u-nav-item"><a
                                class="u-active-white u-button-style u-hover-white u-nav-link u-text-active-palette-4-dark-1 u-text-body-alt-color u-text-hover-palette-4-base"
                                href="#" style="padding: 10px 16px;">{{ __('About Us') }}</a>
                            <div class="u-nav-popup">
                                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">
                                    <li class="u-nav-item"><a href="{{ route('render_about') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Introduction') }}</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_orgchart') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Organizational Chart') }}</a>
                                    </li>


                                    <li class="u-nav-item"><a href="{{ route('render_central_members') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Central Committee Members') }}</a>
                                    </li>

                                    <li class="u-nav-item"><a href="{{ route('render_province_members') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Province Committee Members') }}</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_district_members') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('District Committee Members') }}</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_local_members') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Local Committee Members') }}</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_campus_members') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Campus Committee Members') }}</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_unit_members') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Unit Committee Members') }}</a>
                                    </li>

                                    <li class="u-nav-item"><a href="{{ 'render_chairperson' }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Message from Chairperson') }}</a>
                                    </li>
                                    {{-- <li class="u-nav-item"><a href="{{ route('render_administrative') }}"
                                        class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Message from the Administrative Head') }}</a>
                                </li> --}}
                                </ul>
                            </div>
                        </li>
                        <li class="u-nav-item"><a
                                class="u-active-white u-button-style u-hover-white u-nav-link u-text-active-palette-4-dark-1 u-text-body-alt-color u-text-hover-palette-4-base"
                                href="#" style="padding: 10px 16px;">{{ __('Documents') }}</a>
                            <div class="u-nav-popup">
                                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-3">

                                    {{-- added jankari --}}
                                    <li class="u-nav-item"><a href="{{ route('render_rules') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Acts & Regulations') }}</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_directot') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Directory') }}</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_publication') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Publication') }}</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        {{-- <li class="u-nav-item"><a
                                class="u-active-white u-button-style u-hover-white u-nav-link u-text-active-palette-4-dark-1 u-text-body-alt-color u-text-hover-palette-4-base"
                                href="#" style="padding: 10px 16px;">जानकरी</a>
                            <div class="u-nav-popup">
                                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-4">
                                    <li class="u-nav-item"><a href="{{ route('render_rules') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">ऐन
                                            तथा नियमावली</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_directot') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">निर्देशिका</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_press') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">प्रेश
                                            विज्ञप्ती</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        <li class="u-nav-item"><a
                                class="u-active-white u-button-style u-hover-white u-nav-link u-text-active-palette-4-dark-1 u-text-body-alt-color u-text-hover-palette-4-base"
                                href="#" style="padding: 10px 16px;">{{ __('Downloads') }}</a>
                            <div class="u-nav-popup">
                                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-5">
                                    <li class="u-nav-item"><a href="{{ route('render_notice') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Notice') }}</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_press') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Press Release') }}</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_tender') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Tender') }}</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_news') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('News') }}</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_other') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Others') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="u-nav-item"><a
                                class="u-active-white u-button-style u-hover-white u-nav-link u-text-active-palette-4-dark-1 u-text-body-alt-color u-text-hover-palette-4-base"
                                href="#" style="padding: 10px 16px;">{{ __('Gallery') }}</a>
                            <div class="u-nav-popup">
                                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-6">
                                    <li class="u-nav-item"><a href="{{ route('render_images') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Photo Gallery') }}</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_videos') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Video Gallery') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="u-nav-item"><a
                                class="u-active-white u-button-style u-hover-white u-nav-link u-text-active-palette-4-dark-1 u-text-body-alt-color u-text-hover-palette-4-base"
                                href="#" style="padding: 10px 16px;">{{ __('Statisics/Activity') }}</a>
                            <div class="u-nav-popup">
                                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-5">
                                    <li class="u-nav-item"><a href="{{ route('render_youthactivity') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Activity') }}</a>
                                    </li>
                                    <li class="u-nav-item"><a href="{{ route('render_youthstats') }}"
                                            class="u-active-palette-4-light-1 u-button-style u-nav-link u-white">{{ __('Statistics') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="u-nav-item"><a
                                class="u-active-white u-button-style u-hover-white u-nav-link u-text-active-palette-4-dark-1 u-text-body-alt-color u-text-hover-palette-4-base"
                                href="{{ route('render_all_posts') }}"
                                style="padding: 10px 16px;">{{ __('Blog') }}</a>

                        </li>


                        <li class="u-nav-item"><a href="{{ route('contact_page') }}"
                                class="u-active-white u-button-style u-hover-white u-nav-link u-text-active-palette-4-dark-1 u-text-body-alt-color u-text-hover-palette-4-base"
                                style="padding: 10px 18px 10px 16px;">{{ __('Contact') }}</a>
                        </li>




                    </ul>
                </div>


                <div class="u-custom-menu u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-inner-container-layout u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-7">
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="{{ route('home') }}">{{ __('Home') }}</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="#">{{ __('About Us') }}</a>
                                    <div class="u-nav-popup">
                                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-8">
                                            <li class="u-nav-item"><a href="{{ route('render_about') }}"
                                                    class="u-button-style u-nav-link">{{ __('Introduction') }}</a>
                                            </li>
                                            <li class="u-nav-item"><a href="{{ route('render_orgchart') }}"
                                                    class="u-button-style u-nav-link">{{ __('Organizational Chart') }}</a>
                                            </li>
                                            <li class="u-nav-item"><a href="{{ route('render_central_members') }}"
                                                    class="u-button-style u-nav-link">{{ __('Central Committee Members') }}</a>
                                            </li>

                                            <li class="u-nav-item"><a href="{{ route('render_province_members') }}"
                                                    class="u-button-style u-nav-link">{{ __('Province Committee Members') }}</a>
                                            </li>
                                            <li class="u-nav-item"><a href="{{ route('render_district_members') }}"
                                                    class="u-button-style u-nav-link">{{ __('District Committee Members') }}</a>
                                            </li>
                                            <li class="u-nav-item"><a href="{{ route('render_local_members') }}"
                                                    class="u-button-style u-nav-link">{{ __('Local Committee Members') }}</a>
                                            </li>
                                            <li class="u-nav-item"><a href="{{ route('render_campus_members') }}"
                                                    class="u-button-style u-nav-link">{{ __('Campus Committee Members') }}</a>
                                            </li>
                                            <li class="u-nav-item"><a href="{{ route('render_unit_members') }}"
                                                    class="u-button-style u-nav-link">{{ __('Unit Committee Members') }}</a>
                                            </li>
                                            <li class="u-nav-item"><a href="{{ route('render_chairperson') }}"
                                                    class="u-button-style u-nav-link">{{ __('Message from Chairperson') }}</a>
                                                {{-- </li>
                                            <li class="u-nav-item"><a href="{{ route('render_administrative') }}"
                                                    class="u-button-style u-nav-link">{{ __('Message from the Administrative Head') }}</a>
                                            </li> --}}

                                        </ul>
                                    </div>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="#l">{{ __('Documents') }}</a>
                                    <div class="u-nav-popup">
                                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-9">

                                            <li class="u-nav-item"><a href="{{ route('render_rules') }}"
                                                    class="u-button-style u-nav-link">{{ __('Acts & Regulations') }}</a>
                                            </li>
                                            <li class="u-nav-item"><a href="{{ route('render_directot') }}"
                                                    class="u-button-style u-nav-link">{{ __('Directory') }}</a>
                                            </li>

                                            <li class="u-nav-item"><a href="{{ route('render_publication') }}"
                                                    class="u-button-style u-nav-link">{{ __('Publication') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="#">
                                        {{ __('Downloads') }}</a>
                                    <div class="u-nav-popup">
                                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-11">
                                            <li class="u-nav-item"><a href="{{ route('render_news') }}"
                                                    class="u-button-style u-nav-link">{{ __('Notice') }}</a>
                                            </li>
                                            <li class="u-nav-item"><a href="{{ route('render_press') }}"
                                                    class="u-button-style u-nav-link">{{ __('Press Release') }}</a>
                                            </li>
                                            <li class="u-nav-item"><a href="{{ route('render_tender') }}"
                                                    class="u-button-style u-nav-link">{{ __('Tender') }}</a>
                                            </li>
                                            <li class="u-nav-item"><a href="{{ route('render_news') }}"
                                                    class="u-button-style u-nav-link">{{ __('News') }}</a>
                                            </li>
                                            <li class="u-nav-item"><a href="{{ route('render_other') }}"
                                                    class="u-button-style u-nav-link">{{ __('Others') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>


                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="#">{{ __('Gallery') }}</a>
                                    <div class="u-nav-popup">
                                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-12">
                                            <li class="u-nav-item"><a href="{{ route('render_images') }}"
                                                    class="u-button-style u-nav-link">
                                                    {{ __('Photo Gallery') }}
                                                </a>
                                            </li>
                                            <li class="u-nav-item"><a href="{{ route('render_videos') }}"
                                                    class="u-button-style u-nav-link">
                                                    {{ __('Video Gallery') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="u-nav-item"><a href="{{ route('render_all_posts') }}"
                                        class="u-button-style u-nav-link">{{ __('Blog') }}</a>
                                </li>


                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="#">{{ __('Statistics/Activity') }}</a>
                                    <div class="u-nav-popup">
                                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-12">
                                            <li class="u-nav-item"><a href="{{ route('render_youthactivity') }}"
                                                    class="u-button-style u-nav-link">
                                                    {{ __('Activity') }}
                                                </a>
                                            </li>
                                            <li class="u-nav-item"><a href="{{ route('render_youthstats') }}"
                                                    class="u-button-style u-nav-link">
                                                    {{ __('Statistics') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="u-nav-item"><a href="{{ route('contact_page') }}"
                                        class="u-button-style u-nav-link">{{ __('Contact') }}</a>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                </div>
            </nav>
        </div>


    </div>
</header>



{{-- @if (count(config('app.languages')) > 1)
<section class="top_nav">
    <div class="container this-container">
        <div class="lang-container">
            @foreach (config('app.languages') as $langLocale => $langName)
            <a class="lang-link" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{
                strtoupper($langLocale) }}
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif



<section class="top_nav">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center nav-objs">
            <div class="p-2 main-logo-container">
                <img src="{{ asset($sitesetting->main_logo) }}" class="top_image image_one" alt="logo">
            </div>

            <div class="p-2 text-center">
                <p class="top_ntitle">
                    <span class="title_on">
                        {{ __($sitesetting->govn_name) }}
                    </span><br>
                    <span class="title_tw">
                        {{ __($sitesetting->ministry_name) }}
                    </span><br>

                    <span class="title_fo">
                        {{ __($sitesetting->office_name) }}
                    </span><br>

                    <span class="title_fi">
                        {{ __($sitesetting->office_address) }}
                    </span>

                </p>
            </div>

            <div class="p-2 other-logo-container side-logo-container">
                <img src="{{ asset($sitesetting->side_logo) }}" class="top_image image_two" alt="logo">
            </div>
            <div class="p-2 other-logo-container flag-container">
                <img src="{{ asset($sitesetting->flag_logo) }}" class="top_image image_flag" alt="logo">
            </div>
        </div>

    </div>
</section>


<section class="navigation">
    <div class="nav-container">

        <nav>
            <div class="nav-mobile">
                <a id="nav-toggle" href="#!"><span></span></a>
            </div>

            <ul class="nav-list">
                <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                <li><a href="#">{{ __('About Us') }}</a>
                    <ul class="nav-dropdown">
                        <li>
                            <a href="{{ route('render_about') }}">{{ __('Introduction') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('render_team') }}">{{ __('Employee Details') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('render_committee') }}">{{ __('District Committees') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('render_executive_members') }}">{{ __('Council Members') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('render_administrative') }}">{{ __('Message from the Administrative Head')
                                }}</a>
                        </li>
                        <li>
                            <a href="{{ route('render_chairperson') }}">{{ __('Message from Chairperson') }}</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#">{{ __('Documents') }}</a>
                    <ul class="nav-dropdown">
                        <li><a href="{{ route('render_notice') }}">{{ __('Notice') }}</a></li>
                        <li><a href="{{ route('render_publication') }}">{{ __('Publication') }}</a></li>
                        <li><a href="{{ route('render_tender') }}">{{ __('Tender') }}</a></li>

                    </ul>
                </li>
                <li><a href="#">{{ __('Information') }}</a>
                    <ul class="nav-dropdown">
                        <li>
                            <a href="{{ route('render_rules') }}">{{ __('Acts & Regulations') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('render_directot') }}">{{ __('Directory') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('render_press') }}">{{ __('Press Release') }}</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#">{{ __('Downloads') }}</a>
                    <ul class="nav-dropdown">
                        <li>
                            <a href="{{ route('render_news') }}">{{ __('News') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('render_other') }}">{{ __('Others') }}</a>
                        </li>

                    </ul>
                </li>
                <li><a href="#">{{ __('Gallery') }}</a>
                    <ul class="nav-dropdown">
                        <li>
                            <a href="{{ route('render_images') }}">{{ __('Photo Gallery') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('render_videos') }}">{{ __('Video Gallery') }}</a>
                        </li>
                    </ul>
                </li>



                <li>
                    <a href="{{ route('contact_page') }}">{{ __('Contact') }}</a>
                </li>

            </ul>
        </nav>
    </div>

</section>
</section>
--}}
