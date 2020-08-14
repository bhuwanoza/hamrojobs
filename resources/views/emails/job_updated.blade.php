@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{ asset('settings').'/'.getConfiguration('site_logo')}}" alt="" width="150px">
@endcomponent
@endslot

{{-- Body --}}
@component('mail::panel')
Your Job "{{ $jobpost['title']  }}", has been updated and the status is now " {{ $jobpost['status'] }}"
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