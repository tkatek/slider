<?php
$content = [
    'page_title' => 'Writing',
    'title' => 'Writing',
    'subtitle' => 'Complete the sentences with the correct words',
    'type' => 'reading',
    'sentences' => [
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white\">1</span>The birds are {{1}}. They sound happy.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white\">2</span>The dog is {{2}}. Don’t disturb him!",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white\">3</span>The cat is {{3}} milk.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white\">4</span>The children are {{4}} football.",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white\">5</span>It is {{5}}. Take an umbrella if you go out!",
        "<span class=\"mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 px-3 py-1 text-sm font-black text-white\">6</span>We are {{6}} for a bus. It is due in five minutes.",
    ],
    'answers' => [
        'singing',
        'sleeping',
        'drinking',
        'playing',
        'raining',
        'waiting',
    ],
];

?>
@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])