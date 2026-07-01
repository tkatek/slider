@if($sectionStyles ?? false)
    <style>
        /* Listening, conversation, transcript, and video activity styles. */
        [data-conversation-mobile-button] {
            display: inline-flex !important;
        }

        .pq-conversation-line [data-conversation-bubble-button] {
            display: none !important;
            position: absolute;
            top: .95rem;
            right: .95rem;
        }

        @media (min-width: 1024px) {
            [data-conversation-mobile-button] {
                display: none !important;
            }

            .pq-conversation-line.is-active [data-conversation-bubble-button],
            .is-conversation-idle .pq-conversation-line[data-conversation-starter="true"] [data-conversation-bubble-button] {
                display: inline-flex !important;
            }

            .pq-conversation-line[data-side="left"]::after,
            .pq-conversation-line[data-side="right"]::after {
                position: absolute;
                top: 1.55rem;
                width: 0;
                height: 0;
                content: "";
                border-top: .6rem solid transparent;
                border-bottom: .6rem solid transparent;
            }

            .pq-conversation-line[data-side="left"]::after {
                left: -.72rem;
                border-right: .72rem solid #111827;
            }

            .pq-conversation-line[data-side="right"]::after {
                right: -.72rem;
                border-left: .72rem solid #111827;
            }
        }

        .pq-video-wrap .video-js,
        .pq-video-wrap > video,
        .pq-short-video-wrap .video-js,
        .pq-short-video-wrap > video {
            width: 100% !important;
            height: 100% !important;
            margin: 0 auto;
            background: #090910;
            font-family: inherit;
        }

        .pq-video-wrap .video-js .vjs-tech,
        .pq-video-wrap .video-js .vjs-poster,
        .pq-video-wrap .video-js .vjs-poster img,
        .pq-short-video-wrap .video-js .vjs-tech,
        .pq-short-video-wrap .video-js .vjs-poster,
        .pq-short-video-wrap .video-js .vjs-poster img {
            width: 100%;
            height: 100%;
            object-fit: contain !important;
            object-position: center center !important;
        }

        .pq-video-wrap .vjs-picture-in-picture-control,
        .pq-short-video-wrap .vjs-picture-in-picture-control {
            display: none !important;
        }

        .pq-video-wrap .video-js .vjs-big-play-button {
            top: 50% !important;
            left: 50% !important;
            width: 3.75rem;
            height: 3.75rem;
            margin: 0;
            transform: translate(-50%, -50%);
            border: 0;
            border-radius: 999px;
            background: linear-gradient(145deg, rgba(124, 127, 246, .96), rgba(102, 93, 232, .96));
            box-shadow: 0 14px 34px rgba(18, 18, 40, .32);
            line-height: 3.75rem;
        }

        .pq-video-wrap .video-js:hover .vjs-big-play-button,
        .pq-video-wrap .video-js .vjs-big-play-button:focus {
            filter: brightness(1.06);
            transform: translate(-50%, -50%) scale(1.06);
        }

        .pq-video-wrap .video-js .vjs-big-play-button .vjs-icon-placeholder::before {
            font-size: 2.25rem;
            line-height: 3.75rem;
            text-shadow: none;
        }

        .pq-short-video-wrap .video-js .vjs-big-play-button {
            display: none !important;
        }

        @media (min-width: 1024px) {
            .pq-video-wrap .video-js .vjs-big-play-button {
                width: 4.35rem;
                height: 4.35rem;
                line-height: 4.35rem;
            }

            .pq-video-wrap .video-js .vjs-big-play-button .vjs-icon-placeholder::before {
                font-size: 2.5rem;
                line-height: 4.35rem;
            }
        }

        .pq-video-wrap .pq-vjs-cc-button .vjs-icon-placeholder,
        .pq-short-video-wrap .pq-vjs-cc-button .vjs-icon-placeholder {
            display: grid;
            place-items: center;
            width: 100%;
            height: 100%;
            font-size: .66rem;
            font-weight: 900;
            letter-spacing: 0;
            line-height: 1;
            text-shadow: none;
        }

        .pq-video-wrap .pq-vjs-cc-button,
        .pq-short-video-wrap .pq-vjs-cc-button {
            width: 2.55em !important;
            min-width: 2.55em !important;
            height: 100% !important;
            color: rgba(255, 255, 255, .78);
            background: transparent !important;
            border-radius: 0 !important;
            box-shadow: none !important;
        }

        .pq-video-wrap .pq-vjs-cc-button .vjs-icon-placeholder::before,
        .pq-short-video-wrap .pq-vjs-cc-button .vjs-icon-placeholder::before {
            content: "" !important;
        }

        .pq-video-wrap .pq-vjs-cc-button.is-active,
        .pq-video-wrap .pq-vjs-cc-button:hover,
        .pq-short-video-wrap .pq-vjs-cc-button.is-active,
        .pq-short-video-wrap .pq-vjs-cc-button:hover {
            color: #fff;
            background: transparent !important;
        }

        .pq-video-wrap .pq-vjs-cc-button.is-active .vjs-icon-placeholder,
        .pq-short-video-wrap .pq-vjs-cc-button.is-active .vjs-icon-placeholder {
            text-decoration: underline;
            text-decoration-thickness: 2px;
            text-underline-offset: .2em;
        }

        .pq-video-wrap .video-js .vjs-control-bar,
        .pq-short-video-wrap .video-js .vjs-control-bar {
            transition: opacity 120ms ease, visibility 120ms ease, transform 120ms ease !important;
        }

        .pq-video-wrap .video-js.vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar,
        .pq-short-video-wrap .video-js.vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar {
            opacity: 0 !important;
            visibility: hidden !important;
            transform: translateY(100%) !important;
            pointer-events: none !important;
        }

        .pq-video-caption-overlay.is-visible .pq-video-caption-text {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .pq-video-wrap .video-js.vjs-user-active .pq-video-caption-overlay,
        .pq-video-wrap .video-js.vjs-paused .pq-video-caption-overlay {
            bottom: clamp(3.85rem, 12%, 5rem);
        }

        .pq-video-wrap .video-js.vjs-user-inactive.vjs-playing .pq-video-caption-overlay {
            bottom: clamp(.8rem, 4%, 1.75rem);
        }

        .pq-short-video-wrap .video-js.vjs-user-active .pq-video-caption-overlay,
        .pq-short-video-wrap .video-js.vjs-paused .pq-video-caption-overlay {
            bottom: clamp(4rem, 12%, 5.5rem);
        }

        .pq-short-video-wrap .video-js.vjs-user-inactive.vjs-playing .pq-video-caption-overlay {
            bottom: clamp(2.25rem, 8%, 4.75rem);
        }

        .video-js.vjs-fullscreen .pq-video-caption-overlay {
            bottom: clamp(2.1rem, 7%, 5.2rem);
            z-index: 10000;
            width: min(86%, 70rem);
        }

        .video-js.vjs-fullscreen .pq-video-caption-text {
            border-radius: .8rem;
            padding: .55rem .85rem;
            font-size: clamp(.82rem, 1.55vw, 1.18rem);
        }

        .pq-short-video-overlay.is-hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .pq-short-video-overlay:hover .pq-short-play-circle {
            transform: scale(1.045);
        }

        .pq-short-video-center-toggle.is-playing {
            opacity: 0;
            transform: translate(-50%, -50%) scale(.92);
        }

        @media (max-width: 767px) {
            .pq-short-video-shell {
                width: auto !important;
                height: 100% !important;
                max-height: 100% !important;
                max-width: 100% !important;
            }

            .pq-short-video-wrap .video-js .vjs-control-bar,
            .pq-short-video-wrap .video-js .vjs-big-play-button {
                z-index: 10 !important;
            }

            .pq-short-video-wrap .video-js .vjs-volume-panel,
            .pq-short-video-wrap .video-js .vjs-mute-control {
                display: none !important;
            }
        }

        @media (min-width: 1280px) {
            .pq-video-no-quiz .pq-video-main-column {
                max-width: min(100%, 58rem) !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            .pq-video-no-quiz .pq-video-wrap {
                max-height: min(54dvh, 31rem) !important;
            }

            .pq-video-no-quiz.is-transcript-open .pq-video-wrap {
                max-height: min(46dvh, 26rem) !important;
            }

            .pq-video-no-quiz .pq-transcript-panel {
                max-height: 5.75rem !important;
            }
        }

        @media (min-width: 1536px) {
            .pq-video-no-quiz .pq-video-main-column {
                max-width: min(100%, 64rem) !important;
            }

            .pq-video-no-quiz .pq-video-wrap {
                max-height: min(56dvh, 34rem) !important;
            }

            .pq-video-no-quiz.is-transcript-open .pq-video-wrap {
                max-height: min(48dvh, 28rem) !important;
            }
        }

        @media (min-width: 1280px) and (max-height: 840px) {
            .pq-video-no-quiz .pq-video-main-column {
                max-width: min(100%, 62rem) !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            .pq-video-no-quiz .pq-video-wrap {
                max-height: min(52dvh, 26rem) !important;
            }

            .pq-video-no-quiz.is-transcript-open .pq-video-wrap {
                height: min(44dvh, 22rem) !important;
                max-height: min(44dvh, 22rem) !important;
            }

            .pq-video-no-quiz.is-transcript-open .pq-transcript-panel {
                max-height: 4.75rem !important;
            }

            .pq-video-no-quiz.is-transcript-open .pq-transcript-row {
                min-height: 1.7rem !important;
                padding-top: .2rem !important;
                padding-bottom: .2rem !important;
            }

            .pq-video-has-quiz .pq-video-wrap {
                max-height: min(54dvh, 27rem) !important;
            }

            .pq-video-has-quiz.is-transcript-open .pq-video-wrap {
                height: min(46dvh, 23rem) !important;
                max-height: min(46dvh, 23rem) !important;
            }

            .pq-video-has-quiz .pq-transcript-panel {
                max-height: 4.75rem !important;
            }

            .pq-video-has-quiz .pq-transcript-row {
                min-height: 1.7rem !important;
                padding-top: .2rem !important;
                padding-bottom: .2rem !important;
            }
        }

        @media (min-width: 1536px) and (min-height: 841px) {
            .pq-video-has-quiz .pq-video-wrap {
                max-height: min(54dvh, 32rem) !important;
            }

            .pq-video-has-quiz.is-transcript-open .pq-video-wrap {
                max-height: min(48dvh, 28rem) !important;
            }

            .pq-video-has-quiz .pq-transcript-panel {
                max-height: 5.75rem !important;
            }
        }

        @media (max-width: 767px) {
            .pq-video-has-quiz .pq-video-inner-layout {
                gap: 1rem !important;
            }

            .pq-video-has-quiz .pq-video-main-column,
            .pq-video-has-quiz .pq-video-side-column {
                flex-shrink: 0 !important;
            }

            .pq-video-has-quiz.is-transcript-open .pq-video-wrap {
                height: min(27dvh, 11.75rem) !important;
                max-height: min(27dvh, 11.75rem) !important;
            }

            .pq-video-has-quiz.is-transcript-open .pq-transcript-panel {
                max-height: 4.6rem !important;
            }

            .pq-video-has-quiz.is-transcript-open .pq-transcript-row {
                min-height: 1.72rem !important;
                padding-top: .24rem !important;
                padding-bottom: .24rem !important;
            }

            .pq-video-has-quiz .pq-video-side-column {
                margin-top: .45rem !important;
            }

            .pq-video-has-quiz .pq-quiz-question {
                margin-bottom: .7rem !important;
                font-size: clamp(1.08rem, 4.8vw, 1.28rem) !important;
                line-height: 1.06 !important;
            }

            .pq-video-has-quiz .pq-quiz-option {
                min-height: 2.85rem !important;
            }
        }

        @media (max-width: 420px) and (max-height: 700px) {
            [data-short-video-page] {
                padding-top: .25rem !important;
                padding-bottom: .25rem !important;
            }

            .pq-video-has-quiz.is-transcript-open .pq-video-wrap {
                height: min(25dvh, 10.75rem) !important;
                max-height: min(25dvh, 10.75rem) !important;
            }

            .pq-video-has-quiz.is-transcript-open .pq-transcript-panel {
                max-height: 3.85rem !important;
            }

            .pq-video-has-quiz .pq-quiz-question {
                font-size: 1rem !important;
                line-height: 1.05 !important;
            }
        }

        @media (max-width: 420px) and (min-height: 701px) {
            .pq-short-video-shell {
                border-radius: 1.35rem !important;
            }
        }
    </style>
@else
{{-- Activity functions: listening, audio, video, short-video, transcripts, and conversations. --}}
    function renderConversationSpeaker(page, side) {
        const name = speakerName(page, side);
        const image = speakerImage(page, side);
        const rotate = side === 'left' ? '-rotate-[2deg]' : 'rotate-[2deg]';
        const shadow = side === 'left' ? 'shadow-[8px_8px_0_rgba(15,23,42,.10)]' : 'shadow-[10px_10px_0_rgba(15,23,42,.10)]';

        return `
                <aside class="pq-conversation-speaker flex items-center justify-center ${side === 'left' ? 'lg:order-1' : 'lg:order-3'}" data-conversation-speaker="${escapeHtml(side)}">
                    <figure class="relative mx-auto w-full max-w-[8.25rem] rounded-[1.15rem] border-[3px] border-slate-900 bg-white p-1 ${shadow} ${rotate} min-[390px]:max-w-[9rem] sm:max-w-[11.5rem] md:max-w-[13rem] lg:max-w-[12rem] lg:rounded-[1.75rem] lg:border-[4px] xl:max-w-[14rem]">
                        ${image ? `<img class="aspect-square w-full rounded-[.85rem] ${contentImageFitClass('portrait')} lg:rounded-[1.35rem]" src="${escapeHtml(image)}" alt="${escapeHtml(name)}" loading="lazy" decoding="async">` : `<div class="aspect-square w-full rounded-[.85rem] bg-[#eeedff]"></div>`}
                        <figcaption class="absolute -bottom-2 left-1/2 -translate-x-1/2 rounded-lg bg-slate-900 px-2.5 py-1 text-[.58rem] font-bold uppercase leading-none text-white sm:px-3 sm:text-[.62rem] lg:-bottom-3 lg:px-4 lg:py-1.5 lg:text-[.7rem]">
                            ${escapeDisplay(name)}
                        </figcaption>
                    </figure>
                </aside>
            `;
    }

    function normalizeDialogueLine(page, line = {}, index = 0) {
        const side = String(line.side || '').toLowerCase() === 'right' ? 'right' : 'left';
        return {
            index,
            side,
            text: String(line.text || line.title || line.sentence || ''),
            sound: line.sound || line.audio || '',
            speaker: line.speaker || speakerName(page, side),
        };
    }

    function renderConversationPage(page) {
        const title = page.title || page.page_title || page.sectionTitle || 'Conversation';
        const instruction = textHtml(page.paragraph || page.description || page.subtitle || page.instruction || '');
        const dialogues = Array.isArray(page.dialogues)
            ? page.dialogues.map((line, index) => normalizeDialogueLine(page, line, index)).filter((line) => fieldHasValue(line.text))
            : [];
        const encodedDialogues = escapeHtml(JSON.stringify(dialogues));
        const starterSide = dialogues[0]?.side || 'left';

        function conversationBubble(side) {
            const sideAlign = side === 'right'
                ? 'self-end rounded-[1.35rem_1.35rem_.65rem_1.35rem] bg-[#faf5ff] lg:after:right-[-.72rem] lg:after:border-l-[.72rem] lg:after:border-l-slate-900'
                : 'self-start rounded-[1.35rem_1.35rem_1.35rem_.65rem] bg-[#eef2ff] lg:after:left-[-.72rem] lg:after:border-r-[.72rem] lg:after:border-r-slate-900';

            return `
                    <div class="pq-conversation-line relative w-full max-w-[34rem] border-2 border-slate-900 px-3 py-2.5 shadow-[6px_6px_0_rgba(15,23,42,.08)] sm:px-5 sm:py-4 lg:max-w-none lg:pr-[4.9rem] ${sideAlign}" data-conversation-line data-side="${escapeHtml(side)}" ${side === starterSide ? 'data-conversation-starter="true"' : ''}>
                        <button type="button" class="${ui.audioButton} !h-[2.55rem] !w-[2.55rem] sm:!h-[2.85rem] sm:!w-[2.85rem]" data-conversation-toggle data-conversation-bubble-button aria-label="Play full conversation">
                            <svg class="pq-audio-icon h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M4.75 9.35v5.3c0 .52.42.95.95.95h3.05l4.58 3.58c.62.49 1.54.04 1.54-.75V5.57c0-.79-.92-1.24-1.54-.75L8.75 8.4H5.7a.95.95 0 0 0-.95.95Z" fill="currentColor"/>
                                <path d="M17.25 8.4a4.85 4.85 0 0 1 0 7.2M19.55 6.2a8.05 8.05 0 0 1 0 11.6" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/>
                            </svg>
                            <span class="pq-audio-wave items-center gap-[2px]" aria-hidden="true">
                                <span class="block h-4 w-[3px] rounded-full bg-current"></span>
                                <span class="block h-5 w-[3px] rounded-full bg-current"></span>
                                <span class="block h-3.5 w-[3px] rounded-full bg-current"></span>
                            </span>
                        </button>
                        <div class="mb-2 inline-flex rounded-full bg-slate-900 px-3 py-1 text-[.66rem] font-bold uppercase leading-none text-white" data-conversation-speaker-name>
                            ${escapeDisplay(speakerName(page, side))}
                        </div>
                        <div class="min-h-[1.45rem] text-[clamp(.95rem,3.65vw,1.12rem)] font-bold leading-snug text-slate-900 md:min-h-[1.65rem] md:text-[1.15rem] xl:text-[1.25rem]">
                            <span data-conversation-text></span>
                        </div>
                    </div>
                `;
        }

        return `
                <article class="is-conversation-idle mx-auto flex min-h-full w-full max-w-[80rem] flex-col justify-start px-1 pt-0 pb-8 text-left sm:px-3 sm:pt-0 sm:pb-3 lg:justify-center lg:px-5 lg:pt-0 lg:pb-5 laptop:!justify-start laptop:!pt-0 laptop:!pb-3 short:!justify-start" data-conversation-page data-conversation-lines="${encodedDialogues}">
                    <h1 class="sr-only">${escapeDisplay(title)}</h1>
                    ${instruction ? `<div class="mx-auto mb-4 max-w-[56rem] rounded-2xl border border-[#eceafa] bg-white/75 px-4 py-3 text-sm font-bold leading-snug text-[#70748a] sm:px-5 sm:text-base md:text-center">${instruction}</div>` : ''}

                    <div class="mx-auto grid w-full max-w-[74rem] grid-cols-2 items-center gap-2.5 sm:gap-5 md:gap-8 lg:grid-cols-[minmax(9rem,12rem)_minmax(22rem,1fr)_minmax(9rem,12rem)] lg:gap-5 xl:grid-cols-[minmax(10rem,13rem)_minmax(25rem,1fr)_minmax(10rem,13rem)] xl:gap-7">
                        ${renderConversationSpeaker(page, 'left')}
                        ${renderConversationSpeaker(page, 'right')}

                        <section class="col-span-2 mx-auto flex w-full max-w-[42rem] min-w-0 flex-col gap-2.5 lg:order-2 lg:col-span-1 lg:max-w-none lg:gap-3" data-conversation-script>
                            <div class="flex justify-center pb-1 lg:hidden">
                                <button type="button" class="${ui.audioButton}" data-conversation-toggle data-conversation-mobile-button aria-label="Play full conversation">
                                    <svg class="pq-audio-icon h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M4.75 9.35v5.3c0 .52.42.95.95.95h3.05l4.58 3.58c.62.49 1.54.04 1.54-.75V5.57c0-.79-.92-1.24-1.54-.75L8.75 8.4H5.7a.95.95 0 0 0-.95.95Z" fill="currentColor"/>
                                        <path d="M17.25 8.4a4.85 4.85 0 0 1 0 7.2M19.55 6.2a8.05 8.05 0 0 1 0 11.6" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/>
                                    </svg>
                                    <span class="pq-audio-wave items-center gap-[2px]" aria-hidden="true">
                                        <span class="block h-4 w-[3px] rounded-full bg-current"></span>
                                        <span class="block h-5 w-[3px] rounded-full bg-current"></span>
                                        <span class="block h-3.5 w-[3px] rounded-full bg-current"></span>
                                    </span>
                                </button>
                            </div>

                            <div class="flex flex-col gap-2.5 sm:gap-4" data-conversation-bubbles>
                                ${conversationBubble('left')}
                                ${conversationBubble('right')}
                            </div>
                        </section>
                    </div>
                </article>
            `;
    }

    // SECTION: Main page renderers for image, audio, quiz, video, title, practice, and tests.

    function renderAudioPage(page) {
        const title = page.title || page.question || page.sectionTitle || 'Practice';
        const paragraph = textHtml(page.paragraph || page.description || '');

        return `
                <article class="mx-auto flex w-full max-w-[60rem] flex-col justify-start px-1 pt-0 pb-3 text-left sm:px-3 sm:pt-0 sm:pb-5 lg:justify-center lg:px-7 lg:pt-0 lg:pb-10" data-audio-scope>
                    <div class="flex items-center justify-between gap-4 lg:gap-7">
                        <h1 class="${ui.title} text-[clamp(1.85rem,6vw,4.2rem)] lg:text-[clamp(2.75rem,4vw,4.75rem)]" data-audio-text>${escapeDisplay(title)}</h1>
                        ${audioButton(page.audio, `Play ${title}`)}
                    </div>
                    ${paragraph ? `<div class="${ui.copy} mt-4 lg:mt-6 lg:text-xl" data-audio-copy>${paragraph}</div>` : ''}
                </article>
            `;
    }

    function transcriptHtml(script = []) {
        if (!Array.isArray(script) || !script.length) return '';

        return `
                <div class="pq-transcript-shell overflow-hidden rounded-b-[1.05rem] border border-t-0 border-[#e4e1fb] bg-[#f7f6ff]" data-transcript-shell>
                    <button type="button" class="flex min-h-[2.35rem] w-full items-center justify-between gap-3 px-3 py-1.5 text-left text-[.82rem] font-bold text-[#7168ee]" data-transcript-toggle>
                        <span class="inline-flex items-center gap-2">
                            <i class="fa-regular fa-closed-captioning text-[.86rem]" aria-hidden="true"></i>
                            <span data-transcript-label>Show transcript</span>
                        </span>
                        <i class="fa-solid fa-chevron-down" data-transcript-icon aria-hidden="true"></i>
                    </button>
                    <div class="pq-transcript-panel hidden max-h-[6.06rem] overflow-y-auto overflow-x-hidden bg-white/80 short:!max-h-[5.85rem]" data-transcript-panel>
                        ${script.map((line) => {
            const text = line.text || line.caption || '';
            const start = Number(line.start ?? 0);
            const end = Number(line.end ?? 0);
            return `
                                <button type="button" class="pq-transcript-row grid min-h-[2.02rem] w-full grid-cols-[2.4rem_minmax(0,1fr)_auto] items-center gap-[.38rem] border-t border-[#eeeafa] px-[.68rem] py-[.34rem] text-left short:!min-h-[1.95rem] short:!py-[.28rem]" data-transcript-row data-transcript-start="${escapeHtml(start)}" data-transcript-end="${escapeHtml(end)}">
                                    <span class="pq-transcript-time text-[.7rem] font-bold text-[#766cff]">${formatTime(start)}</span>
                                    <p class="pq-transcript-text line-clamp-1 text-[.76rem] font-bold leading-[1.16] text-[#777b90]">${escapeDisplay(text)}</p>
                                    <span class="pq-transcript-chevron text-[#b7b3ce]" aria-hidden="true">›</span>
                                </button>
                            `;
        }).join('')}
                    </div>
                </div>
            `;
    }

    function transcriptLinesFrom(page = {}) {
        if (Array.isArray(page.script) && page.script.length) return page.script;
        if (Array.isArray(page.subtitles) && page.subtitles.length) return page.subtitles;
        if (Array.isArray(page.transcript) && page.transcript.length) return page.transcript;
        return [];
    }

    function renderShortVideoPage(page) {
        const video = page.video;
        const title = fieldHasValue(page.title) ? page.title : (fieldHasValue(page.page_title) ? page.page_title : 'Short video');
        const thumbnail = page.thumbnail || page.poster || '';
        const captionLines = transcriptLinesFrom(page);
        const captionPayload = escapeHtml(JSON.stringify(captionLines));
        const showCc = flagIsEnabled(page.showCC ?? page.showCc ?? page.cc);
        const videoId = `passingQuestionVideo-${++videoInstanceId}`;

        return `
                <article class="mx-auto grid h-full min-h-0 w-full place-items-center overflow-hidden px-0 pt-0 pb-1" data-short-video-page data-video-show-cc="${showCc ? 'true' : 'false'}">
                    <h1 class="sr-only">${escapeDisplay(title)}</h1>

                    <div class="pq-short-video-stage grid h-full min-h-0 w-full place-items-center overflow-hidden">
                        <div class="pq-video-wrap pq-short-video-wrap pq-short-video-shell relative isolate aspect-[9/16] h-full max-h-full max-w-full overflow-hidden rounded-[1.75rem] bg-[#090910] shadow-[0_24px_60px_rgba(20,18,48,.22)] ring-1 ring-black/5" data-video-captions="${captionPayload}">
                            <video
                                id="${videoId}"
                                class="video-js vjs-default-skin h-full w-full bg-black object-contain"
                                controls
                                playsinline
                                webkit-playsinline
                                preload="auto"
                                disablePictureInPicture
                                controlsList="nodownload noremoteplayback noplaybackrate"
                                ${fieldHasValue(thumbnail) ? `poster="${escapeHtml(thumbnail)}"` : ''}
                                data-video-src="${escapeHtml(video)}"
                            >
                                <source src="${escapeHtml(video)}" type="${mediaType(video)}">
                            </video>
                            <div class="pq-video-caption-overlay pointer-events-none absolute left-1/2 bottom-[clamp(2.25rem,8%,4.75rem)] z-[80] flex w-[min(88%,22rem)] -translate-x-1/2 justify-center text-center" data-video-caption-overlay aria-live="polite" aria-hidden="true">
                                <span class="pq-video-caption-text inline-block max-w-full rounded-[.62rem] border border-white/10 bg-slate-950/85 px-[.58rem] py-[.34rem] text-[clamp(.72rem,3.1vw,.9rem)] font-bold leading-[1.25] text-white opacity-0 shadow-[0_10px_28px_rgba(0,0,0,.3)] backdrop-blur-md transition duration-300 [transform:translateY(10px)_scale(.96)]" data-video-caption-text></span>
                            </div>

                            <button type="button" class="absolute inset-x-0 top-0 bottom-14 z-[1] cursor-pointer border-0 bg-transparent" data-short-video-tap-layer aria-label="Play or pause video"></button>
                            <button type="button" class="pq-short-video-center-toggle absolute left-1/2 top-1/2 z-[3] grid h-16 w-16 -translate-x-1/2 -translate-y-1/2 scale-100 place-items-center rounded-full border-2 border-white/50 bg-white/18 text-white opacity-100 shadow-[0_18px_46px_rgba(0,0,0,.26)] backdrop-blur transition duration-200 active:scale-[.96] active:opacity-100 max-[767px]:h-14 max-[767px]:w-14" data-short-video-center-toggle aria-label="Play video">
                                <i class="fa-solid fa-play ml-1 text-2xl max-[767px]:text-xl" data-short-video-center-icon aria-hidden="true"></i>
                            </button>

                            ${fieldHasValue(thumbnail) ? `
                                <div class="pq-short-video-overlay pointer-events-none absolute inset-0 z-[2] border-0 bg-[rgba(8,8,18,.18)] text-white transition-opacity duration-200" data-short-video-overlay aria-hidden="true">
                                    <img class="absolute inset-0 -z-[2] h-full w-full scale-[1.045] object-cover blur-[1.6px] brightness-[.72]" src="${escapeHtml(thumbnail)}" alt="" loading="lazy" decoding="async" aria-hidden="true">
                                    <span class="absolute inset-0 -z-[1] bg-[linear-gradient(180deg,rgba(5,5,14,.12),rgba(5,5,14,.28))]" aria-hidden="true"></span>
                                </div>
                            ` : ''}

                            <p class="hidden bg-amber-50 px-4 py-3 text-sm font-bold text-amber-800" data-video-status></p>
                        </div>
                    </div>
                </article>
            `;
    }

    function renderVideoPage(page) {
        const video = page.video;
        const title = fieldHasValue(page.title) ? page.title : (fieldHasValue(page.page_title) ? page.page_title : '');
        const description = textHtml(page.paragraph || page.description || page.subtitle || '');
        const captionLines = transcriptLinesFrom(page);
        const captionPayload = escapeHtml(JSON.stringify(captionLines));
        const headingHtml = (fieldHasValue(title) || description)
            ? `<div class="mb-3 sm:mb-4 lg:mb-5">
                    ${fieldHasValue(title) ? `<h1 class="${ui.title} text-[clamp(1.55rem,5.6vw,2.2rem)] lg:text-[2.55rem]">${escapeDisplay(title)}</h1>` : ''}
                    ${description ? `<div class="${ui.copy} mt-2 text-[clamp(.92rem,3.7vw,1.05rem)] lg:text-lg">${description}</div>` : ''}
                </div>`
            : '';
        const quizHtml = renderQuizBlock(quizQuestionsFrom(page), {showTitle: false, videoMode: true});
        const hasQuizArea = fieldHasValue(quizHtml);
        const articleWidth = hasQuizArea
            ? 'max-w-[100rem] short:!max-w-[min(100%,90rem)]'
            : 'max-w-[76rem] min-[1536px]:max-w-[82rem] short:!max-w-[min(100%,68rem)]';
        const contentLayout = hasQuizArea
            ? 'pq-video-inner-layout flex min-h-0 flex-col gap-5 sm:gap-5 min-[1280px]:grid min-[1280px]:grid-cols-[minmax(0,1fr)_minmax(12rem,15.5rem)] min-[1280px]:items-start min-[1280px]:gap-4 min-[1536px]:grid-cols-[minmax(0,1fr)_minmax(18rem,24rem)] min-[1536px]:gap-6 2xl:grid-cols-[minmax(0,1fr)_minmax(20rem,25rem)] short:!gap-4'
            : 'pq-video-inner-layout flex flex-col';
        const videoPageState = hasQuizArea ? 'pq-video-has-quiz' : 'pq-video-no-quiz';
        const showCc = flagIsEnabled(page.showCC ?? page.showCc ?? page.cc);
        const videoId = `passingQuestionVideo-${++videoInstanceId}`;

        return `
                <article class="pq-mobile-video-card pq-video-page-layout ${videoPageState} mx-auto flex h-full min-h-0 w-full ${articleWidth} flex-col px-1 text-left sm:px-3 lg:px-5" data-video-page data-video-show-cc="${showCc ? 'true' : 'false'}">
                    ${headingHtml}
                    <div class="${contentLayout}">
                        <div class="pq-video-main-column w-full min-h-0 shrink-0 sm:mx-auto sm:max-w-[86rem] min-[1280px]:mx-0 min-[1280px]:max-w-none">
                            <div class="pq-video-wrap relative aspect-video w-full max-h-[calc(100dvh-13rem)] overflow-hidden rounded-t-[1.05rem] bg-[#090910] shadow-[0_14px_30px_rgba(20,18,48,.16)] ring-1 ring-black/5 max-[520px]:max-h-[min(31dvh,15.8rem)] short:!max-h-[calc(100dvh-13rem)] lg:rounded-t-[1.25rem]" data-video-captions="${captionPayload}">
                                <video
                                    id="${videoId}"
                                    class="video-js vjs-default-skin h-full w-full bg-black object-contain"
                                    controls
                                    playsinline
                                    webkit-playsinline
                                    preload="auto"
                                    disablePictureInPicture
                                    controlsList="nodownload noremoteplayback noplaybackrate"
                                    ${fieldHasValue(page.thumbnail) ? `poster="${escapeHtml(page.thumbnail)}"` : ''}
                                    data-video-src="${escapeHtml(video)}"
                                >
                                    <source src="${escapeHtml(video)}" type="${mediaType(video)}">
                                </video>
                                <div class="pq-video-caption-overlay pointer-events-none absolute left-1/2 bottom-[clamp(.8rem,4%,1.75rem)] z-[80] flex w-[min(90%,54rem)] -translate-x-1/2 justify-center text-center" data-video-caption-overlay aria-live="polite" aria-hidden="true">
                                    <span class="pq-video-caption-text inline-block max-w-full rounded-[.68rem] border border-white/10 bg-slate-950/85 px-[.62rem] py-[.42rem] text-[clamp(.74rem,3vw,.94rem)] font-bold leading-[1.25] text-white opacity-0 shadow-[0_10px_28px_rgba(0,0,0,.3)] backdrop-blur-md transition duration-300 [transform:translateY(10px)_scale(.96)] lg:rounded-[.78rem] lg:px-[.78rem] lg:py-[.48rem] lg:text-[clamp(.82rem,1.05vw,1.04rem)]" data-video-caption-text></span>
                                </div>
                                <p class="hidden bg-amber-50 px-4 py-3 text-sm font-bold text-amber-800" data-video-status></p>
                            </div>
                            ${transcriptHtml(captionLines)}
                        </div>

                        ${hasQuizArea ? `
                            <div class="pq-video-side-column w-full min-h-0 shrink-0 sm:mx-auto sm:max-w-[72rem] min-[1280px]:mx-0 min-[1280px]:max-w-[15.5rem] min-[1536px]:max-w-[24rem] 2xl:max-w-[25rem] short:!max-w-[18.5rem]">
                                ${quizHtml}
                            </div>
                        ` : ''}
                    </div>
                </article>
            `;
    }

    function transcriptRows() {
        return Array.from(els.content.querySelectorAll('[data-transcript-row][data-transcript-start]'));
    }

    function updateTranscriptHighlight(time) {
        const rows = transcriptRows();
        rows.forEach((row, index) => {
            const start = Number(row.dataset.transcriptStart || 0);
            const endRaw = Number(row.dataset.transcriptEnd || 0);
            const nextStart = Number(rows[index + 1]?.dataset.transcriptStart || Number.POSITIVE_INFINITY);
            const end = Number.isFinite(endRaw) && endRaw > start ? endRaw : nextStart;
            const isActive = time >= start && time < end;
            row.classList.toggle('is-active', isActive);
            (isActive ? addClasses : removeClasses)(row, stateClasses.transcriptRowActive);
            row.querySelectorAll('.pq-transcript-time, .pq-transcript-text, .pq-transcript-chevron').forEach((child) => {
                (isActive ? addClasses : removeClasses)(child, stateClasses.transcriptTextActive);
            });
        });

    }

    function videoCaptionLines() {
        const wrap = els.content.querySelector('[data-video-captions]');
        if (!wrap) return [];

        try {
            const parsed = JSON.parse(wrap.getAttribute('data-video-captions') || '[]');
            return Array.isArray(parsed) ? parsed.filter((line) => fieldHasValue(line.text || line.caption)) : [];
        } catch (error) {
            return [];
        }
    }

    function videoCaptionOverlay() {
        const playerOverlay = videoJsPlayer?.el?.()?.querySelector?.('[data-video-caption-overlay]');
        return playerOverlay || els.content.querySelector('[data-video-caption-overlay]');
    }

    function ensureVideoCaptionOverlay() {
        const playerEl = videoJsPlayer?.el?.();
        if (!playerEl) return videoCaptionOverlay();

        let overlay = playerEl.querySelector('[data-video-caption-overlay]');
        if (!overlay) {
            overlay = document.createElement('div');
            overlay.className = 'pq-video-caption-overlay pointer-events-none absolute left-1/2 bottom-[clamp(.8rem,4%,1.75rem)] z-[80] flex w-[min(90%,54rem)] -translate-x-1/2 justify-center text-center';
            overlay.setAttribute('data-video-caption-overlay', '');
            overlay.setAttribute('aria-live', 'polite');
            overlay.setAttribute('aria-hidden', 'true');
            overlay.innerHTML = '<span class="pq-video-caption-text inline-block max-w-full rounded-[.68rem] border border-white/10 bg-slate-950/85 px-[.62rem] py-[.42rem] text-[clamp(.74rem,3vw,.94rem)] font-bold leading-[1.25] text-white opacity-0 shadow-[0_10px_28px_rgba(0,0,0,.3)] backdrop-blur-md transition duration-300 [transform:translateY(10px)_scale(.96)]" data-video-caption-text></span>';
            playerEl.appendChild(overlay);
        }

        return overlay;
    }

    function videoCaptionTextNode(overlay) {
        return overlay?.querySelector?.('[data-video-caption-text]') || overlay || null;
    }

    function videoCcButton() {
        return videoJsPlayer?.el?.()?.querySelector?.('[data-video-cc-button]')
            || els.content.querySelector('[data-video-cc-button]');
    }

    function currentVideoPageRoot() {
        return els.content.querySelector('[data-video-page], [data-short-video-page]');
    }

    function isVideoCcEnabled() {
        return currentVideoPageRoot()?.classList.contains('is-cc-enabled') || false;
    }

    function updateVideoCcButtonState(enabled) {
        const button = videoCcButton();
        if (!button) return;

        button.classList.toggle('is-active', enabled);
        button.setAttribute('aria-pressed', enabled ? 'true' : 'false');
        button.setAttribute('title', enabled ? 'Hide captions' : 'Show captions');
        button.setAttribute('aria-label', enabled ? 'Hide captions' : 'Show captions');
    }

    function setVideoCaptionsEnabled(enabled) {
        const page = currentVideoPageRoot();
        const overlay = ensureVideoCaptionOverlay();
        if (!page || !overlay) return;

        page.classList.toggle('is-cc-enabled', enabled);
        videoJsPlayer?.el?.()?.classList.toggle?.('is-cc-enabled', enabled);
        overlay.setAttribute('aria-hidden', enabled ? 'false' : 'true');
        updateVideoCcButtonState(enabled);

        if (!enabled) {
            const textNode = videoCaptionTextNode(overlay);
            if (textNode) textNode.textContent = '';
            overlay.classList.remove('is-visible');
            return;
        }

        const nativeVideo = els.content.querySelector('video[data-video-src]');
        const currentTime = videoJsPlayer
            ? Number(videoJsPlayer.currentTime() || 0)
            : Number(nativeVideo?.currentTime || 0);
        updateVideoCaptionOverlay(currentTime);
    }

    function updateVideoCaptionOverlay(time) {
        const overlay = ensureVideoCaptionOverlay();
        if (!overlay || !isVideoCcEnabled()) return;

        const rows = videoCaptionLines();
        const current = rows.find((line, index) => {
            const start = Number(line.start ?? 0);
            const endRaw = Number(line.end ?? 0);
            const nextStart = Number(rows[index + 1]?.start ?? Number.POSITIVE_INFINITY);
            const end = Number.isFinite(endRaw) && endRaw > start ? endRaw : nextStart;
            return time >= start && time < end;
        });

        const textNode = videoCaptionTextNode(overlay);
        const text = current ? displayText(current.text || current.caption || '') : '';
        if (textNode) textNode.textContent = text;
        overlay.classList.toggle('is-visible', fieldHasValue(text));
    }

    function ensureVideoFullscreenButton(controlBar) {
        if (!controlBar || !videoJsPlayer) return null;

        let fullscreenButton = controlBar.querySelector('.vjs-fullscreen-control');
        if (fullscreenButton) return fullscreenButton;

        try {
            const controlBarComponent = typeof videoJsPlayer.getChild === 'function'
                ? videoJsPlayer.getChild('controlBar')
                : null;

            if (controlBarComponent && typeof controlBarComponent.addChild === 'function') {
                const childCount = typeof controlBarComponent.children === 'function'
                    ? controlBarComponent.children().length
                    : undefined;

                controlBarComponent.addChild('FullscreenToggle', {}, childCount);
                fullscreenButton = controlBar.querySelector('.vjs-fullscreen-control');
            }
        } catch (error) {
            reportError(error, 'Fullscreen control install failed');
        }

        return fullscreenButton;
    }

    function installVideoCcButton() {
        if (!videoJsPlayer) return;

        videoJsPlayer.ready(() => {
            const playerEl = videoJsPlayer.el?.();
            const controlBar = playerEl?.querySelector?.('.vjs-control-bar');
            if (!controlBar) return;

            controlBar.querySelector('.vjs-picture-in-picture-control')?.remove();

            const fullscreenButton = ensureVideoFullscreenButton(controlBar);
            if (!videoCaptionLines().length) return;

            ensureVideoCaptionOverlay();
            if (controlBar.querySelector('[data-video-cc-button]')) {
                setVideoCaptionsEnabled(currentVideoPageRoot()?.dataset.videoShowCc === 'true');
                return;
            }

            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'vjs-control vjs-button pq-vjs-cc-button';
            button.setAttribute('data-video-cc-button', '');
            button.setAttribute('aria-pressed', 'false');
            button.setAttribute('aria-label', 'Show captions');
            button.setAttribute('title', 'Show captions');
            button.innerHTML = '<span class="vjs-icon-placeholder" aria-hidden="true">CC</span><span class="vjs-control-text" aria-live="polite">Show captions</span>';

            listenPage(button, 'click', (event) => {
                event.preventDefault();
                event.stopPropagation();
                setVideoCaptionsEnabled(!isVideoCcEnabled());
            });

            if (fullscreenButton) controlBar.insertBefore(button, fullscreenButton);
            else controlBar.appendChild(button);

            setVideoCaptionsEnabled(currentVideoPageRoot()?.dataset.videoShowCc === 'true');
        });
    }

    // SECTION: Transcript toggle and transcript-row seeking behavior.
    function bindTranscriptInteractions() {
        const shell = els.content.querySelector('[data-transcript-shell]');
        const toggle = els.content.querySelector('[data-transcript-toggle]');
        const label = els.content.querySelector('[data-transcript-label]');
        const videoPage = els.content.querySelector('[data-video-page]');

        if (!shell || !toggle) return;

        const syncTranscriptState = () => {
            const isOpen = shell.classList.contains('is-open');
            const panel = shell.querySelector('[data-transcript-panel]');
            const icon = shell.querySelector('[data-transcript-icon]');

            if (label) label.textContent = isOpen ? 'Hide transcript' : 'Show transcript';
            if (panel) panel.classList.toggle('hidden', !isOpen);
            if (icon) icon.classList.toggle('rotate-180', isOpen);

            if (videoPage) {
                videoPage.classList.toggle('is-transcript-open', isOpen);
            }

            if (isOpen) {
                const activeRow = shell.querySelector('.pq-transcript-row.is-active');
                activeRow?.scrollIntoView({block: 'nearest'});
            }
        };

        listenPage(toggle, 'click', () => {
            shell.classList.toggle('is-open');
            syncTranscriptState();
        });

        syncTranscriptState();

        els.content.querySelectorAll('[data-transcript-row]').forEach((row) => {
            listenPage(row, 'click', () => {
                const start = Number(row.dataset.transcriptStart || 0);
                if (!Number.isFinite(start)) return;

                if (videoJsPlayer) {
                    try {
                        videoJsPlayer.currentTime(start);
                        videoJsPlayer.play();
                    } catch (error) {
                        reportMediaError(error, 'Transcript seek failed', els.content.querySelector('[data-video-status]'));
                    }
                    return;
                }

                const video = els.content.querySelector('video');
                if (video) {
                    video.currentTime = start;
                    video.play().catch((error) => {
                        reportMediaError(error, 'Transcript seek playback failed', els.content.querySelector('[data-video-status]'));
                    });
                }
            });
        });
    }

    // SECTION: Video.js initialization with native fallback and media error display.
    function setupVideoPlayer() {
        const video = els.content.querySelector('video[data-video-src]');
        if (!video) return;

        const status = els.content.querySelector('[data-video-status]');
        const src = video.dataset.videoSrc || video.querySelector('source')?.getAttribute('src') || '';
        const type = mediaType(src);
        const canUseNativeHls = !!video.canPlayType('application/vnd.apple.mpegurl');

        video.setAttribute('playsinline', '');
        video.setAttribute('webkit-playsinline', '');
        video.preload = 'auto';

        if (window.videojs) {
            try {
                const stalePlayer = typeof window.videojs.getPlayer === 'function' && video.id
                    ? window.videojs.getPlayer(video.id)
                    : null;
                if (stalePlayer && typeof stalePlayer.dispose === 'function') {
                    stalePlayer.dispose();
                }

                videoJsPlayer = window.videojs(video, {
                    controls: true,
                    autoplay: false,
                    bigPlayButton: true,
                    fluid: false,
                    responsive: false,
                    preload: 'auto',
                    inactivityTimeout: 650,
                    controlBar: {
                        pictureInPictureToggle: false,
                        fullscreenToggle: true,
                    },
                    html5: {
                        vhs: {
                            overrideNative: !canUseNativeHls,
                        },
                        nativeAudioTracks: canUseNativeHls,
                        nativeVideoTracks: canUseNativeHls,
                    },
                });

                videoJsPlayer.ready(() => {
                    if (fieldHasValue(src) && typeof videoJsPlayer.src === 'function') {
                        videoJsPlayer.src({src, type});
                        if (typeof videoJsPlayer.load === 'function') videoJsPlayer.load();
                    }
                    installVideoCcButton();
                });

                videoJsPlayer.on('fullscreenchange', () => {
                    const currentTime = Number(videoJsPlayer.currentTime() || 0);
                    updateVideoCaptionOverlay(currentTime);
                });

                videoJsPlayer.on('loadedmetadata', () => {
                    const currentTime = Number(videoJsPlayer.currentTime() || 0);
                    updateTranscriptHighlight(currentTime);
                    updateVideoCaptionOverlay(currentTime);
                });
                videoJsPlayer.on('timeupdate', () => {
                    const currentTime = Number(videoJsPlayer.currentTime() || 0);
                    updateTranscriptHighlight(currentTime);
                    updateVideoCaptionOverlay(currentTime);
                });
                videoJsPlayer.on('error', () => {
                    const error = typeof videoJsPlayer.error === 'function' ? videoJsPlayer.error() : null;
                    if (status) {
                        status.classList.remove('hidden');
                        status.textContent = error?.message || 'Video could not be loaded. Please check the video source.';
                    }
                });
                return;
            } catch (error) {
                reportMediaError(error, 'Video player initialization failed', status);
            }
        }

        if (fieldHasValue(src)) {
            const source = video.querySelector('source');
            if (source) {
                source.setAttribute('src', src);
                source.setAttribute('type', type);
            } else {
                video.src = src;
            }
            try {
                video.load();
            } catch (error) {
                reportMediaError(error, 'Native video load failed', status);
            }
        }

        listenPage(video, 'timeupdate', () => {
            const currentTime = Number(video.currentTime || 0);
            updateTranscriptHighlight(currentTime);
            updateVideoCaptionOverlay(currentTime);
        });
        listenPage(video, 'error', () => {
            if (status) {
                status.classList.remove('hidden');
                status.textContent = 'Video could not be loaded. Please check the video source.';
            }
        });
    }

    // SECTION: Short-video overlay, tap layer, center toggle, and responsive sizing.
    function bindShortVideoOverlay() {
        const overlay = els.content.querySelector('[data-short-video-overlay]');
        const video = els.content.querySelector('video[data-video-src]');
        if (!overlay || !video) return;

        const hideOverlay = () => overlay.classList.add('is-hidden');
        const showOverlay = () => overlay.classList.remove('is-hidden');

        listenPage(overlay, 'click', () => {
            hideOverlay();

            if (videoJsPlayer && typeof videoJsPlayer.play === 'function') {
                attemptPromise(videoJsPlayer.play(), 'short video');
                return;
            }

            try {
                attemptPromise(video.play(), 'short video');
            } catch (error) {
                showOverlay();
            }
        });

        if (videoJsPlayer) {
            videoJsPlayer.on('play', hideOverlay);
            videoJsPlayer.on('playing', hideOverlay);
            videoJsPlayer.on('ended', showOverlay);
            videoJsPlayer.on('error', showOverlay);
            return;
        }

        listenPage(video, 'play', hideOverlay);
        listenPage(video, 'playing', hideOverlay);
        listenPage(video, 'ended', showOverlay);
        listenPage(video, 'error', showOverlay);
    }

    function syncShortVideoSize() {
        const shell = els.content.querySelector('.pq-short-video-shell');
        const stage = els.content.querySelector('.pq-short-video-stage');
        if (!shell || !stage) return;

        const rect = stage.getBoundingClientRect();
        const availableWidth = Math.floor(rect.width);
        const availableHeight = Math.floor(rect.height);
        if (availableWidth <= 0 || availableHeight <= 0) return;

        const ratio = 9 / 16;
        let height = availableHeight;
        let width = height * ratio;

        if (width > availableWidth) {
            width = availableWidth;
            height = width / ratio;
        }

        shell.style.width = `${Math.floor(width)}px`;
        shell.style.height = `${Math.floor(height)}px`;
        shell.style.maxWidth = '100%';
        shell.style.maxHeight = '100%';
    }

    function bindShortVideoCenterToggle() {
        const button = els.content.querySelector('[data-short-video-center-toggle]');
        const icon = els.content.querySelector('[data-short-video-center-icon]');
        const tapLayer = els.content.querySelector('[data-short-video-tap-layer]');
        const video = els.content.querySelector('video[data-video-src]');
        const wrap = els.content.querySelector('.pq-short-video-wrap');
        if (!button || !video) return;

        const isPaused = () => videoJsPlayer ? videoJsPlayer.paused() : video.paused;
        const togglePlayback = () => {
            if (isPaused()) {
                attemptPromise(videoJsPlayer ? videoJsPlayer.play() : video.play(), 'short video');
            } else if (videoJsPlayer) {
                videoJsPlayer.pause();
            } else {
                video.pause();
            }

            sync();
        };

        const sync = () => {
            const paused = isPaused();
            button.classList.toggle('is-playing', !paused);
            button.setAttribute('aria-label', paused ? 'Play video' : 'Pause video');
            icon?.classList.toggle('fa-play', paused);
            icon?.classList.toggle('fa-pause', !paused);
            icon?.classList.toggle('ml-1', paused);
        };

        listenPage(button, 'click', (event) => {
            event.stopPropagation();
            togglePlayback();
        });

        listenPage(tapLayer, 'click', (event) => {
            event.stopPropagation();
            togglePlayback();
        });

        listenPage(wrap, 'click', (event) => {
            if (event.target.closest('button, input, .vjs-control-bar, .vjs-big-play-button, .pq-short-video-overlay')) {
                return;
            }

            togglePlayback();
        });

        if (videoJsPlayer) {
            videoJsPlayer.on('play', sync);
            videoJsPlayer.on('playing', sync);
            videoJsPlayer.on('pause', sync);
            videoJsPlayer.on('ended', sync);
        } else {
            listenPage(video, 'play', sync);
            listenPage(video, 'playing', sync);
            listenPage(video, 'pause', sync);
            listenPage(video, 'ended', sync);
        }

        sync();
    }

    // SECTION: Conversation playback, text reveal, speaker highlighting, and controls.
    function conversationLinesFromRoot(root) {
        if (!root) return [];

        try {
            const raw = root.getAttribute('data-conversation-lines') || '[]';
            const parsed = JSON.parse(raw);
            return Array.isArray(parsed) ? parsed.filter((line) => fieldHasValue(line.text)) : [];
        } catch (error) {
            return [];
        }
    }

    function resetConversationText(root, keepCompleted = false) {
        if (!root) return;

        root.querySelectorAll('[data-conversation-line]').forEach((line) => {
            line.classList.remove('is-active');
            setConversationLineVisualState(line, false);
            if (!keepCompleted) {
                const target = line.querySelector('[data-conversation-text]');
                if (target) target.innerHTML = '';
            }
        });

        root.querySelectorAll('[data-conversation-speaker]').forEach((speaker) => {
            speaker.classList.remove('is-active');
            setConversationSpeakerVisualState(speaker, false);
        });
        root.querySelectorAll('[data-conversation-toggle]').forEach((button) => {
            button.classList.remove('is-playing');
            button.setAttribute('aria-label', 'Play full conversation');
        });
    }

    function setConversationActive(root, side, lineEl = null) {
        if (!root) return;

        root.querySelectorAll('[data-conversation-line]').forEach((line) => {
            const isActive = line === lineEl;
            line.classList.toggle('is-active', isActive);
            setConversationLineVisualState(line, isActive);
        });
        root.querySelectorAll('[data-conversation-speaker]').forEach((speaker) => {
            const isActive = speaker.dataset.conversationSpeaker === side;
            speaker.classList.toggle('is-active', isActive);
            setConversationSpeakerVisualState(speaker, isActive);
        });
        root.querySelectorAll('[data-conversation-toggle]').forEach((button) => {
            const isMobileButton = button.hasAttribute('data-conversation-mobile-button');
            const isActiveBubbleButton = !!lineEl && lineEl.contains(button);
            const shouldAnimate = isMobileButton ? conversationState.running : isActiveBubbleButton;

            button.classList.toggle('is-playing', shouldAnimate);
            button.setAttribute('aria-label', conversationState.running ? 'Stop conversation' : 'Play full conversation');

            if (isActiveBubbleButton || isMobileButton) conversationState.activeButton = button;
        });
    }

    function stopConversation(soft = false) {
        conversationState.stopRequested = true;
        conversationState.running = false;

        if (conversationState.revealTimer) {
            window.clearInterval(conversationState.revealTimer);
            conversationState.revealTimer = null;
        }

        if (conversationState.currentAudio) {
            try {
                conversationState.currentAudio.pause();
                conversationState.currentAudio.currentTime = 0;
            } catch (error) {
                reportError(error, 'Conversation audio cleanup failed');
            }
            conversationState.currentAudio = null;
        }

        if (conversationState.activeRoot) {
            conversationState.activeRoot.classList.add('is-conversation-idle');
            conversationState.activeRoot.querySelectorAll('[data-conversation-toggle]').forEach((button) => {
                button.classList.remove('is-playing');
                button.setAttribute('aria-label', 'Play full conversation');
            });
            resetConversationText(conversationState.activeRoot, soft);
        }

        conversationState.activeRoot = null;
        conversationState.activeButton = null;
    }

    function revealConversationLine(lineEl, mediaAudio) {
        return new Promise((resolve) => {
            if (!lineEl) {
                resolve();
                return;
            }

            const target = lineEl.querySelector('[data-conversation-text]');
            const originalText = lineEl.dataset.lineText || '';
            const originalHtml = escapeHtml(displayText(originalText));
            const plainText = stripHtml(originalHtml);

            if (!target || !plainText.trim()) {
                resolve();
                return;
            }

            target.innerHTML = '';
            let index = 0;
            let finished = false;

            function finish() {
                if (finished) return;
                finished = true;
                if (conversationState.revealTimer) {
                    window.clearInterval(conversationState.revealTimer);
                    conversationState.revealTimer = null;
                }
                target.innerHTML = originalHtml;
                resolve();
            }

            conversationState.revealTimer = window.setInterval(() => {
                if (conversationState.stopRequested) {
                    finish();
                    return;
                }

                index = Math.min(plainText.length, index + 1);
                target.innerHTML = buildPartialHtml(originalHtml, index)
                    + (index < plainText.length ? '<span class="pq-reveal-caret" aria-hidden="true">▍</span>' : '');

                const mediaUnavailable = !mediaAudio
                    || mediaAudio.pqPlayFailed
                    || !Number.isFinite(mediaAudio.duration)
                    || mediaAudio.duration <= 0;

                if (index >= plainText.length && (mediaUnavailable || mediaAudio.ended)) {
                    finish();
                }
            }, 40);

            if (mediaAudio) {
                mediaAudio.addEventListener('ended', finish, {once: true});
                mediaAudio.addEventListener('error', finish, {once: true});
            }
        });
    }

    async function playConversation(root, button) {
        if (!root || !button || conversationState.running) return;

        stopAudio();
        stopConversation(false);

        const dialogueLines = conversationLinesFromRoot(root);
        if (!dialogueLines.length) return;

        conversationState.running = true;
        conversationState.stopRequested = false;
        conversationState.activeRoot = root;
        conversationState.activeButton = button;
        root.classList.remove('is-conversation-idle');
        resetConversationText(root, false);
        root.querySelectorAll('[data-conversation-toggle]').forEach((control) => {
            control.classList.remove('is-playing');
            control.setAttribute('aria-label', 'Stop conversation');
        });

        for (const dialogueLine of dialogueLines) {
            if (conversationState.stopRequested) break;

            const side = dialogueLine.side || 'left';
            const lineEl = root.querySelector(`[data-conversation-line][data-side="${side === 'right' ? 'right' : 'left'}"]`);
            if (!lineEl) continue;

            const speakerLabel = lineEl.querySelector('[data-conversation-speaker-name]');
            if (speakerLabel) speakerLabel.textContent = displayText(dialogueLine.speaker || speakerLabel.textContent);

            lineEl.dataset.lineText = dialogueLine.text || '';
            lineEl.dataset.lineSound = dialogueLine.sound || '';

            setConversationActive(root, side, lineEl);

            if (fieldHasValue(dialogueLine.sound)) {
                const lineAudio = new Audio(dialogueLine.sound);
                conversationState.currentAudio = lineAudio;

                const revealPromise = revealConversationLine(lineEl, lineAudio);

                try {
                    await lineAudio.play();
                } catch (error) {
                    lineAudio.pqPlayFailed = true;
                    reportMediaError(error, 'Conversation audio playback failed');
                    lineAudio.dispatchEvent(new Event('error'));
                }

                await revealPromise;
                conversationState.currentAudio = null;
            } else {
                await revealConversationLine(lineEl, null);
            }

            if (conversationState.stopRequested) break;
            await waitPageDelay(420);
        }

        if (!conversationState.stopRequested) {
            conversationState.running = false;
            root.classList.add('is-conversation-idle');
            resetConversationText(root, true);
            conversationState.activeRoot = null;
            conversationState.activeButton = null;
        }
    }

    function bindConversationInteractions() {
        els.content.querySelectorAll('[data-conversation-page]').forEach((root) => {
            const buttons = Array.from(root.querySelectorAll('[data-conversation-toggle]'));
            if (!buttons.length) return;

            buttons.forEach((button) => {
                listenPage(button, 'click', () => {
                    if (conversationState.running && conversationState.activeRoot === root) {
                        stopConversation(true);
                        return;
                    }

                    playConversation(root, button);
                });
            });
        });
    }

    function attemptPromise(promise, label = 'media', statusTarget = null) {
        if (promise && typeof promise.catch === 'function') {
            promise.catch((error) => {
                const target = statusTarget || els.content.querySelector('[data-video-status]');
                reportMediaError(error, `${label} playback was blocked or failed`, target);
            });
        }
    }

    function autoplayCurrentPageMedia() {
        const pageAtRequest = currentPage();

        setPageTimeout(() => {
            if (currentPage() !== pageAtRequest) return;

            const conversationButton = els.content.querySelector('[data-conversation-toggle]');
            if (conversationButton) {
                conversationButton.click();
                return;
            }

            if (videoJsPlayer || els.content.querySelector('video[data-video-src]')) return;


            const sharedQuizAudioPlayer = els.content.querySelector('[data-quiz-audio-player][data-quiz-audio-scope="page"]');
            if (sharedQuizAudioPlayer) {
                playQuizAudioPlayer(sharedQuizAudioPlayer, {forcePlay: true});
                return;
            }

            const currentQuizAudioPlayer = els.content.querySelector('[data-quiz-item].is-current [data-quiz-audio-player]');
            if (currentQuizAudioPlayer) {
                playQuizAudioPlayer(currentQuizAudioPlayer, {forcePlay: true});
                return;
            }

            const firstAudioButton = els.content.querySelector('[data-audio-button]');
            if (firstAudioButton) {
                playAudioButton(firstAudioButton);
            }
        }, 260);
    }

    // SECTION: Progress bar, keyboard, buttons, and swipe navigation.

@endif
