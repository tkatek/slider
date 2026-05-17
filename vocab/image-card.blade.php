@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = $content['page_title'] ?? 'Slide';
    $gridClass = trim((string) ($content['grid_class'] ?? 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-4'));
    $items = is_array($content['items'] ?? null) ? array_values($content['items']) : [];
    $groups = is_array($content['groups'] ?? null) ? array_values($content['groups']) : [];

    $groupSections = [];

    foreach ($groups as $index => $group) {
        if (!is_array($group)) {
            continue;
        }

        $groupItems = is_array($group['items'] ?? null) ? array_values($group['items']) : [];

        if ($groupItems === []) {
            continue;
        }

        $groupSections[] = [
            'key' => (string) ($group['key'] ?? ('group-' . $index)),  
            'title' => trim((string) ($group['title'] ?? '')),
            'grid_class' => trim((string) ($group['grid_class'] ?? $gridClass)),
            'items' => $groupItems,
        ];
    }

    if ($groupSections === [] && $items !== []) {
        $groupSections[] = [
            'key' => 'group-0',
            'title' => '',
            'grid_class' => $gridClass,
            'items' => $items,
        ];
    }
@endphp

@section('title', $pageTitle)

@section('content')
    <div class="relative flex min-h-[100dvh] w-full items-center overflow-x-hidden overflow-y-auto">
        <main class="mx-auto w-full max-w-[1320px] px-4 py-10 sm:px-8 sm:py-12">
            @include('slider.components.title-subtitle')

            <div class="mt-6 flex flex-col gap-7 sm:mt-8 sm:gap-8">
                @foreach($groupSections as $group)
                    <section class="w-full" data-group-key="{{ $group['key'] }}">
                        @if($group['title'] !== '')
                            <h2 class="mb-3 text-left text-lg font-black leading-tight text-slate-950 dark:text-slate-50 sm:text-xl">
                                {{ $group['title'] }}
                            </h2> 
                        @endif

                        <div class="mx-auto grid w-full justify-center gap-3 sm:gap-4 {{ $group['grid_class'] }}">
                            @foreach($group['items'] as $item)
                                @php
                                    $item = is_array($item) ? $item : [];
                                    $text = trim((string) ($item['text'] ?? $item['label'] ?? $item['title'] ?? $item['name'] ?? ''));
                                    $plainText = trim(html_entity_decode(strip_tags($text), ENT_QUOTES, 'UTF-8'));
                                    $subtitle = trim((string) ($item['subtitle'] ?? $item['description'] ?? ''));
                                    $description = trim((string) ($item['description'] ?? ''));
                                    $example = trim((string) ($item['example_subtitle'] ?? $item['example'] ?? $item['sentence'] ?? ''));
                                    $emoji = trim((string) ($item['emoji'] ?? ''));
                                    $image = trim((string) ($item['image'] ?? ''));
                                    $sound = trim((string) ($item['sound'] ?? $item['audio'] ?? ''));
                                    $script = trim((string) ($item['script'] ?? ''));
                                    $fallbackLetter = mb_substr($plainText !== '' ? $plainText : '?', 0, 1);
                                    $detailParts = array_values(array_filter([
                                        $subtitle,
                                        $description !== $subtitle ? $description : '',
                                    ]));

                                    if ($script === '') {
                                        $script = trim(implode(' ', $detailParts));
                                    }

                                    if ($script === '') {
                                        $script = $text;
                                    }
                                @endphp

                                <article
                                    role="button"
                                    tabindex="0"
                                    class="vocab-card group relative flex w-full max-w-[26rem] justify-self-center min-w-0 cursor-pointer select-none flex-col overflow-hidden rounded-[2rem] border border-white/70 bg-white/75 shadow-[0_15px_30px_-10px_rgba(0,0,0,0.05)] outline-none backdrop-blur-2xl transition-all duration-300 hover:-translate-y-2 hover:scale-[1.02] hover:border-slate-700 hover:shadow-[0_30px_60px_-15px_rgba(2,6,23,0.28)] focus-visible:ring-4 focus-visible:ring-cyan-400/25 dark:border-white/10 dark:bg-slate-900/80 {{ $image === '' ? 'min-h-[5rem]' : '' }}"
                                    data-title="{{ $plainText }}"
                                    data-title-html="{{ $text }}"
                                    data-script="{{ $script }}"
                                    data-example="{{ $example }}"
                                    data-audio="{{ $sound }}"
                                >
                                    @if($image !== '')
                                        <div class="relative flex aspect-[5/4] items-center justify-center overflow-hidden bg-slate-100 dark:bg-slate-800">
                                            <img
                                                src="{{ $image }}"
                                                alt="{{ $plainText }}"
                                                loading="lazy"
                                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                                            >
                                        </div>
                                    @endif

                                    <div class="flex {{ $image === '' ? 'min-h-[4.5rem]' : 'min-h-[4rem]' }} items-center justify-between gap-2 bg-white px-3.5 py-3.5 transition-colors duration-300 dark:bg-slate-900 sm:px-4 sm:py-4">
                                        <span class="min-w-0 break-words {{ $image === '' ? 'text-base sm:text-lg' : 'text-sm sm:text-base' }} font-extrabold leading-tight text-slate-900 dark:text-slate-100">
                                            @if($emoji !== '')
                                                {{ $emoji }}
                                            @elseif($image === '')
                                                {{ $fallbackLetter }}
                                            @endif
                                            {!! $text !!}
                                        </span>

                                        @if($sound !== '')
                                            <button
                                                type="button"
                                                class="speak-btn inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-lg border border-slate-200 bg-slate-100 text-slate-500 transition-all duration-300 hover:-rotate-6 hover:border-slate-700 hover:bg-slate-800 hover:text-white focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-cyan-300/35 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 sm:h-8 sm:w-8"
                                                aria-label="Play audio"
                                            >
                                                <svg class="js-static-icon h-3.5 w-3.5 sm:h-4 sm:w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                </svg>

                                                <span class="js-wave-wrap hidden items-center gap-0.5" aria-hidden="true">
                                                    <span class="h-1.5 w-[2px] animate-pulse rounded-full bg-current"></span>
                                                    <span class="h-3 w-[2px] animate-pulse rounded-full bg-current [animation-delay:120ms]"></span>
                                                    <span class="h-2 w-[2px] animate-pulse rounded-full bg-current [animation-delay:240ms]"></span>
                                                </span>
                                            </button>
                                        @endif
                                    </div>

                                    <div class="playing-indicator absolute bottom-0 left-0 h-1 w-0 bg-[linear-gradient(135deg,#57534e,#3f3f46,#0f172a)] transition-[width] duration-100"></div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @endforeach
            </div>
        </main>

        <div
            id="imageCardSubtitleOverlay"
            class="pointer-events-none fixed left-1/2 top-1/2 z-[100] max-h-[42dvh] w-[calc(100%-1rem)] -translate-x-1/2 -translate-y-[42%] scale-95 overflow-y-auto rounded-2xl border border-white/60 bg-white/75 px-3.5 py-2.5 text-center opacity-0 backdrop-blur-2xl transition-all duration-500 sm:w-auto sm:min-w-[48rem] sm:max-w-[82vw] sm:rounded-[1.5rem] sm:px-7 sm:py-4 dark:border-white/10 dark:bg-slate-900/80"
        >
            <p id="imageCardSubtitleText" class="text-sm font-bold leading-snug text-slate-900 dark:text-slate-100 sm:text-2xl sm:leading-[1.35]"></p>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cards = Array.from(document.querySelectorAll(".vocab-card"));
            const overlay = document.getElementById("imageCardSubtitleOverlay");
            const subtitleText = document.getElementById("imageCardSubtitleText");
            const audio = new Audio();

            audio.preload = "auto";

            let currentCard = null;
            let currentButton = null;
            let currentSrc = "";
            let currentObjectUrl = "";
            let syncAnimationFrame = null;

            const activeWordClasses = ["bg-slate-900", "text-white", "opacity-100", "scale-105", "dark:bg-slate-100", "dark:text-slate-950"];

            function splitWords(text) {
                return String(text || "").trim().split(/\s+/).filter(Boolean);
            }

            function normalizeText(text) {
                return stripHtml(text).toLowerCase();
            }

            function stripHtml(value) {
                const template = document.createElement("template");
                template.innerHTML = String(value || "");
                return (template.content.textContent || "").trim();
            }

            function escapeHtml(value) {
                return String(value || "")
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;");
            }

            function wrapSyncWords(root) {
                if (!root) return [];

                const words = [];
                const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, {
                    acceptNode(node) {
                        return node.nodeValue.trim() ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
                    }
                });
                const textNodes = [];

                while (walker.nextNode()) {
                    textNodes.push(walker.currentNode);
                }

                textNodes.forEach((node) => {
                    const fragment = document.createDocumentFragment();
                    const parts = node.nodeValue.split(/(\s+)/);

                    parts.forEach((part) => {
                        if (!part) return;

                        if (/^\s+$/.test(part)) {
                            fragment.appendChild(document.createTextNode(part));
                            return;
                        }

                        const span = document.createElement("span");
                        span.className = "word-span mx-[0.12rem] inline-block rounded-lg px-1.5 py-0.5 opacity-60 transition-all duration-200";
                        span.dataset.syncWord = "1";
                        span.dataset.index = String(words.length);
                        span.textContent = part;
                        words.push(part);
                        fragment.appendChild(span);
                    });

                    node.parentNode.replaceChild(fragment, node);
                });

                return words;
            }

            function fillHtmlOrText(element, value) {
                if (!element) return;

                const rawValue = String(value || "").trim();

                if (!rawValue) {
                    element.textContent = "";
                    return;
                }

                if (/<[a-z][\s\S]*>/i.test(rawValue)) {
                    element.innerHTML = rawValue;
                    return;
                }

                element.textContent = rawValue;
            }

            function renderSubtitle(title, titleHtml, text, example) {
                if (!subtitleText) return [];

                const rawTitle = String(titleHtml || title || "").trim();
                const titleMarkup = rawTitle
                    ? `<span data-title-host class="mb-1 mr-1 inline-block whitespace-normal rounded-xl bg-slate-100 px-3 py-1 text-slate-600 shadow-sm ring-1 ring-slate-200/70 dark:bg-slate-800 dark:text-slate-300 dark:ring-slate-700"></span>`
                    : "";
                const rawText = String(text || "").trim();
                const rawExample = String(example || "").trim();
                const exampleMarkup = rawExample
                    ? `<span data-example-host class="mt-2 block rounded-xl bg-slate-50/80 px-3 py-2 text-sm font-bold leading-snug text-slate-600 ring-1 ring-slate-200/70 dark:bg-slate-800/70 dark:text-slate-300 dark:ring-slate-700 sm:text-base"></span>`
                    : "";

                subtitleText.innerHTML = `${titleMarkup}<span data-script-host class="inline"></span>${exampleMarkup}`;

                const titleHost = subtitleText.querySelector("[data-title-host]");
                const scriptHost = subtitleText.querySelector("[data-script-host]");
                const exampleHost = subtitleText.querySelector("[data-example-host]");

                if (titleHost && rawTitle) {
                    fillHtmlOrText(titleHost, rawTitle);
                }

                if (scriptHost && rawText) {
                    fillHtmlOrText(scriptHost, rawText);
                }

                if (exampleHost && rawExample) {
                    fillHtmlOrText(exampleHost, rawExample);
                }

                return wrapSyncWords(scriptHost);
            }

            function showOverlay() {
                if (!overlay) return;

                overlay.classList.remove("opacity-0", "-translate-y-[42%]", "scale-95");
                overlay.classList.add("opacity-100", "-translate-y-1/2", "scale-100");
            }

            function hideOverlay() {
                if (!overlay) return;

                overlay.classList.add("opacity-0", "-translate-y-[42%]", "scale-95");
                overlay.classList.remove("opacity-100", "-translate-y-1/2", "scale-100");
            }

            function setButtonState(button, isPlaying) {
                if (!button) return;

                button.classList.toggle("border-slate-700", isPlaying);
                button.classList.toggle("bg-slate-800", isPlaying);
                button.classList.toggle("text-white", isPlaying);
                button.querySelector(".js-static-icon")?.classList.toggle("hidden", isPlaying);
                button.querySelector(".js-wave-wrap")?.classList.toggle("hidden", !isPlaying);
                button.querySelector(".js-wave-wrap")?.classList.toggle("flex", isPlaying);
            }

            function setCardState(card, isPlaying) {
                if (!card) return;

                card.classList.toggle("speaking", isPlaying);
                card.classList.toggle("ring-4", isPlaying);
                card.classList.toggle("ring-cyan-400/25", isPlaying);
            }

            function setProgress(card, width) {
                const indicator = card?.querySelector(".playing-indicator");
                if (indicator) indicator.style.width = width;
            }

            function clearWordHighlights() {
                document.querySelectorAll("#imageCardSubtitleText [data-sync-word='1']").forEach((span) => {
                    span.classList.remove(...activeWordClasses);
                });
            }

            function highlightWord(index) {
                const wordSpans = Array.from(document.querySelectorAll("#imageCardSubtitleText [data-sync-word='1']"));

                wordSpans.forEach((span, spanIndex) => {
                    span.classList.toggle("opacity-60", spanIndex !== index);
                    span.classList.toggle("opacity-100", spanIndex === index);
                    activeWordClasses.forEach((className) => {
                        span.classList.toggle(className, spanIndex === index);
                    });
                });
            }

            function cancelSync() {
                if (!syncAnimationFrame) return;

                cancelAnimationFrame(syncAnimationFrame);
                syncAnimationFrame = null;
            }

            function revokeObjectUrl() {
                if (!currentObjectUrl) return;

                URL.revokeObjectURL(currentObjectUrl);
                currentObjectUrl = "";
            }

            function resolveAudioUrl(src) {
                try {
                    return new URL(src, document.baseURI).href;
                } catch (e) {
                    return src;
                }
            }

            function hasMpegExtension(src) {
                return /\.(mpeg|mpga)(?:[?#]|$)/i.test(String(src || ""));
            }

            async function getPlayableAudioSrc(src) {
                const resolvedSrc = resolveAudioUrl(src);

                if (!hasMpegExtension(resolvedSrc)) {
                    return resolvedSrc;
                }

                try {
                    const url = new URL(resolvedSrc);

                    if (url.origin !== window.location.origin) {
                        return resolvedSrc;
                    }

                    const response = await fetch(url.href, {
                        credentials: "same-origin",
                        cache: "force-cache",
                    });

                    if (!response.ok) {
                        return resolvedSrc;
                    }

                    const rawBlob = await response.blob();
                    const audioBlob = rawBlob.type === "audio/mpeg"
                        ? rawBlob
                        : new Blob([rawBlob], { type: "audio/mpeg" });

                    revokeObjectUrl();
                    currentObjectUrl = URL.createObjectURL(audioBlob);

                    return currentObjectUrl;
                } catch (e) {
                    return resolvedSrc;
                }
            }

            function resetCurrent() {
                setButtonState(currentButton, false);
                setCardState(currentCard, false);
                setProgress(currentCard, "0%");
                currentCard = null;
                currentButton = null;
                currentSrc = "";
                clearWordHighlights();
                cancelSync();
            }

            function stopAll() {
                try {
                    audio.pause();
                    audio.currentTime = 0;
                    audio.removeAttribute("src");
                    audio.load();
                } catch (e) {}

                revokeObjectUrl();
                resetCurrent();
                hideOverlay();
            }

            function syncSubtitles(words) {
                cancelSync();

                function update() {
                    if (audio.paused || !currentCard) return;

                    const progress = audio.duration ? audio.currentTime / audio.duration : 0;
                    const safeProgress = Math.min(Math.max(progress || 0, 0), 1);
                    const currentWordIndex = Math.min(words.length - 1, Math.floor(safeProgress * words.length));

                    setProgress(currentCard, `${safeProgress * 100}%`);
                    highlightWord(currentWordIndex);

                    syncAnimationFrame = requestAnimationFrame(update);
                }

                update();
            }

            async function playCard(card) {
                if (!card) return;

                const src = card.dataset.audio || "";
                const script = card.dataset.script || card.dataset.title || "";
                const title = card.dataset.title || "";
                const titleHtml = card.dataset.titleHtml || title;
                const example = card.dataset.example || "";
                const button = card.querySelector(".speak-btn");
                const popupText = normalizeText(script) === normalizeText(title) ? "" : script;

                if (currentCard === card && !audio.paused) {
                    stopAll();
                    return;
                }

                stopAll();

                const words = renderSubtitle(title, titleHtml, popupText, example);
                showOverlay();

                if (!src) {
                    return;
                }

                currentCard = card;
                currentButton = button; 
                currentSrc = src;

                setButtonState(currentButton, true);
                setCardState(currentCard, true);

                try {
                    audio.src = await getPlayableAudioSrc(currentSrc);
                    audio.currentTime = 0;
                    audio.onplay = () => syncSubtitles(words);

                    const playPromise = audio.play();
                    if (playPromise && typeof playPromise.catch === "function") {
                        playPromise.catch(() => stopAll());
                    }
                } catch (e) {
                    stopAll();
                }
            }

            cards.forEach((card) => {
                card.addEventListener("click", () => playCard(card));
                card.addEventListener("keydown", (event) => {
                    if (event.target?.closest?.(".speak-btn")) return;
                    if (event.key !== "Enter" && event.key !== " ") return;
                    event.preventDefault();
                    playCard(card);
                });
            });

            audio.addEventListener("ended", stopAll);
            audio.addEventListener("error", stopAll);

            document.addEventListener("visibilitychange", () => {
                if (document.hidden) stopAll();
            });

            window.addEventListener("beforeunload", stopAll);
            window.addEventListener("pagehide", stopAll);

            const observer = new MutationObserver(() => {
                if (currentCard && !document.body.contains(currentCard)) {
                    stopAll();
                }
            });

            observer.observe(document.body, { 
                childList: true,
                subtree: true
            });

            window.stopAll = stopAll;
            window.stopSlideAudio = stopAll;
            window.resetSlide = stopAll;
        });
    </script>
@endsection
