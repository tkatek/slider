@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Quick Wrap Up',
        'title'      => 'Quick Wrap Up!',
        'subtitle'   => 'Complete the sentences:',
    ];

    $sentences = [
        [
            'start' => 'One valuable lesson I learnt from',
            'end'   => 'is that',
        ],
        [
            'start' => 'One leader who inspired me is',
            'end'   => '',
        ],
        [
            'start' => 'A person who inspires me is',
            'end'   => '',
        ],
        [
            'start' => 'A place where I feel motivated is',
            'end'   => '',
        ],
        [
            'start' => 'A book which influenced me is',
            'end'   => '',
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full items-center justify-center overflow-x-hidden px-4 py-6 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-5xl">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-7 grid w-full gap-4">
                @foreach($sentences as $index => $sentence)
                    <label class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-5">
                        <div class="flex flex-col gap-3 text-base font-black leading-relaxed text-slate-900 dark:text-slate-100 sm:flex-row sm:flex-wrap sm:items-center sm:text-lg">
                            <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-600 text-sm font-black text-white">
                                {{ $index + 1 }}
                            </span>

                            <span>{{ $sentence['start'] }}</span>

                            <input
                                    type="text"
                                    class="min-h-11 min-w-0 flex-1 rounded-xl border border-slate-300 bg-white px-4 py-2 text-base font-bold text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/15 dark:border-slate-700 dark:bg-slate-950 dark:text-white"
                            >

                            @if($sentence['end'])
                                <span>{{ $sentence['end'] }}</span>

                                <input
                                        type="text"
                                        class="min-h-11 min-w-0 flex-1 rounded-xl border border-slate-300 bg-white px-4 py-2 text-base font-bold text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/15 dark:border-slate-700 dark:bg-slate-950 dark:text-white"
                                >
                            @endif


                        </div>
                    </label>
                @endforeach
            </div>
        </section>
    </main>
@endsection