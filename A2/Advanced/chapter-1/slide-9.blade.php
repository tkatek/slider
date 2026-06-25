<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-1/videos/describe-job-encrypted/describe-job.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-1/img/slide9.webp'),
    'isQuiz'    => 0,

    'questions' => [],

    'subtitles'  => [
        [
            'start' => 0,
            'end'   => 4,
            'text'  => 'How would you describe a job which you like?',
        ],
        [
            'start' => 4.5,
            'end'   => 7.5,
            'text'  => 'Of course you could use general adjectives like',
        ],
        [
            'start' => 7.5,
            'end'   => 11,
            'text'  => 'good and interesting which are fine but very basic.',
        ],
        [
            'start' => 11.5,
            'end'   => 15,
            'text'  => 'Here are some specific positive adjectives you could use:',
        ],
        [
            'start' => 16,
            'end'   => 18,
            'text'  => 'stimulating',
        ],
        [
            'start' => 18,
            'end'   => 20,
            'text'  => 'satisfying',
        ],
        [
            'start' => 21.5,
            'end'   => 23,
            'text'  => 'creative',
        ],
        [
            'start' => 24,
            'end'   => 26,
            'text'  => 'rewarding',
        ],
        [
            'start' => 27,
            'end'   => 29,
            'text'  => 'challenging',
        ],
        [
            'start' => 29.5,
            'end'   => 33,
            'text'  => 'And about the negative sides of your job you could say:',
        ],
        [
            'start' => 33,
            'end'   => 35,
            'text'  => 'exhausting',
        ],
        [
            'start' => 36,
            'end'   => 38,
            'text'  => 'thankless',
        ],
        [
            'start' => 38,
            'end'   => 40,
            'text'  => 'mind-numbing',
        ],
        [
            'start' => 41.5,
            'end'   => 43.5,
            'text'  => 'dead end job',
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])