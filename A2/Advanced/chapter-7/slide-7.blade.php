<?php

$content = [
    'page_title' => 'Practice 2',
    'title'      => 'Practice 2',
    'subtitle'   => 'Drag & Drop: Complete the sentences with the correct words from the box.',
    'type'       => 'reading',

    'sentences' => [
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white">1</span>Setting goals can increase your {{1}}.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white">2</span>A goal should be clear and {{2}}.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white">3</span>You need a way to know when you {{3}} your goal.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white">4</span>Good goals should be {{4}} so you can check your progress.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white">5</span>A {{5}} helps you finish your goal on time.',
    ],

    'answers' => [
        'productivity',
        'specific',
        'achieve',
        'measurable',
        'deadline',
    ],
];

?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])
