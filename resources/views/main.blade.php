@extends('layouts.app')

@section('content')

<div class="container-fluid message" id="main">
    
    <div class="festival-date">
        <img src="/images/background-date-before.png" alt="">    
        <h1>{!! trans('text.festival-date') !!}</h1>
        <img src="/images/background-date-after.png" alt="">    
    </div>

    <div class="container">
        <div class="row">
        
            <h1 class="secondary">{!! trans('text.festival') !!} {!! trans('text.connected') !!}</h1>
            <h2>{{ trans('text.notified') }}</h2>

            <a  href="#" class="buy-tickets">{{ trans('text.festival-tickets-button') }}</a>


        

        
            <form class="signup" id="signup" action="/process" method="POST" enctype="multipart/form-data" novalidate >
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">

                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' :'' }}" maxlength="30" tabindex="1" id="name" name="name"
                                value="{{ old('name') }}"
                                placeholder="{{ trans('form.name') }} *"
                                data-msg-required="{{ trans('form.required') }}">

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' :'' }}" maxlength="11"  id="phone" name="phone"
                                value="{{ old('phone') }}"
                                placeholder="{{ trans('form.phone') }} *"
                                data-msg-required="{{ trans('form.phone_email_required') }}"
                                pattern="\d*">
                        @if ($errors->has('phone'))
                            <span id="phone-error" class="error ">{{ trans('form.phone_correct') }}</span>
                        @endif 

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">

                            <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' :'' }}" maxlength="50"   id="email" name="email"
                                value="{{ old('email') }}"
                                placeholder="{{ trans('form.email') }} *"
                                data-msg-required="{{ trans('form.phone_email_required') }}"
                                data-msg-email="{{ trans('form.valid_email') }}">
                                                     
                            @if ($errors->has('email'))
                                <span id="email-error" class="error ">{{ trans('form.email_unique') }}</span>                                
                            @endif
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="form-check-label" for="agree">
                                <input class="form-check-input" type="checkbox" name="agree" id="agree" value="1" data-msg-required="{{ trans('form.must_agree') }}" >
                                <span class="checkmark"></span>
                                <p>* {{ trans('form.agree') }} <a href="{{ trans('text.privacy-policy-link') }}" target="_blank">{{ trans('text.privacy-policy') }}</a></p>
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <button class="enter text-uppercase" type="submit">{{ trans('form.signup') }}</button>
                </div>
            </form>
        </div>
    </div> <!-- END .row -->



    <div class="container-fluid" id="play-trailer">
        <a class="play-trailer" href="https://www.facebook.com/v2.3/plugins/video.php?allowfullscreen=true&mute=0&autoplay=true&href=https%3A%2F%2Fwww.facebook.com%2FTribeSeries%2Fvideos%2F717065741663237&locale=en_US&sdk=joey" data-lity>
            <span>{!! trans('text.play-trailer') !!}&nbsp;</span>
            <img src="/images/play-trailer.png" alt="{!! trans('text.play-trailer') !!}">
        </a>
    </div>  <!-- END #play-trailer -->
    
    
</div> <!-- END #festival -->



<div class="festival-list-wrapper">
    <div class="container-fluid" id="festival-list">
        <div class="row">
            <ul class="list-inline">
            @foreach($festivals as $slug => $festival)
            <li><a href="#slide-{{ $festival['id'] }}" data-slide="{{ $festival['id'] + 1 }}">{{ trans('festivals/'.$festival['slug'].'.city') }}</a></li>
            @endforeach
            </ul>
        </div>
    </div>  <!-- END #festival-list -->
</div>

<div class="slider-wrapper">
    <img src="/images/border-festivals.png">
    <ul id="festival-slider">
        <li class="slide">
            <div class="artists">
                <div class="row">
                    <ul class="list-inline">
                        <li>Rudimental</li>
                        <li>SBTRKT</li>
                        <li>Clapone</li>
                        <li>Hot CHip</li>
                    </ul>
                </div>
                <div class="row">
                    <ul class="list-inline">
                        <li>Crooked Colours</li>
                        <li>Christian Martin</li>
                        <li>Guy J</li>
                        <li>Kidnap</li>
                    </ul>
                </div>
                <div class="row">
                    <ul class="list-inline">
                        <li>Slavash</li>
                        <li>Niki Sadeki</li>
                        <li>Night Vision</li>
                        <li>Nitin</li>
                    </ul>
                </div>
                <div class="row">
                    <ul class="list-inline">
                        <li>The Kount</li>
                        <li>Ostrich</li>
                        <li>Sean Keating</li>
                    </ul>
                </div>
            </div>

            <div class="slider-image" style="background: url('/images/slider-static.jpg') no-repeat center center / cover;">  
                <h1>{!! trans('text.slider-static-headline') !!}</h1>              
                <a class="read-more" href="/more"> {{ trans('text.learn-more') }} </a>
            </div>
        </li>
        
        
        @foreach($festivals as $slug => $festival)
        <li class="slide" id="slide-{{ $festival['id'] }}">
            <div class="artists">
                
                @foreach($festival['artists'] as $artists)
                <div class="row">
                    <ul class="list-inline">
                    @foreach($artists as $artist)
                        <li><a href="/festival/{{ $slug }}">{{ $artist }}</a></li>
                    @endforeach
                    </ul>
                </div>
                @endforeach
                    
            </div>
            <div class="slider-image" style="background: url('/images/slider-{{ $slug }}.jpg') no-repeat center center / cover;">
                <h1>{{ trans('festivals/'.$festival['slug'].'.city') }}</h1>
                <a class="read-more" href="/festival/{{ $slug }}"> {{ trans('text.learn-more') }} </a>
            </div>
        </li>

        @endforeach

    </ul>

</div>  <!-- END .slider-wrapper -->

<div class="reminder">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3 col-xs-4">
                        <img src="/images/calendar-icon.png" alt="Set a reminder">
                    </div>
                    <div class="col-md-9 col-xs-8">
                        <h3>{{ trans('text.watch-live') }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                    <a href="#" class="set-reminder">{{ trans('text.set-reminder') }}</a>
            </div>
        </div>
    </div>
</div>

<div class="shop">

    <div class="col-md-6 tickets-wrapper">
        <h2>{{ trans('text.festival-tickets') }}</h2>
        <p>{!! trans('text.festival-tickets-description') !!}</p>
        <a href="#" class="get-tickets">{{ trans('text.festival-tickets-button') }}</a>
    </div>
    <div class="col-md-6 items-wrapper">
        <h2>{{ trans('text.festival-items') }}</h2>
        <p>{!! trans('text.festival-items-description') !!}</p>
        <a href="#" class="get-items">{{ trans('text.festival-items-button') }}</a>
    </div>

</div>

@endsection