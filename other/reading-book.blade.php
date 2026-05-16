
@extends('slider.simple-layout')

@section('content')
    @php
        $isOrangeTheme = ($theme['name'] ?? null) === 'orange';

        $themeGradientClass = $isOrangeTheme
            ? 'bg-gradient-to-br from-amber-400 via-orange-500 to-orange-600 dark:from-amber-400 dark:via-orange-500 dark:to-orange-700'
            : 'bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 dark:from-purple-500 dark:via-indigo-600 dark:to-purple-700';

        $themeTextGradientClass = $isOrangeTheme
            ? 'bg-gradient-to-r from-amber-500 via-orange-500 to-orange-600 dark:from-amber-300 dark:via-orange-300 dark:to-orange-500'
            : 'bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 dark:from-purple-300 dark:via-indigo-300 dark:to-blue-400';

        $themeSoftClass = $isOrangeTheme
            ? 'bg-orange-50 text-orange-700 ring-orange-200 hover:bg-orange-100 dark:bg-orange-500/10 dark:text-orange-200 dark:ring-orange-400/20 dark:hover:bg-orange-500/15'
            : 'bg-indigo-50 text-indigo-700 ring-indigo-200 hover:bg-indigo-100 dark:bg-indigo-500/10 dark:text-indigo-200 dark:ring-indigo-400/20 dark:hover:bg-indigo-500/15';

        $themeRingClass = $isOrangeTheme
            ? 'focus-visible:ring-orange-400/30'
            : 'focus-visible:ring-indigo-500/30';

        $themeShadowClass = $isOrangeTheme
            ? 'shadow-orange-500/25'
            : 'shadow-indigo-600/20';
    @endphp

    <div class="relative min-h-[100dvh] w-full overflow-x-hidden">
        <main class="w-full">
            <div class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center px-2 py-3 sm:px-5 sm:py-5 lg:px-8">
                <section class="relative w-full">
                    <div class="pointer-events-none absolute -left-20 top-14 h-56 w-56 rounded-full bg-[var(--ambient-one)] opacity-30 blur-3xl"></div>
                    <div class="pointer-events-none absolute -right-20 bottom-8 h-64 w-64 rounded-full bg-[var(--ambient-two)] opacity-25 blur-3xl"></div>

                    <div class="relative mx-auto grid w-full gap-3 text-center sm:gap-4">
                        @include('slider.components.title-subtitle')

                        <section id="storybook" class="mx-auto w-full max-w-6xl">
                            <div class="mx-auto flex items-center justify-center md:gap-3 lg:gap-5">
                                <button
                                        id="prevBookPage"
                                        type="button"
                                        aria-label="Previous page"
                                        class="book-nav-btn hidden h-11 w-11 shrink-0 items-center justify-center rounded-full text-xl font-black shadow-lg shadow-slate-900/10 ring-1 transition hover:-translate-x-0.5 hover:scale-105 disabled:cursor-not-allowed disabled:opacity-30 focus-visible:outline-none focus-visible:ring-4 {{ $themeSoftClass }} {{ $themeRingClass }} md:inline-flex lg:h-12 lg:w-12"
                                >
                                    ‹
                                </button>

                                <div class="book-stage relative w-full">
                                    <div
                                            id="bookCover"
                                            class="book-cover mx-auto aspect-[4/5] w-full max-w-full cursor-pointer overflow-hidden rounded-[1.2rem] border border-white/50 bg-white shadow-2xl shadow-slate-950/25 ring-1 ring-slate-200/70 transition-all duration-300 dark:border-white/10 dark:bg-slate-900 dark:ring-white/10 md:max-w-[360px] lg:max-w-[390px]"
                                    >
                                        <div class="relative h-full w-full overflow-hidden">
                                            <img
                                                    src="{{ $content['book']['cover_image'] }}"
                                                    alt="{{ $content['book']['cover_alt'] ?? '' }}"
                                                    class="h-full w-full object-cover"
                                            >

                                            <div class="absolute inset-y-0 left-0 w-8 bg-gradient-to-r from-black/20 via-white/20 to-transparent"></div>
                                            <div class="absolute inset-y-0 right-0 w-5 bg-gradient-to-l from-black/20 to-transparent"></div>

                                            <div class="absolute inset-x-0 bottom-0 z-[60] bg-white px-4 py-4 text-center shadow-[0_-14px_40px_rgba(255,255,255,0.95)] dark:bg-slate-950/80 dark:shadow-none sm:px-5 sm:py-5">
                                                <h3 class="{{ $themeTextGradientClass }} bg-clip-text font-serif text-xl font-black leading-tight tracking-[-0.04em] text-transparent sm:text-2xl lg:text-3xl">
                                                    {{ $content['book']['cover_title'] }}
                                                </h3>

                                                @if(!empty($content['book']['author']))
                                                    <p class="mt-1 text-[0.65rem] font-black uppercase tracking-[0.22em] text-slate-500 dark:text-slate-300 sm:text-xs">
                                                        {{ $content['book']['author'] }}
                                                    </p>
                                                @endif
                                            </div>

                                            <div class="absolute right-3 top-3 z-[60] rounded-full bg-white/90 px-3 py-1.5 text-[0.65rem] font-black text-slate-600 shadow-sm backdrop-blur dark:bg-slate-950/75 dark:text-slate-200 md:hidden">
                                                Tap to open
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                            id="bookSpread"
                                            class="book-spread hidden mx-auto w-full max-w-full overflow-hidden rounded-[1.2rem] border border-slate-200/80 bg-white shadow-2xl shadow-slate-950/20 ring-1 ring-slate-200/70 dark:border-white/10 dark:bg-slate-900 dark:ring-white/10 md:max-w-[760px] md:rounded-[1.5rem] lg:max-w-[820px] lg:rounded-[1.7rem]"
                                    >
                                        <div class="relative hidden aspect-[8/5] w-full grid-cols-2 md:grid">
                                            <div class="pointer-events-none absolute inset-y-0 left-1/2 z-20 w-10 -translate-x-1/2 bg-gradient-to-r from-transparent via-slate-950/15 to-transparent dark:via-black/30"></div>
                                            <div class="pointer-events-none absolute inset-y-0 left-1/2 z-30 w-px bg-slate-300/70 dark:bg-white/10"></div>

                                            <div id="leftPage" class="book-page relative h-full w-full bg-[#fbfaf7] dark:bg-slate-950"></div>
                                            <div id="rightPage" class="book-page relative h-full w-full bg-[#fffefa] dark:bg-slate-900"></div>
                                        </div>

                                        <div class="relative block aspect-[4/5] w-full md:hidden">
                                            <div id="mobilePage" class="book-page relative h-full w-full bg-[#fffefa] dark:bg-slate-900"></div>

                                            <button
                                                    id="mobilePrevZone"
                                                    type="button"
                                                    aria-label="Previous page"
                                                    class="absolute inset-y-0 left-0 z-50 w-1/2 bg-transparent"
                                            ></button>

                                            <button
                                                    id="mobileNextZone"
                                                    type="button"
                                                    aria-label="Next page"
                                                    class="absolute inset-y-0 right-0 z-50 w-1/2 bg-transparent"
                                            ></button>

                                            <div class="pointer-events-none absolute left-1/2 top-3 z-[60] -translate-x-1/2 rounded-full bg-white/85 px-3 py-1.5 text-[0.65rem] font-black text-slate-600 shadow-sm backdrop-blur dark:bg-slate-950/75 dark:text-slate-200">
                                                Tap sides or swipe
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button
                                        id="nextBookPage"
                                        type="button"
                                        aria-label="Next page"
                                        class="book-nav-btn hidden h-11 w-11 shrink-0 items-center justify-center rounded-full text-xl font-black shadow-lg shadow-slate-900/10 ring-1 transition hover:translate-x-0.5 hover:scale-105 disabled:cursor-not-allowed disabled:opacity-30 focus-visible:outline-none focus-visible:ring-4 {{ $themeSoftClass }} {{ $themeRingClass }} md:inline-flex lg:h-12 lg:w-12"
                                >
                                    ›
                                </button>
                            </div>
                        </section>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <style>
        .book-stage {
            max-width: min(96vw, 430px);
        }

        @media (max-width: 380px) {
            .book-stage {
                max-width: min(95vw, 350px);
            }
        }

        @media (min-width: 768px) {
            .book-stage {
                max-width: 760px;
            }
        }

        @media (min-width: 1024px) {
            .book-stage {
                max-width: 820px;
            }
        }

        .book-cover {
            transform: perspective(1200px) rotateY(-2deg);
            transform-origin: left center;
            position: relative;
        }

        @media (max-width: 767px) {
            .book-cover {
                transform: none;
            }
        }

        .book-cover::before {
            content: "";
            pointer-events: none;
            position: absolute;
            inset: 0 auto 0 0;
            width: 22px;
            z-index: 10;
            background: linear-gradient(90deg, rgba(0,0,0,.18), rgba(255,255,255,.22), transparent);
        }

        .book-cover::after,
        .book-spread::after {
            content: "";
            pointer-events: none;
            position: absolute;
            inset: 0;
            z-index: 30;
            background:
                    linear-gradient(90deg, rgba(255,255,255,0.20), transparent 12%, transparent 88%, rgba(0,0,0,0.08)),
                    radial-gradient(circle at 30% 20%, rgba(255,255,255,0.22), transparent 34%);
            opacity: .55;
        }

        .book-spread {
            position: relative;
        }

        .book-spread::before {
            content: "";
            pointer-events: none;
            position: absolute;
            inset: 5px;
            z-index: 35;
            border-radius: 1rem;
            border: 1px solid rgba(15, 23, 42, .08);
            box-shadow:
                    inset 0 0 0 2px rgba(255,255,255,.45),
                    inset 10px 0 18px rgba(15,23,42,.08),
                    inset -10px 0 18px rgba(15,23,42,.08);
        }

        .book-page {
            background-image:
                    radial-gradient(circle at 20% 20%, rgba(255,255,255,0.8) 0, transparent 28%),
                    linear-gradient(90deg, rgba(0,0,0,0.035), transparent 9%, transparent 91%, rgba(0,0,0,0.035));
        }
    </style>

    <script>
        const storyPages = @json($content['book']['pages']);
        const restartLabel = @json($content['book']['restart_label'] ?? 'Start over');

        let currentPage = -1;
        let touchStartX = 0;
        let touchEndX = 0;

        const bookCover = document.getElementById('bookCover');
        const bookSpread = document.getElementById('bookSpread');
        const leftPage = document.getElementById('leftPage');
        const rightPage = document.getElementById('rightPage');
        const mobilePage = document.getElementById('mobilePage');
        const prevBtn = document.getElementById('prevBookPage');
        const nextBtn = document.getElementById('nextBookPage');
        const mobilePrevZone = document.getElementById('mobilePrevZone');
        const mobileNextZone = document.getElementById('mobileNextZone');

        function isDesktopBook() {
            return window.matchMedia('(min-width: 768px)').matches;
        }

        function escapeHtml(value) {
            return String(value ?? '')
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;')
                .replaceAll("'", '&#039;');
        }

        function pageNumberBadge(pageNumber, side) {
            return `
                <div class="absolute bottom-3 ${side === 'left' ? 'left-3' : 'right-3'} z-30 rounded-full bg-white/80 px-2.5 py-1 text-[0.65rem] font-black text-slate-500 shadow-sm backdrop-blur dark:bg-slate-950/70 dark:text-slate-300 sm:bottom-4 sm:px-3 sm:text-xs">
                    ${pageNumber}
                </div>
            `;
        }

        function renderPage(page, pageNumber, side = 'right') {
            if (!page) {
                return `
                    <div class="flex h-full w-full items-center justify-center p-5 sm:p-6">
                        <div class="h-full w-full rounded-3xl border border-dashed border-slate-200 bg-white/45 dark:border-white/10 dark:bg-white/5"></div>
                    </div>
                `;
            }

            if (page.type === 'image') {
                return `
                    <div class="relative h-full w-full overflow-hidden">
                        <img
                            src="${escapeHtml(page.image)}"
                            alt="${escapeHtml(page.alt || '')}"
                            class="h-full w-full object-cover"
                        >
                        <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-white/10 via-transparent to-slate-950/10"></div>
                        ${pageNumberBadge(pageNumber, side)}
                    </div>
                `;
            }

            return `
                <div class="relative flex h-full w-full items-center justify-center px-5 py-6 sm:px-7 sm:py-8 lg:px-10 lg:py-10">
                    <div class="max-w-[92%] text-left md:max-w-[360px] lg:max-w-[390px]">
                        <p class="font-serif text-[0.98rem] font-semibold leading-[1.62] tracking-[-0.015em] text-slate-800 first-letter:float-left first-letter:mr-2 first-letter:text-4xl first-letter:font-black first-letter:leading-[0.9] dark:text-slate-100 sm:text-[1.1rem] sm:leading-[1.7] sm:first-letter:text-5xl md:text-[1.18rem] lg:text-[1.28rem]">
                            ${escapeHtml(page.text)}
                        </p>

                        ${page.is_last ? `
                            <button
                                id="restartBookBtn"
                                type="button"
                                class="relative z-[70] mt-5 inline-flex items-center justify-center gap-2 rounded-2xl border border-white/20 px-4 py-2.5 text-xs font-black text-white shadow-xl transition hover:scale-105 active:scale-95 focus-visible:outline-none focus-visible:ring-4 {{ $themeGradientClass }} {{ $themeShadowClass }} {{ $themeRingClass }} sm:px-5 sm:py-3 sm:text-sm"
                            >
                                <span>${escapeHtml(restartLabel)}</span>
                                <span>↻</span>
                            </button>
                        ` : ''}
                    </div>

                    ${pageNumberBadge(pageNumber, side)}
                </div>
            `;
        }

        function normalizeDesktopPage(pageIndex) {
            if (pageIndex <= 0) return 0;
            return pageIndex % 2 === 0 ? pageIndex : pageIndex - 1;
        }

        function goNext() {
            if (currentPage === -1) {
                currentPage = 0;
                renderBook();
                return;
            }

            if (isDesktopBook()) {
                currentPage = Math.min(storyPages.length - 1, normalizeDesktopPage(currentPage) + 2);
            } else {
                currentPage = Math.min(storyPages.length - 1, currentPage + 1);
            }

            renderBook();
        }

        function goPrev() {
            if (isDesktopBook()) {
                currentPage = currentPage <= 0 ? -1 : Math.max(0, normalizeDesktopPage(currentPage) - 2);
            } else {
                currentPage = currentPage <= 0 ? -1 : currentPage - 1;
            }

            renderBook();
        }

        function renderBook() {
            const isCover = currentPage === -1;
            const desktop = isDesktopBook();

            bookCover.classList.toggle('hidden', !isCover);
            bookSpread.classList.toggle('hidden', isCover);

            prevBtn.disabled = currentPage === -1;

            if (desktop) {
                const leftIndex = normalizeDesktopPage(currentPage);
                nextBtn.disabled = !isCover && leftIndex + 2 >= storyPages.length;
            } else {
                nextBtn.disabled = !isCover && currentPage >= storyPages.length - 1;
            }

            if (isCover) {
                leftPage.innerHTML = '';
                rightPage.innerHTML = '';
                mobilePage.innerHTML = '';
                return;
            }

            if (desktop) {
                const leftIndex = normalizeDesktopPage(currentPage);
                const rightIndex = leftIndex + 1;

                leftPage.innerHTML = renderPage(storyPages[leftIndex], leftIndex + 1, 'left');
                rightPage.innerHTML = renderPage(storyPages[rightIndex], rightIndex + 1, 'right');

                currentPage = leftIndex;
            } else {
                mobilePage.innerHTML = renderPage(storyPages[currentPage], currentPage + 1, 'right');
            }

            document.getElementById('restartBookBtn')?.addEventListener('click', (event) => {
                event.stopPropagation();
                currentPage = -1;
                renderBook();
            });
        }

        prevBtn.addEventListener('click', goPrev);
        nextBtn.addEventListener('click', goNext);

        mobilePrevZone?.addEventListener('click', goPrev);
        mobileNextZone?.addEventListener('click', goNext);

        bookCover.addEventListener('click', () => {
            if (!isDesktopBook()) {
                goNext();
            }
        });

        bookSpread.addEventListener('touchstart', (event) => {
            touchStartX = event.changedTouches[0].screenX;
        }, { passive: true });

        bookSpread.addEventListener('touchend', (event) => {
            touchEndX = event.changedTouches[0].screenX;
            const distance = touchEndX - touchStartX;

            if (Math.abs(distance) < 45) return;

            if (distance < 0) {
                goNext();
            } else {
                goPrev();
            }
        }, { passive: true });

        window.addEventListener('resize', renderBook);

        window.resetSlide = function () {
            currentPage = -1;
            renderBook();
        };

        renderBook();
    </script>
@endsection