<?php

$content = [
    'page_title' => 'Writing',
    'title'      => 'Writing',
    'subtitle'   => 'Read & complete the sentences with the correct word',
    'type'       => 'reading',

    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">1</span>You {{1}} somebody when you want them to come to you.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">2</span>You often {{2}} to somebody when you say goodbye.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">3</span>In most European countries, you {{3}} when you want to say ‘yes’.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">4</span>In many European countries, you {{4}} friends on the cheek when you meet them.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">5</span>Many Asian people {{5}} to show respect when they meet somebody.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 px-3 py-1 text-sm font-black text-white\">6</span>You sometimes {{6}} when you want to show that you are joking.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-orange-500 to-red-400 px-3 py-1 text-sm font-black text-white\">7</span>You {{7}} when you want somebody to look at something.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-blue-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">8</span>You often {{8}} family members when you haven’t seen them for a long time.",
    ],

    'answers' => [
        'beckon',
        'wave',
        'nod',
        'kiss',
        'bow',
        'wink',
        'point',
        'hug',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])