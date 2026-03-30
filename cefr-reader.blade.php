<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEFR Placement Test Reader</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #faf9f7;
            --bg-secondary: #f3f1ed;
            --fg: #1a1916;
            --fg-muted: #6b6860;
            --accent: #1d5c5c;
            --accent-light: #2a8585;
            --accent-pale: #e8f2f2;
            --card: #ffffff;
            --border: #e5e2dc;
            --success: #2d6a4f;
            --warning: #b45309;
            --error: #b91c1c;
            --shadow: rgba(26, 25, 22, 0.08);
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--fg);
            line-height: 1.6;
            min-height: 100vh;
            margin: 0;
        }

        h1, h2, h3, h4 {
            font-family: 'Fraunces', serif;
            font-weight: 600;
            line-height: 1.3;
        }

        .font-display { font-family: 'Fraunces', serif; }

        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: var(--bg-secondary); }
        ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--fg-muted); }

        .bg-pattern {
            background-image:
                    radial-gradient(circle at 20% 50%, rgba(29, 92, 92, 0.03) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(29, 92, 92, 0.04) 0%, transparent 40%),
                    radial-gradient(circle at 60% 80%, rgba(180, 83, 9, 0.02) 0%, transparent 40%);
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 4px 24px var(--shadow), 0 1px 3px var(--shadow);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover { box-shadow: 0 8px 32px var(--shadow), 0 2px 6px var(--shadow); }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 15px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: all 0.15s ease;
            text-decoration: none;
            font-family: inherit;
        }

        .btn:focus-visible {
            outline: 3px solid var(--accent-light);
            outline-offset: 2px;
        }

        .btn-primary {
            background: var(--accent);
            color: white;
        }

        .btn-primary:hover {
            background: var(--accent-light);
            transform: translateY(-1px);
        }

        .btn-primary:active { transform: translateY(0); }
        .btn-primary:disabled { background: #ccc; cursor: not-allowed; transform: none; }

        .btn-secondary {
            background: var(--accent-pale);
            color: var(--accent);
            border: 1px solid transparent;
        }

        .btn-secondary:hover { border-color: var(--accent); }

        .btn-outline {
            background: transparent;
            color: var(--fg);
            border: 2px solid var(--border);
        }

        .btn-outline:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        .btn-outline:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .btn-small { padding: 8px 16px; font-size: 14px; }

        .input {
            width: 100%;
            padding: 12px 16px;
            font-size: 16px;
            border: 2px solid var(--border);
            border-radius: 10px;
            background: var(--card);
            color: var(--fg);
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
            font-family: inherit;
        }

        .input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 4px var(--accent-pale);
        }

        textarea.input { resize: vertical; min-height: 120px; }

        .start-level-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
        }

        .start-level-option {
            position: relative;
            display: block;
            cursor: pointer;
        }

        .start-level-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .start-level-chip {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 12px;
            border: 2px solid var(--border);
            border-radius: 10px;
            background: var(--bg-secondary);
            color: var(--fg);
            font-weight: 600;
            transition: all 0.15s ease;
        }

        .start-level-option:hover .start-level-chip {
            border-color: var(--accent-light);
            background: var(--accent-pale);
        }

        .start-level-option input:checked + .start-level-chip {
            border-color: var(--accent);
            background: var(--accent-pale);
            color: var(--accent);
        }

        .start-level-option input:focus-visible + .start-level-chip {
            outline: 3px solid var(--accent-light);
            outline-offset: 2px;
        }

        .option-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 18px;
            background: var(--bg-secondary);
            border: 2px solid var(--border);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .option-item:hover {
            border-color: var(--accent-light);
            background: var(--accent-pale);
        }

        .option-item.selected {
            border-color: var(--accent);
            background: var(--accent-pale);
        }

        .option-item input {
            margin-top: 3px;
            width: 20px;
            height: 20px;
            accent-color: var(--accent);
        }

        .progress-track {
            height: 6px;
            background: var(--bg-secondary);
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--accent), var(--accent-light));
            border-radius: 3px;
            transition: width 0.4s ease;
        }

        .timer-display {
            font-family: 'DM Sans', monospace;
            font-size: 2rem;
            font-weight: 700;
            color: var(--accent);
            letter-spacing: 2px;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in { animation: fadeInUp 0.5s ease forwards; }

        .level-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 14px;
            font-weight: 700;
            font-size: 14px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .level-a1 { background: #fef3c7; color: #92400e; }
        .level-a2 { background: #d1fae5; color: #065f46; }
        .level-b1 { background: #dbeafe; color: #1e40af; }
        .level-b2 { background: #ede9fe; color: #5b21b6; }
        .level-c1 { background: #fce7f3; color: #9d174d; }

        .rubric-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 14px;
        }

        .rubric-table th, .rubric-table td {
            padding: 12px 16px;
            border-bottom: 1px solid var(--border);
            text-align: left;
            vertical-align: top;
        }

        .rubric-table th {
            background: var(--accent-pale);
            font-weight: 600;
            color: var(--accent);
        }

        .hidden { display: none !important; }

        @media (max-width: 640px) {
            .timer-display { font-size: 1.5rem; }
            .start-level-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
    </style>
</head>
<body class="bg-pattern">
<!-- Header -->
<header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-[var(--border)]">
    <div class="max-w-6xl mx-auto px-4 py-4">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h1 class="text-xl sm:text-2xl font-display text-[var(--accent)]">CEFR Placement Test</h1>
                <p class="text-sm text-[var(--fg-muted)] hidden sm:block">Comprehensive Language Assessment</p>
            </div>
        </div>
        <div class="mt-4" id="progressArea">
            <div class="flex items-center justify-between text-sm mb-2">
                <span id="progressLabel">Progress: 0%</span>
                <span id="timeRemaining" class="font-semibold text-[var(--accent)]">--:--</span>
            </div>
            <div class="progress-track">
                <div id="progressBar" class="progress-fill" style="width: 0%"></div>
            </div>
        </div>
    </div>
</header>

<main class="max-w-6xl mx-auto px-4 py-6">
    <!-- Welcome Screen -->
    <section id="welcomeScreen">
        <div class="card p-8 sm:p-12 text-center max-w-3xl mx-auto">
            <div class="mb-8">
                <svg class="mx-auto mb-6 text-[var(--accent)]" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>
                    <path d="M8 7h8M8 11h8M8 15h4"/>
                </svg>
                <h2 class="text-3xl sm:text-4xl font-display mb-4">Welcome to Your Placement Test</h2>
                <p class="text-lg text-[var(--fg-muted)] max-w-xl mx-auto">
                    This assessment determines your CEFR level. The timer starts immediately. You can navigate between questions one by one.
                </p>
            </div>
            <div class="max-w-xs mx-auto mb-6 text-left">
                <p class="block text-sm font-semibold text-[var(--fg-muted)] mb-2">Select Your Current Level</p>
                <div id="startLevelGroup" class="start-level-grid" role="radiogroup" aria-label="Select your current level">
                    <label class="start-level-option">
                        <input type="radio" name="startLevel" value="A0">
                        <span class="start-level-chip">A0</span>
                    </label>
                    <label class="start-level-option">
                        <input type="radio" name="startLevel" value="A1">
                        <span class="start-level-chip">A1</span>
                    </label>
                    <label class="start-level-option">
                        <input type="radio" name="startLevel" value="A2">
                        <span class="start-level-chip">A2</span>
                    </label>
                    <label class="start-level-option">
                        <input type="radio" name="startLevel" value="B1">
                        <span class="start-level-chip">B1</span>
                    </label>
                    <label class="start-level-option">
                        <input type="radio" name="startLevel" value="B2">
                        <span class="start-level-chip">B2</span>
                    </label>
                    <label class="start-level-option">
                        <input type="radio" name="startLevel" value="C1">
                        <span class="start-level-chip">C1</span>
                    </label>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button id="startTestBtn" class="btn btn-primary text-lg px-8 py-4" type="button" disabled>Start Test</button>
            </div>
        </div>
    </section>

    <!-- Test Interface -->
    <section id="testInterface" class="hidden">
        <div class="card p-4 mb-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="timer-display" id="timerDisplay">00:00:00</div>
                </div>
            </div>
        </div>

        <div id="statusMessage" class="hidden card p-4 mb-6 text-sm"></div>

        <div id="sectionContainer"></div>

        <div class="flex justify-end mt-8">
            <button id="nextBtn" class="btn btn-primary" type="button">Next</button>
        </div>
    </section>

    <!-- Results Screen -->
    <section id="resultsScreen" class="hidden">
        <div class="card p-8 sm:p-12 text-center mb-8">
            <h2 class="text-3xl sm:text-4xl font-display mb-2">Your Results</h2>
            <p class="text-[var(--fg-muted)] mb-6">Based on your performance</p>
            <div class="inline-block p-8 bg-gradient-to-br from-[var(--accent-pale)] to-white rounded-2xl mb-6">
                <div class="text-sm uppercase tracking-wider text-[var(--accent)] mb-2">Your CEFR Level</div>
                <div id="finalLevel" class="text-6xl sm:text-7xl font-display font-bold text-[var(--accent)]">--</div>
            </div>
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                <div class="text-center px-6">
                    <div class="text-2xl font-bold" id="confidenceLevel">--</div>
                    <div class="text-sm text-[var(--fg-muted)]">Confidence</div>
                </div>
                <div class="text-center px-6">
                    <div class="text-2xl font-bold" id="totalScore">--</div>
                    <div class="text-sm text-[var(--fg-muted)]">Overall Score</div>
                </div>
            </div>
        </div>

        <div class="card p-6 mb-8">
            <h3 class="text-xl font-display mb-4">Section Performance</h3>
            <div id="sectionScores" class="grid sm:grid-cols-2 gap-4"></div>
        </div>

        <div class="card p-6">
            <h3 class="text-xl font-display mb-4">Notes</h3>
            <p id="resultReason" class="text-sm text-[var(--fg-muted)] mb-3">--</p>
            <p class="text-sm text-[var(--fg-muted)]">
                Recommended starting level:
                <span id="recommendedLevel" class="font-semibold text-[var(--accent)]">--</span>
            </p>
        </div>
    </section>
</main>

<script>

    const TOTAL_TIME_MINUTES = 70;
    const MAX_QUESTIONS = 12;
    const API_ENDPOINT = '/cefr-ai-interaction';
    const CSRF_TOKEN = '{{ csrf_token() }}';

    function createInitialState() {
        return {
            selectedStartLevel: null,
            conversation: [],
            currentQuestion: null,
            askedQuestions: 0,
            currentSelectionIndex: null,
            currentShortAnswer: '',
            timerRunning: false,
            timerSeconds: 0,
            testStartTime: null,
            isLoading: false
        };
    }

    let state = createInitialState();
    let timerInterval = null;
    const speechSynthesisAvailable = typeof window.speechSynthesis !== 'undefined';
    let selectedSpeechVoice = null;

    function getEnglishSpeechVoice() {
        if (!speechSynthesisAvailable) return null;

        const voices = speechSynthesis.getVoices();
        if (!Array.isArray(voices) || voices.length === 0) return null;

        const englishVoices = voices.filter(voice => /^en([-_]|$)/i.test(String(voice.lang || '')));
        if (englishVoices.length === 0) return null;

        const preferred = englishVoices.find(voice =>
            /(US|American|United States|UK|British|GB|Australia|AU|Canada|CA)/i.test(
                `${voice.name || ''} ${voice.lang || ''}`
            )
        );

        if (preferred) return preferred;
        const defaultEnglish = englishVoices.find(voice => voice.default);
        return defaultEnglish || englishVoices[0];
    }

    function initSpeechSynthesisVoice() {
        if (!speechSynthesisAvailable) return;

        const loadVoice = () => {
            selectedSpeechVoice = getEnglishSpeechVoice();
        };

        loadVoice();
        if (typeof speechSynthesis.addEventListener === 'function') {
            speechSynthesis.addEventListener('voiceschanged', loadVoice);
        } else if ('onvoiceschanged' in speechSynthesis) {
            speechSynthesis.onvoiceschanged = loadVoice;
        }
    }

    function escapeHtml(value) {
        return String(value ?? '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    function formatTime(seconds) {
        const h = Math.floor(seconds / 3600);
        const m = Math.floor((seconds % 3600) / 60);
        const s = seconds % 60;
        return `${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}:${String(s).padStart(2, '0')}`;
    }

    function capitalize(value) {
        if (typeof value !== 'string' || !value.length) return '--';
        return value.charAt(0).toUpperCase() + value.slice(1);
    }

    function toNumber(value, fallback = 0) {
        const n = Number(value);
        return Number.isFinite(n) ? n : fallback;
    }

    function startTimer() {
        if (timerInterval) clearInterval(timerInterval);
        state.timerRunning = true;
        timerInterval = setInterval(() => {
            state.timerSeconds++;
            updateTimerDisplay();
        }, 1000);
    }

    function stopTimer() {
        if (timerInterval) clearInterval(timerInterval);
        timerInterval = null;
        state.timerRunning = false;
    }

    function updateTimerDisplay() {
        const display = document.getElementById('timerDisplay');
        if (display) display.textContent = formatTime(state.timerSeconds);

        const totalRemaining = TOTAL_TIME_MINUTES * 60 - state.timerSeconds;
        const remDisplay = document.getElementById('timeRemaining');
        if (remDisplay) remDisplay.textContent = totalRemaining > 0 ? formatTime(totalRemaining) : 'Time up';
    }

    function updateProgress(forceComplete = false) {
        const shown = Math.min(state.askedQuestions, MAX_QUESTIONS);
        const pct = forceComplete ? 100 : Math.round((shown / MAX_QUESTIONS) * 100);

        const bar = document.getElementById('progressBar');
        if (bar) bar.style.width = `${pct}%`;

        const label = document.getElementById('progressLabel');
        if (label) label.textContent = `Progress: ${pct}% (${shown}/${MAX_QUESTIONS})`;
    }

    function setStatus(message, type = 'info') {
        const status = document.getElementById('statusMessage');
        if (!status) return;

        if (!message) {
            clearStatus();
            return;
        }

        status.textContent = message;
        status.classList.remove('hidden');

        if (type === 'error') {
            status.style.borderColor = '#fecaca';
            status.style.backgroundColor = '#fef2f2';
            status.style.color = 'var(--error)';
            return;
        }

        status.style.borderColor = 'var(--border)';
        status.style.backgroundColor = 'var(--bg-secondary)';
        status.style.color = 'var(--fg-muted)';
    }

    function clearStatus() {
        const status = document.getElementById('statusMessage');
        if (!status) return;

        status.textContent = '';
        status.classList.add('hidden');
        status.style.borderColor = '';
        status.style.backgroundColor = '';
        status.style.color = '';
    }

    function setLoading(isLoading) {
        state.isLoading = isLoading;
        updateNavigationButtons();
    }

    function appendConversation(role, content) {
        if (!['user', 'assistant'].includes(role)) return;
        if (typeof content !== 'string' || !content.trim()) return;

        state.conversation.push({ role, content: content.trim() });
    }

    function extractParsedPayload(data) {
        if (!data || typeof data !== 'object') return null;
        if (data.parsed && typeof data.parsed === 'object') return data.parsed;
        return data;
    }

    async function fetchAiTurn(lastAnswer) {
        console.log(state.selectedStartLevel);
        const response = await fetch(API_ENDPOINT, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': CSRF_TOKEN
            },
            body: JSON.stringify({
                level: state.selectedStartLevel || 'B1',
                last_answer: lastAnswer,
                conversation: state.conversation
            })
        });

        const rawText = await response.text();
        let data = null;
        if (rawText) {
            try {
                data = JSON.parse(rawText);
            } catch (_e) {
                data = null;
            }
        }

        if (!response.ok) {
            let msg = data && typeof data.error === 'string'
                ? data.error
                : (rawText && rawText.trim()
                    ? `AI request failed (${response.status}): ${rawText.slice(0, 240)}`
                    : `AI request failed (${response.status})`);

            if (data && typeof data.details === 'string' && data.details.trim()) {
                msg += `: ${data.details}`;
            }

            throw new Error(msg);
        }

        const parsed = extractParsedPayload(data);
        if (!parsed || typeof parsed !== 'object') {
            throw new Error('AI response format is invalid.');
        }
        console.log(parsed)
        return parsed;
    }

    function normalizeQuestionPayload(payload) {
        if (!payload || typeof payload !== 'object' || !payload.question || typeof payload.question !== 'object') {
            throw new Error('AI did not return a valid question.');
        }

        const q = payload.question;
        const allowedSections = ['grammar', 'vocabulary', 'reading', 'listening'];
        const allowedTypes = ['mcq', 'true_false', 'short_answer'];

        const section = allowedSections.includes(q.section) ? q.section : 'grammar';
        const type = allowedTypes.includes(q.type) ? q.type : 'mcq';
        const questionText = typeof q.question === 'string' && q.question.trim()
            ? q.question.trim()
            : 'Please answer the following question.';

        let options = Array.isArray(q.options) ? q.options.map(opt => String(opt)) : [];
        if (type === 'true_false') options = ['True', 'False'];
        if (type === 'short_answer') options = [];
        if ((type === 'mcq' || type === 'true_false') && options.length < 2) {
            options = ['Option A', 'Option B'];
        }

        return {
            section,
            type,
            question: questionText,
            options,
            correct: Number.isInteger(q.correct) ? q.correct : null,
            passageTitle: typeof q.passageTitle === 'string' ? q.passageTitle : '',
            passageText: typeof q.passageText === 'string' ? q.passageText : '',
            script: typeof q.script === 'string' ? q.script : '',
            currentEstimatedLevel: typeof payload.current_estimated_level === 'string' ? payload.current_estimated_level : '',
            difficultyDirection: typeof payload.difficulty_direction === 'string' ? payload.difficulty_direction : ''
        };
    }

    function isFinalPayload(payload) {
        return payload && typeof payload === 'object' && typeof payload.final_level === 'string';
    }

    function sectionHeading(section) {
        if (section === 'grammar') return 'Grammar';
        if (section === 'vocabulary') return 'Vocabulary';
        if (section === 'reading') return 'Reading';
        if (section === 'listening') return 'Listening';
        return 'Question';
    }

    function renderCurrentQuestion() {
        const container = document.getElementById('sectionContainer');
        if (!container) return;

        if (!state.currentQuestion) {
            container.innerHTML = '';
            return;
        }

        const question = state.currentQuestion;

        let introHtml = '';
        if (question.section === 'reading') {
            introHtml = `
              <h2 class="text-2xl font-display mb-2">${escapeHtml(question.passageTitle || 'Reading Passage')}</h2>
              <div class="p-4 bg-[var(--bg-secondary)] rounded-lg mb-6 text-sm leading-relaxed">${escapeHtml(question.passageText || '')}</div>
            `;
        } else if (question.section === 'listening') {
            introHtml = `
              <h2 class="text-2xl font-display mb-2">Listening Comprehension</h2>
              <div class="flex gap-2 mb-6">
                 <button class="btn btn-secondary btn-small play-btn" type="button">Play Audio</button>
                 <button class="btn btn-outline btn-small stop-btn" type="button">Stop</button>
              </div>
            `;
        } else {
            introHtml = `<h2 class="text-2xl font-display mb-2">${escapeHtml(sectionHeading(question.section))}</h2>`;
        }

        let answerHtml = '';
        if (question.type === 'short_answer') {
            answerHtml = `
              <textarea id="shortAnswerResponse" class="input min-h-[180px]" placeholder="Type your answer here...">${escapeHtml(state.currentShortAnswer || '')}</textarea>
            `;
        } else {
            answerHtml = `
              <div class="space-y-3">
                ${question.options.map((opt, i) => `
                  <label class="option-item ${state.currentSelectionIndex === i ? 'selected' : ''}" tabindex="0">
                    <input type="radio" name="currentOption" value="${i}" ${state.currentSelectionIndex === i ? 'checked' : ''}>
                    <span>${escapeHtml(opt)}</span>
                  </label>
                `).join('')}
              </div>
            `;
        }

        container.innerHTML = `
          <div class="card p-6 sm:p-8 animate-fade-in">
            ${introHtml}
            <p class="text-lg font-medium mb-4">${escapeHtml(question.question)}</p>
            ${answerHtml}
          </div>
        `;

        attachListeners();
        updateNavigationButtons();
        updateTimerDisplay();
    }

    function updateNavigationButtons() {
        const nextBtn = document.getElementById('nextBtn');
        if (!nextBtn) return;

        if (state.isLoading) {
            nextBtn.disabled = true;
            nextBtn.textContent = 'Loading...';
            return;
        }

        nextBtn.disabled = !state.currentQuestion;
        nextBtn.textContent = state.askedQuestions >= MAX_QUESTIONS ? 'Submit Test' : 'Next';
    }

    function attachListeners() {
        document.querySelectorAll('.option-item').forEach(item => {
            item.addEventListener('click', function() {
                const input = this.querySelector('input');
                if (!input) return;

                const value = Number.parseInt(input.value, 10);
                if (Number.isNaN(value)) return;

                document.querySelectorAll('input[name="currentOption"]').forEach(inp => {
                    const wrapper = inp.closest('.option-item');
                    if (wrapper) wrapper.classList.remove('selected');
                });

                this.classList.add('selected');
                input.checked = true;
                state.currentSelectionIndex = value;
                clearStatus();
            });
        });

        const shortAnswer = document.getElementById('shortAnswerResponse');
        if (shortAnswer) {
            shortAnswer.addEventListener('input', (e) => {
                state.currentShortAnswer = e.target.value;
                clearStatus();
            });
        }

        const playBtn = document.querySelector('.play-btn');
        if (playBtn) {
            playBtn.addEventListener('click', () => {
                if (!speechSynthesisAvailable) return;

                const script = state.currentQuestion && typeof state.currentQuestion.script === 'string'
                    ? state.currentQuestion.script
                    : '';

                if (!script.trim()) return;

                const utterance = new SpeechSynthesisUtterance(script);
                utterance.lang = selectedSpeechVoice?.lang || 'en-US';
                if (selectedSpeechVoice) utterance.voice = selectedSpeechVoice;

                speechSynthesis.cancel();
                speechSynthesis.speak(utterance);
            });
        }

        const stopBtn = document.querySelector('.stop-btn');
        if (stopBtn) {
            stopBtn.addEventListener('click', () => {
                if (speechSynthesisAvailable) speechSynthesis.cancel();
            });
        }
    }

    function getCurrentAnswerText() {
        const question = state.currentQuestion;
        if (!question) return null;

        if (question.type === 'short_answer') {
            const typed = state.currentShortAnswer.trim();
            return typed.length ? typed : null;
        }

        if (!Number.isInteger(state.currentSelectionIndex)) return null;
        const idx = state.currentSelectionIndex;

        if (idx < 0 || idx >= question.options.length) return null;
        return question.options[idx];
    }

    function displayResults(finalResult) {
        document.getElementById('testInterface').classList.add('hidden');
        document.getElementById('resultsScreen').classList.remove('hidden');

        const rawScores = finalResult && typeof finalResult.scores === 'object' ? finalResult.scores : {};
        const grammar = Math.max(0, Math.min(5, toNumber(rawScores.grammar)));
        const vocabulary = Math.max(0, Math.min(5, toNumber(rawScores.vocabulary)));
        const comprehension = Math.max(0, Math.min(5, toNumber(rawScores.comprehension)));
        const overall = Math.round(((grammar + vocabulary + comprehension) / 15) * 100);

        document.getElementById('finalLevel').textContent = finalResult.final_level || '--';
        document.getElementById('confidenceLevel').textContent = capitalize(finalResult.confidence || '--');
        document.getElementById('totalScore').textContent = `${overall}%`;

        const scoresHtml = [
            ['grammar', grammar],
            ['vocabulary', vocabulary],
            ['comprehension', comprehension]
        ].map(([label, value]) => `
            <div class="p-4 bg-[var(--bg-secondary)] rounded-lg">
                <h4 class="font-semibold capitalize mb-2">${escapeHtml(label)}</h4>
                <p class="text-xl font-bold">${escapeHtml(String(value))}/5</p>
            </div>
        `).join('');

        document.getElementById('sectionScores').innerHTML = scoresHtml;

        const reason = typeof finalResult.reason === 'string' && finalResult.reason.trim()
            ? finalResult.reason.trim()
            : '--';
        document.getElementById('resultReason').textContent = reason;

        const recommended = typeof finalResult.recommended_starting_level === 'string' && finalResult.recommended_starting_level.trim()
            ? finalResult.recommended_starting_level.trim()
            : '--';
        document.getElementById('recommendedLevel').textContent = recommended;
    }

    async function requestNextTurn(lastAnswer) {
        if (speechSynthesisAvailable) speechSynthesis.cancel();

        setLoading(true);
        clearStatus();

        try {
            const parsed = await fetchAiTurn(lastAnswer);

            if (typeof lastAnswer === 'string' && lastAnswer.trim()) {
                appendConversation('user', `Student answer: ${lastAnswer.trim()}`);
            }
            appendConversation('assistant', JSON.stringify(parsed));

            if (isFinalPayload(parsed)) {
                stopTimer();
                updateProgress(true);
                displayResults(parsed);
                return;
            }

            state.currentQuestion = normalizeQuestionPayload(parsed);
            state.askedQuestions += 1;
            state.currentSelectionIndex = null;
            state.currentShortAnswer = '';

            renderCurrentQuestion();
            updateProgress();
        } catch (error) {
            const message = error instanceof Error
                ? error.message
                : 'Unable to continue the placement test right now.';
            setStatus(message, 'error');
        } finally {
            setLoading(false);
        }
    }

    function init() {
        initSpeechSynthesisVoice();

        const startBtn = document.getElementById('startTestBtn');
        const nextBtn = document.getElementById('nextBtn');
        const startLevelInputs = Array.from(document.querySelectorAll('input[name="startLevel"]'));

        const getSelectedStartLevel = () => {
            const selected = startLevelInputs.find(input => input.checked);
            return selected ? selected.value : '';
        };

        const syncStartButtonState = () => {
            startBtn.disabled = !getSelectedStartLevel();
        };

        startLevelInputs.forEach(input => {
            input.addEventListener('change', syncStartButtonState);
        });
        syncStartButtonState();

        startBtn.addEventListener('click', async () => {
            const selectedLevel = getSelectedStartLevel();
            if (!selectedLevel) {
                if (startLevelInputs[0]) startLevelInputs[0].focus();
                return;
            }

            state = createInitialState();
            state.selectedStartLevel = selectedLevel;
            state.testStartTime = Date.now();

            document.getElementById('welcomeScreen').classList.add('hidden');
            document.getElementById('testInterface').classList.remove('hidden');

            updateProgress();
            updateNavigationButtons();
            updateTimerDisplay();
            clearStatus();

            startTimer();
            await requestNextTurn('');
        });

        nextBtn.addEventListener('click', async () => {
            if (state.isLoading || !state.currentQuestion) return;

            const answerText = getCurrentAnswerText();
            if (!answerText) {
                setStatus('Please answer the question before continuing.', 'error');
                return;
            }

            await requestNextTurn(answerText);
        });

        updateProgress();
        updateNavigationButtons();
        updateTimerDisplay();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
</script>
</body>
</html>
