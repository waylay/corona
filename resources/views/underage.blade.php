@extends('layouts.app')

@section('content')

<div class="container" id="underage">
    
    <h1>{!! trans('text.sorry') !!}</h1>
    <h1 class="in-province">{!! trans('text.underage') !!} </h1>
    
</div> <!-- END #underage -->

@endsection