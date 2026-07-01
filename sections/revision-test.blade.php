@if($sectionStyles ?? false)
    <style>
        /* Revision/test shell and locked progress styles. */
        [data-progress-track].is-assessment-progress {
            background: transparent;
        }

        [data-progress-track].is-assessment-progress [data-progress-bar] {
            background: linear-gradient(90deg, #665de8, #7c7ff6);
            box-shadow: 0 0 12px rgba(102, 93, 232, .22);
        }

        [data-progress-track].is-assessment-progress [data-progress-bar]::after {
            display: none;
        }

        [data-progress-track].is-assessment-progress [data-level-markers] {
            display: none;
        }
    </style>
@else
    const assessmentState = {
        active: false,
        complete: false,
        pageKey: '',
        stepIndex: 0,
    };
    const assessmentRecorderState = {
        recorder: null,
        stream: null,
    };

    const assessmentButtonClass = 'inline-flex min-h-[2.75rem] items-center justify-center gap-2 rounded-[.95rem] px-4 text-[.9rem] font-bold shadow-[0_10px_22px_rgba(91,80,220,.12)]';
    const assessmentPrimaryButtonClass = `${assessmentButtonClass} border border-transparent bg-gradient-to-br from-[#546be6] via-[#6258e4] to-[#6b4ed5] text-white`;
    const assessmentSecondaryButtonClass = `${assessmentButtonClass} border border-[#dcd8ff] bg-[#fbfbff] text-[#554bd2]`;

    function isAssessmentType(type) {
        return ['revision', 'test'].includes(String(type || '').toLowerCase());
    }

    function stopAssessmentRecording() {
        try {
            if (assessmentRecorderState.recorder && assessmentRecorderState.recorder.state !== 'inactive') {
                assessmentRecorderState.recorder.stop();
            }
        } catch (error) {
        }

        try {
            assessmentRecorderState.stream?.getTracks?.().forEach((track) => track.stop());
        } catch (error) {
        }

        assessmentRecorderState.recorder = null;
        assessmentRecorderState.stream = null;
    }

    function isAssessmentPage(page = {}) {
        return isAssessmentType(page?.type);
    }

    function assessmentKey(page = {}) {
        return `${page?.type || 'assessment'}:${page?.title || page?.label || ''}`;
    }

    function isCurrentAssessment(page = {}) {
        return isAssessmentPage(page) && assessmentState.active && assessmentState.pageKey === assessmentKey(page);
    }

    function assessmentSteps(page = {}) {
        const steps = [];

        (page.sections || []).forEach((section) => {
            let sectionPassage = section.passage || '';

            (section.activities || []).forEach((activity) => {
                const nextActivity = {...activity, sectionTitle: section.title || page.label || page.title || 'Assessment'};
                if (fieldHasValue(nextActivity.passage)) sectionPassage = nextActivity.passage;
                if (!fieldHasValue(nextActivity.passage) && activity.type === 'reading_choice' && fieldHasValue(sectionPassage)) {
                    nextActivity.passage = sectionPassage;
                }
                steps.push(nextActivity);
            });
        });

        return steps;
    }

    function assessmentSections(page = {}) {
        const sections = [];
        let startIndex = 0;

        (page.sections || []).forEach((section, sectionIndex) => {
            const activities = Array.isArray(section.activities) ? section.activities : [];
            if (!activities.length) return;

            sections.push({
                title: section.title || `Section ${sectionIndex + 1}`,
                startIndex,
                endIndex: startIndex + activities.length - 1,
            });
            startIndex += activities.length;
        });

        return sections;
    }

    function currentAssessmentSectionIndex(sections = [], stepIndex = 0) {
        const index = sections.findIndex((section) => stepIndex >= section.startIndex && stepIndex <= section.endIndex);
        return index >= 0 ? index : 0;
    }

    function assessmentShortSectionTitle(title = '') {
        const cleanTitle = String(title || '').trim();
        const lowerTitle = cleanTitle.toLowerCase();

        if (lowerTitle.includes('complete') && lowerTitle.includes('dialogue')) return 'Dialogue';
        if (lowerTitle.includes('writing')) return 'Writing';
        if (lowerTitle.includes('speaking')) return 'Speaking';
        if (lowerTitle.includes('reading')) return 'Reading';
        if (lowerTitle.includes('grammar')) return 'Grammar';
        if (lowerTitle.includes('vocabulary')) return 'Vocabulary';
        if (lowerTitle.includes('missing')) return 'Missing';
        if (lowerTitle.includes('matching')) return 'Matching';

        return cleanTitle || 'Section';
    }

    function renderAssessmentSectionNav(page, stepIndex) {
        const sections = assessmentSections(page);
        if (sections.length <= 1) return '';

        const activeIndex = currentAssessmentSectionIndex(sections, stepIndex);
        const activeTitle = sections[activeIndex]?.title || '';

        return `
            <nav class="min-w-0 flex-1" aria-label="Assessment sections">
                <div class="hidden min-w-0 flex-wrap items-center gap-1 overflow-visible rounded-[1rem] border border-[#e4e7f2] bg-white/82 px-1.5 py-1.5 shadow-[0_8px_20px_rgba(38,43,84,.05)] md:flex min-[1536px]:gap-1.5 min-[1536px]:px-2 min-[1536px]:py-2">
                    ${sections.map((section, index) => {
                        const isActive = index === activeIndex;
                        const isComplete = section.endIndex < stepIndex;
                        const activeClass = isActive
                            ? 'border-[#cfc9ff] bg-[#f0eeff] text-[#554bd2] shadow-[0_6px_14px_rgba(91,80,220,.08)]'
                            : isComplete
                                ? 'border-transparent text-[#665de8] hover:border-[#dedaff] hover:bg-[#f7f6ff]'
                                : 'border-transparent text-[#7b8194] hover:border-[#e5e2f7] hover:bg-[#fafaff]';
                        return `
                            <button type="button" class="min-w-0 rounded-[.8rem] border px-2 py-1.5 text-[.74rem] font-bold leading-none transition min-[1536px]:rounded-xl min-[1536px]:px-3.5 min-[1536px]:py-2 min-[1536px]:text-[.86rem] ${activeClass}" data-assessment-section-index="${index}">
                                ${isComplete ? '<i class="fa-solid fa-check mr-1 text-[.68rem] min-[1536px]:mr-1.5 min-[1536px]:text-[.72rem]" aria-hidden="true"></i>' : `${index + 1}.`} ${escapeDisplay(assessmentShortSectionTitle(section.title))}
                            </button>
                        `;
                    }).join('')}
                </div>

                <div class="flex min-h-[2.65rem] items-center justify-between gap-3 rounded-[1rem] border border-[#e4e7f2] bg-white/86 px-3 py-1 shadow-[0_8px_18px_rgba(38,43,84,.05)] md:hidden">
                    <span class="min-w-0 truncate text-sm font-bold text-[#554bd2]">${activeIndex + 1}. ${escapeDisplay(assessmentShortSectionTitle(activeTitle))}</span>
                    <div class="flex shrink-0 items-center gap-1.5">
                        ${sections.map((section, index) => {
                            const isActive = index === activeIndex;
                            const isComplete = section.endIndex < stepIndex;
                            const dotClass = isActive
                                ? 'w-6 bg-[#665de8]'
                                : isComplete
                                    ? 'w-2.5 bg-[#9d95ff]'
                                    : 'w-2.5 bg-[#d8dbe8]';
                            return `<button type="button" class="h-2.5 rounded-full transition-all ${dotClass}" data-assessment-section-index="${index}" aria-label="Go to ${escapeHtml(section.title)}"></button>`;
                        }).join('')}
                    </div>
                </div>
            </nav>
        `;
    }

    function renderAssessmentIntro(page) {
        const label = page.label || (page.type === 'test' ? 'Test' : 'Revision');
        const tone = page.type === 'test'
            ? {
                badge: 'from-[#665de8] to-[#ff8a4f]',
                glow: 'bg-[#ff8a4f]/16',
                accent: 'text-[#d9602f]',
                copy: 'Show what you remember from A1 Beginner.',
            }
            : {
                badge: 'from-[#5d7cf6] to-[#665de8]',
                glow: 'bg-[#766cff]/14',
                accent: 'text-[#554bd2]',
                copy: 'Review A1 Beginner before moving on.',
            };

        return `
            <article class="mx-auto flex min-h-full w-full max-w-[76rem] flex-col justify-center px-2 py-4 text-center sm:px-4 lg:px-8">
                <div class="relative mx-auto w-full overflow-hidden py-8 sm:py-10 lg:py-14">
                    <div class="pointer-events-none absolute left-1/2 top-1/2 h-56 w-56 -translate-x-1/2 -translate-y-1/2 rounded-full ${tone.glow} blur-3xl"></div>
                    <div class="relative mx-auto mb-5 grid h-20 w-20 place-items-center rounded-[1.35rem] bg-gradient-to-br ${tone.badge} text-white shadow-[0_18px_42px_rgba(91,80,220,.22)] sm:h-24 sm:w-24 sm:rounded-[1.65rem]">
                        <i class="fa-solid ${page.type === 'test' ? 'fa-clipboard-check' : 'fa-rotate'} text-[1.75rem] sm:text-[2.1rem]" aria-hidden="true"></i>
                    </div>
                    <h1 class="${ui.title} relative mx-auto max-w-[52rem] text-[clamp(2.25rem,8vw,5rem)] leading-[.98]">
                        ${escapeDisplay(page.title || label)}
                    </h1>
                    <p class="relative mx-auto mt-5 max-w-[42rem] text-[clamp(1rem,3.8vw,1.2rem)] font-semibold leading-[1.58] text-[#70748a]">
                        ${tone.copy}
                    </p>
                    <button type="button" class="${assessmentPrimaryButtonClass} relative mx-auto mt-7 min-w-[12rem]" data-assessment-start>
                        Start
                        <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </button>
                </div>
            </article>
        `;
    }

    function renderAssessmentComplete(page) {
        const label = page.label || (page.type === 'test' ? 'Test' : 'Revision');

        return `
            <article class="mx-auto flex min-h-full w-full max-w-[58rem] flex-col items-center justify-center px-2 py-6 text-center sm:px-4 lg:py-10">
                <div class="text-[clamp(3rem,16vw,5.5rem)] leading-none" aria-hidden="true">&#127881;</div>
                <h1 class="${ui.title} mt-3 text-[clamp(1.8rem,7vw,3rem)]">Nice work!</h1>
                <p class="mx-auto mt-3 max-w-md text-[clamp(.98rem,3.8vw,1.14rem)] font-bold leading-[1.5] text-[#70748a]">You finished the ${escapeDisplay(label.toLowerCase())}.</p>
                <div class="mt-7 grid w-full gap-3 sm:max-w-[32rem] sm:grid-cols-2">
                    <button type="button" class="${assessmentSecondaryButtonClass}" data-assessment-restart>
                        <i class="fa-solid fa-rotate-right" aria-hidden="true"></i>
                        Restart
                    </button>
                    <button type="button" class="${assessmentPrimaryButtonClass}" data-assessment-continue>
                        Continue
                        <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </button>
                </div>
            </article>
        `;
    }

    function renderAssessmentPage(page) {
        if (!isCurrentAssessment(page)) return renderAssessmentIntro(page);
        if (assessmentState.complete) return renderAssessmentComplete(page);

        const steps = assessmentSteps(page);
        const step = steps[Math.max(0, Math.min(steps.length - 1, assessmentState.stepIndex))] || {};
        return `
            <article class="mx-auto flex min-h-full w-full max-w-[72rem] flex-col px-1 pt-0 pb-2 text-left sm:px-3 sm:pt-0 sm:pb-4 lg:px-5 lg:pt-0 lg:pb-5 min-[1536px]:max-w-[82rem] short:pt-0 short:pb-2">
                <div class="mb-3 flex items-start gap-2 sm:gap-3">
                    ${renderAssessmentSectionNav(page, assessmentState.stepIndex)}
                    <div class="flex min-h-[2.65rem] shrink-0 items-center gap-1 rounded-[1rem] border border-[#e4e7f2] bg-white/86 px-1 py-1 shadow-[0_8px_18px_rgba(38,43,84,.05)]">
                        <button type="button" class="inline-flex h-[2rem] w-[2rem] items-center justify-center rounded-[.82rem] border border-transparent bg-white text-[#665de8] transition hover:border-[#dcd8ff] hover:bg-[#f7f6ff] disabled:cursor-not-allowed disabled:opacity-40" data-assessment-prev aria-label="Previous question" ${assessmentState.stepIndex <= 0 ? 'disabled' : ''}>
                            <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="inline-flex h-[2rem] w-[2rem] items-center justify-center rounded-[.82rem] border border-[#dcd8ff] bg-[#f0eeff] text-[#554bd2] transition hover:border-[#cfc9ff] hover:bg-[#e9e6ff]" data-assessment-next aria-label="${assessmentState.stepIndex >= steps.length - 1 ? 'Finish assessment' : 'Next question'}">
                            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <section class="px-0 pt-0 pb-1.5 sm:px-1 lg:px-2" data-assessment-active-content>
                    ${renderAssessmentActivity(step, assessmentState.stepIndex)}
                </section>
            </article>
        `;
    }

    function syncAssessmentMode(page) {
        const active = isCurrentAssessment(page);
        const steps = active ? assessmentSteps(page) : [];
        els.card.classList.toggle('is-assessment-active', active);
        els.content.classList.toggle('pq-assessment-content', isAssessmentPage(page));
        els.progressTrack?.classList.toggle('is-assessment-progress', active);
        els.card.querySelector('[data-nav-actions]')?.classList.toggle('hidden', active);

        if (!active) {
            els.progressTrack?.classList.remove('is-assessment-progress');
            els.progressTrack?.removeAttribute('aria-disabled');
            return;
        }

        const total = Math.max(1, steps.length);
        const current = assessmentState.complete ? total : Math.min(total, assessmentState.stepIndex + 1);
        els.sectionName.textContent = displayText(page.label || page.title || 'Assessment');
        els.counter.textContent = `${current} / ${total}`;
        els.progress.style.width = `${(current / total) * 100}%`;
        if (els.progressTrack) {
            els.progressTrack.setAttribute('aria-valuemin', '1');
            els.progressTrack.setAttribute('aria-valuemax', String(total));
            els.progressTrack.setAttribute('aria-valuenow', String(current));
            els.progressTrack.setAttribute('aria-valuetext', `${page.label || page.title || 'Assessment'} question ${current} of ${total}`);
            els.progressTrack.setAttribute('aria-disabled', 'true');
            els.progressTrack.setAttribute('title', 'Progress is locked during this assessment');
        }
    }

    function scrollAssessmentContentIntoView() {
        if (typeof scrollContentToElement !== 'function') return;
        scrollContentToElement(els.content.querySelector('[data-assessment-active-content]') || els.content.firstElementChild, 12);
    }

    function navigateAssessmentStep(direction) {
        const page = currentPage();
        if (isPracticePage(page)) {
            syncPracticeState(page);
            const total = practiceSteps(page).length;

            if (direction < 0) {
                if (practiceState.stepIndex > 0) {
                    practiceState.stepIndex -= 1;
                    render({animate: true});
                    scrollAssessmentContentIntoView();
                } else {
                    goTo(pageIndex - 1);
                }
            }

            if (direction > 0) {
                if (practiceState.stepIndex < total - 1) {
                    practiceState.stepIndex += 1;
                    render({animate: true});
                    scrollAssessmentContentIntoView();
                } else {
                    goTo(pageIndex + 1);
                }
            }

            return direction !== 0;
        }

        if (!isCurrentAssessment(page) || assessmentState.complete) return false;

        if (direction < 0) {
            assessmentState.stepIndex = Math.max(0, assessmentState.stepIndex - 1);
            render({animate: true});
            scrollAssessmentContentIntoView();
            return true;
        }

        if (direction > 0) {
            const total = assessmentSteps(page).length;
            if (assessmentState.stepIndex >= total - 1) {
                assessmentState.complete = true;
            } else {
                assessmentState.stepIndex += 1;
            }
            render({animate: true});
            scrollAssessmentContentIntoView();
            return true;
        }

        return false;
    }

    function bindAssessmentInteractions() {
        const page = currentPage();
        if (!isAssessmentPage(page) && !isPracticePage(page)) return;

        els.content.querySelector('[data-assessment-start]')?.addEventListener('click', () => {
            assessmentState.active = true;
            assessmentState.complete = false;
            assessmentState.pageKey = assessmentKey(page);
            assessmentState.stepIndex = 0;
            render({animate: true});
        });

        els.content.querySelector('[data-assessment-restart]')?.addEventListener('click', () => {
            assessmentState.active = true;
            assessmentState.complete = false;
            assessmentState.pageKey = assessmentKey(page);
            assessmentState.stepIndex = 0;
            render({animate: true});
        });

        els.content.querySelector('[data-assessment-continue]')?.addEventListener('click', () => {
            assessmentState.active = false;
            assessmentState.complete = false;
            goTo(pageIndex >= pages.length - 1 ? 0 : pageIndex + 1);
        });

        els.content.querySelector('[data-assessment-prev]')?.addEventListener('click', () => {
            navigateAssessmentStep(-1);
        });

        els.content.querySelector('[data-assessment-next]')?.addEventListener('click', () => {
            navigateAssessmentStep(1);
        });

        els.content.querySelectorAll('[data-assessment-section-index]').forEach((button) => {
            button.addEventListener('click', () => {
                const sections = assessmentSections(page);
                const section = sections[Number(button.dataset.assessmentSectionIndex || 0)];
                if (!section) return;
                assessmentState.stepIndex = section.startIndex;
                assessmentState.complete = false;
                render({animate: true});
                scrollAssessmentContentIntoView();
            });
        });

        bindPracticeGameInteractions();
    }
@endif
