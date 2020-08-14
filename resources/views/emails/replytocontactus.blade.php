@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="{{ asset('settings').'/'.getConfiguration('site_logo')}}" alt="" width="150px">
@endcomponent
@endslot
<h2>You Have Received A New Message</h2>
<hr>
<h2> Message Details</h2>

@component('mail::table')
<table class="table" >
<tbody>
<tr>
<td>
Full Name
</td>
<td>
{{ $content['first_name']}}   {{ $content['last_name']}}
</td>
</tr>
<tr>
<td>
Subject
</td>
<td>
{{ $content['subject']}}
</td>
</tr>
<tr>
<td>
Mobile Number
</td>
<td>
{{ $content['mobile']}}
</td>
</tr>
<tr>
<td>
Email
</td>
<td>
{{ $content['email']}}
</td>
</tr>
<tr>
<td>
Message
</td>
<td>
&nbsp;
{{ $content['message']}}
</td>
</tr>


</tbody>


</table>
@endcomponent

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
@endslot
@endcomponent



