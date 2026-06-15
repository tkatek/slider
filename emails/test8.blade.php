@php
    $registrationUrl = $registrationUrl ?? ($dashboardUrl ?? $websiteUrl ?? 'https://bostonenglishcenter.com');
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $websiteUrl = $websiteUrl ?? 'https://bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? ($websiteUrl . '/unsubscribe');

    $todayTomorrowCardUrl = $todayTomorrowCardUrl ?? materialAsset('slider/emails/starting-card-desktop.webp');
    $todayTomorrowCardMobileUrl = $todayTomorrowCardMobileUrl ?? materialAsset('slider/emails/starting-card-mobile.webp');
    $offerBadgeImageUrl = $offerBadgeImageUrl ?? materialAsset('slider/emails/offer-badge-square.png'); // Recommended badge color: #7B4DFF with white text.
    // Inbox-friendly version: softer urgency and no '#' fallback links.
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


        :root {
            color-scheme: light dark;
            supported-color-schemes: light dark;
        }

        u + .body .gmail-blend-screen {
            background:#000000;
            mix-blend-mode:screen;
        }

        u + .body .gmail-blend-difference {
            background:#000000;
            mix-blend-mode:difference;
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
            .offer-box,
            .top-badge {
                background:#10224C !important;
                background-image:none !important;
                border-color:#2E4678 !important;
                box-shadow:none !important;
            }

            .hero-card {
                background:#10224C !important;
                background-image:none !important;
            }

            .brand-text,
            .badge-text,
            .headline,
            .hero-title,
            .hero-copy,
            .future-title,
            .feature-text,
            .split-text,
            .price-label,
            .month,
            .cta-note,
            .safe-note,
            .bottom-text {
                color:#F6F8FF !important;
                -webkit-text-fill-color:#F6F8FF !important;
            }

            .purple {
                color:#C4B5FD !important;
                -webkit-text-fill-color:#C4B5FD !important;
            }

            .feature-icon,
            .limited-pill {
                background:#261B55 !important;
                border-color:#4C35A4 !important;
            }

            .old-price {
                color:#AAB7D6 !important;
                -webkit-text-fill-color:#AAB7D6 !important;
            }

            .cta-link,
            .cta-link span {
                color:#ffffff !important;
                -webkit-text-fill-color:#ffffff !important;
            }
        }

        .container {
            width:100%;
            max-width:720px;
            background:#FBFCFF;
        }

        .pad {
            padding-left:24px;
            padding-right:24px;
        }

        .card {
            background:#ffffff;
            border:1px solid #E4E4F2;
            border-radius:22px;
            overflow:hidden;
            box-shadow:0 10px 24px rgba(28,18,80,0.06);
        }

        .purple {
            color:#7B4DFF !important;
            -webkit-text-fill-color:#7B4DFF !important;
        }

        .desktop-card-row {
            display:table-row;
        }

        .mobile-card-row {
            display:none;
            max-height:0;
            overflow:hidden;
            mso-hide:all;
        }

        @media only screen and (max-width:600px) {
            .container {
                width:90% !important;
                max-width:360px !important;
            }

            .pad {
                padding-left:0 !important;
                padding-right:0 !important;
            }

            .section {
                padding-top:10px !important;
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

            .logo {
                width:42px !important;
                height:42px !important;
            }

            .brand-text {
                font-size:18px !important;
                line-height:20px !important;
            }

            .badge-text {
                font-size:12px !important;
                line-height:16px !important;
            }

            .hero-inner {
                padding:24px 16px !important;
                text-align:center !important;
            }

            .headline {
                font-size:26px !important;
                line-height:31px !important;
                letter-spacing:-0.6px !important;
            }

            .hero-title {
                font-size:17px !important;
                line-height:23px !important;
                margin-top:16px !important;
            }

            .hero-copy {
                font-size:14px !important;
                line-height:21px !important;
            }

            .desktop-card-row {
                display:none !important;
                width:0 !important;
                max-height:0 !important;
                overflow:hidden !important;
                mso-hide:all !important;
            }

            .mobile-card-row {
                display:table-row !important;
                max-height:none !important;
                overflow:visible !important;
            }

            .mobile-card-img {
                display:block !important;
                width:100% !important;
                max-width:100% !important;
                height:auto !important;
            }

            .future-title {
                font-size:20px !important;
                line-height:26px !important;
            }

            .feature-cell {
                display:inline-block !important;
                width:50% !important;
                max-width:50% !important;
                box-sizing:border-box !important;
                padding:12px 6px !important;
                border-right:0 !important;
                vertical-align:top !important;
            }

            .feature-icon {
                width:38px !important;
                height:38px !important;
                line-height:38px !important;
                font-size:20px !important;
                margin-bottom:7px !important;
            }

            .feature-text {
                font-size:12px !important;
                line-height:17px !important;
                font-weight:600 !important;
            }

            .split-col {
                display:block !important;
                width:100% !important;
                padding:0 0 10px 0 !important;
            }

            .split-col-last {
                padding-bottom:0 !important;
            }

            .split-inner {
                padding:16px !important;
            }

            .split-title {
                font-size:19px !important;
                line-height:24px !important;
            }

            .split-text {
                font-size:14px !important;
                line-height:22px !important;
            }

            .split-emoji {
                width:44px !important;
                height:44px !important;
                line-height:44px !important;
                font-size:23px !important;
            }

            .offer-col {
                display:block !important;
                width:100% !important;
                text-align:center !important;
                padding:0 !important;
            }

            .offer-col table {
                margin-left:auto !important;
                margin-right:auto !important;
            }

            .offer-badge-img {
                width:84px !important;
                height:84px !important;
                margin-left:auto !important;
                margin-right:auto !important;
            }

            .price-label {
                font-size:18px !important;
                line-height:24px !important;
            }

            .price {
                font-size:46px !important;
                line-height:50px !important;
                letter-spacing:-1.6px !important;
            }

            .month {
                font-size:16px !important;
                line-height:22px !important;
            }

            .old-price {
                font-size:17px !important;
                line-height:22px !important;
            }

            .offer-old {
                padding-left:0 !important;
                text-align:center !important;
            }

            .limited-pill-table {
                margin:8px auto 0 !important;
            }

            .limited-pill {
                padding:7px 12px !important;
                font-size:14px !important;
                line-height:18px !important;
                white-space:nowrap !important;
            }

            .limited-wrap {
                padding-top:8px !important;
            }

            .limited-icon {
                display:inline-block !important;
                width:28px !important;
                height:28px !important;
                line-height:28px !important;
                font-size:16px !important;
                margin:0 6px 0 0 !important;
                vertical-align:middle !important;
            }

            .limited-text {
                display:inline-block !important;
                font-size:16px !important;
                line-height:22px !important;
                white-space:nowrap !important;
                vertical-align:middle !important;
            }

            .cta-note {
                font-size:16px !important;
                line-height:22px !important;
                padding:14px 0 9px !important;
            }

            .cta-link {
                padding:13px 10px !important;
                white-space:nowrap !important;
            }

            .cta-text {
                font-size:15px !important;
                line-height:21px !important;
                white-space:nowrap !important;
            }

            .cta-arrow {
                display:none !important;
            }

            .safe-note {
                font-size:13px !important;
                line-height:18px !important;
            }

            .offer-box {
                padding:16px 14px !important;
            }

            .offer-badge-col,
            .offer-price-col {
                display:block !important;
                width:100% !important;
                max-width:100% !important;
                text-align:center !important;
                padding:0 !important;
            }

            .offer-badge-col img {
                margin-left:auto !important;
                margin-right:auto !important;
            }

            .offer-price-col {
                padding-top:10px !important;
            }

            .price-main-table,
            .limited-pill-table {
                margin-left:auto !important;
                margin-right:auto !important;
            }

            .old-price {
                padding-left:0 !important;
                text-align:center !important;
            }

            .bottom-icon {
                display:none !important;
            }

            .bottom-text {
                font-size:12px !important;
                line-height:18px !important;
                text-align:center !important;
                white-space:nowrap !important;
            }

            .footer {
                font-size:10px !important;
                line-height:16px !important;
            }
        }
    </style>
</head>

<body class="body" style="margin:0; padding:0; background:#F7F8FF;">
<div style="display:none; max-height:0; overflow:hidden; opacity:0; color:transparent; mso-hide:all;">
    The hardest part isn&rsquo;t learning English. It&rsquo;s starting. Your spot is still available.
</div>

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="email-bg" style="background:#F7F8FF;">
    <tr>
        <td align="center">
            <!--[if mso]><table role="presentation" width="720" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->

            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="container">

                <!-- HEADER -->
                <tr>
                    <td class="pad" style="padding-top:24px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td width="50%" valign="top" class="header-left">
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td style="padding-right:12px;">
                                                <img class="logo" src="{{ materialAsset('slider/emails/png/logo.png') }}" width="56" height="56" alt="Boston English Center">
                                            </td>
                                            <td valign="middle" align="left">
                                                <div class="brand-text" style="font-size:23px; line-height:25px; font-weight:900; color:#071A44; letter-spacing:-0.7px;">Boston</div>
                                                <div class="brand-text" style="font-size:23px; line-height:25px; font-weight:900; color:#071A44; letter-spacing:-0.7px;">English Center</div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                <td width="50%" valign="top" align="right" class="header-right">
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" class="top-badge" style="background:#ffffff; border:1px solid #E3DBFF; border-radius:14px; overflow:hidden;">
                                        <tr>
                                            <td style="padding:10px 8px 10px 14px;">
                                                <div style="width:34px; height:34px; border-radius:50%; background:#F3EFFF; color:#7B4DFF; font-size:20px; line-height:34px; text-align:center;">&#128156;</div>
                                            </td>
                                            <td style="padding:10px 14px 10px 0;">
                                                <div class="badge-text" style="font-size:15px; line-height:19px; font-weight:900; color:#071A44;">Your spot is still available!</div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- HERO -->
                <tr>
                    <td class="pad section" style="padding-top:18px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card hero-card" style="background:#ffffff; background-image:linear-gradient(135deg,#ffffff 0%,#FBFAFF 58%,#F3EFFF 100%);">
                            <tr>
                                <td class="hero-inner" style="padding:34px 32px;">
                                    <div class="headline" style="font-size:44px; line-height:49px; font-weight:900; letter-spacing:-2px; color:#071A44;">
                                        The hardest part<br>
                                        isn&rsquo;t learning English.<br>
                                        <span class="purple">It&rsquo;s starting.</span>
                                    </div>

                                    <div class="hero-title" style="font-size:22px; line-height:28px; font-weight:900; color:#071A44; margin-top:20px;">
                                        You were only one step away<br>
                                        from joining.
                                    </div>

                                    <div class="hero-copy" style="font-size:17px; line-height:25px; font-weight:500; color:#071A44; margin-top:9px;">
                                        Your registration wasn&rsquo;t completed,<br>
                                        but <span class="purple" style="font-weight:900;">your spot is still available.</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- TODAY / TOMORROW IMAGE -->
                <tr>
                    <td class="pad section" style="padding-top:12px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card">
                            <tr class="desktop-card-row">
                                <td style="font-size:0; line-height:0;">
                                    <img src="{{ $todayTomorrowCardUrl }}" width="672" alt="Today and tomorrow English progress comparison" style="width:100%; max-width:100%; height:auto;">
                                </td>
                            </tr>

                            <!--[if !mso]><!-->
                            <tr class="mobile-card-row">
                                <td style="font-size:0; line-height:0;">
                                    <img class="mobile-card-img" src="{{ $todayTomorrowCardMobileUrl }}" width="100%" alt="Today and tomorrow English progress comparison" style="display:none; width:100%; max-width:100%; height:auto;">
                                </td>
                            </tr>
                            <!--<![endif]-->
                        </table>
                    </td>
                </tr>

                <!-- IMAGINE -->
                <tr>
                    <td class="pad section" style="padding-top:12px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card">
                            <tr>
                                <td align="center" style="padding:20px 16px 8px;">
                                    <div class="future-title" style="font-size:27px; line-height:33px; font-weight:900; color:#071A44;">
                                        Imagine <span class="purple">6 months</span> from today...
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:8px 16px 20px; font-size:0; text-align:center;">
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td width="25%" align="center" valign="top" class="feature-cell" style="width:25%; padding:8px 10px; border-right:1px solid #E5E5F3;">
                                                <div class="feature-icon" style="width:44px; height:44px; border-radius:50%; background:#F3EFFF; color:#7B4DFF; font-size:23px; line-height:44px; text-align:center; margin:0 auto 8px;">&#128483;&#65039;</div>
                                                <div class="feature-text" style="font-size:14px; line-height:20px; font-weight:600; color:#071A44;">
                                                    Speaking English<br>
                                                    without translating<br>
                                                    in your head
                                                </div>
                                            </td>
                                            <td width="25%" align="center" valign="top" class="feature-cell" style="width:25%; padding:8px 10px; border-right:1px solid #E5E5F3;">
                                                <div class="feature-icon" style="width:44px; height:44px; border-radius:50%; background:#F3EFFF; color:#7B4DFF; font-size:23px; line-height:44px; text-align:center; margin:0 auto 8px;">&#128101;</div>
                                                <div class="feature-text" style="font-size:14px; line-height:20px; font-weight:600; color:#071A44;">
                                                    Joining<br>
                                                    conversations<br>
                                                    with confidence
                                                </div>
                                            </td>
                                            <td width="25%" align="center" valign="top" class="feature-cell" style="width:25%; padding:8px 10px; border-right:1px solid #E5E5F3;">
                                                <div class="feature-icon" style="width:44px; height:44px; border-radius:50%; background:#F3EFFF; color:#7B4DFF; font-size:23px; line-height:44px; text-align:center; margin:0 auto 8px;">&#127916;</div>
                                                <div class="feature-text" style="font-size:14px; line-height:20px; font-weight:600; color:#071A44;">
                                                    Understanding<br>
                                                    movies and videos<br>
                                                    more easily
                                                </div>
                                            </td>
                                            <td width="25%" align="center" valign="top" class="feature-cell" style="width:25%; padding:8px 10px;">
                                                <div class="feature-icon" style="width:44px; height:44px; border-radius:50%; background:#F3EFFF; color:#7B4DFF; font-size:23px; line-height:44px; text-align:center; margin:0 auto 8px;">&#127942;</div>
                                                <div class="feature-text" style="font-size:14px; line-height:20px; font-weight:600; color:#071A44;">
                                                    Feeling proud<br>
                                                    of your<br>
                                                    progress
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- MEANWHILE / CHOICE -->
                <tr>
                    <td class="pad section" style="padding-top:12px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td width="50%" valign="top" class="split-col" style="width:50%; padding-right:7px;">
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card" style="background:#FFFCF5; border-color:#F3DEC1;">
                                        <tr>
                                            <td class="split-inner" style="padding:18px;">
                                                <table role="presentation" width="100%">
                                                    <tr>
                                                        <td>
                                                            <div class="split-title" style="font-size:23px; line-height:29px; font-weight:900; color:#B86B00;">Still thinking about it?</div>
                                                        </td>
                                                        <td width="54" align="right">
                                                            <div class="split-emoji" style="width:50px; height:50px; border-radius:50%; background:#FFF1D8; font-size:28px; line-height:50px; text-align:center;">&#129300;</div>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <div class="split-text" style="font-size:16px; line-height:27px; font-weight:700; color:#071A44; margin-top:8px;">
                                                    <div><span style="color:#B86B00; font-weight:900;">&#8226;</span>&nbsp; You may be studying alone</div>
                                                    <div><span style="color:#B86B00; font-weight:900;">&#8226;</span>&nbsp; You may be waiting for the right time</div>
                                                    <div><span style="color:#B86B00; font-weight:900;">&#8226;</span>&nbsp; Starting can still feel difficult</div>
                                                    <div><span style="color:#B86B00; font-weight:900;">&#8226;</span>&nbsp; That is completely normal</div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                <td width="50%" valign="top" class="split-col split-col-last" style="width:50%; padding-left:7px;">
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card" style="background:#F8FFFB; border-color:#BFE7CE;">
                                        <tr>
                                            <td class="split-inner" style="padding:18px;">
                                                <table role="presentation" width="100%">
                                                    <tr>
                                                        <td>
                                                            <div class="split-title" style="font-size:23px; line-height:29px; font-weight:900; color:#13A94B;">The choice is yours.</div>
                                                        </td>
                                                        <td width="54" align="right">
                                                            <div class="split-emoji" style="width:50px; height:50px; border-radius:50%; background:#22C765; color:#ffffff; font-size:28px; line-height:50px; text-align:center;">&#129505;</div>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <div class="split-text" style="font-size:17px; line-height:26px; font-weight:500; color:#071A44; margin-top:9px;">
                                                    Invest a little time today,<br>
                                                    and change your English<br>
                                                    &mdash; and your life.
                                                </div>

                                                <div class="split-text" style="font-size:17px; line-height:24px; font-weight:900; color:#13A94B; margin-top:9px;">
                                                    Your future self will<br>
                                                    thank you.
                                                </div>
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
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card" style="background:#FCFAFF; border-color:#E3DBFF;">
                            <tr>
                                <td style="padding:20px;">
                                    <!-- Price box -->
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="offer-box" style="background:#ffffff; border:1px solid #E3DDF8; border-radius:20px; overflow:hidden; border-collapse:separate;">
                                        <tr>
                                            <!-- 50% OFF square PNG -->
                                            <td width="28%" align="center" valign="middle" class="offer-badge-col" style="width:28%; padding:20px 12px 20px 20px;">
                                                <img src="{{ $offerBadgeImageUrl }}" width="96" height="96" alt="50% OFF" class="offer-badge-img" style="display:block; width:96px; height:96px; margin:0 auto;">
                                            </td>

                                            <!-- Price stack -->
                                            <td width="72%" align="center" valign="middle" class="offer-price-col" style="width:72%; padding:20px 22px 20px 6px;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" class="price-main-table">
                                                    <tr>
                                                        <td valign="baseline" class="price-label" style="font-size:24px; line-height:31px; font-weight:900; color:#071A44; padding-right:8px;">Today:</td>
                                                        <td valign="baseline" class="price purple" style="font-size:58px; line-height:62px; font-weight:900; letter-spacing:-2.2px;">$35</td>
                                                        <td valign="baseline" class="month" style="font-size:22px; line-height:28px; font-weight:900; color:#071A44; padding-left:7px;">/month</td>
                                                    </tr>
                                                </table>

                                                <div class="old-price" style="font-size:19px; line-height:24px; font-weight:900; color:#6F7280; text-decoration:line-through; text-decoration-color:#E23B4E; text-align:center; margin-top:-2px;">
                                                    $70/month
                                                </div>

                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" class="limited-pill-table" style="margin:10px auto 0; border-collapse:separate;">
                                                    <tr>
                                                        <td class="limited-pill purple" style="background:#F3EFFF; border:1px solid #E1D8FF; border-radius:999px; padding:8px 16px; font-size:16px; line-height:20px; font-weight:800; color:#7B4DFF; white-space:nowrap;">
                                                            <span style="font-size:16px; line-height:16px; vertical-align:middle;">&#128293;</span>
                                                            <span style="vertical-align:middle;">Your offer is still available</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="cta-note" style="font-size:21px; line-height:27px; font-weight:900; color:#071A44; text-align:center; padding:16px 0 11px;">
                                        Start your English journey today.
                                    </div>

                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td bgcolor="#7B4DFF" style="background:#7B4DFF; border-radius:15px;">
                                                <a href="{{ $registrationUrl }}" class="cta-link" style="display:block; padding:17px 20px; text-align:center; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important; border-radius:15px; white-space:nowrap;">
                                                    <span class="gmail-blend-screen" style="display:inline-block; vertical-align:middle;"><span class="gmail-blend-difference" style="display:inline-block;"><span class="cta-text" style="font-size:24px; line-height:30px; font-weight:900; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important;">Complete Your Registration Now</span></span></span>
                                                    <span class="cta-arrow" style="font-size:29px; line-height:29px; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important; padding-left:12px;">&#8594;</span>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>

                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:11px auto 0;">
                                        <tr>
                                            <td style="padding-right:7px;">
                                                <div style="width:20px; height:20px; border-radius:50%; background:#7B4DFF; color:#ffffff; font-size:12px; line-height:20px; text-align:center;">&#10003;</div>
                                            </td>
                                            <td class="safe-note" style="font-size:15px; line-height:21px; font-weight:700; color:#071A44;">
                                                Cancel anytime. No hidden fees.
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- BOTTOM PROOF -->
                <tr>
                    <td class="pad section" style="padding-top:15px; padding-bottom:20px;">
                        <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center">
                            <tr>
                                <td class="bottom-icon" style="padding-right:11px;">
                                    <div style="font-size:34px; line-height:38px; color:#7B4DFF;">&#128101;</div>
                                </td>
                                <td>
                                    <div class="bottom-text" style="font-size:16px; line-height:23px; font-weight:500; color:#071A44;">
                                        Thousands of students started exactly where you are today.<br>
                                        The difference? <span class="purple" style="font-weight:900;">They clicked the button.</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td bgcolor="#061639" style="background:#061639; padding:18px 24px 22px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" class="footer" style="font-size:12px; line-height:18px; font-weight:500; color:#B8C4E4; text-align:center;">
                                    Boston English Center &nbsp;&bull;&nbsp;
                                    <a href="mailto:{{ $supportEmail }}" style="color:#ffffff !important; text-decoration:none !important;">{{ $supportEmail }}</a>
                                    &nbsp;&bull;&nbsp;
                                    <a href="{{ $websiteUrl }}" style="color:#ffffff !important; text-decoration:none !important;">bostonenglishcenter.com</a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="footer" style="padding-top:8px; font-size:11px; line-height:17px; font-weight:500; color:#8798C7; text-align:center;">
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
