@extends('layouts.app')

@section('content')

<div class="learn-more-wrapper">
    <div class="container-fluid">
        <h1>{!! trans('text.learn-more-title') !!}</h1>
        <h2>{!! trans('text.learn-more-subtitle') !!} </h2>
        <p>{!! trans('text.learn-more-text') !!} </p>
        <ul class="list-inline">
            @foreach($festivals as $slug => $festival)
            <li><a href="/festival/{{ $slug }} ">{{ trans('festivals/'.$festival['slug'].'.city') }}</a></li>
            @endforeach
        </ul>
        <a href="https://twitter.com/hashtag/coronasunsetsCA" target="_blank">#coronasunsetsCA</a>
    </div>    
</div> <!-- END #learn-more -->

@endsection