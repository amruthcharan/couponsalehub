@component('mail::message')
<h2>New Message</h2>
<p>Your have received new message from {{ $name }}!<p>
<p>{{ $content }}</p>

<br>
<hr>
<p>Thanks,</p>
<p>{{ config('app.name') }} Team</p>
@endcomponent
