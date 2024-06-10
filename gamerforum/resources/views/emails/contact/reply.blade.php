@component('mail::message')
# Reply to Your Contact Form Submission

{{ $reply }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
