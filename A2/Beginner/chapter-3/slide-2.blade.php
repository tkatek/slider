<?php

$content = array_replace_recursive([
    'page_title' => 'Practice 1',
    'title'      => 'Warm- up',
    'subtitle'   => 'Practice 1',

    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 2,
            'md'   => 4,
            'lg'   => 4,
        ],
    ],

    'items' => [
        [
            'question' => 'What season is it?',
            'answer'   => 'It’s autumn.',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide17/automne.webp'),
        ],
        [
            'question' => 'Is it summer?',
            'answer'   => 'No, it isn’t.',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide17/winter.webp'),
        ],
        [
            'question' => 'True or False: It is a sunny day.',
            'answer'   => 'False.',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/rainy.webp'),
        ],
        [
            'question' => 'You go to the beach on a ____________ day.',
            'answer'   => 'sunny',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide17/summer.webp'),
        ],
        [
            'question' => 'You fly a kite on a _______ day.',
            'answer'   => 'windy',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/windy.webp'),
        ],
        [
            'question' => "How's the weather?",
            'answer'   => 'It’s stormy.',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/stormy.webp'),
        ],
        [
            'question' => 'What is the weather like?',
            'answer'   => 'It’s foggy.',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/foggy.webp'),
        ],
        [
            'question' => 'In this season, we see lots of pink blossoms in the trees.',
            'answer'   => 'spring',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide17/spring.webp'),
        ],
    ],
], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])