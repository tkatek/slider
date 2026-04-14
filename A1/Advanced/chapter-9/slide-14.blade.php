<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'Listen again. Write the places in the box next to the people who talk about them.',
    'type'     => 'audio',
    'options_grid_class' => 'mt-5 grid grid-cols-2 sm:grid-cols-3 gap-4',

    'audio' => materialAsset('slider/A1/Advanced/chapter-9/audios/slide13.mp3'),

    'script' => [
        'ANTONELLA: For me, it’s very important for a neighbourhood to have lots of cafés and restaurants. I like an exciting neighbourhood. I like going out and meeting my friends a lot. I like a neighbourhood with lots of people in it. My neighbourhood is quite exciting. There’s also a museum near my house, so I’m really lucky.',
        'KEITH: I think a good neighbourhood is a quiet one. So, for example, no clubs or restaurants – nothing like that – only houses. My neighbourhood isn’t like that – there are lots of shops and restaurants. And there’s a cinema close to my house – I really don’t like that.',
        'JIA: I think a good neighbourhood is a new one – new houses and shops. I also like a neighbourhood that is close to a shopping mall. It’s good to have lots of new shops near you – it’s interesting. In my neighbourhood, there aren’t any shops – there’s only a park. It’s a little bit boring.',
    ],

    'questions' => [
        [
            'prompt'  => 'Which places does Antonella talk about?',
            'correct' => ['restaurants', 'cafés', 'museum'],
            'options' => [
                'houses',
                'restaurants',
                'shopping mall',
                'clubs',
                'shops',
                'cafés',
                'museum',
                'cinema',
                'park',
            ],
        ],
        [
            'prompt'  => 'Which places does Keith talk about?',
            'correct' => ['houses', 'restaurants', 'clubs', 'shops', 'cinema'],
            'options' => [
                'houses',
                'restaurants',
                'shopping mall',
                'clubs',
                'shops',
                'cafés',
                'museum',
                'cinema',
                'park',
            ],
        ],
        [
            'prompt'  => 'Which places does Jia talk about?',
            'correct' => ['houses', 'shopping mall', 'shops', 'park'],
            'options' => [
                'houses',
                'restaurants',
                'shopping mall',
                'clubs',
                'shops',
                'cafés',
                'museum',
                'cinema',
                'park',
            ],
        ],
        [
            'prompt'  => 'Who likes their neighbourhood?',
            'correct' => 'Antonella',
            'options' => [
                'Antonella',
                'Keith',
                'Jia',
            ],
        ],
        [
            'prompt'  => 'Who doesn’t like their neighbourhood?',
            'correct' => 'Keith and Jia',
            'options' => [
                'Antonella and Jia',
                'Keith and Jia',
                'Antonella and Keith',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
