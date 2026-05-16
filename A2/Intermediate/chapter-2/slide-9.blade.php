
<?php
$content = [
    'video'      => materialAsset('slider/A2/Intermediate/chapter-2/video/passive-voice-encrypted/passive-voice.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-2/img/slide9.webp'),
    'isQuiz'     => 0,
    'questions' => [],
    'subtitles' => [
        ['start' => 0,  'end' => 4.5,  'text' => 'Amy reads a book. A book is read by Amy'],
        ['start' => 5,  'end' => 9.5,  'text' => 'He opens the door. The door is opened by him'],
        ['start' => 10,  'end' => 15.5, 'text' => 'She plays the piano. The piano is played by her.'],
        ['start' => 16, 'end' => 20, 'text' => 'I kick the ball. The ball is kicked by me.'],
        ['start' => 20, 'end' => 24, 'text' => 'They eat fruits. Fruits are eaten by them'],
        ['start' => 24, 'end' => 28.5, 'text' => 'We watch a movie. A movie is watched by us.'],
        ['start' => 28.7, 'end' => 34, 'text' => 'The kids love ice cream. Ice cream is loved by the kids.'],
        ['start' => 34.5, 'end' => 39, 'text' => 'They clean the house. The house is cleaned by them.'],
        ['start' => 39.5, 'end' => 43, 'text' => 'She sings a song. A song is sung by her.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])
