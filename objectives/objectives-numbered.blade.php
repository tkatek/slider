@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .outcomes-timeline{ position: relative; }
    </style>
@endsection

@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-x-hidden">
        <main class="w-full">
            <div class="mx-auto w-full max-w-5xl px-4 sm:px-8 py-8 sm:py-10 lg:min-h-[100dvh] lg:flex lg:items-center">
                <section class="w-full">
                    <div class="grid place-items-center text-center gap-6 sm:gap-8">
                        <div class="header-spacing text-center space-y-6 my-8">

                            <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{$content['title']}}
                            </span>
                            </h1>
                            <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                {{$content['subtitle']}}
                            </p>
                        </div>

                        <div id="timeline" class="outcomes-timeline w-full max-w-3xl text-left flex flex-col gap-4 sm:gap-5">
                            @foreach($content['outcomes'] as $outcome)
                                @php
                                    $index = ($loop->iteration - 1) % 4;
                                    $colors = [
                                        'text-indigo-600 border-indigo-100 bg-indigo-50/80 dark:text-indigo-300 dark:border-white/10 dark:bg-white/5',
                                        'text-emerald-600 border-emerald-100 bg-emerald-50/80 dark:text-emerald-300 dark:border-white/10 dark:bg-white/5',
                                        'text-amber-600 border-amber-100 bg-amber-50/80 dark:text-amber-300 dark:border-white/10 dark:bg-white/5',
                                        'text-rose-600 border-rose-100 bg-rose-50/80 dark:text-rose-300 dark:border-white/10 dark:bg-white/5',
                                    ];
                                    $label = $outcome['label'] ?? ('Outcome ' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT));
                                    $text  = $outcome['text'] ?? '';
                                @endphp

                                <div class="outcome-item relative z-10 flex items-center gap-5 sm:gap-6 rounded-3xl border border-slate-200 bg-white px-5 py-5 dark:border-slate-700 dark:bg-slate-900">
                                    <div class="marker-circle flex h-11 w-11 sm:h-12 sm:w-12 shrink-0 items-center justify-center rounded-2xl border-2 text-[0.95rem] font-extrabold {{ $colors[$index] }}">
                                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                    </div>

                                    <div class="flex-1">
                                        {{-- ✅ This is now editable from $content['outcomes'][x]['label'] --}}
                                        <span class="mb-1 block text-[0.65rem] font-black uppercase tracking-[0.22em] text-slate-400">
                                            {{ $label }}
                                        </span>

                                        {{-- ✅ This is the main editable sentence --}}
                                        <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                            {{ $text }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection

