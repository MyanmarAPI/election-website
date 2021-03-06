@extends('emails.layout.default')

@section('subject')
    @parent
    {{ $subject }}
@endsection

@section('main-content')

<table style="min-width: 300px;" border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 13px; color: #202020; line-height: 1.5;">
            Hi {{ $user->name }},
            </td>
        </tr>
        <tr>
            <td style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 13px; color: #202020; line-height: 1.5;">
                Password is successfully changed for your account {{ $user->email }}.
            </td>
        </tr>
        <tr height="32px"></tr>
        <tr>
            <td style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 13px; color: #202020; line-height: 1.5;">
                <a class="btn" style="box-sizing: border-box;outline: none;display: inline-block;line-height: 56px;text-decoration: none;color: #FFF;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;background:#00bcd4;box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);padding: 0 2rem;text-transform: uppercase; border-radius:2px;font-family: Roboto-Regular,Helvetica,Arial,sans-serif;" href="{{ url('auth/login') }}">
                Login to your account
                </a>
            </td>
        </tr>
        <tr height="32px"></tr>
        <tr>
            <td style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 13px; color: #202020; line-height: 1.5;">
                Best,<br>
                Myanmar Election API <br>
                <a href="http://maepaysoh.org/" target="_blank" style="color: #0097a7;text-decoration:none;">http://maepaysoh.org</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection