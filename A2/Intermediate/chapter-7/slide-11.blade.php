<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Listen again and complete the sentences with the correct verb form. Number one is done for you.',
    'grid_class' => 'grid-cols-1 lg:grid-cols-2',

    'items' => [
        [
            'number' => 1,
            'parts'  => [
                ['text' => 'Paul says it '],
                ['answer' => 'will', 'placeholder' => 'will'],
                ['text' => " be expensive to go to Europe. He’s sure about that."],
            ],
        ],
        [
            'number' => 2,
            'parts'  => [
                ['text' => 'Laura thinks she probably '],
                ['answer' => "won't"],
                ['text' => " get a promotion. She’s 95% certain her boss will say no."],
            ],
        ],
        [
            'number' => 3,
            'parts'  => [
                ['text' => 'Christy says she '],
                ['answer' => 'may'],
                ['text' => " study for a master’s degree. She’s not sure, though."],
            ],
        ],
        [
            'number' => 4,
            'parts'  => [
                ['text' => 'Laura says she '],
                ['answer' => 'might'],
                ['text' => " look for a better job. She says it’s possible."],
            ],
        ],
        [
            'number' => 5,
            'parts'  => [
                ['text' => 'Joe says he '],
                ['answer' => 'is going to'],
                ['text' => " retire next June. He’s already decided."],
            ],
        ],
    ],
];
?>

@include('slider.game.image-missing-words', ['content' => $content])
