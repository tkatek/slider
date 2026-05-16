<?php
$content = [
    'page_title' => 'Remember This',
    'title'      => 'Remember This',
    'subtitle'   => 'Your small steps today are building the foundation for big achievements tomorrow.',

    'message' => 'Keep taking small steps forward, celebrate your progress, and never stop believing in yourself.',
];
?>

@extends('slider.simple-layout')

@section('content')
    @php
        $isOrangeTheme = ($theme['name'] ?? null) === 'orange';

        $themeGradientClass = $isOrangeTheme
            ? 'bg-gradient-to-br from-amber-400 via-orange-500 to-orange-600 dark:from-amber-400 dark:via-orange-500 dark:to-orange-700'
            : 'bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 dark:from-purple-500 dark:via-indigo-600 dark:to-purple-700';

        $themeTextGradientClass = $isOrangeTheme
            ? 'bg-gradient-to-r from-amber-500 via-orange-500 to-orange-600 dark:from-amber-300 dark:via-orange-300 dark:to-orange-500'
            : 'bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 dark:from-purple-300 dark:via-indigo-300 dark:to-blue-400';
    @endphp

    <div class="relative min-h-[100dvh] w-full overflow-hidden">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-6xl items-center px-4 py-5 sm:px-6 lg:px-8">
            <section class="relative w-full">
                <div class="pointer-events-none absolute -left-20 top-10 h-60 w-60 rounded-full bg-[var(--ambient-one)] opacity-30 blur-3xl"></div>
                <div class="pointer-events-none absolute -right-20 bottom-8 h-64 w-64 rounded-full bg-[var(--ambient-two)] opacity-25 blur-3xl"></div>

                <div class="relative mx-auto grid w-full place-items-center gap-5 text-center sm:gap-6">
                    @include('slider.components.title-subtitle')

                    <section class="w-full max-w-4xl">
                        <div class="relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white/90 p-5 shadow-2xl shadow-slate-900/10 ring-1 ring-slate-200/70 backdrop-blur dark:border-white/10 dark:bg-slate-900/85 dark:ring-white/10 sm:p-7 lg:p-8">
                            <div class="absolute left-0 top-0 h-1.5 w-full {{ $themeGradientClass }}"></div>

                            <div class="pointer-events-none absolute -left-10 -top-10 h-32 w-32 rounded-full {{ $themeGradientClass }} opacity-10 blur-2xl"></div>
                            <div class="pointer-events-none absolute -right-10 -bottom-10 h-32 w-32 rounded-full {{ $themeGradientClass }} opacity-10 blur-2xl"></div>

                            <div class="relative mx-auto flex max-w-3xl flex-col items-center gap-5">
                                <div class="flex h-16 w-16 items-center justify-center rounded-3xl {{ $themeGradientClass }} text-4xl shadow-xl shadow-slate-900/15 sm:h-20 sm:w-20 sm:text-5xl">
                                    🌱
                                </div>

                                <div class="space-y-4">
                                    <p class="font-serif text-2xl font-black leading-[1.25] tracking-[-0.03em] text-slate-900 dark:text-slate-50 sm:text-3xl lg:text-4xl">
                                        “{{ $content['subtitle'] }}”
                                    </p>

                                    <div class="mx-auto h-1 w-24 rounded-full {{ $themeGradientClass }}"></div>

                                    <p class="mx-auto max-w-2xl text-base font-bold leading-[1.65] text-slate-600 dark:text-slate-200 sm:text-lg lg:text-xl">
                                        {{ $content['message'] }}
                                    </p>
                                </div>

                                <div class="grid w-full max-w-2xl grid-cols-3 gap-2 pt-2 sm:gap-3">
                                    <div class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-3 text-center dark:border-white/10 dark:bg-white/5">
                                        <div class="text-2xl sm:text-3xl">👣</div>
                                    </div>

                                    <div class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-3 text-center dark:border-white/10 dark:bg-white/5">
                                        <div class="text-2xl sm:text-3xl">⭐</div>
                                    </div>

                                    <div class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-3 text-center dark:border-white/10 dark:bg-white/5">
                                        <div class="text-2xl sm:text-3xl">🏆</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </main>
    </div>

    <script>
        window.resetSlide = function () {};
    </script>
@endsection