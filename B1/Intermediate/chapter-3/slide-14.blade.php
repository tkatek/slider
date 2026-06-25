<?php
$content = [
    'title' => 'Listening',
    'subtitle' => 'The future (Listen and Read)',

    'audio' => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide14.mp3'),

    'passage' => [
        'I sometimes wonder what life will be like in the future.',
        'Life has changed so much in just the past few years.',
        "I'm sure that there are still big changes that are coming.",
        "Do you think we'll still drive cars?",
        "Maybe we'll get into computerized vehicles that we won't have to drive.",
        "We'll just push a few buttons, and the vehicles will take us to wherever we have to go.",
        "Maybe there won't be roads.",
        'We might just fly through space to get where we want to go.',
        "Instead of telephones, we'll just use our computers.",
        "We'll be able to see each other when we talk.",
        'That type of thing is already happening.',
        "Maybe we won't have to cook our meals.",
        'We might be able to push buttons to order whatever we want.',
        'A nice roast beef dinner, or an ice cream sundae, might just pop out of a machine.',
        'It would be nice to have a robot to clean the house for you.',
    ],
];
?>

@extends('slider.simple-layout')

@php
    $playerAudio = !empty($content['audio']) ? $content['audio'] : null;

    /*
     * Required by slider.components.audio-player
     * Fixes: Undefined variable $hasScript
     */
    $scriptSource = $content['transcript'] ?? $content['passage'] ?? [];

    if (is_string($scriptSource)) {
        $scriptLines = array_values(array_filter(
            array_map('trim', preg_split('/\R+/', trim($scriptSource))),
            static fn ($line) => $line !== ''
        ));
    } elseif (is_array($scriptSource)) {
        $scriptLines = array_values(array_filter(
            array_map(static fn ($line) => trim((string) $line), $scriptSource),
            static fn ($line) => $line !== ''
        ));
    } else {
        $scriptLines = [];
    }

    $hasScript = $scriptLines !== [];

    $theme = $theme ?? [];
    $primaryGradient = trim((string) ($theme['primary_color'] ?? 'bg-gradient-to-r from-indigo-500 to-blue-500'));

    $passage = $content['passage'] ?? [];

    if (is_string($passage)) {
        $passageParagraphs = array_values(array_filter(
            array_map('trim', preg_split('/\R\s*\R/', trim($passage))),
            static fn ($paragraph) => $paragraph !== ''
        ));
    } elseif (is_array($passage)) {
        $passageParagraphs = array_values(array_filter(
            array_map(static fn ($paragraph) => trim((string) $paragraph), $passage),
            static fn ($paragraph) => $paragraph !== ''
        ));
    } else {
        $passageParagraphs = [];
    }

    $bulletColors = [
        'bg-sky-500',
        'bg-violet-500',
        'bg-emerald-500',
        'bg-amber-500',
        'bg-rose-500',
        'bg-indigo-500',
        'bg-cyan-500',
        'bg-orange-500',
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-7xl px-4 pb-5 pt-3 sm:px-6 sm:pb-8 lg:px-8">
            <div class="relative overflow-hidden rounded-[1.5rem] border border-slate-200/90 bg-white/95 p-4 shadow-[0_22px_58px_rgba(15,23,42,0.09)] dark:border-slate-700/80 dark:bg-slate-900/90 sm:rounded-[2rem] sm:p-6">
                <div class="pointer-events-none absolute inset-x-0 top-0 h-1.5 {{ $primaryGradient }}"></div>

                @if($playerAudio)
                    <div class="mx-auto mb-3 max-w-4xl">
                        @include('slider.components.audio-player')
                    </div>
                @endif

                <article class="max-h-[64dvh] overflow-y-auto rounded-[1.25rem] border border-slate-200 bg-white px-4 py-4 text-slate-800 shadow-inner dark:border-slate-700 dark:bg-slate-950/40 dark:text-slate-100 sm:px-7 sm:py-5">
                    <ul class="space-y-0 text-base font-semibold leading-6 sm:text-lg sm:leading-7 lg:text-xl lg:leading-8">
                        @foreach($passageParagraphs as $paragraph)
                            @php
                                $bulletColor = $bulletColors[$loop->index % count($bulletColors)];
                            @endphp

                            <li class="flex items-start gap-2">
                                <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full {{ $bulletColor }}"></span>
                                <span>{{ $paragraph }}</span>
                            </li>
                        @endforeach
                    </ul>
                </article>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            function stopSlideMedia() {
                window.stopAudioPlayer?.();
            }

            window.stopSlideAudio = () => {
                stopSlideMedia();
            };

            window.destroySlide = () => {
                stopSlideMedia();
            };

            window.resetSlide = () => {
                stopSlideMedia();
            };
        });
    </script>
@endsection