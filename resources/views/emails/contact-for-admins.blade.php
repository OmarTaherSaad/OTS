@component('mail::message')
    New message from omartahersaad.com


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


    التاريخ: {{ $date ?? 'N/A' }}
    <hr>

    <br><br>
    {{ config('app.name') }}
@endcomponent
