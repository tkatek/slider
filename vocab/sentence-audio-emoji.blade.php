@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .play-hit { -webkit-tap-highlight-color: transparent; }
        .play-hit:focus-visible { outline: none; }

        .red{
            background-image: linear-gradient(to right, #f97316, #fbbf24);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 900;
        }

        .phrase-row{
            transition: box-shadow .2s ease, transform .2s ease;
        }

        .phrase-row.is-playing{
            box-shadow: 0 0 0 2px rgba(99,102,241,.25);
        }

        .audio-btn {
            position: relative;
            overflow: hidden;
        }

        .audio-btn .static-icon {
            display: block;
        }

        .audio-btn .wave-wrap {
            display: none;
            align-items: center;
            justify-content: center;
            gap: 2px;
            height: 16px;
        }

        .audio-btn .wave-bar {
            width: 3px;
            height: 8px;
            background: currentColor;
            border-radius: 999px;
        }

        .audio-btn.speaking .static-icon {
            display: none;
        }

        .audio-btn.speaking .wave-wrap {
            display: inline-flex;
        }

        .audio-btn.speaking .wave-bar:nth-child(1) {
            animation: waveBounce 0.7s ease-in-out infinite;
        }

        .audio-btn.speaking .wave-bar:nth-child(2) {
            animation: waveBounce 0.7s ease-in-out 0.12s infinite;
        }

        .audio-btn.speaking .wave-bar:nth-child(3) {
            animation: waveBounce 0.7s ease-in-out 0.24s infinite;
        }

        @keyframes waveBounce {
            0%, 100% {
                height: 7px;
                opacity: 0.7;
            }
            50% {
                height: 16px;
                opacity: 1;
            }
        }
    </style>
@endsection

@section('content')

    <main class="w-full">
        <div class="mx-auto w-full max-w-6xl px-4 sm:px-8 py-6 lg:min-h-[100dvh] lg:flex lg:items-center">

            <section class="w-full">

                <div class="grid place-items-center text-center gap-6">

                    <div id="titleBlock">
                        <h1 class="font-black text-5xl lg:text-6xl tracking-tight">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $content['title'] }}
                            </span>
                        </h1>

                        <p class="font-bold text-slate-600 dark:text-slate-200">
                            {{ $content['subtitle'] }}
                        </p>
                    </div>

                    <div class="grid w-full grid-cols-1 lg:grid-cols-2 gap-6 mt-3 sm:mt-5">

                        {{-- LEFT --}}
                        <div class="space-y-3">

                            @foreach($content['items_left'] as $item)

                                <div class="phrase-row rounded-[26px] border border-slate-200/70 bg-white/65 backdrop-blur-xl shadow-[0_14px_44px_-26px_rgba(15,23,42,0.45)] dark:border-slate-700/35 dark:bg-slate-950/40">

                                    <div class="p-4 sm:p-5 flex items-center gap-4">

                                        <div class="h-11 w-11 rounded-2xl flex items-center justify-center shrink-0 border border-indigo-500/25 bg-indigo-500/10 text-indigo-700 dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200">
                                            <span class="text-xl leading-none">{{ $item['emoji'] }}</span>
                                        </div>

                                        <div class="min-w-0 flex-1 font-black text-xl sm:text-2xl tracking-[-0.03em] leading-tight text-slate-900 dark:text-slate-50 text-left break-words">
                                            {!! preg_replace('/<red>(.*?)<\/red>/', '<span class="red">$1</span>', $item['text']) !!}
                                        </div>

                                        <button
                                                class="audio-btn speak-btn play-hit inline-flex h-11 w-11 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500/80 via-violet-500/80 to-blue-500/80 text-white backdrop-blur-md ring-1 ring-white/25 shadow-lg shadow-indigo-900/30 shrink-0 focus-visible:ring-4 focus-visible:ring-indigo-300/40"
                                                data-audio="{{ $item['sound'] }}">

                                            <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>

                                            <span class="wave-wrap" aria-hidden="true">
                                                <span class="wave-bar"></span>
                                                <span class="wave-bar"></span>
                                                <span class="wave-bar"></span>
                                            </span>

                                        </button>

                                    </div>
                                </div>

                            @endforeach

                        </div>

                        {{-- RIGHT --}}
                        <div class="space-y-3">

                            @foreach($content['items_right'] as $item)

                                <div class="phrase-row rounded-[26px] border border-slate-200/70 bg-white/65 backdrop-blur-xl shadow-[0_14px_44px_-26px_rgba(15,23,42,0.45)] dark:border-slate-700/35 dark:bg-slate-950/40">

                                    <div class="p-4 sm:p-5 flex items-center gap-4">

                                        <div class="h-11 w-11 rounded-2xl flex items-center justify-center shrink-0 border border-indigo-500/25 bg-indigo-500/10 text-indigo-700 dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200">
                                            <span class="text-xl leading-none">{{ $item['emoji'] }}</span>
                                        </div>

                                        <div class="min-w-0 flex-1 font-black text-xl sm:text-2xl tracking-[-0.03em] leading-tight text-slate-900 dark:text-slate-50 text-left break-words">
                                            {!! preg_replace('/<red>(.*?)<\/red>/', '<span class="red">$1</span>', $item['text']) !!}
                                        </div>

                                        <button
                                                class="audio-btn speak-btn play-hit inline-flex h-11 w-11 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500/80 via-violet-500/80 to-blue-500/80 text-white backdrop-blur-md ring-1 ring-white/25 shadow-lg shadow-indigo-900/30 shrink-0 focus-visible:ring-4 focus-visible:ring-indigo-300/40"
                                                data-audio="{{ $item['sound'] }}">

                                            <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>

                                            <span class="wave-wrap" aria-hidden="true">
                                                <span class="wave-bar"></span>
                                                <span class="wave-bar"></span>
                                                <span class="wave-bar"></span>
                                            </span>

                                        </button>

                                    </div>
                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </section>
        </div>
    </main>
@endsection


@section('script')

    <script>
        document.addEventListener("DOMContentLoaded",()=>{

            const audio = new Audio()
            audio.preload = "auto"

            let currentBtn = null
            let currentRow = null
            let currentSrc = ""

            function setBtnState(btn,state){
                if(btn) btn.classList.toggle("speaking",state)
            }

            function setRowState(row,state){
                if(row) row.classList.toggle("is-playing",state)
            }

            function reset(){
                setBtnState(currentBtn,false)
                setRowState(currentRow,false)
                currentBtn = null
                currentRow = null
                currentSrc = ""
            }

            function stopAudio(){
                try{
                    audio.pause()
                    audio.currentTime = 0
                }catch(e){}
                reset()
            }

            function play(btn){
                const src = btn.dataset.audio
                const row = btn.closest(".phrase-row")

                if(currentSrc === src && !audio.paused){
                    stopAudio()
                    return
                }

                stopAudio()

                currentBtn = btn
                currentRow = row
                currentSrc = src

                setBtnState(btn,true)
                setRowState(row,true)

                audio.src = src
                audio.play().catch(()=>stopAudio())
            }

            document.querySelectorAll(".speak-btn").forEach(btn=>{
                btn.addEventListener("click",(e)=>{
                    e.preventDefault()
                    play(btn)
                })
            })

            audio.addEventListener("ended",stopAudio)
            audio.addEventListener("error",stopAudio)

            window.stopSlideAudio = stopAudio
        })
    </script>

@endsection
