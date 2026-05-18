<?php

$content = [
    'page_title' => 'Practice 1',
    'title'      => 'Practice 1',
    'subtitle'   => 'Fill in the blanks!',
    'type'       => 'reading',

    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">1</span>I filled out a {{1}} to fix the mistake on my shipping details.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">2</span>The company decided to {{2}} urgent orders first.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">3</span>You can {{3}} your delivery service for faster arrival.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">4</span>The clerk gave me an {{4}} of how long the shipment would take.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">5</span>There was an {{5}} with the address, so the package was delayed.",
    ],

    'answers' => [
        'correction form',
        'prioritize',
        'upgrade',
        'estimate',
        'issue',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])