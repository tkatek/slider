@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Reading Comprehension',
        'title'      => 'Reading Comprehension',
        'subtitle'   => 'Open-Mindedness',

        'hero_subtitle' => 'See the world. Understand people. ❤️',

        'intro' => 'Open-mindedness means being willing to consider new ideas and different perspectives, even if they are not the same as your own. It helps us grow, learn, and build stronger relationships with others.',

        'cards' => [
            [
                'emoji'   => '👂',
                'title'   => 'Listen with respect',
                'text'    => 'Good listening is the first step. When we listen carefully, we show others that their ideas matter.',
                'example' => 'You listen to a classmate explain why they like a music genre you don’t know.',
                'color'   => 'orange',
            ],
            [
                'emoji'   => '🔍',
                'title'   => 'Be curious, not judgmental',
                'text'    => 'Ask questions and try to understand before making a decision or judgment.',
                'example' => 'You ask someone about their tradition instead of assuming you know about it.',
                'color'   => 'emerald',
            ],
            [
                'emoji'   => '🌍',
                'title'   => 'Consider different perspectives',
                'text'    => 'Everyone sees the world in a different way. Try to look at situations from other people’s points of view.',
                'example' => 'You think about how your friend might feel before you react.',
                'color'   => 'blue',
            ],
            [
                'emoji'   => '💡',
                'title'   => 'Accept that you might be wrong',
                'text'    => 'Nobody knows everything. Being open-minded means accepting that your opinion can change.',
                'example' => 'You change your mind after learning new information.',
                'color'   => 'purple',
            ],
            [
                'emoji'   => '💙',
                'title'   => 'Appreciate our differences',
                'text'    => 'Our differences make the world interesting. Respect others’ backgrounds, cultures, and beliefs.',
                'example' => 'You enjoy learning about a festival your friend celebrates.',
                'color'   => 'cyan',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-hidden px-4 py-3 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-1.5rem)] w-full max-w-[1280px] flex-col justify-center">

            {{-- Compact custom title --}}
            <header class="text-center">
                <h1 class="text-[clamp(2.3rem,4.2vw,4rem)] font-black leading-none tracking-tight text-emerald-600 dark:text-emerald-300">
                    {{ $content['title'] }}
                </h1>

                <p class="mt-2 text-[clamp(1rem,1.6vw,1.35rem)] font-black text-slate-900 dark:text-slate-100">
                    {{ $content['subtitle'] }}
                </p>
            </header>

            <section class="mt-3 overflow-hidden rounded-[1.75rem] border border-blue-200 bg-white shadow-[0_20px_60px_-40px_rgba(15,23,42,0.45)] dark:border-blue-400/20 dark:bg-slate-900">

                {{-- Intro --}}
                <div class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-cyan-50 px-5 py-4 text-center dark:from-slate-900 dark:via-slate-900 dark:to-blue-950 sm:px-8">
                    <div class="absolute left-5 top-4 text-4xl opacity-25">🌎</div>
                    <div class="absolute right-5 top-4 text-4xl opacity-25">🤝</div>

                    <p class="text-[clamp(1.25rem,2.3vw,1.8rem)] font-black text-emerald-700 dark:text-emerald-300">
                        {{ $content['hero_subtitle'] }}
                    </p>

                    <p class="mx-auto mt-3 max-w-5xl text-[clamp(0.9rem,1.25vw,1.1rem)] font-extrabold leading-snug text-slate-800 dark:text-slate-200">
                        {{ $content['intro'] }}
                    </p>
                </div>

                {{-- Cards --}}
                <div class="grid gap-3 p-3 sm:p-4 lg:grid-cols-5">
                    @foreach($content['cards'] as $card)
                        @php
                            $styles = [
                                'orange' => [
                                    'border' => 'border-orange-200 dark:border-orange-400/30',
                                    'bg'     => 'bg-orange-50 dark:bg-orange-500/10',
                                    'text'   => 'text-orange-600 dark:text-orange-300',
                                    'badge'  => 'bg-orange-500',
                                ],
                                'emerald' => [
                                    'border' => 'border-emerald-200 dark:border-emerald-400/30',
                                    'bg'     => 'bg-emerald-50 dark:bg-emerald-500/10',
                                    'text'   => 'text-emerald-700 dark:text-emerald-300',
                                    'badge'  => 'bg-emerald-500',
                                ],
                                'blue' => [
                                    'border' => 'border-blue-200 dark:border-blue-400/30',
                                    'bg'     => 'bg-blue-50 dark:bg-blue-500/10',
                                    'text'   => 'text-blue-700 dark:text-blue-300',
                                    'badge'  => 'bg-blue-600',
                                ],
                                'purple' => [
                                    'border' => 'border-purple-200 dark:border-purple-400/30',
                                    'bg'     => 'bg-purple-50 dark:bg-purple-500/10',
                                    'text'   => 'text-purple-700 dark:text-purple-300',
                                    'badge'  => 'bg-purple-600',
                                ],
                                'cyan' => [
                                    'border' => 'border-cyan-200 dark:border-cyan-400/30',
                                    'bg'     => 'bg-cyan-50 dark:bg-cyan-500/10',
                                    'text'   => 'text-cyan-700 dark:text-cyan-300',
                                    'badge'  => 'bg-cyan-600',
                                ],
                            ][$card['color']];
                        @endphp

                        <article class="flex h-full min-h-[315px] flex-col rounded-2xl border {{ $styles['border'] }} bg-white p-3 shadow-sm dark:bg-slate-950/35">
                            <div class="mx-auto grid h-11 w-11 shrink-0 place-items-center rounded-full {{ $styles['badge'] }} text-2xl shadow-lg">
                                {{ $card['emoji'] }}
                            </div>

                            <h2 class="mt-2 min-h-[48px] text-center text-[clamp(0.82rem,1.05vw,1rem)] font-black uppercase leading-tight {{ $styles['text'] }}">
                                {{ $card['title'] }}
                            </h2>

                            <div class="mt-2 flex flex-1 flex-col rounded-xl {{ $styles['bg'] }} px-3 py-2.5">
                                <p class="text-[clamp(0.72rem,0.9vw,0.86rem)] font-bold leading-snug text-slate-800 dark:text-slate-100">
                                    {{ $card['text'] }}
                                </p>

                                <div class="mt-auto pt-2">
                                    <div class="rounded-xl bg-white/85 px-2.5 py-2 dark:bg-white/10">
                                        <p class="text-[0.65rem] font-black uppercase tracking-wide {{ $styles['text'] }}">
                                            Example:
                                        </p>

                                        <p class="mt-1 text-[clamp(0.68rem,0.85vw,0.8rem)] font-bold leading-snug text-slate-700 dark:text-slate-200">
                                            {{ $card['example'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        </section>
    </main>
@endsection