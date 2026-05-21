<?php

$content = array_replace_recursive([

    'title'      => 'Practice 1',
    'subtitle'   => 'Look at the pictures and tell what they are doing.',

    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 3,
        ],

    ],


    'items' => [
        [
            'question' => 'What are they doing?',
            'answer'   => 'They are listening to music.',
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide3/listening-to-music.webp'),
        ],
        [
            'question' => 'What are you doing?',
            'answer'   => 'I am eating.',
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide3/eating.webp'),
        ],
        [
            'question' => 'What are you doing?',
            'answer'   => 'We are reading the newspaper.',
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide3/reading-newspaper.webp'),
        ],
        [
            'question' => 'What is he doing?',
            'answer'   => 'He is studying now.',
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide3/studying.webp'),
        ],
        [
            'question' => 'What is your teacher doing?',
            'answer'   => 'She is teaching English now.',
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide3/teaching-english.webp'),
        ],
        [
            'question' => 'What is he doing?',
            'answer'   => 'He is sleeping on the couch.',
            'image'    => materialAsset('slider/A1/Advanced/chapter-10/img/slide3/sleeping-on-couch.webp'),
        ],
    ],
], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])
