<?php

$content = [
    'page_title' => 'What Would You Do If?',
    'title'      => 'What Would You Do If?',
    'subtitle'   => 'Choose one situation and explain your response.',

    'instruction' => 'Each student answers in 4-6 sentences, using natural fillers (Well..., I guess...) and reactions.',

    'scenarios' => [
        [
            'title' => 'Public Challenge',
            'text'  => 'Someone challenges your opinion publicly.',
        ],
        [
            'title' => 'Unquestioned Belief',
            'text'  => "You're asked to explain a belief you never questioned before.",
        ],
        [
            'title' => 'Professional Disagreement',
            'text'  => 'You disagree but want to stay professional.',
        ],
    ],

    'useful_phrases' => [
        'Well...',
        'I guess...',
        'I see what you mean.',
        'That is a fair point.',
        'From my perspective...',
        'I understand your point, but...',
    ],
];

$theme = $theme ?? [];
$buttonGradient = $theme['button_primary_color'] ?? 'bg-gradient-to-r from-stone-700 via-stone-600 to-zinc-700';
$primaryGradient = $theme['primary_color'] ?? 'bg-gradient-to-r from-indigo-500 to-blue-500';
$themeAccent = $theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500'; 

?>

@extends('slider.simple-layout')

@section('content')
    <main class="flex min-h-[100dvh] w-full items-center justify-center px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="w-full max-w-6xl">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-5 rounded-3xl border border-slate-200 bg-white p-4 shadow-lg shadow-slate-200/60 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20 sm:p-5">
                <div class="grid grid-cols-3 gap-2 sm:gap-3">
                    @foreach($content['scenarios'] as $index => $scenario)
                        <button
                                type="button"
                                class="scenario-card group relative min-h-[4.8rem] overflow-hidden rounded-2xl border border-slate-200 bg-white p-2 text-center shadow-sm shadow-slate-200/70 transition duration-200 hover:-translate-y-0.5 hover:border-slate-300 hover:shadow-lg hover:shadow-slate-200/80 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-slate-300/70 dark:border-slate-700 dark:bg-slate-950 dark:shadow-slate-950/20 dark:hover:border-slate-600 dark:hover:shadow-slate-950/30 sm:min-h-[6.4rem] sm:p-3"
                                data-index="{{ $index }}"
                        >
                            <span class="pointer-events-none absolute inset-x-0 top-0 h-1.5 {{ $themeAccent }}"></span>

                            <span class="relative mx-auto mt-1 flex h-9 w-9 items-center justify-center rounded-xl text-xl font-black text-white shadow-sm sm:h-11 sm:w-11 sm:text-2xl {{ $themeAccent }}">
                                {{ $index + 1 }}
                            </span>
                            <span class="relative mx-auto mt-2 block max-w-[7rem] text-[0.62rem] font-black uppercase leading-tight tracking-[0.08em] text-slate-800 dark:text-slate-100 sm:max-w-[10rem] sm:text-xs sm:tracking-[0.12em]">
                                {{ $scenario['title'] }}
                            </span>
                        </button>
                    @endforeach
                </div>

                <div class="relative mt-4 overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-950">
                    <span class="pointer-events-none absolute inset-x-0 top-0 h-1 {{ $themeAccent }}"></span>

                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <div>
                            <p id="selectedTitle" class="bg-clip-text text-xs font-black uppercase tracking-[0.18em] text-transparent {{ $primaryGradient }}">
                                {{ $content['scenarios'][0]['title'] }}
                            </p>
                            <p id="selectedText" class="mt-2 max-w-4xl text-lg font-black leading-snug text-slate-800 dark:text-slate-100 sm:text-xl">
                                {{ $content['scenarios'][0]['text'] }}
                            </p>
                            <p class="mt-2 text-sm font-bold leading-snug text-slate-600 dark:text-slate-300">
                                <span class="bg-clip-text font-black text-transparent {{ $primaryGradient }}">Practice:</span>
                                <span id="selectedInstructionText">{{ $content['instruction'] }}</span>
                            </p>
                        </div>

                        <span id="selectedNumber" class="rounded-full px-3 py-1 text-xs font-black text-white shadow-sm {{ $themeAccent }}">
                            Situation 1
                        </span>
                    </div>

                    <label class="mt-4 block">
                        <span id="responseLabel" class="mb-2 block bg-clip-text text-xs font-black uppercase tracking-[0.18em] text-transparent {{ $primaryGradient }}">
                            Response 1
                        </span>
                        <textarea
                                id="responseInput"
                                class="h-36 w-full resize-none rounded-2xl border-2 border-slate-200 bg-white px-4 py-3 text-sm font-bold leading-snug text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-slate-500 focus:ring-4 focus:ring-slate-500/10 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-50 dark:focus:border-slate-300 sm:h-40 sm:text-base"
                                placeholder="Well, I guess..."
                        ></textarea>
                    </label>

                    <div class="mt-3 flex justify-end">
                        <button
                                type="button"
                                id="clearResponseBtn"
                                class="rounded-xl {{ $buttonGradient }} px-4 py-2 text-sm font-black text-white shadow-md transition hover:-translate-y-0.5 hover:shadow-lg"
                        >
                            Clear
                        </button>
                    </div>
                </div>

                <div class="mt-4">
                    <p class="bg-clip-text text-xs font-black uppercase tracking-[0.18em] text-transparent {{ $primaryGradient }}">
                        Useful language
                    </p>

                    <div class="mt-2 flex flex-wrap gap-2">
                        @foreach($content['useful_phrases'] as $phrase)
                            <button
                                    type="button"
                                    class="phrase-chip rounded-full border border-slate-200 bg-white px-3 py-1.5 text-xs font-black text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:border-slate-300 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-200 dark:hover:border-slate-600 dark:hover:bg-slate-900"
                                    data-phrase="{{ $phrase }}"
                            >
                                {{ $phrase }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const scenarios = @json($content['scenarios']);
            const storageKey = `scenario-response-${window.location.pathname}`;

            const cards = Array.from(document.querySelectorAll('.scenario-card'));
            const chips = Array.from(document.querySelectorAll('.phrase-chip'));
            const selectedNumber = document.getElementById('selectedNumber');
            const selectedTitle = document.getElementById('selectedTitle');
            const selectedText = document.getElementById('selectedText');
            const selectedInstructionText = document.getElementById('selectedInstructionText');
            const responseLabel = document.getElementById('responseLabel');
            const responseInput = document.getElementById('responseInput');
            const clearResponseBtn = document.getElementById('clearResponseBtn');

            let selectedIndex = 0;
            let responses = {};

            const selectedClasses = ['-translate-y-0.5', 'scale-[1.02]', 'ring-4', 'ring-slate-300/80', 'shadow-lg', 'shadow-slate-300/30', 'dark:ring-white/25'];

            const saveCurrentResponse = () => {
                responses[selectedIndex] = responseInput.value;
            };

            const saveState = () => {
                localStorage.setItem(storageKey, JSON.stringify({
                    selectedIndex,
                    responses,
                }));
            };

            const setSelectedScenario = (index, shouldSaveCurrent = true) => {
                if (shouldSaveCurrent) {
                    saveCurrentResponse();
                }

                selectedIndex = Number(index) || 0;
                const scenario = scenarios[selectedIndex] || scenarios[0];

                selectedNumber.textContent = `Situation ${selectedIndex + 1}`;
                responseLabel.textContent = `Response ${selectedIndex + 1}`;
                selectedTitle.textContent = scenario.title || '';
                selectedTitle.className = 'bg-clip-text text-xs font-black uppercase tracking-[0.18em] text-transparent {{ $primaryGradient }}';
                selectedText.textContent = scenario.text || '';
                selectedInstructionText.textContent = @json($content['instruction']);
                responseInput.value = responses[selectedIndex] || '';

                cards.forEach((card, cardIndex) => {
                    const isActive = cardIndex === selectedIndex;

                    card.classList.toggle('is-active', isActive);
                    card.classList.remove(...selectedClasses);

                    if (isActive) {
                        card.classList.add(...selectedClasses);
                    }
                });

                saveState();
            };

            try {
                const saved = JSON.parse(localStorage.getItem(storageKey) || '{}');
                if (Number.isInteger(saved.selectedIndex)) selectedIndex = saved.selectedIndex;
                if (saved.responses && typeof saved.responses === 'object') responses = saved.responses;
                if (typeof saved.response === 'string') responses[selectedIndex] = saved.response;
            } catch (error) {}

            cards.forEach((card) => {
                card.addEventListener('click', () => setSelectedScenario(card.dataset.index));
            });

            chips.forEach((chip) => {
                chip.addEventListener('click', () => {
                    const phrase = chip.dataset.phrase || chip.textContent.trim();
                    const insert = responseInput.value.trim() === '' ? phrase : ` ${phrase}`;

                    responseInput.focus();
                    responseInput.value += insert;
                    saveCurrentResponse();
                    saveState();
                });
            });

            responseInput.addEventListener('input', () => {
                saveCurrentResponse();
                saveState();
            });

            clearResponseBtn?.addEventListener('click', () => {
                responseInput.value = '';
                saveCurrentResponse(); 
                saveState();
            });

            window.resetSlide = () => {
                selectedIndex = 0;
                responses = {};
                responseInput.value = '';
                localStorage.removeItem(storageKey);
                setSelectedScenario(0, false);
            };

            setSelectedScenario(selectedIndex, false);
        });
    </script>
@endsection
