@extends('layouts.app')

@section('content')

<div class="signup-form-wrapper">

    <div class="brand">
        <div class="logo">
            <img src="/images/logo-signup.png" alt="{{ trans('text.site-title') }}">
        </div>
    </div>


    <h2>{!! trans('text.signup-title') !!}</h2>
    <h3>{{ trans('text.signup-text-1') }}</h3>
    <h3>{{ trans('text.signup-text-2') }}</h3>

    <form class="signup" id="signup" action="/process" method="POST" enctype="multipart/form-data" novalidate >
        {{ csrf_field() }}

        <p class="required-field">* {{ trans('form.required_field') }} </p>

        <div class="form-group">

            <input type="text" class="form-control {{ $errors->has('firstname') ? 'is-invalid' :'' }}" maxlength="30" tabindex="1" id="firstname" name="firstname"
                value="{{ old('firstname') }}"
                placeholder="{{ trans('form.firstname') }} *"
                data-msg-required="{{ trans('form.firstname_required') }}">

            @if ($errors->has('firstname'))
            <span id="firstname-error" class="error text-danger">
                    {{ trans('form.firstname_required') }}
            </span>
            @endif

        </div>

        <div class="form-group">

            <input type="text" class="form-control {{ $errors->has('lastname') ? 'is-invalid' :'' }}" maxlength="30"  id="lastname" name="lastname"
                value="{{ old('lastname') }}"
                placeholder="{{ trans('form.lastname') }} *"
                data-msg-required="{{ trans('form.lastname_required') }}">

            @if ($errors->has('lastname'))
            <span id="lastname-error" class="error text-danger">
                    {{ trans('form.lastname_required') }}
            </span>
            @endif

        </div>

        <div class="form-group">

            <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' :'' }}" maxlength="50"   id="email" name="email"
                value="{{ old('email') }}"
                placeholder="{{ trans('form.email') }} *"
                data-msg-required="{{ trans('form.email_required') }}"
                data-msg-email="{{ trans('form.valid_email') }}">

            @if ($errors->has('email'))
            <span id="email-error" class="error text-danger">
                {{ $errors->first('email') }}
            </span>
            @endif

        </div>

        <div class="form-group">
            <div class="selectdiv">
                <select class="form-control" id="province" name="province" data-msg-required="{{ trans('form.province_required') }}">
                    <option value="">{{ trans('form.province') }}</option>
                    <option value="Alberta" @if(session('province') == 'Alberta') selected @endif >Alberta</option>
                    <option value="British Columbia" @if(session('province') == 'British Columbia') selected @endif >British Columbia</option>
                    <option value="Manitoba" @if(session('province') == 'Manitoba') selected @endif >Manitoba</option>
                    <option value="New Brunswick" @if(session('province') == 'New Brunswick') selected @endif >New Brunswick</option>
                    <option value="Newfoundland and Labrador" @if(session('province') == 'Newfoundland and Labrador') selected @endif >Newfoundland and Labrador</option>
                    <option value="Nova Scotia" @if(session('province') == 'Nova Scotia') selected @endif >Nova Scotia</option>
                    <option value="Northwest Territories" @if(session('province') == 'Northwest Territories') selected @endif >Northwest Territories</option>
                    <option value="Nunavut" @if(session('province') == 'Nunavut') selected @endif >Nunavut</option>
                    <option value="Ontario" @if(session('province') == 'Ontario') selected @endif >Ontario</option>
                    <option value="Quebec" @if(session('province') == 'Quebec') selected @endif >Quebec</option>
                    <option value="Saskatchewan" @if(session('province') == 'Saskatchewan') selected @endif >Saskatchewan</option>
                    <option value="Yukon" @if(session('province') == 'Yukon') selected @endif >Yukon</option>
                    <option value="Prince Edward Island" @if(session('province') == 'Prince Edward Island') selected @endif >Prince Edward Island</option>
                </select>
                @if ($errors->has('province'))
                <span id="province-error" class="error text-danger">{{ trans('form.province-error') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="form-check-label" for="agree">
                <input class="form-check-input" type="checkbox" name="agree" id="agree" value="1" data-msg-required="{{ trans('form.must_agree') }}" >
                <span class="checkmark"></span>
                <p>* {{ trans('form.agree') }}<br><a href="{{ trans('text.privacy-policy-link') }}" target="_blank">{{ trans('text.privacy-policy') }}</a></p>
            </label>
            @if ($errors->has('agree'))
                <span id="agree-error" class="error text-danger">{{ trans('form.must_agree') }}</span>
            @endif
        </div>

        <div class="form-group">
            <button class="enter text-uppercase" type="submit">{{ trans('form.signup') }}</button>
        </div>
    </form>

</div> <!-- END .signup-form -->

<h1 class="connecting">{{ trans('text.connecting') }}<br><a href="https://twitter.com/hashtag/coronasunsets" target="_blank">{{ trans('text.hashtag') }}</a></h1>
<h2 class="get-inspired">{{ trans('text.get_inspired') }}</h2>
<div id="video-wrapper">
<iframe width="1500" height="844" src="https://www.youtube.com/embed/u-Bz4QXwUqM?html5=1&amp;rel=0&amp;controls=1&amp;showinfo=0&amp;vq=hd1080&amp;modestbranding=1&amp;color=white&amp;iv_load_policy=3&amp;hl={{ app()->getLocale() }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</div>
@endsection
