@php
    $statusItems = [
        ['label' => 'Progress', 'id' => 'tilesCount', 'default' => '0', 'icon' => '&#129513;'],
        ['label' => 'Correct', 'id' => 'correctCount', 'default' => '0', 'icon' => '&#9989;'],
        ['label' => 'Mistakes', 'id' => 'mistakesCount', 'default' => '0', 'icon' => '&#10060;'],
        ['label' => 'Time', 'id' => 'gameTimer', 'default' => '00:00', 'icon' => '&#9201;&#65039;'],
    ];
@endphp

<div id="gameStatus" class="mx-auto mb-4 w-full max-w-[19.5rem] overflow-hidden rounded-3xl border border-slate-200/70 bg-white/70 text-center shadow-[0_14px_38px_#0206171A] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/60 sm:mb-5 sm:max-w-3xl">
    <div class="grid grid-cols-4">
        @foreach ($statusItems as $item)
            <div class="px-1.5 py-2 sm:px-4 sm:py-4 @if(!$loop->last) border-r border-slate-200/70 dark:border-slate-700/60 @endif">
                <div class="hidden text-[11px] font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400 sm:block">
                    {{ $item['label'] }}
                </div>
                <div class="flex items-center justify-center gap-1.5 text-xs font-black text-slate-900 dark:text-slate-100 sm:text-lg">
                    <span aria-hidden="true">{!! $item['icon'] !!}</span>
                    <span id="{{ $item['id'] }}">{{ $item['default'] }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
