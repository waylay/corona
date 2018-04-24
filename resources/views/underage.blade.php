@extends('layouts.app')

@section('content')

<div class="gate-form-wrapper">

    <div class="brand">
        <div class="logo">
            <img src="/images/logo-gate.png" alt="{!! trans('text.site-title') !!}">
        </div>
    </div>

    <h1>{!! trans('text.sorry') !!},</h1>
    <h2>{!! trans('text.underage') !!} </h2>

    

</div> <!-- END .signup-form -->

@endsection