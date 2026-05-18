<?php
$content = [
    'page_title' => 'New Vocabulary & Expressions',
    'title'      => 'New Vocabulary & Expressions',
    'subtitle'   => '',
    'groups'     => [
        [
            'key'        => 'communication-problems',
            'title'      => '1 - Communication Problems',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-6',
            'items'      => [
                [
                    'text'     => 'Signal',
                    'subtitle' => 'The connection for phone communication',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide10/siignal.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide10/signal.webp'),
                ],
                [
                    'text'     => 'Weak signal',
                    'subtitle' => 'A poor or low connection',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide10/weak-signal.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide10/weak-signal.webp'),
                ],
                [
                    'text'     => 'Cut off',
                    'subtitle' => 'When a call suddenly stops',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide10/cut-off.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide10/cut-off.webp'),
                ],
                [
                    'text'     => 'Hang up',
                    'subtitle' => 'To end a phone call',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide10/hang-up.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide10/hang-up.webp'),
                ],
                [
                    'text'     => 'Hang on',
                    'subtitle' => 'Wait',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide10/hang-on.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide10/hang-on.webp'),
                ],
                [
                    'text'     => 'Call back',
                    'subtitle' => 'To call again later',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide10/call-back.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide10/call-back.webp'),
                ],
            ],
        ],
        [
            'key'        => 'understanding-hearing-problems',
            'title'      => '2 - Understanding & Hearing Problems',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',
            'items'      => [
                [
                    'text'     => "I can't hear you",
                    'subtitle' => "I don't hear your voice",
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide10/i-cant-hear-you.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide10/i-cant-hear-you.webp'),
                ],
                [
                    'text'     => 'Hear properly',
                    'subtitle' => 'Hear clearly and correctly',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide10/hear-properly.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide10/hear-properly.webp'),
                ],
                [
                    'text'     => 'A bit',
                    'subtitle' => 'A little',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide10/a-bit.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide10/a-bit.webp'),
                ],
                [
                    'text'     => 'Is that better?',
                    'subtitle' => 'Checking if the situation improved',
                    'sound'    => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide10/is-that-better.mp3'),
                    'image'    => materialAsset('slider/A2/Intermediate/chapter-10/img/slide10/is-that-better.webp'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])
