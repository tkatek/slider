@php
    $statusItems = [
        ['label' => 'Progress', 'id' => 'tilesCount', 'default' => '0', 'icon' => 'progress', 'tone' => 'bg-emerald-50 text-emerald-500 dark:bg-emerald-400/10 dark:text-emerald-400'],
        ['label' => 'Correct', 'id' => 'correctCount', 'default' => '0', 'icon' => 'check', 'tone' => 'bg-emerald-50 text-emerald-500 dark:bg-emerald-400/10 dark:text-emerald-400'],
        ['label' => 'Mistakes', 'id' => 'mistakesCount', 'default' => '0', 'icon' => 'cross', 'tone' => 'bg-rose-50 text-red-500 dark:bg-red-400/10 dark:text-red-400'],
        ['label' => 'Time', 'id' => 'gameTimer', 'default' => '00:00', 'icon' => 'clock', 'tone' => 'bg-violet-50 text-indigo-700 dark:bg-indigo-400/10 dark:text-indigo-300'],
    ];
@endphp

<div id="gameStatus" class="mx-auto mb-4 w-full {{ $statusWidthClass ?? 'max-w-5xl' }} overflow-hidden rounded-3xl border border-slate-200/60 bg-white/85 text-left shadow-[0_14px_38px_rgba(15,23,42,0.06)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/75 sm:mb-5 sm:rounded-[1.6rem]">
    <div class="grid grid-cols-4">
        @foreach ($statusItems as $item)
            <div role="group" aria-labelledby="statusLabel-{{ $item['id'] }}" class="min-w-0 px-1.5 py-2.5 sm:px-4 sm:py-3 lg:py-4 @if(!$loop->last) border-r border-slate-200/60 dark:border-slate-700/60 @endif">
                <div class="mx-auto w-fit">
                    <div id="statusLabel-{{ $item['id'] }}" class="mb-1.5 text-[9px] font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-400 sm:text-[11px] lg:text-xs">
                        {{ $item['label'] }}
                    </div>
                    <div class="flex flex-col items-center gap-1.5 min-[480px]:flex-row min-[480px]:gap-2 sm:gap-2.5 lg:gap-3">
                        <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-lg sm:h-9 sm:w-9 sm:rounded-xl lg:h-10 lg:w-10 {{ $item['tone'] }}" aria-hidden="true">
                            <svg class="h-5 w-5 sm:h-6 sm:w-6 lg:h-7 lg:w-7" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" focusable="false">
                                @switch($item['icon'])
                                    @case('progress')
                                        <circle cx="16" cy="16" r="11" stroke-width="3.5" opacity=".12"/>
                                        <path d="M16 5A11 11 0 0 1 26 11.4" stroke-width="3.5" opacity=".35"/>
                                        <path d="M27 16A11 11 0 0 1 20.6 26" stroke-width="3.5" opacity=".55"/>
                                        <path d="M16 27A11 11 0 0 1 6 20.6" stroke-width="3.5" opacity=".75"/>
                                        <path d="M5 16A11 11 0 0 1 11.4 6" stroke-width="3.5"/>
                                        @break
                                    @case('check')
                                        <path d="m7 16 6 6L26 9"/>
                                        @break
                                    @case('cross')
                                        <path d="m8 8 16 16M24 8 8 24"/>
                                        @break
                                    @case('clock')
                                        <circle cx="16" cy="16" r="11"/>
                                        <path d="M16 9v7l6 3"/>
                                        @break
                                @endswitch
                            </svg>
                        </span>
                        <span id="{{ $item['id'] }}" class="whitespace-nowrap font-extrabold leading-none tracking-tight tabular-nums text-slate-900 dark:text-slate-100 {{ $item['icon'] === 'clock' ? 'text-base sm:text-xl lg:text-2xl' : 'text-lg sm:text-2xl lg:text-3xl' }}">{{ $item['default'] }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
