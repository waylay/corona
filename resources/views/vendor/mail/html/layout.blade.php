<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
        .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td {line-height: 100%;}
    </style>
</head>
<body>
    <!-- SPACER -->
    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td align="center"><table width="100%" align="center" cellspacing="0" cellpadding="0" border="0">
            <tbody>
            <tr>
                <td width="100%" height="10" align="center" style="font-size:1px; line-height:1px;">&nbsp;</td>
            </tr>
            </tbody>
        </table></td>
    </tr>
    </table>
    <!-- END SPACER -->

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table class="body" width="100%" cellpadding="0" cellspacing="0">
                    {{ $header or '' }}

                    <!-- Email Body -->
                    <tr>
                        <td align="center" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="100%" height="5" align="center" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                </tr>
                                <!-- Body content -->
                                <tr>
                                    <td cellpadding="0" cellspacing="0">
                                        {{ Illuminate\Mail\Markdown::parse($slot) }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    {{ $subcopy or '' }}
                    {{ $footer or '' }}
                </table>
            </td>
        </tr>
    </table>


    <!-- SPACER -->
    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td align="center"><table width="100%" align="center" cellspacing="0" cellpadding="0" border="0">
            <tbody>
            <tr>
                <td width="100%" height="10" align="center" style="font-size:1px; line-height:1px;">&nbsp;</td>
            </tr>
            </tbody>
        </table></td>
    </tr>
    </table>
    <!-- END SPACER -->
</body>
</html>
