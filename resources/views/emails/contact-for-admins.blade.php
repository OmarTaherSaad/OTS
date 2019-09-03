@component('mail::message')
رسالة جديدة من موقعك otscommunity.com!


الاسم: {{ $name }}
<hr>
الايميل: {{ $email }}
<hr>
رقم الموبايل: {{ $phone }}
<hr>
عنوان الرسالة: {{ $subject }}
<hr>
الرسالة:
@component('mail::panel')
{{ $message }}
@endcomponent

<br><br>
{{ config('app.name') }}
@endcomponent