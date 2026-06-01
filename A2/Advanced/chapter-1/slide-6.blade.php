<?php
$content = [
    'title' => 'New Vocabulary',
    'subtitle' => '',
    'image_text_style' => 'overlay',

    'groups' => [
        [
            'key' => 'new_jobs',
            'title' => 'New jobs',
            'grid_class' => 'grid-cols-1 sm:grid-cols-3',
            'items' => [
                [
                    'text' => 'the head of design',
                    'emoji' => '🎨',
                    'description' => 'a person who leads the design team and plans creative work',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide6/the-head-of-design.mp3'),
                ],
                [
                    'text' => 'a content producer',
                    'emoji' => '🎬',
                    'description' => 'a person who creates stories, videos, or posts',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide6/a-content-producer.mp3'),
                ],
                [
                    'text' => 'social media and marketing',
                    'emoji' => '📱',
                    'description' => 'a person who shares information online to help a company get noticed',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide6/social-media-and-marketing.mp3'),
                ],
            ],
        ],
        [
            'key' => 'work_words',
            'title' => 'Work words',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4',
            'items' => [
                [
                    'text' => 'manage',
                    'emoji' => '🧭',
                    'description' => '',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide6/manage.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide6/manage.webp'),
                ],
                [
                    'text' => 'responsible for',
                    'emoji' => '✅',
                    'description' => '',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide6/responsible-for.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide6/responsible-for.webp'),
                ],
                [
                    'text' => 'permanent',
                    'emoji' => '📌',
                    'description' => '',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide6/permanent.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide6/permanent.webp'),
                ],
                [
                    'text' => 'well-paid # badly-paid',
                    'emoji' => '💰',
                    'description' => '',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide6/well-paid-badly-paid.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide6/well-paid-badly-paid.webp'),
                ],
                [
                    'text' => 'full-time # part-time',
                    'emoji' => '⏰',
                    'description' => '',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide6/full-time-part-time.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide6/full-time-part-time.webp'),
                ],
                [
                    'text' => 'challenging',
                    'emoji' => '🧩',
                    'description' => '',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide6/challenging.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide6/challenging.webp'),
                ],
                [
                    'text' => 'dull',
                    'emoji' => '😐',
                    'description' => '',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide6/dull.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide6/dull.webp'),
                ],
                [
                    'text' => 'stressful',
                    'emoji' => '😣',
                    'description' => '',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide6/stressful.mp3'),
                    'image' => materialAsset('slider/A2/Advanced/chapter-1/img/slide6/stressful.webp'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])