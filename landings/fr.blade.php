@php
    $currentLang = request()->route('lang') ?? 'fr';
    \Illuminate\Support\Facades\App::setLocale($currentLang);
    $languageRoute = \Illuminate\Support\Facades\Route::currentRouteName() ?: 'landing';
    $currentRouteParams = request()->route()?->parameters() ?? [];
    $languages = [
        ['code' => 'en', 'short' => 'EN', 'name' => 'Anglais', 'native' => 'English', 'flag' => 'https://flagcdn.com/w40/us.png'],
        ['code' => 'ar', 'short' => 'AR', 'name' => 'Arabe', 'native' => 'العربية', 'flag' => 'https://flagcdn.com/w40/ma.png'],
        ['code' => 'fr', 'short' => 'FR', 'name' => 'Français', 'native' => 'Français', 'flag' => 'https://flagcdn.com/w40/fr.png'],
        ['code' => 'es', 'short' => 'ES', 'name' => 'Espagnol', 'native' => 'Español', 'flag' => 'https://flagcdn.com/w40/es.png'],
        ['code' => 'pt', 'short' => 'PT', 'name' => 'Portugais', 'native' => 'Português', 'flag' => 'https://flagcdn.com/w40/pt.png'],
        ['code' => 'tr', 'short' => 'TR', 'name' => 'Turc', 'native' => 'Türkçe', 'flag' => 'https://flagcdn.com/w40/tr.png'],
        ['code' => 'zh', 'short' => 'ZH', 'name' => 'Chinois', 'native' => '简体中文', 'flag' => 'https://flagcdn.com/w40/cn.png'],

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
        ['title' => 'Salles de conversation', 'description' => 'Pratiquez l’anglais à l’oral avec d’autres étudiants en ligne.', 'image' => materialAsset('landing-page/img/conversation-rooms.webp')],
        ['title' => 'Groupes de pratique', 'description' => 'Rejoignez des séances guidées par des enseignants chaque semaine.', 'image' => materialAsset('landing-page/img/practice-groups.webp')],
        ['title' => 'Supports d’anglais', 'description' => 'Accédez aux leçons, au vocabulaire et aux activités de pratique.', 'image' => materialAsset('landing-page/img/english-materials.webp')],
        ['title' => 'Communauté en ligne', 'description' => 'Restez connecté à l’anglais chaque jour.', 'image' => materialAsset('landing-page/img/online-community.webp')],
        ['title' => 'Accès mobile', 'description' => 'Pratiquez depuis votre téléphone, votre tablette ou votre ordinateur.', 'image' => materialAsset('landing-page/img/mobile-access.webp')],
        ['title' => 'Restez motivé', 'description' => 'Gagnez en confiance grâce à une pratique orale régulière.', 'image' => materialAsset('landing-page/img/stay-motivated.webp')],

    ];
$students = [
    ['path' => '1-encrypted/1.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/1.webp'), 'name' => 'Nada', 'duration' => 'Étudiante depuis 9 mois', 'city' => 'New Jersey', 'country' => 'États-Unis', 'flag' => 'https://flagcdn.com/w40/us.png'],
    ['path' => '2-encrypted/2.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/2.webp'), 'name' => 'Sara', 'duration' => 'Pratique depuis 1 an', 'city' => 'Toronto', 'country' => 'Canada', 'flag' => 'https://flagcdn.com/w40/ca.png'],
    ['path' => '3-encrypted/3.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/3.webp'), 'name' => 'Mohamed', 'duration' => 'Étudiant depuis 6 mois', 'city' => 'Texas', 'country' => 'États-Unis', 'flag' => 'https://flagcdn.com/w40/us.png'],
    ['path' => '4-encrypted/4.m3u8', 'thumbnail' => materialAsset('landing-page/img/thumbnails/4.webp'), 'name' => 'Abir', 'duration' => 'Pratique depuis 4 mois', 'city' => 'New York', 'country' => 'États-Unis', 'flag' => 'https://flagcdn.com/w40/us.png'],
    ['path' => '5.mov', 'thumbnail' => materialAsset('landing-page/img/thumbnails/5.webp'), 'name' => 'Fatima', 'duration' => 'Pratique depuis 5 mois', 'city' => 'Nice', 'country' => 'France', 'flag' => 'https://flagcdn.com/w40/fr.png'],
    ['path' => '7.mov', 'thumbnail' => materialAsset('landing-page/img/thumbnails/6.webp'), 'name' => 'Samir', 'duration' => 'Pratique depuis 7 mois', 'city' => 'Francfort', 'country' => 'Allemagne', 'flag' => 'https://flagcdn.com/w40/de.png'],
    ['path' => '8.mov', 'thumbnail' => materialAsset('landing-page/img/thumbnails/8.webp'), 'name' => 'Youssef', 'duration' => 'Pratique depuis 8 mois', 'city' => 'Madrid', 'country' => 'Espagne', 'flag' => 'https://flagcdn.com/w40/es.png'],
    ['path' => '9.mov', 'thumbnail' => materialAsset('landing-page/img/thumbnails/9.webp'), 'name' => 'Emma', 'duration' => 'Pratique depuis 6 mois', 'city' => 'Montréal', 'country' => 'Canada', 'flag' => 'https://flagcdn.com/w40/ca.png'],

];
    $reviews = [
        [
            'name' => 'Warda',
            'time' => 'il y a 3 jours',
            'rating' => 5,
            'quote' => 'As usual, the session with Miss Lynda was great. I really appreciate her teaching style.',
        ],
        [
            'name' => 'Adil',
            'time' => 'il y a 3 jours',
            'rating' => 5,
            'quote' => "أود أن أقول إن مركزكم ممتاز، والأستاذة نرجس أستاذة رائعة. تبذل مجهودًا كبيرًا لمساعدتي.",
        ],
        [
            'name' => 'Gamal',
            'time' => 'il y a 1 semaine',
            'rating' => 5,
            'quote' => "الحصص دائما مع أ.عبدالجليل ممتازة .. بارك الله فيكم",
        ],
        [
            'name' => 'Oueslati',
            'time' => 'il y a 1 mois',
            'rating' => 5,
            'quote' => 'Everything is great! I had the first session with the instructor Yanis and he was very kind, gentle and always trying to help me.',
        ],
        [
            'name' => 'Yamina',
            'time' => 'il y a 2 mois',
            'rating' => 5,
            'quote' => 'Miss Assala was a very supportive and encouraging teacher. She believed in me and helped me improve step by step.',
        ],
        [
            'name' => 'Marwa',
            'time' => 'il y a 2 mois',
            'rating' => 5,
            'quote' => "J’avance bien. Miss Loujaine explique de façon facile et bonne. Merci pour vos efforts.",
        ],
        [
            'name' => 'Lama',
            'time' => 'il y a 2 mois',
            'rating' => 5,
            'quote' => "كانت ممتازة ورائعة. والمدرسة دائماً تشعرني بالثقة في نفسي وتساعدني في تصحيح أخطائي بطريقة رائعة ومفيدة.",
        ],
        [
            'name' => 'Samira',
            'time' => 'il y a 2 mois',
            'rating' => 5,
            'quote' => 'Your passion for teaching English truly shows in every lesson. You create a welcoming classroom environment where everyone feels valued and motivated.',
        ],
        [
            'name' => "عبدالعزيز",
            'time' => 'il y a 1 an',
            'rating' => 5,
            'quote' => 'It was a great moment, I learnt a lot of things like new vocabulary, idioms and grammar. My listening skill improved also.',
        ],
    ];
    $countries = ['États-Unis', 'Canada', 'France', 'Espagne'];
    $phoneCountries = [
        ['name' => 'Maroc', 'code' => '+212', 'flag' => 'https://flagcdn.com/w40/ma.png'],
        ['name' => 'Inde', 'code' => '+91', 'flag' => 'https://flagcdn.com/w40/in.png'],
        ['name' => 'Afghanistan', 'code' => '+93', 'flag' => 'https://flagcdn.com/w40/af.png'],
        ['name' => 'États-Unis', 'code' => '+1', 'flag' => 'https://flagcdn.com/w40/us.png'],
        ['name' => 'Allemagne', 'code' => '+49', 'flag' => 'https://flagcdn.com/w40/de.png'],
        ['name' => 'Canada', 'code' => '+1', 'flag' => 'https://flagcdn.com/w40/ca.png'],
        ['name' => 'Arabie saoudite', 'code' => '+966', 'flag' => 'https://flagcdn.com/w40/sa.png'],
        ['name' => 'Émirats arabes unis', 'code' => '+971', 'flag' => 'https://flagcdn.com/w40/ae.png'],
        ['name' => 'France', 'code' => '+33', 'flag' => 'https://flagcdn.com/w40/fr.png'],
        ['name' => 'Espagne', 'code' => '+34', 'flag' => 'https://flagcdn.com/w40/es.png'],
        ['name' => 'Turquie', 'code' => '+90', 'flag' => 'https://flagcdn.com/w40/tr.png'],
        ['name' => 'Chine', 'code' => '+86', 'flag' => 'https://flagcdn.com/w40/cn.png'],
        ['name' => 'Royaume-Uni', 'code' => '+44', 'flag' => 'https://flagcdn.com/w40/gb.png'],
    ];
    $steps = [
        ['title' => 'Rejoignez-nous', 'description' => 'Créez votre compte et accédez à votre espace membre.', 'tags' => ['Accès au compte', 'Espace membre', 'Étapes suivantes indiquées']],
        ['title' => 'Passez votre test de niveau', 'description' => 'Complétez le test de niveau en ligne afin que nous puissions déterminer votre niveau de A1 à C1.', 'tags' => ['Test en ligne', 'Résultat du niveau', 'Groupe adapté']],
        ['title' => 'Choisissez votre groupe', 'description' => 'Une fois votre niveau prêt, choisissez jusqu’à 2 groupes selon votre niveau et votre emploi du temps.', 'tags' => ['Groupes par niveau', 'Choix de l’horaire', 'Jusqu’à 2 groupes']],
        ['title' => 'Commencez à pratiquer', 'description' => 'Rejoignez les salles de conversation chaque jour, assistez à vos cours de groupe en direct et progressez au quotidien.', 'tags' => ['Salle de conversation quotidienne', 'Cours de groupe en direct', 'Progrès chaque semaine']],
    ];
    $faqs = [
        ['question' => 'Est-ce un cours privé ?', 'answer' => 'Non. Il s’agit d’une adhésion de pratique de l’anglais. Elle inclut les salles de conversation, les groupes de pratique, les supports et l’accès à la communauté. Les cours privés sont séparés.'],
        ['question' => 'Est-ce adapté aux débutants ?', 'answer' => 'Oui. Les débutants peuvent utiliser les supports et rejoindre des groupes de pratique adaptés. Les étudiants ne doivent pas s’inquiéter de parler parfaitement.'],
        ['question' => 'Les enseignants participent-ils aux groupes de pratique ?', 'answer' => 'Oui. Les groupes de pratique sont guidés par des enseignants, mais ce ne sont pas des cours privés. L’objectif est la pratique, les sujets, le vocabulaire et la confiance.'],
        ['question' => 'Puis-je passer à une autre formule plus tard ?', 'answer' => 'Oui. Si vous souhaitez un enseignant fixe, des cours privés, des cours en petit groupe, la correction des devoirs ou un plan structuré, vous pouvez changer de formule plus tard.'],
        ['question' => 'Puis-je annuler à tout moment ?', 'answer' => 'Oui. L’adhésion est mensuelle et flexible.'],
        ['question' => 'Le cours d’essai est-il vraiment gratuit ?', 'answer' => 'Oui, chez Boston English Center, le cours d’essai est 100% gratuit, sans obligation de continuer ensuite.'],
        ['question' => 'Que se passe-t-il après l’essai ?', 'answer' => 'Étape par étape après l’essai :<br><br>Vous recevez un retour<br><br>Vous recevrez un rapport de l’enseignant sur votre niveau, vos points forts et les points à améliorer, ainsi qu’un certificat de niveau gratuit.'],
        ['question' => 'Les enseignants sont-ils natifs ?', 'answer' => 'Chez Boston English Center, la plupart de nos enseignants sont des instructeurs bilingues hautement qualifiés, spécialisés dans l’enseignement de l’anglais aux étudiants arabophones.'],
        ['question' => 'Comment planifier mes cours ?', 'answer' => 'Après le paiement, l’un de nos conseillers vous contactera via WhatsApp ou par e-mail pour vous aider à choisir le meilleur horaire et vous associer au bon groupe ou au bon enseignant.'],
        ['question' => 'Quels âges enseignez-vous ?', 'answer' => 'Nous enseignons aux préadolescents, aux jeunes adolescents et aux adultes. Les étudiants sont regroupés selon l’âge et le niveau afin d’assurer la meilleure expérience d’apprentissage.'],
        ['question' => 'Comment connaître mon niveau d’anglais ?', 'answer' => 'Vous pouvez passer notre test de niveau gratuit en ligne et recevoir immédiatement un certificat de niveau. Votre enseignant peut aussi évaluer votre expression orale pendant le cours d’essai.'],
        ['question' => 'Combien de temps dure le programme ?', 'answer' => 'Chaque niveau d’anglais est conçu pour être terminé en 3 mois. La plupart des étudiants assistent à 2 ou 3 séances par semaine, chaque séance durant 1 heure.'],
        ['question' => 'Puis-je devenir fluent ?', 'answer' => 'Oui. Avec une pratique régulière, des cours structurés et des séances d’expression orale, de nombreux étudiants atteignent une bonne aisance en 9 à 12 mois.'],
    ];
@endphp
    <!DOCTYPE html>
<html lang="{{ $currentLang }}" dir="{{ $currentLang === 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Boston English Center</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
                        sans: ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
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
        #phone {
            padding-left: 71px !important;
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

        <div class="hidden items-center gap-1 xl:flex">
            <a href="{{ route('landingPage', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Accueil</a>
            <a href="{{ route('contactUs', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Gratuit pour les orphelins</a>
            <a href="{{ route('booking.index', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Réserver un essai</a>
            <a href="{{ route('placementTest.index', ['lang' => $currentLang]) }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Test de niveau</a>
            <a href="{{ route('team') }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Notre équipe</a>
            <a href="{{ route('login') }}" class="rounded-full px-3 py-2 text-[15px] font-semibold text-[#1e3a8a] transition hover:bg-[#dbeafe] focus:bg-[#dbeafe] active:bg-[#dbeafe] dark:text-slate-200 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10">Connexion</a>
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
            <a href="#membership-section" class="inline-flex min-h-11 shrink-0 items-center justify-center whitespace-nowrap rounded-full bg-gradient-to-r from-[#1d4ed8] via-[#2563eb] to-[#3b82f6] px-4 text-[14px] font-semibold text-white shadow-[0_12px_24px_rgba(37,99,235,.24)] transition hover:-translate-y-0.5 hover:from-[#1e40af] hover:via-[#1d4ed8] hover:to-[#2563eb] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:bg-white dark:bg-none dark:text-[#020617] dark:shadow-[0_18px_40px_rgba(255,255,255,.12)] dark:hover:bg-[#eaf3ff] dark:focus:ring-white/20 min-[380px]:px-5 min-[380px]:text-[15px] sm:px-6 sm:text-[17px]">Commencer Maintenant</a>
            <button type="button" @click="openMenu = !openMenu; desktopLangMenu = false; floatingLangMenu = false" :aria-expanded="openMenu.toString()" aria-controls="mobile-navigation" aria-label="Ouvrir ou fermer le menu" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-[#dbeafe] bg-white text-[#1e3a8a] shadow-sm transition hover:bg-[#eff6ff] active:bg-[#dbeafe] dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15 dark:active:bg-white/10 xl:hidden">
                <svg x-show="!openMenu" x-bind:hidden="openMenu" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 7h16M4 12h16M4 17h16" /></svg>
                <svg hidden x-show="openMenu" x-bind:hidden="!openMenu" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18 18 6M6 6l12 12" /></svg>
            </button>
        </div>
    </nav>

    <div id="mobile-navigation" hidden x-show="openMenu" x-bind:hidden="!openMenu" x-transition class="max-h-[calc(100vh-76px)] overflow-y-auto border-t border-[#dbeafe] bg-white px-4 py-5 shadow-xl dark:border-slate-800 dark:bg-slate-950 xl:hidden">
        <div class="mx-auto grid max-w-[1320px] gap-3">
            <a href="{{ route('landingPage', ['lang' => $currentLang]) }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Accueil</a>
            <a href="{{ route('contactUs', ['lang' => $currentLang]) }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Gratuit pour les orphelins</a>
            <a href="{{ route('booking.index', ['lang' => $currentLang]) }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Réserver un essai</a>
            <a href="{{ route('placementTest.index', ['lang' => $currentLang]) }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Test de niveau</a>
            <a href="{{ route('team') }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="rounded-2xl px-4 py-3 text-base font-semibold text-[#1e293b] hover:bg-[#e0f2fe] active:bg-[#e0f2fe] dark:text-white dark:hover:bg-white/10 dark:active:bg-white/10">Notre équipe</a>
            <div class="mt-2 grid gap-3 sm:grid-cols-2">
                <a href="tel:+16178482317" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#bfdbfe] bg-[#eff6ff] px-5 text-base font-semibold text-[#1e3a8a] shadow-sm transition hover:-translate-y-0.5 hover:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/10 dark:focus:ring-white/10">+1 617-848-2317</a>
                <a href="{{ route('login') }}" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="inline-flex min-h-12 items-center justify-center rounded-full border border-[#bfdbfe] bg-white px-5 text-base font-semibold text-[#1e3a8a] shadow-sm transition hover:-translate-y-0.5 hover:bg-[#eff6ff] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/10 dark:focus:ring-white/10">Connexion</a>
            </div>
            <a href="#membership-section" @click="openMenu = false; desktopLangMenu = false; floatingLangMenu = false" class="mt-2 inline-flex min-h-12 items-center justify-center rounded-full bg-gradient-to-r from-[#1d4ed8] via-[#2563eb] to-[#3b82f6] px-7 text-base font-semibold text-white shadow-[0_12px_24px_rgba(37,99,235,.24)] transition hover:-translate-y-0.5 hover:from-[#1e40af] hover:via-[#1d4ed8] hover:to-[#2563eb] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:focus:ring-white/10">Commencer Maintenant</a>
        </div>
    </div>
</header>

<div class="fixed right-4 top-[88px] z-[60] sm:hidden" @click.outside="floatingLangMenu = false">
    <button type="button" @click="floatingLangMenu = !floatingLangMenu; openMenu = false; desktopLangMenu = false" :aria-expanded="floatingLangMenu.toString()" aria-controls="floating-language-menu" class="flex h-12 items-center gap-2 rounded-full border border-blue-100 bg-white px-3 text-base font-semibold text-[#0b2a5b] shadow-[0_16px_34px_rgba(15,23,42,.18)] transition active:scale-95 dark:border-white/10 dark:bg-[#0b1220] dark:text-white">
        <img width="24" height="18" src="{{ $currentLanguage['flag'] }}" loading="lazy" alt="{{ $currentLanguage['name'] }}" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]">
        <span>{{ $currentLanguage['short'] }}</span>
        <svg class="h-3.5 w-3.5 transition" :class="floatingLangMenu ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="m6 9 6 6 6-6" /></svg>
    </button>
    <div id="floating-language-menu" hidden x-show="floatingLangMenu" x-bind:hidden="!floatingLangMenu" x-transition class="absolute right-0 top-14 w-52 overflow-hidden rounded-[22px] border border-blue-100 bg-white p-2 shadow-[0_20px_50px_rgba(15,23,42,.24)] dark:border-white/10 dark:bg-[#0b1220]">
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

                <h1 class="font-display mx-0 w-full max-w-[960px] text-start text-[35px] font-bold leading-[1.2] tracking-[-0.02em] [text-wrap:balance] [word-spacing:0.02em] text-[#001d44] dark:text-white min-[380px]:text-[38px] min-[460px]:text-[44px] sm:mx-auto sm:text-center sm:text-[64px] lg:text-[76px] xl:text-[82px]">Pratiquez l’anglais <span class="block text-[#1d4ed8] dark:text-[#60a5fa]">Chaque Jour</span></h1>
                <p class="mx-0 mt-6 max-w-[680px] text-start text-[16px] font-medium leading-[1.75] text-[#334155] dark:text-[#dbeafe] min-[380px]:text-[17px] sm:mx-auto sm:text-center sm:text-xl lg:text-[21px]">Rejoignez des salles de conversation, des groupes de pratique et des activités interactives pour seulement <strong class="text-[#071326] dark:text-white">35 $/mois.</strong></p>                <div class="mt-8 flex flex-col justify-start gap-3 sm:flex-row sm:justify-center">
                    <a href="#membership-section" class="inline-flex min-h-14 items-center justify-center rounded-full bg-[#071326] px-8 text-[17px] font-semibold text-white shadow-[0_18px_40px_rgba(15,23,42,.16)] transition hover:-translate-y-0.5 hover:bg-[#0f172a] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:bg-white dark:text-[#020617] dark:shadow-[0_18px_40px_rgba(255,255,255,.12)] dark:hover:bg-[#eaf3ff] dark:focus:ring-white/20">Commencer Maintenant</a>
                    <a href="#platform-preview" class="hidden min-h-14 items-center justify-center rounded-full border border-[#bfdbfe] bg-white/80 px-7 text-[17px] font-semibold text-[#1e3a8a] shadow-sm transition hover:-translate-y-0.5 hover:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 dark:border-white/15 dark:bg-white/10 dark:text-white dark:hover:bg-white/15 dark:focus:ring-white/10 sm:inline-flex">Voir comment ça marche</a>
                </div>
                <p class="mx-0 mt-6 max-w-[620px] text-start text-[17px] font-medium leading-[1.75] text-[#1d4ed8] dark:text-[#93c5fd] sm:mx-auto sm:text-center sm:text-lg"><span>Pratiquez l’anglais à l’oral avec de vraies personnes, chaque jour.</span></p>  
            </div>
            <div class="relative z-10 mx-auto mt-10 w-full max-w-[860px] sm:mt-12 xl:max-w-[920px]">
                <div class="relative rounded-[28px] border border-[#bfdbfe] bg-white/80 p-2 shadow-[0_30px_90px_rgba(30,64,175,.14)] backdrop-blur-xl dark:border-white/15 dark:bg-white/10 dark:shadow-[0_30px_90px_rgba(30,64,175,.18)]">
                    <img src="{{ materialAsset('landing-page/img/hero.webp') }}" alt="Étudiants pratiquant l’anglais en ligne" class="aspect-[16/9] w-full rounded-[22px] object-cover">
                    <div class="absolute -bottom-5 right-4 rounded-[22px] border border-blue-200/25 bg-[#061b3a]/55 px-5 py-4 text-white shadow-[0_20px_48px_rgba(30,64,175,.30)] backdrop-blur-xl [text-shadow:0_1px_12px_rgba(0,0,0,.42)] dark:border-blue-100/15 dark:bg-[#061b3a]/45 lg:bottom-auto lg:right-5 lg:top-5">
                        <strong class="block text-4xl font-bold leading-none">500+</strong>
                        <span class="mt-1 block max-w-[175px] text-[13px] font-bold leading-5 text-white/90">Étudiants pratiquant l’anglais en ligne chaque jour</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="order-4 bec-dot-bg relative overflow-hidden bg-[#f3f8ff] px-5 py-16 dark:bg-[#020617] sm:px-6 lg:py-24">
        <div class="mx-auto max-w-[1320px]">
            <div class="mx-auto max-w-[860px] text-start sm:text-center">
                <h2 class="font-display mx-0 max-w-[980px] text-start text-[34px] font-bold leading-[1.2] tracking-[-0.03em] [text-wrap:balance] [word-spacing:0.03em] text-[#001d44] dark:text-white min-[380px]:text-[36px] sm:mx-auto sm:text-center sm:text-[44px] lg:text-[52px]">Tout Pour Pratiquer L’anglais</h2>
                <p class="mx-0 mt-5 max-w-3xl text-start text-[18px] font-medium leading-[1.75] text-[#475569] sm:mx-auto sm:text-center sm:text-xl sm:leading-[1.75] lg:text-[21px] dark:text-[#cbd5e1]">Conçu pour vous aider à parler anglais régulièrement.</p>
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
                <h2 class="font-display mx-0 max-w-[980px] text-start text-[34px] font-bold leading-[1.2] tracking-[-0.03em] [text-wrap:balance] [word-spacing:0.03em] text-[#001d44] dark:text-white min-[380px]:text-[36px] sm:mx-auto sm:text-center sm:text-[44px] lg:text-[52px]">De Vrais Étudiants. De Vrais Progrès.</h2>
                <p class="mx-0 mt-5 max-w-3xl text-start text-[18px] font-medium leading-[1.75] text-[#475569] sm:mx-auto sm:text-center sm:text-xl sm:leading-[1.75] lg:text-[21px] dark:text-[#cbd5e1]">Regardez de vrais étudiants de Boston English Center pratiquer régulièrement et gagner en confiance avec le temps.</p>
            </div>

            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4 xl:gap-6 xl:gap-6">
                @foreach($students as $student)
                    <article data-video-card class="relative mx-auto aspect-[4/5] w-full max-w-[360px] overflow-hidden rounded-[28px] lg:max-w-[315px] xl:max-w-[330px] bg-[#111827] shadow-[0_22px_46px_rgba(15,23,42,.22)] dark:shadow-[0_22px_46px_rgba(0,0,0,.35)] sm:aspect-[3/4]">
                        {{--                        <video class="absolute inset-0 h-full w-full object-cover" playsinline preload="none" poster="{{ $student['thumbnail'] }}" data-hls-src="https://material-media.s3.us-east-1.amazonaws.com/landing-page/videos/{{ $student['path'] }}"></video>--}}
                        <video class="absolute inset-0 h-full w-full object-cover" playsinline preload="none" poster="{{ $student['thumbnail'] }}" data-hls-src="{{materialAsset("landing-page/videos/".$student['path'])  }}"></video>
                        <div class="absolute inset-0 bg-gradient-to-b from-black/10 via-transparent to-black/80"></div>
                        <div data-video-overlay class="absolute inset-0 transition duration-300">
                            <button type="button" data-play-video aria-label="Lire la vidéo de {{ $student['name'] }}" class="absolute left-1/2 top-1/2 grid h-14 w-14 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full border border-white/40 bg-white/40 text-white shadow-lg backdrop-blur-md transition hover:scale-105 hover:bg-white/50">
                                <svg data-play-icon class="ml-0.5 h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                                <svg data-pause-icon class="hidden h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M7 5h4v14H7zm6 0h4v14h-4z"/></svg>
                            </button>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 p-5">
                            <h3 class="text-[22px] font-bold leading-[1.2] tracking-[-0.005em] text-white sm:text-2xl">{{ $student['name'] }}</h3>
                            <p class="mt-1 text-[16px] font-semibold text-white/85">{{ $student['duration'] }}</p>
                            <div class="mt-3 inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-2 text-[14px] font-semibold text-white backdrop-blur-md sm:text-base">
                                <img src="{{ $student['flag'] }}" alt="Drapeau {{ $student['country'] }}" loading="lazy" class="h-4 w-6 rounded-[3px] bg-white object-cover shadow-[0_0_0_1px_rgba(15,23,42,.10)]"><span>{{ $student['city'] }}, {{ $student['country'] }}</span>
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
                    <h2 class="font-display mx-0 max-w-[980px] text-start text-[32px] font-bold leading-[1.2] tracking-[-0.03em] [text-wrap:balance] [word-spacing:0.03em] text-[#001d44] dark:text-white min-[380px]:text-[34px] sm:mx-auto sm:text-center sm:text-[44px] lg:mx-0 lg:text-start lg:text-[52px]">Approuvé Par Des Milliers D’apprenants</h2>
                    <p class="mx-0 mt-5 max-w-3xl text-start text-[18px] font-medium leading-[1.75] text-[#475569] sm:mx-auto sm:text-center sm:text-xl sm:leading-[1.75] lg:text-[21px] dark:text-[#cbd5e1] lg:mx-0 lg:text-start">Note de <strong class="text-[#1d4ed8] dark:text-[#93c5fd]">4,9/5</strong> donnée par plus de <strong class="text-[#0f172a] dark:text-white">3 876 apprenants</strong> aux États-Unis, au Canada et dans le Golfe.</p>
                </div>
                <div class="bec-premium-card rounded-[28px] border border-[#bfdbfe] bg-white/90 p-5 text-center lg:p-6 shadow-[0_18px_44px_rgba(15,23,42,.08)] backdrop-blur-xl dark:border-white/10 dark:bg-white/[.06]">
                    <div class="text-[72px] font-bold leading-[0.85] tracking-[-.09em] text-[#0f172a] dark:text-white">4.9</div>
                    <div class="mt-3 flex justify-center gap-1">
                        @for($i = 0; $i < 5; $i++)<span class="grid h-6 w-6 place-items-center rounded-md bg-[#00b67a] text-xs text-white">★</span>@endfor
                    </div>
                    <p class="mt-2 text-sm font-normal text-[#64748b] dark:text-[#cbd5e1]">Basé sur les avis des étudiants</p>
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
                                <div class="mt-3 flex gap-1 text-[#facc15]" aria-label="{{ $review['rating'] }} étoiles sur 5">
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
                <a href="{{ route('landingReviews', ['lang' => $currentLang]) }}" class="inline-flex min-h-12 items-center justify-center rounded-full bg-gradient-to-r from-[#1d4ed8] via-[#2563eb] to-[#3b82f6] px-7 text-base font-semibold text-white shadow-[0_12px_24px_rgba(37,99,235,.24)] transition hover:-translate-y-0.5 hover:from-[#1e40af] hover:via-[#1d4ed8] hover:to-[#2563eb] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:focus:ring-white/10">Voir tous les avis</a>
            </div>
        </div>
    </section>

    <!-- STEPS -->
    <section id="how-it-works" class="order-5 bec-dot-bg relative overflow-hidden bg-white px-5 py-16 text-[#0f172a] dark:bg-[#071326] dark:text-white sm:px-6 lg:py-24">
        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-blue-200 to-transparent dark:via-blue-300/40"></div>
        <div class="mx-auto max-w-[1320px]">
            <div class="mx-auto max-w-[860px] text-start sm:text-center">

                <h2 class="font-display mx-0 mt-5 max-w-[980px] text-start text-[36px] font-bold leading-[1.2] tracking-[-0.03em] [text-wrap:balance] [word-spacing:0.03em] text-[#001d44] dark:text-white min-[380px]:text-[38px] sm:mx-auto sm:text-center sm:text-[44px] lg:text-[52px]">Commencez En Quelques Étapes</h2>
                <p class="mx-0 mt-5 max-w-3xl text-start text-[18px] font-medium leading-[1.75] text-[#475569] dark:text-blue-100/80 sm:mx-auto sm:text-center sm:text-xl sm:leading-[1.75] lg:text-[21px]">Découvrez les étapes après l’inscription, simplement et sans confusion.</p>
            </div>

            <div class="relative mt-10 grid gap-5 pl-9 before:absolute before:bottom-8 before:left-4 before:top-8 before:w-px before:bg-[#cbd5e1] dark:before:bg-white/25 sm:grid-cols-2 sm:pl-0 sm:before:hidden lg:grid-cols-4">
                @foreach($steps as $index => $step)
                    <article class="relative flex h-full flex-col rounded-[24px] border border-[#bfdbfe]/80 bg-white/90 p-5 shadow-sm sm:p-6 dark:border-white/10 dark:bg-white/[.055]">
                        <div class="absolute -left-[42px] top-6 grid h-8 w-8 place-items-center rounded-full bg-[#071326] text-sm font-bold text-white shadow-[0_8px_20px_rgba(15,23,42,.18)] ring-4 ring-white dark:bg-white dark:text-[#071326] dark:ring-[#071326] sm:hidden">{{ $index + 1 }}</div>
                        <div class="relative z-10 flex h-full flex-col">
                            <div class="flex items-center justify-between gap-3">
                                <span class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-50 px-3.5 py-2 text-[12px] font-semibold uppercase tracking-[.1em] text-[#1d4ed8] dark:border-blue-300/20 dark:bg-blue-400/10 dark:text-blue-100">
                                    <span class="h-2 w-2 rounded-full bg-[#2563eb] shadow-[0_0_0_4px_rgba(37,99,235,.12)]"></span>
                                    Step {{ $index + 1 }}
                                </span>
                            </div>
                            <h3 class="mt-5 text-[24px] font-bold leading-[1.24] tracking-[-0.02em] text-[#001d44] dark:text-white sm:text-[24px]">{{ $step['title'] }}</h3>
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
            <h2 class="font-display mx-0 max-w-[980px] text-start text-[36px] font-bold leading-[1.2] tracking-[-0.03em] [text-wrap:balance] [word-spacing:0.03em] text-[#001d44] dark:text-white min-[380px]:text-[38px] sm:mx-auto sm:text-center sm:text-[44px] lg:text-[52px]">Découvrez La Plateforme</h2>
            <p class="mx-0 mt-5 max-w-3xl text-start text-[18px] font-medium leading-[1.75] text-[#475569] sm:mx-auto sm:text-center sm:text-xl sm:leading-[1.75] lg:text-[21px] dark:text-[#cbd5e1]">Découvrez comment les étudiants pratiquent l’anglais en ligne.</p>
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
                    <button type="button" data-play-video aria-label="Lire la vidéo de présentation de la plateforme" class="absolute left-1/2 top-1/2 grid h-16 w-16 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full border border-white/40 bg-white/40 text-white shadow-lg backdrop-blur-md transition hover:scale-105 hover:bg-white/50">
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
                <h2 class="font-display mx-0 max-w-[820px] text-[36px] font-bold leading-[1.2] tracking-[-0.03em] [text-wrap:balance] [word-spacing:0.03em] text-[#001d44] dark:text-white min-[380px]:text-[38px] sm:text-[44px] lg:mx-0 lg:text-[52px]">N’étudiez Pas L’anglais Seul</h2>
                <p class="mx-0 mt-6 max-w-3xl text-[16px] font-normal leading-[1.75] text-[#334155] min-[380px]:text-[17px] sm:text-xl sm:leading-[1.75] lg:text-[21px] dark:text-[#cbd5e1] lg:mx-0">Pour <strong class="font-bold text-[#071326] dark:text-white">35 $/mois</strong>, les étudiants peuvent pratiquer davantage, parler davantage et rester connectés à l’anglais chaque jour.</p>

                {{--<div class="mt-6 grid gap-2.5 text-[17px] font-normal leading-[1.55] text-[#334155] dark:text-[#e2e8f0] lg:mt-7">
                    <div class="flex items-center justify-start gap-2.5 text-start"><span class="text-lg font-bold text-[#16a34a]">&#10003;</span>Commencez par votre test de niveau</div>
                    <div class="flex items-center justify-start gap-2.5 text-start"><span class="text-lg font-bold text-[#16a34a]">&#10003;</span>Rejoignez des groupes de pratique en direct</div>
                    <div class="flex items-center justify-start gap-2.5 text-start"><span class="text-lg font-bold text-[#16a34a]">&#10003;</span>Pratiquez en ligne chaque jour</div>
                </div>--}}
            </div>

            <form method="POST" action="{{ route('student.new.store', ['plan' => 'custom', 'price' => 'monthly', 'lang' => $currentLang]) }}" x-data="{ name: '{{ old('name') }}', phone: '{{ old('phone') }}', errors: {}, firstSubmit: false, stateBtn: false }" @submit="submitForm($event , $data , 0)" class="group relative grid gap-4 overflow-hidden rounded-[32px] border border-[#bfdbfe] bg-white p-6 shadow-[0_26px_70px_rgba(37,99,235,.14)] lg:p-7 transition hover:-translate-y-1 hover:border-[#60a5fa] hover:shadow-[0_34px_86px_rgba(37,99,235,.18)] dark:border-white/10 dark:bg-[linear-gradient(145deg,rgba(30,41,59,.96),rgba(15,23,42,.94))] dark:shadow-[0_28px_80px_rgba(0,0,0,.28)] dark:hover:border-blue-300/35">
                @csrf
                <input type="text" name="honeypot" style="display:none" value=""/>
                <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-[#1d4ed8] via-[#60a5fa] to-[#93c5fd]"></div>
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-blue-500/10 blur-2xl transition group-hover:bg-blue-400/20"></div>

                <div class="relative z-10 rounded-[24px] border border-blue-100 bg-blue-50/70 p-5 dark:border-blue-300/15 dark:bg-blue-400/10">
                    <div class="flex items-center justify-between gap-3">
                        <p class="text-[14px] font-semibold uppercase tracking-[.1em] text-[#1d4ed8] dark:text-blue-100">Prix de l’adhésion</p>
                        <span class="rounded-full bg-white px-3 py-1.5 text-sm font-semibold text-[#1d4ed8] shadow-sm dark:bg-white/10 dark:text-blue-100">Mensuel</span>
                    </div>
                    <div class="mt-3 flex items-end gap-2">
                        <strong class="text-6xl font-bold tracking-[-.07em] text-[#1d4ed8] dark:text-[#93c5fd]">35 $</strong>
                        <span class="pb-2 text-lg font-semibold text-[#2563eb] dark:text-[#bfdbfe]">/ mois</span>
                    </div>
                </div>

                <div class="relative z-10 mt-2">
                    <label for="membership-name" class="mb-2 block text-base font-semibold">Nom complet</label>
                    <input id="membership-name" name="name" type="text" autocomplete="name" placeholder="Entrez votre nom complet" x-model="name" @change="isValidInput(name , 'name0', '.{3,}', $data)" @blur="isValidInput(name , 'name0', '.{3,}' , $data)" class="h-[60px] w-full rounded-2xl border border-[#cbd5e1] bg-white px-4 text-[17px] font-normal text-[#071326] outline-none transition placeholder:text-[#94a3b8] focus:border-[#1d4ed8] focus:ring-4 focus:ring-[#1d4ed8]/10 dark:border-white/10 dark:bg-white/10 dark:text-white dark:placeholder:text-slate-400" :class="errors.name0 ? 'border-red-600 focus:border-red-600 focus:ring-red-600/10 dark:border-red-400 dark:focus:border-red-400' : ''">
                    <p :class="errors.name0 ? '' : 'hidden'" class="mt-2 text-sm font-semibold text-red-600 dark:text-red-400">Nom complet is required</p>
                </div>

                <div class="relative z-10">
                    <label for="membership-phone" class="mb-2 block text-base font-semibold">Numéro de téléphone</label>
                    <input id="membership-phone" name="phone" type="tel" autocomplete="tel" placeholder="Entrez votre numéro de téléphone" x-model="phone" @change="isValidInput(phone , 'phone0', '.{8,}', $data)" @blur="isValidInput(phone , 'phone0', '.{8,}' , $data)" class="h-[60px] w-full rounded-2xl border border-[#cbd5e1] bg-white px-4 text-[17px] font-normal text-[#071326] outline-none transition placeholder:text-[#94a3b8] focus:border-[#1d4ed8] focus:ring-4 focus:ring-[#1d4ed8]/10 dark:border-white/10 dark:bg-white/10 dark:text-white dark:placeholder:text-slate-400" :class="errors.phone0 ? 'border-red-600 focus:border-red-600 focus:ring-red-600/10 dark:border-red-400 dark:focus:border-red-400' : ''">
                    <p :class="errors.phone0 ? '' : 'hidden'" class="mt-2 text-sm font-semibold text-red-600 dark:text-red-400">Numéro de téléphone is required</p>
                </div>

                <button type="submit" class="relative z-10 mt-1 h-[60px] w-full rounded-full bg-gradient-to-r from-[#1d4ed8] via-[#2563eb] to-[#3b82f6] px-7 text-[17px] font-semibold text-white shadow-[0_16px_32px_rgba(37,99,235,.28)] transition hover:-translate-y-0.5 hover:from-[#1e40af] hover:via-[#1d4ed8] hover:to-[#2563eb] focus:outline-none focus:ring-4 focus:ring-blue-100 dark:focus:ring-white/10">Commencer Pour 35 $</button>
                <p class="relative z-10 text-center text-[15px] font-normal leading-6 text-[#64748b] dark:text-[#cbd5e1]">Aucun contrat à long terme. Commencez par votre test de niveau.</p>
            </form>
        </div>
    </section>

    <!-- FAQ -->
    <section class="order-8 bec-dot-bg relative bg-[#eef7ff] px-5 py-16 dark:bg-[#071326] sm:px-6 lg:py-24" id="faq">
        <div class="mx-auto grid max-w-[1320px] gap-10 lg:grid-cols-[.62fr_1.18fr] lg:items-start xl:gap-16">
            <div class="lg:sticky lg:top-28">
                <h2 class="font-display mx-0 mt-5 max-w-[980px] text-start text-[34px] font-bold leading-[1.2] tracking-[-0.03em] [text-wrap:balance] [word-spacing:0.03em] text-[#001d44] dark:text-white min-[380px]:text-[36px] sm:mx-auto sm:text-center sm:text-[44px] lg:mx-0 lg:text-start lg:text-[52px]">Des Questions Avant De Rejoindre ?</h2>
            </div>
            <div class="grid gap-4 xl:gap-5">
                @foreach($faqs as $index => $faq)
                    <details data-faq-details class="group relative overflow-hidden rounded-[24px] border border-[#bfdbfe] bg-white/90 px-5 py-4 shadow-[0_12px_34px_rgba(15,23,42,.06)] sm:px-6 sm:py-5 lg:px-7 lg:py-5 backdrop-blur-xl transition open:-translate-y-0.5 open:border-[#60a5fa] open:bg-white open:shadow-[0_26px_64px_rgba(37,99,235,.16)] dark:border-white/10 dark:bg-white/[.06] dark:open:border-blue-300/35 dark:open:bg-[linear-gradient(145deg,rgba(30,41,59,.96),rgba(15,23,42,.94))] dark:open:shadow-[0_24px_70px_rgba(0,0,0,.28)]" @if($index === 0) open @endif>
                        <div class="pointer-events-none absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-[#1d4ed8] via-[#60a5fa] to-[#93c5fd] opacity-0 transition group-open:opacity-100"></div>
                        <div class="pointer-events-none absolute -right-10 -top-10 h-28 w-28 rounded-full bg-blue-500/10 opacity-0 blur-2xl transition group-open:opacity-100"></div>
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
        <p class="mt-1 text-[14px] font-normal text-[#64748b] dark:text-[#cbd5e1]">Adhésion de pratique de l’anglais • 35 $/mois • Annulation à tout moment</p>
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
