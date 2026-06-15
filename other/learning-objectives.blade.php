@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $content['title_class'] = $content['title_class'] ?? 'text-4xl sm:text-5xl lg:text-6xl';

    $pageTitle = trim((string)($content['title'] ?? 'Learning Objectives'));
    $type = trim((string)($content['type'] ?? 'type1'));
    $allowedTypes = ['type1', 'type2', 'type3', 'type4'];

    if (!in_array($type, $allowedTypes, true)) {
        $type = 'type1';
    }

    $objectives = is_array($content['objectives'] ?? null) 
        ? array_values($content['objectives'])
        : [];

    $themeName = (string)($theme['name'] ?? 'default');
    $primaryGradient = trim((string)($theme['primary_color'] ?? 'bg-gradient-to-br from-indigo-600 via-blue-600 to-violet-600'));
    $buttonGradient = trim((string)($theme['button_primary_color'] ?? $primaryGradient)); 

    if ($themeName === 'orange') {
        $softAccentClass = 'bg-orange-50 text-orange-700 ring-orange-200 dark:bg-orange-400/10 dark:text-orange-200 dark:ring-orange-300/20';
        $softBorderClass = 'border-orange-200/80 dark:border-orange-300/20';
        $textAccentClass = 'text-orange-700 dark:text-orange-200';
        $lineClass = 'bg-orange-200 dark:bg-orange-300/20';
    } elseif ($themeName === 'green') {
        $softAccentClass = 'bg-emerald-50 text-emerald-700 ring-emerald-200 dark:bg-emerald-400/10 dark:text-emerald-200 dark:ring-emerald-300/20';
        $softBorderClass = 'border-emerald-200/80 dark:border-emerald-300/20';
        $textAccentClass = 'text-emerald-700 dark:text-emerald-200';
        $lineClass = 'bg-emerald-200 dark:bg-emerald-300/20';
    } else {
        $softAccentClass = 'bg-indigo-50 text-indigo-700 ring-indigo-200 dark:bg-indigo-400/10 dark:text-indigo-200 dark:ring-indigo-300/20';
        $softBorderClass = 'border-indigo-200/80 dark:border-indigo-300/20';
        $textAccentClass = 'text-indigo-700 dark:text-indigo-200';
        $lineClass = 'bg-indigo-200 dark:bg-indigo-300/20';
    }

    $objectiveCount = count($objectives);

    $defaultGridClass = match ($type) {
        'type2' => $objectiveCount <= 3
            ? 'grid-cols-1 lg:grid-cols-' . max(1, $objectiveCount)
            : 'grid-cols-1 sm:grid-cols-2',
        'type4' => $objectiveCount <= 4
            ? 'grid-cols-1 lg:grid-cols-' . max(1, min($objectiveCount, 2))
            : 'grid-cols-1 lg:grid-cols-2',
        default => $objectiveCount <= 2
            ? 'grid-cols-1 sm:grid-cols-' . max(1, $objectiveCount)
            : ($objectiveCount === 4
                ? 'grid-cols-1 sm:grid-cols-2'
                : 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3'),
    };

    $gridClass = trim((string)($content['grid_class'] ?? $defaultGridClass));
    $contentWidthClass = $objectiveCount <= 3 ? 'max-w-5xl' : 'max-w-6xl';
    $type3WidthClass = $objectiveCount <= 3 ? 'max-w-4xl' : 'max-w-5xl';
    $type4WidthClass = $objectiveCount <= 3 ? 'max-w-4xl' : 'max-w-5xl';

    $resolveObjective = static function ($objective, $index) {
        $objective = is_array($objective) ? $objective : ['title' => (string)$objective];

        $title = trim((string)($objective['title'] ?? $objective['heading'] ?? $objective['text'] ?? ''));
        $subtitle = trim((string)($objective['subtitle'] ?? $objective['subheading'] ?? $objective['description'] ?? ''));

        return [
            'emoji' => trim((string)($objective['emoji'] ?? '')),
            'title' => $title,
            'subtitle' => $subtitle,
            'number' => str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT),
        ];
    };

@endphp

@section('title', $pageTitle)

@section('content')
    <div class="relative h-[100dvh] w-full overflow-hidden font-sans">
        <div id="slideViewport" class="h-[100dvh] overflow-x-hidden overflow-y-auto">
            <div class="mx-auto flex min-h-[100dvh] w-full max-w-[1280px] items-center px-4 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6">
                <main class="w-full">
                    <section class="grid w-full place-items-center gap-4 text-center sm:gap-5">
                        @include('slider.components.title-subtitle')

                        @if($objectives === [])
                            <div class="mx-auto w-full max-w-2xl rounded-3xl border border-slate-200/80 bg-white/95 px-5 py-6 text-center shadow-[0_16px_38px_rgba(15,23,42,0.07)] dark:border-slate-700/70 dark:bg-slate-900/90">
                                <p class="text-base font-black text-slate-700 dark:text-slate-200">
                                    Add objectives to show them here.
                                </p>
                            </div>
                        @elseif($type === 'type2')
                            <div class="mx-auto w-full {{ $contentWidthClass }} text-left">
                                <div class="grid {{ $gridClass }} gap-2.5 sm:gap-3 lg:gap-3.5">
                                    @foreach($objectives as $rawObjective)
                                        @php($objective = $resolveObjective($rawObjective, $loop->index))

                                        <article class="flex min-h-[92px] items-center gap-3 rounded-2xl border border-slate-200/75 bg-white/95 px-4 py-3.5 shadow-[0_10px_26px_rgba(15,23,42,0.055)] dark:border-slate-700/70 dark:bg-slate-900/90 sm:gap-4 sm:px-5">
                                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl text-2xl ring-1 {{ $softAccentClass }} sm:h-14 sm:w-14 sm:text-3xl">
                                                {{ $objective['emoji'] !== '' ? $objective['emoji'] : '•' }}
                                            </div>

                                            <div class="min-w-0 flex-1">
                                                <h3 class="text-base font-black leading-snug tracking-[-0.01em] text-slate-950 dark:text-slate-50 sm:text-lg">
                                                    {!! $objective['title'] !!}
                                                </h3>

                                                @if($objective['subtitle'] !== '')
                                                    <p class="mt-1 text-sm font-bold leading-[1.4] text-slate-600 dark:text-slate-200 sm:text-base">
                                                        {!! $objective['subtitle'] !!}
                                                    </p>
                                                @endif
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @elseif($type === 'type3')
                            <div class="mx-auto w-full {{ $type3WidthClass }} text-left">
                                <div class="grid grid-cols-1 gap-2.5 sm:gap-3">
                                    @foreach($objectives as $rawObjective)
                                        @php($objective = $resolveObjective($rawObjective, $loop->index))

                                        <article class="flex min-h-[82px] items-center gap-3 rounded-2xl border border-slate-200/75 bg-white/95 px-4 py-3 shadow-[0_10px_26px_rgba(15,23,42,0.055)] dark:border-slate-700/70 dark:bg-slate-900/90 sm:gap-4 sm:px-5">
                                            <div class="flex h-11 min-w-11 shrink-0 items-center justify-center rounded-xl px-2 text-sm font-black text-white shadow-md {{ $buttonGradient }}">
                                                {{ $objective['number'] }}
                                            </div>

                                            @if($objective['emoji'] !== '')
                                                <div class="shrink-0 text-2xl leading-none sm:text-3xl">
                                                    {{ $objective['emoji'] }}
                                                </div>
                                            @endif

                                            <div class="min-w-0 flex-1">
                                                <h3 class="text-base font-black leading-snug tracking-[-0.01em] text-slate-950 dark:text-slate-50 sm:text-lg">
                                                    {!! $objective['title'] !!}
                                                </h3>

                                                @if($objective['subtitle'] !== '')
                                                    <p class="mt-1 text-sm font-bold leading-[1.4] text-slate-600 dark:text-slate-200 sm:text-base">
                                                        {!! $objective['subtitle'] !!}
                                                    </p>
                                                @endif
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @elseif($type === 'type4')
                            <div class="mx-auto w-full {{ $type4WidthClass }} text-left">
                                <div class="grid {{ $gridClass }} gap-2.5 sm:gap-3">
                                    @foreach($objectives as $rawObjective)
                                        @php($objective = $resolveObjective($rawObjective, $loop->index))

                                        <article class="flex min-h-[78px] items-center gap-3 rounded-2xl border border-slate-200/75 bg-white/95 px-4 py-3 shadow-[0_10px_26px_rgba(15,23,42,0.055)] dark:border-slate-700/70 dark:bg-slate-900/90 sm:px-5">
                                            <div class="flex h-10 min-w-10 shrink-0 items-center justify-center rounded-xl px-2 text-xs font-black text-white shadow-md {{ $buttonGradient }}">
                                                {{ $objective['number'] }}
                                            </div>

                                            @if($objective['emoji'] !== '')
                                                <div class="shrink-0 text-2xl leading-none">
                                                    {{ $objective['emoji'] }}
                                                </div>
                                            @endif

                                            <div class="min-w-0 flex-1">
                                                <h3 class="text-base font-black leading-snug tracking-[-0.01em] text-slate-950 dark:text-slate-50 sm:text-lg">
                                                    {!! $objective['title'] !!}
                                                </h3>

                                                @if($objective['subtitle'] !== '')
                                                    <p class="mt-1 text-sm font-bold leading-[1.4] text-slate-600 dark:text-slate-200 sm:text-base">
                                                        {!! $objective['subtitle'] !!}
                                                    </p>
                                                @endif
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="mx-auto w-full {{ $contentWidthClass }} text-left">
                                <div class="grid {{ $gridClass }} gap-3 sm:gap-3.5 lg:gap-4">
                                    @foreach($objectives as $rawObjective)
                                        @php($objective = $resolveObjective($rawObjective, $loop->index))

                                        <article class="relative min-h-[145px] overflow-hidden rounded-3xl border border-slate-200/80 bg-white/95 p-4 shadow-[0_16px_36px_rgba(15,23,42,0.065)] dark:border-slate-700/70 dark:bg-slate-900/90 sm:p-5">
                                            <div class="absolute -right-10 -top-10 h-28 w-28 rounded-full bg-slate-100/80 dark:bg-white/5"></div>
                                            <div class="absolute inset-y-4 left-0 w-1 rounded-r-full {{ $lineClass }}"></div>

                                            <div class="relative z-10 flex h-full flex-col justify-between gap-4">
                                                <div class="flex items-start justify-between gap-3">
                                                    <span class="inline-flex h-8 min-w-8 items-center justify-center rounded-full px-2 text-[0.7rem] font-black text-white shadow-md {{ $buttonGradient }}">
                                                        {{ $objective['number'] }}
                                                    </span>

                                                    @if($objective['emoji'] !== '')
                                                        <span class="text-3xl leading-none">
                                                            {{ $objective['emoji'] }}
                                                        </span>
                                                    @endif
                                                </div>

                                                <div>
                                                    <h3 class="text-base font-black leading-snug tracking-[-0.01em] text-slate-950 dark:text-slate-50 sm:text-lg">
                                                        {!! $objective['title'] !!}
                                                    </h3>

                                                    @if($objective['subtitle'] !== '')
                                                        <p class="mt-1.5 text-sm font-bold leading-[1.4] text-slate-600 dark:text-slate-200">
                                                            {!! $objective['subtitle'] !!}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </section>
                </main>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        window.resetSlide = function () {};
    </script>
@endsection
