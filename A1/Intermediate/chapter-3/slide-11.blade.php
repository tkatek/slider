@php
    $content = [
        'page_title' => 'Practice 4',
        'title' => 'Practice 4',
        'subtitle' => 'Fill in using words in the box',
        // 'desktop_game_width' => 70,
        // 'desktop_pool_width' => 30,

        'instruction' => 'Drag an answer (1–4) into the box next to each question (A–D). Wrong drops snap back.',
        'answers_label' => 'Answers',
        'drag_label' => 'Drag',
        'progress_label' => 'Progress',
        'hint' => 'Tip: one answer per question.',
        'mobile_hint' => 'Drag from the bottom word bank.',
        'completed_label' => 'Completed',

        'completion' => [
            'title' => 'Great job!',
            'description' => 'You matched all questions correctly.',
            'restart' => 'Restart',
            'continue' => 'Continue',
            'note' => 'Continue button has no logic (you will add it).',
        ],

        'sentences' => [
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>A:</span> How is he doing in class? {{1}}",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>B:</span> How is his behaviour? {{2}}",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>C:</span> Does he need help with anything? {{3}}",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>D:</span> Are there any school events soon? {{4}}",
        ],

        'answers' => [
            'He is doing well.',
            'He is friendly and polite.',
            'He needs more practice in writing.',
            'Yes, we have Sports Day next week.',
        ],

        'sfx' => [
            'correct' => materialAsset('slider/A1/Intermediate/chapter-3/sfx/correct.mp3'),
            'wrong' => materialAsset('slider/A1/Intermediate/chapter-3/sfx/wrong.mp3'),
        ],
    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])