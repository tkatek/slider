@php
    $registrationUrl = $registrationUrl ?? ($dashboardUrl ?? '#');
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $websiteUrl = $websiteUrl ?? 'https://bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';

    $choiceBannerUrl = $choiceBannerUrl ?? materialAsset('slider/emails/choice-banner.webp');
    $choiceBannerMobileUrl = $choiceBannerMobileUrl ?? materialAsset('slider/emails/choice-banner-mobile.webp');

    $avatarOneUrl = $avatarOneUrl ?? materialAsset('landing-page/img/thumbnails/1.webp');
    $avatarTwoUrl = $avatarTwoUrl ?? materialAsset('landing-page/img/thumbnails/2.webp');
    $avatarThreeUrl = $avatarThreeUrl ?? materialAsset('landing-page/img/thumbnails/3.webp');

    // Same square 50% badge used in the previous newsletters. Recommended: #7B4DFF background, white text, 192×192 PNG.
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
            background:#F7F8FF;
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
            background:#FBFCFF;
        }

        .pad {
            padding-left:24px;
            padding-right:24px;
        }

        .card {
            background:#ffffff;
            border:1px solid #E3E7F3;
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
                width:86% !important;
                max-width:340px !important;
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

            .top-badge-icon-cell,
            .top-badge-subtitle {
                display:none !important;
                width:0 !important;
                max-width:0 !important;
                overflow:hidden !important;
                mso-hide:all !important;
            }

            .top-badge-title {
                font-size:12px !important;
                line-height:16px !important;
            }

            .headline {
                font-size:25px !important;
                line-height:31px !important;
                letter-spacing:-0.3px !important;
                white-space:nowrap !important;
            }

            .subhead {
                font-size:14px !important;
                line-height:21px !important;
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

            .door-card {
                max-width:100% !important;
            }

            .door-card-text {
                font-size:18px !important;
                line-height:24px !important;
            }

            .stats-col {
                display:block !important;
                width:100% !important;
                max-width:100% !important;
                box-sizing:border-box !important;
                padding:14px 10px !important;
                border-left:0 !important;
                border-right:0 !important;
                border-bottom:1px solid #E3E7F3 !important;
                text-align:center !important;
            }

            .stats-col:last-child {
                border-bottom:0 !important;
            }

            .stats-col table {
                margin-left:auto !important;
                margin-right:auto !important;
            }

            .stats-icon {
                width:38px !important;
                height:38px !important;
                line-height:38px !important;
                font-size:20px !important;
            }

            .stats-number {
                font-size:23px !important;
                line-height:28px !important;
            }

            .stats-copy {
                font-size:12px !important;
                line-height:17px !important;
            }

            .avatar {
                width:34px !important;
                height:34px !important;
            }

            .avatar-plus {
                width:40px !important;
                height:40px !important;
                line-height:40px !important;
                font-size:13px !important;
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

            .offer-title {
                font-size:13px !important;
                line-height:18px !important;
                white-space:nowrap !important;
            }

            .price {
                font-size:48px !important;
                line-height:52px !important;
                letter-spacing:-1.6px !important;
            }

            .month {
                font-size:18px !important;
                line-height:24px !important;
            }

            .old-price {
                font-size:17px !important;
                line-height:22px !important;
                text-align:center !important;
            }

            .offer-separator {
                margin:14px 0 12px !important;
            }

            .feature-cell {
                width:20% !important;
                max-width:20% !important;
                padding:0 3px !important;
                vertical-align:top !important;
            }

            .feature-icon {
                font-size:17px !important;
                line-height:21px !important;
            }

            .feature-copy {
                font-size:8px !important;
                line-height:10px !important;
                font-weight:700 !important;
            }

            .cta-link {
                padding:13px 12px !important;
                white-space:nowrap !important;
            }

            .cta-text {
                font-size:15px !important;
                line-height:21px !important;
                white-space:nowrap !important;
            }

            .cta-heart {
                width:21px !important;
                height:21px !important;
                line-height:21px !important;
                font-size:13px !important;
                margin-right:7px !important;
            }

            .safe-note {
                font-size:13px !important;
                line-height:18px !important;
            }

            .bottom-left,
            .bottom-center,
            .bottom-right {
                display:block !important;
                width:100% !important;
                max-width:100% !important;
                text-align:center !important;
                padding:0 !important;
            }

            .bottom-center {
                padding-top:6px !important;
            }

            .bottom-right {
                padding-top:8px !important;
            }

            .bottom-main {
                font-size:17px !important;
                line-height:23px !important;
            }

            .bottom-script {
                font-size:20px !important;
                line-height:26px !important;
            }

            .legal-text {
                font-size:10px !important;
                line-height:16px !important;
            }
        }

        @media only screen and (max-width:430px) {
            .container {
                width:88% !important;
                max-width:330px !important;
            }

            .headline {
                font-size:24px !important;
                line-height:30px !important;
            }

            .cta-text {
                font-size:14px !important;
                line-height:20px !important;
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
            .top-badge {
                background:#10224C !important;
                border-color:#29416D !important;
            }

            .headline,
            .subhead,
            .text,
            .brand-boston,
            .door-card-text,
            .stats-copy,
            .rating,
            .offer-title,
            .month,
            .feature-copy,
            .safe-note,
            .bottom-main,
            .bottom-muted,
            .top-badge-subtitle {
                color:#F6F8FF !important;
                -webkit-text-fill-color:#F6F8FF !important;
            }

            .muted,
            .old-price {
                color:#AAB7D6 !important;
                -webkit-text-fill-color:#AAB7D6 !important;
            }

            .purple,
            .top-badge-title,
            .brand-center,
            .price,
            .stats-number {
                color:#C4B5FD !important;
                -webkit-text-fill-color:#C4B5FD !important;
            }

            .feature-icon,
            .small-check {
                color:#C4B5FD !important;
                -webkit-text-fill-color:#C4B5FD !important;
            }

            .cta-button-cell,
            .avatar-plus {
                background:#7B4DFF !important;
            }

            .button-link,
            .button-link span {
                color:#ffffff !important;
                -webkit-text-fill-color:#ffffff !important;
            }
        }
    </style>
</head>

<body class="body" style="margin:0; padding:0; background:#F7F8FF; font-family:Arial, Helvetica, sans-serif; color:#071A44;">
<div style="display:none; max-height:0; overflow:hidden; opacity:0; color:transparent; mso-hide:all;">
    This is our last reminder &mdash; your Boston English Center spot is still available.
</div>

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="email-bg" style="background:#F7F8FF;">
    <tr>
        <td align="center">
            <!--[if mso]><table role="presentation" width="740" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->

            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="container">

                <!-- HEADER -->
                <tr>
                    <td class="pad" style="padding-top:22px;">
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
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" class="top-badge" style="border:1px solid #7B4DFF; border-radius:999px; background:#ffffff; overflow:hidden;">
                                        <tr>
                                            <td valign="middle" class="top-badge-icon-cell" style="padding:12px 12px 12px 16px;">
                                                <div style="width:38px; height:38px; border-radius:50%; background:#F3EFFF; color:#7B4DFF; font-size:22px; line-height:38px; text-align:center;">&#128156;</div>
                                            </td>
                                            <td valign="middle" style="padding:10px 18px 10px 0;">
                                                <div class="top-badge-title purple" style="font-size:14px; line-height:18px; font-weight:900;">Your spot is still available!</div>
                                                <div class="top-badge-subtitle text" style="font-size:13px; line-height:18px; font-weight:500; color:#071A44;">Complete your registration today.</div>
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
                    <td align="center" class="pad section" style="padding-top:34px;">
                        <div class="headline" style="font-size:54px; line-height:60px; font-weight:900; color:#071A44; letter-spacing:-2.3px; text-align:center; white-space:nowrap;">
                            This is our <span class="purple">last reminder.</span>
                        </div>

                        <div class="subhead" style="max-width:560px; margin:14px auto 0; font-size:22px; line-height:31px; font-weight:700; color:#071A44; text-align:center;">
                            We don&rsquo;t want you to miss the opportunity<br>
                            that can <span class="purple" style="font-weight:900;">change your future.</span>
                        </div>
                    </td>
                </tr>

                <!-- CHOICE BANNER IMAGE -->
                <tr>
                    <td class="pad section" style="padding-top:18px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card" style="background:#10172A; border-color:#C7B8FF;">
                            <tr class="desktop-img-row">
                                <td style="font-size:0; line-height:0;">
                                    <img src="{{ $choiceBannerUrl }}" width="692" alt="Keep waiting or start today" style="width:100%; max-width:100%; height:auto;">
                                </td>
                            </tr>

                            <!--[if !mso]><!-->
                            <tr class="mobile-img-row">
                                <td style="font-size:0; line-height:0;">
                                    <img class="mobile-img" src="{{ $choiceBannerMobileUrl }}" width="100%" alt="Keep waiting or start today" style="display:none; width:100%; max-width:100%; height:auto;">
                                </td>
                            </tr>
                            <!--<![endif]-->
                        </table>
                    </td>
                </tr>

                <!-- DOOR MESSAGE -->
                <tr>
                    <td align="center" class="pad section" style="padding-top:22px;">
                        <table role="presentation" width="420" cellpadding="0" cellspacing="0" border="0" class="card door-card" style="width:100%; max-width:420px; margin:0 auto;">
                            <tr>
                                <td align="center" style="padding:18px 20px 20px;">
                                    <div style="width:42px; height:42px; border-radius:50%; background:#7B4DFF; color:#ffffff; font-size:21px; line-height:42px; font-weight:900; text-align:center; margin:0 auto 10px;">&#128274;</div>
                                    <div class="door-card-text" style="font-size:24px; line-height:30px; font-weight:900; color:#071A44; text-align:center;">The door is still open.</div>
                                    <div class="door-card-text purple" style="font-size:24px; line-height:30px; font-weight:900; text-align:center;">But not forever.</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- SOCIAL PROOF -->
                <tr>
                    <td class="pad section" style="padding-top:20px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card stats-card">
                            <tr>
                                <td style="padding:18px 16px;">
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td width="33.33%" valign="middle" class="stats-col" style="width:33.33%; padding:0 16px;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td valign="middle" style="padding-right:12px;">
                                                            <div class="stats-icon" style="width:54px; height:54px; border-radius:50%; background:#EEF3FF; color:#7B4DFF; font-size:26px; line-height:54px; text-align:center;">&#128101;</div>
                                                        </td>
                                                        <td valign="middle">
                                                            <div class="stats-number purple" style="font-size:28px; line-height:32px; font-weight:900; letter-spacing:-1px;">3,876+</div>
                                                            <div class="stats-copy" style="font-size:14px; line-height:19px; font-weight:600; color:#071A44;">students are already<br>practicing every day.</div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td width="33.33%" valign="middle" align="center" class="stats-col" style="width:33.33%; padding:0 16px; border-left:1px solid #E0E4F1; border-right:1px solid #E0E4F1;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center">
                                                    <tr>
                                                        <td valign="middle"><img class="avatar" src="{{ $avatarOneUrl }}" width="48" height="48" alt="Student" style="width:48px; height:48px; border-radius:50%;"></td>
                                                        <td valign="middle"><img class="avatar" src="{{ $avatarTwoUrl }}" width="48" height="48" alt="Student" style="width:48px; height:48px; border-radius:50%; margin-left:-10px;"></td>
                                                        <td valign="middle"><img class="avatar" src="{{ $avatarThreeUrl }}" width="48" height="48" alt="Student" style="width:48px; height:48px; border-radius:50%; margin-left:-10px;"></td>
                                                        <td valign="middle"><div class="avatar-plus" style="width:56px; height:56px; border-radius:50%; background:#7B4DFF; color:#ffffff; font-size:17px; line-height:56px; font-weight:900; text-align:center; margin-left:-7px;">+3.9K</div></td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td width="33.33%" valign="middle" class="stats-col" style="width:33.33%; padding:0 16px;">
                                                <div class="stars" style="font-size:19px; line-height:25px; color:#FFB21E; -webkit-text-fill-color:#FFB21E;">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td valign="baseline" class="rating" style="font-size:33px; line-height:37px; font-weight:900; color:#071A44; letter-spacing:-1px;">4.9</td>
                                                        <td valign="baseline" class="stats-copy" style="padding-left:8px; font-size:14px; line-height:19px; font-weight:800; color:#071A44;">out of 5</td>
                                                    </tr>
                                                </table>
                                                <div class="stats-copy" style="font-size:12px; line-height:16px; font-weight:500; color:#071A44;">from 3,876+ reviews</div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- OFFER -->
                <tr>
                    <td class="pad section" style="padding-top:12px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card offer-card">
                            <tr>
                                <td class="offer-inner" style="padding:22px 20px 18px;">
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td width="22%" align="center" valign="middle" class="offer-left" style="width:22%; padding-right:18px;">
                                                <img src="{{ $offerBadgeImageUrl }}" width="104" height="104" alt="50% OFF" class="offer-badge-img" style="width:104px; height:104px;">
                                            </td>

                                            <td width="54%" valign="middle" class="offer-left" style="width:54%;">
                                                <div class="offer-title" style="font-size:19px; line-height:25px; font-weight:700; color:#071A44; white-space:nowrap;">Your special offer is still available</div>
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" class="price-table">
                                                    <tr>
                                                        <td valign="baseline" class="price purple" style="font-size:72px; line-height:76px; font-weight:900; letter-spacing:-3px;">$35</td>
                                                        <td valign="baseline" class="month" style="padding-left:8px; font-size:26px; line-height:32px; font-weight:900; color:#071A44;">/month</td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td width="24%" valign="middle" align="center" class="offer-left" style="width:24%;">
                                                <div class="old-price muted" style="font-size:22px; line-height:28px; font-weight:900; color:#6F7280; text-decoration:line-through; text-decoration-color:#E23B4E;">$70/month</div>
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="offer-separator" style="height:1px; line-height:1px; font-size:1px; background:#E2E6F2; margin:18px 0 15px;">&nbsp;</div>

                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td width="20%" valign="top" align="center" class="feature-cell" style="width:20%; padding:0 8px; border-right:1px solid #E2E6F2;">
                                                <div class="feature-icon" style="color:#071A44; font-size:20px; line-height:24px; text-align:center; margin:0 auto 7px;">&#128172;</div>
                                                <div class="feature-copy" style="font-size:12px; line-height:16px; font-weight:700; color:#071A44; text-align:center;">Live practice<br>every day</div>
                                            </td>
                                            <td width="20%" valign="top" align="center" class="feature-cell" style="width:20%; padding:0 8px; border-right:1px solid #E2E6F2;">
                                                <div class="feature-icon" style="color:#071A44; font-size:20px; line-height:24px; text-align:center; margin:0 auto 7px;">&#128197;</div>
                                                <div class="feature-copy" style="font-size:12px; line-height:16px; font-weight:700; color:#071A44; text-align:center;">2 teacher-led<br>sessions/week</div>
                                            </td>
                                            <td width="20%" valign="top" align="center" class="feature-cell" style="width:20%; padding:0 8px; border-right:1px solid #E2E6F2;">
                                                <div class="feature-icon" style="color:#071A44; font-size:20px; line-height:24px; text-align:center; margin:0 auto 7px;">&#128218;</div>
                                                <div class="feature-copy" style="font-size:12px; line-height:16px; font-weight:700; color:#071A44; text-align:center;">Learning materials<br>&amp; vocabulary</div>
                                            </td>
                                            <td width="20%" valign="top" align="center" class="feature-cell" style="width:20%; padding:0 8px; border-right:1px solid #E2E6F2;">
                                                <div class="feature-icon" style="color:#071A44; font-size:20px; line-height:24px; text-align:center; margin:0 auto 7px;">&#129309;</div>
                                                <div class="feature-copy" style="font-size:12px; line-height:16px; font-weight:700; color:#071A44; text-align:center;">Supportive<br>community</div>
                                            </td>
                                            <td width="20%" valign="top" align="center" class="feature-cell" style="width:20%; padding:0 8px;">
                                                <div class="feature-icon" style="color:#071A44; font-size:20px; line-height:24px; text-align:center; margin:0 auto 7px;">&#9989;</div>
                                                <div class="feature-copy" style="font-size:12px; line-height:16px; font-weight:700; color:#071A44; text-align:center;">Free placement<br>test</div>
                                            </td>
                                        </tr>
                                    </table>

                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:20px;">
                                        <tr>
                                            <td class="cta-button-cell" bgcolor="#7B4DFF" style="background:#7B4DFF; border-radius:14px;">
                                                <a href="{{ $registrationUrl }}" class="button-link cta-link" style="display:block; padding:18px 24px; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important; text-decoration:none !important; border-radius:14px; text-align:center; white-space:nowrap;">
                                                    <span class="cta-heart" style="display:inline-block; vertical-align:middle; width:24px; height:24px; border-radius:50%; background:#ffffff; font-size:15px; line-height:24px; color:#7B4DFF; -webkit-text-fill-color:#7B4DFF; text-align:center; margin-right:9px;">&#128640;</span>
                                                    <span class="gmail-blend-screen" style="display:inline-block; vertical-align:middle;"><span class="gmail-blend-difference" style="display:inline-block;"><span class="cta-text" style="display:inline-block; vertical-align:middle; font-size:22px; line-height:27px; font-weight:800; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important;">Complete Your Registration Now</span></span></span>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>

                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:12px auto 0;">
                                        <tr>
                                            <td valign="middle" style="padding-right:8px;">
                                                <div class="small-check purple" style="font-size:16px; line-height:18px; text-align:center; font-weight:900;">&#128274;</div>
                                            </td>
                                            <td valign="middle" class="safe-note" style="font-size:14px; line-height:18px; font-weight:700; color:#071A44;">Cancel anytime. No hidden fees.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- ENCOURAGEMENT -->
                <tr>
                    <td class="pad section" style="padding-top:18px; padding-bottom:18px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td width="23%" valign="middle" align="center" class="bottom-left" style="width:23%;">
                                    <div class="purple" style="font-size:32px; line-height:38px;">&#128156;</div>
                                </td>
                                <td width="44%" valign="middle" align="center" class="bottom-center" style="width:44%;">
                                    <div class="bottom-muted" style="font-size:17px; line-height:23px; font-weight:700; color:#071A44; text-align:center;">Your future self is cheering for you.</div>
                                    <div class="bottom-main" style="font-size:19px; line-height:26px; font-weight:900; color:#071A44; text-align:center;">Take the <span class="purple">first step</span> today.</div>
                                </td>
                                <td width="33%" valign="middle" align="center" class="bottom-right" style="width:33%;">
                                    <div class="bottom-script purple" style="font-family:'Comic Sans MS','Bradley Hand',cursive; font-size:23px; line-height:29px; font-weight:700; text-align:center;">You can do this!</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- LEGAL FOOTER -->
                <tr>
                    <td bgcolor="#061639" style="background:#061639; padding:18px 24px 22px;">
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
                                <td align="center" class="legal-text" style="padding-top:8px; font-size:11px; line-height:17px; font-weight:500; color:#8798C7; text-align:center;">
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
