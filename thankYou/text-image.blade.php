@extends("slider.simple-layout")

@section("style")
@endsection

@section("content")
    <div id="thankYouOutro" class="h-[100dvh] overflow-hidden font-sans">
        <main class="mx-auto flex h-full w-full max-w-6xl items-center justify-center px-4 py-4 sm:px-8 sm:py-5 lg:px-10">
            <section class="flex h-full w-full max-w-5xl items-center justify-center">
                <div class="flex w-full flex-col items-center justify-center text-center">

                    <div
                            id="unitPill"
                            class="mb-4 inline-flex items-center justify-center rounded-full px-4 py-2 text-[0.72rem] font-black tracking-[0.22em] uppercase
                               border border-indigo-500/25 bg-white/70 dark:bg-slate-800/60 backdrop-blur shadow-sm shadow-indigo-500/10 text-slate-700 dark:text-slate-200
                               select-none pointer-events-none sm:mb-5 lg:mb-4"
                    >
                        ✅ Lesson Complete
                    </div>

                    <div id="titleBlock" class="space-y-2 sm:space-y-3">
                        <h1 id="titleMain" class="flex items-center justify-center gap-2 sm:gap-3 font-black leading-[1.02] text-4xl sm:text-5xl lg:text-6xl xl:text-7xl">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                Thank You!
                            </span>
                            <span class="inline-flex items-center justify-center leading-none text-[0.82em] translate-y-[0.02em]">
                                🎉
                            </span>
                        </h1>

                        <p
                                id="titleSub"
                                class="mx-auto max-w-2xl font-black text-lg sm:text-xl lg:text-2xl xl:text-3xl text-slate-800 dark:text-slate-100"
                        >
                            {{ $content['text'] }}
                        </p>
                    </div>

                    @if(!empty($content['image']))
                        <div id="heroImage" class="my-5 flex w-full items-center justify-center sm:my-6 lg:my-5">
                            <img
                                    id="heroImg"
                                    class="block h-auto w-auto max-w-[92vw] sm:max-w-[680px] lg:max-w-[760px] xl:max-w-[800px] max-h-[38dvh] sm:max-h-[42dvh] lg:max-h-[43dvh] xl:max-h-[45dvh] object-contain select-none drop-shadow-sm"
                                    alt="Thank You"
                                    src="{{ $content['image'] }}"
                                    loading="eager"
                                    decoding="async"
                                    draggable="false"
                            />
                        </div>
                    @endif

                    <button
                            id="restartBtn"
                            type="button"
                            aria-label="Restart Lesson"
                            class="group inline-flex items-center justify-center gap-2 rounded-xl
                               px-5 py-3 sm:px-7 sm:py-3.5
                               text-sm sm:text-base font-black
                               text-white border border-white/20
                               bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600
                               dark:from-purple-500 dark:via-indigo-600 dark:to-purple-700
                               shadow-xl shadow-indigo-600/10
                               transition-all duration-200
                               hover:-translate-y-0.5 hover:scale-[1.04]
                               hover:from-purple-700 hover:via-indigo-700 hover:to-blue-700
                               hover:shadow-2xl hover:shadow-indigo-600/20
                               active:scale-95
                               focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-500/30"
                    >
                        <span>Start Again</span>
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/20 border border-white/25 text-white leading-none transition-transform duration-200 group-hover:-rotate-12 group-hover:scale-110">
                            🔁
                        </span>
                    </button>

                </div>
            </section>
        </main>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const els = {
                unit: document.getElementById("unitPill"),
                titleBlock: document.getElementById("titleBlock"),
                hero: document.getElementById("heroImage"),
                btn: document.getElementById("restartBtn"),
            };

            window.resetSlide = () => {};

            function isEmbedded() {
                try {
                    return window.top !== window.self;
                } catch (e) {
                    return true;
                }
            }

            els.btn?.addEventListener("click", () => {
                if (isEmbedded()) {
                    try {
                        if (window.parent && typeof window.parent.goToSlide === "function") {
                            window.parent.goToSlide(0);
                            return;
                        }
                    } catch (e) {}

                    try {
                        if (window.parent && typeof window.parent.firstSlide === "function") {
                            window.parent.firstSlide();
                            return;
                        }
                    } catch (e) {}

                    try {
                        window.parent.postMessage({ type: "BEC_NAV", action: "first" }, "*");
                        return;
                    } catch (e) {}

                    return;
                }

                window.location.href = "slide-1.blade.php";
            });
        });
    </script>
@endsection