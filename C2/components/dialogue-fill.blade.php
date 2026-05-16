@extends('slider.simple-layout')

@section('content')
    @php
        $content = is_array($content ?? null) ? $content : [];
        $theme = $theme ?? [];

        $dialogue = $content['dialogue'] ?? [];

        $ringAccent = $theme['ring_accent_class']
            ?? 'focus:border-indigo-500 focus:ring-indigo-500/10 dark:focus:border-indigo-300';

        $speakerStyles = [
            'A' => 'bg-gradient-to-br from-sky-500 to-blue-600 text-white shadow-sky-200/70 dark:shadow-none',
            'B' => 'bg-gradient-to-br from-fuchsia-500 to-pink-600 text-white shadow-fuchsia-200/70 dark:shadow-none',
        ];

        $blankIndex = 0;
    @endphp

    <main class="flex min-h-[100dvh] w-full items-center justify-center px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="w-full max-w-6xl">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-6 rounded-3xl border border-slate-200 bg-white p-4 shadow-xl shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20 sm:p-6">
                <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                    <p class="text-sm font-black text-slate-500 dark:text-slate-400">
                        {{ $content['instruction'] ?? 'Complete the dialogue.' }}
                    </p>

                    <button
                            type="button"
                            id="clearDialogueBtn"
                            class="rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-black text-slate-700 transition hover:bg-slate-100 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:hover:bg-slate-800"
                    >
                        Clear
                    </button>
                </div>

                <div class="space-y-2.5 sm:space-y-3">
                    @foreach($dialogue as $line)
                        @php
                            $speaker = trim((string) ($line['speaker'] ?? ''));
                            $text = (string) ($line['text'] ?? '');
                            $chunks = preg_split('/(\[[^\]]+\])/', $text, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
                            $isFullBlank = preg_match('/^\s*\[[^\]]+\]\s*$/', $text) === 1;
                            $badgeClass = $speakerStyles[$speaker] ?? 'bg-gradient-to-br from-slate-500 to-slate-700 text-white';
                        @endphp

                        <div class="grid grid-cols-[2.15rem_minmax(0,1fr)] gap-2 sm:grid-cols-[3rem_minmax(0,1fr)] sm:gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-xl text-sm font-black shadow-md sm:h-11 sm:w-11 sm:rounded-2xl sm:text-xl {{ $badgeClass }}">
                                {{ $speaker }}
                            </div>

                            <div class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm font-bold leading-snug text-slate-800 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 sm:rounded-2xl sm:px-4 sm:py-3 sm:text-lg sm:leading-relaxed">
                                @foreach($chunks as $chunk)
                                    @if(preg_match('/^\[([^\]]+)\]$/', $chunk))
                                        @php
                                            $blankIndex++;
                                        @endphp

                                        <input
                                                type="text"
                                                name="dialogue_blank_{{ $blankIndex }}"
                                                aria-label="Dialogue blank {{ $blankIndex }}"
                                                placeholder="•••"
                                                autocomplete="off"
                                                class="{{ $isFullBlank ? 'h-11 w-full text-left' : 'mx-1 h-9 min-w-[7rem] max-w-[12rem] text-center sm:h-10 sm:min-w-[8rem] sm:max-w-[14rem]' }} rounded-xl border-2 border-slate-200 bg-white px-3 text-sm font-black text-slate-900 outline-none transition placeholder:text-slate-300 focus:ring-4 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-50 dark:placeholder:text-slate-600 sm:text-base {{ $ringAccent }}"
                                        >
                                    @else
                                        <span>{{ $chunk }}</span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const storageKey = `dialogue-fill-${window.location.pathname}`;
            const inputs = Array.from(document.querySelectorAll('input[name^="dialogue_blank_"]'));
            const clearButton = document.getElementById('clearDialogueBtn');

            const saveAnswers = () => {
                const answers = {};

                inputs.forEach((input) => {
                    answers[input.name] = input.value;
                });

                localStorage.setItem(storageKey, JSON.stringify(answers));
            };

            try {
                const savedAnswers = JSON.parse(localStorage.getItem(storageKey) || '{}');

                inputs.forEach((input) => {
                    input.value = savedAnswers[input.name] || '';
                });
            } catch (error) {}

            inputs.forEach((input) => {
                input.addEventListener('input', saveAnswers);
            });

            clearButton?.addEventListener('click', () => {
                inputs.forEach((input) => {
                    input.value = '';
                });

                localStorage.removeItem(storageKey);
                inputs[0]?.focus();
            });

            window.resetSlide = () => {
                inputs.forEach((input) => {
                    input.value = '';
                });

                localStorage.removeItem(storageKey);
            };
        });
    </script>
@endsection