@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Past Modals of Deduction',
        'title'      => 'Grammar: Past modals of deduction',
        'subtitle'   => '',

        'cards' => [
            [
                'title' => 'MUST HAVE',
                'icon' => '✓',
                'emoji' => '🙋‍♂️',
                'text' => 'We are almost certain that something happened in the past.',
                'example' => 'He must have gone to visit a friend.',
                'theme' => [
                    'border' => 'border-green-500',
                    'soft' => 'bg-green-50 dark:bg-green-500/10',
                    'text' => 'text-green-700 dark:text-green-300',
                    'badge' => 'bg-green-600 text-white',
                ],
            ],
            [
                'title' => 'MIGHT HAVE',
                'icon' => '?',
                'emoji' => '🤔',
                'text' => 'It is possible that something happened in the past.',
                'example' => 'He might have gone to France.',
                'theme' => [
                    'border' => 'border-pink-500',
                    'soft' => 'bg-pink-50 dark:bg-pink-500/10',
                    'text' => 'text-pink-600 dark:text-pink-300',
                    'badge' => 'bg-pink-600 text-white',
                ],
            ],
            [
                'title' => 'COULD HAVE',
                'icon' => '⌕',
                'emoji' => '🧒',
                'text' => 'It is another possible explanation about something in the past.',
                'example' => 'Where could he have gone?',
                'theme' => [
                    'border' => 'border-blue-500',
                    'soft' => 'bg-blue-50 dark:bg-blue-500/10',
                    'text' => 'text-blue-700 dark:text-blue-300',
                    'badge' => 'bg-blue-600 text-white',
                ],
            ],
            [
                'title' => "CAN’T HAVE",
                'icon' => '×',
                'emoji' => '🙅‍♀️',
                'text' => 'We are sure that something did not happen in the past.',
                'example' => "He can’t have forgotten to call us.",
                'theme' => [
                    'border' => 'border-orange-500',
                    'soft' => 'bg-orange-50 dark:bg-orange-500/10',
                    'text' => 'text-orange-600 dark:text-orange-300',
                    'badge' => 'bg-orange-500 text-white',
                ],
            ],
        ],

        'certainty' => [
            ['label' => 'MUST HAVE', 'note' => '100% sure', 'class' => 'border-green-400 bg-green-50 text-green-700 dark:bg-green-500/10 dark:text-green-200'],
            ['label' => 'MIGHT HAVE', 'note' => 'possible', 'class' => 'border-pink-400 bg-pink-50 text-pink-600 dark:bg-pink-500/10 dark:text-pink-200'],
            ['label' => 'COULD HAVE', 'note' => 'also possible', 'class' => 'border-blue-400 bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-200'],
            ['label' => "CAN’T HAVE", 'note' => 'not possible', 'class' => 'border-orange-400 bg-orange-50 text-orange-600 dark:bg-orange-500/10 dark:text-orange-200'],
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-3 py-4 text-slate-950 dark:text-slate-50 sm:px-5 lg:px-7">
        <section class="mx-auto flex min-h-[calc(100dvh-2rem)] w-full max-w-[1280px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <div class="mt-4 grid gap-3 lg:grid-cols-[1fr_0.92fr_1fr] lg:items-center">
                <div class="space-y-3">
                    @foreach([$content['cards'][0], $content['cards'][2]] as $card)
                        @php($cardTheme = $card['theme'])

                        <article class="relative overflow-hidden rounded-[1.6rem] border-4 {{ $cardTheme['border'] }} {{ $cardTheme['soft'] }} p-4 shadow-xl shadow-slate-900/10 dark:shadow-none">
                            <div class="flex items-start gap-3">
                                <div class="grid h-14 w-14 shrink-0 place-items-center rounded-full {{ $cardTheme['badge'] }} text-4xl font-black">
                                    {{ $card['icon'] }}
                                </div>

                                <div class="min-w-0 flex-1">
                                    <h2 class="text-3xl font-black leading-none tracking-tight underline decoration-4 underline-offset-8 {{ $cardTheme['text'] }}">
                                        {{ $card['title'] }}
                                    </h2>

                                    <p class="mt-4 max-w-sm text-lg font-black leading-snug text-slate-950 dark:text-white">
                                        {!! str_replace(['almost certain', 'possible', 'did not'], ['<span class="' . $cardTheme['text'] . '">almost certain</span>', '<span class="' . $cardTheme['text'] . '">possible</span>', '<span class="' . $cardTheme['text'] . '">did not</span>'], $card['text']) !!}
                                    </p>
                                </div>
                            </div>

                            <div class="mt-4 inline-flex rounded-xl {{ $cardTheme['badge'] }} px-3 py-1 text-sm font-black uppercase">
                                Example:
                            </div>

                            <div class="mt-3 flex items-end justify-between gap-3">
                                <p class="text-lg font-black leading-snug text-slate-950 dark:text-white">
                                    {!! preg_replace('/(' . preg_quote(strtolower($card['title']), '/') . ')/i', '<span class="' . $cardTheme['text'] . '">$1</span>', $card['example']) !!}
                                </p>

                                <div class="shrink-0 text-7xl leading-none">
                                    {{ $card['emoji'] }}
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <section class="order-first flex flex-col items-center justify-center lg:order-none">
                    <div class="relative mx-auto grid min-h-[250px] w-full max-w-[360px] place-items-center rounded-[2rem] border-4 border-blue-900 bg-white px-6 py-8 text-center shadow-2xl shadow-blue-950/20 dark:border-blue-300 dark:bg-slate-900">
                        <div class="absolute -top-9 grid h-16 w-16 place-items-center rounded-full border-4 border-blue-900 bg-yellow-300 text-4xl shadow-lg dark:border-blue-300">
                            💡
                        </div>

                        <h1 class="text-4xl font-black leading-none tracking-tight text-blue-950 dark:text-blue-100 sm:text-5xl">
                            PAST<br>
                            MODALS OF<br>
                            DEDUCTION
                        </h1>

                        <p class="mt-5 text-lg font-black leading-snug text-slate-800 dark:text-slate-100">
                            We use them to make guesses about things that happened in the past.
                        </p>
                    </div>
                </section>

                <div class="space-y-3">
                    @foreach([$content['cards'][1], $content['cards'][3]] as $card)
                        @php($cardTheme = $card['theme'])

                        <article class="relative overflow-hidden rounded-[1.6rem] border-4 {{ $cardTheme['border'] }} {{ $cardTheme['soft'] }} p-4 shadow-xl shadow-slate-900/10 dark:shadow-none">
                            <div class="flex items-start gap-3">
                                <div class="grid h-14 w-14 shrink-0 place-items-center rounded-full {{ $cardTheme['badge'] }} text-4xl font-black">
                                    {{ $card['icon'] }}
                                </div>

                                <div class="min-w-0 flex-1">
                                    <h2 class="text-3xl font-black leading-none tracking-tight underline decoration-4 underline-offset-8 {{ $cardTheme['text'] }}">
                                        {{ $card['title'] }}
                                    </h2>

                                    <p class="mt-4 max-w-sm text-lg font-black leading-snug text-slate-950 dark:text-white">
                                        {!! str_replace(['almost certain', 'possible', 'did not'], ['<span class="' . $cardTheme['text'] . '">almost certain</span>', '<span class="' . $cardTheme['text'] . '">possible</span>', '<span class="' . $cardTheme['text'] . '">did not</span>'], $card['text']) !!}
                                    </p>
                                </div>
                            </div>

                            <div class="mt-4 inline-flex rounded-xl {{ $cardTheme['badge'] }} px-3 py-1 text-sm font-black uppercase">
                                Example:
                            </div>

                            <div class="mt-3 flex items-end justify-between gap-3">
                                <p class="text-lg font-black leading-snug text-slate-950 dark:text-white">
                                    {!! preg_replace('/(' . preg_quote(strtolower($card['title']), '/') . ')/i', '<span class="' . $cardTheme['text'] . '">$1</span>', $card['example']) !!}
                                </p>

                                <div class="shrink-0 text-7xl leading-none">
                                    {{ $card['emoji'] }}
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="mt-3 grid gap-3 lg:grid-cols-[0.8fr_1.4fr]">
                <section class="rounded-2xl border-2 border-dashed border-purple-300 bg-white p-4 shadow-sm dark:border-purple-400/40 dark:bg-slate-900">
                    <div class="flex items-center gap-3">
                        <div class="rounded-xl bg-purple-700 px-4 py-3 text-xl font-black leading-tight text-white">
                            KEY<br>IDEA
                        </div>

                        <p class="text-base font-black leading-snug text-slate-800 dark:text-slate-100 sm:text-lg">
                            These modals help us guess about the past. We use clues to decide how sure we are.
                        </p>
                    </div>
                </section>

                <section class="rounded-2xl border-2 border-dashed border-purple-300 bg-white p-4 shadow-sm dark:border-purple-400/40 dark:bg-slate-900">
                    <h2 class="mb-3 text-xl font-black uppercase tracking-wide text-purple-700 dark:text-purple-300">
                        Certainty
                    </h2>

                    <div class="grid gap-2 sm:grid-cols-4">
                        @foreach($content['certainty'] as $item)
                            <div class="rounded-xl border-2 px-3 py-2 text-center font-black {{ $item['class'] }}">
                                <p class="text-sm">{{ $item['label'] }}</p>
                                <p class="text-xs">({{ $item['note'] }})</p>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </section>
    </main>
@endsection
