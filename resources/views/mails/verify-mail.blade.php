@component('mail::message')
# کد فعالسازی شما در لرن تیچ

تست1

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
