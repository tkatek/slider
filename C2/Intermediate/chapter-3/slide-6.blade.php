<?php

$content = [
    'page_title' => 'Practice 1',
    'title'      => 'Practice 1',
    'subtitle'   => 'Fill in the blanks!',
    'type'       => 'reading',

    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">1</span>The bank asked for a {{1}} before opening my account.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">2</span>Some accounts charge a monthly {{2}} if conditions aren't met.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">3</span>I use my {{3}} to withdraw cash and pay for purchases.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">4</span>You must keep a {{4}} to avoid extra charges.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">5</span>Setting up {{5}} helps make sure bills are paid on time.",
    ],

    'answers' => [
        'proof of address',
        'maintenance fee',
        'debit card',
        'minimum balance',
        'automatic payment',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])