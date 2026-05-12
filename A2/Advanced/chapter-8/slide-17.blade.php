<?php

$content = [
    'page_title' => 'Practice 3',
    'title'      => 'Practice 3',
    'subtitle'   => 'Drag & drop the problem with the solution',
    'type'       => 'reading',

    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">1</span>{{1}} Learn the rules and practise more.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">2</span>{{2}} Think of a similar word.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">3</span>{{3}} Practise English in class often.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">4</span>{{4}} Use a dictionary to learn new words.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">5</span>{{5}} Think in English and use simple words.",
    ],

    'answers' => [
        "My grammar is bad.",
        "I don’t know the right word to use.",
        "I feel uncomfortable speaking English in class.",
        "When I see a new word, I don’t know how to say it.",
        "I speak very slowly because I don’t think in English.",
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])