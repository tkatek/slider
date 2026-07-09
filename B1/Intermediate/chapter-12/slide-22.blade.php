@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Exit Ticket',
        'title'      => 'Exit Ticket',
        'subtitle'   => '',

        'items' => [
            [
                'emoji' => '📘',
                'text'  => 'One new word I learned today is . . . . . .',
            ],
            [
                'emoji' => '🌍',
                'text'  => 'One way I can be more open-minded is . . . . . .',
            ],
            [
                'emoji' => '✍️',
                'text'  => 'Complete:',
                'extra' => 'I believe in . . . . . .',
            ],
            [
                'emoji' => '⭐',
                'text'  => 'Rate yourself:',
                'extra' => '1–5 How open-minded were you today?',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-hidden px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2rem)] w-full max-w-[1050px] flex-col justify-center">

            {{-- Custom compact title --}}
            <header class="text-center">
                <h1 class="text-[clamp(2.4rem,6vw,4.5rem)] font-black leading-none tracking-tight text-emerald-600 dark:text-emerald-300">
                    {{ $content['title'] }}
                </h1>
            </header>

            <section class="mx-auto mt-5 w-full overflow-hidden rounded-[1.75rem] border border-emerald-200 bg-white shadow-[0_22px_70px_-45px_rgba(15,23,42,0.45)] dark:border-emerald-400/25 dark:bg-slate-900 sm:mt-6">



                {{-- Cards --}}
                <div class="grid gap-3 p-3 sm:grid-cols-2 sm:p-4">
                    @foreach($content['items'] as $index => $item)
                        @php
                            $styles = [
                                [
                                    'border' => 'border-blue-200 dark:border-blue-400/30',
                                    'bg'     => 'bg-blue-50 dark:bg-blue-500/10',
                                    'icon'   => 'bg-blue-100 dark:bg-blue-500/15',
                                    'text'   => 'text-blue-700 dark:text-blue-300',
                                ],
                                [
                                    'border' => 'border-emerald-200 dark:border-emerald-400/30',
                                    'bg'     => 'bg-emerald-50 dark:bg-emerald-500/10',
                                    'icon'   => 'bg-emerald-100 dark:bg-emerald-500/15',
                                    'text'   => 'text-emerald-700 dark:text-emerald-300',
                                ],
                                [
                                    'border' => 'border-purple-200 dark:border-purple-400/30',
                                    'bg'     => 'bg-purple-50 dark:bg-purple-500/10',
                                    'icon'   => 'bg-purple-100 dark:bg-purple-500/15',
                                    'text'   => 'text-purple-700 dark:text-purple-300',
                                ],
                                [
                                    'border' => 'border-amber-200 dark:border-amber-400/30',
                                    'bg'     => 'bg-amber-50 dark:bg-amber-500/10',
                                    'icon'   => 'bg-amber-100 dark:bg-amber-500/15',
                                    'text'   => 'text-amber-700 dark:text-amber-300',
                                ],
                            ][$index];
                        @endphp

                        <article class="rounded-2xl border {{ $styles['border'] }} {{ $styles['bg'] }} p-3.5 sm:p-4">
                            <div class="flex items-start gap-3 sm:gap-4">
                                <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl {{ $styles['icon'] }} text-2xl sm:h-14 sm:w-14 sm:text-3xl">
                                    {{ $item['emoji'] }}
                                </div>

                                <div class="min-w-0 flex-1 pt-0.5">
                                    <p class="text-[clamp(1rem,4.2vw,1.35rem)] font-black leading-snug text-slate-900 dark:text-white">
                                        {{ $item['text'] }}
                                    </p>

                                    @if(!empty($item['extra']))
                                        <p class="mt-2 text-[clamp(1rem,4.1vw,1.3rem)] font-black leading-snug {{ $styles['text'] }}">
                                            {{ $item['extra'] }}
                                        </p>
                                    @endif

                                    @if($index === 3)
                                        <div class="mt-4 flex flex-wrap gap-2">
                                            @foreach([1, 2, 3, 4, 5] as $number)
                                                <div class="grid h-9 w-9 place-items-center rounded-full bg-white text-sm font-black text-slate-800 shadow-sm dark:bg-white/10 dark:text-white sm:h-10 sm:w-10 sm:text-base">
                                                    {{ $number }}
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        </section>
    </main>
@endsection