@extends('layouts.app')

@section('content')

<div class="container-fluid message" id="thankyou">
    
   

    <div class="container">
        <div class="row">
        
            <h1 class="secondary">{{ trans('text.thankyou') }}</h1>
            <h2>{!! trans('text.allset') !!} </h2>
    
        </div>
    </div> <!-- END .row -->

    
    
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



@endsection