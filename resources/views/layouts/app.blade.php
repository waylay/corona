<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if( request()->is('festival/*') ) {{ strtoupper(trans('festivals/'.$festival['slug'].'.city')) }} - @endif {{ trans('text.site-title') }}</title>
    
    <!-- Styles -->
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <meta property="og:url" content="{{ url('') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ trans('text.site-title') }}" />
    <meta property="og:description" content="Canada’s First Music Festival Connected by the Sunset | Aug 11, 2018" />
    <meta property="og:image" content="{{ url('/images/coronasunsets_social.jpg') }}" />

    @if( request()->is('dashboard') )
    <link href="{{ mix('css/dashboard.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" rel="stylesheet">
    @endif

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '620806521630752');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=620806521630752&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    

</head>

<body class="{{ Route::currentRouteName() }} lang-{{ app()->getLocale() }}">
 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-mobile">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
    <div id="header">

        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">

                    <a class="navbar-brand navbar-brand-centered" href="{{ url('/festival') }}">
                        
                        @if ( Route::currentRouteName() == 'more' )
                        <img class="logo" src="/images/logo-contrast.png" alt="{!! trans('text.site-title') !!}">
                        @else
                        <img class="logo" src="/images/logo.png" alt="{!! trans('text.site-title') !!}">
                        @endif
                    </a>

                </div>

                <!-- Links -->
                <div id="navbar-desktop" class="hidden-sm hidden-xs">
                    
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown menu-cities">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('text.cities') }}</a>
                            <ul class="dropdown-menu">
                                <li role="separator" class="divider"></li>
                                @foreach($festivals as $slug => $city)
                                <li class="{{ $slug }}"><a href="/festival/{{ $slug }} ">{{ trans('festivals/'.$city['slug'].'.city') }}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        @if( request()->is('festival/*') )
                        <li class="dropdown menu-reminder"
                            data-title="{{ trans('text.stream-reminder-title',['city' => trans('festivals/'.$festival['slug'].'.city') ]) }} "
                            data-description="{{ trans('text.stream-reminder-text') }}"
                            data-start="{{ $festival['start'] }}"
                            data-end="{{ $festival['end'] }}"
                            data-address="{{ trans('text.stream-reminder-text') }}"
                            >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('text.set-reminder') }}</a>
                        </li>
                        @endif
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="learn-more"><a href="/more">{{ trans('text.learn-more') }}</a></li>
                        <li>
                            <!-- Localization -->
                            <div class="locale">
                                <a href="/language/en" class="{{ (app()->getLocale() == 'en') ? 'active' : null  }}" tabindex="-1">En</a>
                                <span>|</span>
                                <a href="/language/fr" class="border-left-0 {{ (app()->getLocale() == 'fr') ? 'active' : null  }}" tabindex="-1">Fr</a>
                                @if( request()->is('dashboard') )
                                <span>|</span>
                                <a href="{{ url('/logout') }}"> logout </a>
                                @endif
                            </div> <!-- end .locale  -->
                        </li>		        
                    </ul>
                </div><!-- /#navbar-desktop -->
                

            </div><!-- /.container-fluid -->
        </nav>

    </div> <!-- end #header  -->

    <div id="navbar-mobile" class="collapse hidden-lg hidden-md">
                    
        <ul class="nav navbar-nav">
        <li class="home">
            <a href="{{ url('/festival') }}">{{ trans('text.home') }}</a>
        </li>
        <li class="dropdown menu-cities">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('text.cities') }}</a>
            <ul class="dropdown-menu">
                @foreach($festivals as $slug => $festival)
                <li class="{{ $slug }}"><a href="/festival/{{ $slug }} ">{{ trans('festivals/'.$festival['slug'].'.city') }}</a></li>
                @endforeach
            </ul>
        </li>
        @if( request()->is('festival/*') )
        <li class="dropdown menu-reminder"
            data-title="{{ trans('text.stream-reminder-title',['city' => trans('festivals/'.$festival['slug'].'.city') ]) }} "
            data-description="{{ trans('text.stream-reminder-text') }}"
            data-start="{{ $festival['start'] }}"
            data-end="{{ $festival['end'] }}"
            data-address="{{ trans('text.stream-reminder-text') }}"
            >
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('text.set-reminder') }}</a>
        </li>
        @endif
        <li class="learn-more">
            <a href="/more">{{ trans('text.learn-more') }}</a>
        </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            
            <li>
                <!-- Localization -->
                <a href="/language/en" class="{{ (app()->getLocale() == 'en') ? 'active' : null  }}" tabindex="-1">En</a>
            </li>
            <li>
                <a href="/language/fr" class="border-left-0 {{ (app()->getLocale() == 'fr') ? 'active' : null  }}" tabindex="-1">Fr</a>
            </li>		        
            @if( request()->is('dashboard') )
                <li><a href="{{ url('/logout') }}"> logout </a></li>
            @endif
        </ul>

        <ul class="social list-inline">
            <li>                    
                <a href="https://instagram.com/corona" target="_blank" title="Instagram">
                    <img src="/images/instagram_white.png" alt="Instagram">
                </a>
            </li>
            <li>
                <a href="https://www.facebook.com/CoronaCanada" target="_blank" title="Facebook">
                    <img src="/images/facebook_white.png" alt="Facebook">
                </a>
            </li>
         </ul>
    </div><!-- /#navbar-mobile -->

    <div id="content">

        @yield('content')

    </div> <!-- end .content  -->


    <div id="footer">
        <div class="container-fluid">
            <div class="row">         

                <div class="col-md-6 col-md-push-3 footer-menu">
                    <a href="{{ trans('text.terms-link') }}" target="_blank">{{ trans('text.terms') }}</a>
                    <a href="{{ trans('text.privacy-policy-link') }}" target="_blank">{{ trans('text.privacy-policy') }}</a>
                    <a href="{{ trans('text.contact-link') }}" target="_blank">{{ trans('text.contact') }}</a>
                </div>

                <div class="col-md-3 col-md-pull-6 copy">
                    <p>&copy; {{ date('Y') }} {{ trans('text.copy') }}</p>
                </div>

                    
                <div class="col-md-3 social hidden-sm hidden-xs">
                    
                    <a href="https://instagram.com/corona" target="_blank" title="Instagram">
                        <img src="/images/instagram.png" alt="Instagram">
                    </a>
                    
                    <a href="https://www.facebook.com/CoronaCanada" target="_blank" title="Facebook">
                        <img src="/images/facebook.png" alt="Facebook">
                    </a>

                </div> 
            
            </div> <!-- end .row  -->

        </div> <!-- end .container-fluid  -->
                
    </div> <!-- end #footer  -->

    <!-- Scripts -->

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/bootstrap-dropdownhover.js') }}"></script>
    <script src="{{ mix('js/lightbox.js') }}"></script>
    <script src="{{ mix('js/slider.js') }}"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    @if( request()->is( 'dashboard' ) )
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
    <script src="{{ mix('js/dashboard.js') }}"></script>
    @endif
    
</body>
</html>
