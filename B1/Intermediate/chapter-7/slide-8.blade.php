@extends('slider.simple-layout')

@php
    $content = [
        'title'      => 'Personality Adjectives',
        'subtitle'   => 'Which description fits you?',
    ];

    $groups = [
        [
            'number' => '1',
            'emoji' => '👑',
            'title' => 'Firstborn Children',
            'desktop' => 'lg:col-start-1 lg:row-start-1',
            'border' => 'border-blue-300',
            'badge' => 'bg-blue-500',
            'dot' => 'bg-blue-400',
            'card_bg' => 'bg-blue-50 dark:bg-blue-950',
            'items' => [
                'Responsible',
                'Organized',
                'Leadership roles',
                'Higher expectations',
                'Teach younger siblings',
                'May feel pressure',
            ],
        ],
        [
            'number' => '2',
            'emoji' => '🤝',
            'title' => 'Middle Children',
            'desktop' => 'lg:col-start-3 lg:row-start-1',
            'border' => 'border-green-300',
            'badge' => 'bg-green-500',
            'dot' => 'bg-green-400',
            'card_bg' => 'bg-green-50 dark:bg-green-950',
            'items' => [
                'Often less noticed',
                'Good at understanding people',
                'Problem-solving skills',
                'Creative & flexible',
                'Peacemakers / negotiators',
                'Sometimes unsure of role',
            ],
        ],
        [
            'number' => '3',
            'emoji' => '🌟',
            'title' => 'Youngest Children',
            'desktop' => 'lg:col-start-1 lg:row-start-2',
            'border' => 'border-amber-300',
            'badge' => 'bg-amber-400',
            'dot' => 'bg-amber-400',
            'card_bg' => 'bg-amber-50 dark:bg-amber-950',
            'items' => [
                'Fewer strict rules',
                'Social and funny',
                'Risk-takers',
                'Learn from older siblings',
                'Can depend on others',
            ],
        ],
        [
            'number' => '4',
            'emoji' => '🎯',
            'title' => 'Only Children',
            'desktop' => 'lg:col-start-3 lg:row-start-2',
            'border' => 'border-orange-300',
            'badge' => 'bg-orange-400',
            'dot' => 'bg-orange-400',
            'card_bg' => 'bg-orange-50 dark:bg-orange-950',
            'items' => [
                'Full parental attention',
                'Strong language & thinking skills',
                'Independent',
                'Focused on goals',
                'May need teamwork skills',
            ],
        ],
        [
            'number' => '5',
            'emoji' => '👯',
            'title' => 'Twins',
            'desktop' => 'lg:col-start-1 lg:row-start-3',
            'border' => 'border-purple-300',
            'badge' => 'bg-purple-500',
            'dot' => 'bg-purple-400',
            'card_bg' => 'bg-purple-50 dark:bg-purple-950',
            'items' => [
                'Very strong bond',
                'High emotional understanding',
                'Shared experiences',
                'May struggle with identity',
            ],
        ],
        [
            'number' => '6',
            'emoji' => '🌱',
            'title' => 'Gap Children',
            'desktop' => 'lg:col-start-3 lg:row-start-3',
            'border' => 'border-pink-300',
            'badge' => 'bg-pink-400',
            'dot' => 'bg-pink-400',
            'card_bg' => 'bg-pink-50 dark:bg-pink-950',
            'items' => [
                'Mix of only + younger child traits',
                'Mature quickly',
                'Learn from older siblings',
                'Fewer shared childhood experiences',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-4 w-full max-w-[1180px]">

            {{-- MOBILE / TABLET VERSION --}}
            <div class="lg:hidden">
                <div class="mb-5 flex justify-center">
                    <div class="w-auto max-w-full rounded-2xl border border-slate-200 bg-white px-5 py-3 text-center shadow-sm dark:border-slate-700 dark:bg-slate-900">
                        <h2 class="whitespace-nowrap text-sm font-black uppercase leading-tight tracking-wide text-slate-900 dark:text-white sm:text-base">
                            Birth Order & Personality
                        </h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    @foreach($groups as $group)
                        <article class="relative z-10 rounded-[1.4rem] border-2 {{ $group['border'] }} {{ $group['card_bg'] }} px-4 pb-4 pt-8 shadow-sm">
                            <div class="absolute left-5 top-0 max-w-[88%] -translate-y-1/2 rounded-full {{ $group['badge'] }} px-4 py-2 text-[11px] font-black uppercase leading-none tracking-wide text-white shadow-sm sm:text-xs">
                                {{ $group['number'] }}. {{ $group['title'] }}
                            </div>

                            <div class="grid grid-cols-[3.25rem_1fr] gap-3">
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-2xl shadow-inner dark:bg-slate-900">
                                    {{ $group['emoji'] }}
                                </div>

                                <ul class="space-y-1.5 text-sm font-bold leading-snug text-slate-700 dark:text-slate-200">
                                    @foreach($group['items'] as $item)
                                        <li class="flex gap-2">
                                            <span class="mt-[0.45rem] h-2 w-2 shrink-0 rounded-full {{ $group['dot'] }}"></span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            {{-- DESKTOP / XL VERSION --}}
            <div class="relative hidden lg:block">
                <div class="relative mx-auto grid w-full grid-cols-[minmax(330px,375px)_minmax(210px,250px)_minmax(330px,375px)] grid-rows-[auto_auto_auto] items-center justify-center gap-x-14 gap-y-8">

                    {{-- Lines behind cards --}}
                    <svg
                            class="pointer-events-none absolute inset-0 z-0 h-full w-full"
                            viewBox="0 0 1140 590"
                            fill="none"
                            preserveAspectRatio="none"
                    >
                        <path d="M570 295 C485 235 440 125 290 95" stroke="#60a5fa" stroke-width="8" stroke-linecap="round"/>
                        <path d="M570 295 C655 235 700 125 850 95" stroke="#4ade80" stroke-width="8" stroke-linecap="round"/>

                        <path d="M550 305 C460 305 415 305 290 305" stroke="#fbbf24" stroke-width="8" stroke-linecap="round"/>
                        <path d="M590 305 C680 305 725 305 850 305" stroke="#fb923c" stroke-width="8" stroke-linecap="round"/>

                        <path d="M550 325 C465 415 425 505 290 505" stroke="#a78bfa" stroke-width="8" stroke-linecap="round"/>
                        <path d="M590 325 C675 415 715 505 850 505" stroke="#f472b6" stroke-width="8" stroke-linecap="round"/>
                    </svg>

                    {{-- Simple center card --}}
                    <div class="relative z-30 col-start-2 row-start-2 flex justify-center">
                        <div class="w-full rounded-2xl border-2 border-slate-300 bg-white px-5 py-4 text-center shadow-md shadow-slate-900/5 dark:border-slate-700 dark:bg-slate-900">
                            <h2 class="text-lg font-black uppercase leading-tight tracking-wide text-slate-900 dark:text-white">
                                Birth Order<br>
                                &<br>
                                Personality
                            </h2>
                        </div>
                    </div>

                    @foreach($groups as $group)
                        <article class="relative z-20 w-full rounded-[1.6rem] border-2 {{ $group['border'] }} {{ $group['card_bg'] }} px-4 pb-4 pt-8 shadow-sm {{ $group['desktop'] }}">
                            <div class="absolute left-6 top-0 z-30 max-w-[88%] -translate-y-1/2 rounded-full {{ $group['badge'] }} px-5 py-2 text-sm font-black uppercase leading-none tracking-wide text-white shadow-sm">
                                {{ $group['number'] }}. {{ $group['title'] }}
                            </div>

                            <div class="grid grid-cols-[4rem_1fr] gap-3">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white text-3xl shadow-inner dark:bg-slate-900">
                                    {{ $group['emoji'] }}
                                </div>

                                <ul class="space-y-1.5 text-[13px] font-bold leading-snug text-slate-700 dark:text-slate-200">
                                    @foreach($group['items'] as $item)
                                        <li class="flex gap-2">
                                            <span class="mt-[0.45rem] h-2 w-2 shrink-0 rounded-full {{ $group['dot'] }}"></span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            {{-- Remember box --}}
            <div class="mx-auto mt-6 w-full max-w-[1050px] rounded-3xl border border-slate-200 bg-white px-6 py-4 text-center shadow-sm dark:border-slate-700 dark:bg-slate-900">
                <p class="text-sm font-extrabold leading-snug text-slate-700 dark:text-slate-200 sm:text-base lg:text-lg">
                    💡 Remember: Every child is unique.
                    <br class="sm:hidden">
                    Birth order can influence us, but love, environment and experiences shape who we become. 💗
                </p>
            </div>
        </section>
    </main>
@endsection