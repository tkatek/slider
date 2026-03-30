@extends('slider.simple-layout')
@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-x-hidden">
        <main class="w-full">
            <div class="mx-auto w-full max-w-5xl px-4 sm:px-8 py-6 sm:py-8 lg:min-h-[100dvh] lg:flex lg:items-center">
                <section class="w-full">
                    <div class="grid place-items-center text-center gap-5 sm:gap-6">

                        <div class="header-spacing text-center space-y-4 my-4 sm:my-6">

                            <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-3 sm:mb-4">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{$content['title']}}
                            </span>
                            </h1>
                            <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                {{$content['subtitle']}}
                            </p>
                        </div>

                        <section id="objectives" class="w-full max-w-3xl grid gap-3 sm:gap-4">
                            @foreach($content['objectives'] as $obj)
                                <div class="objective-item relative z-10 flex items-center gap-4 sm:gap-5 rounded-3xl border border-slate-200 bg-white px-4 py-4 dark:border-slate-700 dark:bg-slate-900 sm:px-5 sm:py-4.5">
                                    <div class="flex h-10 w-10 sm:h-11 sm:w-11 shrink-0 items-center justify-center rounded-2xl border-2 border-indigo-100 bg-indigo-50/80 text-[0.95rem] font-extrabold text-indigo-600 dark:border-white/10 dark:bg-white/5 dark:text-indigo-300">
                                        {{ $obj['icon'] }}
                                    </div>

                                    <div class="flex-1 text-left">
                                        <div class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                            {{ $obj['text'] }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </section>

                        @if(!empty($content['image']))
                            <div class="objective-image w-full flex justify-center">
                                <img
                                        src="{{ $content['image'] }}"
                                        alt="{{ $content['image_alt'] ?? '' }}"
                                        class="w-full {{ $content['image_size'] ?? 'max-w-[560px]' }}"
                                />
                            </div>
                        @endif

                        <button
                                id="startLessonBtn"
                                type="button"
                                aria-label="Next slide"
                                class="mt-0.5 inline-flex items-center justify-center gap-2 rounded-xl
                               px-5 py-3 sm:px-7 sm:py-3.5 lg:px-6 lg:py-3
                               text-sm sm:text-base font-black
                               text-white border border-white/20
                               bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600
                               dark:bg-gradient-to-br dark:from-purple-500 dark:via-indigo-600 dark:to-purple-700
                               shadow-xl shadow-indigo-600/10
                               transition-transform duration-200 hover:scale-110 active:scale-95
                               focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-500/30">
                            <span>{{ $content['button'] }}</span>
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/20 border border-white/25 text-white leading-none">🚀</span>
                        </button>

                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const btn = document.getElementById("startLessonBtn");

            function isEmbedded(){
                try { return window.top !== window.self; }
                catch(e){ return true; }
            }

            btn.addEventListener("mouseenter", () => {
                if (!window.gsap) return;
                if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;
                gsap.to(btn, { scale: 1.12, duration: 0.18, ease: "power2.out" });
            });

            btn.addEventListener("mouseleave", () => {
                if (!window.gsap) return;
                gsap.to(btn, { scale: 1, duration: 0.18, ease: "power2.out" });
            });

            btn.addEventListener("click", () => {
                if (window.gsap) gsap.fromTo(btn, { scale: 1 }, { scale: 0.96, duration: 0.08, yoyo: true, repeat: 1 });

                if (isEmbedded()){
                    try{
                        if (window.parent && typeof window.parent.nextSlide === "function"){
                            window.parent.nextSlide();
                            return;
                        }
                    }catch(e){}

                    try{
                        window.parent.postMessage({ type: "BEC_NAV", action: "next" }, "*");
                        return;
                    }catch(e){}
                    return;
                }

            });
        });
    </script>
@endsection
