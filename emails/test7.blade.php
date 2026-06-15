@php
    $registrationUrl = $registrationUrl ?? ($dashboardUrl ?? '#');
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $websiteUrl = $websiteUrl ?? 'https://bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';

    $futuresBannerUrl = $futuresBannerUrl ?? materialAsset('slider/emails/futures-banner.webp');
    $futuresBannerMobileUrl = $futuresBannerMobileUrl ?? materialAsset('slider/emails/futures-banner-mobile.webp');

    // Same square 50% badge used in the previous newsletter. Recommended: #7B4DFF background, white text, 192×192 PNG.
    $offerBadgeImageUrl = $offerBadgeImageUrl ?? materialAsset('slider/emails/offer-badge-square.png');
@endphp

        <!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <title>Boston English Center</title>

    <!--[if mso]>
    <style>
        * { font-family: Arial, Helvetica, sans-serif !important; }
    </style>
    <![endif]-->

    <style>
        :root {
            color-scheme: light dark;
            supported-color-schemes: light dark;
        }

        body {
            margin:0 !important;
            padding:0 !important;
            background:#F8F8FC;
            font-family:Arial, Helvetica, sans-serif;
            -webkit-text-size-adjust:100%;
            -ms-text-size-adjust:100%;
        }

        table {
            border-collapse:collapse;
            mso-table-lspace:0pt;
            mso-table-rspace:0pt;
        }

        img {
            display:block;
            border:0;
            outline:none;
            text-decoration:none;
            -ms-interpolation-mode:bicubic;
        }

        a {
            text-decoration:none;
        }

        .container {
            width:100%;
            max-width:740px;
            background:#FBFBFF;
        }

        .pad {
            padding-left:26px;
            padding-right:26px;
        }

        .card {
            background:#ffffff;
            border:1px solid #E3E6F2;
            border-radius:22px;
            overflow:hidden;
        }

        .purple {
            color:#7B4DFF !important;
            -webkit-text-fill-color:#7B4DFF !important;
        }

        .desktop-img-row {
            display:table-row;
        }

        .mobile-img-row {
            display:none;
            max-height:0;
            overflow:hidden;
            mso-hide:all;
        }

        u + .body .gmail-blend-screen {
            background:#000000;
            mix-blend-mode:screen;
        }

        u + .body .gmail-blend-difference {
            background:#000000;
            mix-blend-mode:difference;
        }

        @media only screen and (max-width:600px) {
            .container {
                width:90% !important;
                max-width:370px !important;
            }

            .pad {
                padding-left:0 !important;
                padding-right:0 !important;
            }

            .section {
                padding-top:12px !important;
            }

            .header-left,
            .header-right {
                display:block !important;
                width:100% !important;
                text-align:center !important;
            }

            .header-right {
                padding-top:10px !important;
            }

            .header-left table,
            .header-right table {
                margin-left:auto !important;
                margin-right:auto !important;
            }

            .brand-logo {
                width:42px !important;
                height:42px !important;
            }

            .brand-boston {
                font-size:18px !important;
                line-height:20px !important;
            }

            .brand-center {
                font-size:13px !important;
                line-height:16px !important;
            }

            .top-badge td {
                padding-top:9px !important;
                padding-bottom:9px !important;
            }

            .top-badge-text {
                font-size:12px !important;
                line-height:16px !important;
            }

            .top-badge-script {
                font-size:12px !important;
                line-height:16px !important;
            }

            .headline {
                font-size:28px !important;
                line-height:34px !important;
                letter-spacing:-0.4px !important;
                white-space:nowrap !important;
            }

            .subhead {
                font-size:15px !important;
                line-height:22px !important;
                margin-top:12px !important;
            }

            .desktop-img-row {
                display:none !important;
                width:0 !important;
                max-height:0 !important;
                overflow:hidden !important;
                mso-hide:all !important;
            }

            .mobile-img-row {
                display:table-row !important;
                max-height:none !important;
                overflow:visible !important;
            }

            .mobile-img {
                display:block !important;
                width:100% !important;
                max-width:100% !important;
                height:auto !important;
            }

            .decision-text {
                font-size:17px !important;
                line-height:23px !important;
            }

            .truth-col {
                display:block !important;
                width:100% !important;
                box-sizing:border-box !important;
                border-right:0 !important;
                border-bottom:1px solid #E3DBFF !important;
                padding:14px 12px !important;
            }

            .truth-col:last-child {
                border-bottom:0 !important;
            }

            .truth-icon {
                font-size:26px !important;
                line-height:26px !important;
            }

            .truth-copy {
                font-size:13px !important;
                line-height:19px !important;
            }

            .offer-inner {
                padding:16px 14px !important;
            }

            .offer-left,
            .offer-right {
                display:block !important;
                width:100% !important;
                text-align:center !important;
                padding:0 !important;
            }

            .offer-left table,
            .offer-right table,
            .price-table {
                margin-left:auto !important;
                margin-right:auto !important;
            }

            .offer-badge-img {
                width:84px !important;
                height:84px !important;
                margin:0 auto 8px !important;
            }

            .old-price {
                font-size:17px !important;
                line-height:22px !important;
                text-align:center !important;
            }

            .price {
                font-size:48px !important;
                line-height:52px !important;
                letter-spacing:-1.8px !important;
            }

            .month {
                font-size:17px !important;
                line-height:23px !important;
            }

            .offer-right {
                border-left:0 !important;
                border-top:1px solid #E3DBFF !important;
                margin-top:14px !important;
                padding-top:14px !important;
            }

            .feature-list {
                max-width:260px !important;
            }

            .feature-copy {
                font-size:13px !important;
                line-height:19px !important;
            }

            .cta-link {
                padding:12px 14px !important;
            }

            .button-heart {
                font-size:20px !important;
                line-height:20px !important;
                margin-right:7px !important;
            }

            .cta-copy {
                max-width:245px !important;
            }

            .cta-question {
                font-size:14px !important;
                line-height:20px !important;
                white-space:nowrap !important;
            }

            .cta-text {
                font-size:16px !important;
                line-height:22px !important;
                white-space:nowrap !important;
            }

            .safe-note {
                font-size:13px !important;
                line-height:19px !important;
            }

            .footer-script {
                font-size:19px !important;
                line-height:27px !important;
            }

            .legal-text {
                font-size:10px !important;
                line-height:16px !important;
            }
        }

        @media (prefers-color-scheme: dark) {
            body,
            .email-bg {
                background:#020A1E !important;
            }

            .container {
                background:#071636 !important;
            }

            .card,
            .truth-card,
            .offer-card,
            .top-badge {
                background:#10224C !important;
                border-color:#29416D !important;
            }

            .decision-card {
                background:#10224C !important;
                border-color:transparent !important;
            }

            .truth-card {
                background:#151F4B !important;
            }

            .headline,
            .subhead,
            .text,
            .brand-boston,
            .decision-text,
            .truth-copy,
            .month,
            .feature-copy,
            .safe-note,
            .footer-script,
            .top-badge-text,
            .cta-question {
                color:#F7F9FF !important;
                -webkit-text-fill-color:#F7F9FF !important;
            }

            .muted,
            .old-price {
                color:#AAB7D6 !important;
                -webkit-text-fill-color:#AAB7D6 !important;
            }

            .purple {
                color:#C4B5FD !important;
                -webkit-text-fill-color:#C4B5FD !important;
            }

            .feature-check,
            .lock-icon {
                background:#7B4DFF !important;
                color:#ffffff !important;
                -webkit-text-fill-color:#ffffff !important;
            }

            .button-link,
            .button-link span {
                color:#ffffff !important;
                -webkit-text-fill-color:#ffffff !important;
            }
        }
    </style>
</head>

<body class="body" style="margin:0; padding:0; background:#F8F8FC; font-family:Arial, Helvetica, sans-serif; color:#061538;">
<div style="display:none; max-height:0; overflow:hidden; opacity:0; color:transparent; mso-hide:all;">
    Imagine it is December. Complete your Boston English Center registration today.
</div>

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="email-bg" style="background:#F8F8FC;">
    <tr>
        <td align="center">
            <!--[if mso]><table role="presentation" width="740" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->

            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="container">

                <!-- HEADER -->
                <tr>
                    <td class="pad" style="padding-top:24px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td width="50%" valign="top" class="header-left">
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td valign="middle" style="padding-right:12px;">
                                                <img class="brand-logo" src="{{ materialAsset('slider/emails/png/logo.png') }}" width="56" height="56" alt="Boston English Center">
                                            </td>
                                            <td valign="middle" align="left">
                                                <div class="brand-boston" style="font-size:24px; line-height:26px; font-weight:900; color:#071A44; letter-spacing:-0.8px;">Boston</div>
                                                <div class="brand-center purple" style="font-size:16px; line-height:19px; font-weight:900; letter-spacing:-0.3px;">English Center</div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                <td width="50%" valign="top" align="right" class="header-right">
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" class="top-badge" style="background:#ffffff; border:1px solid #E3DBFF; border-radius:14px; overflow:hidden;">
                                        <tr>
                                            <td valign="top" style="padding:12px 9px 12px 14px;">
                                                <div style="width:34px; height:34px; border-radius:50%; background:#F3EFFF; color:#7B4DFF; font-size:19px; line-height:34px; text-align:center;">&#9201;</div>
                                            </td>
                                            <td valign="top" align="left" style="padding:11px 14px 11px 0;">
                                                <div class="top-badge-text text" style="font-size:14px; line-height:19px; font-weight:800; color:#061538;">It&rsquo;s been 24 hours since<br>you started your registration.</div>
                                                <div class="top-badge-script purple" style="padding-top:3px; font-size:14px; line-height:18px; font-weight:900;">We saved your spot.</div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- HEADLINE -->
                <tr>
                    <td align="center" class="pad section" style="padding-top:38px;">
                        <div class="headline" style="font-size:54px; line-height:60px; font-weight:900; color:#061538; letter-spacing:-2px; text-align:center; white-space:nowrap;">
                            Imagine it&rsquo;s <span class="purple">December.</span>
                        </div>
                        <div class="subhead" style="max-width:610px; margin:16px auto 0; font-size:25px; line-height:33px; font-weight:400; color:#061538; text-align:center;">
                            You promised yourself that this would be<br>
                            the year you <span class="purple" style="font-weight:900;">finally improve your English.</span>
                        </div>
                    </td>
                </tr>

                <!-- FUTURES IMAGE -->
                <tr>
                    <td class="pad section" style="padding-top:22px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card" style="border-color:#C7B8FF;">
                            <tr class="desktop-img-row">
                                <td style="font-size:0; line-height:0;">
                                    <img src="{{ $futuresBannerUrl }}" width="688" alt="Today versus 6 months later English progress comparison" style="width:100%; max-width:100%; height:auto;">
                                </td>
                            </tr>

                            <!--[if !mso]><!-->
                            <tr class="mobile-img-row">
                                <td style="font-size:0; line-height:0;">
                                    <img class="mobile-img" src="{{ $futuresBannerMobileUrl }}" width="100%" alt="Today versus 6 months later English progress comparison" style="display:none; width:100%; max-width:100%; height:auto;">
                                </td>
                            </tr>
                            <!--<![endif]-->
                        </table>
                    </td>
                </tr>

                <!-- DECISION CARD - NO BORDER -->
                <tr>
                    <td align="center" class="pad section" style="padding-top:20px;">
                        <table role="presentation" width="560" cellpadding="0" cellspacing="0" border="0" class="decision-card" style="width:100%; max-width:560px; margin:0 auto; background:#ffffff; border:0; border-radius:22px;">
                            <tr>
                                <td align="center" style="padding:18px 22px 20px;">
                                    <div style="color:#7B4DFF; font-size:28px; line-height:30px; text-align:center; margin:0 auto 8px;">&#128156;</div>
                                    <div class="decision-text" style="font-size:23px; line-height:30px; font-weight:800; color:#061538; text-align:center;">
                                        The difference between these two futures<br>
                                        is not talent. It&rsquo;s <span class="purple">one decision.</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- TRUTHS -->
                <tr>
                    <td class="pad section" style="padding-top:20px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="truth-card" style="background:#F3EFFF; border-radius:18px; overflow:hidden;">
                            <tr>
                                <td width="33.33%" valign="middle" class="truth-col" style="width:33.33%; padding:16px 18px; border-right:1px solid #E3DBFF;">
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td valign="middle" style="padding-right:12px;"><div class="truth-icon purple" style="font-size:31px; line-height:31px;">&#127891;</div></td>
                                            <td valign="middle" class="truth-copy" style="font-size:14px; line-height:20px; font-weight:600; color:#061538;">Every student who speaks confidently today was once a beginner.</td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="33.33%" valign="middle" class="truth-col" style="width:33.33%; padding:16px 18px; border-right:1px solid #E3DBFF;">
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td valign="middle" style="padding-right:12px;"><div class="truth-icon purple" style="font-size:31px; line-height:31px;">&#128156;</div></td>
                                            <td valign="middle" class="truth-copy" style="font-size:14px; line-height:20px; font-weight:600; color:#061538;">Every fluent speaker once felt nervous.</td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="33.33%" valign="middle" class="truth-col" style="width:33.33%; padding:16px 18px;">
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td valign="middle" style="padding-right:12px;"><div class="truth-icon purple" style="font-size:31px; line-height:31px;">&#128681;</div></td>
                                            <td valign="middle" class="truth-copy" style="font-size:14px; line-height:20px; font-weight:600; color:#061538;">Every success story started with a first step.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- OFFER -->
                <tr>
                    <td class="pad section" style="padding-top:20px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card offer-card" style="background:#ffffff; border-color:#D8DDEB; border-radius:18px;">
                            <tr>
                                <td class="offer-inner" style="padding:24px 20px 18px;">
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td width="58%" valign="middle" class="offer-left" style="width:58%; padding-right:22px;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td valign="middle" style="padding-right:20px;">
                                                            <img src="{{ $offerBadgeImageUrl }}" width="104" height="104" alt="50% OFF" class="offer-badge-img" style="width:104px; height:104px;">
                                                        </td>
                                                        <td valign="middle">
                                                            <div class="old-price muted" style="font-size:22px; line-height:28px; font-weight:800; color:#70727A; text-decoration:line-through; text-decoration-color:#E23245;">$70/month</div>
                                                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" class="price-table">
                                                                <tr>
                                                                    <td valign="baseline" class="price purple" style="font-size:72px; line-height:76px; font-weight:900; letter-spacing:-3px;">$35</td>
                                                                    <td valign="baseline" class="month" style="padding-left:8px; font-size:25px; line-height:31px; font-weight:900; color:#061538;">/month</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td width="42%" valign="middle" class="offer-right" style="width:42%; padding-left:24px; border-left:1px solid #DDE1EC;">
                                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="feature-list">
                                                    <tr>
                                                        <td width="22" valign="top" style="padding-top:3px;"><div class="feature-check" style="width:15px; height:15px; border-radius:50%; background:#7B4DFF; color:#ffffff; font-size:10px; line-height:15px; font-weight:900; text-align:center;">&#10003;</div></td>
                                                        <td class="feature-copy" style="font-size:14px; line-height:20px; color:#061538;">Live practice every day</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="22" valign="top" style="padding-top:8px;"><div class="feature-check" style="width:15px; height:15px; border-radius:50%; background:#7B4DFF; color:#ffffff; font-size:10px; line-height:15px; font-weight:900; text-align:center;">&#10003;</div></td>
                                                        <td class="feature-copy" style="padding-top:6px; font-size:14px; line-height:20px; color:#061538;">2 teacher-led sessions/week</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="22" valign="top" style="padding-top:8px;"><div class="feature-check" style="width:15px; height:15px; border-radius:50%; background:#7B4DFF; color:#ffffff; font-size:10px; line-height:15px; font-weight:900; text-align:center;">&#10003;</div></td>
                                                        <td class="feature-copy" style="padding-top:6px; font-size:14px; line-height:20px; color:#061538;">Learning materials &amp; vocabulary</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="22" valign="top" style="padding-top:8px;"><div class="feature-check" style="width:15px; height:15px; border-radius:50%; background:#7B4DFF; color:#ffffff; font-size:10px; line-height:15px; font-weight:900; text-align:center;">&#10003;</div></td>
                                                        <td class="feature-copy" style="padding-top:6px; font-size:14px; line-height:20px; color:#061538;">Supportive global community</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="22" valign="top" style="padding-top:8px;"><div class="feature-check" style="width:15px; height:15px; border-radius:50%; background:#7B4DFF; color:#ffffff; font-size:10px; line-height:15px; font-weight:900; text-align:center;">&#10003;</div></td>
                                                        <td class="feature-copy" style="padding-top:6px; font-size:14px; line-height:20px; color:#061538;">Free placement test</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="cta-question" style="margin-top:22px; margin-bottom:10px; font-size:18px; line-height:24px; font-weight:800; color:#061538; text-align:center; white-space:nowrap;">
                                        Which version of yourself do you want to become?
                                    </div>

                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td bgcolor="#7B4DFF" style="background:#7B4DFF; border-radius:13px;">
                                                <a href="{{ $registrationUrl }}" class="button-link cta-link" style="display:block; padding:14px 18px; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important; text-decoration:none !important; border-radius:13px; text-align:center; white-space:nowrap;">
                                                    <span class="button-heart" style="display:inline-block; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important; font-size:22px; line-height:22px; text-align:center; vertical-align:middle; margin-right:8px;">&#128156;</span>
                                                    <span class="gmail-blend-screen" style="display:inline-block; vertical-align:middle;"><span class="gmail-blend-difference" style="display:inline-block;"><span class="cta-text" style="display:inline-block; font-size:21px; line-height:27px; font-weight:900; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important;">Complete Your Registration Now</span></span></span>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- FOOTER NOTE -->
                <tr>
                    <td align="center" class="pad section" style="padding-top:10px; padding-bottom:22px;">
                        <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center">
                            <tr>
                                <td valign="middle" style="padding-right:8px;"><div class="lock-icon" style="width:22px; height:22px; border-radius:6px; background:#7B4DFF; color:#ffffff; font-size:15px; line-height:22px; text-align:center; font-weight:900;">&#128274;</div></td>
                                <td valign="middle" class="safe-note" style="font-size:16px; line-height:22px; color:#061538;">Cancel anytime. No hidden fees.</td>
                            </tr>
                        </table>

                        <div class="footer-script" style="padding-top:18px; font-family:'Comic Sans MS','Bradley Hand',cursive; font-size:28px; line-height:36px; color:#061538; text-align:center;">
                            Your future self is watching. <span class="purple">Make them proud.</span> &#10024; &#9825;
                        </div>
                    </td>
                </tr>

                <!-- LEGAL FOOTER -->
                <tr>
                    <td bgcolor="#061639" style="background:#061639; padding:16px 24px 20px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" class="legal-text" style="font-size:12px; line-height:18px; font-weight:500; color:#B8C4E4; text-align:center;">
                                    Boston English Center &nbsp;&bull;&nbsp;
                                    <a href="mailto:{{ $supportEmail }}" style="color:#ffffff !important; -webkit-text-fill-color:#ffffff !important; text-decoration:none !important;">{{ $supportEmail }}</a>
                                    &nbsp;&bull;&nbsp;
                                    <a href="{{ $websiteUrl }}" style="color:#ffffff !important; -webkit-text-fill-color:#ffffff !important; text-decoration:none !important;">bostonenglishcenter.com</a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="legal-text" style="padding-top:8px; font-size:11px; line-height:17px; color:#8798C7; text-align:center;">
                                    You are receiving this email because you started your registration with Boston English Center.
                                    <a href="{{ $unsubscribeUrl }}" style="color:#C9D6FF !important; text-decoration:underline !important;">Unsubscribe</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>

            <!--[if mso]></td></tr></table><![endif]-->
        </td>
    </tr>
</table>
</body>
</html>
