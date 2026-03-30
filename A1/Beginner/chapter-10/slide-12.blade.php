@php
    $content = [
        'page_title' => 'Drag and Drop',
        'title' => 'Drag and Drop',
        'subtitle' => 'Read first, then drag & drop',

        'desktop_game_width' => 40,
        'desktop_pool_width' => 40,
        'sentences' => [
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Clue 1:</span> It makes your clothes look nice. {{1}}",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Clue 2:</span> It cleans plates and glasses. {{2}}",
            "<span class='mr-1 inline-block font-extrabold text-emerald-600 dark:text-emerald-400'>Clue 3:</span> You use it when it's cold. {{3}}",
            "<span class='mr-1 inline-block font-extrabold text-violet-600 dark:text-violet-300'>Clue 4:</span> You use this to dry your hair. {{4}}",
            "<span class='mr-1 inline-block font-extrabold text-amber-600 dark:text-amber-300'>Clue 5:</span> This is used for cooking food. {{5}}",
        ],
        'answers' => [
            'iron',
            'dishwasher',
            'Heater',
            'Hairdryer',
            'stove',
        ],
    ];
@endphp
@include('slider.game.drag-and-drop-blanks', ['content' => $content])
