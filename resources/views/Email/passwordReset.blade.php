@component('mail::message')
# Change Your Password

Click On Button Below To Change Your Password

@component('mail::button', ['url' => 'http://localhost:4200/change-password?token='.$token])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
