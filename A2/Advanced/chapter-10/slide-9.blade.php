<?php

$content = [
    'page_title' => 'Practice 3',
    'title'      => 'Practice 3',
    'subtitle'   => 'Fill-in-the-Blanks: Complete the sentences with the correct words.',
    'type'       => 'reading',

    'sentences' => [
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white">1</span>I want to {{1}} about my neighbour.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white">2</span>The music is very {{2}} at night.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white">3</span>There is a bad {{3}} from the building next door.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white">4</span>The {{4}} keeps me awake at night.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white">5</span>I pay {{5}} for this apartment every month.',
    ],

    'answers' => [
        'complain',
        'loud',
        'smell',
        'noise',
        'rent',
    ],

    'word_bank' => [
        'noise',
        'complain',
        'loud',
        'smell',
        'rent',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])