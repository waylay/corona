@component('mail::message')
# Hello, {{ $name }}!

We have received your request and we will contact you as soon as possible. Please check again if the IMEI # is correct.<br><br>

<strong>IMEI #:</strong>{{ $imei }}<br><br><br>


@component('mail::button', ['url' => config('app.url') ])
Make a new request
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
