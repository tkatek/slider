<?php

$content = [
    'page_title' => 'Practice 7',
    'title'      => 'Practice 7',
    'subtitle'   => 'Read the dialogue and fill-in with the suitable word from the list:',
    'type'       => 'reading',

    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-orange-500 to-amber-400 px-3 py-1 text-sm font-black text-white\">A</span>What {{1}} you do?",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-purple-600 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">B</span>I work in a primary school. I’m {{2}} teacher.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-orange-500 to-amber-400 px-3 py-1 text-sm font-black text-white\">A</span>What’s {{3}} role {{4}} the school?",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-purple-600 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">B</span>I’m {{5}} head of Year One. I’m responsible {{6}} all the children in their first year.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-orange-500 to-amber-400 px-3 py-1 text-sm font-black text-white\">A</span>Do {{7}} like your job?",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-purple-600 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">B</span>I do. It’s hard work but I love {{8}}.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-orange-500 to-amber-400 px-3 py-1 text-sm font-black text-white\">A</span>What’s {{9}} best part {{10}} your job?",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-purple-600 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">B</span>The children! They’re great.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-orange-500 to-amber-400 px-3 py-1 text-sm font-black text-white\">A</span>Do you like {{11}} people you work {{12}}?",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-purple-600 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">B</span>Yes. I manage some excellent teachers, and the head of the school is great.",
    ],

    'answers' => [
        'do',
        'a',
        'your',
        'in',
        'the',
        'for',
        'you',
        'it',
        'the',
        'of',
        'the',
        'with',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])