@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => $url])
click here
{{$voter_vid}}
{{$voter_key}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
