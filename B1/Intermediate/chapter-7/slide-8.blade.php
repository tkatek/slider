@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Birth Order & Personality',
        'title'      => 'Personality Adjectives',
        'subtitle'   => 'Which description fits you?',
    ];

    $groups = [
        [
            'emoji' => '👑',
            'title' => '1. Firstborn Children',
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
            'emoji' => '🤝',
            'title' => '2. Middle Children',
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
            'emoji' => '🌟',
            'title' => '3. Youngest Children',
            'items' => [
                'Fewer strict rules',
                'Social and funny',
                'Risk-takers',
                'Learn from older siblings',
                'Can depend on others',
            ],
        ],
        [
            'emoji' => '🎯',
            'title' => '4. Only Children',
            'items' => [
                'Full parental attention',
                'Strong language & thinking skills',
                'Independent',
                'Focused on goals',
                'May need teamwork skills',
            ],
        ],
        [
            'emoji' => '👯',
            'title' => '5. Twins',
            'items' => [
                'Very strong bond',
                'High emotional understanding',
                'Shared experiences',
                'May struggle with identity',
            ],
        ],
        [
            'emoji' => '🌱',
            'title' => '6. Gap Children',
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
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-5">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-5 w-full max-w-6xl">
            <div class="mb-5 text-center">
                <h2 class="text-2xl font-black text-emerald-600 dark:text-emerald-300 sm:text-3xl">
                    Birth Order & Personality
                </h2>
            </div>

            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($groups as $group)
                    <article class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm shadow-slate-900/5 dark:border-slate-700 dark:bg-slate-900">
                        <div class="flex items-center gap-3">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-2xl dark:bg-slate-800">
                                {{ $group['emoji'] }}
                            </div>

                            <h3 class="text-lg font-black uppercase leading-tight text-slate-900 dark:text-slate-50">
                                {{ $group['title'] }}
                            </h3>
                        </div>

                        <ul class="mt-4 space-y-2 text-base font-bold leading-snug text-slate-700 dark:text-slate-200">
                            @foreach($group['items'] as $item)
                                <li class="flex gap-2">
                                    <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-emerald-500"></span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>

            <div class="mx-auto mt-5 max-w-3xl rounded-2xl border border-sky-200 bg-sky-50 px-5 py-4 text-center shadow-sm dark:border-sky-800 dark:bg-sky-950/40">
                <p class="text-base font-extrabold leading-snug text-slate-800 dark:text-slate-100 sm:text-lg">
                    💡 Remember: Every child is unique.<br>
                    Birth order can influence us, but love, environment and experiences shape who we become. 💗
                </p>
            </div>
        </section>
    </main>
@endsection