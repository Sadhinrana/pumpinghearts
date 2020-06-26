@component('mail::message')

Hi, you have received a new message through the contact us page:

Contact Details: <br>
<strong>Subject:</strong> {{$content['subject']}} <br>
<strong>Name:</strong> {{$content['name']}} <br>
<strong>Email:</strong> {{$content['email']}} <br>
<strong>Contact:</strong> {{$content['query']}} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
