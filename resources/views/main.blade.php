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


            <a href="https://www.eventbrite.ca/o/corona-sunsets-festival-17577225280" class="buy-tickets" target="_blank">{{ trans('text.festival-tickets-button') }}</a>
            
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
                        <li><a href="/festival/whistler">KIDNAP</a></li>
                        <li><a href="/festival/whistler">CLAPTONE</a></li>
                        <li><a href="/festival/toronto">HOT CHIP DJ SET</a></li>                        
                    </ul>
                </div>
                <div class="row">
                    <ul class="list-inline">
                        <li><a href="/festival/quebec">CROOKED COLOURS</a></li>
                        <li><a href="/festival/winnipeg">CHRISTIAN MARTIN</a></li>
                        <li><a href="/festival/toronto">NITIN</a></li>
                    </ul>
                </div>
                <div class="row">
                    <ul class="list-inline">                        
                        <li><a href="/festival/toronto">THOMAS JACK</a></li>
                        <li><a href="/festival/toronto">Christian Löffler</a></li>
                        <li><a href="/festival/halifax">Amtrac</a></li>
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


<div class="boxes">

    <div class="col-md-6 tickets-wrapper">
        <h2>{{ trans('text.festival-tickets') }}</h2>
        <p>{!! trans('text.festival-tickets-description') !!}</p>
        <a href="https://www.eventbrite.ca/o/corona-sunsets-festival-17577225280" target="_blank" class="get-tickets">{{ trans('text.festival-tickets-button') }}</a>
    </div>
    <div class="col-md-6 watch-wrapper">
        <h2>{{ trans('text.festival-reminder') }}</h2>
        <p>{{ trans('text.festival-reminder-description') }}</p>
    </div>

</div>

@endsection