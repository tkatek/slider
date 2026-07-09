@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Degrees of Certainty',
        'title'      => 'Degrees of Certainty',
        'subtitle'   => 'We use different expressions to show how sure (or not sure) we are about something in the future, present and past.',

        'how_it_works' => [
            'The further left, the more certain we are.',
            'The further right, the less certain we are.',
        ],

        'scale' => [
            [
                'label' => 'Very Certain',
                'note'  => '+',
                'color' => 'green',
            ],
            [
                'label' => 'Probable / Likely',
                'note'  => '',
                'color' => 'lime',
            ],
            [
                'label' => 'Just a Possibility',
                'note'  => '',
                'color' => 'amber',
            ],
            [
                'label' => 'Improbable / Unlikely',
                'note'  => '',
                'color' => 'orange',
            ],
            [
                'label' => 'Very Certain',
                'note'  => '−',
                'color' => 'rose',
            ],
        ],

        'rows' => [
            [
                'level'       => 'Very Certain',
                'note'        => '+',
                'expressions' => ['I’m sure...', 'It will...', 'It must...'],
                'meaning'     => 'I am completely sure; I believe it is true.',
                'example'     => 'Barbara: How about a teddy bear? <span class="font-black text-green-700 dark:text-green-300">I’m sure</span> she’d like a teddy bear.',
                'color'       => 'green',
            ],
            [
                'level'       => 'Probable / Likely',
                'note'        => '',
                'expressions' => ['She’d like that.', 'It might...', 'It should...'],
                'meaning'     => 'It is likely or probably true.',
                'example'     => 'Mike: How about a jack-in-the-box? <span class="font-black text-lime-700 dark:text-lime-300">She’d like that</span>, wouldn’t she?',
                'color'       => 'lime',
            ],
            [
                'level'       => 'Just a Possibility',
                'note'        => '',
                'expressions' => ['It’s hard to say.', 'It might...', 'It could...'],
                'meaning'     => 'It is possible, but I am not sure.',
                'example'     => 'Barbara: It’s hard to say. <span class="font-black text-amber-700 dark:text-amber-300">It might</span> scare her.',
                'color'       => 'amber',
            ],
            [
                'level'       => 'Improbable / Unlikely',
                'note'        => '',
                'expressions' => ['I have my doubts.', 'I’m not sure...', 'It probably won’t...'],
                'meaning'     => 'It is not very likely or probably not true.',
                'example'     => 'Sandra: <span class="font-black text-orange-700 dark:text-orange-300">I have my doubts.</span> I’m not certain she has room in her heart for another one.',
                'color'       => 'orange',
            ],
            [
                'level'       => 'Very Certain',
                'note'        => '−',
                'expressions' => ['It won’t...', 'It can’t...', 'There’s no way...'],
                'meaning'     => 'I am almost sure it is not true.',
                'example'     => 'Mike: No, <span class="font-black text-rose-700 dark:text-rose-300">it won’t.</span> She’s a tough little girl.',
                'color'       => 'rose',
            ],
        ],

        'more_examples_title' => 'More Examples from the Dialogue',

        'more_examples' => [
            [
                'speaker' => 'Mum',
                'text'    => 'How about a painting set?',
                'note'    => 'suggestion – possible',
            ],
            [
                'speaker' => 'Barbara',
                'text'    => 'I can’t tell you for sure.',
                'note'    => 'not completely sure',
            ],
            [
                'speaker' => 'Mum',
                'text'    => 'A new painting set might help her to be more creative.',
                'note'    => 'possible result',
            ],
            [
                'speaker' => 'Barbara',
                'text'    => 'I’m just not sure a painting set is a good idea.',
                'note'    => 'not certain',
            ],
            [
                'speaker' => 'Mum',
                'text'    => 'Oh, dear...',
                'note'    => 'surprised / disappointed',
            ],
        ],

        'remember_title' => 'Remember!',

        'remember' => [
            'Very certain (+) = I’m sure / It will / It must',
            'Probable / Likely = She’d like / It might / It should',
            'Just a possibility = It might / It could / It’s hard to say',
            'Improbable / Unlikely = I have my doubts / It probably won’t',
            'Very certain (−) = It won’t / It can’t / There’s no way',
        ],

        'tips' => [
            'We use these expressions every day when we talk about what might happen!',
            'Think about how sure you are before you speak.',
        ],
    ];

    $styles = [
        'green' => [
            'text'   => 'text-green-700 dark:text-green-300',
            'bg'     => 'bg-green-50 dark:bg-green-500/10',
            'border' => 'border-green-200 dark:border-green-400/30',
            'dot'    => 'bg-green-500',
        ],
        'lime' => [
            'text'   => 'text-lime-700 dark:text-lime-300',
            'bg'     => 'bg-lime-50 dark:bg-lime-500/10',
            'border' => 'border-lime-200 dark:border-lime-400/30',
            'dot'    => 'bg-lime-500',
        ],
        'amber' => [
            'text'   => 'text-amber-700 dark:text-amber-300',
            'bg'     => 'bg-amber-50 dark:bg-amber-500/10',
            'border' => 'border-amber-200 dark:border-amber-400/30',
            'dot'    => 'bg-amber-500',
        ],
        'orange' => [
            'text'   => 'text-orange-700 dark:text-orange-300',
            'bg'     => 'bg-orange-50 dark:bg-orange-500/10',
            'border' => 'border-orange-200 dark:border-orange-400/30',
            'dot'    => 'bg-orange-500',
        ],
        'rose' => [
            'text'   => 'text-rose-700 dark:text-rose-300',
            'bg'     => 'bg-rose-50 dark:bg-rose-500/10',
            'border' => 'border-rose-200 dark:border-rose-400/30',
            'dot'    => 'bg-rose-500',
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2rem)] w-full max-w-[1350px] flex-col justify-center">

            @include('slider.components.title-subtitle')

            <section class="mx-auto mt-4 w-full overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_22px_70px_-48px_rgba(15,23,42,0.45)] dark:border-slate-700 dark:bg-slate-900">

                <div class="grid gap-4 border-b border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-800/60 lg:grid-cols-[1fr_280px]">
                    <div>
                        <div class="grid grid-cols-5 items-start gap-1">
                            @foreach($content['scale'] as $item)
                                @php
                                    $style = $styles[$item['color']];
                                @endphp

                                <div class="text-center">
                                    <p class="text-[0.65rem] font-black uppercase leading-tight {{ $style['text'] }} sm:text-xs">
                                        {{ $item['label'] }}
                                    </p>

                                    @if($item['note'])
                                        <p class="text-xs font-black {{ $style['text'] }}">
                                            ({{ $item['note'] }})
                                        </p>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-3 grid grid-cols-5 items-center">
                            @foreach($content['scale'] as $item)
                                @php
                                    $style = $styles[$item['color']];
                                @endphp

                                <div class="relative h-3 {{ $style['dot'] }}">
                                    <div class="absolute left-1/2 top-1/2 h-5 w-5 -translate-x-1/2 -translate-y-1/2 rounded-full border-4 border-white {{ $style['dot'] }} shadow-sm dark:border-slate-900"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="rounded-xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900">
                        <p class="text-sm font-black uppercase tracking-wide text-slate-800 dark:text-slate-100">
                            How it works
                        </p>

                        <ul class="mt-2 space-y-1.5">
                            @foreach($content['how_it_works'] as $item)
                                <li class="flex gap-2 text-sm font-bold leading-snug text-slate-700 dark:text-slate-200">
                                    <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-slate-500"></span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <div class="grid grid-cols-[0.8fr_1fr_1.25fr_2fr] border-b border-slate-200 bg-slate-100 text-sm font-black uppercase tracking-wide text-slate-600 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
                        <div class="px-4 py-2">Degree</div>
                        <div class="px-4 py-2">Expression</div>
                        <div class="px-4 py-2">Meaning</div>
                        <div class="px-4 py-2">Example from the Dialogue</div>
                    </div>

                    <div class="divide-y divide-slate-200 dark:divide-slate-700">
                        @foreach($content['rows'] as $row)
                            @php
                                $style = $styles[$row['color']];
                            @endphp

                            <article class="grid grid-cols-[0.8fr_1fr_1.25fr_2fr]">
                                <div class="flex items-center px-4 py-3 {{ $style['bg'] }}">
                                    <div class="rounded-xl border {{ $style['border'] }} bg-white px-3 py-2 text-center dark:bg-white/10">
                                        <p class="text-sm font-black uppercase leading-tight {{ $style['text'] }}">
                                            {{ $row['level'] }}
                                        </p>

                                        @if($row['note'])
                                            <p class="text-sm font-black {{ $style['text'] }}">
                                                ({{ $row['note'] }})
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="border-l border-slate-200 px-4 py-3 dark:border-slate-700">
                                    <div class="space-y-1">
                                        @foreach($row['expressions'] as $expression)
                                            <p class="text-sm font-black leading-snug {{ $style['text'] }}">
                                                {{ $expression }}
                                            </p>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="border-l border-slate-200 px-4 py-3 dark:border-slate-700">
                                    <p class="text-sm font-bold leading-snug text-slate-700 dark:text-slate-200">
                                        {{ $row['meaning'] }}
                                    </p>
                                </div>

                                <div class="border-l border-slate-200 px-4 py-3 dark:border-slate-700">
                                    <p class="text-sm font-bold leading-snug text-slate-800 dark:text-slate-100">
                                        {!! $row['example'] !!}
                                    </p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

                <div class="grid gap-3 p-3 lg:hidden">
                    @foreach($content['rows'] as $row)
                        @php
                            $style = $styles[$row['color']];
                        @endphp

                        <article class="rounded-2xl border {{ $style['border'] }} bg-white p-4 dark:bg-slate-950/35">
                            <div class="flex items-center justify-between gap-3">
                                <p class="text-base font-black uppercase leading-tight {{ $style['text'] }}">
                                    {{ $row['level'] }} @if($row['note']) ({{ $row['note'] }}) @endif
                                </p>
                            </div>

                            <div class="mt-3 grid gap-3 sm:grid-cols-3">
                                <div>
                                    <p class="text-xs font-black uppercase tracking-wide text-slate-500 dark:text-slate-400">
                                        Expression
                                    </p>

                                    <div class="mt-1 space-y-1">
                                        @foreach($row['expressions'] as $expression)
                                            <p class="text-sm font-black leading-snug {{ $style['text'] }}">
                                                {{ $expression }}
                                            </p>
                                        @endforeach
                                    </div>
                                </div>

                                <div>
                                    <p class="text-xs font-black uppercase tracking-wide text-slate-500 dark:text-slate-400">
                                        Meaning
                                    </p>

                                    <p class="mt-1 text-sm font-bold leading-snug text-slate-700 dark:text-slate-200">
                                        {{ $row['meaning'] }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-black uppercase tracking-wide text-slate-500 dark:text-slate-400">
                                        Example
                                    </p>

                                    <p class="mt-1 text-sm font-bold leading-snug text-slate-800 dark:text-slate-100">
                                        {!! $row['example'] !!}
                                    </p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="border-t border-slate-200 bg-slate-50 px-4 py-3 dark:border-slate-700 dark:bg-slate-800/50">
                    <h3 class="text-center text-sm font-black uppercase tracking-wide text-slate-800 dark:text-slate-100">
                        {{ $content['more_examples_title'] }}
                    </h3>

                    <div class="mt-3 grid gap-2 md:grid-cols-5">
                        @foreach($content['more_examples'] as $item)
                            <div class="rounded-xl bg-white px-3 py-2 dark:bg-slate-900">
                                <p class="text-xs font-black text-emerald-700 dark:text-emerald-300">
                                    {{ $item['speaker'] }}:
                                </p>

                                <p class="mt-0.5 text-sm font-bold leading-snug text-slate-800 dark:text-slate-100">
                                    {{ $item['text'] }}
                                </p>

                                <p class="mt-1 text-xs font-bold text-slate-500 dark:text-slate-400">
                                    ({{ $item['note'] }})
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="grid gap-3 border-t border-slate-200 px-4 py-3 dark:border-slate-700 lg:grid-cols-[220px_1fr]">
                    <h3 class="text-sm font-black uppercase tracking-wide text-slate-800 dark:text-slate-100">
                        {{ $content['remember_title'] }}
                    </h3>

                    <div class="grid gap-2 md:grid-cols-2 xl:grid-cols-5">
                        @foreach($content['remember'] as $item)
                            <p class="rounded-xl bg-slate-50 px-3 py-2 text-xs font-bold leading-snug text-slate-700 dark:bg-white/10 dark:text-slate-200">
                                {{ $item }}
                            </p>
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-wrap items-center justify-center gap-x-6 gap-y-2 border-t border-slate-200 bg-amber-50 px-4 py-2 dark:border-slate-700 dark:bg-amber-500/10">
                    @foreach($content['tips'] as $item)
                        <p class="text-sm font-bold leading-snug text-slate-700 dark:text-slate-200">
                            💡 {{ $item }}
                        </p>
                    @endforeach
                </div>

            </section>
        </section>
    </main>
@endsection