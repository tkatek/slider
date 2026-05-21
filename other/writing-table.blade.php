@php
    $content = is_array($content ?? null) ? $content : [];

    $theme = is_array($theme ?? null) ? $theme : [];
    $theme['name'] = trim((string) ($theme['name'] ?? '')) !== '' ? $theme['name'] : 'indigo';

    $pageTitle = trim((string) ($content['page_title'] ?? 'Writing'));
    $subtitle2 = trim((string) ($content['subtitle_2'] ?? ''));
    $rows = array_values(is_array($content['rows'] ?? null) ? $content['rows'] : []);

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
    <main class="min-h-[100dvh] w-full overflow-x-hidden bg-[radial-gradient(900px_420px_at_10%_0%,rgba(99,102,241,0.08),transparent_58%),radial-gradient(780px_420px_at_100%_10%,rgba(14,165,233,0.07),transparent_55%)] px-3 py-5 sm:px-6 sm:py-6 lg:flex lg:items-center lg:px-8 lg:py-7">
        <section class="mx-auto w-full max-w-7xl">
            <header class="mx-auto flex w-full max-w-4xl flex-col items-center gap-2 text-center sm:gap-2.5">
                @include('slider.components.title-subtitle')

                @if($subtitle2 !== '')
                    <p class="max-w-3xl text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-200 sm:text-base lg:text-lg">
                        {{ $subtitle2 }}
                    </p>
                @endif
            </header>

            <section class="mx-auto mt-5 w-full max-w-6xl overflow-hidden rounded-[1.4rem] border border-slate-200 bg-white shadow-xl dark:border-slate-700 dark:bg-slate-900/95 sm:mt-6 sm:rounded-[1.8rem] xl:max-w-7xl">
                <div class="p-2 sm:overflow-x-auto sm:p-0">
                    <table class="block w-full border-collapse sm:table sm:min-w-[760px] sm:table-fixed">
                        <tbody class="block space-y-2.5 sm:table-row-group sm:space-y-0 sm:divide-y sm:divide-slate-200 sm:dark:divide-slate-700">
                        @foreach($rows as $index => $row)
                            @php
                                $label = trim((string) ($row['label'] ?? ''));
                                $placeholder = trim((string) ($row['placeholder'] ?? ''));
                                $style = $rowStyles[$index % count($rowStyles)];
                            @endphp

                            <tr class="block overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-colors duration-200 hover:bg-slate-50/70 dark:border-slate-700 dark:bg-slate-900/70 dark:hover:bg-slate-800/50 sm:table-row sm:overflow-visible sm:rounded-none sm:border-0 sm:bg-transparent sm:shadow-none sm:dark:bg-transparent">
                                <th scope="row" class="block w-full align-top {{ $style['label'] }} border-b border-slate-200 px-4 py-3 text-left dark:border-slate-700 sm:table-cell sm:w-[30%] sm:border-b-0 sm:border-r sm:px-5 sm:py-3.5 lg:w-[28%] lg:px-6">
                                    <div class="flex items-start gap-3">
                                            <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full text-[11px] font-black shadow-lg {{ $style['badge'] }}">
                                                {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}
                                            </span>

                                        <span class="pt-0.5 text-sm font-black leading-snug tracking-[-0.02em] sm:text-base">
                                                {{ $label }}
                                            </span>
                                    </div>
                                </th>

                                <td class="block align-top bg-white px-3 py-3 dark:bg-slate-900/70 sm:table-cell sm:px-4 sm:py-3 lg:px-5">
                                    <div class="rounded-2xl border border-slate-200 bg-white px-3.5 py-2.5 shadow-sm transition duration-200 focus-within:ring-4 dark:border-slate-700 dark:bg-slate-900/70 sm:px-4 {{ $style['focus'] }}">
                                            <textarea
                                                    class="js-writing-area block min-h-[86px] w-full resize-none bg-transparent text-sm font-bold leading-[1.5] text-slate-900 outline-none placeholder:text-slate-400 dark:text-slate-100 dark:placeholder:text-slate-400/80 sm:min-h-[76px] sm:text-base lg:min-h-[78px]"
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
