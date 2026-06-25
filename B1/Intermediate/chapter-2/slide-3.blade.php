@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Practice 1',
        'title'      => 'Practice1: Warm-up',
        'subtitle'   => 'Arrange these verbs on the diagram',

        'choices' => [
            ['key' => 'cant', 'label' => "can’t"],
            ['key' => 'must', 'label' => 'must'],
            ['key' => 'might', 'label' => 'might'],
            ['key' => 'may', 'label' => 'may'],
            ['key' => 'could', 'label' => 'could'],
        ],

        'answers' => [
            1 => 'must',
            2 => 'could',
            3 => 'might',
            4 => 'may',
            5 => 'cant',
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-[1180px]">
            @include('slider.components.title-subtitle')

            <div id="deductionGame" class="mx-auto mt-6 grid max-w-5xl gap-4 lg:grid-cols-[1.3fr_0.9fr]">
                <section class="relative min-h-[420px] overflow-hidden rounded-3xl border border-slate-200 bg-white p-4 shadow-xl shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20 sm:p-6">
                    <div class="absolute inset-y-0 left-0 w-2 bg-indigo-600"></div>

                    <div class="relative mx-auto h-[360px] max-w-[520px]">
                        <div
                                class="absolute left-1/2 top-8 h-[300px] w-[300px] -translate-x-1/2 bg-blue-100 dark:bg-blue-500/15"
                                style="clip-path: polygon(0 0, 100% 0, 50% 100%);"
                        ></div>

                        <div class="absolute left-1/2 top-0 -translate-x-1/2 text-center">
                            <p class="text-base font-black text-slate-700 dark:text-slate-200">
                                99% certain it IS <span class="text-emerald-600">✓</span>
                            </p>
                        </div>

                        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 text-center">
                            <p class="text-base font-black text-slate-700 dark:text-slate-200">
                                99% certain it ISN’T <span class="text-red-600">✖</span>
                            </p>
                        </div>

                        <button type="button" data-slot="1" class="deduction-slot absolute left-2 top-16 inline-flex min-w-[92px] items-center gap-1.5 rounded-xl border-2 border-dashed border-blue-300 bg-white/90 px-2.5 py-2 font-black text-blue-800 shadow-lg shadow-slate-900/10 dark:border-blue-400/45 dark:bg-slate-950/90 dark:text-blue-100">
                            <span>1.</span><strong class="empty:before:content-['__']"></strong>
                        </button>

                        <button type="button" data-slot="2" class="deduction-slot absolute left-2 top-[160px] inline-flex min-w-[92px] items-center gap-1.5 rounded-xl border-2 border-dashed border-blue-300 bg-white/90 px-2.5 py-2 font-black text-blue-800 shadow-lg shadow-slate-900/10 dark:border-blue-400/45 dark:bg-slate-950/90 dark:text-blue-100">
                            <span>2.</span><strong class="empty:before:content-['__']"></strong>
                        </button>

                        <button type="button" data-slot="3" class="deduction-slot absolute left-[112px] top-[160px] inline-flex min-w-[92px] items-center gap-1.5 rounded-xl border-2 border-dashed border-blue-300 bg-white/90 px-2.5 py-2 font-black text-blue-800 shadow-lg shadow-slate-900/10 dark:border-blue-400/45 dark:bg-slate-950/90 dark:text-blue-100">
                            <span>3.</span><strong class="empty:before:content-['__']"></strong>
                        </button>

                        <button type="button" data-slot="4" class="deduction-slot absolute left-[220px] top-[160px] inline-flex min-w-[92px] items-center gap-1.5 rounded-xl border-2 border-dashed border-blue-300 bg-white/90 px-2.5 py-2 font-black text-blue-800 shadow-lg shadow-slate-900/10 dark:border-blue-400/45 dark:bg-slate-950/90 dark:text-blue-100">
                            <span>4.</span><strong class="empty:before:content-['__']"></strong>
                        </button>

                        <button type="button" data-slot="5" class="deduction-slot absolute bottom-8 left-2 inline-flex min-w-[92px] items-center gap-1.5 rounded-xl border-2 border-dashed border-blue-300 bg-white/90 px-2.5 py-2 font-black text-blue-800 shadow-lg shadow-slate-900/10 dark:border-blue-400/45 dark:bg-slate-950/90 dark:text-blue-100">
                            <span>5.</span><strong class="empty:before:content-['__']"></strong>
                        </button>
                    </div>
                </section>

                <section class="rounded-3xl border border-slate-200 bg-white p-4 shadow-xl shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20 sm:p-5">
                    <div class="space-y-3">
                        @foreach($content['choices'] as $index => $choice)
                            <button
                                    type="button"
                                    class="choice-btn grid w-full grid-cols-[2rem_1fr] items-center gap-3 rounded-2xl border border-blue-100 bg-blue-100 px-4 py-4 text-left text-lg font-black text-blue-950 transition hover:-translate-y-0.5 hover:bg-blue-200 dark:border-blue-400/20 dark:bg-blue-500/15 dark:text-blue-100"
                                    data-key="{{ $choice['key'] }}"
                                    data-label="{{ $choice['label'] }}"
                            >
                                <span class="text-center text-base text-slate-700 dark:text-slate-300">
                                    {{ chr(97 + $index) }}
                                </span>
                                <span>{{ $choice['label'] }}</span>
                            </button>
                        @endforeach
                    </div>

                    <div class="mt-5 grid grid-cols-3 gap-2">
                        <button type="button" id="checkBtn" class="rounded-xl bg-emerald-600 px-3 py-3 text-sm font-black text-white shadow-md transition hover:bg-emerald-700">
                            Check
                        </button>
                        <button type="button" id="resetBtn" class="rounded-xl border border-slate-200 bg-white px-3 py-3 text-sm font-black text-slate-700 shadow-sm transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:hover:bg-slate-800">
                            Reset
                        </button>
                        <button type="button" id="showBtn" class="rounded-xl bg-indigo-600 px-3 py-3 text-sm font-black text-white shadow-md transition hover:bg-indigo-700">
                            Answers
                        </button>
                    </div>

                    <p id="feedback" class="mt-4 min-h-7 text-center text-sm font-black text-slate-600 dark:text-slate-300"></p>
                </section>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        (() => {
            const answers = @json($content['answers']);
            const labels = @json(collect($content['choices'])->pluck('label', 'key'));
            const root = document.getElementById('deductionGame');
            const choiceButtons = Array.from(root.querySelectorAll('.choice-btn'));
            const slots = Array.from(root.querySelectorAll('.deduction-slot'));
            const feedback = document.getElementById('feedback');
            let selected = null;

            const slotBase = [
                'border-blue-300',
                'bg-white/90',
                'text-blue-800',
                'dark:border-blue-400/45',
                'dark:bg-slate-950/90',
                'dark:text-blue-100',
            ];

            const slotCorrect = [
                'border-emerald-500',
                'bg-emerald-50',
                'text-emerald-800',
                'dark:border-emerald-400',
                'dark:bg-emerald-950/45',
                'dark:text-emerald-100',
            ];

            const slotWrong = [
                'border-rose-500',
                'bg-rose-50',
                'text-rose-800',
                'dark:border-rose-400',
                'dark:bg-rose-950/45',
                'dark:text-rose-100',
            ];

            const choiceSelected = [
                'outline',
                'outline-4',
                'outline-indigo-500/25',
                'border-indigo-500',
                'bg-indigo-100',
                'dark:border-indigo-300',
                'dark:bg-indigo-500/25',
            ];

            const removeClasses = (el, classes) => el.classList.remove(...classes);
            const addClasses = (el, classes) => el.classList.add(...classes);

            const resetSlotState = (slot) => {
                removeClasses(slot, slotCorrect);
                removeClasses(slot, slotWrong);
                addClasses(slot, slotBase);
            };

            const setSlotState = (slot, state) => {
                removeClasses(slot, slotBase);
                removeClasses(slot, slotCorrect);
                removeClasses(slot, slotWrong);

                if (state === 'correct') {
                    addClasses(slot, slotCorrect);
                } else if (state === 'wrong') {
                    addClasses(slot, slotWrong);
                } else {
                    addClasses(slot, slotBase);
                }
            };

            const clearStates = () => {
                slots.forEach(resetSlotState);
                feedback.textContent = '';
            };

            const updateUsedChoices = () => {
                const used = new Set(slots.map(slot => slot.dataset.value).filter(Boolean));
                choiceButtons.forEach(button => {
                    button.classList.toggle('opacity-45', used.has(button.dataset.key));
                });
            };

            choiceButtons.forEach(button => {
                button.addEventListener('click', () => {
                    selected = {
                        key: button.dataset.key,
                        label: button.dataset.label,
                    };

                    choiceButtons.forEach(btn => removeClasses(btn, choiceSelected));
                    addClasses(button, choiceSelected);
                    clearStates();
                });
            });

            slots.forEach(slot => {
                slot.addEventListener('click', () => {
                    if (!selected) {
                        feedback.textContent = 'Choose a verb first.';
                        return;
                    }

                    const otherSlot = slots.find(item => item.dataset.value === selected.key);
                    if (otherSlot) {
                        otherSlot.dataset.value = '';
                        otherSlot.querySelector('strong').textContent = '';
                    }

                    slot.dataset.value = selected.key;
                    slot.querySelector('strong').textContent = selected.label;

                    choiceButtons.forEach(btn => removeClasses(btn, choiceSelected));
                    selected = null;
                    clearStates();
                    updateUsedChoices();
                });
            });

            document.getElementById('checkBtn').addEventListener('click', () => {
                let correct = 0;

                slots.forEach(slot => {
                    const slotNumber = slot.dataset.slot;
                    const isCorrect = slot.dataset.value === answers[slotNumber];

                    setSlotState(slot, isCorrect ? 'correct' : 'wrong');

                    if (isCorrect) correct++;
                });

                feedback.textContent = `${correct}/${slots.length} correct`;
            });

            document.getElementById('resetBtn').addEventListener('click', () => {
                selected = null;
                choiceButtons.forEach(btn => {
                    removeClasses(btn, choiceSelected);
                    btn.classList.remove('opacity-45');
                });

                slots.forEach(slot => {
                    slot.dataset.value = '';
                    slot.querySelector('strong').textContent = '';
                    resetSlotState(slot);
                });

                feedback.textContent = '';
            });

            document.getElementById('showBtn').addEventListener('click', () => {
                slots.forEach(slot => {
                    const key = answers[slot.dataset.slot];
                    slot.dataset.value = key;
                    slot.querySelector('strong').textContent = labels[key] || key;
                    setSlotState(slot, 'correct');
                });

                choiceButtons.forEach(btn => removeClasses(btn, choiceSelected));
                selected = null;
                updateUsedChoices();
                feedback.textContent = 'Correct answers are shown.';
            });
        })();
    </script>
@endsection