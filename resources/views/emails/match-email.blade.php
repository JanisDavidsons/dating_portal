@component('mail::message')
# You have a match !!

You matched with {{$matchedUser->name}} !

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
