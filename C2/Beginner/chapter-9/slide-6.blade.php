<?php

$content = [
    'page_title' => 'Practice 1',
    'title'      => 'Practice 1',
    'subtitle'   => 'Fill in the blanks!',
    'type'       => 'reading',

    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">1</span>A light joke can help {{1}} tension during an awkward meeting.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">2</span>His {{2}} tone made the conversation feel relaxed and friendly.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">3</span>{{3}} should be used carefully, especially in professional settings.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">4</span>It's important to consider the {{4}} of your words when speaking to others.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">5</span>A good {{5}} can help start a conversation and make people feel comfortable.",
    ],

    'answers' => [
        'defuse',
        'lighthearted',
        'sarcasm',
        'appropriateness',
        'icebreaker',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])