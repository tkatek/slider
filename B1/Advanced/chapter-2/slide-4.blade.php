@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Discussion',
        'title'      => 'Discussion',
        'subtitle'   => 'What Does the Future Hold?',

        'activity_title' => 'Rank the Predictions',
        'instruction'    => 'Rank these predictions from most likely to least likely.',

        'predictions' => [
            'People will use flying cars.',
            'Robots will do most housework.',
            'Students will learn using virtual reality.',
            'Humans will live on Mars.',
            'Paper money will disappear.',
        ],
    ];

    $colors = [
        [
            'card'   => 'border-sky-200 bg-sky-50 dark:border-sky-400/30 dark:bg-sky-500/10',
            'number' => 'bg-sky-500 text-white',
            'button' => 'border-sky-200 bg-white text-sky-700 hover:bg-sky-100 dark:border-sky-400/30 dark:bg-slate-900 dark:text-sky-300 dark:hover:bg-sky-500/15',
        ],
        [
            'card'   => 'border-emerald-200 bg-emerald-50 dark:border-emerald-400/30 dark:bg-emerald-500/10',
            'number' => 'bg-emerald-500 text-white',
            'button' => 'border-emerald-200 bg-white text-emerald-700 hover:bg-emerald-100 dark:border-emerald-400/30 dark:bg-slate-900 dark:text-emerald-300 dark:hover:bg-emerald-500/15',
        ],
        [
            'card'   => 'border-violet-200 bg-violet-50 dark:border-violet-400/30 dark:bg-violet-500/10',
            'number' => 'bg-violet-500 text-white',
            'button' => 'border-violet-200 bg-white text-violet-700 hover:bg-violet-100 dark:border-violet-400/30 dark:bg-slate-900 dark:text-violet-300 dark:hover:bg-violet-500/15',
        ],
        [
            'card'   => 'border-amber-200 bg-amber-50 dark:border-amber-400/30 dark:bg-amber-500/10',
            'number' => 'bg-amber-500 text-white',
            'button' => 'border-amber-200 bg-white text-amber-700 hover:bg-amber-100 dark:border-amber-400/30 dark:bg-slate-900 dark:text-amber-300 dark:hover:bg-amber-500/15',
        ],
        [
            'card'   => 'border-rose-200 bg-rose-50 dark:border-rose-400/30 dark:bg-rose-500/10',
            'number' => 'bg-rose-500 text-white',
            'button' => 'border-rose-200 bg-white text-rose-700 hover:bg-rose-100 dark:border-rose-400/30 dark:bg-slate-900 dark:text-rose-300 dark:hover:bg-rose-500/15',
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2rem)] w-full max-w-[1100px] flex-col justify-center">

            @include('slider.components.title-subtitle')

            <section class="mx-auto mt-5 w-full overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white shadow-[0_22px_70px_-45px_rgba(15,23,42,0.45)] dark:border-slate-700 dark:bg-slate-900">

                <div class="border-b border-slate-200 bg-slate-50 px-4 py-4 dark:border-slate-700 dark:bg-slate-800/60">
                    <h2 class="text-[clamp(1.4rem,3vw,2rem)] font-black leading-tight text-slate-900 dark:text-white">
                        {{ $content['activity_title'] }}
                    </h2>

                    <p class="mt-1 text-[clamp(1rem,2vw,1.25rem)] font-bold leading-snug text-slate-700 dark:text-slate-200">
                        {{ $content['instruction'] }}
                    </p>
                </div>

                <div class="p-4">
                    <div id="rankList" class="grid gap-3">
                        @foreach($content['predictions'] as $index => $prediction)
                            @php
                                $style = $colors[$index];
                            @endphp

                            <article
                                    class="rank-item flex items-center gap-3 rounded-2xl border-2 {{ $style['card'] }} p-3 shadow-sm transition hover:-translate-y-0.5"
                                    draggable="true"
                            >
                                <div class="rank-number grid h-12 w-12 shrink-0 place-items-center rounded-2xl {{ $style['number'] }} text-xl font-black shadow-sm">
                                    {{ $index + 1 }}
                                </div>

                                <p class="min-w-0 flex-1 text-[clamp(1rem,2.2vw,1.3rem)] font-black leading-snug text-slate-900 dark:text-white">
                                    {{ $prediction }}
                                </p>

                                <div class="flex shrink-0 items-center gap-1">
                                    <button
                                            type="button"
                                            class="move-up grid h-10 w-10 place-items-center rounded-xl border text-lg font-black transition {{ $style['button'] }}"
                                    >
                                        ↑
                                    </button>

                                    <button
                                            type="button"
                                            class="move-down grid h-10 w-10 place-items-center rounded-xl border text-lg font-black transition {{ $style['button'] }}"
                                    >
                                        ↓
                                    </button>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

            </section>
        </section>
    </main>
@endsection

@section('script')
    <script>
        (function () {
            const list = document.getElementById('rankList');
            if (!list) return;

            let draggedItem = null;

            function updateNumbers() {
                Array.from(list.querySelectorAll('.rank-item')).forEach((item, index) => {
                    const number = item.querySelector('.rank-number');
                    if (number) number.textContent = index + 1;
                });
            }

            function moveItem(item, direction) {
                if (!item) return;

                if (direction === 'up' && item.previousElementSibling) {
                    list.insertBefore(item, item.previousElementSibling);
                }

                if (direction === 'down' && item.nextElementSibling) {
                    list.insertBefore(item.nextElementSibling, item);
                }

                updateNumbers();
            }

            list.addEventListener('click', function (event) {
                const upBtn = event.target.closest('.move-up');
                const downBtn = event.target.closest('.move-down');
                const item = event.target.closest('.rank-item');

                if (upBtn) moveItem(item, 'up');
                if (downBtn) moveItem(item, 'down');
            });

            list.addEventListener('dragstart', function (event) {
                draggedItem = event.target.closest('.rank-item');
                if (!draggedItem) return;

                draggedItem.classList.add('opacity-50');
                event.dataTransfer.effectAllowed = 'move';
            });

            list.addEventListener('dragend', function () {
                if (draggedItem) draggedItem.classList.remove('opacity-50');
                draggedItem = null;
                updateNumbers();
            });

            list.addEventListener('dragover', function (event) {
                event.preventDefault();

                const target = event.target.closest('.rank-item');
                if (!target || !draggedItem || target === draggedItem) return;

                const box = target.getBoundingClientRect();
                const middle = box.top + box.height / 2;

                if (event.clientY < middle) {
                    list.insertBefore(draggedItem, target);
                } else {
                    list.insertBefore(draggedItem, target.nextSibling);
                }
            });

            updateNumbers();

            window.resetSlide = function () {
                updateNumbers();
            };
        })();
    </script>
@endsection