@extends('layouts.app')

@section('content')

<div class="container" id="gate">
    
    <h1>{!! trans('text.gate-age') !!}</h1>
    <h2>{!! trans('text.proceed') !!}</h2>

    

    <form class="signup" id="age" action="/gate" method="POST" enctype="multipart/form-data" novalidate >
        {{ csrf_field() }}

        <div class="row">

            <div class="col-md-8">

                <div class="row" id="birthday">
                    <div class="col-md-4">
                        <div class="selectmenu select-month">
                            {!! Form::select('month', $months, null, ['class' => 'hidden', 'id' => 'month', 'placeholder' => trans('form.month')]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="selectmenu select-day">
                            {!! Form::selectRange('day', 1, 31, null, ['class' => 'hidden', 'id' => 'day', 'placeholder' => trans('form.day')]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="selectmenu select-year">
                            {!! Form::selectYear('year', 2018, 1900, null, ['class' => 'hidden', 'id' => 'year', 'placeholder' => trans('form.year')]) !!}
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <div class="selectmenu select-province">
                    {!! Form::select('province', $provinces, null, ['class' => 'hidden', 'id' => 'province', 'placeholder' => trans('form.province')]) !!}
                    @if ($errors->has('province'))
                    <span id="province-error" class="error form-text text-danger">{{ trans('form.province_required') }}</span>
                    @endif
                </div>
            </div>

            @if ($errors->has('day') || $errors->has('month') || $errors->has('year') || $errors->has('date'))
            <span id="date-error" class="error text-danger">
                    {{ trans('form.date-error') }}
            </span>
            @endif
        </div>

        <div class="row">
            <button class="enter" type="submit">{{ trans('form.enter') }}</button>
        </div>

    </form>

</div> <!-- END #gate -->

@endsection