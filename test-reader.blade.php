@php
$readingPassage = "Hello! My name is Maria. I am from Italy, so I am Italian. I live in a small apartment in the city with my family: my mother, father, and brother. Our home has a kitchen, a living room, and two bedrooms. The TV is on the table next to the sofa. Every day, I wake up at 6 AM, eat breakfast, and take the bus to work. Sometimes, I go to the supermarket after work to buy a loaf of bread and a pound of apples. Last week, the sink in the kitchen was broken, so I called the landlord. He fixed it. Now, I need to pay my electric bill at the bank. I am going to deposit money at the ATM tomorrow.";
$listeningAudioUrl = 'https://remtoo.net/slider/A1/Beginner/chapter-3/audio/slide-2.mp3';

$questions = [
    ['id' => 'g1', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'How do you formally greet someone in the morning?', 'options' => ['Hi!', 'Good morning.', 'Bye.', 'See you.'], 'correct' => 1],
    ['id' => 'g2', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'At the end of an interview, you say:', 'options' => ['Hello, nice to meet you.', 'Thank you for your time.', 'What is your name?', 'Where are you from?'], 'correct' => 1],
    ['id' => 'g3', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'This is _____ brother.', 'options' => ['my', 'I', 'me', 'he'], 'correct' => 0],
    ['id' => 'g4', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'Where can you borrow books?', 'options' => ['Bank', 'Library', 'Park', 'Supermarket'], 'correct' => 1],
    ['id' => 'g5', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'How do you ask for directions?', 'options' => ['Where is the bus stop?', 'What time is it?', 'How much is this?', 'Who is this?'], 'correct' => 0],
    ['id' => 'g6', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'The window is broken. I need to talk to the _____.', 'options' => ['cashier', 'landlord', 'driver', 'firefighter'], 'correct' => 1],
    ['id' => 'g7', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'I am going to _____ money into my account.', 'options' => ['deposit', 'open', 'withdraw', 'take'], 'correct' => 0],
    ['id' => 'g8', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'The bank is _____ to the park.', 'options' => ['next', 'in', 'on', 'under'], 'correct' => 0],
    ['id' => 'g9', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'She ___ drinks coffee in the morning. (100%)', 'options' => ['never', 'sometimes', 'always', 'rarely'], 'correct' => 2],
    ['id' => 'g10', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'How much ___ this shirt?', 'options' => ['are', 'is', 'am', 'be'], 'correct' => 1],
    ['id' => 'g11', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'I ___ at 7:00 every day.', 'options' => ['wake up', 'wakes up', 'waking up', 'waken'], 'correct' => 0],
    ['id' => 'g12', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'Are you Egyptian? No, I _____.', 'options' => ['are not', 'is not', 'am not', 'cannot'], 'correct' => 2],
    ['id' => 'g13', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'My brother\'s son is my _____.', 'options' => ['brother', 'cousin', 'nephew', 'niece'], 'correct' => 2],
    ['id' => 'g14', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'A room where you eat meals at a table is called _____.', 'options' => ['kitchen', 'living room', 'dining room', 'bathroom'], 'correct' => 2],
    ['id' => 'g15', 'section' => 'grammar', 'type' => 'mcq', 'title' => 'Grammar & Vocabulary', 'question' => 'What _____ are you looking for? - Black.', 'options' => ['size', 'colour', 'item', 'price'], 'correct' => 1],

    ['id' => 'r1q1', 'section' => 'reading', 'type' => 'mcq', 'title' => "Maria's Daily Life", 'level' => 'A1', 'context' => $readingPassage, 'question' => 'Where is Maria from?', 'options' => ['Spain', 'Italy', 'France', 'Egypt'], 'correct' => 1],
    ['id' => 'r1q2', 'section' => 'reading', 'type' => 'mcq', 'title' => "Maria's Daily Life", 'level' => 'A1', 'context' => $readingPassage, 'question' => 'Who lives with Maria?', 'options' => ['Her friends', 'Her mother, father, and brother', 'Her sister', 'Alone'], 'correct' => 1],
    ['id' => 'r1q3', 'section' => 'reading', 'type' => 'mcq', 'title' => "Maria's Daily Life", 'level' => 'A1', 'context' => $readingPassage, 'question' => 'What does Maria do every day before work?', 'options' => ['Pays bills', 'Wakes up at 6 AM and eats breakfast', 'Goes to the park', 'Fixes the sink'], 'correct' => 1],
    ['id' => 'r1q4', 'section' => 'reading', 'type' => 'mcq', 'title' => "Maria's Daily Life", 'level' => 'A1', 'context' => $readingPassage, 'question' => 'What does Maria buy after work?', 'options' => ['A loaf of bread', 'A loaf of bread and a pound of apples', 'A carton of milk', 'A slice of meat'], 'correct' => 1],
    ['id' => 'r1q5', 'section' => 'reading', 'type' => 'mcq', 'title' => "Maria's Daily Life", 'level' => 'A1', 'context' => $readingPassage, 'question' => 'What is Maria going to do tomorrow?', 'options' => ['Call the landlord', 'Take the train', 'Deposit money at the ATM', 'Buy furniture'], 'correct' => 2],

    ['id' => 'l1q1', 'section' => 'listening', 'type' => 'mcq', 'title' => 'A1 Listening', 'context' => 'It is really difficult to cook in here. The sink is too close to the stove, and the refrigerator is really small.', 'question' => 'What room is this person talking about?', 'options' => ['living room', 'kitchen', 'dining room'], 'correct' => 1],
    ['id' => 'l2q1', 'section' => 'listening', 'type' => 'mcq', 'title' => 'A1 Listening', 'context' => 'This room is great because there is a big window over the bed. I love sleeping in here. When I wake up, the room is so sunny.', 'question' => 'What room is this person talking about?', 'options' => ['bedroom', 'kitchen', 'bathroom'], 'correct' => 0],
    ['id' => 'l3q1', 'section' => 'listening', 'type' => 'mcq', 'title' => 'A1 Listening', 'context' => 'This is my favourite room. I have a big sofa where I can sit and watch TV. And look! I found this great coffee table on sale last week.', 'question' => 'What room is this person talking about?', 'options' => ['bedroom', 'kitchen', 'living room'], 'correct' => 2],
    ['id' => 'l4q1', 'section' => 'listening', 'type' => 'mcq', 'title' => 'A1 Listening', 'context' => 'Here is where I eat all my meals. The dinner table was pretty expensive, but it is big enough for six people. Why do not you come over for dinner sometime?', 'question' => 'What room is this person talking about?', 'options' => ['bathroom', 'bedroom', 'dining room'], 'correct' => 2],
    ['id' => 'l5q1', 'section' => 'listening', 'type' => 'mcq', 'title' => 'A1 Listening', 'context' => 'The best thing about this room is the tub. It is new and it is big, so I can take long, hot baths. The shower is pretty nice, too.', 'question' => 'What room is this person talking about?', 'options' => ['kitchen', 'living room', 'bathroom'], 'correct' => 2],

    ['id' => 'w1', 'section' => 'writing', 'type' => 'writing', 'title' => 'Writing Assessment', 'instructions' => 'Write 5 complete sentences on the topic below.', 'question' => 'Describe your house: type of house (flat, villa, etc.), number of rooms, and furniture in the living room.', 'wordCount' => '5 sentences'],
    ['id' => 's1', 'section' => 'speaking', 'type' => 'speaking', 'title' => 'Speaking Assessment', 'instructions' => 'Record a 1-minute audio response (about 60-90 seconds). Speak clearly and at a normal speed.', 'question' => 'Introduce yourself and describe your daily routine. Include your name, where you are from, your nationality, your family/home, and how you get to work.'],
];

$sectionPoints = [
    'grammar' => 1,
    'reading' => 2,
    'listening' => 2,
    'writing' => 5,
    'speaking' => 5,
];

foreach ($questions as &$question) {
    $question['points'] = $question['points'] ?? ($sectionPoints[$question['section']] ?? 1);
}
unset($question);
@endphp
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

        .section-tab {
            padding: 10px 20px;
            font-weight: 500;
            color: var(--fg-muted);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.15s ease;
            border: none;
            background: transparent;
            font-family: inherit;
            font-size: inherit;
        }

        .section-tab:hover {
            color: var(--fg);
            background: var(--bg-secondary);
        }

        .section-tab.active {
            color: var(--accent);
            background: var(--accent-pale);
            font-weight: 600;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in { animation: fadeInUp 0.5s ease forwards; }

        .hidden { display: none !important; }

        @media (max-width: 640px) {
            .section-tab { white-space: nowrap; padding: 8px 14px; font-size: 14px; }
        }
    </style>
</head>
<body class="bg-pattern">
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
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button id="startTestBtn" class="btn btn-primary text-lg px-8 py-4" type="button">Begin Test</button>
            </div>
        </div>
    </section>

    <section id="testInterface" class="hidden">
        <nav class="mb-6 overflow-x-auto" id="sectionNav">
            <div class="flex gap-2 min-w-max">
                <button class="section-tab active" data-section="grammar" type="button">1. Grammar</button>
                <button class="section-tab" data-section="reading" type="button">2. Reading</button>
                <button class="section-tab" data-section="listening" type="button">3. Listening</button>
                <button class="section-tab" data-section="writing" type="button">4. Writing</button>
                <button class="section-tab" data-section="speaking" type="button">5. Speaking</button>
            </div>
        </nav>

        <div id="sectionContainer">
            @foreach($questions as $index => $question)
                <div class="question-step {{ $index === 0 ? '' : 'hidden' }}" data-step="{{ $index }}" data-section="{{ $question['section'] }}">
                    <div class="card p-6 sm:p-8 animate-fade-in">
                        @if(isset($question['points']))
                            <p class="mb-4">
                                <span class="inline-flex items-center rounded-full bg-[var(--accent-pale)] px-3 py-1 text-sm font-semibold text-[var(--accent)]">
                                    {{ $question['points'] }} {{ $question['points'] === 1 ? 'point' : 'points' }}
                                </span>
                            </p>
                        @endif

                        @if($question['type'] === 'mcq')
                            <h2 class="text-2xl font-display mb-2">{{ $question['title'] }}</h2>
                            @if($question['section'] === 'reading' && isset($question['level']))
                                <p class="text-sm text-[var(--accent)] mb-4">{{ $question['level'] }}</p>
                            @endif

                            @if($question['section'] === 'reading' && isset($question['context']))
                                <div class="p-4 bg-[var(--bg-secondary)] rounded-lg mb-6 text-sm leading-relaxed">{{ $question['context'] }}</div>
                            @endif

                            @if($question['section'] === 'listening' && isset($question['context']))
                                <div class="mb-6">
                                    <audio controls controlslist="nodownload noplaybackrate" oncontextmenu="return false;" preload="none" class="w-full">
                                        <source src="{{ $listeningAudioUrl }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            @endif
                            <p class="text-lg font-medium mb-4">{{ $question['question'] }}</p>
                            <div class="space-y-3">
                                @foreach($question['options'] as $optionIndex => $option)
                                    <label class="option-item" tabindex="0">
                                        <input type="radio" name="answers[{{ $question['id'] }}]" value="{{ $optionIndex }}">
                                        <span>{{ $option }}</span>
                                    </label>
                                @endforeach
                            </div>
                        @elseif($question['type'] === 'writing')
                            <h2 class="text-2xl font-display mb-2">{{ $question['title'] }}</h2>
                            <p class="text-sm text-[var(--fg-muted)] mb-6">{{ $question['instructions'] }}</p>
                            <div class="p-4 border-l-4 border-[var(--accent)] bg-[var(--accent-pale)] rounded-r-lg mb-6">
                                <p class="font-medium">{{ $question['question'] }}</p>
                                <p class="text-xs mt-2 text-[var(--fg-muted)]">{{ $question['wordCount'] }}</p>
                            </div>
                            <textarea id="writingResponse" class="input min-h-[200px]" name="answers[{{ $question['id'] }}]" placeholder="Type your response here..."></textarea>
                        @elseif($question['type'] === 'speaking')
                            <h2 class="text-2xl font-display mb-2">{{ $question['title'] }}</h2>
                            <p class="text-sm text-[var(--fg-muted)] mb-6">{{ $question['instructions'] }}</p>
                            <div class="p-4 border-l-4 border-[var(--accent)] bg-[var(--accent-pale)] rounded-r-lg mb-6">
                                <p class="font-medium">{{ $question['question'] }}</p>
                            </div>
                            <div class="text-center p-6 bg-[var(--bg-secondary)] rounded-lg">
                                <p class="text-[var(--fg-muted)] mb-2">Recording functionality placeholder.</p>
                                <button class="btn btn-secondary record-btn" type="button">Record Answer (Simulated)</button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-between mt-8">
            <button id="prevBtn" class="btn btn-outline" type="button">Previous</button>
            <button id="nextBtn" class="btn btn-primary" type="button">Next</button>
        </div>
    </section>
</main>
<div id="submitConfirmModal" class="hidden fixed inset-0 z-[80] flex items-center justify-center p-4" role="dialog" aria-modal="true" aria-labelledby="submitConfirmTitle">
    <div class="absolute inset-0 bg-black/40" data-modal-close="true"></div>
    <div class="relative card w-full max-w-xl p-6 sm:p-8">
        <form id="testSubmitForm" action="#" method="POST">
            @csrf
            <input type="hidden" name="timer_seconds" id="timerSecondsInput" value="0">
            <input type="hidden" name="speaking_recorded" id="speakingRecordedInput" value="0">
            <h3 id="submitConfirmTitle" class="text-2xl font-display mb-3">Submit Test</h3>
            <p class="text-[var(--fg-muted)] mb-8">
                Are you sure you want to send the exam for automatic grading? Once you send it, you can't go back and make changes.
            </p>
            <div class="flex flex-col-reverse sm:flex-row gap-3 sm:justify-end">
                <button id="continueExamBtn" class="btn btn-outline" type="button">Continue Exams</button>
                <button id="confirmSubmitBtn" class="btn btn-primary" type="button">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    const CONFIG = { totalTime: 70 };
    const state = {
        globalStep: 0,
        timerSeconds: 0,
        timerRunning: false,
        submitted: false
    };

    let timerInterval = null;

    function formatTime(seconds) {
        const h = Math.floor(seconds / 3600);
        const m = Math.floor((seconds % 3600) / 60);
        const s = seconds % 60;
        return `${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}:${String(s).padStart(2, '0')}`;
    }

    function getSteps() {
        return Array.from(document.querySelectorAll('.question-step'));
    }

    function pauseAllAudio() {
        document.querySelectorAll('audio').forEach(audio => {
            audio.pause();
        });
    }

    function showSubmitModal() {
        const modal = document.getElementById('submitConfirmModal');
        const continueBtn = document.getElementById('continueExamBtn');
        if (!modal) return;
        pauseAllAudio();
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        if (continueBtn) continueBtn.focus();
    }

    function hideSubmitModal() {
        const modal = document.getElementById('submitConfirmModal');
        if (!modal) return;
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }

    function attachAudioRestrictions() {
        document.querySelectorAll('audio').forEach(audio => {
            audio.playbackRate = 1;
            audio.defaultPlaybackRate = 1;
            audio.addEventListener('ratechange', () => {
                if (audio.playbackRate !== 1) {
                    audio.playbackRate = 1;
                }
            });
            audio.addEventListener('contextmenu', event => {
                event.preventDefault();
            });
        });
    }

    function getTotalTimeSeconds() {
        if (CONFIG.totalTime === null) return null;
        const minutes = Number(CONFIG.totalTime);
        if (!Number.isFinite(minutes) || minutes < 0) return null;
        return Math.floor(minutes * 60);
    }

    function startTimer() {
        if (timerInterval) clearInterval(timerInterval);
        state.timerRunning = true;
        const totalTimeSeconds = getTotalTimeSeconds();

        if (totalTimeSeconds !== null && state.timerSeconds >= totalTimeSeconds) {
            state.timerSeconds = totalTimeSeconds;
            updateTimerDisplay();
            submitTest();
            return;
        }

        timerInterval = setInterval(() => {
            state.timerSeconds++;
            if (totalTimeSeconds !== null && state.timerSeconds >= totalTimeSeconds) {
                state.timerSeconds = totalTimeSeconds;
                updateTimerDisplay();
                submitTest();
                return;
            }
            updateTimerDisplay();
        }, 1000);
    }

    function updateTimerDisplay() {
        const remDisplay = document.getElementById('timeRemaining');
        if (!remDisplay) return;

        const totalTimeSeconds = getTotalTimeSeconds();
        if (totalTimeSeconds === null) {
            remDisplay.textContent = '∞';
            return;
        }

        const totalRemaining = Math.max(totalTimeSeconds - state.timerSeconds, 0);
        remDisplay.textContent = formatTime(totalRemaining);
    }

    function updateProgress(total) {
        const pct = total > 0 ? Math.round(((state.globalStep + 1) / total) * 100) : 0;
        document.getElementById('progressBar').style.width = pct + '%';
        document.getElementById('progressLabel').textContent = `Progress: ${pct}%`;
    }

    function updateNavigationButtons(total) {
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        prevBtn.disabled = state.globalStep === 0;
        nextBtn.textContent = state.globalStep >= total - 1 ? 'Submit Test' : 'Next';
    }

    function renderCurrentStep() {
        const steps = getSteps();
        const total = steps.length;
        const current = steps[state.globalStep];
        if (!current) return;

        pauseAllAudio();

        steps.forEach((stepEl, idx) => {
            stepEl.classList.toggle('hidden', idx !== state.globalStep);
        });

        document.querySelectorAll('.section-tab').forEach(tab => {
            tab.classList.toggle('active', tab.dataset.section === current.dataset.section);
        });

        updateNavigationButtons(total);
        updateProgress(total);
        updateTimerDisplay();
    }

    function attachOptionListeners() {
        document.querySelectorAll('.option-item').forEach(item => {
            item.addEventListener('click', function() {
                const input = this.querySelector('input');
                if (!input) return;
                const name = input.name;

                document.querySelectorAll(`input[name="${name}"]`).forEach(inp => {
                    const wrapper = inp.closest('.option-item');
                    if (wrapper) wrapper.classList.remove('selected');
                });

                this.classList.add('selected');
                input.checked = true;
            });
        });
    }

    function attachSpeakingControls() {
        const speakingRecordedInput = document.getElementById('speakingRecordedInput');
        document.querySelectorAll('.record-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                if (speakingRecordedInput) speakingRecordedInput.value = '1';
            });
        });
    }

    function resetQuestionInputs() {
        document.querySelectorAll('#sectionContainer input[type="radio"]').forEach(input => {
            input.checked = false;
        });
        document.querySelectorAll('#sectionContainer textarea').forEach(textarea => {
            textarea.value = '';
        });
    }

    function submitTest() {
        if (state.submitted) return;
        state.submitted = true;
        if (timerInterval) clearInterval(timerInterval);
        pauseAllAudio();
        hideSubmitModal();
        document.getElementById('timerSecondsInput').value = String(state.timerSeconds || 0);
        document.getElementById('testSubmitForm').submit();
    }

    function init() {
        const steps = getSteps();
        const total = steps.length;

        attachOptionListeners();
        attachAudioRestrictions();
        attachSpeakingControls();

        document.querySelectorAll('.section-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                const targetSection = tab.dataset.section;
                const targetStep = steps.findIndex(step => step.dataset.section === targetSection);
                if (targetStep < 0) return;
                state.globalStep = targetStep;
                renderCurrentStep();
            });
        });

        document.getElementById('startTestBtn').addEventListener('click', () => {
            document.getElementById('testSubmitForm').reset();
            document.getElementById('speakingRecordedInput').value = '0';
            resetQuestionInputs();
            document.querySelectorAll('.option-item').forEach(item => item.classList.remove('selected'));
            state.globalStep = 0;
            state.timerSeconds = 0;
            state.submitted = false;
            hideSubmitModal();
            document.getElementById('welcomeScreen').classList.add('hidden');
            document.getElementById('testInterface').classList.remove('hidden');
            renderCurrentStep();
            startTimer();
        });

        document.getElementById('prevBtn').addEventListener('click', () => {
            if (state.globalStep > 0) {
                state.globalStep--;
                renderCurrentStep();
            }
        });

        document.getElementById('nextBtn').addEventListener('click', () => {
            if (state.globalStep < total - 1) {
                state.globalStep++;
                renderCurrentStep();
            } else {
                showSubmitModal();
            }
        });

        const modal = document.getElementById('submitConfirmModal');
        const confirmSubmitBtn = document.getElementById('confirmSubmitBtn');
        const continueExamBtn = document.getElementById('continueExamBtn');

        if (confirmSubmitBtn) {
            confirmSubmitBtn.addEventListener('click', submitTest);
        }

        if (continueExamBtn) {
            continueExamBtn.addEventListener('click', hideSubmitModal);
        }

        if (modal) {
            modal.addEventListener('click', event => {
                const target = event.target;
                if (target instanceof HTMLElement && target.dataset.modalClose === 'true') {
                    hideSubmitModal();
                }
            });
        }

        document.addEventListener('keydown', event => {
            if (event.key !== 'Escape') return;
            const dialog = document.getElementById('submitConfirmModal');
            if (dialog && !dialog.classList.contains('hidden')) {
                hideSubmitModal();
            }
        });

        updateNavigationButtons(total);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
</script>
</body>
</html>
