<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-1/'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-1/img/slide9.webp'),
    'isQuiz'    => 0,

    'questions' => [],

    'subtitles'  => [
        [
            'start' => 0,
            'end'   => 5,
            'text'  => 'How would you describe a job which you like?',
        ],
        [
            'start' => 5,
            'end'   => 10,
            'text'  => 'Of course you could use general adjectives like',
        ],
        [
            'start' => 10,
            'end'   => 15,
            'text'  => 'good and interesting which are fine but very basic.',
        ],
        [
            'start' => 15,
            'end'   => 21,
            'text'  => 'Here are some specific positive adjectives you could use:',
        ],
        [
            'start' => 21,
            'end'   => 24,
            'text'  => 'stimulating',
        ],
        [
            'start' => 24,
            'end'   => 27,
            'text'  => 'satisfying',
        ],
        [
            'start' => 27,
            'end'   => 30,
            'text'  => 'creative',
        ],
        [
            'start' => 30,
            'end'   => 33,
            'text'  => 'rewarding',
        ],
        [
            'start' => 33,
            'end'   => 36,
            'text'  => 'challenging',
        ],
        [
            'start' => 36,
            'end'   => 42,
            'text'  => 'And about the negative sides of your job you could say:',
        ],
        [
            'start' => 42,
            'end'   => 45,
            'text'  => 'exhausting',
        ],
        [
            'start' => 45,
            'end'   => 48,
            'text'  => 'thankless',
        ],
        [
            'start' => 48,
            'end'   => 51,
            'text'  => 'mind-numbing',
        ],
        [
            'start' => 51,
            'end'   => 54,
            'text'  => 'dead end job',
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])