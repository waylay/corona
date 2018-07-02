@extends('layouts.app')

@section('content')

<div class="gate-form-wrapper">



    
    <h2 class="legal-age">{!! trans('text.gate-age') !!}</h2>

    <form class="signup" id="age" action="/gate" method="POST" enctype="multipart/form-data" novalidate >
        {{ csrf_field() }}

        <h3>{!! trans('form.birth') !!} </h3>

        <div class="form-group text-center">

            <input type="text" class="form-control {{ $errors->has('month') ? 'is-invalid' :'' }}" maxlength="2" tabindex="1" id="month" name="month"
                value="{{ old('month') }}"
                placeholder="{{ trans('form.month') }}"
                data-msg-required="{{ trans('form.date-error') }}">
        

        
            <input type="text" class="form-control {{ $errors->has('day') ? 'is-invalid' :'' }}" maxlength="2" id="day" name="day"
                value="{{ old('day') }}"
                placeholder="{{ trans('form.day') }}"
                data-msg-required="{{ trans('form.date-error') }}">
        
        
        
            <input type="text" class="form-control {{ $errors->has('year') ? 'is-invalid' :'' }}" maxlength="4"  id="year" name="year"
                value="{{ old('year') }}"
                placeholder="{{ trans('form.year') }}"
                data-msg-required="{{ trans('form.date-error') }}">

            @if ($errors->has('day') || $errors->has('month') || $errors->has('year') || $errors->has('date'))
            <span id="date-error" class="error text-danger">
                    {{ trans('form.date-error') }}
            </span>
            @endif
          
        </div>
        

        <div class="form-group text-center">
            <div class="selectdiv">
                <select class="form-control" id="province" name="province" data-msg-required="{{ trans('form.province_required') }}">
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

        <div class="form-group">
            <button class="enter text-uppercase" type="submit">{{ trans('form.enter') }}</button>
        </div>
    </form>

</div> <!-- END .signup-form -->

@endsection