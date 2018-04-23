@extends('layouts.app')

@section('content')

    <div class="row">
        
        <div class="col-md-5 col-sm-6">
            <div class="row">
                <div class="col-md-10">
                    <h1>hello<span>moto</span></h1>
                    <h3>{!! trans('text.title') !!} </h3>
                    <h4>{!! trans('text.sub-title') !!} </h4>
                    <p><small class="form-text text-danger">* {{ trans('form.required_fields') }}</small></p>
                </div>
            </div>
            <div class="row">
            <form class="claim" id="claim-form" action="/process" method="POST" enctype="multipart/form-data" novalidate >
                {{ csrf_field() }}

                <div class="form-group col-md-10">
                    <label class="hint" for="firstname">{{ trans('form.firstname') }}</label>
                    <input type="text" class="form-control" id="firstname" name="firstname"
                           value="{{ old('firstname') }}"
                           placeholder="{{ trans('form.firstname') }}*"
                           data-msg-required="{{ trans('form.required') }}">
                    @if ($errors->has('firstname'))
                        <small id="firstname-error" class="error form-text text-danger">{{ trans('form.required') }}</small>
                    @endif
                </div>

                <div class="form-group col-md-10">
                    <label class="hint" for="lastname">{{ trans('form.lastname') }}</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"
                           value="{{ old('lastname') }}"
                           placeholder="{{ trans('form.lastname') }}*"
                           data-msg-required="{{ trans('form.required') }}" >
                    @if ($errors->has('lastname'))
                        <small id="lastname-error" class="error form-text text-danger">{{ trans('form.required') }}</small>
                    @endif
                </div>

                <div class="form-group col-md-10">
                    <label class="hint" for="email">{{ trans('form.email') }}</label>
                    <input type="text" class="form-control" id="email" name="email"
                           value="{{ old('email') }}"
                           placeholder="{{ trans('form.email') }}*"
                           data-msg-required="{{ trans('form.required') }}"
                           data-msg-email="{{ trans('form.valid_email') }}" >
                    @if ($errors->has('email'))
                        <small id="email-error" class="error form-text text-danger">{{ trans('form.valid_email') }}</small>
                    @endif
                </div>

                <div class="form-group col-md-10">
                    <label class="hint" for="phone">{{ trans('form.phone_number') }}</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                           value="{{ old('phone') }}"
                           placeholder="{{ trans('form.phone_number') }}*"
                           data-msg-required="{{ trans('form.required') }}"
                           data-msg-phoneno="{{ trans('form.valid_phone') }}">
                    @if ($errors->has('phone'))
                        <small id="phone-error" class="error form-text text-danger">{{ trans('form.required') }}}</small>
                    @endif
                </div>

                <div class="form-group col-md-10">
                    <label class="hint" for="address">{{ trans('form.address') }} 1</label>
                    <input type="text" class="form-control" id="address" name="address"
                           value="{{ old('address') }}"
                           placeholder="{{ trans('form.address') }} 1*"
                           data-msg-required="{{ trans('form.required') }}" >
                    @if ($errors->has('address'))
                        <small id="address-error" class="error form-text text-danger">{{ trans('form.required') }}}</small>
                    @endif
                </div>

                <div class="form-group col-md-10">
                    <label class="hint" for="address2">{{ trans('form.address') }} 2</label>
                    <input type="text" class="form-control" id="address2" name="address2"
                           value="{{ old('address2') }}"
                           placeholder="{{ trans('form.address') }} 2" >
                </div>

                <div class="form-group col-md-10">
                    <label class="hint" for="city">{{ trans('form.city') }}</label>
                    <input type="text" class="form-control" id="city" name="city"
                           value="{{ old('city') }}"
                           placeholder="{{ trans('form.city') }}*"
                           data-msg-required="{{ trans('form.required') }}" >
                    @if ($errors->has('city'))
                        <small id="city-error" class="error form-text text-danger">{{ trans('form.required') }}</small>
                    @endif
                </div>

                <div class="form-group col-md-10">
                    <select class="form-control" id="province" name="province" data-msg-required="{{ trans('form.required') }}">
                        <option value="">{{ trans('form.province') }}*</option>
                        <option value="AB" @if(old('province') == 'AB') selected @endif >Alberta</option>
                        <option value="BC" @if(old('province') == 'BC') selected @endif >British Columbia</option>
                        <option value="MB" @if(old('province') == 'MB') selected @endif >Manitoba</option>
                        <option value="NB" @if(old('province') == 'NB') selected @endif >New Brunswick</option>
                        <option value="NL" @if(old('province') == 'NL') selected @endif >Newfoundland and Labrador</option>
                        <option value="NS" @if(old('province') == 'NS') selected @endif >Nova Scotia</option>
                        <option value="NT" @if(old('province') == 'NT') selected @endif >Northwest Territories</option>
                        <option value="NU" @if(old('province') == 'NU') selected @endif >Nunavut</option>
                        <option value="ON" @if(old('province') == 'ON') selected @endif >Ontario</option>
                        <option value="QC" @if(old('province') == 'QC') selected @endif >Quebec</option>
                        <option value="SK" @if(old('province') == 'SK') selected @endif >Saskatchewan</option>
                        <option value="YT" @if(old('province') == 'YT') selected @endif >Yukon</option>
                        <option value="PE" @if(old('province') == 'PE') selected @endif >Prince Edward Island</option>
                    </select>
                    @if ($errors->has('province'))
                        <small id="province-error" class="error form-text text-danger">{{ trans('form.required') }}</small>
                    @endif
                </div>

                <div class="form-group col-md-10">
                    <label class="hint" for="postalcode">{{ trans('form.postalcode') }}</label>
                    <input type="text" class="form-control" id="postalcode" name="postalcode"
                           value="{{ old('postalcode') }}"
                           placeholder="{{ trans('form.postalcode') }}*"
                           data-msg-required="{{ trans('form.valid_postalcode') }}"
                           data-msg-cdnPostal="{{ trans('form.valid_postalcode') }}" >
                    @if ($errors->has('postalcode'))
                        <small id="postalcode-error" class="error form-text text-danger">{{ trans('form.valid_postalcode') }}</small>
                    @endif
                </div>

                <div class="form-group col-md-10">
                    <label class="hint" for="imei">{{ trans('form.imei') }}</label>
                    <input type="text" class="form-control" id="imei" name="imei"
                           value="{{ old('imei') }}"
                           placeholder="{{ trans('form.imei') }}*"
                           data-msg-required="{{ trans('form.required') }}"
                           data-msg-digits="{{ trans('form.valid_imei') }}"
                           data-msg-exactlength="{{ trans('form.valid_imei') }}" >
                    @if ($errors->has('imei'))
                        <small id="imei-error" class="error form-text text-danger">{{ $errors->first('imei') }}</small>
                    @endif
                </div>

                <div class="form-group col-md-10">
                    <select class="form-control" id="purchased_dropdown" data-msg-required="{{ trans('form.purchased_from') }}">
                        <option value="">{{ trans('form.purchased') }}*</option>
                        <option value="Bell Mobility" @if(old('purchased') == 'Bell Mobility') selected @endif >Bell Mobility</option>
                        <option value="Virgin Mobile" @if(old('purchased') == 'Virgin Mobile') selected @endif >Virgin Mobile</option>
                        <option value="The Source" @if(old('purchased') == 'The Source') selected @endif >The Source</option>
                        <option value="MTS" @if(old('purchased') == 'MTS') selected @endif >MTS</option>
                        <option value="other" @if(old('purchased') == 'other') selected @endif >{{ trans('form.other') }}</option>
                    </select>

                    @if ($errors->has('purchased'))
                        <small id="purchased-error" class="error form-text text-danger">{{ trans('form.required') }}</small>
                    @endif

                </div>

                <div id="hiddendiv" class="form-group col-md-10">
                    <label class="hint">{{ trans('form.purchased') }}</label>
                    <input type="text" class="form-control" id="purchased_other"
                           value="{{ old('purchased_other') }}"
                           placeholder="{{ trans('form.purchased') }}*"
                           data-msg-required="{{ trans('form.required') }}" >
                </div>

                <div class="form-group col-md-10">
                    <input type="hidden" name="purchased" id="purchased" data-msg-required="{{ trans('form.required') }} ">
                </div>



                <div class="form-group col-md-10">
                    <div class="row no-gutters upload-receipt">
                    <div class="col-md-6 upload-receipt-description">
                        <label for="receipt">{{ trans('form.receipt') }}</label>
                        <p>{{ trans('form.receipt_info') }}</p>
                    </div>
                    <div class="col-md-6">
                        <input type="file" class="filestyle" name="receipt" id="receipt"
                               data-buttonBefore="true"
                               data-btnClass="btn-primary btn-block"
                               data-msg-required="{{ trans('form.valid_receipt') }}"
                               data-msg-filesize="{{ trans('form.valid_receipt_size') }}"
                               data-msg-accept="{{ trans('form.valid_receipt_type') }}"
                               data-text="{{ trans('form.receipt_button') }}">
                        @if ($errors->has('receipt'))
                            <small id="receipt-error" class="error form-text text-danger">{{ trans('form.valid_receipt') }}</small>
                        @endif
                    </div>
                    </div>
                </div>

                <div class="form-group col-md-10 form-check">
                    <label class="form-check-label" for="agree">
                        <input class="form-check-input" type="checkbox" name="agree" id="agree"
                               value="1" @if(old('agree') == 1) checked="checked" @endif
                               data-msg-required="{{ trans('form.must_agree') }}" required >
                        <span>* {!! trans('form.agree', ['policy_link' => '<a target="_blank" href="/privacy-policy" class="text-lowercase">'.trans('text.privacy-policy').'</a>']) !!}</span>
                    </label>
                    @if ($errors->has('agree'))
                        <small id="agree-error" class="error form-text text-danger">{{ trans('form.must_agree') }}</small>
                    @endif
                </div>

                <div class="form-group col-md-10">
                    {!! NoCaptcha::display() !!}
                    <input type="hidden" data-msg-required="{{ trans('form.not_robot') }}" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                    @if ($errors->has('g-recaptcha-response'))
                        <small id="agree-error" class="error form-text text-danger text-center">
                            {{ trans('form.not_robot') }}
                        </small>
                    @endif
                </div>

                <div class="form-group col-md-10">
                    <button class="btn btn-primary btn-claim btn-lg btn-block text-uppercase" type="submit">{{ trans('form.claim') }}</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection