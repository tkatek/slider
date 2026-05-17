<?php

$content = [
    'title' => 'Listening',
    'subtitle' => 'People are talking about their roommates. Listen and choose the two words that best describe each person.',
    'mode' => 'choice_table',

    'audio' => materialAsset('slider/A2/Advanced/chapter-12/audios/slide9.mp3'),
    'transcript' => [
        'Tom’s awful as a roommate. He always says he’s going to do something, like pay the electric bill, but then he doesn’t do it. He never does much to keep the place clean, either. He just throws things on the floor and expects me to put them away. He doesn’t care that I have to live in his mess. It drives me crazy.',
        'Ann is difficult to live with because she has very strong opinions. She always has to be right about things. And she just sits around all day watching TV. She never does anything active. The worst thing is she loses her temper very quickly. I think I need to find a new roommate.',

    ],

    'row_heading' => 'Person',
    'option_heading' => 'Choose two words',

    'rows' => [
        [
            'number' => '1',
            'item' => 'Tom',
            'options' => [
                'unreliable',
                'inconsiderate',
                'neat',
                'helpful',
            ],
            'correct' => [
                'unreliable',
                'inconsiderate',
            ],
        ],
        [
            'number' => '2',
            'item' => 'Ann',
            'options' => [
                'lazy',
                'quiet',
                'studious',
                'bad-tempered',
            ],
            'correct' => [
                'lazy',
                'bad-tempered',
            ],
        ],
    ],
];

?>

@include('slider.game.listening-table', ['content' => $content])
