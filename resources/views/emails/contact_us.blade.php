@component('mail::message')
@if (App::isLocale('ar'))
مرحبًا أستاذ/ة {{ $name }},
لقد استقبلنا رسالتك بنجاح!
وكان محتواها كالآتي:
@else
Hello Mr/Ms. {{ $name }},
I recieved your message successfully, and its content was:
@endif

@component('mail::panel')
{{ $message }}
@endcomponent

@if (App::isLocale('ar'))
سوف نقوم بالرد عليها في أقرب وقت ممكن.
شكرًا لتواصلكم معنا.
@else
I will reply as soon as possible, if reply is needed.
Thank you for contacting me!
@endif
<br><br>
{{ config('app.name') }}
@endcomponent