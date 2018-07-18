@extends('layouts.app')

@section('content')

<div class="festival-wrapper"  @isset($festival_background) {!! $festival_background !!} @endisset >

    <div class="festival-header container-fluid">
        
        <div class="festival-city">
            <h1>{{ trans('festivals/'.$festival['slug'].'.city') }}</h1>
        </div>
        <div class="festival-date-location">
        @if($festival['link']) <a href="{{ $festival['link'] }}" target="_blank"> @endif
            <p>{{ trans('festivals/'.$festival['slug'].'.location') }}</p>
            <p>{{ trans('festivals/'.$festival['slug'].'.date') }}</p>
        @if($festival['link']) </a>  @endif
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

    @if($festival['tickets'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ $festival['tickets'] }}" class="buy-tickets" target="_blank">{{ trans('text.festival-tickets-button') }}</a>
            </div>
        </div>
    </div>
    @endif
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
                <ul class="set-reminder">                    
                    <li class="dropdown menu-reminder dropdown-reminder"
                        data-title="{{ trans('text.stream-reminder-title',['city' => trans('festivals/'.$festival['slug'].'.city') ]) }} "
                        data-description="{!! trans('festivals/'.$festival['slug'].'.description') !!}"
                        data-start="{{ $festival['start'] }}"
                        data-end="{{ $festival['end'] }}"
                        data-address="{{ trans('festivals/'.$festival['slug'].'.location') }}, {{ trans('festivals/'.$festival['slug'].'.city') }}"
                        >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('text.set-reminder') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="shop">

    <div class="col-md-6 tickets-wrapper">
        <h2>{{ trans('text.festival-tickets') }}</h2>
        <p>{!! trans('text.festival-tickets-description') !!}</p>
        @if($festival['tickets'])
        <a href="{{ $festival['tickets'] }}" class="get-tickets"  target="_blank">{{ trans('text.festival-tickets-button') }}</a>
        @else
        <h3>{{ trans('text.festival-tickets-door') }}</h3>
        @endif
    </div>
    <div class="col-md-6 items-wrapper">
        <h2>{{ trans('text.festival-items') }}</h2>
        <p>{!! trans('text.festival-items-description') !!}</p>
        <a href="https://www.shopbeergear.ca/pages/Corona?ls={{ app()->getLocale() }}" target="_blank" class="get-items">{{ trans('text.festival-items-button') }}</a>
    </div>

</div>


@endsection