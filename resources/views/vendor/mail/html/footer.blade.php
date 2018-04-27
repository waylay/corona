<tr>
    <td>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="100%" height="35" align="center" style="font-size:1px; line-height:1px;">&nbsp;</td>
            </tr>
            <tr>
                <td align="center" valign="top" width="100%">
                    <img src="{{ url('/images/email_above_footer.jpg') }}" style="margin: 0; border: 0; padding: 0; display: block;" width="100%" height="354">
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td bgcolor="#13111E">
        <table class="subcopy" width="600" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="top" width="100%">
                    <table class="white-border" width="530" cellpadding="" cellspacing="0">
                        <tr>
                            <td width="100%" height="17" align="center" style="font-size:1px; line-height:1px;">&nbsp;</td>
                        </tr>
                        <tr>
                        <td align="right" valign="top" width="100%">
                            <table border="0" width="50" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="left" width="18">
                                        <a href="https://instagram.com/corona">
                                            <img src="{{ url('/images/instagram_email.png') }}" width="18" height="18" alt="Instagram">
                                        </a>
                                    </td>
                                    <td align="center" width="8">
                                        <a href="https://www.facebook.com/Corona">
                                            <img src="{{ url('/images/facebook_email.png') }}" width="8" height="17" alt="Facebook">
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td bgcolor="#13111E">
        <table class="footer" width="600" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="100%" colspan="2" height="25" align="center" style="font-size:1px; line-height:1px;">&nbsp;</td>
            </tr>
            <tr>
                <td align="center" valign="top" width="43%">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="center">
                                <img src="{{ url('/images/email_footer.png') }}" style="margin: 0; border: 0; padding: 0; display: block;" width="197" height="129">
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="center" valign="top" width="57%" class="footer-text">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td width="90%" align="left">
                                <p>
                                    {{ trans('email.text-footer') }}
                                </p>
                            </td>
                            <td width="10%" align="right" style="font-size:1px; line-height:1px;">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="100%" colspan="2" height="35" align="center" style="font-size:1px; line-height:1px;">&nbsp;</td>
            </tr>
            <tr>
                <td width="100%" colspan="2">
                    <p>{{ trans('email.address') }}</p>
                    <p>{{ trans('email.phone') }} - {{ trans('email.site') }}</p>
                    <p class="links"><a href="{{ trans('text.terms-link') }}" target="_blank">{{ trans('text.terms') }}</a>
                    <a href="{{ trans('text.privacy-policy-link') }}" target="_blank">{{ trans('text.privacy-policy') }}</a></p>
                </td>
            </tr>
            <tr>
                <td width="100%" colspan="2" height="45" align="center" style="font-size:1px; line-height:1px;">&nbsp;</td>
            </tr>
        </table>
    </td>
</tr>
