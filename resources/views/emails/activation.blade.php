@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{ asset('settings').'/'.getConfiguration('site_logo')}}" alt="" width="150px">
@endcomponent
@endslot
@component('mail::panel')
Dear {{ $content['user']->first_name }} {{ $content['user']->last_name }},  Your account has been created.

Please click the link to activate your account

@component('mail::button', ['url' => url('/activate/'.$content['user']->email.'/'.$content['code']) ,'color' => 'green'])
Activate
@endcomponent

@endcomponent

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
@endslot
@endcomponent



