@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Practice 2',
        'title'      => 'Friendship Qualities Ranking',
        'subtitle'   => '',
    ];

    $qualities = [
        'Honest',
        'Funny',
        'Loyal',
        'Kind',
        'Patient',
        'Generous',
        'Intelligent',
        'Supportive',
    ];
@endphp

@section('content')
    <main
            id="friendshipRankingSlide"
            class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-5"
    >
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-6 grid w-full max-w-6xl gap-5 lg:grid-cols-[0.78fr_1.22fr]">
            <aside class="rounded-2xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900">
                <p class="text-xl font-black leading-snug text-emerald-600 dark:text-emerald-300 sm:text-2xl">
                    Rank the friendship qualities from 1–8.
                </p>

                <div class="mt-5 grid gap-3 text-lg font-black leading-tight text-slate-900 dark:text-slate-50 sm:text-xl">
                    <div class="rounded-xl bg-slate-50 px-4 py-3 dark:bg-slate-800">
                        1 = Most Important
                    </div>
                    <div class="rounded-xl bg-slate-50 px-4 py-3 dark:bg-slate-800">
                        8 = Least Important
                    </div>
                </div>

                <p class="mt-5 text-base font-extrabold leading-snug text-slate-700 dark:text-slate-200 sm:text-lg">
                    Write each number only once.
                </p>
            </aside>

            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900">
                <div class="hidden grid-cols-[1fr_9rem] border-b border-slate-200 bg-slate-50 dark:border-slate-700 dark:bg-slate-800 sm:grid">
                    <div class="px-4 py-3 text-base font-black text-slate-700 dark:text-slate-200">
                        Quality
                    </div>
                    <div class="px-4 py-3 text-base font-black text-slate-700 dark:text-slate-200">
                        Rank
                    </div>
                </div>

                <div class="divide-y divide-slate-200 dark:divide-slate-700">
                    @foreach($qualities as $quality)
                        <label class="grid gap-2 px-4 py-3 sm:grid-cols-[1fr_9rem] sm:items-center">
                            <div class="text-lg font-black text-slate-900 dark:text-slate-50">
                                {{ $quality }}
                            </div>

                            <input
                                    type="text"
                                    inputmode="numeric"
                                    maxlength="1"
                                    data-quality="{{ $quality }}"
                                    class="rank-input min-h-11 w-full rounded-xl border border-slate-300 bg-white px-3 text-center text-lg font-black text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/15 dark:border-slate-600 dark:bg-slate-950 dark:text-slate-50"
                                    placeholder="1–8"
                                    autocomplete="off"
                            >
                        </label>
                    @endforeach
                </div>

                <div class="border-t border-slate-200 p-4 dark:border-slate-700">
                    <button
                            id="showRankingResult"
                            type="button"
                            class="min-h-12 w-full rounded-xl bg-emerald-600 px-5 py-3 text-base font-black text-white shadow-lg shadow-emerald-900/15 transition hover:bg-emerald-500 disabled:cursor-not-allowed disabled:opacity-45"
                            disabled
                    >
                        Show Results
                    </button>

                    <p id="rankingHint" class="mt-2 text-center text-sm font-bold text-slate-500 dark:text-slate-400">
                        Use each number from 1 to 8 once.
                    </p>
                </div>
            </section>
        </section>

        <div
                id="rankingModal"
                class="invisible fixed inset-0 z-50 flex items-center justify-center bg-slate-950/70 px-4 opacity-0 backdrop-blur-sm transition"
                aria-hidden="true"
        >
            <div class="w-full max-w-xl scale-95 rounded-2xl border border-slate-200 bg-white p-5 shadow-2xl transition dark:border-slate-700 dark:bg-slate-900">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-black uppercase tracking-[0.18em] text-emerald-600 dark:text-emerald-300">
                            Results
                        </p>
                        <h2 class="mt-1 text-2xl font-black text-slate-900 dark:text-slate-50">
                            Your Friendship Ranking
                        </h2>
                    </div>

                    <button
                            id="closeRankingModal"
                            type="button"
                            class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white text-xl font-black text-slate-600 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-200"
                    >
                        ×
                    </button>
                </div>

                <div id="rankingResults" class="mt-5 grid gap-2"></div>

                <button
                        id="editRanking"
                        type="button"
                        class="mt-5 min-h-11 w-full rounded-xl border border-slate-200 bg-slate-50 px-5 py-2.5 text-base font-black text-slate-700 transition hover:bg-slate-100 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:hover:bg-slate-800"
                >
                    Edit Ranking
                </button>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const root = document.getElementById('friendshipRankingSlide');
            if (!root) return;

            const inputs = Array.from(root.querySelectorAll('.rank-input'));
            const showBtn = document.getElementById('showRankingResult');
            const hint = document.getElementById('rankingHint');
            const modal = document.getElementById('rankingModal');
            const resultsWrap = document.getElementById('rankingResults');
            const closeBtn = document.getElementById('closeRankingModal');
            const editBtn = document.getElementById('editRanking');

            function values() {
                return inputs.map((input) => input.value).filter(Boolean);
            }

            function updateState() {
                const currentValues = values();
                const unique = new Set(currentValues);
                const complete = currentValues.length === inputs.length && unique.size === inputs.length;

                inputs.forEach((input) => {
                    const duplicated = input.value && currentValues.filter((value) => value === input.value).length > 1;
                    const invalid = input.value && !/^[1-8]$/.test(input.value);
                    const error = duplicated || invalid;

                    input.classList.toggle('border-rose-500', error);
                    input.classList.toggle('bg-rose-50', error);
                    input.classList.toggle('text-rose-900', error);
                    input.classList.toggle('focus:border-rose-500', error);
                    input.classList.toggle('focus:ring-rose-500/15', error);
                });

                showBtn.disabled = !complete;

                if (complete) {
                    hint.textContent = 'Ready! Show your organized results.';
                } else if (currentValues.length !== unique.size) {
                    hint.textContent = 'Use each number only once.';
                } else {
                    hint.textContent = 'Use each number from 1 to 8 once.';
                }
            }

            function openModal() {
                const results = inputs
                    .map((input) => ({
                        quality: input.dataset.quality,
                        rank: Number(input.value),
                    }))
                    .sort((a, b) => a.rank - b.rank);

                resultsWrap.innerHTML = results.map((item) => `
                    <div class="flex items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 dark:border-slate-700 dark:bg-slate-950">
                        <div class="text-base font-black text-slate-900 dark:text-slate-50">${item.rank}. ${item.quality}</div>
                        <div class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-black text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-200">
                            ${item.rank === 1 ? 'Most Important' : (item.rank === 8 ? 'Least Important' : 'Rank ' + item.rank)}
                        </div>
                    </div>
                `).join('');

                modal.classList.remove('invisible', 'opacity-0');
                modal.classList.add('opacity-100');
                modal.setAttribute('aria-hidden', 'false');
                modal.querySelector('div').classList.remove('scale-95');
                modal.querySelector('div').classList.add('scale-100');
            }

            function closeModal() {
                modal.classList.add('opacity-0');
                modal.classList.remove('opacity-100');
                modal.setAttribute('aria-hidden', 'true');
                modal.querySelector('div').classList.add('scale-95');
                modal.querySelector('div').classList.remove('scale-100');

                window.setTimeout(() => {
                    modal.classList.add('invisible');
                }, 160);
            }

            inputs.forEach((input) => {
                input.addEventListener('input', () => {
                    input.value = input.value.replace(/[^1-8]/g, '').slice(0, 1);
                    updateState();
                });
            });

            showBtn.addEventListener('click', openModal);
            closeBtn.addEventListener('click', closeModal);
            editBtn.addEventListener('click', closeModal);

            modal.addEventListener('click', (event) => {
                if (event.target === modal) closeModal();
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && !modal.classList.contains('invisible')) closeModal();
            });

            window.resetSlide = () => {
                inputs.forEach((input) => {
                    input.value = '';
                });
                closeModal();
                updateState();
            };

            updateState();
        });
    </script>
@endsection