@if($sectionStyles ?? false)
    <style>
        /* Quiz and practice-game activity styles. */
        .pq-quiz-option.is-correct::after,
        .pq-quiz-option.is-wrong::after {
            display: inline-flex;
            margin-left: .45rem;
            font-size: .82em;
            font-weight: 800;
            line-height: 1;
            vertical-align: middle;
        }

        .pq-quiz-option.is-correct::after {
            content: "✓";
        }

        .pq-quiz-option.is-wrong::after {
            content: "Try again";
        }

        .pq-quiz-option:disabled:not(.is-correct) {
            opacity: .62; 
        }

        .pq-quiz-item { 
            display: none;
        }

        .pq-quiz-item.is-current {
            display: block;
            animation: pqPageIn 300ms var(--pq-ease) both;  
        }
    </style>
@else
{{-- Activity functions: quizzes and practice games. --}}
{{-- Shared practice state and activity-game helpers. --}}
    const practiceState = {
        pageKey: '',
        stepIndex: 0,
    };

    function isPracticePage(page = {}) {
        return page?.type === 'practice';
    }

    function practicePageKey(page = {}) {
        return `${page?.type || 'practice'}:${page?.title || page?.label || ''}`;
    }

    function practiceSteps(page = {}) {
        const activity = page.activity || page;
        return Array.isArray(activity.items) && activity.items.length ? activity.items : [activity];
    }

    function syncPracticeState(page = {}) {
        const key = practicePageKey(page);
        if (practiceState.pageKey !== key) {
            practiceState.pageKey = key;
            practiceState.stepIndex = 0;
        }

        const total = practiceSteps(page).length;
        practiceState.stepIndex = Math.max(0, Math.min(Math.max(0, total - 1), practiceState.stepIndex));
    }

    function normalizeQuizQuestion(item = {}, index = 0) {
        const options = Array.isArray(item.options) ? item.options : [];
        const rawType = String(item.type || '').toLowerCase();
        const rawCorrect = item.correct_answer ?? item.correctAnswer ?? item.correct ?? item.answer ?? 0;
        const acceptedRaw = item.accepted_answers ?? item.acceptedAnswers ?? item.accepted ?? item.correct ?? rawCorrect;
        const acceptedAnswers = (Array.isArray(acceptedRaw) ? acceptedRaw : [acceptedRaw])
            .filter(fieldHasValue)
            .map((answer) => String(answer).trim());

        let correctAnswer = Number(rawCorrect);

        if ((!Number.isFinite(correctAnswer) || correctAnswer < 0) && options.length) {
            const normalizedCorrect = String(rawCorrect ?? '').trim().toLowerCase();
            correctAnswer = options.findIndex((option) => String(option).trim().toLowerCase() === normalizedCorrect);
        }

        if (!Number.isFinite(correctAnswer) || correctAnswer < 0) correctAnswer = 0;

        const isInput = rawType === 'input' || (!options.length && acceptedAnswers.length > 0);
        const questionText = item.prompt || item.question || item.title || `Question ${index + 1}`;
        const emoji = fieldHasValue(item.emoji) ? String(item.emoji).trim() : '';
        const image = item.image || item.media_image || item.mediaImage || item.thumbnail || item.poster || '';
        const audioSrc = item.audio || item.sound || item.media_audio || item.mediaAudio || '';

        return {
            type: isInput ? 'input' : 'multiple_choice',
            emoji,
            image,
            audio: audioSrc,
            question: questionText,
            displayQuestion: emoji ? `${emoji} ${questionText}` : questionText,
            options,
            correctAnswer,
            acceptedAnswers,
        };
    }

    function quizQuestionsFrom(page = {}) {
        if (Array.isArray(page.quiz) && page.quiz.length) {
            return page.quiz
                .map(normalizeQuizQuestion)
                .filter((item) => item.type === 'input' || item.options.length > 1);
        }

        if (Array.isArray(page.questions) && page.questions.length) {
            return page.questions
                .map(normalizeQuizQuestion)
                .filter((item) => item.type === 'input' || item.options.length > 1);
        }

        if (Array.isArray(page.options) && page.options.length > 1) {
            return [normalizeQuizQuestion(page, 0)];
        }

        return [];
    }

    function quizMediaHtml(item = {}, options = {}) {
        if (!options.showMedia) return '';

        const image = item.image || options.mediaImage || '';
        const emoji = item.emoji || options.mediaEmoji || '';
        const mediaLabel = item.question || options.title || 'Quiz media';
        const splitMedia = Boolean(options.splitMedia);

        if (fieldHasValue(image)) {
            return `
                    <div class="pq-quiz-media mb-4 aspect-video w-full overflow-hidden rounded-[1.15rem] border border-[#eceafa] bg-[#090910] shadow-[0_16px_36px_rgba(20,18,48,.16)] ring-1 ring-black/5 sm:mb-5 ${splitMedia ? 'lg:mb-0 lg:min-h-[15.5rem] min-[1536px]:min-h-[18rem]' : ''}">
                        <img class="h-full w-full ${contentImageFitClass('learning')} object-center" src="${escapeHtml(image)}" alt="${escapeHtml(mediaLabel)}" loading="lazy" decoding="async">
                    </div>
                `;
        }

        if (fieldHasValue(emoji)) {
            return `
                    <div class="pq-quiz-emoji-media mb-3 flex justify-start sm:mb-4" aria-label="${escapeHtml(mediaLabel)}">
                        <div class="inline-flex min-h-[3.4rem] max-w-full items-center justify-center rounded-[1rem] border border-[#eceafa] bg-gradient-to-br from-[#f7f6ff] via-white to-[#eef3ff] px-4 py-3 shadow-[0_10px_24px_rgba(91,80,220,.10)] sm:min-h-[3.85rem] sm:px-5 sm:py-3.5 lg:min-h-[4.1rem] lg:px-6">
                            <span class="text-[clamp(2.05rem,8vw,3.35rem)] leading-none drop-shadow-[0_8px_18px_rgba(91,80,220,.14)]" aria-hidden="true">${escapeHtml(emoji)}</span>
                        </div>
                    </div>
                `;
        }

        return '';
    }

    function quizPromptEmojiHtml(item = {}, options = {}) {
        const emoji = firstEmoji(item.emoji || options.mediaEmoji || '💡✨');
        const mediaLabel = item.question || options.title || 'Practice prompt';

        return `
                    <span class="pq-quiz-prompt-emoji inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-[.9rem] border border-[#eceafa] bg-gradient-to-br from-[#f7f6ff] via-white to-[#eef3ff] text-[1.7rem] leading-none shadow-[0_8px_18px_rgba(91,80,220,.08)] sm:h-14 sm:w-14 sm:text-[1.95rem]" aria-label="${escapeHtml(mediaLabel)}" role="img">${escapeHtml(emoji)}</span>
                `;
    }

    function quizAudioPlayerHtml(item = {}) {
        if (!fieldHasValue(item.audio)) return '';

        const isAssessmentAudio = item.scope === 'assessment';
        const playerClass = isAssessmentAudio
            ? 'mx-auto mb-4 w-full rounded-[1rem] border border-[#e4e7f2] bg-white/92 px-3 py-3 shadow-[0_10px_24px_rgba(38,43,84,.05)] sm:px-4'
            : 'mx-auto mb-4 w-full rounded-[1.05rem] border border-[#eceafa] bg-white/88 px-3 py-3 shadow-[0_10px_24px_rgba(38,35,92,.07)] sm:mb-5 sm:px-4 md:px-5 md:py-4';
        const utilityButtonClass = isAssessmentAudio
            ? 'inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-[#e4e7f2] bg-[#fbfbff] text-[#554bd2] shadow-[0_6px_14px_rgba(91,80,220,.07)] sm:h-10 sm:w-10'
            : 'inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-[#e3e0fb] bg-[#fbfbff] text-[#554bd2] shadow-[0_8px_18px_rgba(91,80,220,.10)]';
        const toggleButtonClass = isAssessmentAudio
            ? `${ui.audioButton} !h-12 !w-12 shadow-[0_10px_22px_rgba(91,80,220,.22)]`
            : `${ui.audioButton} !h-[3.15rem] !w-[3.15rem]`;

        return `
                <div class="${playerClass}" data-quiz-audio-player data-quiz-audio-scope="${escapeHtml(item.scope || 'question')}" data-audio-src="${escapeHtml(item.audio)}">
                    <div class="flex items-center gap-3">
                        <button type="button" class="${utilityButtonClass}" data-quiz-audio-back aria-label="Go back 10 seconds">
                            <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
                        </button>

                        <button type="button" class="${toggleButtonClass}" data-quiz-audio-toggle aria-label="Play question audio">
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

                        <button type="button" class="${utilityButtonClass}" data-quiz-audio-forward aria-label="Go forward 10 seconds">
                            <i class="fa-solid fa-rotate-right" aria-hidden="true"></i>
                        </button>

                        <div class="min-w-0 flex-1">
                            <div class="relative h-2 cursor-pointer overflow-hidden rounded-full bg-[#eceafd]" data-quiz-audio-track aria-label="Audio progress">
                                <div class="h-full w-0 rounded-full bg-gradient-to-r from-[#7c7ff6] to-[#ff8a7a] transition-[width] duration-100" data-quiz-audio-fill></div>
                            </div>
                            <div class="mt-1 flex justify-between text-[.68rem] font-bold tabular-nums text-[#70748a]">
                                <span data-quiz-audio-current>00:00</span>
                                <span data-quiz-audio-total>00:00</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
    }

    function renderQuizBlock(items, options = {}) {
        const questions = items
            .map(normalizeQuizQuestion)
            .filter((item) => item.type === 'input' || item.options.length > 1);

        if (!questions.length) return '';

        const showTitle = Boolean(options.showTitle);
        const title = fieldHasValue(options.title) ? options.title : '';
        const sharedAudio = options.sharedAudio || '';
        const hasImageMedia = questions.some((item) => fieldHasValue(item.image)) || fieldHasValue(options.mediaImage);
        const isVideoMode = Boolean(options.videoMode);
        const sectionWidth = isVideoMode
            ? 'max-w-[42rem] min-[1280px]:max-w-[18rem] min-[1536px]:max-w-[24rem] short:!max-w-[18rem]'
            : 'max-w-[76rem]';
        const sectionOffset = '';

        return `
                <section class="pq-quiz-block mx-auto w-full ${sectionWidth} ${sectionOffset} text-left" data-quiz-block>
                    ${showTitle ? `<h1 class="${ui.title} mb-4 text-[clamp(1.65rem,5.5vw,2.45rem)] lg:mb-6 lg:text-[2.65rem]">${escapeDisplay(title)}</h1>` : ''}
                    ${questions.map((item, questionIndex) => {
            const imageSrc = item.image || options.mediaImage || '';
            const hasQuestionAudio = fieldHasValue(item.audio);
            const splitMedia = options.showMedia && fieldHasValue(imageSrc) && !fieldHasValue(item.audio);
            const hasSharedAudio = fieldHasValue(sharedAudio);
            const shouldShowPromptEmoji = !isVideoMode && options.showMedia && !fieldHasValue(imageSrc) && !hasQuestionAudio && !hasSharedAudio;
            const mediaHtml = hasQuestionAudio
                ? quizAudioPlayerHtml(item)
                : shouldShowPromptEmoji
                    ? ''
                    : quizMediaHtml(item, {...options, splitMedia});
            const promptEmojiHtml = shouldShowPromptEmoji ? quizPromptEmojiHtml(item, options) : '';
            const sharedAudioHtml = !hasQuestionAudio && hasSharedAudio
                ? quizAudioPlayerHtml({audio: sharedAudio, scope: 'page'})
                : '';
            const shouldLeadWithAudio = !isVideoMode && !splitMedia && (hasQuestionAudio || hasSharedAudio);
            const leadingAudioHtml = shouldLeadWithAudio
                ? (hasQuestionAudio ? mediaHtml : sharedAudioHtml)
                : '';
            const trailingSharedAudioHtml = shouldLeadWithAudio ? '' : sharedAudioHtml;
            const trailingMediaHtml = shouldLeadWithAudio && hasQuestionAudio ? '' : mediaHtml;
            const contentClass = splitMedia ? 'min-w-0' : '';
            const layoutClass = splitMedia
                ? 'mx-auto w-full max-w-[56rem] xl:max-w-[64rem] min-[1536px]:max-w-[70rem] 2xl:max-w-[76rem]'
                : '';
            const hasManyOptions = item.options.length >= 6;
            const splitMediaGridClass = splitMedia
                ? 'grid gap-4 lg:grid-cols-2 lg:items-start lg:gap-5 min-[1536px]:gap-6'
                : '';
            const questionClass = isVideoMode
                ? 'pq-quiz-question ' + ui.title + ' mb-3 text-[clamp(1.08rem,4.7vw,1.28rem)] leading-[1.08] tracking-[-.035em] min-[1280px]:text-[clamp(1.2rem,1.55vw,1.65rem)] min-[1536px]:text-[1.8rem] short:!mb-2 short:!text-[clamp(1rem,1.55vw,1.22rem)]'
                : splitMedia
                    ? 'pq-quiz-question ' + ui.title + ' mb-4 break-words text-[clamp(1.32rem,4.6vw,1.95rem)] leading-[1.12] sm:mb-5 lg:mb-5 lg:text-[2.2rem] lg:leading-[1.05]'
                    : 'pq-quiz-question ' + ui.title + ' mb-4 break-words text-[clamp(1.25rem,5vw,1.85rem)] leading-[1.12] sm:mb-5 lg:text-[2.15rem] lg:leading-[1.06]';
            const optionGridClass = isVideoMode
                ? 'grid grid-cols-1 gap-[.48rem]'
                : splitMedia
                    ? `grid grid-cols-1 gap-3 lg:gap-3.5 ${hasManyOptions ? 'lg:grid-cols-2' : ''}`
                    : 'grid grid-cols-1 gap-2.5 sm:gap-3 lg:gap-4';
            const optionClass = isVideoMode ? ui.videoOption : ui.option;
            return `
                        <article
                            class="pq-quiz-item ${questionIndex === 0 ? 'is-current' : ''}"
                            data-quiz-item
                            data-quiz-index="${questionIndex}"
                            data-quiz-type="${escapeHtml(item.type)}"
                            data-correct-answer="${escapeHtml(item.correctAnswer)}"
                            data-accepted-answers="${escapeHtml(JSON.stringify(item.acceptedAnswers))}"
                        >
                            <div class="${layoutClass}">
                                ${splitMedia ? `
                                    <h2 class="${questionClass}">${escapeDisplay(item.question)}</h2>
                                    <div class="${splitMediaGridClass}">
                                        <div class="min-w-0">
                                            ${sharedAudioHtml}
                                            ${mediaHtml}
                                        </div>
                                        <div class="${contentClass}">
                                            <div class="${optionGridClass}" role="group" aria-label="${escapeHtml(item.question)}">
                                                ${item.options.map((option, optionIndex) => {
                return `<button type="button" class="${optionClass}" data-quiz-option data-option-index="${optionIndex}">${escapeDisplay(option)}</button>`;
            }).join('')}
                                            </div>
                                        </div>
                                    </div>
                                ` : `
                                    <div class="${contentClass}">
                                        ${leadingAudioHtml}
                                        ${promptEmojiHtml
                    ? `<div class="mb-4 flex items-center gap-3 sm:mb-5">${promptEmojiHtml}<h2 class="${questionClass} !mb-0 min-w-0">${escapeDisplay(item.question)}</h2></div>`
                    : `<h2 class="${questionClass}">${escapeDisplay(item.question)}</h2>`}
                                        ${trailingSharedAudioHtml}
                                        ${trailingMediaHtml}
                                        ${item.type === 'input' ? `
                                            <div class="grid gap-3">
                                                <input
                                                    type="text"
                                                    class="min-h-[3rem] w-full rounded-[.95rem] border-2 border-[#eceafa] bg-white px-4 text-[1rem] font-bold text-[#242538] shadow-[0_4px_0_rgba(102,93,232,.06)] outline-none placeholder:text-[#b8b8c9] focus:border-[#766cff] focus:ring-4 focus:ring-[#766cff]/10 lg:min-h-[3.35rem]"
                                                    data-quiz-input
                                                    placeholder="Type your answer..."
                                                    autocomplete="off"
                                                >
                                                <button type="button" class="pq-action-button relative flex min-h-[2.95rem] items-center justify-center gap-2 overflow-hidden rounded-[1rem] border border-transparent bg-gradient-to-br from-[#546be6] via-[#6258e4] to-[#6b4ed5] px-4 text-[.9rem] font-bold text-white shadow-[0_12px_28px_rgba(91,80,220,.24)] hover:from-[#4f63dc] hover:via-[#5b51d8] hover:to-[#6046c8] lg:min-h-[3.25rem]" data-quiz-submit>
                                                    Check
                                                    <i class="fa-solid fa-check" aria-hidden="true"></i>
                                                </button>
                                                <p class="hidden text-sm font-bold" data-quiz-feedback aria-live="polite"></p>
                                            </div>
                                        ` : `
                                            <div class="${optionGridClass}" role="group" aria-label="${escapeHtml(item.question)}">
                                                ${item.options.map((option, optionIndex) => {
                return `<button type="button" class="${optionClass}" data-quiz-option data-option-index="${optionIndex}">${escapeDisplay(option)}</button>`;
            }).join('')}
                                            </div>
                                        `}
                                    </div>
                                `}
                            </div>
                        </article>
                    `;
        }).join('')}
                    <div class="hidden rounded-[1.25rem] border border-[#eceafa] bg-gradient-to-br from-white via-[#fbfbff] to-[#f3f1ff] px-5 py-8 text-center shadow-[0_14px_32px_rgba(91,80,220,.10)] sm:px-7 lg:px-10 lg:py-12" data-quiz-complete>
                        <div class="text-[clamp(3rem,16vw,5.5rem)] leading-none" aria-hidden="true">🎉</div>
                        <h2 class="${ui.title} mt-3 text-[clamp(1.6rem,6vw,2.35rem)]">Nice work!</h2>
                        <p class="mx-auto mt-2 max-w-md text-[clamp(.95rem,3.8vw,1.1rem)] font-bold leading-snug text-[#70748a]">You finished this practice</p>
                    </div>
                </section>
            `;
    }

    function renderQuizPage(page) {
        const title = fieldHasValue(page.title) ? page.title : '';
        const mediaImage = page.image || page.media_image || page.mediaImage || page.thumbnail || '';
        const mediaEmoji = page.emoji || page.emojis || '';

        return `
            <article class="pq-quiz-page mx-auto flex min-h-full w-full max-w-[76rem] flex-col justify-start px-1 pt-0 pb-2 text-left mobileShort:pb-1 sm:px-3 sm:pt-1 sm:pb-5 lg:px-5 lg:pt-2 lg:pb-6 laptop:!pt-1 laptop:!pb-3 short:!pt-0 short:!pb-2">
                ${renderQuizBlock(quizQuestionsFrom(page), {
            showTitle: fieldHasValue(title),
            title,
            showMedia: true,
            mediaImage,
            mediaEmoji,
            sharedAudio: page.audio || page.sound || page.media_audio || page.mediaAudio || '',
        })}
            </article>
        `;
    }

    function assessmentPassageHtml(passage, extraClass = '') {
        const lines = String(passage || '')
            .split(/\r?\n/)
            .map((line) => line.trim())
            .filter(Boolean);

        if (!lines.length) return '';

        const hasTitle = lines.length > 1;
        const title = hasTitle ? lines[0] : '';
        const bodyLines = hasTitle ? lines.slice(1) : lines;

        return `
            <article class="${extraClass} max-h-none overflow-visible rounded-[1.05rem] border border-[#e1dcff] bg-white px-4 py-3 text-[#62677b] shadow-[0_10px_24px_rgba(38,43,84,.045)] md:overflow-y-auto">
                ${title ? `<h2 class="mb-3 text-[1.08rem] font-bold leading-tight text-[#242538]">${escapeDisplay(title)}</h2>` : ''}
                <div class="space-y-3 text-[.94rem] font-semibold leading-[1.62]">
                    ${bodyLines.map((line) => `<p>${escapeDisplay(line)}</p>`).join('')}
                </div>
            </article>
        `;
    }

    function assessmentStepBadgeHtml(label) {
        if (!fieldHasValue(label)) return '';

        return `<div class="inline-flex h-7 shrink-0 items-center rounded-full border border-[#DED8FF] bg-[#F8F6FF] px-2.5 text-[.78rem] font-bold leading-none text-[#6254F5] sm:h-8 sm:px-3 sm:text-sm">${escapeDisplay(label)}</div>`;
    }

    function renderAssessmentChoice(activity, index) {
        const audio = fieldHasValue(activity.audio)
            ? quizAudioPlayerHtml({audio: activity.audio, scope: 'assessment'})
            : '';
        const options = Array.isArray(activity.options) ? activity.options : [];
        const optionGridClass = options.length > 6
            ? 'grid grid-cols-1 gap-2.5 sm:gap-3 md:grid-cols-2'
            : 'grid grid-cols-1 gap-2.5 sm:gap-3';
        const passage = fieldHasValue(activity.passage)
            ? assessmentPassageHtml(activity.passage, 'mb-4 md:max-h-[13rem]')
            : '';
        const hasCorrectAnswer = activity.correct_answer !== undefined || activity.correctAnswer !== undefined || activity.correct !== undefined || activity.answer !== undefined;
        const correctAnswer = hasCorrectAnswer
            ? Number(activity.correct_answer ?? activity.correctAnswer ?? activity.correct ?? activity.answer)
            : null;

        return `
            ${passage}
            ${audio}
            <div class="mb-3 flex items-center justify-between gap-3 lg:mb-4">
                <h2 class="${ui.title} min-w-0 text-[clamp(1.28rem,5vw,2rem)] leading-[1.08] lg:text-[2.05rem]">${escapeDisplay(activity.question || 'Choose the best answer.')}</h2>
                ${assessmentStepBadgeHtml(activity.stepLabel)}
            </div>
            <div class="${optionGridClass}" role="group" ${Number.isFinite(correctAnswer) ? `data-correct-answer="${correctAnswer}"` : ''}>
                ${options.map((option, optionIndex) => `
                    <button type="button" class="${ui.option}" data-assessment-choice data-option-index="${optionIndex}">
                        ${escapeDisplay(option)}
                    </button>
                `).join('')}
            </div>
        `;
    }

    function renderAssessmentTyping(activity) {
        const firstWordPart = (value) => {
            const text = String(value || '').toLowerCase();
            if (!text) return text;
            return text.charAt(0).toUpperCase() + text.slice(1);
        };
        const restWordPart = (value) => String(value || '').toLowerCase();
        const audio = fieldHasValue(activity.audio)
            ? quizAudioPlayerHtml({audio: activity.audio, scope: 'assessment'})
            : '';
        const items = Array.isArray(activity.items) ? activity.items : [];
        const typingGridClass = items.length > 6
            ? 'grid w-full grid-cols-1 gap-2.5 sm:gap-3 md:grid-cols-2'
            : 'grid w-full grid-cols-1 gap-2.5 sm:gap-3';

        return `
            ${audio}
            <div class="mb-3 flex w-full items-center justify-between gap-3">
                <h2 class="${ui.title} min-w-0 text-[clamp(1.25rem,4.8vw,2rem)] leading-[1.08]">${escapeDisplay(activity.instruction || 'Complete the words.')}</h2>
                ${assessmentStepBadgeHtml(activity.stepLabel)}
            </div>
            <div class="${typingGridClass}">
                ${items.map((item, index) => {
                    const answer = String(item.answer || '');
                    const missingLength = Math.max(1, Array.from(answer).length);
                    const inputWidth = Math.min(8.5, Math.max(2.4, missingLength * .92 + 1.15));

                    return `
                    <label class="flex min-h-[2.95rem] items-center gap-3 rounded-[1rem] border border-[#e4e1fb] bg-white px-4 py-2.5 text-[#55596a] shadow-[0_6px_14px_rgba(38,43,84,.04)] transition focus-within:border-[#c9c1ff] focus-within:ring-4 focus-within:ring-[#766cff]/10 sm:min-h-[3.2rem]">
                        ${fieldHasValue(item.image) ? `<img class="h-14 w-14 shrink-0 rounded-xl object-cover ring-1 ring-[#e4e7f2] sm:h-16 sm:w-16" src="${escapeHtml(item.image)}" alt="" loading="lazy" decoding="async">` : ''}
                        <span class="min-w-0 normal-case text-[.98rem] font-bold leading-snug sm:text-[1.04rem]">
                            ${escapeHtml(firstWordPart(item.before))}<input type="text" maxlength="${missingLength}" autocomplete="off" spellcheck="false" class="mx-1 inline-flex h-7 rounded-none border-0 border-b-2 border-dashed border-[#B9AEFF] bg-transparent px-1 text-center text-[.98rem] font-bold normal-case leading-none text-[#554bd2] outline-none focus:border-[#6254F5] focus:ring-0 sm:text-[1.04rem]" style="width: ${inputWidth}rem;" aria-label="Blank ${index + 1}" data-assessment-typing-input data-correct-value="${escapeHtml(answer)}">${escapeHtml(restWordPart(item.after))}
                        </span>
                    </label>
                `;
                }).join('')}
            </div>
        `;
    }

    function renderAssessmentWordBank(activity) {
        let slotIndex = 0;
        const answers = Array.isArray(activity.answers) ? activity.answers : [];
        const isReadingActivity = String(activity.sectionTitle || activity.instruction || '').toLowerCase().includes('read');
        const activityTitle = activity.title || (isReadingActivity ? 'Complete the notes' : 'Complete the dialogue');
        const audio = fieldHasValue(activity.audio)
            ? quizAudioPlayerHtml({audio: activity.audio, scope: 'assessment'})
            : '';
        const textPart = (value, isFirstPart = false) => {
            const text = String(value || '');
            if (isFirstPart) return displayText(text);

            return text.replace(/^(\s*)([A-ZÀ-ÖØ-Þ])/u, (_, prefix, letter) => {
                return prefix + letter.toLocaleLowerCase();
            });
        };
        const speakerNames = Array.from(new Set((activity.template || [])
            .map((row) => String(row.speaker || '').trim())
            .filter(Boolean)
            .map((speaker) => speaker.toLowerCase())));
        const purpleSpeakerHints = ['agent', 'receptionist', 'salesperson', 'doctor', 'operator', 'teacher', 'clerk', 'staff'];
        const orangeSpeakerHints = ['customer', 'guest', 'passenger', 'patient', 'client', 'caller', 'student', 'traveller', 'traveler'];
        const speakerToneMap = new Map(speakerNames.map((speaker, index) => {
            const isOrange = orangeSpeakerHints.some((name) => speaker.includes(name));
            const isPurple = purpleSpeakerHints.some((name) => speaker.includes(name));
            return [speaker, isOrange ? 'orange' : isPurple ? 'purple' : index % 2 === 1 ? 'orange' : 'purple'];
        }));

        const rows = (activity.template || []).map((row) => {
            const text = String(row.text || '');
            const parts = text.split('{blank}');
            const speakerName = String(row.speaker || '');
            const speakerKey = speakerName.toLowerCase();
            const isOrangeSpeaker = speakerToneMap.get(speakerKey) === 'orange';
            const speakerTextClass = isOrangeSpeaker ? 'text-[#FF7A2A]' : 'text-[#6254F5]';
            const speakerLabel = speakerName
                ? `<span class="mr-1.5 inline font-bold ${speakerTextClass}">${escapeDisplay(speakerName)}:</span>`
                : '';
            const line = parts.map((part, index) => {
                if (index === parts.length - 1) return escapeHtml(textPart(part, index === 0));
                const currentSlot = slotIndex++;
                const correctValue = answers[currentSlot] || '';
                return `${escapeHtml(textPart(part, index === 0))}<button type="button" class="mx-0.5 inline-flex h-[1.55rem] min-w-[3.1rem] items-center justify-center rounded-full border-[1.5px] border-dashed border-[#B9AEFF] bg-[#F8F6FF] px-2.5 text-[12.5px] font-bold leading-none text-[#5B4DFF] align-middle outline-none transition hover:border-[#6254F5] hover:shadow-[0_0_0_3px_rgba(98,84,245,.10)] focus-visible:border-[#6254F5] focus-visible:ring-4 focus-visible:ring-[#6254F5]/15 sm:min-w-[3.35rem] md:h-[1.7rem] md:min-w-[3.75rem] md:px-3 md:text-[13px]" data-assessment-slot data-slot-index="${currentSlot}" data-correct-value="${escapeHtml(correctValue)}" aria-label="Blank ${currentSlot + 1}"></button>`;
            }).join('');

            return `
                <p class="text-[14.5px] font-semibold leading-[30px] text-[#343747] md:text-[15.5px] md:leading-[32px] xl:text-[1.04rem] xl:leading-[2.25rem]">
                    ${speakerLabel}${line}
                </p>
            `;
        }).join('');

        return `
            ${audio}
            ${fieldHasValue(activity.passage) ? assessmentPassageHtml(activity.passage, 'mb-4 md:max-h-[16rem]') : ''}
            <div class="mx-auto w-full max-w-[76rem] min-[1536px]:max-w-[82rem]">
                <div class="mb-3 md:mb-4">
                    <div class="flex items-center justify-between gap-3">
                        <h2 class="min-w-0 text-[clamp(1.35rem,5vw,1.9rem)] font-bold leading-[1.08] tracking-[-.025em] text-[#252640]">${activityTitle}</h2>
                        ${assessmentStepBadgeHtml(activity.stepLabel)}
                    </div>
                    <div class="mt-3 flex flex-wrap gap-1.5 md:mt-4 md:gap-2" data-assessment-bank>
                        ${(activity.bank || []).map((word, wordIndex) => {
                            return `<button type="button" class="inline-flex min-h-[2.45rem] items-center rounded-full border border-[#DED8FF] bg-white px-3.5 py-1.5 text-[.84rem] font-bold leading-none text-[#6254F5] shadow-[0_6px_14px_rgba(91,80,220,.05)] transition hover:border-[#B9AEFF] hover:bg-[#F8F6FF] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[#6254F5]/15 md:min-h-[2.55rem] md:px-4 md:text-[.88rem]" data-assessment-chip data-chip-value="${escapeHtml(word)}" aria-label="Use ${escapeHtml(word)}">${escapeDisplay(word)}</button>`;
                        }).join('')}
                    </div>
                </div>
                <div class="rounded-[1.05rem] border border-[#e3ddff] bg-white/64 px-3.5 py-3 shadow-[0_10px_24px_rgba(38,43,84,.035)] md:rounded-[1.25rem] md:px-5 md:py-4 xl:px-6 xl:py-5">
                    <div class="grid gap-1.5 md:gap-2 xl:gap-2.5">${rows}</div>
                </div>
            </div>
        `;
    }

    function practiceAnswerParts(activity = {}) {
        if (Array.isArray(activity.answer)) return activity.answer;

        const answer = String(activity.answer || '').trim();
        if (!answer) return [];

        if (String(activity.type || '').includes('letters')) {
            return Array.from(answer.toLowerCase().replace(/\s+/g, ''));
        }

        return answer.split(/\s+/).filter(Boolean);
    }

    function practiceBankFromAnswer(answer = []) {
        const bank = [...answer].reverse();
        if (bank.length > 1 && bank.every((word, index) => word === answer[index])) {
            bank.push(bank.shift());
        }

        return bank;
    }

    function renderAssessmentUnscramble(activity) {
        const answer = practiceAnswerParts(activity);
        const words = Array.isArray(activity.words) && activity.words.length ? activity.words : practiceBankFromAnswer(answer);
        const slotCount = answer.length || words.length;
        const helper = fieldHasValue(activity.helper) ? activity.helper : '';
        const isLetterOrder = String(activity.type || '').includes('letters');
        const firstLetterHint = isLetterOrder ? String(answer[0] || '').toLowerCase() : '';
        const firstLetterHintIndex = isLetterOrder
            ? words.findIndex((word) => String(word || '').toLowerCase() === firstLetterHint)
            : -1;
        const chipDisplayValue = (word, index) => {
            if (!isLetterOrder) return word;

            const value = String(word || '').toLocaleLowerCase();
            return index === firstLetterHintIndex ? value.toLocaleUpperCase() : value;
        };
        const hasImage = fieldHasValue(activity.image);
        const compactSlots = slotCount > 10;
        const slotClass = compactSlots
            ? 'inline-flex h-10 min-w-[2.75rem] items-center justify-center rounded-xl border-2 border-dashed border-[#C9CFDA] bg-[#EEF0F4] px-2.5 text-sm font-bold text-[#7B8198] shadow-inner transition hover:border-[#B9AEFF] hover:bg-[#F8F6FF] sm:h-11 sm:min-w-[3.1rem] md:h-12 md:min-w-[3.35rem]'
            : 'inline-flex h-11 min-w-[3.25rem] items-center justify-center rounded-2xl border-2 border-dashed border-[#C9CFDA] bg-[#EEF0F4] px-3 text-sm font-bold text-[#7B8198] shadow-inner transition hover:border-[#B9AEFF] hover:bg-[#F8F6FF] sm:h-12 sm:min-w-[3.75rem] sm:px-4 xl:h-14 xl:min-w-[68px] xl:px-5 xl:text-base';
        const chipClass = compactSlots
            ? 'inline-flex h-10 min-w-[40px] items-center justify-center rounded-xl border border-[#DDE2EE] bg-white px-3 text-sm font-bold text-[#252640] shadow-[0_8px_18px_rgba(36,39,80,.1)] transition hover:-translate-y-0.5 hover:border-[#B9AEFF] hover:bg-[#F8F6FF] active:translate-y-0 sm:h-11 sm:min-w-[46px] sm:px-4 md:h-12 md:min-w-[50px]'
            : 'inline-flex h-11 min-w-[44px] items-center justify-center rounded-2xl border border-[#DDE2EE] bg-white px-4 text-base font-bold text-[#252640] shadow-[0_8px_18px_rgba(36,39,80,.1)] transition hover:-translate-y-0.5 hover:border-[#B9AEFF] hover:bg-[#F8F6FF] active:translate-y-0 sm:h-12 sm:min-w-[50px] sm:px-5 xl:h-[52px] xl:min-w-[56px] xl:text-lg';
        const image = hasImage
            ? `<figure class="overflow-hidden rounded-[1.1rem] border border-[#e1dcff] bg-[#f7f6ff] shadow-[0_12px_28px_rgba(38,43,84,.06)] lg:sticky lg:top-0">
                    <img class="h-full max-h-[12rem] w-full object-cover sm:max-h-[15rem] lg:max-h-none lg:aspect-[4/3]" src="${escapeHtml(activity.image)}" alt="" loading="lazy" decoding="async">
               </figure>`
            : '';
        const board = `
                <div class="${hasImage ? '' : 'mt-6 w-full sm:mt-7'} rounded-[1.35rem] border border-[#E0DAFF] bg-[#FCFBFF] px-3.5 py-4 shadow-[0_18px_45px_rgba(36,39,80,.08)] sm:rounded-[1.6rem] sm:px-5 sm:py-5 xl:rounded-[1.75rem] xl:px-6 xl:py-6" data-assessment-unscramble data-answer="${escapeHtml(JSON.stringify(answer))}">
                    <div class="flex min-h-[4rem] flex-wrap items-center justify-center gap-2 sm:min-h-[4.7rem] sm:gap-2.5" data-unscramble-slots>
                        ${Array.from({length: slotCount}).map((_, index) => `
                            <button type="button" class="${slotClass}" data-unscramble-slot data-slot-index="${index}" aria-label="Answer slot ${index + 1}">
                                ${index + 1}
                            </button>
                        `).join('')}
                    </div>
                    <div class="my-4 h-px w-full bg-[#E4E7F2] sm:my-5"></div>
                    <div class="flex flex-wrap justify-center gap-2 sm:gap-2.5" data-unscramble-bank>
                        ${words.map((word, index) => `
                            <button type="button" class="${chipClass}" data-unscramble-chip data-word-index="${index}" data-word-value="${escapeHtml(word)}" data-display-value="${escapeHtml(chipDisplayValue(word, index))}">
                                ${escapeDisplay(chipDisplayValue(word, index))}
                            </button>
                        `).join('')}
                    </div>
                </div>
        `;

        return `
            <div class="mx-auto flex w-full ${hasImage ? 'max-w-[92rem]' : 'max-w-[76rem]'} flex-col pt-0">
                <div class="flex items-center justify-between gap-3 text-left">
                    <div class="min-w-0">
                        <h2 class="${ui.title} text-[clamp(1.45rem,5.5vw,2.15rem)] leading-[1.08] sm:text-[clamp(1.65rem,4.8vw,2.35rem)]">${escapeDisplay(activity.instruction || 'Arrange the words to build the sentence.')}</h2>
                        ${helper ? `<p class="mt-2 text-sm font-semibold leading-[1.45] text-[#70748a]">${escapeDisplay(helper)}</p>` : ''}
                    </div>
                    ${assessmentStepBadgeHtml(activity.stepLabel)}
                </div>
                ${hasImage
                    ? `<div class="mt-4 grid gap-5 lg:grid-cols-[minmax(21rem,.46fr)_minmax(24rem,.54fr)] lg:items-start min-[1280px]:grid-cols-[minmax(25rem,.48fr)_minmax(27rem,.52fr)] min-[1280px]:gap-6 xl:grid-cols-[minmax(28rem,.48fr)_minmax(30rem,.52fr)] xl:gap-7">${image}${board}</div>`
                    : board}
            </div>
        `;
    }

    function renderAssessmentWriting(activity) {
        return `
            <div class="mb-3 flex items-center justify-between gap-3">
                <h2 class="${ui.title} min-w-0 text-[clamp(1.25rem,4.8vw,2rem)] leading-[1.08]">${escapeDisplay(activity.question || 'Writing task')}</h2>
                ${assessmentStepBadgeHtml(activity.stepLabel)}
            </div>
            ${fieldHasValue(activity.prompt) ? `<p class="mb-4 max-w-[70rem] text-base font-semibold leading-[1.55] text-[#70748a]">${escapeDisplay(activity.prompt || '')}</p>` : ''}
            <textarea class="min-h-[11rem] w-full rounded-[1.05rem] border-2 border-[#e4e7f2] bg-white px-4 py-3 text-base font-bold leading-[1.5] text-[#242538] outline-none placeholder:text-[#b8b8c9] focus:border-[#766cff] focus:ring-4 focus:ring-[#766cff]/10 sm:min-h-[12rem]" placeholder="Type your response here..."></textarea>
        `;
    }

    function renderAssessmentSpeaking(activity) {
        return `
            <div class="mb-3 flex items-center justify-between gap-3">
                <h2 class="${ui.title} min-w-0 text-[clamp(1.25rem,4.8vw,2rem)] leading-[1.08]">${escapeDisplay(activity.question || 'Speaking task')}</h2>
                ${assessmentStepBadgeHtml(activity.stepLabel)}
            </div>
            ${fieldHasValue(activity.prompt) ? `<p class="mb-5 max-w-[70rem] text-base font-semibold leading-[1.55] text-[#70748a]">${escapeDisplay(activity.prompt || '')}</p>` : ''}
            <div class="pt-1" data-assessment-recorder>
                <div class="flex flex-wrap items-center gap-3">
                    <button type="button" class="${assessmentPrimaryButtonClass}" data-record-start>
                        <i class="fa-solid fa-microphone" aria-hidden="true"></i>
                        Start recording
                    </button>
                    <button type="button" class="${assessmentSecondaryButtonClass}" data-record-stop disabled>
                        <i class="fa-solid fa-stop" aria-hidden="true"></i>
                        Stop
                    </button>
                    <span class="text-sm font-bold text-[#70748a]" data-record-status>Ready</span>
                </div>
                <audio controls class="mt-4 hidden w-full" data-record-preview></audio>
            </div>
        `;
    }

    function renderAssessmentActivity(activity, index) {
        if (['multiple_choice', 'audio_choice', 'reading_choice'].includes(activity.type)) return renderAssessmentChoice(activity, index);
        if (activity.type === 'fill_blank_typing') return renderAssessmentTyping(activity);
        if (activity.type === 'word_bank_fill') return renderAssessmentWordBank(activity);
        if (['unscramble_sentence', 'unjumble_sentence', 'unscramble_letters', 'unjumble_letters'].includes(activity.type)) return renderAssessmentUnscramble(activity);
        if (activity.type === 'writing_prompt') return renderAssessmentWriting(activity);
        if (activity.type === 'speaking_record') return renderAssessmentSpeaking(activity);

        return `<h2 class="${ui.title} text-2xl">${escapeDisplay(activity.question || activity.title || 'Activity')}</h2>`;
    }

    function renderPracticePage(page) {
        syncPracticeState(page);
        const steps = practiceSteps(page);
        const total = steps.length;
        const current = Math.max(0, Math.min(total - 1, practiceState.stepIndex));
        const activity = steps[current] || page.activity || page;
        const isPuzzlePractice = ['unscramble_sentence', 'unjumble_sentence', 'unscramble_letters', 'unjumble_letters'].includes(activity.type);
        const activityForRender = total > 1
            ? {...activity, stepLabel: `${current + 1} / ${total}`}
            : activity;

        return `
            <article class="mx-auto flex min-h-full w-full max-w-[76rem] flex-col justify-start px-1 pt-0 pb-2 text-left sm:px-3 md:pt-0 lg:px-4 min-[1536px]:max-w-[84rem]">
                <section class="px-1 pt-0 pb-2 sm:px-2 lg:px-3" data-assessment-active-content>
                    ${renderAssessmentActivity(activityForRender, 0)}
                </section>
            </article>
        `;
    }

    function bindQuizAudioPlayers() {
        els.content.querySelectorAll('[data-quiz-audio-player]').forEach((player) => {
            ensureQuizAudioPlayer(player);

            listenPage(player.querySelector('[data-quiz-audio-toggle]'), 'click', () => playQuizAudioPlayer(player));
            listenPage(player.querySelector('[data-quiz-audio-back]'), 'click', () => seekQuizAudioPlayer(player, -10));
            listenPage(player.querySelector('[data-quiz-audio-forward]'), 'click', () => seekQuizAudioPlayer(player, 10));
            listenPage(player.querySelector('[data-quiz-audio-track]'), 'click', (event) => {
                const media = ensureQuizAudioPlayer(player);
                if (!media || !Number.isFinite(media.duration) || media.duration <= 0) return;

                const rect = event.currentTarget.getBoundingClientRect();
                const x = Math.min(Math.max(0, event.clientX - rect.left), rect.width);
                const ratio = rect.width > 0 ? x / rect.width : 0;
                media.currentTime = ratio * media.duration;
                syncQuizAudioPlayer(player);
            });
        });
    }

    function scrollContentToElement(target, offset = 12) {
        const container = els.content;
        if (!container || !target) return;

        window.requestAnimationFrame(() => {
            const containerRect = container.getBoundingClientRect();
            const targetRect = target.getBoundingClientRect();
            const nextTop = container.scrollTop + targetRect.top - containerRect.top - offset;

            container.scrollTo({
                top: Math.max(0, nextTop),
                behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth',
            });
        });
    }

    function scrollQuizItemIntoView(item) {
        scrollContentToElement(item?.querySelector?.('.pq-quiz-question') || item, window.matchMedia('(max-width: 520px)').matches ? 16 : 12);
    }

    // SECTION: Quiz answer checking, feedback states, and quiz progression.
    function bindQuizInteractions() {
        els.content.querySelectorAll('[data-quiz-block]').forEach((block) => {
            const items = Array.from(block.querySelectorAll('[data-quiz-item]'));

            function showItem(index) {
                const complete = block.querySelector('[data-quiz-complete]');
                if (complete) {
                    complete.classList.add('hidden');
                    complete.classList.remove('block');
                }

                stopQuizAudio(true, {scope: 'question'});
                items.forEach((item, itemIndex) => {
                    item.classList.toggle('is-current', itemIndex === index);
                });
                scrollQuizItemIntoView(items[index]);
                autoplayQuizItemAudio(items[index]);
            }

            function showCompletion() {
                stopQuizAudio(true);
                playPracticeSfx('success');
                items.forEach((item) => item.classList.remove('is-current'));

                const complete = block.querySelector('[data-quiz-complete]');
                if (!complete) return;

                complete.classList.remove('hidden');
                complete.classList.add('block');
                scrollContentToElement(complete);
            }

            function flash(item, className) {
                const question = item.querySelector('.pq-quiz-question');
                item.classList.remove('is-correct-flash', 'is-wrong-flash');
                removeClasses(question, stateClasses.quizQuestionCorrect);
                removeClasses(question, stateClasses.quizQuestionWrong);
                void item.offsetWidth;
                item.classList.add(className);
                addClasses(question, className === 'is-correct-flash' ? stateClasses.quizQuestionCorrect : stateClasses.quizQuestionWrong);
                setPageTimeout(() => {
                    item.classList.remove(className);
                    removeClasses(question, stateClasses.quizQuestionCorrect);
                    removeClasses(question, stateClasses.quizQuestionWrong);
                }, 600);
            }

            function normalizeAnswer(value) {
                return String(value ?? '')
                    .trim()
                    .toLowerCase()
                    .replace(/[’‘]/g, "'")
                    .replace(/[“”]/g, '"')
                    .replace(/\s+/g, ' ');
            }

            function completeItem(item, itemIndex) {
                item.classList.add('is-locked', 'is-complete');
                playPracticeSfx('correct');
                flash(item, 'is-correct-flash');

                const nextItem = items[itemIndex + 1];
                if (nextItem) {
                    setPageTimeout(() => showItem(itemIndex + 1), 740);
                    return;
                }

                setPageTimeout(showCompletion, 740);
            }

            items.forEach((item, itemIndex) => {
                const quizType = item.dataset.quizType || 'multiple_choice';

                if (quizType === 'input') {
                    const input = item.querySelector('[data-quiz-input]');
                    const submit = item.querySelector('[data-quiz-submit]');
                    const feedback = item.querySelector('[data-quiz-feedback]');
                    let acceptedAnswers = [];

                    try {
                        acceptedAnswers = JSON.parse(item.dataset.acceptedAnswers || '[]');
                    } catch (error) {
                        acceptedAnswers = [];
                    }

                    const checkInput = () => {
                        if (item.classList.contains('is-locked')) return;
                        if (!input) return;

                        const value = input.value.trim();
                        if (!value) {
                            input.focus();
                            return;
                        }

                        const isCorrect = acceptedAnswers.some((answer) => normalizeAnswer(answer) === normalizeAnswer(value));

                        input.classList.remove('border-red-400', 'bg-red-50', 'text-red-700', 'border-green-500', 'bg-green-50', 'text-green-700');
                        if (feedback) feedback.classList.add('hidden');

                        if (!isCorrect) {
                            playPracticeSfx('wrong');
                            input.classList.add('border-red-400', 'bg-red-50', 'text-red-700');
                            if (feedback) {
                                feedback.textContent = 'Try again.';
                                feedback.classList.remove('hidden', 'text-green-700');
                                feedback.classList.add('text-red-700');
                            }
                            flash(item, 'is-wrong-flash');
                            scrollQuizItemIntoView(item);
                            return;
                        }

                        input.classList.add('border-green-500', 'bg-green-50', 'text-green-700');
                        input.disabled = true;
                        if (submit) submit.disabled = true;
                        if (feedback) {
                            feedback.textContent = 'Correct.';
                            feedback.classList.remove('hidden', 'text-red-700');
                            feedback.classList.add('text-green-700');
                        }
                        completeItem(item, itemIndex);
                    };

                    listenPage(submit, 'click', checkInput);
                    if (input) {
                        listenPage(input, 'keydown', (event) => {
                            if (event.key === 'Enter') {
                                event.preventDefault();
                                checkInput();
                            }
                        });
                    }

                    return;
                }

                const correctAnswer = Number(item.dataset.correctAnswer || 0);
                const options = Array.from(item.querySelectorAll('[data-quiz-option]'));

                options.forEach((option) => {
                    listenPage(option, 'click', () => {
                        if (item.classList.contains('is-locked')) return;

                        const selectedIndex = Number(option.dataset.optionIndex || 0);
                        options.forEach((button) => {
                            button.classList.remove('is-wrong');
                            removeClasses(button, stateClasses.quizWrongOption);
                        });

                        if (selectedIndex !== correctAnswer) {
                            playPracticeSfx('wrong');
                            option.classList.add('is-wrong');
                            addClasses(option, stateClasses.quizWrongOption);
                            flash(item, 'is-wrong-flash');
                            scrollQuizItemIntoView(item);
                            setPageTimeout(() => {
                                option.classList.remove('is-wrong');
                                removeClasses(option, stateClasses.quizWrongOption);
                            }, 720);
                            return;
                        }

                        option.classList.add('is-correct');
                        addClasses(option, stateClasses.quizCorrectOption);
                        options.forEach((button) => {
                            button.disabled = true;
                        });
                        completeItem(item, itemIndex);
                    });
                });
            });
        });
    }

    // SECTION: Revision/test and standalone practice game interactions.
    function bindPracticeGameInteractions() {
        els.content.querySelectorAll('[data-assessment-typing-input]').forEach((input) => {
            const checkTypingInput = () => {
                const value = normalizeAssessmentValue(input.value);
                const correctValue = normalizeAssessmentValue(input.dataset.correctValue || '');
                if (!value) return;
                if (!correctValue) return;

                input.classList.remove('border-red-400', 'bg-red-50', 'text-red-700', 'border-green-500', 'bg-green-50', 'text-green-700');

                if (value !== correctValue) {
                    playPracticeSfx('wrong');
                    input.classList.add('border-red-400', 'bg-red-50', 'text-red-700');
                    input.select();
                    return;
                }

                playPracticeSfx('correct');
                input.classList.add('border-green-500', 'bg-green-50', 'text-green-700');
                input.disabled = true;

                const inputs = Array.from(els.content.querySelectorAll('[data-assessment-typing-input]'));
                if (inputs.length && inputs.every((item) => item.disabled)) {
                    window.setTimeout(() => navigateAssessmentStep(1), 740);
                }
            };

            input.addEventListener('change', checkTypingInput);
            input.addEventListener('blur', checkTypingInput);
            input.addEventListener('input', () => {
                const value = normalizeAssessmentValue(input.value);
                const correctValue = normalizeAssessmentValue(input.dataset.correctValue || '');
                if (correctValue && value.length >= correctValue.length) checkTypingInput();
            });
            input.addEventListener('keydown', (event) => {
                if (event.key !== 'Enter') return;
                event.preventDefault();
                checkTypingInput();
            });
        });

        els.content.querySelectorAll('[data-assessment-choice]').forEach((button) => {
            button.addEventListener('click', () => {
                const group = button.closest('[role="group"]');
                const options = Array.from(group?.querySelectorAll('[data-assessment-choice]') || []);
                const correctRaw = group?.dataset.correctAnswer;
                const hasCorrectAnswer = correctRaw !== undefined && correctRaw !== '';
                const correctAnswer = Number(correctRaw);
                const selectedIndex = Number(button.dataset.optionIndex || 0);

                if (button.disabled) return;

                options.forEach((option) => {
                    option.classList.remove('!border-[#766cff]', '!bg-[#f3f1ff]', '!text-[#554bd2]', '!border-[#ff9f63]', '!bg-[#fff1e8]', '!text-[#c95524]', 'is-correct', 'is-wrong');
                    removeClasses(option, stateClasses.quizCorrectOption);
                    removeClasses(option, stateClasses.quizWrongOption);
                });

                if (!hasCorrectAnswer || !Number.isFinite(correctAnswer)) {
                    button.classList.add('!border-[#766cff]', '!bg-[#f3f1ff]', '!text-[#554bd2]');
                    return;
                }

                if (selectedIndex !== correctAnswer) {
                    playPracticeSfx('wrong');
                    button.classList.add('is-wrong');
                    addClasses(button, stateClasses.quizWrongOption);
                    window.setTimeout(() => {
                        button.classList.remove('is-wrong');
                        removeClasses(button, stateClasses.quizWrongOption);
                    }, 720);
                    return;
                }

                playPracticeSfx('correct');
                button.classList.add('is-correct');
                addClasses(button, stateClasses.quizCorrectOption);
                options.forEach((option) => {
                    option.disabled = true;
                });
                window.setTimeout(() => navigateAssessmentStep(1), 740);
            });
        });

        let selectedChip = null;
        const helper = els.content.querySelector('[data-assessment-helper]');
        const chipSelectedClasses = ['!border-[#6254F5]', '!bg-[#6254F5]', '!text-white', '!shadow-[0_10px_22px_rgba(98,84,245,.18)]'];
        const chipUsedClasses = ['!border-[#8BD9A0]', '!bg-[#ECFDF3]', '!text-[#238447]', 'opacity-70'];
        const slotFilledBaseClasses = ['border-solid'];
        const slotCorrectClasses = ['!border-[#8BD9A0]', '!bg-[#ECFDF3]', '!text-[#238447]', '!shadow-[0_0_0_3px_rgba(35,132,71,.10)]'];
        const slotWrongClasses = ['!border-[#FF9A9A]', '!bg-[#FFF3F3]', '!text-[#D94343]', 'animate-[pqShake_.28s_ease-in-out]'];
        const slotFocusClasses = ['!border-[#6254F5]', '!shadow-[0_0_0_3px_rgba(98,84,245,.12)]'];
        const slotReadyClasses = ['!border-[#6254F5]', '!bg-[#F8F6FF]', '!shadow-[0_0_0_3px_rgba(98,84,245,.10)]'];

        function normalizeAssessmentValue(value) {
            return String(value || '').trim().toLowerCase();
        }

        function setAssessmentHelper(text, tone = 'neutral') {
            if (!helper) return;
            helper.textContent = text;
            helper.classList.remove('!border-[#DED8FF]', '!bg-[#F8F6FF]', '!text-[#6254F5]', '!border-[#FF9A9A]', '!bg-[#FFF3F3]', '!text-[#D94343]', '!border-[#8BD9A0]', '!bg-[#ECFDF3]', '!text-[#238447]');
            if (tone === 'selected') helper.classList.add('!border-[#DED8FF]', '!bg-[#F8F6FF]', '!text-[#6254F5]');
            if (tone === 'error') helper.classList.add('!border-[#FF9A9A]', '!bg-[#FFF3F3]', '!text-[#D94343]');
            if (tone === 'success') helper.classList.add('!border-[#8BD9A0]', '!bg-[#ECFDF3]', '!text-[#238447]');
        }

        function clearSelectedChip() {
            if (selectedChip) selectedChip.classList.remove(...chipSelectedClasses);
            selectedChip = null;
            setSlotsReady(false);
        }

        function setSlotsReady(isReady) {
            els.content.querySelectorAll('[data-assessment-slot]').forEach((slot) => {
                if (slot.dataset.filled === 'true') return;
                slot.classList.toggle(slotReadyClasses[0], isReady);
                slot.classList.toggle(slotReadyClasses[1], isReady);
                slot.classList.toggle(slotReadyClasses[2], isReady);
            });
        }

        function resetSlot(slot) {
            const chipValue = slot.dataset.filledValue || '';
            if (chipValue) {
                els.content.querySelectorAll('[data-assessment-chip]').forEach((chip) => {
                    if (chip.dataset.chipValue === chipValue) {
                        chip.disabled = false;
                        chip.removeAttribute('aria-disabled');
                        chip.classList.remove(...chipUsedClasses, ...chipSelectedClasses, 'pointer-events-none');
                    }
                });
            }

            slot.textContent = String(Number(slot.dataset.slotIndex || 0) + 1);
            slot.dataset.filled = 'false';
            delete slot.dataset.filledValue;
            slot.classList.add('border-dashed');
            slot.classList.remove(...slotFilledBaseClasses, ...slotCorrectClasses, ...slotWrongClasses, ...slotFocusClasses, ...slotReadyClasses);
        }

        function placeSelectedChip(slot) {
            if (!selectedChip) {
                setAssessmentHelper('Choose a word first, then tap a blank.', 'error');
                slot.classList.add(...slotFocusClasses);
                window.setTimeout(() => slot.classList.remove(...slotFocusClasses), 450);
                return;
            }

            const value = selectedChip.dataset.chipValue || selectedChip.textContent || '';
            const correctValue = slot.dataset.correctValue || '';
            const isCorrect = correctValue === '' || normalizeAssessmentValue(value) === normalizeAssessmentValue(correctValue);

            if (!isCorrect) {
                playPracticeSfx('wrong');
                slot.classList.remove(...slotReadyClasses);
                slot.classList.add(...slotWrongClasses);
                window.setTimeout(() => {
                    slot.classList.remove(...slotWrongClasses);
                    if (selectedChip && slot.dataset.filled !== 'true') slot.classList.add(...slotReadyClasses);
                }, 420);
                setAssessmentHelper('That blank needs a different word.', 'error');
                return;
            }

            if (slot.dataset.filled === 'true') resetSlot(slot);

            slot.textContent = value;
            slot.dataset.filled = 'true';
            slot.dataset.filledValue = value;
            slot.classList.remove('border-dashed', ...slotWrongClasses, ...slotCorrectClasses, ...slotFocusClasses, ...slotReadyClasses);
            slot.classList.add(...slotFilledBaseClasses, ...(isCorrect ? slotCorrectClasses : slotWrongClasses));
            playPracticeSfx(isCorrect ? 'correct' : 'wrong');

            selectedChip.disabled = true;
            selectedChip.setAttribute('aria-disabled', 'true');
            selectedChip.classList.remove(...chipSelectedClasses);
            selectedChip.classList.add(...chipUsedClasses, 'pointer-events-none');
            selectedChip = null;
            setSlotsReady(false);

            setAssessmentHelper(isCorrect ? 'Nice. Choose the next word.' : 'That one does not match. Tap the blank to try again.', isCorrect ? 'success' : 'error');
            if (!isCorrect) window.setTimeout(() => slot.classList.remove('animate-[pqShake_.28s_ease-in-out]'), 320);
        }

        els.content.querySelectorAll('[data-assessment-chip]').forEach((chip) => {
            chip.addEventListener('click', () => {
                if (chip.disabled || chip.classList.contains('pointer-events-none')) return;
                clearSelectedChip();
                selectedChip = chip;
                chip.classList.add(...chipSelectedClasses);
                setSlotsReady(true);
                setAssessmentHelper(`Selected: ${chip.dataset.chipValue || chip.textContent}. Now tap a blank.`, 'selected');
            });
        });

        els.content.querySelectorAll('[data-assessment-slot]').forEach((slot) => {
            slot.addEventListener('click', () => {
                if (slot.dataset.filled === 'true' && !selectedChip) {
                    resetSlot(slot);
                    setAssessmentHelper('Choose a word to start.');
                    return;
                }

                placeSelectedChip(slot);
            });
        });

        els.content.querySelector('[data-assessment-reset-bank]')?.addEventListener('click', () => {
            clearSelectedChip();
            els.content.querySelectorAll('[data-assessment-chip]').forEach((chip) => {
                chip.disabled = false;
                chip.removeAttribute('aria-disabled');
                chip.classList.remove(...chipSelectedClasses, ...chipUsedClasses, 'pointer-events-none');
            });
            els.content.querySelectorAll('[data-assessment-slot]').forEach((slot) => resetSlot(slot));
            setAssessmentHelper('Choose a word to start.');
        });

        els.content.querySelectorAll('[data-assessment-unscramble]').forEach((root) => {
            const chips = Array.from(root.querySelectorAll('[data-unscramble-chip]'));
            const slots = Array.from(root.querySelectorAll('[data-unscramble-slot]'));
            let answer = [];

            try {
                answer = JSON.parse(root.dataset.answer || '[]');
            } catch (error) {
                answer = [];
            }

            const chipUsedClasses = ['pointer-events-none', 'opacity-55', '!border-[#d6ead8]', '!bg-[#f0faf2]', '!text-[#4d8a57]'];
            const slotFilledClasses = ['border-solid', '!border-[#cfc9ff]', '!bg-white', '!text-[#554bd2]', '!shadow-[0_8px_18px_rgba(91,80,220,.08)]'];
            const slotCorrectClasses = ['!border-[#9bdc86]', '!bg-[#dcf8cc]', '!text-[#477a27]', '!shadow-[0_8px_18px_rgba(89,176,105,.12)]'];
            const slotWrongClasses = ['!border-[#ff9b9b]', '!bg-[#fff1f1]', '!text-[#c84c4c]', 'animate-[pqShake_.28s_ease-in-out]'];
            const slotStateClasses = [...slotFilledClasses, ...slotCorrectClasses, ...slotWrongClasses];

            function resetSlot(slot) {
                slot.textContent = String(Number(slot.dataset.slotIndex || 0) + 1);
                delete slot.dataset.wordValue;
                delete slot.dataset.wordIndex;
                slot.classList.add('border-dashed');
                slot.classList.remove(...slotStateClasses);
            }

            function setSlotState(slot) {
                const index = Number(slot.dataset.slotIndex || 0);
                const value = normalizeAssessmentValue(slot.dataset.wordValue || '');
                const expectedValue = normalizeAssessmentValue(answer[index] || '');

                slot.classList.remove(...slotCorrectClasses, ...slotWrongClasses);
                slot.classList.add(...slotFilledClasses);

                if (!expectedValue || !value) return;

                if (value === expectedValue) {
                    slot.classList.add(...slotCorrectClasses);
                    return;
                }

                slot.classList.add(...slotWrongClasses);
                window.setTimeout(() => slot.classList.remove('animate-[pqShake_.28s_ease-in-out]'), 340);
            }

            function resetUnscramble() {
                chips.forEach((chip) => {
                    chip.disabled = false;
                    chip.classList.remove(...chipUsedClasses);
                });
                slots.forEach(resetSlot); 
            }

            function checkUnscramble() {
                if (slots.some((slot) => !slot.dataset.wordValue)) return;

                const values = slots.map((slot) => normalizeAssessmentValue(slot.dataset.wordValue));
                const expected = answer.map((word) => normalizeAssessmentValue(word));
                const isCorrect = values.length === expected.length && values.every((value, index) => value === expected[index]);

                if (!isCorrect) {
                    playPracticeSfx('wrong');
                    slots.forEach((slot, index) => {
                        if (values[index] !== expected[index]) slot.classList.add(...slotWrongClasses);
                    });
                    window.setTimeout(() => slots.forEach((slot) => slot.classList.remove('animate-[pqShake_.28s_ease-in-out]')), 340);
                    return;
                }

                playPracticeSfx('correct');
                slots.forEach((slot) => slot.classList.add(...slotCorrectClasses));
                chips.forEach((chip) => {
                    chip.disabled = true;
                    chip.classList.add('pointer-events-none');
                });
                window.setTimeout(() => navigateAssessmentStep(1), 740);
            }

            chips.forEach((chip) => {
                chip.addEventListener('click', () => {  
                    if (chip.disabled) return;
                    const slot = slots.find((item) => !item.dataset.wordValue); 
                    if (!slot) return;

                    slot.textContent = chip.dataset.displayValue || chip.dataset.wordValue || chip.textContent || '';
                    slot.dataset.wordValue = chip.dataset.wordValue || chip.textContent || '';
                    slot.dataset.wordIndex = chip.dataset.wordIndex || '';
                    slot.classList.remove('border-dashed', ...slotStateClasses);
                    setSlotState(slot);
                    chip.disabled = true;
                    chip.classList.add(...chipUsedClasses);
                    checkUnscramble();
                });
            });

            slots.forEach((slot) => {
                slot.addEventListener('click', () => {
                    const wordIndex = slot.dataset.wordIndex;
                    if (wordIndex !== undefined && wordIndex !== '') {
                        const chip = chips.find((item) => item.dataset.wordIndex === wordIndex);
                        if (chip) {
                            chip.disabled = false;
                            chip.classList.remove(...chipUsedClasses);
                        }
                    }
                    resetSlot(slot);
                });
            });

            root.querySelector('[data-unscramble-reset]')?.addEventListener('click', resetUnscramble);
        });

        els.content.querySelectorAll('[data-assessment-recorder]').forEach((root) => {
            const start = root.querySelector('[data-record-start]');
            const stop = root.querySelector('[data-record-stop]');
            const status = root.querySelector('[data-record-status]');
            const preview = root.querySelector('[data-record-preview]');
            let recorder = null;
            let stream = null;
            let chunks = [];

            start?.addEventListener('click', async () => {
                if (!navigator.mediaDevices?.getUserMedia) {
                    if (status) status.textContent = 'Recording is not available in this browser.';
                    return;
                }

                try {
                    stream = await navigator.mediaDevices.getUserMedia({audio: true});
                    recorder = new MediaRecorder(stream);
                    assessmentRecorderState.recorder = recorder;
                    assessmentRecorderState.stream = stream;
                    chunks = [];
                    recorder.addEventListener('dataavailable', (event) => {
                        if (event.data?.size) chunks.push(event.data);
                    });
                    recorder.addEventListener('stop', () => {
                        const blob = new Blob(chunks, {type: 'audio/webm'});
                        if (preview) {
                            preview.src = URL.createObjectURL(blob);
                            preview.classList.remove('hidden');
                        }
                        stream?.getTracks().forEach((track) => track.stop());
                        assessmentRecorderState.recorder = null;
                        assessmentRecorderState.stream = null;
                        if (status) status.textContent = 'Recording ready';
                    });
                    recorder.start();
                    start.disabled = true;
                    if (stop) stop.disabled = false;
                    if (status) status.textContent = 'Recording...';
                } catch (error) {
                    if (status) status.textContent = 'Microphone permission was not allowed.';
                }
            });

            stop?.addEventListener('click', () => {
                if (recorder && recorder.state !== 'inactive') recorder.stop();
                start.disabled = false;
                stop.disabled = true;
            });
        });
    }
@endif
