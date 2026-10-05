@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = trim((string) ($content['page_title'] ?? $content['title'] ?? 'Thank You!'));
    $title = trim((string) ($content['title'] ?? 'Thank You!'));
    $subtitle = trim((string) ($content['subtitle'] ?? 'Great work today.'));
    $image = trim((string) ($content['image'] ?? ''));
    $imageAlt = trim((string) ($content['image_alt'] ?? 'Students celebrating after completing the lesson'));
    $imagePosition = trim((string) ($content['image_position'] ?? 'center'));
    $label = trim((string) ($content['label'] ?? 'Follow-up discussion'));
    $heading = trim((string) ($content['heading'] ?? 'Think, discuss, and share'));
    $footer = trim((string) ($content['footer'] ?? 'Discuss your answers with a partner or with the class.'));
    $questions = array_values(array_filter(
        is_array($content['questions'] ?? null) ? $content['questions'] : [],
        static fn ($question) => trim((string) (is_array($question) ? ($question['text'] ?? '') : $question)) !== ''
    ));

    // Existing callers keep the rose accents unless they opt into the default theme.
    $imageDiscussionColors = ($theme['name'] ?? 'rose') === 'default' ? [
        'image' => 'border-indigo-200 ring-indigo-100/75 shadow-[0_24px_60px_-38px_rgba(55,48,163,.45)] dark:border-indigo-700 dark:bg-indigo-950/20 dark:ring-indigo-950/60',
        'panel' => 'border-indigo-200/80 bg-indigo-50/80 shadow-[0_18px_48px_-34px_rgba(55,48,163,.45)] dark:border-indigo-800/[0.55] dark:bg-indigo-950/25',
        'label' => 'bg-indigo-600 dark:bg-indigo-300 dark:text-indigo-950',
        'heading' => 'text-indigo-950 dark:text-indigo-100',
        'question' => 'border-indigo-200/80 dark:border-indigo-800/[0.45] dark:bg-indigo-950/30',
        'number' => 'bg-gradient-to-br from-indigo-600 to-blue-500 dark:from-indigo-300 dark:to-blue-300 dark:text-indigo-950',
        'footer' => 'text-indigo-700 dark:text-indigo-200',
    ] : [
        'image' => 'border-rose-200 ring-rose-100/75 shadow-[0_24px_60px_-38px_rgba(159,18,57,.45)] dark:border-rose-700 dark:bg-rose-950/20 dark:ring-rose-950/60',
        'panel' => 'border-rose-200/80 bg-rose-50/80 shadow-[0_18px_48px_-34px_rgba(159,18,57,.45)] dark:border-rose-800/55 dark:bg-rose-950/25',
        'label' => 'bg-rose-600 dark:bg-rose-300 dark:text-rose-950',
        'heading' => 'text-rose-950 dark:text-rose-100',
        'question' => 'border-rose-200/80 dark:border-rose-800/45 dark:bg-rose-950/30',
        'number' => 'bg-gradient-to-br from-rose-500 to-pink-700 dark:from-rose-300 dark:to-pink-400 dark:text-rose-950',
        'footer' => 'text-rose-700 dark:text-rose-200',
    ];
@endphp

@extends('slider.simple-layout')

@section('title', $pageTitle)

@section('content')
    <main class="mx-auto flex min-h-[100dvh] w-full max-w-[1500px] flex-col justify-center px-3 py-5 sm:px-5 sm:py-6 lg:px-7">
        @include('slider.components.title-subtitle', [
            'title' => $title,
            'subtitle' => $subtitle,
        ])

        <div class="mx-auto mt-4 grid w-full max-w-6xl items-center gap-4 lg:grid-cols-[minmax(0,1.05fr)_minmax(22rem,.95fr)]">
            @if($image !== '')
                <section class="overflow-hidden rounded-[1.75rem] border-[3px] bg-white ring-[7px] {{ $imageDiscussionColors['image'] }}">
                    <div class="aspect-[16/10] overflow-hidden">
                        <img
                            class="h-full w-full object-cover"
                            style="object-position: {{ $imagePosition }};"
                            src="{{ $image }}"
                            alt="{{ $imageAlt }}"
                            loading="eager"
                            fetchpriority="high"
                            decoding="async"
                            draggable="false"
                        >
                    </div>
                </section>
            @endif

            <section class="rounded-[1.75rem] border p-4 backdrop-blur sm:p-5 lg:p-6 {{ $imageDiscussionColors['panel'] }}">
                @if($label !== '')
                    <div class="inline-flex rounded-full px-4 py-1.5 text-xs font-black uppercase tracking-[0.14em] text-white {{ $imageDiscussionColors['label'] }}">
                        {{ $label }}
                    </div>
                @endif

                @if($heading !== '')
                    <h2 class="mt-3 text-xl font-black tracking-[-0.03em] sm:text-2xl {{ $imageDiscussionColors['heading'] }}">
                        {{ $heading }}
                    </h2>
                @endif

                <ol class="mt-4 space-y-3">
                    @foreach($questions as $question)
                        <li class="flex items-start gap-3 rounded-2xl border bg-white/75 p-3.5 {{ $imageDiscussionColors['question'] }}">
                            <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full text-sm font-black text-white shadow-sm {{ $imageDiscussionColors['number'] }}">
                                {{ $loop->iteration }}
                            </span>
                            <div class="min-w-0 pt-0.5 text-sm leading-relaxed text-slate-800 dark:text-slate-100 sm:text-base">
                                @if(is_array($question))
                                    @if(!empty($question['title']))
                                        <h3 class="font-black">{{ $question['title'] }}</h3>
                                    @endif
                                    @if(!empty($question['instruction']))
                                        <p class="mt-1 font-semibold">{{ $question['instruction'] }}</p>
                                    @endif
                                    <p class="mt-1 font-semibold">{{ $question['text'] }}</p>
                                @else
                                    <p class="font-black">{{ $question }}</p>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ol>

                @if($footer !== '')
                    <p class="mt-4 text-center text-sm font-black sm:text-base {{ $imageDiscussionColors['footer'] }}">
                        {{ $footer }}
                    </p>
                @endif
            </section>
        </div>
    </main>
@endsection
