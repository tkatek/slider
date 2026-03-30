<?php
$content = [
    'personal_information' => [
        'header_icon' => '👤',
        'header_title' => 'Personal Information',
        'badge' => '1',

        'first_name' => [
            'icon' => '🪪',
            'title' => 'First name',
            'or_label' => 'or',
            'alt' => 'Given name',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/first-name.mp3'),
        ],
        'last_name'  => [
            'icon' => '👪',
            'title' => 'Last name',
            'or_label' => 'or',
            'alt' => 'Family name / Surname',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/last-name.mp3'),
        ],
        'full_name'  => [
            'icon' => '✍️',
            'title' => 'Full name',
            'alt' => 'First + Last',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/full-name.mp3'),
        ],
        'dob'        => [
            'icon' => '🎂',
            'title' => 'Date of birth',
            'prefix' => '(',
            'abbr' => 'DOB',
            'suffix' => ')',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/date-of-birth.mp3'),
        ],
        'birth_place'=> [
            'icon' => '📍',
            'title' => 'Place of birth',
            'alt' => 'City / Country',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/place-of-birth.mp3'),
        ],
        'nationality'=> [
            'icon' => '🌍',
            'title' => 'Nationality',
            'alt' => 'e.g., American',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/nationality.mp3'),
        ],
        'gender'     => [
            'icon' => '🚻',
            'title' => 'Gender',
            'separator' => '/',
            'options' => ['Male', 'Female'],
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/gender.mp3'),
        ],
        'marital_status' => [
            'icon' => '💍',
            'title' => 'Marital status',
            'separator' => '/',
            'options' => ['Single', 'Married', 'Divorced', 'Widowed'],
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/marital-status.mp3'),
        ],
        'dependants' => [
            'icon' => '👶',
            'title' => 'Dependants',
            'alt' => 'People who depend on you (children, etc.)',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/dependants.mp3'),
        ],
    ],

    'contact_details' => [
        'header_icon' => '📞',
        'header_title' => 'Contact Details',
        'badge' => '2',

        'address' => [
            'icon' => '🏠',
            'title' => 'Address',
            'alt' => 'Street, City, Country, Postal code',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/address.mp3'),
        ],
        'phone'   => [
            'icon' => '📱',
            'title' => 'Phone number',
            'or_label' => 'or',
            'alt' => 'Mobile number',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/phone-number.mp3'),
        ],
        'email'   => [
            'icon' => '✉️',
            'title' => 'Email address',
            'example' => 'example@email.com',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/email-address.mp3'),
        ],

        'example' => [
            'icon' => '👤',
            'title' => 'Example',
            'items' => [
                ['label' => 'Full name:',      'value' => 'Emily Johnson'],
                ['label' => 'DOB:',            'value' => '07/22/1998'],
                ['label' => 'Place of birth:', 'value' => 'Austin, Texas, USA'],
                ['label' => 'Nationality:',    'value' => 'American'],
                ['label' => 'Phone:',          'value' => '+1 (512) 555-0187'],
                ['label' => 'Email:',          'value' => 'emily.johnson@example.com'],
            ],
        ],
    ],
];
?>

@extends("slider.simple-layout")

@section("style")
    <style>
        .play-hit{-webkit-tap-highlight-color:transparent;}
        .play-hit:focus-visible{outline:none;}

        .wave-bar{
            display:none;
            width:3px;
            height:12px;
            background:currentColor;
            border-radius:2px;
            margin:0 1px;
        }

        .speak-btn.speaking .wave-bar{
            display:block;
            animation:waveGrowth .6s infinite ease-in-out;
        }

        .speak-btn.speaking .static-icon{
            display:none;
        }

        @keyframes waveGrowth{
            0%,100%{height:6px;}
            50%{height:16px;}
        }

        .vocab-audio-card.is-playing{
            box-shadow:
                    0 0 0 2px rgba(99,102,241,.18),
                    0 18px 32px rgba(15,23,42,.10);
        }

        .dark .vocab-audio-card.is-playing{
            box-shadow:
                    0 0 0 2px rgba(129,140,248,.22),
                    0 18px 32px rgba(2,6,23,.22);
        }
    </style>
@endsection

@section("content")
    @php
        $pi = $content['personal_information'];
        $cd = $content['contact_details'];

        $piItems = [
            [
                'icon'=>$pi['first_name']['icon'],
                'title'=>$pi['first_name']['title'],
                'type'=>'or',
                'or'=>$pi['first_name']['or_label'],
                'alt'=>$pi['first_name']['alt'],
                'sound'=>$pi['first_name']['sound'],
            ],
            [
                'icon'=>$pi['last_name']['icon'],
                'title'=>$pi['last_name']['title'],
                'type'=>'or',
                'or'=>$pi['last_name']['or_label'],
                'alt'=>$pi['last_name']['alt'],
                'sound'=>$pi['last_name']['sound'],
            ],
            [
                'icon'=>$pi['full_name']['icon'],
                'title'=>$pi['full_name']['title'],
                'type'=>'hint',
                'hint'=>$pi['full_name']['alt'],
                'sound'=>$pi['full_name']['sound'],
            ],
            [
                'icon'=>$pi['dob']['icon'],
                'title'=>$pi['dob']['title'],
                'type'=>'hint',
                'hint'=>$pi['dob']['prefix'].$pi['dob']['abbr'].$pi['dob']['suffix'],
                'sound'=>$pi['dob']['sound'],
            ],
            [
                'icon'=>$pi['birth_place']['icon'],
                'title'=>$pi['birth_place']['title'],
                'type'=>'hint',
                'hint'=>$pi['birth_place']['alt'],
                'sound'=>$pi['birth_place']['sound'],
            ],
            [
                'icon'=>$pi['nationality']['icon'],
                'title'=>$pi['nationality']['title'],
                'type'=>'hint',
                'hint'=>$pi['nationality']['alt'],
                'sound'=>$pi['nationality']['sound'],
            ],
            [
                'icon'=>$pi['gender']['icon'],
                'title'=>$pi['gender']['title'],
                'type'=>'chips',
                'chips'=>$pi['gender']['options'],
                'wide'=>true,
                'sound'=>$pi['gender']['sound'],
            ],
            [
                'icon'=>$pi['marital_status']['icon'],
                'title'=>$pi['marital_status']['title'],
                'type'=>'chips',
                'chips'=>$pi['marital_status']['options'],
                'wide'=>true,
                'sound'=>$pi['marital_status']['sound'],
            ],
            [
                'icon'=>$pi['dependants']['icon'],
                'title'=>$pi['dependants']['title'],
                'type'=>'hint',
                'hint'=>$pi['dependants']['alt'],
                'wide'=>true,
                'sound'=>$pi['dependants']['sound'],
            ],
        ];

        $cdItems = [
            [
                'icon'=>$cd['address']['icon'],
                'title'=>$cd['address']['title'],
                'type'=>'hint',
                'hint'=>$cd['address']['alt'],
                'sound'=>$cd['address']['sound'],
            ],
            [
                'icon'=>$cd['phone']['icon'],
                'title'=>$cd['phone']['title'],
                'type'=>'or',
                'or'=>$cd['phone']['or_label'],
                'alt'=>$cd['phone']['alt'],
                'sound'=>$cd['phone']['sound'],
            ],
            [
                'icon'=>$cd['email']['icon'],
                'title'=>$cd['email']['title'],
                'type'=>'hint',
                'hint'=>$cd['email']['example'],
                'sound'=>$cd['email']['sound'],
            ],
        ];
    @endphp

    <main class="min-h-[100dvh] lg:h-[100dvh] w-full flex justify-center px-4 sm:px-8 py-8 sm:py-10 lg:py-6 lg:items-center items-start">
        <div class="w-full max-w-6xl">

            <div class="header-spacing text-center space-y-6 my-8">

                <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                        New Vocabulary
                    </span>
                </h1>
            </div>
            <section id="contentWrap" class="p-2 sm:p-3">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 sm:gap-4 lg:items-stretch">

                    <!-- Panel 1 -->
                    <section id="panel1" class="h-full lg:min-h-[76vh] p-3 sm:p-4 flex flex-col">
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex items-start gap-3">
                                <div class="h-10 w-10 rounded-2xl flex items-center justify-center text-lg
                                            border border-indigo-500/25 bg-indigo-500/10 text-indigo-700
                                            dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200">
                                    {{ $pi['header_icon'] }}
                                </div>
                                <div class="min-w-0">
                                    <h2 class="text-base sm:text-xl font-black tracking-[-0.02em] text-slate-700 dark:text-slate-100 leading-tight">
                                        {{ $pi['header_title'] }}
                                    </h2>
                                    <p class="mt-0.5 text-sm sm:text-[15px] font-bold text-slate-600 dark:text-slate-200/90 leading-[1.45]">
                                        Names, identity, and basic details.
                                    </p>
                                </div>
                            </div>

                            <div class="shrink-0 inline-flex items-center gap-2 rounded-full px-2.5 py-1 text-xs sm:text-[13px] font-black tracking-[0.18em] uppercase
                                        border border-slate-200/70 bg-white/60 text-slate-700
                                        dark:border-slate-700/30 dark:bg-slate-900/20 dark:text-slate-200">
                                <span class="inline-flex h-2 w-2 rounded-full bg-indigo-500/70"></span>
                                {{ $pi['badge'] }}
                            </div>
                        </div>

                        <div class="mt-3 flex-1">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 sm:gap-3">
                                @foreach($piItems as $it)
                                    <article class="{{ !empty($it['wide']) ? 'sm:col-span-2' : '' }}
                                            vocab-audio-card rounded-2xl border border-slate-200/70 bg-white/50 shadow-lg
                                            dark:border-slate-700/30 dark:bg-slate-900/20
                                            p-3.5 sm:p-4 relative overflow-hidden
                                            min-h-[78px] sm:min-h-[86px] lg:min-h-[90px] transition-all duration-200">

                                        <div class="pointer-events-none absolute inset-0 opacity-80
                                            bg-[radial-gradient(320px_200px_at_30%_20%,rgba(255,255,255,0.62),transparent_60%)]
                                            dark:bg-[radial-gradient(320px_200px_at_30%_20%,rgba(255,255,255,0.10),transparent_60%)]"></div>

                                        @if(!empty($it['sound']))
                                            <div class="absolute top-3 right-3 z-20">
                                                <button
                                                        type="button"
                                                        class="play-hit speak-btn inline-flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500/80 via-violet-500/80 to-blue-500/80 text-white backdrop-blur-md ring-1 ring-white/25 shadow-lg shadow-indigo-900/30 transition-all duration-150 active:scale-95 hover:scale-[1.06] hover:from-indigo-400/85 hover:via-violet-400/85 hover:to-blue-400/85 focus-visible:ring-4 focus-visible:ring-indigo-300/40"
                                                        aria-label="Play Audio"
                                                        data-audio="{{ $it['sound'] }}"
                                                >
                                                    <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                        <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                    </svg>

                                                    <span class="wave-bar" style="animation-delay:.1s"></span>
                                                    <span class="wave-bar" style="animation-delay:.2s"></span>
                                                    <span class="wave-bar" style="animation-delay:.3s"></span>
                                                </button>
                                            </div>
                                        @endif

                                        <div class="relative z-10 flex items-start gap-3 pr-12">
                                            <div class="h-10 w-10 sm:h-11 sm:w-11 rounded-2xl flex items-center justify-center text-base sm:text-lg
                                                        border border-indigo-500/25 bg-indigo-500/10 text-indigo-700
                                                        dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200">
                                                {{ $it['icon'] }}
                                            </div>

                                            <div class="min-w-0">
                                                <div class="text-base sm:text-lg font-black tracking-[-0.02em] text-slate-700 dark:text-slate-100 leading-tight">
                                                    {{ $it['title'] }}
                                                </div>

                                                @if(($it['type'] ?? '') === 'chips')
                                                    <div class="mt-1.5 flex flex-wrap gap-1.5">
                                                        @foreach(($it['chips'] ?? []) as $chip)
                                                            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs sm:text-[13px] font-bold tracking-[-0.01em]
                                                                    border border-slate-200/70 bg-white/70 text-slate-700
                                                                    dark:border-slate-700/30 dark:bg-slate-900/25 dark:text-slate-200">
                                                                {{ $chip }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                @elseif(($it['type'] ?? '') === 'or')
                                                    <div class="mt-1 text-sm sm:text-[15px] font-bold text-slate-600 dark:text-slate-200/90 leading-[1.45]">
                                                        <span class="opacity-70">{{ $it['or'] }}</span>
                                                        <span class="font-black">{{ $it['alt'] }}</span>
                                                    </div>
                                                @else
                                                    <div class="mt-1 text-sm sm:text-[15px] font-bold text-slate-600 dark:text-slate-200/90 leading-[1.45]">
                                                        {{ $it['hint'] ?? '' }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </section>

                    <!-- Panel 2 -->
                    <section id="panel2" class="h-full lg:min-h-[76vh] p-3 sm:p-4 flex flex-col">
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex items-start gap-3">
                                <div class="h-10 w-10 rounded-2xl flex items-center justify-center text-lg
                                            border border-indigo-500/25 bg-indigo-500/10 text-indigo-700
                                            dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200">
                                    {{ $cd['header_icon'] }}
                                </div>
                                <div class="min-w-0">
                                    <h2 class="text-base sm:text-xl font-black tracking-[-0.02em] text-slate-700 dark:text-slate-100 leading-tight">
                                        {{ $cd['header_title'] }}
                                    </h2>
                                    <p class="mt-0.5 text-sm sm:text-[15px] font-bold text-slate-600 dark:text-slate-200/90 leading-[1.45]">
                                        How people can contact you.
                                    </p>
                                </div>
                            </div>

                            <div class="shrink-0 inline-flex items-center gap-2 rounded-full px-2.5 py-1 text-xs sm:text-[13px] font-black tracking-[0.18em] uppercase
                                        border border-slate-200/70 bg-white/60 text-slate-700
                                        dark:border-slate-700/30 dark:bg-slate-900/20 dark:text-slate-200">
                                <span class="inline-flex h-2 w-2 rounded-full bg-indigo-500/70"></span>
                                {{ $cd['badge'] }}
                            </div>
                        </div>

                        <div class="mt-3 flex-1 flex flex-col gap-2.5 sm:gap-3">
                            @foreach($cdItems as $it)
                                <article class="vocab-audio-card rounded-2xl border border-slate-200/70 bg-white/50 shadow-lg
                                        dark:border-slate-700/30 dark:bg-slate-900/20
                                        p-3.5 sm:p-4 relative overflow-hidden
                                        min-h-[78px] sm:min-h-[86px] lg:min-h-[90px] transition-all duration-200">

                                    <div class="pointer-events-none absolute inset-0 opacity-80
                                        bg-[radial-gradient(320px_200px_at_30%_20%,rgba(255,255,255,0.62),transparent_60%)]
                                        dark:bg-[radial-gradient(320px_200px_at_30%_20%,rgba(255,255,255,0.10),transparent_60%)]"></div>

                                    @if(!empty($it['sound']))
                                        <div class="absolute top-3 right-3 z-20">
                                            <button
                                                    type="button"
                                                    class="play-hit speak-btn inline-flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500/80 via-violet-500/80 to-blue-500/80 text-white backdrop-blur-md ring-1 ring-white/25 shadow-lg shadow-indigo-900/30 transition-all duration-150 active:scale-95 hover:scale-[1.06] hover:from-indigo-400/85 hover:via-violet-400/85 hover:to-blue-400/85 focus-visible:ring-4 focus-visible:ring-indigo-300/40"
                                                    aria-label="Play Audio"
                                                    data-audio="{{ $it['sound'] }}"
                                            >
                                                <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                </svg>

                                                <span class="wave-bar" style="animation-delay:.1s"></span>
                                                <span class="wave-bar" style="animation-delay:.2s"></span>
                                                <span class="wave-bar" style="animation-delay:.3s"></span>
                                            </button>
                                        </div>
                                    @endif

                                    <div class="relative z-10 flex items-start gap-3 pr-12">
                                        <div class="h-10 w-10 sm:h-11 sm:w-11 rounded-2xl flex items-center justify-center text-base sm:text-lg
                                                    border border-indigo-500/25 bg-indigo-500/10 text-indigo-700
                                                    dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200">
                                            {{ $it['icon'] }}
                                        </div>

                                        <div class="min-w-0">
                                            <div class="text-base sm:text-lg font-black tracking-[-0.02em] text-slate-700 dark:text-slate-100 leading-tight">
                                                {{ $it['title'] }}
                                            </div>

                                            @if(($it['type'] ?? '') === 'or')
                                                <div class="mt-1 text-sm sm:text-[15px] font-bold text-slate-600 dark:text-slate-200/90 leading-[1.45]">
                                                    <span class="opacity-70">{{ $it['or'] }}</span>
                                                    <span class="font-black">{{ $it['alt'] }}</span>
                                                </div>
                                            @else
                                                <div class="mt-1 text-sm sm:text-[15px] font-bold text-slate-600 dark:text-slate-200/90 leading-[1.45]">
                                                    {{ $it['hint'] ?? '' }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            @endforeach

                            <section id="exampleBox"
                                     class="rounded-[22px] border border-slate-200/70 bg-white/55 shadow-lg
                                            dark:border-slate-700/30 dark:bg-slate-950/25
                                            p-3.5 sm:p-4 flex-1 min-h-[160px]">

                                <div class="flex items-center justify-between gap-3">
                                    <div class="flex items-center gap-2">
                                        <span class="text-lg">{{ $cd['example']['icon'] }}</span>
                                        <h3 class="text-base sm:text-lg font-black tracking-[-0.02em] text-slate-700 dark:text-slate-100">
                                            {{ $cd['example']['title'] }}
                                        </h3>
                                    </div>

                                    <span class="inline-flex items-center gap-2 text-xs sm:text-[12px] font-black tracking-[0.18em] uppercase text-slate-600 dark:text-slate-200">
                                        <span class="inline-flex h-2 w-2 rounded-full bg-emerald-500/70 ring-4 ring-emerald-500/15 dark:bg-emerald-400/70 dark:ring-emerald-400/15"></span>
                                        Sample
                                    </span>
                                </div>

                                <p class="mt-1 text-sm sm:text-[15px] font-bold text-slate-600 dark:text-slate-200/90 leading-[1.45]">
                                    Use this format when you fill in a form.
                                </p>

                                <div class="mt-2.5 grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm sm:text-[15px] font-bold">
                                    @foreach($cd['example']['items'] as $row)
                                        <div class="rounded-2xl border border-slate-200/70 bg-white/50 shadow-sm
                                                dark:border-slate-700/30 dark:bg-slate-900/20 p-2.5 sm:p-3">
                                            <span class="text-slate-500 dark:text-slate-300/80">{{ $row['label'] }}</span>
                                            <span class="text-slate-700 dark:text-slate-100 font-black tracking-[-0.01em]">{{ $row['value'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        </div>
                    </section>

                </div>
            </section>

            <div class="h-6 sm:h-8 lg:hidden"></div>
        </div>
    </main>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const buttons = Array.from(document.querySelectorAll(".speak-btn"));
            const audioCards = Array.from(document.querySelectorAll(".vocab-audio-card"));

            const audio = new Audio();
            audio.preload = "auto";
            audio.crossOrigin = "anonymous";

            let currentBtn = null;
            let currentCard = null;
            let currentSrc = "";

            function setBtnState(btn, isPlaying){
                if(btn) btn.classList.toggle("speaking", isPlaying);
            }

            function setCardState(card, isPlaying){
                if (!card) return;
                card.classList.toggle("is-playing", isPlaying);
                card.classList.toggle("ring-2", isPlaying);
                card.classList.toggle("ring-indigo-500/30", isPlaying);
                card.classList.toggle("dark:ring-indigo-400/20", isPlaying);
            }

            function resetCurrent(){
                if(currentBtn) setBtnState(currentBtn, false);
                if(currentCard) setCardState(currentCard, false);
                currentBtn = null;
                currentCard = null;
                currentSrc = "";
            }

            function stopAudio(){
                try{
                    audio.pause();
                    audio.currentTime = 0;
                    audio.removeAttribute("src");
                    audio.load();
                }catch(e){}
                resetCurrent();
            }

            function playOrToggle(btn){
                const src = btn.getAttribute("data-audio") || "";
                const card = btn.closest(".vocab-audio-card");
                if(!src) return;

                if(currentSrc === src && !audio.paused){
                    stopAudio();
                    return;
                }

                stopAudio();

                currentBtn = btn;
                currentCard = card;
                currentSrc = src;

                setBtnState(currentBtn, true);
                setCardState(currentCard, true);

                try{
                    audio.src = src;
                    audio.currentTime = 0;
                    const playPromise = audio.play();
                    if(playPromise && typeof playPromise.catch === "function"){
                        playPromise.catch(() => stopAudio());
                    }
                }catch(e){
                    stopAudio();
                }
            }

            audio.addEventListener("ended", stopAudio);
            audio.addEventListener("error", stopAudio);

            buttons.forEach(btn => {
                btn.addEventListener("click", (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    playOrToggle(btn);
                });
            });

            document.addEventListener("visibilitychange", () => {
                if (document.hidden) stopAudio();
            });

            window.addEventListener("beforeunload", stopAudio);
            window.addEventListener("pagehide", stopAudio);

            document.addEventListener("click", (e) => {
                const nextTrigger = e.target.closest(
                    ".next-slide, [data-next-slide], .slide-next, .swiper-button-next, .splide__arrow--next"
                );

                if(nextTrigger){
                    stopAudio();
                }
            }, true);

            const observer = new MutationObserver(() => {
                if (currentBtn && !document.body.contains(currentBtn)) {
                    stopAudio();
                }
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });

            const reduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

            function playIn(){
                if (reduced || !window.gsap) return;

                const els = {
                    title: document.getElementById("titleBlock"),
                    wrap: document.getElementById("contentWrap"),
                    panel1: document.getElementById("panel1"),
                    panel2: document.getElementById("panel2"),
                    items: Array.from(document.querySelectorAll("article, #exampleBox"))
                };

                gsap.killTweensOf([els.title, els.wrap, els.panel1, els.panel2, ...els.items]);
                gsap.set([els.title, els.wrap, els.panel1, els.panel2], { opacity: 1, y: 0, scale: 1 });
                gsap.set(els.items, { opacity: 1, y: 0 });

                gsap.timeline({ defaults: { ease: "power3.out" } })
                    .from(els.title, { opacity: 0, y: 14, duration: 0.85 }, 0.10)
                    .from(els.wrap,  { opacity: 0, y: 12, duration: 0.8 }, 0.38)
                    .from([els.panel1, els.panel2], { opacity: 0, y: 12, duration: 0.65, stagger: 0.12 }, 0.58)
                    .from(els.items, { opacity: 0, y: 10, duration: 0.45, stagger: 0.02 }, 0.74);
            }

            window.stopSlideAudio = stopAudio;
            window.resetSlide = () => {
                stopAudio();
                playIn();
            };

            playIn();
        });
    </script>
@endsection
