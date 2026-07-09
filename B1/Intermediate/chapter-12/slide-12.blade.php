@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Grammar Focus',
        'title'      => 'Grammar Focus',
        'subtitle'   => 'Verb + Preposition + Gerund (-ing)',

        'rows' => [
            [
                'verb' => 'think',
                'emoji' => '🤔',
                'preposition' => 'about',
                'example' => 'I’m thinking <span class="font-black text-rose-600 dark:text-rose-300">about moving</span> to another city.',
                'meaning' => 'To consider or have an idea about something.',
            ],
            [
                'verb' => 'look forward to',
                'emoji' => '🤩',
                'preposition' => 'to',
                'example' => 'She looks forward <span class="font-black text-rose-600 dark:text-rose-300">to meeting</span> her cousins.',
                'meaning' => 'To feel happy and excited about something.',
            ],
            [
                'verb' => 'be good at',
                'emoji' => '🌟',
                'preposition' => 'at',
                'example' => 'He is good <span class="font-black text-rose-600 dark:text-rose-300">at playing</span> the guitar.',
                'meaning' => 'To have skill in doing something.',
            ],
            [
                'verb' => 'be interested in',
                'emoji' => '🔍',
                'preposition' => 'in',
                'example' => 'We are interested <span class="font-black text-rose-600 dark:text-rose-300">in learning</span> about space.',
                'meaning' => 'To like or want to know more about something.',
            ],
            [
                'verb' => 'be proud of',
                'emoji' => '🏅',
                'preposition' => 'of',
                'example' => 'They are proud <span class="font-black text-rose-600 dark:text-rose-300">of winning</span> the match.',
                'meaning' => 'To feel happy because of someone’s achievement.',
            ],
            [
                'verb' => 'be afraid of',
                'emoji' => '😟',
                'preposition' => 'of',
                'example' => 'I am afraid <span class="font-black text-rose-600 dark:text-rose-300">of speaking</span> in public.',
                'meaning' => 'To feel fear about something.',
            ],
            [
                'verb' => 'insist on',
                'emoji' => '📣',
                'preposition' => 'on',
                'example' => 'She insists <span class="font-black text-rose-600 dark:text-rose-300">on finishing</span> her work.',
                'meaning' => 'To demand or request strongly.',
            ],
            [
                'verb' => 'depend on',
                'emoji' => '🤝',
                'preposition' => 'on',
                'example' => 'We depend <span class="font-black text-rose-600 dark:text-rose-300">on</span> our friends for support.',
                'meaning' => 'To rely on someone or something.',
            ],
        ],

        'patterns' => [
            'think about + -ing',
            'look forward to + -ing',
            'be good at + -ing',
            'be interested in + -ing',
            'be proud of + -ing',
            'be afraid of + -ing',
            'insist on + -ing',
            'depend on + -ing',
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-hidden px-4 py-3 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-1.5rem)] w-full max-w-[1320px] flex-col justify-center">

            {{-- Compact title --}}
            <header class="text-center">
                <h1 class="text-[clamp(2.3rem,4.2vw,4rem)] font-black leading-none tracking-tight text-emerald-600 dark:text-emerald-300">
                    {{ $content['title'] }}
                </h1>

                <p class="mt-2 text-[clamp(1rem,1.6vw,1.35rem)] font-black text-slate-900 dark:text-slate-100">
                    {{ $content['subtitle'] }}
                </p>
            </header>

            <section class="mt-3 overflow-hidden rounded-[1.75rem] border border-blue-200 bg-white shadow-[0_20px_60px_-40px_rgba(15,23,42,0.45)] dark:border-blue-400/20 dark:bg-slate-900">

                {{-- Rule --}}
                <div class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-cyan-50 px-5 py-3.5 text-center dark:from-slate-900 dark:via-slate-900 dark:to-blue-950 sm:px-8">
                    <div class="absolute left-5 top-3 text-4xl opacity-20">📚</div>
                    <div class="absolute right-5 top-3 text-4xl opacity-20">✨</div>

                    <p class="text-[clamp(0.95rem,1.35vw,1.2rem)] font-extrabold leading-snug text-slate-800 dark:text-slate-200">
                        We use
                        <span class="font-black text-blue-700 dark:text-blue-300">verbs</span>
                        +
                        <span class="font-black text-purple-700 dark:text-purple-300">prepositions</span>
                        +
                        <span class="font-black text-emerald-700 dark:text-emerald-300">gerunds</span>
                        to show
                        <span class="font-black text-rose-600 dark:text-rose-300">HOW</span>
                        we do things.
                    </p>
                </div>

                {{-- Desktop / Tablet Table --}}
                <div class="hidden p-3 sm:p-4 md:block">
                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-900">
                        <table class="w-full border-collapse text-left">
                            <thead>
                            <tr class="text-white">
                                <th class="w-[22%] bg-blue-700 px-3 py-2.5 text-center text-xs font-black uppercase tracking-wide lg:text-sm">
                                    Verb
                                </th>

                                <th class="w-[13%] bg-purple-700 px-3 py-2.5 text-center text-xs font-black uppercase tracking-wide lg:text-sm">
                                    Preposition
                                </th>

                                <th class="w-[35%] bg-emerald-700 px-3 py-2.5 text-center text-xs font-black uppercase tracking-wide lg:text-sm">
                                    Example
                                </th>

                                <th class="w-[30%] bg-orange-600 px-3 py-2.5 text-center text-xs font-black uppercase tracking-wide lg:text-sm">
                                    Meaning
                                </th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                            @foreach($content['rows'] as $row)
                                <tr class="align-middle odd:bg-white even:bg-slate-50 dark:odd:bg-slate-900 dark:even:bg-slate-950/50">
                                    <td class="px-3 py-2.5">
                                        <div class="flex items-center gap-2.5">
                                                <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-blue-50 text-xl shadow-sm dark:bg-blue-500/10">
                                                    {{ $row['emoji'] }}
                                                </span>

                                            <span class="text-[clamp(0.88rem,1vw,1rem)] font-black leading-tight text-blue-800 dark:text-blue-200">
                                                    {{ $row['verb'] }}
                                                </span>
                                        </div>
                                    </td>

                                    <td class="px-3 py-2.5 text-center">
                                            <span class="inline-flex rounded-full bg-purple-50 px-3 py-1 text-[clamp(0.85rem,1vw,1rem)] font-black text-purple-700 dark:bg-purple-500/10 dark:text-purple-200">
                                                {{ $row['preposition'] }}
                                            </span>
                                    </td>

                                    <td class="px-3 py-2.5">
                                        <p class="text-[clamp(0.82rem,0.98vw,0.96rem)] font-bold leading-snug text-slate-900 dark:text-slate-100">
                                            {!! $row['example'] !!}
                                        </p>
                                    </td>

                                    <td class="px-3 py-2.5">
                                        <p class="text-[clamp(0.78rem,0.9vw,0.9rem)] font-bold leading-snug text-slate-700 dark:text-slate-200">
                                            {{ $row['meaning'] }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Mobile Version --}}
                <div class="p-3 md:hidden">
                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-900">
                        @foreach($content['rows'] as $row)
                            <div class="border-b border-slate-200 px-4 py-4 last:border-b-0 dark:border-slate-700">
                                <div class="flex items-center justify-between gap-3">
                                    <div class="flex min-w-0 items-center gap-3">
                                        <span class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-blue-50 text-xl dark:bg-blue-500/10">
                                            {{ $row['emoji'] }}
                                        </span>

                                        <p class="min-w-0 break-words text-base font-black leading-tight text-blue-800 dark:text-blue-200">
                                            {{ $row['verb'] }}
                                        </p>
                                    </div>

                                    <span class="shrink-0 rounded-full bg-purple-50 px-3 py-1 text-sm font-black text-purple-700 dark:bg-purple-500/10 dark:text-purple-200">
                                        {{ $row['preposition'] }}
                                    </span>
                                </div>

                                <div class="mt-3 space-y-2">
                                    <div>
                                        <p class="text-[0.68rem] font-black uppercase tracking-wide text-emerald-700 dark:text-emerald-300">
                                            Example
                                        </p>

                                        <p class="mt-1 text-sm font-bold leading-snug text-slate-900 dark:text-slate-100">
                                            {!! $row['example'] !!}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-[0.68rem] font-black uppercase tracking-wide text-orange-600 dark:text-orange-300">
                                            Meaning
                                        </p>

                                        <p class="mt-1 text-sm font-bold leading-snug text-slate-700 dark:text-slate-200">
                                            {{ $row['meaning'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Bottom Notes --}}
                <div class="grid gap-3 border-t border-slate-100 bg-slate-50/70 p-3 dark:border-white/10 dark:bg-slate-950/30 sm:p-4 lg:grid-cols-[0.72fr_1.28fr]">
                    <div class="rounded-2xl border border-amber-200 bg-amber-50 px-4 py-3 dark:border-amber-400/30 dark:bg-amber-500/10">
                        <p class="text-xs font-black uppercase tracking-wide text-amber-700 dark:text-amber-300">
                            💡 Quick Tip
                        </p>

                        <p class="mt-1.5 text-[clamp(0.78rem,0.95vw,0.9rem)] font-bold leading-snug text-slate-800 dark:text-slate-100">
                            After some prepositions, we use a gerund
                            <span class="font-black text-emerald-700 dark:text-emerald-300">(verb + -ing)</span>,
                            not an infinitive.
                        </p>

                        <p class="mt-1.5 text-[clamp(0.72rem,0.85vw,0.82rem)] font-bold leading-snug text-slate-700 dark:text-slate-200">
                            Example:
                            <span class="text-emerald-700 dark:text-emerald-300">She’s thinking about studying abroad.</span>
                            <br>
                            <span class="text-rose-600 dark:text-rose-300">Not:</span>
                            She’s thinking about to study.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 dark:border-emerald-400/30 dark:bg-emerald-500/10">
                        <p class="text-xs font-black uppercase tracking-wide text-emerald-700 dark:text-emerald-300">
                            Common Verb + Preposition Patterns
                        </p>

                        <div class="mt-2 flex flex-wrap gap-2">
                            @foreach($content['patterns'] as $pattern)
                                <span class="rounded-full bg-white px-3 py-1 text-[clamp(0.7rem,0.82vw,0.78rem)] font-black leading-tight text-slate-800 shadow-sm dark:bg-white/10 dark:text-slate-100">
                                    ✅ {{ $pattern }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

            </section>
        </section>
    </main>
@endsection