<?php
$content = [

    'title'      => 'Let’s watch this video',
    'subtitle'   => 'Practice reading the sentences',
    'shorts'     => [
        [
            'src' => materialAsset(''),
            'thumbnail' => materialAsset(''),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,  'end' => 4,  'text' => 'Amy reads a book. A book is read.'],
                ['start' => 4,  'end' => 8,  'text' => 'He opens the door. The door is opened.'],
                ['start' => 8,  'end' => 12, 'text' => 'She plays the piano. The piano is played.'],
                ['start' => 12, 'end' => 16, 'text' => 'I kick the ball. The ball is kicked by me.'],
                ['start' => 16, 'end' => 20, 'text' => 'They eat fruits. Fruits are eaten.'],
                ['start' => 20, 'end' => 24, 'text' => 'We watch a movie. A movie is watched.'],
                ['start' => 24, 'end' => 28, 'text' => 'The kids love ice cream. Ice cream is loved.'],
                ['start' => 28, 'end' => 32, 'text' => 'They clean the house. The house is cleaned.'],
                ['start' => 32, 'end' => 36, 'text' => 'She sings a song. A song is sung.'],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])
