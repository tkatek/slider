<?php

$content = [
    'page_title' => 'Practice 1',
    'title'      => 'Practice 1',
    'subtitle'   => 'Fill in the blanks!',
    'type'       => 'reading',

    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">1</span>I’ll {{1}} with you next week to see how the project is going.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">2</span>Please send a {{2}} so everyone remembers the meeting time.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">3</span>We’re looking forward to future {{3}} with your team.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">4</span>Even in disagreements, it’s important to show {{4}}.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">5</span>Good {{5}} helps you make a strong and lasting impression at events.",
    ],

    'answers' => [
        'touch base',
        'calendar invite',
        'collaboration',
        'professional courtesy',
        'networking etiquette',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])