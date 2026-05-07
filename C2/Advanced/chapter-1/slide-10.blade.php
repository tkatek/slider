<?php

$content = [
    'page_title' => 'What Would You Do If?',
    'title'      => 'What Would You Do If?',
    'subtitle'   => 'Choose a situation and prepare a thoughtful 4-6 sentence response.',

    'instruction' => 'Use natural fillers, softening language, and clear reactions.',

    'scenarios' => [
        [
            'title' => 'Respectful disagreement',
            'text'  => 'You strongly disagree with a respected colleague.',
            'focus' => 'Soften your disagreement while keeping your point clear.',
            'number_class' => 'bg-gradient-to-br from-sky-500 to-blue-600',
            'title_class' => 'text-blue-700 dark:text-blue-300',
        ],
        [
            'title' => 'Limited knowledge',
            'text'  => "You're asked an opinion on a topic you don't fully understand.",
            'focus' => 'Acknowledge limits and ask for clarification.',
            'number_class' => 'bg-gradient-to-br from-violet-500 to-fuchsia-600',
            'title_class' => 'text-fuchsia-700 dark:text-fuchsia-300',
        ],
        [
            'title' => 'Emotional discussion',
            'text'  => 'A discussion becomes too emotional.',
            'focus' => 'De-escalate the conversation and bring it back to the issue.',
            'number_class' => 'bg-gradient-to-br from-emerald-500 to-teal-600',
            'title_class' => 'text-emerald-700 dark:text-emerald-300',
        ],
    ],

    'useful_phrases' => [
        'To some extent...',
        'I can see why you might say that...',
        'I would not want to overstate this, but...',
        'Could we clarify what we mean by...?',
        'Maybe we should take a step back.',
        'It depends on the context.',
    ],
];

$theme = $theme ?? [];
$buttonGradient = $theme['button_primary_color'] ?? 'bg-gradient-to-r from-stone-700 via-stone-600 to-zinc-700';

?>

@extends('slider.simple-layout')

@section('content')
    <main class="flex min-h-[100dvh] w-full items-center justify-center px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="w-full max-w-6xl">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-5 rounded-3xl border border-slate-200 bg-white p-4 shadow-lg shadow-slate-200/60 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20 sm:p-5">
                <div class="grid gap-3 lg:grid-cols-3">
                    @foreach($content['scenarios'] as $index => $scenario)
                        <button
                                type="button"
                                class="scenario-card rounded-2xl border border-slate-200 bg-slate-50 p-3 text-left transition hover:border-slate-300 hover:bg-white dark:border-slate-700 dark:bg-slate-950 dark:hover:border-slate-600 dark:hover:bg-slate-900 sm:p-4"
                                data-index="{{ $index }}"
                        >
                            <span class="flex h-8 w-8 items-center justify-center rounded-xl text-sm font-black text-white shadow-sm {{ $scenario['number_class'] }}">
                                {{ $index + 1 }}
                            </span>
                            <span class="mt-3 block text-sm font-black uppercase tracking-wide {{ $scenario['title_class'] }}">
                                {{ $scenario['title'] }}
                            </span>
                            <span class="mt-1 block text-sm font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-[0.95rem]">
                                {{ $scenario['text'] }}
                            </span>
                        </button>
                    @endforeach
                </div>

                <div class="mt-4 rounded-2xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-950">
                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <div>
                            <p id="selectedTitle" class="text-sm font-black uppercase tracking-wide text-blue-700 dark:text-blue-300">
                                {{ $content['scenarios'][0]['title'] }}
                            </p>
                            <p id="selectedText" class="mt-1 text-lg font-black leading-snug text-slate-950 dark:text-slate-50 sm:text-xl">
                                {{ $content['scenarios'][0]['text'] }}
                            </p>
                            <p id="selectedFocus" class="mt-1 text-sm font-bold leading-snug text-slate-600 dark:text-slate-300">
                                Goal: {{ $content['scenarios'][0]['focus'] }}
                            </p>
                        </div>

                        <span id="selectedNumber" class="rounded-full bg-white px-3 py-1 text-xs font-black text-slate-700 shadow-sm dark:bg-slate-900 dark:text-slate-200">
                            Situation 1
                        </span>
                    </div>

                    <label class="mt-4 block">
                        <span class="mb-2 block text-xs font-black uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">
                            Your 4-6 sentence response
                        </span>
                        <textarea
                                id="responseInput"
                                class="h-36 w-full resize-none rounded-2xl border-2 border-slate-200 bg-white px-4 py-3 text-sm font-bold leading-snug text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-slate-500 focus:ring-4 focus:ring-slate-500/10 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-50 dark:focus:border-slate-300 sm:h-40 sm:text-base"
                                placeholder="Well, I suppose I would..."
                        ></textarea>
                    </label>

                    <div class="mt-3 flex flex-wrap items-center justify-between gap-3">
                        <p id="sentenceCounter" class="text-xs font-black text-slate-500 dark:text-slate-400">
                            0 sentences
                        </p>

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
                    <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">
                        Useful language
                    </p>

                    <div class="mt-2 flex flex-wrap gap-2">
                        @foreach($content['useful_phrases'] as $phrase)
                            <button
                                    type="button"
                                    class="phrase-chip rounded-full border border-slate-200 bg-white px-3 py-1.5 text-xs font-black text-slate-700 transition hover:border-slate-300 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-200 dark:hover:border-slate-600 dark:hover:bg-slate-900"
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
            const selectedFocus = document.getElementById('selectedFocus');
            const responseInput = document.getElementById('responseInput');
            const sentenceCounter = document.getElementById('sentenceCounter');
            const clearResponseBtn = document.getElementById('clearResponseBtn');

            let selectedIndex = 0;

            const selectedClasses = ['border-slate-400', 'bg-white', 'shadow-sm', 'ring-2', 'ring-slate-200', 'dark:border-slate-500', 'dark:bg-slate-900', 'dark:ring-slate-700'];

            const countSentences = (text) => {
                const matches = String(text || '').trim().match(/[^.!?]+[.!?]+|[^.!?]+$/g);
                return matches ? matches.filter((sentence) => sentence.trim() !== '').length : 0;
            };

            const updateCounter = () => {
                const count = countSentences(responseInput.value);
                sentenceCounter.textContent = `${count} sentence${count === 1 ? '' : 's'}`;
            };

            const saveState = () => {
                localStorage.setItem(storageKey, JSON.stringify({
                    selectedIndex,
                    response: responseInput.value,
                }));
            };

            const setSelectedScenario = (index) => {
                selectedIndex = Number(index) || 0;
                const scenario = scenarios[selectedIndex] || scenarios[0];

                selectedNumber.textContent = `Situation ${selectedIndex + 1}`;
                selectedTitle.textContent = scenario.title || '';
                selectedTitle.className = `text-sm font-black uppercase tracking-wide ${scenario.title_class || 'text-slate-700 dark:text-slate-300'}`;
                selectedText.textContent = scenario.text || '';
                selectedFocus.textContent = `Goal: ${scenario.focus || ''}`;

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
                if (typeof saved.response === 'string') responseInput.value = saved.response;
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
                    updateCounter();
                    saveState();
                });
            });

            responseInput.addEventListener('input', () => {
                updateCounter();
                saveState();
            });

            clearResponseBtn?.addEventListener('click', () => {
                responseInput.value = '';
                updateCounter();
                saveState();
            });

            window.resetSlide = () => {
                selectedIndex = 0;
                responseInput.value = '';
                localStorage.removeItem(storageKey);
                setSelectedScenario(0);
                updateCounter();
            };

            setSelectedScenario(selectedIndex);
            updateCounter();
        });
    </script>
@endsection
