@php
    $content = [
        'page_title'    => 'Practice 8',
        'title'         => 'Practice 8',
        'subtitle'      => 'Complete the conversation using the words in the box.',
        'audio'         => '',
        'script'        => [
            "A: Excuse me, is this the right platform for Edinburgh?",
            "B: Yes, the train leaves in ten minutes.",
            "A: Great! Let's buy our tickets first.",
            "B: Good idea. Let's check the timetable too.",
            "A: It says platform six.",
        ],

        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,

        'sentences' => [
            "<strong class='text-pink-600 dark:text-pink-400'>A:</strong> {{1}}, is this the right platform for Edinburgh?",
            "<strong class='text-blue-600 dark:text-blue-400'>B:</strong> Yes, the {{2}} leaves in ten minutes.",
            "<strong class='text-pink-600 dark:text-pink-400'>A:</strong> Great! Let's buy our {{3}} first.",
            "<strong class='text-blue-600 dark:text-blue-400'>B:</strong> Good idea. Let's check the {{4}} too.",
            "<strong class='text-pink-600 dark:text-pink-400'>A:</strong> It says {{5}} six.",
        ],

        'answers' => [
            'Excuse me',
            'train',
            'tickets',
            'timetable',
            'platform',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")