@component('mail::message')
# کدفعالسازی شما در لرن تیج

کد زیر را در صفحه تایید ایمیل وارد کنید.
@component('mail::panel')
کد فعالسازی شما: {{$code}}
@endcomponent

این کد تا 30 دقیقه معتبر میباشد

با سپاس<br>
{{ config('app.name') }}
@endcomponent
