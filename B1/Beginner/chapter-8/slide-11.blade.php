@php
    $theme = $theme ?? [
        'name' => 'green',
        'primary_color' => 'bg-gradient-to-r from-emerald-500 to-sky-500',
        'button_primary_color' => 'bg-gradient-to-r from-emerald-600 to-sky-600',
    ];

    $content = [
        'page_title' => 'Listening Dictation',
        'title'      => 'Listening Dictation',
        'subtitle'   => 'Listen, then write the full sentence you will listen to:',

        'audio' => materialAsset('slider/B1/Beginner/chapter-8/audios/slide10.mp3'),

        'dictation_items' => [
            "If I had a million pounds, I'd buy a big house in the countryside.",
            'If I were the boss, I would let people work from home.',
        ],
    ];

    $playerAudio = $content['audio'];
    $audioPlayerUid = 'listening_dictation_audio';
    $audioPlayerFloating = true;

    $scriptLines = [
        'Speaker 1: Emma',
        "If I had a million pounds, I'd buy a big house in the countryside. I'd decorate it nicely and hire a cleaner and a gardener. I'd also buy a new car, a dog, and some horses. I would still work because I enjoy my job.",

        'Speaker 2: Louise',
        "If I had a million pounds, I'd quit my university course because I don't enjoy it. I'd study something creative, like fashion design. I'd open a small studio and work with creative people. I'd save some money for the future too.",

        'Speaker 3: Duncan',
        "If I had a million pounds, I'd travel around the world. I'd visit Africa and Asia and learn new skills. Then I'd buy a house and a car. After that, I'd give some of the money to charity and live a normal life.",
    ];

    $hasScript = count($scriptLines) > 0;
@endphp

@extends('slider.simple-layout')

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden py-3 sm:py-5">
        @include('slider.components.title-subtitle')

        @if(!empty($playerAudio))
            <section class="mx-auto w-full max-w-3xl px-3 sm:px-6 lg:px-8">
                @include('slider.components.audio-player')
            </section>
        @endif

        <section class="mx-auto flex w-full max-w-6xl flex-1 items-center px-3 py-3 sm:px-6 lg:px-8">
            <div class="mx-auto w-full max-w-4xl">
                <div class="relative mx-auto overflow-hidden rounded-[1.75rem] border-2 border-slate-900/80 bg-white/85 p-4 shadow-[0_18px_45px_rgba(15,23,42,0.08)] dark:border-slate-700/80 dark:bg-slate-900/90 sm:p-5 lg:p-7">
                    <div class="pointer-events-none absolute inset-2 rounded-[1.35rem] border border-slate-300/80 dark:border-slate-700/80"></div>

                    <div class="relative grid gap-4">
                        @foreach($content['dictation_items'] as $index => $sentence)
                            <article class="rounded-3xl border-2 border-slate-200 bg-white/90 p-4 shadow-[0_10px_26px_rgba(15,23,42,0.06)] dark:border-slate-700 dark:bg-slate-950/45 sm:p-5">
                                <div class="flex items-start gap-3">
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-slate-950 text-base font-black text-white dark:bg-white dark:text-slate-950">
                                        {{ $index + 1 }}
                                    </span>

                                    <p class="pt-1 text-base font-black leading-snug text-slate-950 dark:text-slate-50 sm:text-lg lg:text-xl">
                                        {{ $sentence }}
                                    </p>
                                </div>

                                <textarea
                                        name="dictation_{{ $index + 1 }}"
                                        rows="3"
                                        class="mt-4 block h-[5.5rem] w-full resize-none overflow-y-auto border-0 bg-transparent text-base font-bold leading-8 text-slate-950 outline-none focus:ring-0 dark:text-slate-50 sm:h-[6.5rem] sm:text-lg"
                                        style="background-image: repeating-linear-gradient(to bottom, transparent 0, transparent 31px, rgba(148,163,184,.65) 32px);"
                                ></textarea>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection