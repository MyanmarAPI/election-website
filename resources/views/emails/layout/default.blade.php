<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Myanmar Election API</title>
    <style media="all" type="text/css">
        .btn:hover {
            background: #00acc1 !important;
        }
    </style>
</head>
<body style="margin: 0; padding: 0; font-family: Roboto-Regular,Helvetica,Arial,sans-serif;" bgcolor="#FFFFFF">
    <table width="100%" height="100%" style="min-width: 348px;" border="0" cellspacing="0" cellpadding="0">
        <tr height="32px"></tr>
        <tr align="center">
            <td width="32px"></td>
            <td>
                <table border="0" cellspacing="0" cellpadding="0" style="max-width: 600px;">
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <img src="http://maepaysoh.org/img/favicon.png" style="display: block;float:left;">
                                    </td>
                                    <td align="left" style="font-size: 24px; color: rgba(0,0,0,0.8); line-height: 1.25;">
                                        Myanmar Election API
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr height="16"></tr>
                    <tr>
                        <td>
                            <table bgcolor="#303f9f" width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 332px; max-width: 600px; border: 1px solid #E0E0E0; border-bottom: 0; border-top-left-radius: 3px; border-top-right-radius: 3px;">
                                <tr>
                                    <td height="72px" colspan="3"></td>
                                </tr>
                                <tr>
                                    <td width="32px"></td>
                                    <td style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 24px; color: rgba(0,0,0,0.8); line-height: 1.25;">
                                    @section('subject')
                                    @show
                                    </td>
                                    <td width="32px"></td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="3"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table bgcolor="#FAFAFA" width="100%" border="0" cellspacing="0"cellpadding="0" style="min-width: 332px; max-width: 600px; border: 1px solid #F0F0F0; border-bottom: 1px solid #C0C0C0; border-top: 0; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;">
                                <tbody>
                                    <tr height="16px">
                                        <td width="32px" rowspan="3"></td>
                                        <td></td>
                                        <td width="32px" rowspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @yield('main-content')
                                        </td>
                                    </tr>
                                    <tr height="32px"></tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr height="16px"></tr>
                    <tr>
                        <td>
                            <table style="min-width: 300px; width:100%;" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 11px; color: #878787; line-height: 1.5; text-align:center;">
                                    &copy; {{ date('Y') }} Myanmar Election API. All Rights Reserved.<br>
                                    You received this email from <a href="http://maepaysoh.org/" target="_blank" style="color: #0097a7;text-decoration:none;">http://maepaysoh.org</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr height="32px"></tr>
    </table>
</body>

</html>