@extends('layouts.app')

@section('content')

<div class="container-fluid message" id="main">
    
    
    <div class="container">
        <div class="row">
        
            <h1>{!! trans('text.festival') !!} <span class="secondary">{!! trans('text.connected') !!}</span></h1>
            
            <div class="festival-date">
                <img src="/images/background-date-before.png" alt="">    
                <h1>{!! trans('text.festival-date') !!}</h1>
                <img src="/images/background-date-after.png" alt="">    
            </div>


            <a  href="#" class="buy-tickets">{{ trans('text.festival-tickets-button') }}</a>
            
        </div>
    </div> <!-- END .row -->



    <div class="container-fluid" id="play-trailer">
        <a class="play-trailer" href="{!! trans('text.trailer') !!}" data-lity>
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
                        <li>KIDNAP</li>
                        <li>CLAPTONE</li>
                        <li>HOT CHIP DJ</li>                        
                    </ul>
                </div>
                <div class="row">
                    <ul class="list-inline">
                        <li>CROOKED COLOURS</li>
                        <li>CHRISTIAN MARTIN</li>
                        <li>NITIN</li>
                    </ul>
                </div>
                <div class="row">
                    <ul class="list-inline">
                        
                        <li>THOMAS JACK</li>
                        <li>CHRISTIAN LOFFLER</li>
                        <li>DJ THREE</li>
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
            <div class="col-md-3 col-xs-4">
                <img src="/images/calendar-icon.png" alt="Set a reminder">
            </div>
            <div class="col-md-9 col-xs-8">
                <h3>{{ trans('text.watch-live') }}</h3>
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
        <a href="https://www.shopbeergear.ca/pages/Corona?ls={{ app()->getLocale() }}" target="_blank" class="get-items">{{ trans('text.festival-items-button') }}</a>
    </div>

</div>

@endsection