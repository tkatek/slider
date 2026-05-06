<?php

$content = [
    'page_title' => 'Practice',
    'title'      => 'Practice 5',
    'subtitle'   => 'Complete the sentences with the correct word(s).',
    'type'       => 'reading',

    'sentences' => [
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white">1</span>The computer {{1}} today.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white">2</span>She {{2}} at work.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white">3</span>I {{3}} eggs today.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white">4</span>He {{4}} the vase.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white">5</span>He {{5}} down the stairs.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 px-3 py-1 text-sm font-black text-white">6</span>They {{6}} their homework.',
    ],

    'answers' => [
        'hasn’t worked',
        'has arrived',
        'have cooked',
        'has broken',
        'has fallen',
        'have finished',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])
