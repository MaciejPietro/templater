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
                                {{ $position }}
                            </div>

                            <table>
                                <tbody class="font-size: 12px" font-family: 'Arial' ;>
                                    <tr>
                                        <td style="padding-top: 10px"></td>
                                    </tr>
                                    @if ($phone)
                                        <tr style="vertical-align:middle">
                                            <td style="vertical-align:middle;">
                                                <img style="width: 16px; margin-top: 4px"
                                                    src="{{ asset('images/icons/icon-phone.png') }}" alt="">
                                            </td>
                                            <td style="color:rgb(15,38,83); padding-left: 8px;">
                                                <a style="text-decoration:underline;font-size:12px;color:rgb(15,38,83)"
                                                    href="tel:{{ $phone }}">
                                                    {{ $phone }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($email)
                                        <tr style="vertical-align:middle">
                                            <td style="vertical-align:middle">
                                                <img style="width: 16px; margin-top: 6px"
                                                    src="{{ asset('images/icons/icon-email.png') }}" alt="">
                                            </td>
                                            <td style="color:rgb(15,38,83); padding-left: 8px;">
                                                <a style="text-decoration:underline;font-size:12px;color:rgb(15,38,83)"
                                                    href="mailto:{{ $email }}l">
                                                    {{ $email }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endif

                                    @if ($website)
                                        <tr style="vertical-align:middle">
                                            <td style="vertical-align:middle">
                                                <img style="width: 16px; margin-top: 6px"
                                                    src="{{ asset('images/icons/icon-web.png') }}" alt="">
                                            </td>
                                            <td style="color:rgb(15,38,83); padding-left: 8px;">
                                                <a style="text-decoration:underline;font-size:12px;color:rgb(15,38,83)"
                                                    target="_blank" href="{{ $website }}">
                                                    {{ $website }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endif


                                    @if ($address)
                                        <tr style="vertical-align:middle">
                                            <td style="vertical-align:middle">
                                                <img style="width: 16px; margin-top: 4px"
                                                    src="{{ asset('images/icons/icon-location.png') }}" alt="">
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
            @if ($footer)
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td style="padding: 40px; display: block; width: 100%">
                                <div style="border-top: 1px solid #DFE3EF"></div>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="padding-bottom: 0px; padding: 0px 40px 40px; font-size: 12px; font-family: 'Arial'; line-height: 1.5; color: #B8BDCA;">
                                {!! $footer !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endif
        </tbody>
    </table>
</div>
