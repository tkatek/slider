<?php

$content = array_replace_recursive([
    'page_title' => 'Practice 6',
    'title'      => 'Practice 6',
    'subtitle'   => 'Speaking Time!',

    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 2,
            'md'   => 5,
            'lg'   =>5,
        ],
    ],

    'items' => [
        [
            'question' => 'What season is it?',
            'answer'   => 'It’s spring.',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide17/spring.webp'),
        ],
        [
            'question' => 'What season is it?',
            'answer'   => 'It’s summer.',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide17/summer.webp'),
        ],
        [
            'question' => 'What season is it?',
            'answer'   => 'It’s autumn.',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide17/automne.webp'),
        ],
        [
            'question' => 'What season is it?',
            'answer'   => 'It’s winter.',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide17/winter.webp'),
        ],
        [
            'question' => 'In what season do you play in the snow?',
            'answer'   => 'In winter.',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide17/winter.webp'),
        ],
        [
            'question' => 'In what season do you go to the beach?',
            'answer'   => 'In summer.',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide17/summer.webp'),
        ],
        [
            'question' => 'What is the weather like?',
            'answer'   => 'It’s sunny.',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/sunny.webp'),
        ],
        [
            'question' => 'What is the weather like?',
            'answer'   => 'It’s rainy.',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/rainy.webp'),
        ],
        [
            'question' => 'What is the weather like?',
            'answer'   => 'It’s cold.',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide5/cold.webp'),
        ],
        [
            'question' => 'Is it humid and sticky?',
            'answer'   => 'Yes, it is!',
            'image'    => materialAsset('slider/A2/Beginner/chapter-1/slide17/humid.webp'),
        ],
    ],
], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])