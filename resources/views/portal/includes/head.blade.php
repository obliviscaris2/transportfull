<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords">
    <meta name="description" content="">
    <title>{{ $sitesetting->office_name }}</title>
{{-- For Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">


    <link rel="stylesheet" href="{{ asset('css/aasha.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrapcss/bootstrap.min.css') }}">
    <script src="https://kit.fontawesome.com/160b82d057.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="128x128" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/venobox.min.css') }}" type="text/css" media="screen" />
    <script class="u-script" type="text/javascript" src="{{ asset('js/jquery.js') }}" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ asset('js/aasha.js') }}" defer=""></script>
    <meta name="generator" content="Nicepage 5.6.9, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <script type="application/ld+json">
        {
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/vectorstock_28525730.png",
		"sameAs": [
				"https://facebook.com/name",
				"https://twitter.com/name",
				"https://www.instagram.com/name"
		]
    }
    </script>

    
    <script src="https://www.google.com/recaptcha/api.js"></script>

    {{-- For Contact Form Recaptcha --}}
    {{-- <script>
        functon callbackThen(response){
            response.json().then(function(data){
                console.log(data);
                if(data.success && data.score > 0.5){
                    console.log('valid source');
                }else{
                    document.getElementById('quick_contact').addEventListener('submit', function(event){
                        event.preventDefault();
                        alert('recaptcha error. Stop Form Submission.');
                    });
                }
            });
        }
        function callbackCatch(error){
            console.log('Error: ' +error);
        }
    </script> --}}

    {!!htmlScriptTagJsApi([
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch'
    ]) !!}

    <meta name="theme-color" content="#47b8c9">
    <meta name="twitter:site" content="@">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Home">
    <meta name="twitter:description" content="">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">
    {{-- For Contact Form Recaptcha --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
