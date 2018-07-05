@extends('layouts.app')

@section('content')

<div class="container-fluid message" id="main">
    
    <h1>{!! trans('text.festival') !!}</h1>
    <h1 class="secondary">{!! trans('text.connected') !!}</h1>
    <h1 class="festival-date">{!! trans('text.festival-date') !!}</h1>
    <a  href="#" class="buy-tickets">{{ trans('text.festival-tickets-button') }}</a>
    
</div> <!-- END #festival -->

<div class="container-fluid" id="play-trailer">
    <a class="play-trailer" href="https://www.youtube.com/watch?v=DvSVybGWoU8" data-lity>
        <span>{!! trans('text.play-trailer') !!}&nbsp;</span>
        <img src="/images/play-trailer.png" alt="{!! trans('text.play-trailer') !!}">
    </a>
</div>  <!-- END #play-trailer -->

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

            <div class="slider-image" style="background: url('/images/slider-static.jpg') no-repeat center center;">  
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
            <div class="slider-image" style="background: url('/images/slider-{{ $slug }}.jpg') no-repeat center center;">
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
                    <div class="col-md-3">
                        <img src="/images/calendar-icon.png" alt="Set a reminder">
                    </div>
                    <div class="col-md-9">
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