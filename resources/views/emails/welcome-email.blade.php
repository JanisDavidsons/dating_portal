@component('mail::message')
# Welcome to Janis Davidsons picture sharing platform!

This is place, where you can upload your pictures and share them with other people.

@component('mail::button', ['url' => 'janisdavidsons.com'])
Click here to visit my website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
