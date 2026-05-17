<?php

$content = [
    'page_title' => 'Key Vocabulary',
    'title'      => 'Key Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',

    'items' => [
        [
            'text'  => 'Wake up',
            'emoji' => '🌅',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/slide-6/wake-up.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/slide6/wake-up.webp'),
        ],
        [
            'text'  => 'Get up',
            'emoji' => '🛏️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/slide-6/get-up.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/slide6/get-up.webp'),
        ],
        [
            'text'  => 'Brush (teeth / hair)',
            'emoji' => '🪥🪮',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/slide-6/brush-teeth-or-brush-hair.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/slide6/brush-teeth-or-brush-hair.webp'),
        ],
        [
            'text'  => 'Have breakfast',
            'emoji' => '🥐🍳',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/slide-6/have-breakfast.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/slide6/have-breakfast.webp'),
        ],
        [
            'text'  => 'Go to school/work',
            'emoji' => '🏫💼',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/slide-6/go-to-school-or-go-to-work.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/slide6/go-to-school-or-go-to-work.webp'),
        ],
        [
            'text'  => 'Study / work',
            'emoji' => '📚💻',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/slide-6/study-work.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/slide6/study-work.webp'),
        ],
        [
            'text'  => 'Have lunch',
            'emoji' => '🥪🍎',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/slide-6/have-lunch.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/slide6/have-lunch.webp'),
        ],
        [
            'text'  => 'Watch TV',
            'emoji' => '📺',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/slide-6/watch-tv.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/slide6/watch-tv.webp'),
        ],
        [
            'text'  => 'Do homework',
            'emoji' => '📝',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/slide-6/do-homework.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/slide6/do-homework.webp'),
        ],
        [
            'text'  => 'Go to bed',
            'emoji' => '😴',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/slide-6/go-to-bed.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/slide6/go-to-bed.webp'),
        ],
        [
            'text'  => 'Do chores',
            'emoji' => '🧹',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/slide-6/do-chores.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/slide6/do-chores.webp'),
        ],
        [
            'text'  => 'Comb hair',
            'emoji' => '🪮',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/slide-6/comb-hair.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/slide6/comb-hair.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])