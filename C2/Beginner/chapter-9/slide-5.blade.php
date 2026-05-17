<?php

$content = [
    'page_title' => 'Useful Language',
    'title' => 'Useful Language',
    'subtitle' => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'humor-to-defuse-tension-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Looks like my calendar is playing hide and seek',
                    'emoji' => '📅',
                    'description' => 'Funny way to admit mistake',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-8/audios/slide5/looks-like-my-calendar-is-playing-hide-and-seek.mp3'),
                ],
                [
                    'text' => 'Maybe we should hire a time machine',
                    'emoji' => '⏳',
                    'description' => 'Light humor to ease stress',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-8/audios/slide5/maybe-we-should-hire-a-time-machine.mp3'),
                ],
                [
                    'text' => 'Let’s clean it up quickly',
                    'emoji' => '🧹',
                    'description' => 'Transition back to work',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-8/audios/slide5/lets-clean-it-up-quickly.mp3'),
                ],
                [
                    'text' => 'That’s one way to look at it',
                    'emoji' => '💬',
                    'description' => 'Acknowledge humor politely',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-8/audios/slide5/thats-one-way-to-look-at-it.mp3'),
                ],
                [
                    'text' => 'I didn’t see that coming',
                    'emoji' => '😅',
                    'description' => 'React to awkward but funny moments',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-8/audios/slide5/i-didnt-see-that-coming.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])