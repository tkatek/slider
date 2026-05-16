@extends('slider.simple-layout')

@section('content')
    @php
        $content = is_array($content ?? null) ? $content : [];
        $theme = $theme ?? [];

        $content['subtitle'] = $content['subtitle'] ?? 'Choose one situation and write your response.';

        $titleGradient = $theme['title_gradient_class']
            ?? 'bg-gradient-to-r from-indigo-600 via-blue-600 to-sky-500 bg-clip-text text-transparent';

        $buttonGradient = $theme['button_gradient_class']
            ?? 'bg-gradient-to-r from-indigo-600 to-blue-600';

        $ringAccent = $theme['ring_accent_class']
            ?? 'focus:border-indigo-500 focus:ring-indigo-500/10 dark:focus:border-indigo-300';

        $activeTabClasses = $buttonGradient . ' border-transparent text-white shadow-sm shadow-indigo-500/20';
        $inactiveTabClasses = 'border-slate-200 bg-white text-slate-500 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800';

        $fillers = [
            'Well ...',
            'I guess ...',
            'I see your point.',
            'That is interesting.',
            'From my perspective ...',
        ];
    @endphp

    <main class="flex min-h-[100dvh] w-full items-center justify-center px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="w-full max-w-5xl">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-5 rounded-[1.5rem] border border-slate-200 bg-white/80 p-4 shadow-sm backdrop-blur dark:border-slate-700 dark:bg-slate-900/75 sm:p-5">
                <div class="grid gap-4 lg:grid-cols-[0.82fr_1.18fr]">

                    <aside class="rounded-3xl bg-slate-50 p-3 dark:bg-slate-950/60 sm:p-4">
                        <p class="mb-3 text-xs font-black uppercase tracking-[0.16em] text-slate-400 dark:text-slate-500">
                            Situations
                        </p>

                        <div class="space-y-2">
                            @foreach($content['situations'] ?? [] as $index => $situation)
                                <button
                                        type="button"
                                        data-situation-tab="{{ $index }}"
                                        class="w-full rounded-2xl border px-4 py-3 text-left text-sm font-black leading-snug transition sm:text-base {{ $index === 0 ? $activeTabClasses : $inactiveTabClasses }}"
                                >
                                    <span class="mr-2 opacity-70">0{{ $index + 1 }}</span>
                                    {{ $situation }}
                                </button>
                            @endforeach
                        </div>
                    </aside>

                    <section>
                        <div class="mb-3 flex items-start justify-between gap-3">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.16em] text-slate-400 dark:text-slate-500">
                                    Response
                                </p>

                                <h2 class="{{ $titleGradient }} mt-1 text-xl font-black tracking-[-0.02em] sm:text-2xl">
                                    What would you say?
                                </h2>
                            </div>

                            <button
                                    type="button"
                                    id="clearResponseBtn"
                                    class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-black text-slate-500 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800"
                            >
                                Clear
                            </button>
                        </div>

                        @foreach($content['situations'] ?? [] as $index => $situation)
                            <div
                                    data-situation-panel="{{ $index }}"
                                    class="{{ $index === 0 ? 'block' : 'hidden' }}"
                            >
                                <div class="rounded-3xl bg-slate-50 p-4 dark:bg-slate-950/60 sm:p-5">
                                    <p class="text-base font-black leading-[1.5] text-slate-900 dark:text-slate-50 sm:text-lg">
                                        {{ $situation }}
                                    </p>

                                    <p class="mt-2 text-sm font-bold leading-snug text-slate-500 dark:text-slate-400">
                                        {{ $content['instruction'] ?? '' }}
                                    </p>

                                    <textarea
                                            name="response_{{ $index }}"
                                            data-response-box="{{ $index }}"
                                            rows="8"
                                            placeholder="Well ... I guess ..."
                                            class="mt-4 min-h-[15rem] w-full resize-none rounded-3xl border-2 border-slate-200 bg-white px-5 py-4 text-base font-bold leading-[1.6] text-slate-900 outline-none transition placeholder:text-slate-400 focus:ring-4 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-50 {{ $ringAccent }}"
                                    ></textarea>

                                    <div class="mt-3 flex flex-wrap items-center justify-between gap-2">
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($fillers as $filler)
                                                <button
                                                        type="button"
                                                        data-filler="{{ $filler }}"
                                                        data-filler-target="{{ $index }}"
                                                        class="rounded-full border border-slate-200 bg-white px-3 py-1.5 text-xs font-black text-slate-500 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800"
                                                >
                                                    {{ $filler }}
                                                </button>
                                            @endforeach
                                        </div>

                                        <span
                                                data-sentence-counter="{{ $index }}"
                                                class="rounded-full bg-white px-3 py-1 text-xs font-black text-slate-500 dark:bg-slate-900 dark:text-slate-300"
                                        >
                                            0 sentences
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const storageKey = `what-if-response-${window.location.pathname}`;

            const tabs = Array.from(document.querySelectorAll('[data-situation-tab]'));
            const panels = Array.from(document.querySelectorAll('[data-situation-panel]'));
            const textareas = Array.from(document.querySelectorAll('[data-response-box]'));
            const counters = Array.from(document.querySelectorAll('[data-sentence-counter]'));
            const fillerButtons = Array.from(document.querySelectorAll('[data-filler]'));
            const clearButton = document.getElementById('clearResponseBtn');

            const activeTabClasses = @json(explode(' ', $activeTabClasses));
            const inactiveTabClasses = @json(explode(' ', $inactiveTabClasses));

            let activeIndex = 0;

            const countSentences = (text) => {
                return text
                    .split(/[.!?]+/)
                    .map(sentence => sentence.trim())
                    .filter(Boolean)
                    .length;
            };

            const updateCounter = (textarea) => {
                const index = Number(textarea.dataset.responseBox);
                const count = countSentences(textarea.value);
                const counter = counters.find(item => Number(item.dataset.sentenceCounter) === index);

                if (counter) {
                    counter.textContent = `${count} ${count === 1 ? 'sentence' : 'sentences'}`;
                }
            };

            const saveResponses = () => {
                const responses = {};

                textareas.forEach((textarea) => {
                    responses[textarea.name] = textarea.value;
                });

                localStorage.setItem(storageKey, JSON.stringify({
                    activeIndex,
                    responses,
                }));
            };

            const showSituation = (index) => {
                activeIndex = Number(index) || 0;

                tabs.forEach((tab, tabIndex) => {
                    tab.classList.remove(...activeTabClasses, ...inactiveTabClasses);
                    tab.classList.add(...(tabIndex === activeIndex ? activeTabClasses : inactiveTabClasses));
                });

                panels.forEach((panel, panelIndex) => {
                    panel.classList.toggle('hidden', panelIndex !== activeIndex);
                    panel.classList.toggle('block', panelIndex === activeIndex);
                });

                saveResponses();
            };

            try {
                const saved = JSON.parse(localStorage.getItem(storageKey) || '{}');

                if (Number.isInteger(saved.activeIndex)) {
                    activeIndex = saved.activeIndex;
                }

                textareas.forEach((textarea) => {
                    textarea.value = saved.responses?.[textarea.name] || '';
                    updateCounter(textarea);
                });
            } catch (error) {}

            tabs.forEach((tab) => {
                tab.addEventListener('click', () => {
                    showSituation(Number(tab.dataset.situationTab));
                });
            });

            textareas.forEach((textarea) => {
                textarea.addEventListener('input', () => {
                    updateCounter(textarea);
                    saveResponses();
                });
            });

            fillerButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const targetIndex = Number(button.dataset.fillerTarget);
                    const textarea = textareas.find(item => Number(item.dataset.responseBox) === targetIndex);

                    if (!textarea) return;

                    const filler = button.dataset.filler || '';
                    const prefix = textarea.value.trim() === '' ? '' : ' ';

                    textarea.value += `${prefix}${filler}`;
                    textarea.focus();

                    updateCounter(textarea);
                    saveResponses();
                });
            });

            clearButton?.addEventListener('click', () => {
                const textarea = textareas.find(item => Number(item.dataset.responseBox) === activeIndex);

                if (!textarea) return;

                textarea.value = '';
                textarea.focus();

                updateCounter(textarea);
                saveResponses();
            });

            window.resetSlide = () => {
                activeIndex = 0;

                textareas.forEach((textarea) => {
                    textarea.value = '';
                    updateCounter(textarea);
                });

                localStorage.removeItem(storageKey);
                showSituation(0);
            };

            showSituation(activeIndex);
        });
    </script>
@endsection