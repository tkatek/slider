<?php

$content = [
    'page_title' => 'Warm-up: Practice 1',
    'title'      => 'Warm-up: Practice 1',
    'subtitle'   => 'Match the sentences that have the same meaning',
    'type'       => 'reading',

    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">1</span>{{1}} What do you do?",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">2</span>{{2}} I’m the head of design.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">3</span>{{3}} I’m responsible for writing content.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">4</span>{{4}} What’s your role in the company?",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">5</span>{{5}} What’s the best part of your job?",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 px-3 py-1 text-sm font-black text-white\">6</span>{{6}} Do you like the people you work with?",
    ],

    'answers' => [
        'What exactly do you do?',
        'I manage the design department.',
        'I’m a content writer.',
        'What’s your job?',
        'What do you like most about your job?',
        'Do you like your colleagues?',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])