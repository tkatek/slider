@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('content')
    @php
        $cardsGrid = trim((string)($content['cards_grid'] ?? ''));
        $useGridLayout = $cardsGrid !== '';
    @endphp

    <div class="relative min-h-[100dvh] w-full overflow-x-hidden font-sans">
        <main class="w-full">
            <div class="mx-auto w-full max-w-5xl px-4 py-8 sm:px-8 sm:py-10 lg:flex lg:min-h-[100dvh] lg:items-center">
                <section class="w-full">
                    <div class="grid place-items-center gap-6 text-center sm:gap-8">

                        @include('slider.components.title-subtitle')

                        <div
                                id="timeline"
                                class="{{ $useGridLayout
                                ? 'grid w-full max-w-6xl ' . $cardsGrid . ' gap-4 text-left sm:gap-5'
                                : 'flex w-full max-w-3xl flex-col gap-4 text-left sm:gap-5'
                            }}"
                        >
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

                                @if($useGridLayout)
                                    <article class="relative z-10 flex min-h-[190px] flex-col rounded-3xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-5">
                                        <div class="mb-4 flex items-center gap-3">
                                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl border-2 text-[0.95rem] font-extrabold sm:h-12 sm:w-12 {{ $colors[$index] }}">
                                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                            </div>

                                            <h3 class="text-base font-black leading-tight tracking-[-0.02em] text-slate-900 dark:text-slate-100 sm:text-lg">
                                                {{ $label }}
                                            </h3>
                                        </div>

                                        @if(trim(strip_tags($text)) !== '')
                                            <div class="text-sm font-bold leading-[1.55] text-slate-700 dark:text-slate-200 sm:text-base lg:text-[0.98rem]">
                                                {!! $text !!}
                                            </div>
                                        @endif
                                    </article>
                                @else
                                    <article class="relative z-10 flex items-start gap-4 rounded-3xl border border-slate-200 bg-white px-5 py-5 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:gap-6">
                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl border-2 text-[0.95rem] font-extrabold sm:h-12 sm:w-12 {{ $colors[$index] }}">
                                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </div>

                                        <div class="min-w-0 flex-1">
                                            <span class="mb-1 block text-[0.65rem] font-black uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">
                                                {{ $label }}
                                            </span>

                                            @if(trim(strip_tags($text)) !== '')
                                                <div class="text-base font-bold leading-[1.55] text-slate-900 dark:text-slate-100 sm:text-lg lg:text-[1.15rem]">
                                                    {!! $text !!}
                                                </div>
                                            @endif
                                        </div>
                                    </article>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection

@section('script')
    <script>
        window.resetSlide = function () {};
    </script>
@endsection