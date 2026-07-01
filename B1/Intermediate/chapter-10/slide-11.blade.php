@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Synonyms & Antonyms',
        'title'      => 'What are synonyms & antonyms?!',
        'subtitle'   => 'Synonyms are words that mean the same. Antonyms are words that mean the opposite.',

        'rows' => [
            [
                'emoji'   => '🛡️',
                'word'    => 'brave',
                'synonym' => 'courageous',
                'antonym' => 'cowardly',
                'example' => 'Emily was brave to stand up.',
            ],
            [
                'emoji'   => '🙍‍♀️',
                'word'    => 'afraid',
                'synonym' => 'scared',
                'antonym' => 'fearless',
                'example' => 'She was afraid at first.',
            ],
            [
                'emoji'   => '🫶',
                'word'    => 'help',
                'synonym' => 'assist',
                'antonym' => 'ignore',
                'example' => 'She decided to help.',
            ],
            [
                'emoji'   => '😔',
                'word'    => 'guilty',
                'synonym' => 'ashamed',
                'antonym' => 'proud',
                'example' => 'She felt guilty for walking away.',
            ],
            [
                'emoji'   => '💪',
                'word'    => 'strength',
                'synonym' => 'power',
                'antonym' => 'weakness',
                'example' => 'She found the strength to act.',
            ],
            [
                'emoji'   => '🏅',
                'word'    => 'known',
                'synonym' => 'famous',
                'antonym' => 'unknown',
                'example' => 'Emily became known in town.',
            ],
            [
                'emoji'   => '💡',
                'word'    => 'inspire',
                'synonym' => 'motivate',
                'antonym' => 'discourage',
                'example' => 'Her story inspired many.',
            ],
            [
                'emoji'   => '👁️',
                'word'    => 'noticed',
                'synonym' => 'seen',
                'antonym' => 'ignored',
                'example' => 'Heroes often go unnoticed.',
            ],
            [
                'emoji'   => '🧍‍♂️',
                'word'    => 'recognized',
                'synonym' => 'acknowledged',
                'antonym' => 'unrecognized',
                'example' => 'Many heroes are unrecognized.',
            ],
            [
                'emoji'   => '✅',
                'word'    => 'right',
                'synonym' => 'correct',
                'antonym' => 'wrong',
                'example' => 'She did what was right.',
            ],
            [
                'emoji'   => '⭐',
                'word'    => 'small',
                'synonym' => 'tiny',
                'antonym' => 'big',
                'example' => 'Even small acts make a difference.',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-4">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-4 w-full max-w-7xl overflow-x-auto">
            <table class="w-full min-w-[850px] border-collapse overflow-hidden rounded-2xl text-left">
                <thead>
                <tr class="bg-sky-50 text-slate-800 dark:bg-slate-800 dark:text-slate-100">
                    <th class="border border-slate-200 px-3 py-2.5 text-center text-sm font-black dark:border-slate-700">
                        Word
                    </th>
                    <th class="border border-slate-200 px-3 py-2.5 text-center text-sm font-black dark:border-slate-700">
                        Synonym<br>
                        <span class="text-xs font-bold text-slate-500 dark:text-slate-400">(Same)</span>
                    </th>
                    <th class="border border-slate-200 px-3 py-2.5 text-center text-sm font-black dark:border-slate-700">
                        Antonym<br>
                        <span class="text-xs font-bold text-slate-500 dark:text-slate-400">(Opposite)</span>
                    </th>
                    <th class="border border-slate-200 px-3 py-2.5 text-center text-sm font-black dark:border-slate-700">
                        Example from the story
                    </th>
                </tr>
                </thead>

                <tbody>
                @foreach ($content['rows'] as $row)
                    <tr class="bg-white transition hover:bg-sky-50 dark:bg-slate-900 dark:hover:bg-slate-800">
                        <td class="border border-slate-200 px-3 py-2 dark:border-slate-700">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-sky-100 text-2xl dark:bg-slate-800">
                                    {{ $row['emoji'] }}
                                </div>
                                <span class="text-base font-black text-slate-900 dark:text-white">
                                        {{ $row['word'] }}
                                    </span>
                            </div>
                        </td>

                        <td class="border border-slate-200 px-3 py-2 text-center dark:border-slate-700">
                                <span class="text-sm font-extrabold text-emerald-700 dark:text-emerald-300">
                                    {{ $row['synonym'] }}
                                </span>
                        </td>

                        <td class="border border-slate-200 px-3 py-2 text-center dark:border-slate-700">
                                <span class="text-sm font-extrabold text-rose-700 dark:text-rose-300">
                                    {{ $row['antonym'] }}
                                </span>
                        </td>

                        <td class="border border-slate-200 px-3 py-2 dark:border-slate-700">
                            <p class="text-sm font-bold leading-snug text-slate-700 dark:text-slate-200">
                                {{ $row['example'] }}
                            </p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection