@php
    $content = [
        'page_title'    => '',
        'title'         => 'Practice 2',
        'subtitle'      => 'Complete the sentences using the words from the box.',

        'sentences' => [
            "<span class='inline-block size-3 rounded-full bg-pink-500 mr-2 align-middle'></span> We were late because of a {{1}}.",
            "<span class='inline-block size-3 rounded-full bg-blue-500 mr-2 align-middle'></span> I took a different {{2}} to work today.",
            "<span class='inline-block size-3 rounded-full bg-amber-500 mr-2 align-middle'></span> The bus was {{3}} in traffic for an hour.",
            "<span class='inline-block size-3 rounded-full bg-violet-500 mr-2 align-middle'></span> She was wearing {{4}} and listening to music.",
            "<span class='inline-block size-3 rounded-full bg-emerald-500 mr-2 align-middle'></span> My {{5}} visit me every weekend.",
            "<span class='inline-block size-3 rounded-full bg-rose-500 mr-2 align-middle'></span> The city provides shelters for {{6}} people.",
            "<span class='inline-block size-3 rounded-full bg-cyan-500 mr-2 align-middle'></span> It was very {{7}} of you to help me.",
            "<span class='inline-block size-3 rounded-full bg-orange-500 mr-2 align-middle'></span> My father {{8}} every Saturday.",
        ],

        'answers' => [
            'traffic jam',
            'route',
            'stuck',
            'headphones',
            'grandchildren',
            'homeless',
            'kind',
            'mows the lawn',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")