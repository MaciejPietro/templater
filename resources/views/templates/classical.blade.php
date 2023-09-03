<div class="classical-template">
    <table>
        <tbody>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td
                            style="padding: 40px;  padding-bottom: 0px;font-size: 12px; font-family: 'Arial'; line-height: 1.5; color: #0F2653;">
                            {!! $text !!}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 40px">
                            <div style="border-top: 1px solid #DFE3EF"></div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <td style="vertical-align:top; padding-left: 40px">
                            <img width="130"
                                src="https://ci4.googleusercontent.com/proxy/2ccoLtIAu4dQ-tiYRwM7poAA-HctbLeqLRVsrWUhNRWny_0D7DpqFE4VqtE7aGADp6L6XqCETiEUBd8kG87UXslKM77AcD12YD-4zjs9BveqKyc=s0-d-e1-ft#https://drive.google.com/uc?id=1_OsS7sEpQyHUHRJpa0d9WK77gUAOz815"
                                style="display:block;max-width:130px" class="CToWUd" data-bit="iit">
                        </td>

                        <td style="vertical-align:middle; padding: 0px 40px 0px 24px">
                            <h2 style="margin:0px;font-size:18px;font-weight:600;color:rgb(15,38,83)">
                                {{ $name }}
                            </h2>
                            <div style="margin:0px;font-size:14px;line-height:22px;color:rgb(15,38,83)">
                                {{ $role }}
                            </div>

                            <table>
                                <tbody class="font-size: 12px" font-family: 'Arial' ;>
                                    <tr>
                                        <td style="padding-top: 10px"></td>
                                    </tr>
                                    @if ($phone)
                                        <tr style="vertical-align:middle">
                                            <td style="vertical-align:middle;">
                                                <img alt="mobilePhone"
                                                    src="https://ci6.googleusercontent.com/proxy/Xq3hntJEq2rjJzR0uWCVm3clsSla7NsI7xyRuy0B6esGxKEs0TJKSCBJd0PTJnw80_-gOm3yRwJoGtSWipm4TqjnmSCEllHm6WPq2oze68mmA8DO6Mj2dGBHroByKflVGCBL0c-wyQ3vCF92=s0-d-e1-ft#https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/phone-icon-2x.png"
                                                    style="display:block;color:rgb(15,38,83);background-color:rgb(15,38,83)"
                                                    class="CToWUd" data-bit="iit">
                                            </td>
                                            <td style="color:rgb(15,38,83); padding-left: 8px;">
                                                <a style="text-decoration:none;font-size:12px;color:rgb(15,38,83)"
                                                    href="tel:{{ $phone }}">
                                                    {{ $phone }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($email)
                                        <tr style="vertical-align:middle">
                                            <td style="vertical-align:middle">
                                                <img alt="email address"
                                                    src="https://ci5.googleusercontent.com/proxy/u9Dqq8IRTYcA9pxGhij8X1100IBTEBNk6GfgLex2wy5mIUGt4EvtpI__1csTElV-MUMrqJCa2SjWZkRDmYNbTv260GIk6RQb8BWD6Fub4s38olgLolJ-Y0ZMzSkDaCxhCmOgByGso4GxlMz7=s0-d-e1-ft#https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/email-icon-2x.png"
                                                    style="display:block;color:rgb(15,38,83);background-color:rgb(15,38,83)"
                                                    class="CToWUd" data-bit="iit">
                                            </td>
                                            <td style="color:rgb(15,38,83); padding-left: 8px;">
                                                <a style="text-decoration:none;font-size:12px;color:rgb(15,38,83)"
                                                    href="mailto:{{ $email }}l">
                                                    {{ $email }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endif

                                    @if ($website)
                                        <tr style="vertical-align:middle">
                                            <td style="vertical-align:middle">
                                                <img alt="website" width="13"
                                                    src="https://ci5.googleusercontent.com/proxy/bDGbdhNSZAZaKWHjXdHMW3DL3PklwLU9F5lSquHVukVuOVNDm_0LSPw8ckOtJwduaqdVOyJnATN5reUqPaX3QjUNCZkwbG2Ac8UdOzrywgI_nREPLk66UFxOhX3uiKMJOqLfWEBJyXQ51Tk=s0-d-e1-ft#https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/link-icon-2x.png"
                                                    style="display:block;color:rgb(15,38,83);background-color:rgb(15,38,83)"
                                                    class="CToWUd" data-bit="iit">
                                            </td>
                                            <td style="color:rgb(15,38,83); padding-left: 8px;">
                                                <a style="text-decoration:none;font-size:12px;color:rgb(15,38,83)"
                                                    target="_blank" href="{{ $website }}">
                                                    {{ $website }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endif


                                    @if ($address)
                                        <tr style="vertical-align:middle">
                                            <td style="vertical-align:middle">
                                                <img alt="website" width="13"
                                                    src="https://ci5.googleusercontent.com/proxy/PMsX6QYblfid2-Aq_atF0w8D-5O2KEMGfclrImAJEOsQqE_sbKhMfAd7gH3akRnGu3ErEwVfaOuRfuDxpUBCSL-LKhPfwPnP1FnJHgaOjcrmV2CgMlczkQKYJb-bo0qnAEo7PcQNq51IElkIZFk=s0-d-e1-ft#https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/address-icon-2x.png"
                                                    style="display:block;color:rgb(15,38,83);background-color:rgb(15,38,83)"
                                                    class="CToWUd" data-bit="iit">
                                            </td>
                                            <td style="color:rgb(15,38,83); padding-left: 8px;">
                                                <span style="text-decoration:none;font-size:12px;color:rgb(15,38,83)">
                                                    {{ $address }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>

                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <td style="padding: 40px">
                            <div style="border-top: 1px solid #DFE3EF"></div>
                        </td>
                    </tr>
                    @if ($footer)
                        <tr>
                            <td style="padding-bottom: 0px; padding: 0px 40px 40px">
                                <p style="font-size: 12px; font-family: 'Arial'; line-height: 1.5; color: #B8BDCA;">
                                    {{ $footer }}
                                </p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </tbody>
    </table>
</div>
