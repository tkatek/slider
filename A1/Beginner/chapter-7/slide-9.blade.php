@php
    $content = [
        'page_title' => 'Drag & Drop',
        'title' => 'Drag & Drop',
        'subtitle' => 'Fill in using words in the box',
//        'desktop_game_width' => 70,
//        'desktop_pool_width' => 30,
        'sentences' => [
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Sophia:</span> Can you tell me the way to the museum?",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Sara:</span> Go {{1}}, then turn {{2}} at the lights. The museum is {{3}} the park.",
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Sophia:</span> Is it {{4}} the cinema?",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Sara:</span> No, it's {{5}} the cinema.",
        ],
        'answers' => [
            'straight',
            'right',
            'next to',
            'opposite',
            'behind',
        ],
    ];
@endphp
@include('slider.game.drag-and-drop-blanks', ['content' => $content])
