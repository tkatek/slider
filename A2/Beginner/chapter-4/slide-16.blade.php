<?php
$content = [
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Notice the following',

    'image'      => materialAsset('slider/A2/Beginner/chapter-4/img/slide16.webp'),
    'image_aspect_ratio' => '6 / 7',

    'items'      => [
        [
            'emoji' => '🧹',
            'text'  => 'Chores',
            'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide16/chores.mp3'),
        ],
        [
            'emoji' => '✨',
            'text'  => 'A clean freak',
            'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide16/a-clean-freak.mp3'),
        ],
        [
            'emoji' => '👌',
            'text'  => 'Respectable',
            'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide16/respectable.mp3'),
        ],
        [
            'emoji' => '⏳',
            'text'  => 'Put off',
            'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide16/put-off.mp3'),
        ],
        [
            'emoji' => '🧼',
            'text'  => 'Vacuum',
            'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide16/vacuum.mp3'),
        ],
        [
            'emoji' => '🪣',
            'text'  => 'Mop',
            'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide16/mop.mp3'),
        ],
        [
            'emoji' => '📝',
            'text'  => 'Need',
            'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide16/need.mp3'),
        ],
        [
            'emoji' => '🧽',
            'text'  => 'Clean',
            'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide16/clean.mp3'),
        ],
        [
            'emoji' => '🗑️',
            'text'  => 'Empty',
            'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide16/empty.mp3'),
        ],
        [
            'emoji' => '⏰',
            'text'  => 'Put off',
            'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide16/put-off.mp3'),
        ],
    ],
];
?>
@include('slider.other.newlanguage', ['content' => $content])
