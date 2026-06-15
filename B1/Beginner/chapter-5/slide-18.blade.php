@php
    $content = [
        'page_title'    => '',
        'title'         => 'Practice 8',
        'subtitle'      => 'Read, then use the words from the previous exercise to fill-in these sentences:',

        'sentences' => [
            "<span class='inline-block size-3 rounded-full bg-pink-500 mr-2 align-middle'></span> You wear {{1}} to protect your eyes from the sun.",
            "<span class='inline-block size-3 rounded-full bg-blue-500 mr-2 align-middle'></span> You travel across the water on a {{2}}.",
            "<span class='inline-block size-3 rounded-full bg-amber-500 mr-2 align-middle'></span> A {{3}} is an animal that lives near the sea and has a lot of legs.",
            "<span class='inline-block size-3 rounded-full bg-violet-500 mr-2 align-middle'></span> You wear a {{4}} on your head to protect you from the sun.",
            "<span class='inline-block size-3 rounded-full bg-emerald-500 mr-2 align-middle'></span> You use {{5}} to protect your skin from the sun.",
            "<span class='inline-block size-3 rounded-full bg-rose-500 mr-2 align-middle'></span> The yellow-coloured substance you find on the beach is called {{6}}.",
            "<span class='inline-block size-3 rounded-full bg-cyan-500 mr-2 align-middle'></span> You use a {{7}} to get dry after swimming in the sea.",
            "<span class='inline-block size-3 rounded-full bg-orange-500 mr-2 align-middle'></span> You can surf and ride the waves on a {{8}}.",
            "<span class='inline-block size-3 rounded-full bg-indigo-500 mr-2 align-middle'></span> The rise in water that moves across the surface of the sea is called a {{9}}.",
            "<span class='inline-block size-3 rounded-full bg-teal-500 mr-2 align-middle'></span> A hard object that comes from an animal such as a crab, oyster or turtle is called a {{10}}.",
        ],

        'answers' => [
            'sunglasses',
            'boat',
            'crab',
            'sun hat',
            'sun cream',
            'sand',
            'towel',
            'surfboard',
            'wave',
            'shell',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")