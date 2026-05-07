<?php

$content = [
    'page_title' => 'Practice',
    'title'      => 'Practice 1',
    'subtitle'   => 'Complete the sentences with the correct word(s).',
    'type'       => 'reading',

    'sentences' => [
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white">1</span>I’d {{1}} that communication requires clarity.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white">2</span>Success means different things depending on the {{2}}.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white">3</span>That raises an interesting {{3}}.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white">4</span>From my {{4}}, this issue is complex.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white">5</span>I agree {{5}} some extent, but not entirely.',
    ],

    'answers' => [
        'argue',
        'perspective',
        'point',
        'perspective',
        'to',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])