@php
    $content = [
        'page_title' => '',
        'title'      => 'Practice 6',
        'subtitle'   => 'Complete the leisure activities with the verbs from the list',

        'sentences' => [
            "<span class='inline-block size-3 rounded-full bg-pink-500 mr-2 align-middle'></span> {{1}} cakes.",
            "<span class='inline-block size-3 rounded-full bg-blue-500 mr-2 align-middle'></span> {{2}} with friends.",
            "<span class='inline-block size-3 rounded-full bg-amber-500 mr-2 align-middle'></span> {{3}} books.",
            "<span class='inline-block size-3 rounded-full bg-violet-500 mr-2 align-middle'></span> {{4}} clothes.",
            "<span class='inline-block size-3 rounded-full bg-emerald-500 mr-2 align-middle'></span> {{5}} magazines.",
            "<span class='inline-block size-3 rounded-full bg-rose-500 mr-2 align-middle'></span> {{6}} your friends.",
            "<span class='inline-block size-3 rounded-full bg-cyan-500 mr-2 align-middle'></span> {{7}} videos online.",
            "<span class='inline-block size-3 rounded-full bg-orange-500 mr-2 align-middle'></span> {{8}} social media.",
            "<span class='inline-block size-3 rounded-full bg-indigo-500 mr-2 align-middle'></span> {{9}} figures, cards, stamps, etc.",
        ],

        'answers' => [
            'bake',
            'hang out',
            'read',
            'make',
            'read',
            'text',
            'watch',
            'use',
            'collect',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")