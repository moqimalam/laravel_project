@component('mail::message')
<p>Hello {{ $user->name }},</p>

<p>Please click the button below to reset your password.</p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Reset Your Password
@endcomponent

<p>Thank you for joining us!</p>

<p>Best regards,<br>
{{ config('app.name') }}</p>

<p style="margin-top: 20px;">In case you are having any issue while recovering your account. Contact Us</p>
@endcomponent
