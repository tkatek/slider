@if($supportItems !== [])
    <div class="mb-3 rounded-[18px] border border-slate-200/80 bg-white/70 p-3 text-left shadow-[0_14px_28px_-24px_rgba(15,23,42,0.24)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:p-4">
        @if($supportTitle !== '')
            <p class="bg-clip-text text-[0.62rem] font-black uppercase tracking-[0.2em] text-transparent {{ $primaryGradient }}">
                {{ $supportTitle }}
            </p>
        @endif

        <ul class="mt-2 space-y-1.5">
            @foreach($supportItems as $phrase)
                @php
                    $phraseText = trim((string) $phrase);
                @endphp

                @if($phraseText !== '')
                    <li class="flex items-start gap-2.5">
                        <span class="mt-[0.42rem] h-2 w-2 shrink-0 rounded-full shadow-sm {{ $practiceDotClass }}"></span>
                        <span class="text-sm font-extrabold leading-[1.3] text-slate-700 dark:text-slate-200 sm:text-[0.95rem]">
                            {!! $phraseText !!}
                        </span>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endif
