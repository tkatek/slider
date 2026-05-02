<?php
$content = [
    'page_title' => 'New Vocabulary & Expressions',
    'title'      => 'New Vocabulary & Expressions',
    'subtitle'   => '',
    'groups'     => [
        [
            'key'        => 'actions-to-solve-problems',
            'title'      => '3 - Actions to Solve Problems',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',
            'items'      => [
                [
                    'text'     => 'Hang on',
                    'subtitle' => 'Wait for a short time',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide11/hang-on.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide11/hang-on.webp'),
                ],
                [
                    'text'     => 'Move somewhere else',
                    'subtitle' => 'Change place to get better signal',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide11/move-somewhere-else.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide11/move-somewhere-else.webp'),
                ],
                [
                    'text'     => 'Try calling again',
                    'subtitle' => 'Attempt to call another time',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide11/try-calling-again.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide11/try-calling-again.webp'),
                ],
            ],
        ],
        [
            'key'        => 'everyday-communication-expressions',
            'title'      => '4 - Everyday Communication Expressions',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',
            'items'      => [
                [
                    'text'     => "What's up?",
                    'subtitle' => 'Informal greeting: how are you?',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide11/whats-up.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide11/whats-up.webp'),
                ],
                [
                    'text'     => 'Just calling to say hi',
                    'subtitle' => 'Calling for a friendly reason',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide11/just-calling-to-say-hi.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide11/just-calling-to-say-hi.webp'),
                ],
                [
                    'text'     => "How's your day going?",
                    'subtitle' => "Asking about someone's day",
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide11/hows-your-day-going.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide11/hows-your-day-going.webp'),
                ],
                [
                    'text'     => 'I guess',
                    'subtitle' => 'Not sure; maybe',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide11/i-guess.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide11/i-guess.webp'),
                ],
                [
                    'text'     => 'Actually',
                    'subtitle' => 'Used to introduce new or surprising information',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide11/actually.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide11/actually.webp'),
                ],
                [
                    'text'     => 'Exciting news',
                    'subtitle' => 'Interesting or happy news',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide11/exciting-news.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide11/exciting-news.webp'),
                ],
                [
                    'text'     => 'Go on',
                    'subtitle' => 'Continue speaking',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide11/go-on.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide11/go-on.webp'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])
