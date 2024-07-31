@component('mail::message')
<p>Hello {{ $user->name }},</p>

<p>Thank you for registering with us. Please click the button below to verify your email.</p>

@component('mail::button', ['url' => url('verify/'.$user->remember_token)])
Verify Your Account
@endcomponent

<p>Thank you for joining us!</p>

<p>Best regards,<br>
{{ config('app.name') }}</p>

<p style="margin-top: 20px;">You need to verify this account to start using our services.</p>
@endcomponent
