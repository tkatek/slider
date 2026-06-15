@php
    $content = [
        'page_title' => 'Practice 4',
        'title'      => 'Practice 4',
        'subtitle'   => 'Complete the sentences using the words in the box.',

        'sentences' => [
            "<span class='inline-block size-3 rounded-full bg-pink-500 mr-2 align-middle'></span> Emma used a {{1}} to look for evidence.",
            "<span class='inline-block size-3 rounded-full bg-blue-500 mr-2 align-middle'></span> The cookies seemed to {{2}} from the kitchen.",
            "<span class='inline-block size-3 rounded-full bg-amber-500 mr-2 align-middle'></span> Arthur didn't know the cookies were Emma's, so he {{3}} they were for everyone.",
            "<span class='inline-block size-3 rounded-full bg-violet-500 mr-2 align-middle'></span> Emma found a {{4}} that helped her solve the mystery.",
            "<span class='inline-block size-3 rounded-full bg-emerald-500 mr-2 align-middle'></span> The detective wanted to {{5}} the case carefully.",
            "<span class='inline-block size-3 rounded-full bg-rose-500 mr-2 align-middle'></span> There were chocolate {{6}} on the floor near the door.",
        ],

        'answers' => [
            'magnifying glass',
            'vanish',
            'assumed',
            'clue',
            'investigate',
            'crumbs',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")