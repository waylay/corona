@extends('layouts.app')

@section('content')

<div class="container" id="gate">
    
    <h1>{!! trans('text.gate-age') !!}</h1>
    <h2>{!! trans('text.proceed') !!}</h2>

    

    <form class="signup" id="age" action="/gate" method="POST" enctype="multipart/form-data" novalidate >
        {{ csrf_field() }}

        <div class="row">

            <div class="col-sm-8">

                <div class="row" id="birthday">
                    <div class="col-sm-4">
                        <div class="selectmenu select-month">

                            {!! Form::select('month', $months, null, ['id' => 'month']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="selectmenu select-day">
                            {!! Form::selectRange('day', 1, 31, null, ['id' => 'day']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="selectmenu select-year">

                            {!! Form::selectYear('year', 2018, 1900, null, ['id' => 'year']) !!}
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-4">
                <div class="selectmenu">
                    <select id="province" name="province" data-msg-required="{{ trans('form.province_required') }}">
                        <option value="">{{ trans('form.province') }}</option>
                        <option value="Alberta" @if(old('province') == 'Alberta') selected @endif >Alberta</option>
                        <option value="British Columbia" @if(old('province') == 'British Columbia') selected @endif >British Columbia</option>
                        <option value="Manitoba" @if(old('province') == 'Manitoba') selected @endif >Manitoba</option>
                        <option value="New Brunswick" @if(old('province') == 'New Brunswick') selected @endif >New Brunswick</option>
                        <option value="Newfoundland and Labrador" @if(old('province') == 'Newfoundland and Labrador') selected @endif >Newfoundland and Labrador</option>
                        <option value="Nova Scotia" @if(old('province') == 'Nova Scotia') selected @endif >Nova Scotia</option>
                        <option value="Northwest Territories" @if(old('province') == 'Northwest Territories') selected @endif >Northwest Territories</option>
                        <option value="Nunavut" @if(old('province') == 'Nunavut') selected @endif >Nunavut</option>
                        <option value="Ontario" @if(old('province') == 'Ontario') selected @endif >Ontario</option>
                        <option value="Quebec" @if(old('province') == 'Quebec') selected @endif >Quebec</option>
                        <option value="Saskatchewan" @if(old('province') == 'Saskatchewan') selected @endif >Saskatchewan</option>
                        <option value="Yukon" @if(old('province') == 'Yukon') selected @endif >Yukon</option>
                        <option value="Prince Edward Island" @if(old('province') == 'Prince Edward Island') selected @endif >Prince Edward Island</option>
                    </select>
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
            <div class="form-group">
                <button class="enter text-uppercase" type="submit">{{ trans('form.enter') }}</button>
            </div>
        </div>

    </form>

</div> <!-- END #gate -->

@endsection