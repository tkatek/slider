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
        'dob' => [
            'icon' => '🎂',
            'title' => 'Date of birth',
            'prefix' => '(',
            'abbr' => 'DOB',
            'suffix' => ')',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/date-of-birth.mp3'),
        ],
        'birth_place' => [
            'icon' => '📍',
            'title' => 'Place of birth',
            'alt' => 'City / Country',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/place-of-birth.mp3'),
        ],
        'nationality' => [
            'icon' => '🌍',
            'title' => 'Nationality',
            'alt' => 'e.g., American',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/nationality.mp3'),
        ],
        'gender' => [
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
        'phone' => [
            'icon' => '📱',
            'title' => 'Phone number',
            'or_label' => 'or',
            'alt' => 'Mobile number',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/phone-number.mp3'),
        ],
        'email' => [
            'icon' => '✉️',
            'title' => 'Email address',
            'example' => 'example@email.com',
            'sound' => materialAsset('slider/A1/Beginner/chapter-2/audios/slide6/email-address.mp3'),
        ],

        'example' => [
            'icon' => '👤',
            'title' => 'Example',
            'items' => [
                ['label' => 'Full name:', 'value' => 'Emily Johnson'],
                ['label' => 'DOB:', 'value' => '07/22/1998'],
                ['label' => 'Place of birth:', 'value' => 'Austin, Texas, USA'],
                ['label' => 'Nationality:', 'value' => 'American'],
                ['label' => 'Phone:', 'value' => '+1 (512) 555-0187'],
                ['label' => 'Email:', 'value' => 'emily.johnson@example.com'],
            ],
        ],
    ],
];
?>

@extends("slider.simple-layout")

@section("content")
    @php
        $pi = $content['personal_information'];
        $cd = $content['contact_details'];

        $piItems = [
            ['icon'=>$pi['first_name']['icon'], 'title'=>$pi['first_name']['title'], 'type'=>'or', 'or'=>$pi['first_name']['or_label'], 'alt'=>$pi['first_name']['alt'], 'sound'=>$pi['first_name']['sound']],
            ['icon'=>$pi['last_name']['icon'], 'title'=>$pi['last_name']['title'], 'type'=>'or', 'or'=>$pi['last_name']['or_label'], 'alt'=>$pi['last_name']['alt'], 'sound'=>$pi['last_name']['sound']],
            ['icon'=>$pi['full_name']['icon'], 'title'=>$pi['full_name']['title'], 'type'=>'hint', 'hint'=>$pi['full_name']['alt'], 'sound'=>$pi['full_name']['sound']],
            ['icon'=>$pi['dob']['icon'], 'title'=>$pi['dob']['title'], 'type'=>'hint', 'hint'=>$pi['dob']['prefix'].$pi['dob']['abbr'].$pi['dob']['suffix'], 'sound'=>$pi['dob']['sound']],
            ['icon'=>$pi['birth_place']['icon'], 'title'=>$pi['birth_place']['title'], 'type'=>'hint', 'hint'=>$pi['birth_place']['alt'], 'sound'=>$pi['birth_place']['sound']],
            ['icon'=>$pi['nationality']['icon'], 'title'=>$pi['nationality']['title'], 'type'=>'hint', 'hint'=>$pi['nationality']['alt'], 'sound'=>$pi['nationality']['sound']],
            ['icon'=>$pi['gender']['icon'], 'title'=>$pi['gender']['title'], 'type'=>'chips', 'chips'=>$pi['gender']['options'], 'wide'=>true, 'sound'=>$pi['gender']['sound']],
            ['icon'=>$pi['marital_status']['icon'], 'title'=>$pi['marital_status']['title'], 'type'=>'chips', 'chips'=>$pi['marital_status']['options'], 'wide'=>true, 'sound'=>$pi['marital_status']['sound']],
            ['icon'=>$pi['dependants']['icon'], 'title'=>$pi['dependants']['title'], 'type'=>'hint', 'hint'=>$pi['dependants']['alt'], 'wide'=>true, 'sound'=>$pi['dependants']['sound']],
        ];

        $cdItems = [
            ['icon'=>$cd['address']['icon'], 'title'=>$cd['address']['title'], 'type'=>'hint', 'hint'=>$cd['address']['alt'], 'sound'=>$cd['address']['sound']],
            ['icon'=>$cd['phone']['icon'], 'title'=>$cd['phone']['title'], 'type'=>'or', 'or'=>$cd['phone']['or_label'], 'alt'=>$cd['phone']['alt'], 'sound'=>$cd['phone']['sound']],
            ['icon'=>$cd['email']['icon'], 'title'=>$cd['email']['title'], 'type'=>'hint', 'hint'=>$cd['email']['example'], 'sound'=>$cd['email']['sound']],
        ];

        $audioButtonClass = 'border-white/20 bg-gradient-to-br from-indigo-500/80 via-violet-500/80 to-blue-500/80 text-white shadow-lg shadow-indigo-900/30 hover:scale-[1.06] hover:from-indigo-400/85 hover:via-violet-400/85 hover:to-blue-400/85';
    @endphp

    <main class="min-h-[100dvh] w-full overflow-x-hidden px-3 py-6 sm:px-6 sm:py-8 xl:flex xl:items-center xl:px-8 xl:py-6">
        <div class="mx-auto w-full max-w-[1380px]">
            <div id="titleBlock" class="my-5 text-center sm:my-7">
                <h1 class="mb-4 text-4xl font-black tracking-tight md:text-5xl lg:text-6xl">
                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                        New Vocabulary
                    </span>
                </h1>
            </div>

            <section id="contentWrap" class="p-1 sm:p-2">
                <div class="grid grid-cols-1 gap-3 sm:gap-4 xl:grid-cols-2 xl:items-start">
                    <section id="panel1" class="flex h-full flex-col p-2 sm:p-3">
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex min-w-0 items-start gap-3">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-2xl border border-indigo-500/25 bg-indigo-500/10 text-base text-indigo-700 dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200 sm:h-10 sm:w-10 sm:text-lg">
                                    {{ $pi['header_icon'] }}
                                </div>

                                <div class="min-w-0">
                                    <h2 class="text-base font-black leading-tight tracking-[-0.02em] text-slate-700 dark:text-slate-100 sm:text-xl">
                                        {{ $pi['header_title'] }}
                                    </h2>
                                    <p class="mt-0.5 text-xs font-bold leading-snug text-slate-600 dark:text-slate-200/90 sm:text-sm">
                                        Names, identity, and basic details.
                                    </p>
                                </div>
                            </div>

                            <div class="inline-flex shrink-0 items-center gap-2 rounded-full border border-slate-200/70 bg-white/60 px-2.5 py-1 text-xs font-black uppercase tracking-[0.18em] text-slate-700 dark:border-slate-700/30 dark:bg-slate-900/20 dark:text-slate-200">
                                <span class="inline-flex h-2 w-2 rounded-full bg-indigo-500/70"></span>
                                {{ $pi['badge'] }}
                            </div>
                        </div>

                        <div class="mt-3 flex-1">
                            <div class="grid grid-cols-1 gap-2.5 sm:grid-cols-2 sm:gap-3">
                                @foreach($piItems as $it)
                                    <article class="vocab-audio-card relative min-h-[72px] overflow-hidden rounded-2xl border border-slate-200/70 bg-white/50 p-3 shadow-lg transition-all duration-200 dark:border-slate-700/30 dark:bg-slate-900/20 sm:min-h-[78px] sm:p-3.5 {{ !empty($it['wide']) ? 'sm:col-span-2' : '' }}">
                                        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(320px_200px_at_30%_20%,rgba(255,255,255,0.62),transparent_60%)] opacity-80 dark:bg-[radial-gradient(320px_200px_at_30%_20%,rgba(255,255,255,0.10),transparent_60%)]"></div>

                                        @if(!empty($it['sound']))
                                            <button type="button" class="speak-btn absolute right-2.5 top-2.5 z-20 inline-flex h-8 w-8 items-center justify-center rounded-full border backdrop-blur-md ring-1 ring-white/25 transition-all duration-150 active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-300/40 sm:right-3 sm:top-3 {{ $audioButtonClass }}" aria-label="Play Audio" data-audio="{{ $it['sound'] }}">
                                                <svg class="js-static-icon h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                </svg>

                                                <span class="js-wave-wrap hidden items-center gap-0.5" aria-hidden="true">
                                                    <span class="h-1.5 w-[2px] animate-pulse rounded-full bg-current"></span>
                                                    <span class="h-3.5 w-[2px] animate-pulse rounded-full bg-current [animation-delay:120ms]"></span>
                                                    <span class="h-2.5 w-[2px] animate-pulse rounded-full bg-current [animation-delay:240ms]"></span>
                                                </span>
                                            </button>
                                        @endif

                                        <div class="relative z-10 flex min-w-0 items-start gap-2.5 pr-10 sm:gap-3">
                                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl border border-indigo-500/25 bg-indigo-500/10 text-sm text-indigo-700 dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200 sm:h-9 sm:w-9 sm:text-base">
                                                {{ $it['icon'] }}
                                            </div>

                                            <div class="min-w-0">
                                                <div class="break-words text-[15px] font-black leading-tight tracking-[-0.02em] text-slate-700 dark:text-slate-100 sm:text-base">
                                                    {{ $it['title'] }}
                                                </div>

                                                @if(($it['type'] ?? '') === 'chips')
                                                    <div class="mt-1.5 flex flex-wrap gap-1.5">
                                                        @foreach(($it['chips'] ?? []) as $chip)
                                                            <span class="inline-flex items-center rounded-full border border-slate-200/70 bg-white/70 px-2 py-0.5 text-xs font-bold tracking-[-0.01em] text-slate-700 dark:border-slate-700/30 dark:bg-slate-900/25 dark:text-slate-200">
                                                                {{ $chip }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                @elseif(($it['type'] ?? '') === 'or')
                                                    <div class="mt-1 text-xs font-bold leading-snug text-slate-600 dark:text-slate-200/90 sm:text-sm">
                                                        <span class="opacity-70">{{ $it['or'] }}</span>
                                                        <span class="font-black">{{ $it['alt'] }}</span>
                                                    </div>
                                                @else
                                                    <div class="mt-1 text-xs font-bold leading-snug text-slate-600 dark:text-slate-200/90 sm:text-sm">
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

                    <section id="panel2" class="flex h-full flex-col p-2 sm:p-3">
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex min-w-0 items-start gap-3">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-2xl border border-indigo-500/25 bg-indigo-500/10 text-base text-indigo-700 dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200 sm:h-10 sm:w-10 sm:text-lg">
                                    {{ $cd['header_icon'] }}
                                </div>

                                <div class="min-w-0">
                                    <h2 class="text-base font-black leading-tight tracking-[-0.02em] text-slate-700 dark:text-slate-100 sm:text-xl">
                                        {{ $cd['header_title'] }}
                                    </h2>
                                    <p class="mt-0.5 text-xs font-bold leading-snug text-slate-600 dark:text-slate-200/90 sm:text-sm">
                                        How people can contact you.
                                    </p>
                                </div>
                            </div>

                            <div class="inline-flex shrink-0 items-center gap-2 rounded-full border border-slate-200/70 bg-white/60 px-2.5 py-1 text-xs font-black uppercase tracking-[0.18em] text-slate-700 dark:border-slate-700/30 dark:bg-slate-900/20 dark:text-slate-200">
                                <span class="inline-flex h-2 w-2 rounded-full bg-indigo-500/70"></span>
                                {{ $cd['badge'] }}
                            </div>
                        </div>

                        <div class="mt-3 flex flex-1 flex-col gap-2.5 sm:gap-3">
                            @foreach($cdItems as $it)
                                <article class="vocab-audio-card relative min-h-[72px] overflow-hidden rounded-2xl border border-slate-200/70 bg-white/50 p-3 shadow-lg transition-all duration-200 dark:border-slate-700/30 dark:bg-slate-900/20 sm:min-h-[78px] sm:p-3.5">
                                    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(320px_200px_at_30%_20%,rgba(255,255,255,0.62),transparent_60%)] opacity-80 dark:bg-[radial-gradient(320px_200px_at_30%_20%,rgba(255,255,255,0.10),transparent_60%)]"></div>

                                    @if(!empty($it['sound']))
                                        <button type="button" class="speak-btn absolute right-2.5 top-2.5 z-20 inline-flex h-8 w-8 items-center justify-center rounded-full border backdrop-blur-md ring-1 ring-white/25 transition-all duration-150 active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-300/40 sm:right-3 sm:top-3 {{ $audioButtonClass }}" aria-label="Play Audio" data-audio="{{ $it['sound'] }}">
                                            <svg class="js-static-icon h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>

                                            <span class="js-wave-wrap hidden items-center gap-0.5" aria-hidden="true">
                                                <span class="h-1.5 w-[2px] animate-pulse rounded-full bg-current"></span>
                                                <span class="h-3.5 w-[2px] animate-pulse rounded-full bg-current [animation-delay:120ms]"></span>
                                                <span class="h-2.5 w-[2px] animate-pulse rounded-full bg-current [animation-delay:240ms]"></span>
                                            </span>
                                        </button>
                                    @endif

                                    <div class="relative z-10 flex min-w-0 items-start gap-2.5 pr-10 sm:gap-3">
                                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl border border-indigo-500/25 bg-indigo-500/10 text-sm text-indigo-700 dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200 sm:h-9 sm:w-9 sm:text-base">
                                            {{ $it['icon'] }}
                                        </div>

                                        <div class="min-w-0">
                                            <div class="break-words text-[15px] font-black leading-tight tracking-[-0.02em] text-slate-700 dark:text-slate-100 sm:text-base">
                                                {{ $it['title'] }}
                                            </div>

                                            @if(($it['type'] ?? '') === 'or')
                                                <div class="mt-1 text-xs font-bold leading-snug text-slate-600 dark:text-slate-200/90 sm:text-sm">
                                                    <span class="opacity-70">{{ $it['or'] }}</span>
                                                    <span class="font-black">{{ $it['alt'] }}</span>
                                                </div>
                                            @else
                                                <div class="mt-1 text-xs font-bold leading-snug text-slate-600 dark:text-slate-200/90 sm:text-sm">
                                                    {{ $it['hint'] ?? '' }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            @endforeach

                            <section id="exampleBox" class="min-h-[150px] flex-1 rounded-[22px] border border-slate-200/70 bg-white/55 p-3 shadow-lg dark:border-slate-700/30 dark:bg-slate-950/25 sm:p-3.5">
                                <div class="flex items-center justify-between gap-3">
                                    <div class="flex min-w-0 items-center gap-2">
                                        <span class="text-base sm:text-lg">{{ $cd['example']['icon'] }}</span>
                                        <h3 class="text-base font-black tracking-[-0.02em] text-slate-700 dark:text-slate-100">
                                            {{ $cd['example']['title'] }}
                                        </h3>
                                    </div>

                                    <span class="inline-flex items-center gap-2 text-xs font-black uppercase tracking-[0.18em] text-slate-600 dark:text-slate-200">
                                        <span class="inline-flex h-2 w-2 rounded-full bg-emerald-500/70 ring-4 ring-emerald-500/15 dark:bg-emerald-400/70 dark:ring-emerald-400/15"></span>
                                        Sample
                                    </span>
                                </div>

                                <p class="mt-1 text-xs font-bold leading-snug text-slate-600 dark:text-slate-200/90 sm:text-sm">
                                    Use this format when you fill in a form.
                                </p>

                                <div class="mt-2.5 grid grid-cols-1 gap-2 text-xs font-bold sm:grid-cols-2 sm:text-sm xl:grid-cols-1 2xl:grid-cols-2">
                                    @foreach($cd['example']['items'] as $row)
                                        <div class="rounded-2xl border border-slate-200/70 bg-white/50 p-2.5 shadow-sm dark:border-slate-700/30 dark:bg-slate-900/20">
                                            <span class="text-slate-500 dark:text-slate-300/80">{{ $row['label'] }}</span>
                                            <span class="font-black tracking-[-0.01em] text-slate-700 dark:text-slate-100">{{ $row['value'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        </div>
                    </section>
                </div>
            </section>

            <div class="h-6 sm:h-8 xl:hidden"></div>
        </div>
    </main>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const buttons = Array.from(document.querySelectorAll(".speak-btn"));
            const audio = new Audio();

            audio.preload = "auto";

            let currentBtn = null;
            let currentCard = null;
            let currentSrc = "";

            const playingCardClasses = [
                "ring-2",
                "ring-indigo-500/30",
                "dark:ring-indigo-400/20",
                "shadow-[0_18px_32px_rgba(15,23,42,.10)]"
            ];

            function setButtonState(button, isPlaying) {
                if (!button) return;

                button.querySelector(".js-static-icon")?.classList.toggle("hidden", isPlaying);
                button.querySelector(".js-wave-wrap")?.classList.toggle("hidden", !isPlaying);
                button.querySelector(".js-wave-wrap")?.classList.toggle("flex", isPlaying);
            }

            function setCardState(card, isPlaying) {
                if (!card) return;

                playingCardClasses.forEach((className) => {
                    card.classList.toggle(className, isPlaying);
                });
            }

            function resetCurrent() {
                setButtonState(currentBtn, false);
                setCardState(currentCard, false);
                currentBtn = null;
                currentCard = null;
                currentSrc = "";
            }

            function stopAudio() {
                try {
                    audio.pause();
                    audio.currentTime = 0;
                    audio.removeAttribute("src");
                    audio.load();
                } catch (e) {}

                resetCurrent();
            }

            function playOrToggle(button) {
                const src = button.dataset.audio || "";
                const card = button.closest(".vocab-audio-card");

                if (!src) return;

                if (currentSrc === src && !audio.paused) {
                    stopAudio();
                    return;
                }

                stopAudio();

                currentBtn = button;
                currentCard = card;
                currentSrc = src;

                setButtonState(currentBtn, true);
                setCardState(currentCard, true);

                try {
                    audio.src = src;
                    audio.currentTime = 0;

                    const playPromise = audio.play();

                    if (playPromise && typeof playPromise.catch === "function") {
                        playPromise.catch(() => stopAudio());
                    }
                } catch (e) {
                    stopAudio();
                }
            }

            buttons.forEach((button) => {
                button.addEventListener("click", (event) => {
                    event.preventDefault();
                    event.stopPropagation();
                    playOrToggle(button);
                });
            });

            audio.addEventListener("ended", stopAudio);
            audio.addEventListener("error", stopAudio);

            document.addEventListener("visibilitychange", () => {
                if (document.hidden) stopAudio();
            });

            window.addEventListener("beforeunload", stopAudio);
            window.addEventListener("pagehide", stopAudio);

            const observer = new MutationObserver(() => {
                if (currentBtn && !document.body.contains(currentBtn)) {
                    stopAudio();
                }
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true,
            });

            window.stopSlideAudio = stopAudio;
            window.resetSlide = stopAudio;
        });
    </script>
@endsection