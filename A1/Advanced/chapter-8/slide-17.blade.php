@php
    $content = [
        'page_title'    => 'Let’s practise!',
        'title'         => 'Let’s practise!',
        'subtitle'      => 'Drag and drop the words or phrases from the box.',
        'audio'         => materialAsset('slider/A1/Advanced/chapter-8/audios/slide17.mp3'),

        'script'        => [
            "Tom: Is Venice a good place to visit?",
            "Paola: Oh, it's a fantastic city to visit. There are lots of interesting old buildings, and there are some beautiful squares.",
            "Tom: Are there any good restaurants?",
            "Paola: Yes, there are, but they're quite expensive.",
            "Tom: What about cafés? Are there any good cafés?",
            "Paola: Oh yes, there are lots of good cafés. The coffee's very good in Italy.",
            "Tom: And how can I get to places? Is there a metro?",
            "Paola: No, there isn't a metro, but we don't need one. There are lots of canals, so you can go everywhere by boat.",
        ],

        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,

        'sentences' => [
            "<strong class='text-blue-600 dark:text-blue-400'>Tom:</strong> Is Venice a good place to visit?",
            "<strong class='text-pink-600 dark:text-pink-400'>Paola:</strong> Oh, it's a fantastic city to visit. {{1}} lots of interesting old buildings, and {{2}} some beautiful squares.",
            "<strong class='text-blue-600 dark:text-blue-400'>Tom:</strong> {{3}} any good restaurants?",
            "<strong class='text-pink-600 dark:text-pink-400'>Paola:</strong> Yes, {{4}}, but they're quite expensive.",
            "<strong class='text-blue-600 dark:text-blue-400'>Tom:</strong> What about cafés? {{5}} any good cafés?",
            "<strong class='text-pink-600 dark:text-pink-400'>Paola:</strong> Oh yes, {{6}} lots of good cafés. The coffee's very good in Italy.",
            "<strong class='text-blue-600 dark:text-blue-400'>Tom:</strong> And how can I get to places? {{7}} a metro?",
            "<strong class='text-pink-600 dark:text-pink-400'>Paola:</strong> No, {{8}} a metro, but we don't need one. {{9}} lots of canals, so you can go everywhere by boat.",
        ],

        'answers' => [
            'There are',
            'there are',
            'Are there',
            'there are',
            'Are there',
            'there are',
            'Is there',
            "there isn't",
            'There are',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")