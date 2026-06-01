@php
    $currentLang = request()->route('lang') ?? 'ar';
    \Illuminate\Support\Facades\App::setLocale($currentLang);
    $languageRoute = \Illuminate\Support\Facades\Route::currentRouteName() ?: 'landing';
    $currentRouteParams = request()->route()?->parameters() ?? [];

    $languages = [
        ['code' => 'en', 'short' => 'EN', 'name' => 'الإنجليزية', 'native' => 'English', 'flag' => 'https://flagcdn.com/w40/us.png'],
        ['code' => 'ar', 'short' => 'AR', 'name' => 'العربية', 'native' => 'العربية', 'flag' => 'https://flagcdn.com/w40/ma.png'],
        ['code' => 'fr', 'short' => 'FR', 'name' => 'الفرنسية', 'native' => 'Français', 'flag' => 'https://flagcdn.com/w40/fr.png'],
        ['code' => 'es', 'short' => 'ES', 'name' => 'الإسبانية', 'native' => 'Español', 'flag' => 'https://flagcdn.com/w40/es.png'],
        ['code' => 'pt', 'short' => 'PT', 'name' => 'البرتغالية', 'native' => 'Português', 'flag' => 'https://flagcdn.com/w40/pt.png'],
        ['code' => 'tr', 'short' => 'TR', 'name' => 'التركية', 'native' => 'Türkçe', 'flag' => 'https://flagcdn.com/w40/tr.png'],
        ['code' => 'zh', 'short' => 'ZH', 'name' => 'الصينية', 'native' => '简体中文', 'flag' => 'https://flagcdn.com/w40/cn.png'],

    ];

    $lightLogo = materialAsset('landing-page/img/logo2.webp');
    $darkLogo = materialAsset('landing-page/img/logo1.webp');

    $currentLanguage = $languages[0];
    foreach ($languages as $language) {
        if ($language['code'] === $currentLang) {
            $currentLanguage = $language;
            break;
        }
    }
    $features = [
        ['title' => 'غرف المحادثة', 'description' => 'تدرّب على التحدث بالإنجليزية مع طلاب آخرين عبر الإنترنت.', 'image' => materialAsset('landing-page/img/conversation-rooms.webp')],
        ['title' => 'مجموعات التدريب', 'description' => 'انضم إلى جلسات تدريب موجهة مع المدرسين كل أسبوع.', 'image' => materialAsset('landing-page/img/practice-groups.webp')],
        ['title' => 'مواد تعليمية للإنجليزية', 'description' => 'استفد من الدروس والمفردات والأنشطة التطبيقية.', 'image' => materialAsset('landing-page/img/english-materials.webp')],
        ['title' => 'مجتمع تعلّم عبر الإنترنت', 'description' => 'ابقَ متصلاً بالإنجليزية كل يوم.', 'image' => materialAsset('landing-page/img/online-community.webp')],
        ['title' => 'استخدمها من أي جهاز', 'description' => 'تدرّب من هاتفك أو جهازك اللوحي أو حاسوبك.', 'image' => materialAsset('landing-page/img/mobile-access.webp')],
        ['title' => 'حافظ على حماسك', 'description' => 'ابنِ ثقتك من خلال ممارسة التحدث بانتظام.', 'image' => materialAsset('landing-page/img/stay-motivated.webp')],

    ];
$students = [
    ['path' => '1-encrypted/1.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/1.webp'), 'name' => 'ندى', 'duration' => 'طالبة منذ 9 أشهر', 'city' => 'نيوجيرسي', 'country' => 'الولايات المتحدة', 'flag' => 'https://flagcdn.com/w40/us.png'],
    ['path' => '2-encrypted/2.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/2.webp'), 'name' => 'سارة', 'duration' => 'تتدرب منذ سنة', 'city' => 'تورونتو', 'country' => 'كندا', 'flag' => 'https://flagcdn.com/w40/ca.png'],
    ['path' => '3-encrypted/3.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/3.webp'), 'name' => 'محمد', 'duration' => 'طالب منذ 6 أشهر', 'city' => 'تكساس', 'country' => 'الولايات المتحدة', 'flag' => 'https://flagcdn.com/w40/us.png'],
    ['path' => '4-encrypted/4.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/4.webp'), 'name' => 'عبير', 'duration' => 'تتدرب منذ 4 أشهر', 'city' => 'نيويورك', 'country' => 'الولايات المتحدة', 'flag' => 'https://flagcdn.com/w40/us.png'],
    ['path' => '5.mov', 'thumbnail' => materialAsset('landing-page/img/thumbnails/5.webp'), 'name' => 'فاطمة', 'duration' => 'تتدرب منذ 5 أشهر', 'city' => 'نيس', 'country' => 'فرنسا', 'flag' => 'https://flagcdn.com/w40/fr.png'],
    ['path' => '7.mov', 'thumbnail' => materialAsset('landing-page/img/thumbnails/6.webp'), 'name' => 'سمير', 'duration' => 'يتدرب منذ 7 أشهر', 'city' => 'فرانكفورت', 'country' => 'ألمانيا', 'flag' => 'https://flagcdn.com/w40/de.png'],
    ['path' => '8.mov', 'thumbnail' => materialAsset('landing-page/img/thumbnails/8.webp'), 'name' => 'يوسف', 'duration' => 'يتدرب منذ 8 أشهر', 'city' => 'مدريد', 'country' => 'إسبانيا', 'flag' => 'https://flagcdn.com/w40/es.png'],
    ['path' => '9.mov', 'thumbnail' => materialAsset('landing-page/img/thumbnails/9.webp'), 'name' => 'إيما', 'duration' => 'تتدرب منذ 6 أشهر', 'city' => 'مونتريال', 'country' => 'كندا', 'flag' => 'https://flagcdn.com/w40/ca.png'],

];
    $reviews = [
        [
            'name' => 'Warda',
            'time' => 'منذ 3 أيام',
            'rating' => 5,
            'quote' => 'As usual, the session with Miss Lynda was great. I really appreciate her teaching style.',
        ],
        [
            'name' => 'Adil',
            'time' => 'منذ 3 أيام',
            'rating' => 5,
            'quote' => "أود أن أقول إن مركزكم ممتاز، والأستاذة نرجس أستاذة رائعة. تبذل مجهودًا كبيرًا لمساعدتي.",
        ],
        [
            'name' => 'Gamal',
            'time' => 'منذ أسبوع',
            'rating' => 5,
            'quote' => "الحصص دائما مع أ.عبدالجليل ممتازة .. بارك الله فيكم",
        ],
        [
            'name' => 'Oueslati',
            'time' => 'منذ شهر',
            'rating' => 5,
            'quote' => 'Everything is great! I had the first session with the instructor Yanis and he was very kind, gentle and always trying to help me.',
        ],
        [
            'name' => 'Yamina',
            'time' => 'منذ شهرين',
            'rating' => 5,
            'quote' => 'Miss Assala was a very supportive and encouraging teacher. She believed in me and helped me improve step by step.',
        ],
        [
            'name' => 'Marwa',
            'time' => 'منذ شهرين',
            'rating' => 5,
            'quote' => "J’avance bien. Miss Loujaine explique de façon facile et bonne. Merci pour vos efforts.",
        ],
        [
            'name' => 'Lama',
            'time' => 'منذ شهرين',
            'rating' => 5,
            'quote' => "كانت ممتازة ورائعة. والمدرسة دائماً تشعرني بالثقة في نفسي وتساعدني في تصحيح أخطائي بطريقة رائعة ومفيدة.",
        ],
        [
            'name' => 'Samira',
            'time' => 'منذ شهرين',
            'rating' => 5,
            'quote' => 'Your passion for teaching English truly shows in every lesson. You create a welcoming classroom environment where everyone feels valued and motivated.',
        ],
        [
            'name' => "عبدالعزيز",
            'time' => 'منذ سنة',
            'rating' => 5,
            'quote' => 'It was a great moment, I learnt a lot of things like new vocabulary, idioms and grammar. My listening skill improved also.',
        ],
    ];

    $countries = ['الولايات المتحدة', 'كندا', 'فرنسا', 'إسبانيا'];

    $phoneCountries = [
        ['name' => 'المغرب', 'code' => '+212', 'flag' => 'https://flagcdn.com/w40/ma.png'],
        ['name' => 'الهند', 'code' => '+91', 'flag' => 'https://flagcdn.com/w40/in.png'],
        ['name' => 'أفغانستان', 'code' => '+93', 'flag' => 'https://flagcdn.com/w40/af.png'],
        ['name' => 'الولايات المتحدة', 'code' => '+1', 'flag' => 'https://flagcdn.com/w40/us.png'],
        ['name' => 'ألمانيا', 'code' => '+49', 'flag' => 'https://flagcdn.com/w40/de.png'],
        ['name' => 'كندا', 'code' => '+1', 'flag' => 'https://flagcdn.com/w40/ca.png'],
        ['name' => 'السعودية', 'code' => '+966', 'flag' => 'https://flagcdn.com/w40/sa.png'],
        ['name' => 'الإمارات', 'code' => '+971', 'flag' => 'https://flagcdn.com/w40/ae.png'],
        ['name' => 'فرنسا', 'code' => '+33', 'flag' => 'https://flagcdn.com/w40/fr.png'],
        ['name' => 'إسبانيا', 'code' => '+34', 'flag' => 'https://flagcdn.com/w40/es.png'],
        ['name' => 'تركيا', 'code' => '+90', 'flag' => 'https://flagcdn.com/w40/tr.png'],
        ['name' => 'الصين', 'code' => '+86', 'flag' => 'https://flagcdn.com/w40/cn.png'],
        ['name' => 'المملكة المتحدة', 'code' => '+44', 'flag' => 'https://flagcdn.com/w40/gb.png'],
    ];
    $steps = [
        ['title' => 'انضم', 'description' => 'أنشئ حسابك واحصل على إمكانية الدخول إلى منطقة العضوية الخاصة بك.', 'tags' => ['دخول إلى الحساب', 'منطقة العضوية', 'الخطوات التالية واضحة']],
        ['title' => 'أجرِ اختبار تحديد المستوى', 'description' => 'أكمل اختبار تحديد المستوى عبر الإنترنت حتى نحدد مستواك من A1 إلى C1.', 'tags' => ['اختبار عبر الإنترنت', 'نتيجة المستوى', 'المجموعة المناسبة']],
        ['title' => 'اختر مجموعتك', 'description' => 'بعد ظهور نتيجتك، اختر حتى مجموعتين حسب مستواك وجدولك.', 'tags' => ['مجموعات حسب المستوى', 'اختر الجدول', 'حتى مجموعتين']],
        ['title' => 'ابدأ التدريب', 'description' => 'انضم إلى غرف المحادثة يوميًا، واحضر حصص المجموعات المباشرة، وتحسن كل يوم.', 'tags' => ['غرفة محادثة يومية', 'حصص جماعية مباشرة', 'تقدم أسبوعي']],
    ];
    $faqs = [
        ['question' => 'هل هذه حصة خاصة؟', 'answer' => 'لا. هذه عضوية للتدرب على الإنجليزية. تشمل غرف المحادثة، مجموعات التدريب، المواد التعليمية، والدخول إلى المجتمع. الحصص الخاصة منفصلة.'],
        ['question' => 'هل هذا مناسب للمبتدئين؟', 'answer' => 'نعم. يمكن للمبتدئين استخدام المواد والانضمام إلى مجموعات التدريب المناسبة. لا يحتاج الطلاب إلى القلق من التحدث بشكل مثالي.'],
        ['question' => 'هل يشارك المدرسون في مجموعات التدريب؟', 'answer' => 'نعم. مجموعات التدريب يقودها مدرسون، لكنها ليست مثل الدروس الخاصة. التركيز يكون على الممارسة والمواضيع والمفردات والثقة.'],
        ['question' => 'هل يمكنني الترقية لاحقًا؟', 'answer' => 'نعم. إذا أردت مدرسًا ثابتًا، أو دروسًا خاصة، أو حصصًا في مجموعات صغيرة، أو تصحيح الواجبات، أو خطة منظمة، يمكنك الترقية لاحقًا.'],
        ['question' => 'هل يمكنني الإلغاء في أي وقت؟', 'answer' => 'نعم. العضوية شهرية ومرنة.'],
        ['question' => 'هل الحصة التجريبية مجانية حقًا؟', 'answer' => 'نعم، في Boston English Center الحصة التجريبية مجانية 100%، بدون أي التزام بالاستمرار بعدها.'],
        ['question' => 'ماذا يحدث بعد الحصة التجريبية؟', 'answer' => 'خطوة بخطوة بعد الحصة التجريبية:<br><br>ستحصل على ملاحظات<br><br>ستصلك ملاحظات من المدرس عن مستواك ونقاط قوتك والجوانب التي تحتاج إلى تحسين، بالإضافة إلى شهادة مستوى مجانية.'],
        ['question' => 'هل المدرسون ناطقون أصليون؟', 'answer' => 'في Boston English Center، معظم مدرسينا مؤهلون بدرجة عالية ويتحدثون لغتين، ومتخصصون في تعليم الإنجليزية للطلاب الناطقين بالعربية.'],
        ['question' => 'كيف أحدد مواعيد الحصص؟', 'answer' => 'بعد الدفع، سيتواصل معك أحد مستشارينا عبر واتساب أو البريد الإلكتروني لمساعدتك في اختيار أفضل وقت وربطك بالمجموعة أو المدرس المناسب.'],
        ['question' => 'ما الفئات العمرية التي تدرسونها؟', 'answer' => 'نعلّم الأطفال قبل سن المراهقة، والمراهقين، والبالغين. يتم تقسيم الطلاب حسب العمر والمستوى لضمان أفضل تجربة تعلم.'],
        ['question' => 'كيف أعرف مستواي في الإنجليزية؟', 'answer' => 'يمكنك إجراء اختبار تحديد المستوى المجاني عبر الإنترنت والحصول على شهادة مستوى فورًا. كما يمكن للمدرس تقييم مهارة التحدث لديك أثناء الحصة التجريبية.'],
        ['question' => 'كم تستغرق مدة الدورة؟', 'answer' => 'تم تصميم كل مستوى في الإنجليزية ليكتمل خلال 3 أشهر. يحضر معظم الطلاب من حصتين إلى 3 حصص أسبوعيًا، مدة كل حصة ساعة واحدة.'],
        ['question' => 'هل يمكنني أن أصبح طليقًا في الإنجليزية؟', 'answer' => 'نعم. مع الممارسة المنتظمة والدروس المنظمة وجلسات التحدث، يصل كثير من الطلاب إلى طلاقة قوية خلال 9 إلى 12 شهرًا.'],
    ];
@endphp
        <!DOCTYPE html>
<html lang="{{ $currentLang }}" dir="rtl" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Boston English Center</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        (() => {
            const storedTheme = localStorage.getItem('theme') || localStorage.getItem('color-theme') || localStorage.getItem('darkMode');
            const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            const shouldUseDark = storedTheme === 'dark' || storedTheme === 'true' || (!storedTheme && prefersDark);
            document.documentElement.classList.toggle('dark', shouldUseDark);
        })();

        window.tailwind = window.tailwind || {};
        window.tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Noto Kufi Arabic', 'Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        display: ['Noto Kufi Arabic', 'Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        cream: '#f8fbff',
                        creamSoft: '#eff6ff',
                        clay: '#1d4ed8',
                        clayDark: '#1e3a8a',
                        cocoa: '#0f172a',
                        ink: '#0f172a',
                    },
                    boxShadow: {
                        soft: '0 18px 45px rgba(15, 23, 42, .10)',
                        card: '0 12px 30px rgba(15, 23, 42, .07)',
                    },
                }
            }
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    @vite(['resources/js/app.js'])
    @vite('resources/css/telCustoms.css')
    <style>
        [dir="rtl"] .rtl-rotate-y-180 {
            transform: rotateY(180deg);
        }
        .iti--allow-dropdown input.iti__tel-input, .iti--allow-dropdown input.iti__tel-input[type=text], .iti--allow-dropdown input.iti__tel-input[type=tel], .iti--show-selected-dial-code input.iti__tel-input, .iti--show-selected-dial-code input.iti__tel-input[type=text], .iti--show-selected-dial-code input.iti__tel-input[type=tel]
        Specificity
        {
            padding-left: 63px !important;

        }

        [dir=rtl]  .iti--allow-dropdown .iti__flag-container, [dir=rtl] .iti--show-selected-dial-code .iti__flag-container {
            right: auto;
            left: 0;
        }
        #phone, #membership-phone {
            padding-left: 71px !important;
            direction: ltr;
            text-align: left;
            unicode-bidi: plaintext;
        }
    </style>
    <meta name="iso_code" content="{{\Torann\GeoIP\Facades\GeoIP::getLocation(request()->ip())['iso_code']}}">

    <style>
        [x-cloak] { display: none !important; }
        details summary::-webkit-details-marker { display: none; }

        body {
            text-rendering: geometricPrecision;
        }
        h1, h2, h3, .font-display {
            letter-spacing: -0.025em;
        }
        [dir="rtl"] h1, [dir="rtl"] h2, [dir="rtl"] h3, [dir="rtl"] .font-display {
            letter-spacing: 0;
        }

        .bec-dot-bg {
            position: relative;
            isolation: isolate;
        }
        .bec-dot-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -2;
            pointer-events: none;
            background-image: radial-gradient(rgba(37, 99, 235, .34) 1px, transparent 1.2px);
            background-size: 22px 22px;
            opacity: .26;
            mask-image: radial-gradient(circle at 50% 18%, black 0%, transparent 70%);
        }
        .dark .bec-dot-bg::before {
            background-image: radial-gradient(rgba(148, 163, 184, .48) .9px, transparent 1.2px);
            opacity: .18;
        }
        .bec-dot-bg::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            pointer-events: none;
            background:
                    radial-gradient(circle at 15% 12%, rgba(59, 130, 246, .16), transparent 26rem),
                    radial-gradient(circle at 85% 18%, rgba(14, 165, 233, .13), transparent 28rem),
                    linear-gradient(180deg, rgba(255,255,255,.42), rgba(255,255,255,0));
        }
        .dark .bec-dot-bg::after {
            background:
                    radial-gradient(circle at 15% 12%, rgba(59, 130, 246, .18), transparent 26rem),
                    radial-gradient(circle at 85% 18%, rgba(14, 165, 233, .10), transparent 28rem),
                    linear-gradient(180deg, rgba(255,255,255,.035), rgba(255,255,255,0));
        }
        .bec-premium-card {
            position: relative;
            overflow: hidden;
        }
        .bec-premium-card::before {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            background: linear-gradient(135deg, rgba(255,255,255,.66), transparent 42%);
            opacity: .7;
        }
        .dark .bec-premium-card::before {
            background: linear-gradient(135deg, rgba(255,255,255,.08), transparent 46%);
            opacity: 1;
        }
    </style>
</head>

<body id="top" x-data="{ openMenu: false, desktopLangMenu: false, floatingLangMenu: false }" class="min-h-screen overflow-x-hidden bg-[radial-gradient(circle_at_0_0,rgba(37,99,235,.12),transparent_30rem),radial-gradient(circle_at_100%_8rem,rgba(14,165,233,.12),transparent_28rem),linear-gradient(180deg,#f8fbff_0%,#eef6ff_44%,#ffffff_100%)] font-sans text-[#0f172a] antialiased selection:bg-[#2563eb] selection:text-white dark:bg-[radial-gradient(circle_at_50%_0,rgba(59,130,246,.18),transparent_30rem),radial-gradient(circle_at_100%_18rem,rgba(14,165,233,.10),transparent_28rem),linear-gradient(180deg,#020617_0%,#071326_48%,#020617_100%)] dark:text-[#f8fafc]">
<header class="sticky top-0 z-50 border-b border-[#dbeafe]/80 bg-white/90 text-[#0f172a] shadow-[0_10px_34px_rgba(15,23,42,.07)] backdrop-blur-2xl dark:border-white/10 dark:bg-[#05070d]/95 dark:text-white dark:shadow-[0_18px_50px_rgba(0,0,0,.22)]">
    <nav class="mx-auto flex min-h-[76px] max-w-[1320px] items-center justify-between gap-3 px-4 sm:px-6 xl:px-0" aria-label="Main navigation">
        <a href="{{ route('landingPage', ['lang' => $currentLang]) }}" class="flex min-w-0 items-center">
            <img src="{{ $lightLogo }}" alt="Boston English Center" width="150" height="54" class="h-9 w-auto object-contain dark:hidden">
            <img src="{{ $darkLogo }}" alt="Boston English Center" width="150" height="54" class="hidden h-9 w-auto object-contain dark:block">
        </a>

        <div dir="rtl" class="hidden items-center gap-1 xl:flex">
            <a href="{{ route('landingPage', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">الرئيسية</a>
            <a href="{{ route('contactUs', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">مجاني للأيتام</a>
            <a href="{{ route('booking.index', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">احجز حصة تجريبية</a>
            <a href="{{ route('placementTest.index', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">اختبار تحديد المستوى</a>
            <a href="{{ route('team') }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">فريقنا</a>
            <a href="{{ route('login') }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">تسجيل الدخول</a>
        </div>

        <div class="flex items-center gap-2">
            <div class="relative hidden sm:block" @click.outside="desktopLangMenu = false">
                <button type="button" @click="desktopLangMenu = !desktopLangMenu; openMenu = false; floatingLangMenu = false" :aria-expanded="desktopLangMenu.toString()" aria-controls="language-menu" class="inline-flex h-10 items-center gap-2 rounded-full border border-[#dbeafe] bg-white px-3 text-sm font-semibold text-[#1e3a8a] shadow-sm transition hover:bg-[#eff6ff] active:bg-[#dbeafe] dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15 dark:active:bg-white/10">
                    <img width="24" height="18" src="{{ $currentLanguage['flag'] }}" loading="lazy" alt="{{ $currentLanguage['name'] }}" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]">
                    <span class="hidden sm:inline">{{ $currentLanguage['native'] }}</span>
                    <svg class="h-3.5 w-3.5 transition" :class="desktopLangMenu ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="m6 9 6 6 6-6" /></svg>
                </button>
                <div id="language-menu" hidden x-show="desktopLangMenu" x-bind:hidden="!desktopLangMenu" x-transition class="absolute {{ $currentLang === 'ar' ? 'left-0' : 'right-0' }} z-50 mt-3 w-56 overflow-hidden rounded-[22px] border border-[#bfdbfe] bg-[#f8fbff] p-2 shadow-soft dark:border-white/10 dark:bg-[#0f172a]">
                    @foreach($languages as $language)
                        <a href="{{ route($languageRoute, array_merge($currentRouteParams, ['lang' => $language['code']])) }}" class="flex items-center gap-3 rounded-2xl px-3 py-2.5 text-sm font-semibold text-[#1e293b] transition hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">
                            <img width="24" height="18" src="{{ $language['flag'] }}" loading="lazy" alt="{{ $language['name'] }}" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]"><span>{{ $language['native'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            <a href="#membership-section" class="inline-flex min-h-11 shrink-0 items-center justify-center whitespace-nowrap rounded-full bg-gradient-to-r from-[#1d4ed8] via-[#2563eb] to-[#3b82f6] px-4 text-[14px] font-semibold text-white shadow-[0_12px_24px_rgba(37,99,235,.24)] transition hover:-translate-y-0.5 hover:from-[#1e40af] hover:via-[#1d4ed8] hover:to-[#2563eb] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:bg-white dark:bg-none dark:text-[#020617] dark:shadow-[0_18px_40px_rgba(255,255,255,.12)] dark:hover:bg-[#eaf3ff] dark:focus:ring-white/20 min-[380px]:px-5 min-[380px]:text-[15px] sm:px-6 sm:text-[17px]">اشترك الآن</a>
            <button type="button" @click="openMenu = !openMenu; desktopLangMenu = false; floatingLangMenu = false" :aria-expanded="openMenu.toString()" aria-controls="mobile-navigation" aria-label="فتح أو إغلاق القائمة" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-[#dbeafe] bg-white text-[#1e3a8a] shadow-sm transition hover:bg-[#eff6ff] active:bg-[#dbeafe] dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15 dark:active:bg-white/10 xl:hidden">
                <svg x-show="!openMenu" x-bind:hidden="openMenu" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 7h16M4 12h16M4 17h16" /></svg>
                <svg hidden x-show="openMenu" x-bind:hidden="!openMenu" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18 18 6M6 6l12 12" /></svg>
            </button>
        </div>
    </nav>

    <div id="mobile-navigation" hidden x-show="openMenu" x-bind:hidden="!openMenu" x-transition class="max-h-[calc(100vh-76px)] overflow-y-auto border-t border-[#dbeafe] bg-white px-4 py-5 shadow-xl dark:border-slate-800 dark:bg-slate-950 xl:hidden">
        <div dir="rtl" class="mx-auto grid max-w-[1320px] gap-3">
            <a href="{{ route('landingPage', ['lang' => $currentLang]) }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">الرئيسية</a>
            <a href="{{ route('contactUs', ['lang' => $currentLang]) }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">مجاني للأيتام</a>
            <a href="{{ route('booking.index', ['lang' => $currentLang]) }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">احجز حصة تجريبية</a>
            <a href="{{ route('placementTest.index', ['lang' => $currentLang]) }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">اختبار تحديد المستوى</a>
            <a href="{{ route('team') }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">فريقنا</a>
            <a href="#membership-section" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="mt-2 inline-flex min-h-12 items-center justify-center rounded-full bg-gradient-to-r from-[#1d4ed8] via-[#2563eb] to-[#3b82f6] px-7 text-base font-semibold text-white shadow-[0_12px_24px_rgba(37,99,235,.24)] transition hover:-translate-y-0.5 hover:from-[#1e40af] hover:via-[#1d4ed8] hover:to-[#2563eb] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:focus:ring-white/10">اشترك الآن</a>
            <div class="mt-2 grid gap-3 sm:grid-cols-2">
                <a href="tel:+16178482317" dir="ltr" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#bfdbfe] bg-[#eff6ff] px-5 text-base font-semibold text-[#1e3a8a] shadow-sm transition hover:-translate-y-0.5 hover:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/10 dark:focus:ring-white/10 [unicode-bidi:isolate]">+1 617-848-2317</a>
                <a href="{{ route('login') }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#bfdbfe] bg-white px-5 text-base font-semibold text-[#1e3a8a] shadow-sm transition hover:-translate-y-0.5 hover:bg-[#eff6ff] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/10 dark:focus:ring-white/10">تسجيل الدخول</a>
            </div>
        </div>
    </div>
</header>

<div class="fixed left-4 top-[88px] z-[60] sm:hidden" @click.outside="floatingLangMenu = false">
    <button type="button" @click="floatingLangMenu = !floatingLangMenu; openMenu = false; desktopLangMenu = false" :aria-expanded="floatingLangMenu.toString()" aria-controls="floating-language-menu" class="flex h-12 items-center gap-2 rounded-full border border-blue-100 bg-white px-3 text-base font-semibold text-[#0b2a5b] shadow-[0_16px_34px_rgba(15,23,42,.18)] transition active:scale-95 dark:border-white/10 dark:bg-[#0b1220] dark:text-white">
        <img width="24" height="18" src="{{ $currentLanguage['flag'] }}" loading="lazy" alt="{{ $currentLanguage['name'] }}" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]">
        <span>{{ $currentLanguage['short'] }}</span>
        <svg class="h-3.5 w-3.5 transition" :class="floatingLangMenu ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="m6 9 6 6 6-6" /></svg>
    </button>
    <div id="floating-language-menu" hidden x-show="floatingLangMenu" x-bind:hidden="!floatingLangMenu" x-transition class="absolute left-0 top-14 w-52 overflow-hidden rounded-[22px] border border-blue-100 bg-white p-2 shadow-[0_20px_50px_rgba(15,23,42,.24)] dark:border-white/10 dark:bg-[#0b1220]">
        @foreach($languages as $language)
            <a href="{{ route($languageRoute, array_merge($currentRouteParams, ['lang' => $language['code']])) }}" class="flex items-center gap-3 rounded-2xl px-3 py-2.5 text-sm font-semibold text-[#0b2a5b] transition hover:bg-[#eff6ff] dark:text-white dark:hover:bg-white/10">
                <img width="24" height="18" src="{{ $language['flag'] }}" loading="lazy" alt="{{ $language['name'] }}" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]"><span>{{ $language['native'] }}</span>
            </a>
        @endforeach
    </div>
</div>

<main class="flex flex-col">
    <!-- HERO -->
    <section class="order-1 bec-dot-bg relative overflow-hidden bg-[#eef7ff] px-5 pb-16 pt-20 text-[#071326] dark:bg-[#040814] dark:text-white sm:px-6 lg:pb-24 lg:pt-28">
        <div class="absolute inset-x-0 top-0 h-24 bg-gradient-to-b from-white/70 to-transparent dark:from-white/[.04]"></div>
        <div class="mx-auto flex max-w-[1320px] flex-col items-center">
            <div class="relative z-10 mx-auto max-w-[860px] text-start sm:text-center">

                <h1 class="font-display mx-0 w-full max-w-[960px] text-start text-[38px] font-bold leading-[1.28] tracking-[-0.02em] [text-wrap:balance] [word-spacing:0.02em] text-[#001d44] dark:text-white min-[380px]:text-[42px] min-[460px]:text-[48px] sm:mx-auto sm:text-center sm:text-[64px] lg:text-[76px] xl:text-[82px]">تدرّب على الإنجليزية <span class="block text-[1.14em] leading-[1.12] text-[#1d4ed8] dark:text-[#60a5fa]">كل يوم</span></h1>
                <p class="mx-0 mt-6 max-w-[680px] text-start text-[18px] font-medium leading-[1.75] text-[#334155] dark:text-[#dbeafe] sm:mx-auto sm:text-center sm:text-xl lg:text-[21px]">انضم إلى غرف محادثة مباشرة، ومجموعات تدريب، وأنشطة إنجليزية تفاعلية مقابل <strong class="text-[#071326] dark:text-white">35 دولارًا فقط شهريًا.</strong></p>                <div class="mt-8 flex flex-col justify-start gap-3 sm:flex-row sm:justify-center">
                    <a href="#membership-section" class="inline-flex min-h-14 items-center justify-center rounded-full bg-[#071326] px-8 text-[17px] font-semibold text-white shadow-[0_18px_40px_rgba(15,23,42,.16)] transition hover:-translate-y-0.5 hover:bg-[#0f172a] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:bg-white dark:text-[#020617] dark:shadow-[0_18px_40px_rgba(255,255,255,.12)] dark:hover:bg-[#eaf3ff] dark:focus:ring-white/20">اشترك الآن</a>
                    <a href="#platform-preview" class="hidden min-h-14 items-center justify-center rounded-full border border-[#bfdbfe] bg-white/80 px-7 text-[17px] font-semibold text-[#1e3a8a] shadow-sm transition hover:-translate-y-0.5 hover:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 dark:border-white/15 dark:bg-white/10 dark:text-white dark:hover:bg-white/15 dark:focus:ring-white/10 sm:inline-flex">شاهد كيف تعمل المنصة</a>
                </div>
                <p class="mx-0 mt-6 max-w-[620px] text-start text-[17px] font-medium leading-[1.75] text-[#1d4ed8] dark:text-[#93c5fd] sm:mx-auto sm:text-center sm:text-lg"><span>تدرّب على التحدث بالإنجليزية كل يوم مع أشخاص حقيقيين وبسعر مناسب</span></p>
            </div>
            <div class="relative z-10 mx-auto mt-10 w-full max-w-[860px] sm:mt-12 xl:max-w-[920px]">
                <div class="relative rounded-[28px] border border-[#bfdbfe] bg-white/80 p-2 shadow-[0_30px_90px_rgba(30,64,175,.14)] backdrop-blur-xl dark:border-white/15 dark:bg-white/10 dark:shadow-[0_30px_90px_rgba(30,64,175,.18)]">
                    <img src="{{ materialAsset('landing-page/img/hero.webp') }}" alt="طلاب يمارسون الإنجليزية عبر الإنترنت" class="aspect-[16/9] w-full rounded-[22px] object-cover">
                    <div class="absolute -bottom-5 left-4 rounded-[22px] border border-blue-200/25 bg-[#061b3a]/55 px-5 py-4 text-white shadow-[0_20px_48px_rgba(30,64,175,.30)] backdrop-blur-xl [text-shadow:0_1px_12px_rgba(0,0,0,.42)] dark:border-blue-100/15 dark:bg-[#061b3a]/45 lg:bottom-auto lg:left-5 lg:top-5">
                        <strong class="block text-4xl font-bold leading-none">500+</strong>
                        <span class="mt-1 block max-w-[175px] text-[13px] font-bold leading-5 text-white/90">طالب يتدربون معنا على الإنجليزية كل يوم</span>
                    </div>
                </div>
            </div>
        </div>  
    </section>  

    <!-- FEATURES -->
    <section class="order-4 bec-dot-bg relative overflow-hidden bg-[#f3f8ff] px-5 py-16 dark:bg-[#020617] sm:px-6 lg:py-24">
        <div class="mx-auto max-w-[1320px]">
            <div class="mx-auto max-w-[860px] text-start sm:text-center">
                <h2 class="font-display mx-0 max-w-[980px] text-start text-[34px] font-bold leading-[1.28] tracking-[-0.03em] [text-wrap:balance] [word-spacing:0.03em] text-[#001d44] dark:text-white min-[380px]:text-[36px] sm:mx-auto sm:text-center sm:text-[44px] lg:text-[52px]">كل ما تحتاجه لتتحدث الإنجليزية بثقة</h2>
                <p class="mx-0 mt-5 max-w-3xl text-start text-[18px] font-medium leading-[1.75] text-[#475569] sm:mx-auto sm:text-center sm:text-xl sm:leading-[1.75] lg:text-[21px] dark:text-[#cbd5e1]">مصممة لتساعدك على التحدث بالإنجليزية بانتظام.</p>
            </div>

            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:gap-6">
                @foreach($features as $feature)
                    <article class="relative flex h-full items-start gap-3 rounded-[18px] border border-[#bfdbfe]/70 bg-white/80 p-5 shadow-sm lg:p-6 dark:border-white/10 dark:bg-white/[.045]">
                        <span class="mt-1 shrink-0 text-lg font-bold leading-none text-[#1d4ed8] dark:text-[#93c5fd]">
                            &#10003;
                        </span>
                        <div class="relative z-10 min-w-0">
                            <h3 class="text-xl font-bold leading-[1.25] tracking-[-0.01em] text-[#001d44] dark:text-white sm:text-[22px]">{{ $feature['title'] }}</h3>
                            <p class="mt-2 text-[17px] font-medium leading-[1.65] text-[#475569] dark:text-[#dbeafe] sm:text-lg">{{ $feature['description'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- STUDENTS -->
    <section class="order-2 bec-dot-bg relative overflow-hidden bg-white px-5 py-16 text-[#0f172a] dark:bg-[#020617] dark:text-white sm:px-6 lg:py-24">
        <div class="mx-auto max-w-[1320px]">
            <div class="mx-auto max-w-[860px] text-start sm:text-center">
                <h2 class="font-display mx-0 max-w-[980px] text-start text-[34px] font-bold leading-[1.28] tracking-[-0.03em] [text-wrap:balance] [word-spacing:0.03em] text-[#001d44] dark:text-white min-[380px]:text-[36px] sm:mx-auto sm:text-center sm:text-[44px] lg:text-[52px]">طلاب حقيقيون. تقدّم حقيقي</h2>
                <p class="mx-0 mt-5 max-w-3xl text-start text-[18px] font-medium leading-[1.75] text-[#475569] sm:mx-auto sm:text-center sm:text-xl sm:leading-[1.75] lg:text-[21px] dark:text-[#cbd5e1]">شاهد كيف يساعد التدريب المنتظم طلاب مركز بوسطن لتعليم اللغة الإنجليزية على التحدث بثقة أكبر مع مرور الوقت</p>
            </div>

            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4 xl:gap-6 xl:gap-6">
                @foreach($students as $student)
                    <article data-video-card class="relative mx-auto aspect-[4/5] w-full max-w-[360px] overflow-hidden rounded-[28px] lg:max-w-[315px] xl:max-w-[330px] bg-[#111827] shadow-[0_22px_46px_rgba(15,23,42,.22)] dark:shadow-[0_22px_46px_rgba(0,0,0,.35)] sm:aspect-[3/4]">
                        {{--                        <video class="absolute inset-0 h-full w-full object-cover" playsinline preload="none" poster="{{ $student['thumbnail'] }}" data-hls-src="https://material-media.s3.us-east-1.amazonaws.com/landing-page/videos/{{ $student['path'] }}"></video>--}}
                        <video class="absolute inset-0 h-full w-full object-cover" playsinline preload="none" poster="{{ $student['thumbnail'] }}" data-hls-src="{{materialAsset("landing-page/videos/".$student['path'])  }}"></video>
                        <div class="absolute inset-0 bg-gradient-to-b from-black/10 via-transparent to-black/80"></div>
                        <div data-video-overlay class="absolute inset-0 transition duration-300">
                            <button type="button" data-play-video aria-label="تشغيل فيديو {{ $student['name'] }}" class="absolute left-1/2 top-1/2 grid h-14 w-14 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full border border-white/40 bg-white/40 text-white shadow-lg backdrop-blur-md transition hover:scale-105 hover:bg-white/50">
                                <svg data-play-icon class="ml-0.5 h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                                <svg data-pause-icon class="hidden h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M7 5h4v14H7zm6 0h4v14h-4z"/></svg>
                            </button>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 p-5">
                            <h3 class="text-[22px] font-bold leading-[1.2] tracking-[-0.005em] text-white sm:text-2xl">{{ $student['name'] }}</h3>
                            <p class="mt-1 text-[16px] font-semibold text-white/85">{{ $student['duration'] }}</p>
                            <div class="mt-3 inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-2 text-[14px] font-semibold text-white backdrop-blur-md sm:text-base">
                                <img src="{{ $student['flag'] }}" alt="علم {{ $student['country'] }}" loading="lazy" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]"><span>{{ $student['city'] }}, {{ $student['country'] }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- REVIEWS -->
    <section class="order-3 bec-dot-bg relative overflow-hidden bg-[#f4f9ff] px-5 py-16 dark:bg-[#071326] sm:px-6 lg:py-24">
        <div class="mx-auto max-w-[1320px]">
            <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end xl:gap-12">
                <div>
                    <h2 class="font-display mx-0 max-w-[980px] text-start text-[32px] font-bold leading-[1.28] tracking-[-0.03em] [text-wrap:balance] [word-spacing:0.03em] text-[#001d44] dark:text-white min-[380px]:text-[34px] sm:mx-auto sm:text-center sm:text-[44px] lg:mx-0 lg:text-start lg:text-[52px]">آلاف المتعلمين حول العالم يثقون بنا</h2>
                    <p class="mx-0 mt-5 max-w-3xl text-start text-[18px] font-medium leading-[1.75] text-[#475569] sm:mx-auto sm:text-center sm:text-xl sm:leading-[1.75] lg:text-[21px] dark:text-[#cbd5e1] lg:mx-0 lg:text-start">تقييم <strong class="text-[#1d4ed8] dark:text-[#93c5fd]">4.9/5</strong> من أكثر من <strong class="text-[#0f172a] dark:text-white">3,876 متعلمًا</strong> في أمريكا وكندا ودول الخليج.</p>                </div>
                <div class="bec-premium-card rounded-[28px] border border-[#bfdbfe] bg-white/90 p-5 text-center lg:p-6 shadow-[0_18px_44px_rgba(15,23,42,.08)] backdrop-blur-xl dark:border-white/10 dark:bg-white/[.06]">
                    <div class="text-[72px] font-bold leading-[0.85] tracking-[-.09em] text-[#0f172a] dark:text-white">4.9</div>
                    <div class="mt-3 flex justify-center gap-1">
                        @for($i = 0; $i < 5; $i++)<span class="grid h-6 w-6 place-items-center rounded-md bg-[#00b67a] text-xs text-white">★</span>@endfor
                    </div>
                    <p class="mt-2 text-sm font-normal text-[#64748b] dark:text-[#cbd5e1]">بناءً على تقييمات الطلاب</p>
                </div>
            </div>
            <div class="mt-10 grid gap-5 lg:grid-cols-3 xl:gap-6">
                @foreach($reviews as $review)
                    @php
                        $hasArabic = preg_match('/\p{Arabic}/u', $review['quote']);
                    @endphp
                    <article class="bec-premium-card rounded-[28px] border border-[#bfdbfe] bg-white/90 p-5 shadow-[0_16px_42px_rgba(15,23,42,.07)] lg:p-6 backdrop-blur-xl transition hover:-translate-y-1 hover:border-[#93c5fd] hover:shadow-[0_24px_54px_rgba(30,64,175,.12)] dark:border-white/10 dark:bg-white/[.06]">
                        <div class="flex items-start gap-3">
                            <div class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-[#eaf3ff] text-lg font-bold uppercase text-[#1d4ed8] shadow-[0_10px_22px_rgba(37,99,235,.10)] ring-1 ring-[#bfdbfe] dark:bg-blue-400/15 dark:text-blue-100 dark:shadow-[0_10px_24px_rgba(37,99,235,.16)] dark:ring-blue-300/25">
                                {{ mb_strtoupper(mb_substr($review['name'], 0, 1)) }}
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="flex flex-wrap items-start justify-between gap-x-3 gap-y-1">
                                    <div>
                                        <strong class="block text-lg font-bold leading-[1.25] tracking-[-0.005em] text-[#0f172a] dark:text-white sm:text-[22px]">{{ $review['name'] }}</strong>
                                    </div>
                                    <span class="text-[13px] font-semibold text-[#94a3b8] dark:text-[#cbd5e1]/75 sm:text-sm">{{ $review['time'] }}</span>
                                </div>
                                <div class="mt-3 flex gap-1 text-[#facc15]" aria-label="{{ $review['rating'] }} من 5 نجوم">
                                    @for($i = 0; $i < $review['rating']; $i++)
                                        <span class="text-xl leading-none">★</span>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p dir="{{ $hasArabic ? 'rtl' : 'ltr' }}" class="mt-5 text-[17px] font-medium italic leading-[1.75] text-[#475569] sm:text-lg dark:text-[#e2e8f0] {{ $hasArabic ? 'text-right' : 'text-left' }}">“{{ $review['quote'] }}”</p>
                    </article>
                @endforeach
            </div>
            <div class="mt-8 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="flex w-full flex-nowrap justify-center gap-1 sm:w-auto sm:flex-wrap sm:justify-start sm:gap-2">
                    @foreach($countries as $country)
                        <span class="whitespace-nowrap rounded-full border border-blue-200 bg-blue-50/90 px-2.5 py-2 text-[10px] font-semibold uppercase tracking-[.04em] text-[#0b2a5b] shadow-sm shadow-blue-950/5 dark:border-blue-400/20 dark:bg-blue-400/10 dark:text-blue-100 min-[380px]:px-3 min-[380px]:text-[10.5px] sm:px-3.5 sm:py-2.5 sm:text-[13px] sm:tracking-[.08em]">{{ $country }}</span>
                    @endforeach
                </div>
                <a href="{{ route('landingReviews', ['lang' => $currentLang]) }}" class="inline-flex min-h-12 items-center justify-center rounded-full bg-gradient-to-r from-[#1d4ed8] via-[#2563eb] to-[#3b82f6] px-7 text-base font-semibold text-white shadow-[0_12px_24px_rgba(37,99,235,.24)] transition hover:-translate-y-0.5 hover:from-[#1e40af] hover:via-[#1d4ed8] hover:to-[#2563eb] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:focus:ring-white/10">عرض كل التقييمات</a>
            </div>
        </div>
    </section>

    <!-- STEPS -->
    <section id="how-it-works" class="order-5 bec-dot-bg relative overflow-hidden bg-white px-5 py-16 text-[#0f172a] dark:bg-[#071326] dark:text-white sm:px-6 lg:py-24">
        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-blue-200 to-transparent dark:via-blue-300/40"></div>
        <div class="mx-auto max-w-[1320px]">
            <div class="mx-auto max-w-[860px] text-start sm:text-center">

                <h2 class="font-display mx-0 mt-5 max-w-[980px] text-start text-[36px] font-bold leading-[1.28] tracking-[-0.03em] [text-wrap:balance] [word-spacing:0.03em] text-[#001d44] dark:text-white min-[380px]:text-[38px] sm:mx-auto sm:text-center sm:text-[44px] lg:text-[52px]">خطوات واضحة قبل أن تبدأ</h2>
                <p class="mx-0 mt-5 max-w-3xl text-start text-[18px] font-medium leading-[1.75] text-[#475569] dark:text-blue-100/80 sm:mx-auto sm:text-center sm:text-xl sm:leading-[1.75] lg:text-[21px]">اعرف بالضبط ما الذي سيحدث بعد الانضمام، بدون ارتباك أو انتظار أو حاجة للتواصل مع الدعم لمعرفة الخطوة التالية</p>
            </div>

            <div class="relative mt-10 grid gap-5 pl-9 before:absolute before:bottom-8 before:left-4 before:top-8 before:w-px before:bg-[#cbd5e1] dark:before:bg-white/25 sm:grid-cols-2 sm:pl-0 sm:before:hidden lg:grid-cols-4">
                @foreach($steps as $index => $step)
                    <article class="relative flex h-full flex-col rounded-[24px] border border-[#bfdbfe]/80 bg-white/90 p-5 shadow-sm sm:p-6 dark:border-white/10 dark:bg-white/[.055]">
                        <div class="absolute -left-[42px] top-6 grid h-8 w-8 place-items-center rounded-full bg-[#071326] text-sm font-bold text-white shadow-[0_8px_20px_rgba(15,23,42,.18)] ring-4 ring-white dark:bg-white dark:text-[#071326] dark:ring-[#071326] sm:hidden">{{ $index + 1 }}</div>
                        <div class="relative z-10 flex h-full flex-col">
                            <div class="flex items-center justify-between gap-3">
                                <span class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-50 px-3.5 py-2 text-[12px] font-semibold uppercase tracking-[.1em] text-[#1d4ed8] dark:border-blue-300/20 dark:bg-blue-400/10 dark:text-blue-100">
                                    <span class="h-2 w-2 rounded-full bg-[#2563eb] shadow-[0_0_0_4px_rgba(37,99,235,.12)]"></span>
                                    الخطوة {{ $index + 1 }}
                                </span>
                            </div>
                            <h3 class="mt-5 text-[24px] font-bold leading-[1.3] tracking-[-0.02em] text-[#001d44] dark:text-white sm:text-[24px]">{{ $step['title'] }}</h3>
                            <p class="mt-4 text-[17px] font-medium leading-[1.7] text-[#475569] sm:text-lg dark:text-[#dbeafe]">{{ $step['description'] }}</p>
                            <div class="mt-auto flex flex-wrap gap-2 pt-6">
                                @foreach($step['tags'] as $tag)
                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-blue-200 bg-blue-50/80 px-3 py-1.5 text-[13px] font-semibold text-[#1e3a8a] dark:border-blue-300/15 dark:bg-white/[.08] dark:text-blue-50">
                                        <span class="text-[#2563eb] dark:text-[#93c5fd]">&#10003;</span>{{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PLATFORM PREVIEW -->
    <section id="platform-preview" class="order-6 bec-dot-bg relative overflow-hidden bg-[#eef7ff] px-5 py-16 text-[#0f172a] dark:bg-[#0b1220] dark:text-white sm:px-6 lg:py-24">
        <div class="mx-auto max-w-[1320px] text-start sm:text-center">
            <h2 class="font-display mx-0 max-w-[980px] text-start text-[36px] font-bold leading-[1.28] tracking-[-0.03em] [text-wrap:balance] [word-spacing:0.03em] text-[#001d44] dark:text-white min-[380px]:text-[38px] sm:mx-auto sm:text-center sm:text-[44px] lg:text-[52px]">شاهد المنصة من الداخل</h2>
            <p class="mx-0 mt-5 max-w-3xl text-start text-[18px] font-medium leading-[1.75] text-[#475569] sm:mx-auto sm:text-center sm:text-xl sm:leading-[1.75] lg:text-[21px] dark:text-[#cbd5e1]">شاهد كيف يتدرب الطلاب على الإنجليزية عبر الإنترنت.</p>
            <article data-video-card class="relative mx-auto mt-10 aspect-square max-w-[620px] overflow-hidden rounded-[28px] border border-[#bfdbfe] bg-white/80 p-2 shadow-[0_28px_70px_rgba(30,64,175,.14)] backdrop-blur-xl dark:border-white/10 dark:bg-white/[.055] dark:shadow-[0_28px_80px_rgba(0,0,0,.34)] sm:aspect-video sm:max-w-[920px] xl:max-w-[1020px]">
                {{--                <video class="h-full w-full rounded-[18px] object-cover" controls playsinline preload="metadata" poster="{{ materialAsset('landing-page/img/platform-preview.webp') }}" src="https://material-media.s3.us-east-1.amazonaws.com/landing-page/videos/platform-preview.mp4"></video>--}}
                <?php
                $userAgent = request()->header('User-Agent');

                $isChrome = strpos($userAgent, 'Chrome') !== false && strpos($userAgent, 'Chromium') === false;
                $isMobile = strpos($userAgent, 'Mobile') !== false || strpos($userAgent, 'Android') !== false || strpos($userAgent, 'iPhone') !== false;

                $chapter = \App\Models\Chapter::select('id')->find(App::getLocale() == 'ar' ? 16298 : 16315);
//                    $link = $chapter->getFirstMediaUrl(($isChrome && !$isMobile) ? 'video' : 'encryptedVideo')
                $link = $chapter->getFirstMediaUrl('encryptedVideo')
                ?>
                <video poster="{{ asset(App::getLocale() == 'ar' ?'img/plans.webp':'img/plans-en.webp') }}?v=4"
                       class="h-full w-full rounded-[18px] object-cover" id="myVideo"
                       playsinline preload="none" data-hls-src="{{ $link }}"></video>
                <div class="pointer-events-none absolute inset-2 rounded-[18px] bg-gradient-to-b from-black/10 via-transparent to-black/35"></div>
                <div data-video-overlay class="absolute inset-2 rounded-[18px] transition duration-300">
                    <button type="button" data-play-video aria-label="تشغيل فيديو معاينة المنصة" class="absolute left-1/2 top-1/2 grid h-16 w-16 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full border border-white/40 bg-white/40 text-white shadow-lg backdrop-blur-md transition hover:scale-105 hover:bg-white/50">
                        <svg data-play-icon class="ml-0.5 h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                        <svg data-pause-icon class="hidden h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M7 5h4v14H7zm6 0h4v14h-4z"/></svg>
                    </button>
                </div>
            </article> 
        </div> 
    </section>

    <!-- MEMBERSHIP -->
    <section id="membership-section" class="order-7 bec-dot-bg relative scroll-mt-10 overflow-hidden bg-[#f8fbff] px-5 py-16 text-[#071326] dark:bg-[#020617] dark:text-white sm:px-6 lg:py-24">
        <div class="mx-auto grid max-w-[620px] gap-8 lg:max-w-[1320px] lg:grid-cols-[1fr_480px] lg:items-center lg:gap-20 xl:grid-cols-[1fr_500px]">
            <div class="text-start">
                <h2 class="font-display mx-0 max-w-[820px] text-[36px] font-bold leading-[1.28] tracking-[-0.03em] [text-wrap:balance] [word-spacing:0.03em] text-[#001d44] dark:text-white min-[380px]:text-[38px] sm:text-[44px] lg:mx-0 lg:text-[52px]">لا تتعلّم الإنجليزية وحدك</h2>
                <p class="mx-0 mt-6 max-w-3xl text-[18px] font-normal leading-[1.75] text-[#334155] sm:text-xl sm:leading-[1.75] lg:text-[21px] dark:text-[#cbd5e1] lg:mx-0">مقابل <strong class="font-bold text-[#071326] dark:text-white">35 دولارًا شهريًا</strong>، يمكنك التدرّب أكثر، والتحدث أكثر، وجعل الإنجليزية جزءًا من يومك.</p>
            </div>

            <form method="POST" action="{{ route('student.new.store', ['plan' => 'custom', 'price' => 'monthly', 'lang' => $currentLang]) }}" x-data="{ name: '{{ old('name') }}', phone: '{{ old('phone') }}', errors: {}, firstSubmit: false, stateBtn: false }" @submit="submitForm($event , $data , 0)" class="group relative grid gap-4 overflow-hidden rounded-[32px] border border-[#bfdbfe] bg-white p-6 shadow-[0_26px_70px_rgba(37,99,235,.14)] lg:p-7 transition hover:-translate-y-1 hover:border-[#60a5fa] hover:shadow-[0_34px_86px_rgba(37,99,235,.18)] dark:border-white/10 dark:bg-[linear-gradient(145deg,rgba(30,41,59,.96),rgba(15,23,42,.94))] dark:shadow-[0_28px_80px_rgba(0,0,0,.28)] dark:hover:border-blue-300/35">
                @csrf
                <input type="text" name="honeypot" style="display:none" value=""/>
                <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-[#1d4ed8] via-[#60a5fa] to-[#93c5fd]"></div>
                <div class="absolute -left-10 -top-10 h-32 w-32 rounded-full bg-blue-500/10 blur-2xl transition group-hover:bg-blue-400/20"></div>

                <div class="relative z-10 rounded-[24px] border border-blue-100 bg-blue-50/70 p-5 dark:border-blue-300/15 dark:bg-blue-400/10">
                    <div class="flex items-center justify-between gap-3">
                        <p class="text-[14px] font-semibold uppercase tracking-[.1em] text-[#1d4ed8] dark:text-blue-100">سعر الاشتراك</p>
                        <span class="rounded-full bg-white px-3 py-1.5 text-sm font-semibold text-[#1d4ed8] shadow-sm dark:bg-white/10 dark:text-blue-100">شهريًا</span>
                    </div>
                    <div class="mt-3 flex items-end gap-2">
                        <strong class="text-6xl font-bold tracking-[-.07em] text-[#1d4ed8] dark:text-[#93c5fd]">$35</strong>
                        <span class="pb-2 text-lg font-semibold text-[#2563eb] dark:text-[#bfdbfe]">/ الشهر</span>
                    </div>
                </div>

                <div class="relative z-10 mt-2">
                    <label for="membership-name" class="mb-2 block text-base font-semibold">الاسم الكامل</label>
                    <input id="membership-name" name="name" type="text" autocomplete="name" placeholder="أدخل اسمك الكامل" x-model="name" @change="isValidInput(name , 'name0', '.{3,}', $data)" @blur="isValidInput(name , 'name0', '.{3,}' , $data)" class="h-[60px] w-full rounded-2xl border border-[#cbd5e1] bg-white px-4 text-[17px] font-normal text-[#071326] outline-none transition placeholder:text-[#94a3b8] focus:border-[#1d4ed8] focus:ring-4 focus:ring-[#1d4ed8]/10 dark:border-white/10 dark:bg-white/10 dark:text-white dark:placeholder:text-slate-400" :class="errors.name0 ? 'border-red-600 focus:border-red-600 focus:ring-red-600/10 dark:border-red-400 dark:focus:border-red-400' : ''">
                    <p :class="errors.name0 ? '' : 'hidden'" class="mt-2 text-sm font-semibold text-red-600 dark:text-red-400">الاسم الكامل مطلوب</p>
                </div>

                <div class="relative z-10">
                    <label for="membership-phone" class="mb-2 block text-base font-semibold">رقم الهاتف</label>
                    <input id="membership-phone" name="phone" type="tel" dir="ltr" inputmode="tel" autocomplete="tel" placeholder="أدخل رقم هاتفك" x-model="phone" @change="isValidInput(phone , 'phone0', '.{8,}', $data)" @blur="isValidInput(phone , 'phone0', '.{8,}' , $data)" class="h-[60px] w-full rounded-2xl border border-[#cbd5e1] bg-white px-4 text-left text-[17px] font-normal text-[#071326] [unicode-bidi:plaintext] outline-none transition placeholder:text-right placeholder:text-[#94a3b8] focus:border-[#1d4ed8] focus:ring-4 focus:ring-[#1d4ed8]/10 dark:border-white/10 dark:bg-white/10 dark:text-white dark:placeholder:text-slate-400" :class="errors.phone0 ? 'border-red-600 focus:border-red-600 focus:ring-red-600/10 dark:border-red-400 dark:focus:border-red-400' : ''">
                    <p :class="errors.phone0 ? '' : 'hidden'" class="mt-2 text-sm font-semibold text-red-600 dark:text-red-400">رقم الهاتف مطلوب</p>
                </div>

                <button type="submit" class="relative z-10 mt-1 h-[60px] w-full rounded-full bg-gradient-to-r from-[#1d4ed8] via-[#2563eb] to-[#3b82f6] px-7 text-[17px] font-semibold text-white shadow-[0_16px_32px_rgba(37,99,235,.28)] transition hover:-translate-y-0.5 hover:from-[#1e40af] hover:via-[#1d4ed8] hover:to-[#2563eb] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:focus:ring-white/10">اشترك الآن مقابل 35 دولارًا</button>
                <p class="relative z-10 text-center text-[15px] font-normal leading-6 text-[#64748b] dark:text-[#cbd5e1]">بدون عقد طويل الأمد. ابدأ باختبار تحديد المستوى.</p>
            </form>
        </div>
    </section>

    <!-- FAQ -->
    <section class="order-8 bec-dot-bg relative bg-[#eef7ff] px-5 py-16 dark:bg-[#071326] sm:px-6 lg:py-24" id="faq">
        <div class="mx-auto grid max-w-[1320px] gap-10 lg:grid-cols-[.62fr_1.18fr] lg:items-start xl:gap-16">
            <div class="lg:sticky lg:top-28">
                <h2 class="font-display mx-0 mt-5 max-w-[980px] text-start text-[34px] font-bold leading-[1.28] tracking-[-0.03em] [text-wrap:balance] [word-spacing:0.03em] text-[#001d44] dark:text-white min-[380px]:text-[36px] sm:mx-auto sm:text-center sm:text-[44px] lg:mx-0 lg:text-start lg:text-[52px]">أسئلة قبل الانضمام؟</h2>
            </div>
            <div class="grid gap-4 xl:gap-5">
                @foreach($faqs as $index => $faq)
                    <details data-faq-details class="group relative overflow-hidden rounded-[24px] border border-[#bfdbfe] bg-white/90 px-5 py-4 shadow-[0_12px_34px_rgba(15,23,42,.06)] sm:px-6 sm:py-5 lg:px-7 lg:py-5 backdrop-blur-xl transition open:-translate-y-0.5 open:border-[#60a5fa] open:bg-white open:shadow-[0_26px_64px_rgba(37,99,235,.16)] dark:border-white/10 dark:bg-white/[.06] dark:open:border-blue-300/35 dark:open:bg-[linear-gradient(145deg,rgba(30,41,59,.96),rgba(15,23,42,.94))] dark:open:shadow-[0_24px_70px_rgba(0,0,0,.28)]" @if($index === 0) open @endif>
                        <div class="pointer-events-none absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-[#1d4ed8] via-[#60a5fa] to-[#93c5fd] opacity-0 transition group-open:opacity-100"></div>
                        <div class="pointer-events-none absolute -left-10 -top-10 h-28 w-28 rounded-full bg-blue-500/10 opacity-0 blur-2xl transition group-open:opacity-100"></div>
                        <summary class="relative z-10 flex cursor-pointer list-none items-start gap-3 text-start text-[17px] font-semibold leading-[1.45] text-[#0f172a] transition dark:text-white sm:text-lg lg:text-xl">
                            <span class="mt-0.5 grid h-5 w-5 shrink-0 place-items-center text-[#1d4ed8] transition group-open:rotate-90 dark:text-[#bfdbfe]" aria-hidden="true">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 12 12" fill="currentColor"><path d="M4 2.25 9 6l-5 3.75z"/></svg>
                            </span>
                            <span>{{ $faq['question'] }}</span>
                        </summary>
                        <p class="relative z-10 mt-4 border-t border-[#bfdbfe] pt-4 text-[15px] font-medium leading-[1.8] text-[#475569] sm:text-base dark:border-white/10 dark:text-[#dbeafe]">{!! $faq['answer'] !!}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>
</main>

<footer class="border-t border-[#dbeafe] bg-white/90 px-5 py-8 text-center backdrop-blur-xl dark:border-white/10 dark:bg-slate-950">
    <div class="mx-auto max-w-[1320px]">
        <p class="text-base font-semibold text-[#0b2a5b] dark:text-white">© Boston English Center</p>
        <p class="mt-1 text-[14px] font-normal text-[#64748b] dark:text-[#cbd5e1]">عضوية ممارسة الإنجليزية • 35 دولارًا في الشهر • يمكنك الإلغاء في أي وقت</p>
    </div>
</footer>
@vite(['resources/js/pages/home.js'])
<script>

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-faq-details]').forEach((details) => {
            details.addEventListener('toggle', () => {
                if (!details.open) return;
                document.querySelectorAll('[data-faq-details]').forEach((other) => {
                    if (other !== details) other.open = false;
                });
            });
        });

        const cards = Array.from(document.querySelectorAll('[data-video-card]'));
        const setVideoOverlay = (card, hidden) => {
            const overlay = card.querySelector('[data-video-overlay]');
            if (!overlay) return;
            overlay.classList.toggle('opacity-0', hidden);
            overlay.classList.toggle('pointer-events-none', hidden);
        };
        const setVideoButtonState = (card, playing) => {
            card.querySelector('[data-play-icon]')?.classList.toggle('hidden', playing);
            card.querySelector('[data-pause-icon]')?.classList.toggle('hidden', !playing);
        };
        const pauseOtherVideos = (activeVideo) => {
            cards.forEach((card) => {
                const video = card.querySelector('video');
                if (video && video !== activeVideo) {
                    video.pause();
                    video.controls = false;
                    setVideoButtonState(card, false);
                    setVideoOverlay(card, false);
                }
            });
        };
        const prepareVideo = (video) => {
            if (video.dataset.ready === 'true') return;
            const source = video.dataset.hlsSrc || video.dataset.videoSrc;
            if (!source) return;
            if (video.dataset.videoSrc) {
                video.src = source;
            } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
                video.src = source;
            } else if (window.Hls && window.Hls.isSupported()) {
                const hls = new Hls({ maxBufferLength: 18, capLevelToPlayerSize: true, autoStartLoad: false });
                hls.loadSource(source); hls.attachMedia(video); video._hls = hls;
            } else { video.src = source; }
            video.dataset.ready = 'true';
        };
        cards.forEach((card) => {
            const video = card.querySelector('video');
            const button = card.querySelector('[data-play-video]');
            if (!video || !button) return;
            button.addEventListener('click', async (event) => {
                event.preventDefault(); event.stopPropagation();
                if (!video.paused) { video.pause(); return; }
                prepareVideo(video); pauseOtherVideos(video);
                try { if (video._hls) video._hls.startLoad(); video.controls = false; await video.play(); setVideoOverlay(card, true); }
                catch (error) { setVideoOverlay(card, false); video.controls = false; }
            });
            card.addEventListener('click', (event) => {
                if (event.target.closest('[data-play-video]')) return;
                if (!video.paused) {
                    event.preventDefault();
                    video.pause();
                }
            });
            card.addEventListener('mouseenter', () => {
                if (!video.paused) setVideoOverlay(card, false);
            });
            card.addEventListener('mouseleave', () => {
                if (!video.paused) setVideoOverlay(card, true);
            });
            video.addEventListener('play', () => { pauseOtherVideos(video); setVideoButtonState(card, true); setVideoOverlay(card, true); });
            video.addEventListener('pause', () => { setVideoButtonState(card, false); setVideoOverlay(card, false); video.controls = false; });
        });
    });
</script>
</body>
</html>
