<?php
$content = [
    'mode' => 'type_table',
    'page_title' => 'Listening task',
    'title' => 'Listening task',
    'subtitle' => 'Around the world',
    'instruction' => 'Listen. People are talking about superstitions. What countries have these superstitions? What do they mean?',
    'instruction_note' => 'Complete the missing information.',
    'audio' => materialAsset('slider/A2/Intermediate/chapter-3/audios/slide8.mp3'),

    'transcript' => [
        '1. A Black Cat',
        'Woman: In different countries, people have different beliefs. A black cat can be lucky or unlucky.',
        'Man: In the U.S., if a black cat walks in front of you, it is bad luck.',
        'Woman: In Scotland, people think a black cat brings money.',
        '2. A Snake',
        'Woman: In Thailand, if you dream about a snake, it means you will meet your future husband or wife.',
        'Man: In Japan, seeing a white snake brings good luck.',
        'Woman: I have never seen one!',
        '3. A Full Moon',
        'Woman: In Spain, people think that going out on a full moon night is dangerous. You may see ghosts.',
        'Man: In Turkey, people believe that if you are born on a full moon, you will have a good future.',
        "Woman: That's a nice idea.",
    ],

    'table_headers' => ['Superstition', 'Country', 'Meaning'],

    'rows' => [
        [
            'superstition' => '1  a black cat',
            'answers' => [
                [
                    'country' => 'the U.S.',
                    'country_answer' => 'the U.S.|the US|the USA|U.S.|US|USA',
                    'meaning' => 'have bad luck',
                    'meaning_answer' => 'have bad luck|bad luck',
                    'done' => true,
                ],
                [
                    'country_answer' => 'Scotland',
                    'meaning_answer' => 'bring money|brings money',
                ],
            ],
        ],
        [
            'superstition' => '2  a snake',
            'answers' => [
                [
                    'country_answer' => 'Thailand',
                    'meaning_answer' => 'meet your future husband or wife|you will meet your future husband or wife',
                ],
                [
                    'country_answer' => 'Japan',
                    'meaning_answer' => 'bring good luck|brings good luck|good luck',
                ],
            ],
        ],
        [
            'superstition' => '3  a full moon',
            'answers' => [
                [
                    'country_answer' => 'Spain',
                    'meaning_answer' => 'dangerous|see ghosts|you may see ghosts',
                ],
                [
                    'country_answer' => 'Turkey',
                    'meaning_answer' => 'have a good future|you will have a good future',
                ],
            ],
        ],
    ],
];
?>

@include('slider.game.listening-table', ['content' => $content])
