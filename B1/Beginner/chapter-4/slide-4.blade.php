@php
    $content = [
        'page_title' => 'Practice 2',
        'title' => 'Practice 2',
        'subtitle' => 'What do we do in each one?<br>Match the word with its definition',
        'sentences' => [
            "<span class='mr-3 inline-block h-4 w-4 rounded-full bg-blue-500 align-middle'></span>{{1}} Listening to songs.",
            "<span class='mr-3 inline-block h-4 w-4 rounded-full bg-red-500 align-middle'></span>{{2}} Using Instagram, TikTok, or similar apps.",
            "<span class='mr-3 inline-block h-4 w-4 rounded-full bg-orange-500 align-middle'></span>{{3}} Watching programs on television.",
            "<span class='mr-3 inline-block h-4 w-4 rounded-full bg-green-500 align-middle'></span>{{4}} Playing on a computer or console.",
            "<span class='mr-3 inline-block h-4 w-4 rounded-full bg-purple-500 align-middle'></span>{{5}} Watching movies in a cinema.",
        ],
        'answers' => [
            'music',
            'social media',
            'TV shows',
            'video games',
            'films',
        ],
    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])