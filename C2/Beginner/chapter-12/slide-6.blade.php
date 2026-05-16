<?php

$content = [
    'page_title' => 'Practice 1',
    'title'      => 'Practice 1',
    'subtitle'   => 'Fill in the blanks!',
    'type'       => 'reading',

    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">1</span>It's possible to be {{1}} without sounding aggressive in a discussion.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">2</span>She listened carefully to the {{2}} before responding calmly.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">3</span>Good {{3}} helps you express disagreement respectfully.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">4</span>You should {{4}} when you believe your position is reasonable.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">5</span>Try not to {{5}}; it can make you sound unsure of yourself.",
    ],

    'answers' => [
        'assertive',
        'opposing view',
        'tone control',
        'stand your ground',
        'over-apologize',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])