@component('mail::message')
{{ $contact->title }}

{{ $contact->message }}

يمكنك التواصل مع صاحب الرسالة عن طريق
@component('mail::button', ['url' => "tel:$contact->phone"])
اتصال
@endcomponent

مع أطيب الأمنيات؛<br>
{{ config('app.name') }}
@endcomponent
