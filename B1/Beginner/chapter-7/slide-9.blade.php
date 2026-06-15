@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'The 3 States of Wishes',
        'title'      => 'The 3 States of Wishes',
        'subtitle'   => 'We use “wish” to talk about things that are not true, and that we want to change.',

        'states' => [
            [
                'number' => '1',
                'title'  => 'Present Wishes',
                'theme'  => [
                    'header' => 'bg-green-700 dark:bg-green-500',
                    'border' => 'border-green-300 dark:border-green-500/40',
                    'soft'   => 'bg-green-50 dark:bg-green-500/10',
                    'text'   => 'text-green-800 dark:text-green-300',
                    'dot'    => 'bg-green-600 dark:bg-green-400',
                ],
                'rule_intro' => 'We use wishes about the present when we want the situation now to be different.',
                'formula' => [
                    'I wish + past simple',
                    '(be → were)',
                ],
                'examples' => [
                    ['text' => 'I wish I had a car like that.', 'emojis' => ['🚗', '✨']],
                    ['text' => 'I wish I wasn’t stuck behind this bus!', 'emojis' => ['🚌', '🚦']],
                    ['text' => 'I wish this guy were wearing headphones.', 'emojis' => ['🎧', '🔊']],
                    ['text' => 'I wish more people were as kind as you!', 'emojis' => ['🤝', '🍽️']],
                ],
            ],
            [
                'number' => '2',
                'title'  => 'Future Wishes',
                'theme'  => [
                    'header' => 'bg-blue-700 dark:bg-blue-500',
                    'border' => 'border-blue-300 dark:border-blue-500/40',
                    'soft'   => 'bg-blue-50 dark:bg-blue-500/10',
                    'text'   => 'text-blue-800 dark:text-blue-300',
                    'dot'    => 'bg-blue-600 dark:bg-blue-400',
                ],
                'rule_intro' => 'We use wishes about the future when we want something different to happen.',
                'formula' => [
                    'I wish + would + base verb',
                ],
                'examples' => [
                    ['text' => 'I wish you would stop dreaming and mow the lawn like you said!', 'emojis' => ['🌱', '✂️']],
                    ['text' => 'I wish we didn’t have to go home so early!', 'emojis' => ['🏠', '⏰']],
                    ['text' => 'I wish it would stop raining!', 'emojis' => ['🌧️', '🛑']],
                    ['text' => 'I wish we had brought an umbrella!', 'emojis' => ['☔', '🌧️']],
                ],
            ],
            [
                'number' => '3',
                'title'  => 'Past Wishes',
                'theme'  => [
                    'header' => 'bg-purple-700 dark:bg-purple-500',
                    'border' => 'border-purple-300 dark:border-purple-500/40',
                    'soft'   => 'bg-purple-50 dark:bg-purple-500/10',
                    'text'   => 'text-purple-800 dark:text-purple-300',
                    'dot'    => 'bg-purple-600 dark:bg-purple-400',
                ],
                'rule_intro' => 'We use wishes about the past when we regret something that already happened.',
                'formula' => [
                    'I wish + past perfect',
                    '(had + past participle)',
                ],
                'examples' => [
                    ['text' => 'I wish I had taken a different route.', 'emojis' => ['🛣️', '🚗']],
                    ['text' => 'I wish I didn’t have to take the bus.', 'emojis' => ['🚌', '😩']],
                    ['text' => 'I wish I had a seat.', 'emojis' => ['💺', '😴']],
                    ['text' => 'I wish I hadn’t brought this stupid umbrella!', 'emojis' => ['☔', '😤']],
                ],
            ],
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden py-3 sm:py-4">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-[92rem] px-3 py-3 sm:px-5 lg:px-6">
            <div class="grid gap-4 lg:grid-cols-3">
                @foreach($content['states'] as $state)
                    @php($stateTheme = $state['theme'])

                    <article class="overflow-hidden rounded-3xl border-2 {{ $stateTheme['border'] }} bg-white shadow-lg shadow-slate-900/5 dark:bg-slate-900/70">
                        <h2 class="{{ $stateTheme['header'] }} px-4 py-2 text-center text-xl font-black uppercase tracking-wide text-white sm:text-2xl">
                            {{ $state['number'] }}. {{ $state['title'] }}
                        </h2>

                        <div class="space-y-3 p-3 sm:p-4">
                            <p class="text-center text-sm font-extrabold leading-snug text-slate-800 dark:text-slate-100 sm:text-base">
                                {{ $state['rule_intro'] }}
                            </p>

                            <div class="rounded-2xl border {{ $stateTheme['border'] }} bg-white p-3 text-center dark:bg-slate-950/40">
                                @foreach($state['formula'] as $line)
                                    <p class="text-xl font-black leading-tight {{ $stateTheme['text'] }}">
                                        {{ $line }}
                                    </p>
                                @endforeach
                            </div>

                            <p class="border-t {{ $stateTheme['border'] }} pt-3 text-center text-xs font-black uppercase tracking-wide {{ $stateTheme['text'] }}">
                                Examples from the script
                            </p>

                            <div class="space-y-2">
                                @foreach($state['examples'] as $example)
                                    <div class="flex items-center justify-between gap-3 rounded-2xl {{ $stateTheme['soft'] }} p-3">
                                        <div class="flex items-start gap-2">
                                            <span class="mt-1.5 h-2.5 w-2.5 shrink-0 rounded-full {{ $stateTheme['dot'] }}"></span>

                                            <p class="text-sm font-extrabold leading-snug text-slate-900 dark:text-slate-100 sm:text-[0.95rem]">
                                                {{ $example['text'] }}
                                            </p>
                                        </div>

                                        <div class="shrink-0 whitespace-nowrap text-3xl leading-none sm:text-4xl">
                                            @foreach($example['emojis'] as $emoji)
                                                <span>{{ $emoji }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </main>
@endsection
