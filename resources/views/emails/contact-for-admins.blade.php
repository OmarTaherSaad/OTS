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


    التاريخ: {{ $date }}
    <hr>

    <br><br>
    {{ config('app.name') }}
@endcomponent
