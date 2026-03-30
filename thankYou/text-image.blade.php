@extends("slider.simple-layout")

@section("style")
@endsection

@section("content")
    <div class="min-h-[100dvh] overflow-x-hidden overflow-y-auto lg:overflow-hidden">
        <main class="mx-auto w-full max-w-5xl px-4 sm:px-8 py-8 sm:py-10 lg:py-0 lg:h-[100dvh] lg:flex lg:items-center">
            <section class="w-full p-5 sm:p-10">
                <div class="grid place-items-center text-center gap-4 sm:gap-6">
                    <div
                            id="unitPill"
                            class="inline-flex items-center justify-center rounded-full px-4 py-2 text-[0.72rem] font-black tracking-[0.22em] uppercase
                               border border-indigo-500/25 bg-white/70 dark:bg-slate-800/60 backdrop-blur shadow-sm shadow-indigo-500/10 text-slate-700 dark:text-slate-200
                               select-none pointer-events-none"
                    >
                        ✅ Lesson Complete
                    </div>

                    <div id="titleBlock" class="space-y-3 sm:space-y-4">
                        <h1 id="titleMain" class="font-black leading-[1.02]  text-4xl sm:text-5xl lg:text-7xl xl:text-8xl">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                Thank You!
                            </span>
                            <span class="align-middle">🎉</span>
                        </h1>

                        <p
                                id="titleSub"
                                class="mx-auto max-w-2xl font-black   text-lg sm:text-xl lg:text-2xl xl:text-3xl text-slate-800 dark:text-slate-100"
                        >
                            {{ $content['text'] }}
                        </p>
                    </div>

                    <div id="heroImage" class="w-full max-w-[380px] sm:max-w-[560px] lg:max-w-[640px] mx-auto mb-6 mt-4">
                        <img
                                id="heroImg"
                                class="block w-full h-auto object-contain select-none drop-shadow-sm"
                                alt="Thank You"
                                src="{{ $content['image'] }}"
                                loading="eager"
                                decoding="async"
                                draggable="false"
                        />
                    </div>

                    <button
                            id="restartBtn"
                            type="button"
                            aria-label="Restart Lesson"
                            class="mt-1 inline-flex items-center justify-center gap-2 rounded-xl
                               px-5 py-3 sm:px-7 sm:py-3.5
                               text-sm sm:text-base font-black
                               text-white border border-white/20
                               bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600
                               dark:from-purple-500 dark:via-indigo-600 dark:to-purple-700
                               shadow-xl shadow-indigo-600/10
                               focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-500/30"
                    >
                        <span>Start Again</span>
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/20 border border-white/25 text-white leading-none">
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
                try { return window.top !== window.self; }
                catch (e) { return true; }
            }

            els.btn.addEventListener("click", () => {
                if (isEmbedded()) {
                    try {
                        if (window.parent && typeof window.parent.goToSlide === "function") { window.parent.goToSlide(0); return; }
                    } catch (e) {}

                    try {
                        if (window.parent && typeof window.parent.firstSlide === "function") { window.parent.firstSlide(); return; }
                    } catch (e) {}

                    try {
                        window.parent.postMessage({ type: "BEC_NAV", action: "first" }, "*");
                        return;
                    } catch (e) {}

                    return;
                }

            });
        });
    </script>
@endsection
