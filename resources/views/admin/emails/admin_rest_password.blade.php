@component('mail::message')
# Reset Account
welcome {{ $data['data']->username }} <br>

The body of your message.

@component('mail::button', ['url' => url('admin/reset/password/'.$data['token'])])
Click Here To Reset Your Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
