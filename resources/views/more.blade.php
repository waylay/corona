@extends('layouts.app')

@section('content')

<div class="learn-more-wrapper">
    <div class="container-fluid">
        <h1>{!! trans('text.learn-more-title') !!}</h1>
        <h2>{!! trans('text.learn-more-subtitle') !!} </h2>
        <p>{!! trans('text.learn-more-text') !!} </p>
        <ul class="list-inline">
            @foreach($festivals as $slug => $festival)
            <li>{{ trans('festivals/'.$festival['slug'].'.city') }}</li>
            @endforeach
        </ul>
        <a href="https://twitter.com/hashtag/coronasunsets" target="_blank">#CORONASUNSETS</a>
    </div>    
</div> <!-- END #learn-more -->

@endsection