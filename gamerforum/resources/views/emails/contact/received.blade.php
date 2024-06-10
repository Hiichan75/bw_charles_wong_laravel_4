@component('mail::message')
# New Contact Form Submission

You have received a new contact form submission.

**Name**: {{ $contact->name }}

**Email**: {{ $contact->email }}

**Message**: {{ $contact->message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
