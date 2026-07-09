@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Exit Ticket',
        'title'      => 'Exit Ticket',
        'subtitle'   => 'Before you leave, complete these ideas.',

        'items' => [
            [
                'emoji' => '📘',
                'text'  => 'One new word I learned today is',
                'points' => '......',
            ],
            [
                'emoji' => '🫂',
                'text'  => 'One way to show empathy is',
                'points' => '......',
            ],
            [
                'emoji' => '🤝',
                'text'  => 'People should',
                'points' => '......',
            ],
            [
                'emoji' => '💡',
                'text'  => 'In one sentence, explain why empathy is important.',
                'points' => '',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2.5rem)] w-full max-w-[1100px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-6 grid w-full gap-4 sm:grid-cols-2">
                @foreach($content['items'] as $index => $item)
                    <div class="flex min-h-[145px] items-center gap-4 rounded-2xl border border-slate-200 bg-white px-5 py-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:px-6">
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-3xl dark:bg-emerald-500/10">
                            {{ $item['emoji'] }}
                        </div>

                        <div class="min-w-0">
                            <div class="mb-2 inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-black uppercase tracking-wide text-slate-500 dark:bg-slate-800 dark:text-slate-300">
                                Question {{ $index + 1 }}
                            </div>

                            <p class="text-[clamp(1.15rem,2vw,1.65rem)] font-black leading-snug text-slate-900 dark:text-white">
                                {{ $item['text'] }}
                                @if(!empty($item['points']))
                                    <span class="text-emerald-600 dark:text-emerald-300">
                                        {{ $item['points'] }}
                                    </span>
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection