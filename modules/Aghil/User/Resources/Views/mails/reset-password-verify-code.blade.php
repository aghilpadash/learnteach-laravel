@component('mail::message')
# کد بازیابی رمز عبور شما در لرن تیج

این ایمیل به دلیل درخواست بازیابی رمز عبور شما در سایت لرن تیچ ارسال شده است.
@component('mail::panel')
کد بازیابی رمز عبور شما: {{$code}}
@endcomponent

این کد تا 30 دقیقه معتبر میباشد

با سپاس<br>
{{ config('app.name') }}
@endcomponent
