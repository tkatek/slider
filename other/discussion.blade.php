@extends("slider.simple-layout")
@section("content")
    <main class="w-full">
        <div class="mx-auto w-full max-w-6xl px-4 sm:px-8 py-8 sm:py-10 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid place-items-center text-center gap-6 sm:gap-8">
                    <div id="titleBlock" class="space-y-2 sm:space-y-3">
                        <h1 class="font-black leading-[1.02] tracking-[-0.05em] text-4xl sm:text-5xl lg:text-6xl">
                        <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                            {{ $content['title'] }}
                        </span>
                        </h1>

                        <p class="mx-auto max-w-xl font-extrabold tracking-[-0.02em] text-base sm:text-lg text-slate-700 dark:text-slate-200">
                            {{ $content['subtitle'] }}
                        </p>
                    </div>

                    <div class="w-full grid grid-cols-1 lg:grid-cols-[1fr_0.95fr] gap-5 sm:gap-6 items-stretch">
                        <div class="flex flex-col gap-4 sm:gap-5 text-left">
                            @foreach($content['cards'] as $index => $card)
                                @php
                                    $themeClasses = match($card['theme'] ?? 'indigo') {
                                        'blue' => [
                                            'marker' => 'text-emerald-600 border-emerald-100 bg-emerald-50/80 dark:text-emerald-300 dark:border-white/10 dark:bg-white/5',
                                        ],
                                        default => [
                                            'marker' => 'text-indigo-600 border-indigo-100 bg-indigo-50/80 dark:text-indigo-300 dark:border-white/10 dark:bg-white/5',
                                        ],
                                    };
                                @endphp

                                <div class="relative z-10 flex items-center gap-5 sm:gap-6 rounded-3xl border border-slate-200/80 bg-white/85 px-5 py-5 shadow-[0_10px_30px_-18px_rgba(0,0,0,0.18)] backdrop-blur dark:border-slate-700/70 dark:bg-slate-900/55">
                                    <div class="marker-circle flex h-11 w-11 sm:h-12 sm:w-12 shrink-0 items-center justify-center rounded-2xl border-2 text-[1.2rem] font-extrabold shadow-[inset_0_2px_6px_rgba(0,0,0,0.06)] {{ $themeClasses['marker'] }}">
                                        {{ $card['emoji'] }}
                                    </div>

                                    <div class="flex-1 min-w-0">
                                    <span class="mb-1 block text-[0.65rem] font-black uppercase tracking-[0.22em] text-slate-400">
                                        {{ $card['label'] }}
                                    </span>

                                        <p class="text-lg sm:text-xl font-extrabold leading-[1.2] text-slate-900 dark:text-slate-100">
                                            {{ $card['text'] }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="w-full">
                            <div class="h-full overflow-hidden rounded-3xl border border-slate-200/80 bg-white/85 p-3 shadow-[0_10px_30px_-18px_rgba(0,0,0,0.18)] backdrop-blur dark:border-slate-700/70 dark:bg-slate-900/55">
                                <img
                                        src="{{ $content['image'] }}"
                                        alt="{{ $content['image_alt'] }}"
                                        class="h-full w-full rounded-[1.35rem] object-cover"
                                        loading="lazy"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection