@extends('layouts.app')

@section('content')

<div class="festival-wrapper">

    <div class="festival-header container-fluid">
        
        <div class="festival-city">
            <h1>{{ trans('festivals/'.$festival['slug'].'.city') }}</h1>
        </div>
        <div class="festival-date-location">
            <p>{{ trans('festivals/'.$festival['slug'].'.location') }}</p>
            <p>{{ trans('festivals/'.$festival['slug'].'.date') }}</p>
        </div>
    
    </div>

    <div class="festival-body container-fluid">
        <div class="row ">

            <div class="col-sm-6 col-sm-push-6">
                <div class="artists">                
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
            </div>


            <div class="col-sm-6 col-sm-pull-6">
                <div class="description">
                    <p>{!! trans('festivals/'.$festival['slug'].'.description') !!}</p>
                </div>
            </div>

        </div>        
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <a  href="#" class="buy-tickets">{{ trans('text.festival-tickets-button') }}</a>
            </div>
        </div>
    </div>
    
</div> <!-- END .festival-wrapper -->


<div class="reminder">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3 col-xs-4 text-center">
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