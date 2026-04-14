<?php
$content = [
    'title'    => 'Practice 8',
    'subtitle' => 'Antonella, Keith and Jia talk about what they think makes a good neighbourhood. Listen and
answer the questions',
    'type'     => 'audio',



    'audio' => materialAsset('slider/A1/Advanced/chapter-9/audios/slide13.mp3'),


    'script' => [
        'ANTONELLA: For me, it’s very important for a neighbourhood to have lots of cafés and restaurants. I like an exciting neighbourhood. I like going out and meeting my friends a lot. I like a neighbourhood with lots of people in it. My neighbourhood is quite exciting. There’s also a museum near my house, so I’m really lucky.',
        'KEITH: I think a good neighbourhood is a quiet one. So, for example, no clubs or restaurants – nothing like that – only houses. My neighbourhood isn’t like that – there are lots of shops and restaurants. And there’s a cinema close to my house – I really don’t like that.',
        'JIA: I think a good neighbourhood is a new one – new houses and shops. I also like a neighbourhood that is close to a shopping mall. It’s good to have lots of new shops near you – it’s interesting. In my neighbourhood, there aren’t any shops – there’s only a park. It’s a little bit boring.',
    ],

    'questions' => [
        [
            'prompt'  => 'Who likes a neighbourhood that is new?',
            'correct' => 'Jia',
            'options' => [
                'Jia',
                'Antonella',
                'Keith',
            ],
        ],
        [
            'prompt'  => 'Who likes a neighbourhood that is busy?',
            'correct' => 'Antonella',
            'options' => [
                'Jia',
                'Antonella',
                'Keith',
            ],
        ],
        [
            'prompt'  => 'Who likes a neighbourhood that is quiet?',
            'correct' => 'Keith',
            'options' => [
                'Jia',
                'Antonella',
                'Keith',
            ],
        ],
        [
            'type'    => 'personal',
            'prompt'  => 'Who do you agree with?',
            'options' => [
                'Jia',
                'Antonella',
                'Keith',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
