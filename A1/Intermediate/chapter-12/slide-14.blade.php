@php
    $content = [
        'page_title' => 'Practice 6',
        'title' => 'Practice 6',
        'subtitle' => 'Fill in the blanks',
        'sentences' => [
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Emma:</span> {{1}} me, I'm afraid you're sitting in the wrong {{2}}.",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Nina:</span> Really? Let me {{3}}. My seat is 26A.",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Emma:</span> I suppose 26A is this one. {{4}} seat, not an aisle seat. So your seat is next to me.",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Nina:</span> I'm {{5}}. I misunderstood.",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Emma:</span> No {{6}}.",
        ],
        'answers' => [
            'Excuse',
            'seat',
            'check',
            'window',
            'sorry',
            'problem',
        ],
    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])