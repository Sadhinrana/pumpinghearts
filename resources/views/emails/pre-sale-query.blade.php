@component('mail::message')
Hi Trainer,

You have received a query from potential customer:

@component('mail::panel')
{{$content['query']}}
@endcomponent

<strong>Name:</strong> {{$content['name']}} <br>
<strong>Email:</strong> {{$content['email']}} <br>
<strong>Phone:</strong> {{$content['phone']}} <br>
<strong>Preferred Contact:</strong> {{$content['preferred']}} <br>

Please respond to this query the soonest to secure client, please check <a href="#"> How It Works</a> to see how the platform works, you are requested to abide by our <a href="http://pumpinghearts.net/terms-of-service">Terms Of Service</a> to ensure overall quality.

Have any queries?
@component('mail::button', ['url' => $url])
    Contact Support
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
