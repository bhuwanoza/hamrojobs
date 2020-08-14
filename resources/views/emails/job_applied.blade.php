@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{ asset('settings').'/'.getConfiguration('site_logo')}}" alt="" width="150px">
@endcomponent
@endslot

{{-- Body --}}
@component('mail::panel')
Your Job Application has reached to us.
Thank you for applying.
@endcomponent

@component('mail::button', ['url' => url('/'),'color' => 'red'])
Visit Website
@endcomponent

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
@endslot
@endcomponent