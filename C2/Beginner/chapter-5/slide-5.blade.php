<?php

$content = [
    'page_title' => 'Useful Language',
    'title' => 'Useful Language',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'professional-follow-up-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'It was a pleasure meeting you',
                    'emoji' => '🤝',
                    'description' => 'Polite follow-up opening',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide5/it-was-a-pleasure-meeting-you.mp3'),
                ],
                [
                    'text' => 'I’d love to continue our discussion',
                    'emoji' => '💬',
                    'description' => 'Suggesting follow-up',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide5/id-love-to-continue-our-discussion.mp3'),
                ],
                [
                    'text' => 'Let’s schedule a time',
                    'emoji' => '📅',
                    'description' => 'Arranging next meeting',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide5/lets-schedule-a-time.mp3'),
                ],
                [
                    'text' => 'I look forward to staying in touch',
                    'emoji' => '🌐',
                    'description' => 'Closing politely',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide5/i-look-forward-to-staying-in-touch.mp3'),
                ],
                [
                    'text' => 'Please feel free to contact me anytime',
                    'emoji' => '📩',
                    'description' => 'Encouraging communication',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide5/please-feel-free-to-contact-me-anytime.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])