@php
    $content = is_array($content ?? null) ? $content : [];

    $theme = is_array($theme ?? null) ? $theme : [];
    $theme['name'] = trim((string) ($theme['name'] ?? '')) !== '' ? $theme['name'] : 'indigo';

    $pageTitle = trim((string) ($content['page_title'] ?? 'Writing'));
    $subtitle2 = trim((string) ($content['subtitle_2'] ?? ''));
    $rows = array_values(is_array($content['rows'] ?? null) ? $content['rows'] : []);

    $labelHeader = trim((string) ($content['label_header'] ?? ''));
    $inputHeader = trim((string) ($content['input_header'] ?? ''));
    $showHeaders = $labelHeader !== '' || $inputHeader !== '';

    $rowStyles = [
        [
            'label' => 'bg-sky-50/80 text-sky-950 dark:bg-slate-900/70 dark:text-sky-100',
            'badge' => 'bg-sky-500 text-white shadow-sky-500/20',
            'focus' => 'focus-within:border-sky-300 focus-within:ring-sky-100 dark:focus-within:border-sky-500/60 dark:focus-within:ring-sky-500/10',
        ],
        [
            'label' => 'bg-emerald-50/80 text-emerald-950 dark:bg-slate-900/70 dark:text-emerald-100',
            'badge' => 'bg-emerald-500 text-white shadow-emerald-500/20',
            'focus' => 'focus-within:border-emerald-300 focus-within:ring-emerald-100 dark:focus-within:border-emerald-500/60 dark:focus-within:ring-emerald-500/10',
        ],
        [
            'label' => 'bg-violet-50/80 text-violet-950 dark:bg-slate-900/70 dark:text-violet-100',
            'badge' => 'bg-violet-500 text-white shadow-violet-500/20',
            'focus' => 'focus-within:border-violet-300 focus-within:ring-violet-100 dark:focus-within:border-violet-500/60 dark:focus-within:ring-violet-500/10',
        ],
        [
            'label' => 'bg-amber-50/80 text-amber-950 dark:bg-slate-900/70 dark:text-amber-100',
            'badge' => 'bg-amber-500 text-white shadow-amber-500/20',
            'focus' => 'focus-within:border-amber-300 focus-within:ring-amber-100 dark:focus-within:border-amber-500/60 dark:focus-within:ring-amber-500/10',
        ],
        [
            'label' => 'bg-rose-50/80 text-rose-950 dark:bg-slate-900/70 dark:text-rose-100',
            'badge' => 'bg-rose-500 text-white shadow-rose-500/20',
            'focus' => 'focus-within:border-rose-300 focus-within:ring-rose-100 dark:focus-within:border-rose-500/60 dark:focus-within:ring-rose-500/10',
        ],
    ];
@endphp

@extends('slider.simple-layout')

@section('title', $pageTitle)

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden bg-[radial-gradient(900px_420px_at_10%_0%,rgba(99,102,241,0.08),transparent_58%),radial-gradient(780px_420px_at_100%_10%,rgba(14,165,233,0.07),transparent_55%)] px-3 py-4 sm:px-6 sm:py-5 lg:flex lg:items-center lg:px-8 lg:py-5">
        <section class="mx-auto w-full max-w-7xl">
            <header class="mx-auto flex w-full max-w-4xl flex-col items-center gap-2 text-center sm:gap-2.5">
                @include('slider.components.title-subtitle')

                @if($subtitle2 !== '')
                    <p class="max-w-3xl text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-200 sm:text-base lg:text-lg">
                        {{ $subtitle2 }}
                    </p>
                @endif
            </header>

            <section class="mx-auto mt-3 w-full max-w-4xl overflow-hidden rounded-[1.35rem] border border-slate-200 bg-white shadow-xl shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900/95 sm:mt-4 sm:rounded-[1.6rem] xl:max-w-5xl">
                <div class="p-2 sm:overflow-x-auto sm:p-0">
                    <table class="block w-full border-collapse sm:table sm:min-w-[720px] sm:table-fixed">
                        @if($showHeaders)
                            <thead class="hidden sm:table-header-group">
                            <tr class="border-b border-slate-200 bg-slate-50/90 dark:border-slate-700 dark:bg-slate-800/80">
                                <th class="w-[34%] px-5 py-2.5 text-left text-sm font-black tracking-[-0.01em] text-slate-700 dark:text-slate-100 lg:w-[34%] lg:px-6">
                                    {{ $labelHeader }}
                                </th>
                                <th class="px-5 py-2.5 text-left text-sm font-black tracking-[-0.01em] text-slate-700 dark:text-slate-100 lg:px-6">
                                    {{ $inputHeader }}
                                </th>
                            </tr>
                            </thead>
                        @endif

                        <tbody class="block space-y-2 sm:table-row-group sm:space-y-0 sm:divide-y sm:divide-slate-200 sm:dark:divide-slate-700">
                        @foreach($rows as $index => $row)
                            @php
                                $label = trim((string) ($row['label'] ?? ''));
                                $placeholder = trim((string) ($row['placeholder'] ?? ''));
                                $style = $rowStyles[$index % count($rowStyles)];
                            @endphp

                            <tr class="block overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-colors duration-200 hover:bg-slate-50/70 dark:border-slate-700 dark:bg-slate-900/70 dark:hover:bg-slate-800/50 sm:table-row sm:overflow-visible sm:rounded-none sm:border-0 sm:bg-transparent sm:shadow-none sm:dark:bg-transparent">
                                <th scope="row" class="block w-full align-middle {{ $style['label'] }} border-b border-slate-200 px-4 py-2.5 text-left dark:border-slate-700 sm:table-cell sm:w-[34%] sm:border-b-0 sm:border-r sm:px-5 sm:py-3 lg:w-[34%] lg:px-6">
                                    @if($showHeaders && $labelHeader !== '')
                                        <span class="mb-1 block text-[10px] font-black uppercase tracking-wide text-slate-500 dark:text-slate-400 sm:hidden">
                                                {{ $labelHeader }}
                                            </span>
                                    @endif

                                    <div class="flex items-center gap-3">
                                            <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full text-[11px] font-black shadow-lg {{ $style['badge'] }}">
                                                {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}
                                            </span>

                                        <span class="text-sm font-black leading-snug tracking-[-0.02em] sm:text-base">
                                                {{ $label }}
                                            </span>
                                    </div>
                                </th>

                                <td class="block align-middle bg-white px-3 py-2.5 dark:bg-slate-900/70 sm:table-cell sm:px-4 sm:py-2.5 lg:px-5">
                                    @if($showHeaders && $inputHeader !== '')
                                        <span class="mb-1.5 block px-1 text-[10px] font-black uppercase tracking-wide text-slate-500 dark:text-slate-400 sm:hidden">
                                                {{ $inputHeader }}
                                            </span>
                                    @endif

                                    <div class="rounded-2xl border border-slate-200 bg-white px-3.5 py-2 shadow-sm transition duration-200 focus-within:ring-4 dark:border-slate-700 dark:bg-slate-900/70 sm:px-4 {{ $style['focus'] }}">
                                            <textarea
                                                    class="js-writing-area block min-h-[44px] w-full resize-none bg-transparent text-sm font-bold leading-[1.4] text-slate-900 outline-none placeholder:text-slate-400 dark:text-slate-100 dark:placeholder:text-slate-400/80 sm:min-h-[46px] sm:text-base lg:min-h-[48px]"
                                                    data-index="{{ $index }}"
                                                    placeholder="{{ $placeholder }}"
                                            ></textarea>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </main>
@endsection

@section('script')
    @parent
    <script>
        (() => {
            const areas = Array.from(document.querySelectorAll('.js-writing-area'));

            areas.forEach((area) => {
                area.value = '';
            });

            window.resetSlide = () => {
                areas.forEach((area) => {
                    area.value = '';
                });
            };
        })();
    </script>
@endsection