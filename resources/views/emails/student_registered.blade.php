@component('mail::message')
# Hello {{ $student->name }},

Thank you for registering with **City of Knowledge**!

Your registration has been successfully completed.

@component('mail::panel')
**Registration Date:** {{ $student->registration_date }}  
**Email:** {{ $student->email }}  
**Phone:** {{ $student->phone }}
@endcomponent

If you have any questions, feel free to contact us.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
