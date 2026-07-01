@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Prefixes',
        'title'      => 'Prefixes',
        'subtitle'   => 'A prefix is a short group of letters added to the beginning of a word to change its meaning.',

        'table_title' => 'PREFIXES',
        'table_note'  => 'Negative Meaning',

        'rows' => [
            [
                'prefix' => 'un-',
                'meaning' => 'not / opposite of',
                'examples_from_story' => ['unnoticed', 'unrecognized'],
                'more_examples' => ['unkind', 'unfair', 'unhappy'],
            ],
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-4">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-8 w-full max-w-5xl overflow-hidden rounded-3xl border border-green-200 bg-white shadow-xl dark:border-slate-700 dark:bg-slate-900">
            <div class="bg-green-500 px-6 py-4 text-center text-white dark:bg-green-700">
                <h2 class="text-2xl font-black tracking-wide">
                    {{ $content['table_title'] }}
                    <span class="font-bold">({{ $content['table_note'] }})</span>
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[750px] border-collapse text-center">
                    <thead>
                    <tr class="bg-green-50 text-slate-900 dark:bg-slate-800 dark:text-slate-100">
                        <th class="border border-green-200 px-4 py-3 text-lg font-black dark:border-slate-700">
                            Prefix
                        </th>
                        <th class="border border-green-200 px-4 py-3 text-lg font-black dark:border-slate-700">
                            Meaning
                        </th>
                        <th class="border border-green-200 px-4 py-3 text-lg font-black dark:border-slate-700">
                            Examples from the story
                        </th>
                        <th class="border border-green-200 px-4 py-3 text-lg font-black dark:border-slate-700">
                            More Examples
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($content['rows'] as $row)
                        <tr class="bg-white transition hover:bg-green-50 dark:bg-slate-900 dark:hover:bg-slate-800">
                            <td class="border border-green-200 px-4 py-5 dark:border-slate-700">
                                    <span class="text-3xl font-black text-green-700 dark:text-green-300">
                                        {{ $row['prefix'] }}
                                    </span>
                            </td>

                            <td class="border border-green-200 px-4 py-5 dark:border-slate-700">
                                    <span class="text-lg font-extrabold text-slate-800 dark:text-slate-100">
                                        {{ $row['meaning'] }}
                                    </span>
                            </td>

                            <td class="border border-green-200 px-4 py-5 dark:border-slate-700">
                                <div class="flex flex-wrap items-center justify-center gap-2">
                                    @foreach ($row['examples_from_story'] as $example)
                                        <span class="rounded-full bg-green-100 px-4 py-2 text-base font-black text-green-800 dark:bg-green-950 dark:text-green-200">
                                                {{ $example }}
                                            </span>
                                    @endforeach
                                </div>
                            </td>

                            <td class="border border-green-200 px-4 py-5 dark:border-slate-700">
                                <div class="flex flex-wrap items-center justify-center gap-2">
                                    @foreach ($row['more_examples'] as $example)
                                        <span class="rounded-full bg-green-100 px-4 py-2 text-base font-black text-green-800 dark:bg-green-950 dark:text-green-200">
                                                {{ $example }}
                                            </span>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
@endsection