<?php

$content = [
    'page_title' => '',
    'title' => 'Slang time!',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'humor-to-defuse-tension-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Looks like my calendar is playing hide and seek',
                    'emoji' => '📅',
                    'description' => 'Keep calm under pressure',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-8/audios/slide12/looks-like-my-calendar-is-playing-hide-and-seek.mp3'),
                ],
                [
                    'text' => 'Maybe we should hire a time machine',
                    'emoji' => '⏳',
                    'description' => 'Take charge of conversation',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-8/audios/slide12/maybe-we-should-hire-a-time-machine.mp3'),
                ],
                [
                    'text' => 'Let’s clean it up quickly',
                    'emoji' => '🧹',
                    'description' => 'Respond politely and tactfully',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-8/audios/slide12/lets-clean-it-up-quickly.mp3'),
                ],
                [
                    'text' => 'That’s one way to look at it',
                    'emoji' => '💬',
                    'description' => 'Transform embarrassment into confidence',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-8/audios/slide12/thats-one-way-to-look-at-it.mp3'),
                ],
                [
                    'text' => 'I didn’t see that coming',
                    'emoji' => '😅',
                    'description' => 'Appear professional and reliable',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-8/audios/slide12/i-didnt-see-that-coming.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])