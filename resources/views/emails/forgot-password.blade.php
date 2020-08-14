@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{ asset('settings').'/'.getConfiguration('site_logo')}}" alt="" width="150px">
@endcomponent
@endslot
@component('mail::panel')
Dear {{ $content['user']->first_name }} {{ $content['user']->last_name }},
We received a request to reset your password.

Click here to change your password.

@component('mail::button', ['url' => url('/reset-password/'.$content['user']->email.'/'.$content['code']) ,'color' => 'green'])
Reset Password
@endcomponent

@endcomponent

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
@endslot
@endcomponent














