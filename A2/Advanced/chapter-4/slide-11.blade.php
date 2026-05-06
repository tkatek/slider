<?php

$content = [
    'page_title' => 'Practice 4',
    'title'      => 'Practice 4',
    'subtitle'   => 'Complete the sentences using the verbs in the box.',
    'type'       => 'reading',

    'sentences' => [
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white">1</span>My sister {{1}} that book three times.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white">2</span>The children {{2}} a dolphin at the aquarium.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white">3</span>Mr Parker {{3}} to Japan for work.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white">4</span>Our dog {{4}} the flower vase.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white">5</span>My classmates {{5}} to the History Museum.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 px-3 py-1 text-sm font-black text-white">6</span>The pilot {{6}} to five different countries.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-orange-500 to-red-400 px-3 py-1 text-sm font-black text-white">7</span>My aunt {{7}} a camel in Morocco.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-blue-500 to-cyan-400 px-3 py-1 text-sm font-black text-white">8</span>The teacher {{8}} us small presents.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-lime-500 to-emerald-500 px-3 py-1 text-sm font-black text-white">9</span>The team {{9}} part in many competitions.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-pink-500 to-rose-500 px-3 py-1 text-sm font-black text-white">10</span>Our family {{10}} the same car for ten years.',
    ],

    'answers' => [
        'read',
        'seen',
        'gone',
        'broken',
        'been',
        'flown',
        'ridden',
        'given',
        'taken',
        'had',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])
