@extends('layouts.app')

@section('content')

<div class="gate-form-wrapper">

    <div class="brand">
        <div class="logo">
            <img src="/images/logo-gate.png" alt="{!! trans('text.site-title') !!}">
        </div>
    </div>

    <h1>{!! trans('text.allset') !!}</h1>
    <h2 class="thankyou">{!! trans('text.thankyou') !!} </h2>

    <div class="thankyou-social">

        <a href="https://www.facebook.com/CoronaCanada/?ref=br_rs" target="_blank">
            <img src="/images/facebook_large.png" alt="Facebook">
        </a> 

        <a href="https://instagram.com/corona" target="_blank">
            <img src="/images/instagram_large.png" alt="Instagram">
        </a>
        


    </div>

</div> <!-- END .signup-form -->

@endsection