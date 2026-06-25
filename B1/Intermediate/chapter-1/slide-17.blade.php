<?php

$content = [
    'type'       => 'audio',
    'title'      => 'Practice 8',
    'subtitle'   => 'Listen & then choose the right answer',


    'questions' => [
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/1.mp3'),
            'prompt'  => 'Sarah is always early for class. She . . . . . . . be very organized.',
            'correct' => 'must',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/2.mp3'),
            'prompt'  => 'Tom has been studying all night. He . . . . . . . pass the test tomorrow.',
            'correct' => 'might',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/3.mp3'),
            'prompt'  => 'The sun is shining, and there are no clouds in the sky. It . . . . . . . be a beautiful day.',
            'correct' => 'must',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/4.mp3'),
            'prompt'  => 'I can’t find my keys anywhere. I . . . . . . . have left them at home.',
            'correct' => 'might',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/5.mp3'),
            'prompt'  => 'Jenny is really good at math. She . . . . . . . be struggling with this problem.',
            'correct' => "can’t",
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/6.mp3'),
            'prompt'  => 'It’s raining outside, so you . . . . . . . get wet if you go without an umbrella.',
            'correct' => 'could',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/7.mp3'),
            'prompt'  => 'The movie starts in 10 minutes, and we’re still at home. We . . . . . . . hurry.',
            'correct' => 'must',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/8.mp3'),
            'prompt'  => 'Mark is absent again today. He . . . . . . . be sick.',
            'correct' => 'might',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/9.mp3'),
            'prompt'  => 'The cake is gone, and there are crumbs on the table. It . . . . . . . have been delicious.',
            'correct' => 'must',
            'options' => ['might', 'must', "can’t", 'could'],
        ],
        [
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-1/audios/slide17/10.mp3'),
            'prompt'  => 'They’ve been practicing for the concert for weeks. They . . . . . . . be unprepared.',
            'correct' => "can’t",
            'options' => ['might', 'must', "can’t", 'could'],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])