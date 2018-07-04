@extends('layouts.app')

@section('content')

<div class="container message" id="underage">
    
    <h1>{!! trans('text.sorry') !!}</h1>
    <h1 class="secondary">{!! trans('text.underage') !!} </h1>
    
</div> <!-- END #underage -->

@endsection