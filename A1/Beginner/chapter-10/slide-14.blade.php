@php
    $content = [
        'page_title' => 'Time to practice',
        'title' => 'Time to practice',
        'subtitle' => 'Read first, then drag & drop',

        'sentences' => [
            "<span class='mr-1 inline-block font-extrabold text-pink-600 dark:text-pink-400'>Clue 1:</span> You buy newspapers and magazines at the {{1}}.",
            "<span class='mr-1 inline-block font-extrabold text-blue-600 dark:text-blue-400'>Clue 2:</span> You buy bread and cakes at the {{2}}.",
            "<span class='mr-1 inline-block font-extrabold text-emerald-600 dark:text-emerald-400'>Clue 3:</span> You buy fruit and vegetables at the {{3}}.",
            "<span class='mr-1 inline-block font-extrabold text-violet-600 dark:text-violet-300'>Clue 4:</span> You buy school books and comic books at the {{4}}.",
            "<span class='mr-1 inline-block font-extrabold text-amber-600 dark:text-amber-300'>Clue 5:</span> You buy jeans and dresses at the {{5}}.",
            "<span class='mr-1 inline-block font-extrabold text-rose-600 dark:text-rose-400'>Clue 6:</span> You buy vitamins, thermometers, and pills at the {{6}}.",
            "<span class='mr-1 inline-block font-extrabold text-cyan-600 dark:text-cyan-400'>Clue 7:</span> You buy tennis balls and trainers at the {{7}}.",
            "<span class='mr-1 inline-block font-extrabold text-indigo-600 dark:text-indigo-400'>Clue 8:</span> You buy boots and shoes at the {{8}}.",
        ],
        'answers' => [
            "newsagent's",
            "baker's",
            "greengrocer's",
            'bookshop',
            'clothes shop',
            "chemist's",
            'sports shop',
            'shoe shop',
        ],
    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])