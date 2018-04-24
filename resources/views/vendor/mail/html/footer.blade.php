<tr>
    <td>
        <table class="footer" width="600" cellpadding="0" cellspacing="0">
            <tr>                
                <td valign="top" width="40%">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td>
                                <img src="{{ url('/images/email_footer.png') }}" width="197px" height="129px" style="margin:35px;">
                            </td>
                        </tr>
                    </table>
                </td>
                <td valign="top" width="60%" class="footer-text">
                    <table border="0" cellpadding="35" cellspacing="0" width="100%">
                        <tr>
                            <td>
                                <p>
                                    {{ trans('email.text-footer') }}
                                    {!! trans('email.unsubscribe') !!}
                                </p>
                            </td>                                    
                        </tr>
                    </table>
                </td>                 
            </tr>
            <tr>
                <td colspan="2">
                    <p>{{ trans('email.address') }}</p>
                    <p>{{ trans('email.phone') }} - {{ trans('email.site') }}</p>
                    <p class="links"><a href="{{ trans('text.terms-link') }}" target="_blank">{{ trans('text.terms') }}</a>
                    <a href="{{ trans('text.privacy-policy-link') }}" target="_blank">{{ trans('text.privacy-policy') }}</a></p>
                </td>
            </tr>
        </table>
    </td>
</tr>