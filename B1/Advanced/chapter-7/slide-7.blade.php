@extends('slider.simple-layout')

@php
    $content = [
        'title'      => 'New Language / Collocations',
        'subtitle'   => 'The Causative – Getting Things Done for You',

        'formula'      => 'have / get + object + past participle',
        'formula_note' => 'Use the causative when you arrange for another person to do something for you.',

        'sections' => [
            [
                'number' => 1,
                'title'  => 'Personal Services',
                'color'  => 'emerald',
                'items'  => [
                    [
                        'phrase'  => 'get your beard trimmed',
                        'example' => 'He gets his beard trimmed twice a week.',
                        'image'   => materialAsset('slider/B1/Advanced/chapter-7/img/slide6/trim.webp'),
                    ],
                    [
                        'phrase'  => 'get your clothes made',
                        'example' => 'He gets his clothes made for him by his tailor.',
                        'image'   => materialAsset('slider/B1/Advanced/chapter-7/img/slide6/tailor.webp'),
                    ],
                    [
                        'phrase'  => 'get your umbrella held',
                        'example' => 'He gets his umbrella held when it rains.',
                        'image'   => materialAsset('slider/B1/Advanced/chapter-7/img/slide6/umbrella.webp'),
                    ],
                ],
            ],
            [
                'number' => 2,
                'title'  => 'Food & Cooking',
                'color'  => 'sky',
                'items'  => [
                    [
                        'phrase'  => 'have your meals cooked',
                        'example' => 'He has all of his meals cooked for him by his private chef.',
                        'image'   => materialAsset('slider/B1/Advanced/chapter-7/img/slide6/chef.webp'),
                    ],
                    [
                        'phrase'  => 'have something cooked for you',
                        'example' => 'Neerajito has his meals cooked for him.',
                        'emoji'   => '🍽️',
                    ],
                ],
            ],
            [
                'number' => 3,
                'title'  => 'Home & Maintenance',
                'color'  => 'amber',
                'items'  => [
                    [
                        'phrase'  => 'get something repainted',
                        'example' => 'He recently got one of his mansions repainted pink.',
                        'image'   => materialAsset('slider/B1/Advanced/chapter-7/img/slide6/repaint.webp'),
                    ],
                    [
                        'phrase'  => 'paint your apartment',
                        'example' => 'He painted his apartment last summer.',
                        'image'   => materialAsset('slider/B1/Advanced/chapter-7/img/slide6/apartment.webp'),
                    ],
                ],
            ],
            [
                'number' => 4,
                'title'  => 'Transport & Travel',
                'color'  => 'violet',
                'items'  => [
                    [
                        'phrase'  => 'get driven somewhere',
                        'example' => 'He gets driven all over the city in his limousine.',
                        'image'   => materialAsset('slider/B1/Advanced/chapter-7/img/slide6/limousine.webp'),
                    ],
                    [
                        'phrase'  => 'go everywhere by bicycle',
                        'example' => 'He goes everywhere by bicycle.',
                        'emoji'   => '🚲',
                    ],
                ],
            ],
        ],

        'lists' => [
            [
                'number' => 5,
                'title'  => 'Habits & Lifestyle',
                'color'  => 'teal',
                'items'  => [
                    ['phrase' => 'do everything yourself', 'example' => 'He likes to do everything himself.'],
                    ['phrase' => 'save money', 'example' => 'He likes to save money.'],
                    ['phrase' => 'do something yourself', 'example' => 'He trims his own beard.'],
                    ['phrase' => 'buy your own clothes', 'example' => 'He buys his own clothes now and again.'],
                    ['phrase' => 'go everywhere by bicycle', 'example' => 'He goes everywhere by bicycle.'],
                    ['phrase' => 'hold your own umbrella', 'example' => 'He has to hold his own umbrella if it rains.'],
                ],
            ],
            [
                'number' => 6,
                'title'  => 'Useful Expressions',
                'color'  => 'orange',
                'items'  => [
                    ['phrase' => 'for him / for you', 'example' => 'He has his meals cooked for him.'],
                    ['phrase' => 'by + person', 'example' => 'by his personal barber / private chef / driver'],
                    ['phrase' => 'twice a week', 'example' => 'He gets his beard trimmed twice a week.'],
                    ['phrase' => 'all over the city', 'example' => 'He gets driven all over the city.'],
                    ['phrase' => 'when it rains', 'example' => 'He gets his umbrella held when it rains.'],
                ],
            ],
        ],

        'other_collocations' => [
            [
                'icon'  => '🤵',
                'items' => ['personal barber', 'private chef', 'personal driver', 'butler'],
            ],
            [
                'icon'  => '🎤',
                'items' => ['fabulously wealthy', 'world-famous', 'reggaeton artist', 'mansion'],
            ],
            [
                'icon'  => '🛍️',
                'items' => ['regular person', 'save money', 'hates shopping', 'take a while'],
            ],
        ],

        'remember' => 'Use the causative when you cause or arrange for something to happen, but you do not do it yourself.',
    ];

    $styles = [
        'emerald' => [
            'rail'    => 'bg-emerald-500',
            'badge'   => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-400/15 dark:text-emerald-300',
            'header'  => 'border-emerald-200 bg-emerald-50/80 text-emerald-800 dark:border-emerald-400/20 dark:bg-emerald-500/[0.08] dark:text-emerald-200',
            'phrase'  => 'text-emerald-700 dark:text-emerald-300',
            'bullet'  => 'bg-emerald-500',
        ],
        'sky' => [
            'rail'    => 'bg-sky-500',
            'badge'   => 'bg-sky-100 text-sky-700 dark:bg-sky-400/15 dark:text-sky-300',
            'header'  => 'border-sky-200 bg-sky-50/80 text-sky-800 dark:border-sky-400/20 dark:bg-sky-500/[0.08] dark:text-sky-200',
            'phrase'  => 'text-sky-700 dark:text-sky-300',
            'bullet'  => 'bg-sky-500',
        ],
        'amber' => [
            'rail'    => 'bg-amber-500',
            'badge'   => 'bg-amber-100 text-amber-700 dark:bg-amber-400/15 dark:text-amber-300',
            'header'  => 'border-amber-200 bg-amber-50/80 text-amber-800 dark:border-amber-400/20 dark:bg-amber-500/[0.08] dark:text-amber-200',
            'phrase'  => 'text-amber-700 dark:text-amber-300',
            'bullet'  => 'bg-amber-500',
        ],
        'violet' => [
            'rail'    => 'bg-violet-500',
            'badge'   => 'bg-violet-100 text-violet-700 dark:bg-violet-400/15 dark:text-violet-300',
            'header'  => 'border-violet-200 bg-violet-50/80 text-violet-800 dark:border-violet-400/20 dark:bg-violet-500/[0.08] dark:text-violet-200',
            'phrase'  => 'text-violet-700 dark:text-violet-300',
            'bullet'  => 'bg-violet-500',
        ],
        'teal' => [
            'rail'    => 'bg-teal-500',
            'badge'   => 'bg-teal-100 text-teal-700 dark:bg-teal-400/15 dark:text-teal-300',
            'header'  => 'border-teal-200 bg-teal-50/80 text-teal-800 dark:border-teal-400/20 dark:bg-teal-500/[0.08] dark:text-teal-200',
            'phrase'  => 'text-teal-700 dark:text-teal-300',
            'bullet'  => 'bg-teal-500',
        ],
        'orange' => [
            'rail'    => 'bg-orange-500',
            'badge'   => 'bg-orange-100 text-orange-700 dark:bg-orange-400/15 dark:text-orange-300',
            'header'  => 'border-orange-200 bg-orange-50/80 text-orange-800 dark:border-orange-400/20 dark:bg-orange-500/[0.08] dark:text-orange-200',
            'phrase'  => 'text-orange-700 dark:text-orange-300',
            'bullet'  => 'bg-orange-500',
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-3 py-2.5 text-slate-950 dark:text-slate-50 sm:px-5 sm:py-3 lg:px-7">
        <section class="mx-auto w-full max-w-[1380px]">
            @include('slider.components.title-subtitle')

            <div class="mt-2.5 space-y-2.5 sm:mt-3 sm:space-y-3">
                {{-- Formula strip --}}
                <section class="grid gap-2.5 rounded-2xl border border-indigo-200/90 bg-white p-3 shadow-[0_12px_34px_-28px_rgba(15,23,42,0.42)] dark:border-indigo-400/20 dark:bg-slate-900/70 sm:grid-cols-[minmax(0,1fr)_auto] sm:items-center sm:px-4">
                    <div class="min-w-0 text-center sm:text-left">
                        <p class="text-[11px] font-black uppercase tracking-[0.13em] text-indigo-600 dark:text-indigo-300">
                            Causative structure
                        </p>
                        <p class="mt-0.5 text-[12px] font-bold leading-snug text-slate-600 dark:text-slate-300 sm:text-[13px]">
                            {{ $content['formula_note'] }}
                        </p>
                    </div>

                    <div class="rounded-xl border border-indigo-200 bg-indigo-50 px-3 py-2 text-center text-[13px] font-black text-indigo-800 dark:border-indigo-400/20 dark:bg-indigo-500/10 dark:text-indigo-200 sm:px-4 sm:text-sm xl:text-[15px]">
                        {{ $content['formula'] }}
                    </div>
                </section>

                {{-- Main collocation groups --}}
                <section class="grid gap-3 lg:grid-cols-2 xl:gap-4">
                    @foreach($content['sections'] as $section)
                        @php($style = $styles[$section['color']])

                        <article class="relative overflow-hidden rounded-2xl border border-slate-200/90 bg-white shadow-[0_12px_34px_-28px_rgba(15,23,42,0.42)] dark:border-slate-700/70 dark:bg-slate-900/70">
                            <div class="absolute inset-y-0 left-0 w-1 {{ $style['rail'] }}"></div>

                            <header class="flex items-center gap-2.5 border-b px-3 py-2 pl-4 {{ $style['header'] }} sm:px-3.5 sm:pl-[1.125rem]">
                                <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-lg text-[11px] font-black {{ $style['badge'] }} sm:h-8 sm:w-8 sm:text-xs">
                                    {{ $section['number'] }}
                                </span>
                                <h2 class="text-[13px] font-black uppercase tracking-[0.03em] sm:text-sm">
                                    {{ $section['title'] }}
                                </h2>
                            </header>

                            <div class="divide-y divide-slate-200/80 dark:divide-slate-700/70">
                                @foreach($section['items'] as $item)
                                    <div class="grid grid-cols-[58px_minmax(0,1fr)] items-center gap-2.5 px-3 py-2 pl-4 sm:grid-cols-[66px_minmax(0,1fr)] sm:px-3.5 sm:py-2.5 sm:pl-[1.125rem]">
                                        <div class="flex h-12 w-[58px] items-center justify-center overflow-hidden rounded-xl border border-slate-200 bg-slate-50 dark:border-slate-700 dark:bg-slate-800 sm:h-14 sm:w-[66px]">
                                            @if(!empty($item['image']))
                                                <img
                                                        src="{{ $item['image'] }}"
                                                        alt=""
                                                        class="h-full w-full object-cover"
                                                >
                                            @else
                                                <span class="text-3xl" aria-hidden="true">{{ $item['emoji'] ?? '✓' }}</span>
                                            @endif
                                        </div>

                                        <div class="min-w-0">
                                            <p class="text-[12px] font-black leading-snug {{ $style['phrase'] }} sm:text-[13px] xl:text-sm">
                                                {{ $item['phrase'] }}
                                            </p>
                                            <p class="mt-0.5 text-[11px] font-bold leading-snug text-slate-600 dark:text-slate-300 sm:text-[12px] xl:text-[13px]">
                                                “{{ $item['example'] }}”
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </section>

                {{-- Habits and useful expressions --}}
                <section class="grid gap-3 lg:grid-cols-2 xl:gap-4">
                    @foreach($content['lists'] as $list)
                        @php($style = $styles[$list['color']])

                        <article class="relative overflow-hidden rounded-2xl border border-slate-200/90 bg-white shadow-[0_12px_34px_-28px_rgba(15,23,42,0.42)] dark:border-slate-700/70 dark:bg-slate-900/70">
                            <div class="absolute inset-y-0 left-0 w-1 {{ $style['rail'] }}"></div>

                            <header class="flex items-center gap-2.5 border-b px-3 py-2 pl-4 {{ $style['header'] }} sm:px-3.5 sm:pl-[1.125rem]">
                                <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-lg text-[11px] font-black {{ $style['badge'] }} sm:h-8 sm:w-8 sm:text-xs">
                                    {{ $list['number'] }}
                                </span>
                                <h2 class="text-[13px] font-black uppercase tracking-[0.03em] sm:text-sm">
                                    {{ $list['title'] }}
                                </h2>
                            </header>

                            <div class="grid gap-x-4 gap-y-1.5 p-3 pl-4 sm:grid-cols-2 sm:p-3.5 sm:pl-[1.125rem]">
                                @foreach($list['items'] as $item)
                                    <div class="flex min-w-0 items-start gap-2">
                                        <span class="mt-[0.42rem] h-1.5 w-1.5 shrink-0 rounded-full {{ $style['bullet'] }}"></span>
                                        <p class="text-[11px] font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-[12px] xl:text-[13px]">
                                            <span class="font-black {{ $style['phrase'] }}">{{ $item['phrase'] }}</span>
                                            <span class="text-slate-400 dark:text-slate-500"> — </span>
                                            {{ $item['example'] }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </section>

                {{-- Other useful collocations --}}
                <section class="overflow-hidden rounded-2xl border border-rose-200/90 bg-white shadow-[0_12px_34px_-28px_rgba(15,23,42,0.42)] dark:border-rose-400/20 dark:bg-slate-900/70">
                    <header class="flex items-center gap-2.5 border-b border-rose-200 bg-rose-50/80 px-3 py-2 text-rose-800 dark:border-rose-400/20 dark:bg-rose-500/[0.08] dark:text-rose-200 sm:px-4">
                        <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-rose-100 text-[11px] font-black text-rose-700 dark:bg-rose-400/15 dark:text-rose-300 sm:h-8 sm:w-8 sm:text-xs">
                            7
                        </span>
                        <h2 class="text-[13px] font-black uppercase tracking-[0.03em] sm:text-sm">
                            Other Useful Collocations
                        </h2>
                    </header>

                    <div class="grid gap-2.5 p-3 sm:grid-cols-3 sm:p-3.5">
                        @foreach($content['other_collocations'] as $group)
                            <div class="grid grid-cols-[38px_minmax(0,1fr)] gap-2.5 rounded-xl border border-slate-200/80 bg-slate-50/70 p-2.5 dark:border-slate-700/70 dark:bg-slate-800/45">
                                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-white text-xl shadow-sm dark:bg-slate-900" aria-hidden="true">
                                    {{ $group['icon'] }}
                                </div>

                                <ul class="grid grid-cols-2 gap-x-3 gap-y-1">
                                    @foreach($group['items'] as $item)
                                        <li class="flex items-start gap-1.5 text-[11px] font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-[12px]">
                                            <span class="mt-[0.38rem] h-1.5 w-1.5 shrink-0 rounded-full bg-rose-400"></span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- Reminder and formula recap --}}
                <section class="grid gap-3 lg:grid-cols-[1.2fr_0.8fr] xl:gap-4">
                    <article class="rounded-2xl border border-amber-200/90 bg-amber-50/75 p-3 shadow-[0_12px_34px_-28px_rgba(15,23,42,0.42)] dark:border-amber-400/20 dark:bg-amber-500/[0.07] sm:p-3.5">
                        <div class="flex items-start gap-2.5">
                            <span class="shrink-0 text-xl leading-none sm:text-2xl" aria-hidden="true">💡</span>
                            <div>
                                <h2 class="text-[13px] font-black uppercase tracking-[0.03em] text-slate-950 dark:text-white sm:text-sm">
                                    Remember
                                </h2>
                                <p class="mt-1 text-[11px] font-bold leading-relaxed text-slate-700 dark:text-slate-200 sm:text-[12px] xl:text-[13px]">
                                    {{ $content['remember'] }}
                                </p>
                            </div>
                        </div>
                    </article>

                    <article class="flex items-center justify-center rounded-2xl border border-emerald-200/90 bg-emerald-50/75 p-3 text-center shadow-[0_12px_34px_-28px_rgba(15,23,42,0.42)] dark:border-emerald-400/20 dark:bg-emerald-500/[0.07] sm:p-3.5">
                        <div>
                            <p class="text-[13px] font-black text-emerald-700 dark:text-emerald-300 sm:text-sm xl:text-[15px]">
                                {{ $content['formula'] }}
                            </p>
                            <p class="mt-1 text-[11px] font-bold text-slate-600 dark:text-slate-300 sm:text-[12px]">
                                have something done / get something done
                            </p>
                        </div>
                    </article>
                </section>
            </div>
        </section>
    </main>
@endsection