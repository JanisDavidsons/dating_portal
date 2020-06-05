@component('mail::message')
# Welcome to Dating website!

This is place, where you can meet other people and find your best match.

@component('mail::button', ['url' => 'janisdavidsons.com'])
Click here to visit website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
