@component('mail::message')

{{$content['main']}}


This message is in regards to the following order: <br>
<strong>ID:</strong> {{$content['order_id']}} <br>
<strong>Package Name:</strong> {{$content['email']}} <br>
<strong>Package Price:</strong> {{$content['phone']}} <br>
<strong>Package Description Contact:</strong> {{$content['package_description']}} <br>
<strong>Order Creation:</strong> {{$content['package_date']}} <br>

Review: <br>
<strong>Experience: </strong> {{$content['exp']}}/5<br>
<strong>Friendliness: </strong> {{$content['friendliness']}}/5<br>
@component('mail::panel')
    {{$content['review']}}
@endcomponent


Contact Details: <br>
<strong>Name :</strong> {{$content['name']}} <br>
<strong>Phone :</strong> {{$content['phone']}} <br>
<strong>Email :</strong> {{$content['email']}} <br>

Have any queries?
@component('mail::button', ['url' => "http://pumpinghearts.net"])
    Contact Support
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
