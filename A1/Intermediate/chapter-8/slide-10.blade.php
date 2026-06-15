<?php
$content = [
    'title'    => 'Listening time',
    'subtitle' => "Elliot tells Louise about a holiday he’s planned. Listen and choose the correct answers",
    'type'=>'audio',
    'audio'    => materialAsset("slider/A1/Intermediate/chapter-8/audios/slide9.mp3"),
    'script'   => [
        "ELLIOT: Hi, Louise! Here's your coffee.",
        'LOUISE: Thanks, Elliot. When is our next meeting?',
        'ELLIOT: In half an hour.',
        'LOUISE: Good. You look happy today.',
        'ELLIOT: Yes, I feel happy.',
        'LOUISE: Oh! Good news?',
        "ELLIOT: Yes! I'm going to go on holiday!",
        'LOUISE: Really? Where are you going to go?',
        'ELLIOT: Stockholm in Sweden. One week.',
        'LOUISE: Very nice!',
        'ELLIOT: Yes. The travel agent had cheap tickets and a hotel.',
        'LOUISE: Lucky you!',
        "ELLIOT: Yes. We're going to stay in a nice hotel. It has a swimming pool and free Wi-Fi.",
        'LOUISE: When are you going to go?',
        'ELLIOT: At the end of next month.',
        'LOUISE: End of May? The weather is warmer then.',
        'ELLIOT: Really?',
        'LOUISE: Yes. I have a friend in Stockholm. Her name is Karin. You can email her for help. I can give you her email address.',
        "ELLIOT: That's great! Thanks, Louise!",
        'LOUISE: No problem.',
    ],

    'questions' => [
        [
            'prompt'  => 'Elliot booked his holiday . . . . . .',
            'correct' => 'At a travel agency',
            'options' => ['Online', 'At a travel agency'],
        ],
        [
            'prompt'  => 'He’s going to Stockholm for a . . . . . .',
            'correct' => 'Week',
            'options' => ['Weekend', 'Week'],
        ],
        [
            'prompt'  => 'He’s going to stay in a . . . . . .',
            'correct' => '4-star hotel',
            'options' => ['3-star hotel', '4-star hotel'],
        ],
        [
            'prompt'  => 'Elliot is going in . . . . . .',
            'correct' => 'May',
            'options' => ['March', 'May'],
        ],
        [
            'prompt'  => '. . . . . . has a friend called Karin in Stockholm.',
            'correct' => 'Louise',
            'options' => ['Louise', 'Elliot'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
