<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('text.site-title') }}</title>

    <!-- Styles -->
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if( request()->is('dashboard') )
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" rel="stylesheet">
    @endif

</head>

<body class="{{ Route::currentRouteName() }}" >
    <div id="app">

        <div id="header">

                <!-- Localization -->
                <div class="locale">
                    <a href="/language/en" class="{{ (app()->getLocale() == 'en') ? 'active' : null  }}">En</a>
                    <span>|</span>
                    <a href="/language/fr" class="border-left-0 {{ (app()->getLocale() == 'fr') ? 'active' : null  }}">Fr</a>
                    @if( request()->is('dashboard') )
                    <span>|</span>
                    <a href="{{ url('/logout') }}"> logout </a>
                    @endif
                </div> <!-- end .locale  -->


        </div> <!-- end .header  -->


        <div id="content">

            @yield('content')

        </div> <!-- end .content  -->


        <div id="footer">
            
                <hr>
                
                <div class="copy">
                    <p>&copy; {{ date('Y') }} Corona</p>
                    <a href="{{ trans('text.terms-link') }}" target="_blank">{{ trans('text.terms') }}</a>
                    <a href="{{ trans('text.privacy-policy-link') }}" target="_blank">{{ trans('text.privacy-policy') }}</a>
                    <a href="{{ trans('text.contact-link') }}" target="_blank">{{ trans('text.contact') }}</a>
                </div>

                    
                <div class="social hidden-sm hidden-xs">
                    
                    <a href="https://instagram.com/corona" target="_blank">
                        <img src="/images/instagram.png" alt="Instagram">
                    </a>
                    
                    <a href="https://www.facebook.com/Corona" target="_blank">
                        <img src="/images/facebook.png" alt="Facebook">
                    </a>
                    
                    <a href="https://twitter.com/corona" target="_blank">
                        <img src="/images/twitter.png" alt="Twitter">
                    </a>

                    <a href="https://www.youtube.com/corona" target="_blank">
                        <img src="/images/youtube.png" alt="Youtube">
                    </a>
                </div>
                    

        </div> <!-- end #footer  -->

    </div> <!-- end #app  -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @if( request()->is( 'dashboard' ) )

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    @endif

</body>
</html>
