@php
    $content = [
        'page_title' => 'Practice 9',
        'title'      => 'Practice 9',
        'subtitle'   => 'Complete the dialogue using the correct words from the conversation.',

        'sentences' => [
            "<span class='inline-block size-3 rounded-full bg-pink-500 mr-2 align-middle'></span> I had {{1}} the party before you came.",
            "<span class='inline-block size-3 rounded-full bg-blue-500 mr-2 align-middle'></span> She's doing much {{2}} today.",
            "<span class='inline-block size-3 rounded-full bg-amber-500 mr-2 align-middle'></span> Had you {{3}} the new project?",
            "<span class='inline-block size-3 rounded-full bg-violet-500 mr-2 align-middle'></span> I had {{4}} it before I left the house.",
            "<span class='inline-block size-3 rounded-full bg-emerald-500 mr-2 align-middle'></span> She had left the party before you {{5}}.",
            "<span class='inline-block size-3 rounded-full bg-rose-500 mr-2 align-middle'></span> She had {{6}} the English test last month.",
        ],

        'answers' => [
            'left',
            'better',
            'already made',
            'sent',
            'came',
            'passed',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")