@extends('layouts.app')

@section('content')

<div class="container message" id="main">
    
    <h1>{!! trans('text.festival') !!}</h1>
    <h1 class="secondary">{!! trans('text.connected') !!}</h1>
    <h1 class="festival-date">{!! trans('text.festival-date') !!}</h1>
    <button class="buy-tickets">{{ trans('text.festival-tickets-button') }}</button>
    
</div> <!-- END #festival -->

<div class="container-fluid" id="play-trailer">
    <a class="play-trailer" href="https://www.youtube.com/watch?v=DvSVybGWoU8" data-lity>
        <span>{!! trans('text.play-trailer') !!}&nbsp;</span>
        <img src="/images/play-trailer.png" alt="{!! trans('text.play-trailer') !!}">
    </a>
</div>  <!-- END #play-trailer -->

<div class="festival-list-wrapper">
    <div class="container" id="festival-list">
        <div class="row">
            <ul class="list-inline">
            @foreach($festivals as $slug => $festival)
            <li><a href="#{{ $festival['id'] }}">{{ $festival['city'] }}</a></li>
            @endforeach
            </ul>
        </div>
    </div>  <!-- END #festival-list -->
</div>

<div class="slider-wrapper">
    <img src="/images/border-festivals.png">
    <ul id="festival-slider">
        <li>
            <div class="container slider-artists">
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

            <div class="slider-image">
                <img src="/images/slider-static.jpg">
                <a class="read-more"> {{ trans('text.learn-more') }} </a>
            </div>
        </li>
        
        
        @foreach($festivals as $slug => $festival)
        <li>
            <div class="container slider-artists">
                
                @foreach($festival['artists'] as $artists)
                <div class="row">
                    <ul class="list-inline">
                    @foreach($artists as $artist)
                        <li>{{ $artist }}</li>
                    @endforeach
                    </ul>
                </div>
                @endforeach
                    
            </div>
            <div class="slider-image">
                <img src="/images/slider-{{ $slug }}.jpg">
                <a class="read-more"> {{ trans('text.learn-more') }} </a>
            </div>
        </li>

        @endforeach

    </ul>

</div>  <!-- END .slider-wrapper -->
@endsection