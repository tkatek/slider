<?php
$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-5',

    'items' => [
        [
            'text'     => 'Goal setting',
            'subtitle' => 'Deciding what you want to achieve',
            'emoji'    => '🎯',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-7/audios/slide5/goal-setting.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-7/img/slide5/goal-setting.webp'),
        ],
        [
            'text'     => 'Productivity',
            'subtitle' => 'How much work you complete',
            'emoji'    => '⚡',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-7/audios/slide5/productivity.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-7/img/slide5/productivity.webp'),
        ],
        [
            'text'     => 'Accomplish',
            'subtitle' => 'Achieve or finish something',
            'emoji'    => '✅',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-7/audios/slide5/accomplish.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-7/img/slide5/accomplish.webp'),
        ],
        [
            'text'     => 'Measurable',
            'subtitle' => 'Something you can measure or check',
            'emoji'    => '📏',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-7/audios/slide5/measurable.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-7/img/slide5/measurable.webp'),
        ],
        [
            'text'     => 'Attainable',
            'subtitle' => 'Possible to achieve',
            'emoji'    => '🏁',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-7/audios/slide5/attainable.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-7/img/slide5/attainable.webp'),
        ],
        [
            'text'     => 'Relevant',
            'subtitle' => 'Important and connected to your life',
            'emoji'    => '🔗',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-7/audios/slide5/relevant.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-7/img/slide5/relevant.webp'),
        ],
        [
            'text'     => 'Deadline',
            'subtitle' => 'The final time to finish something',
            'emoji'    => '⏰',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-7/audios/slide5/deadline.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-7/img/slide5/deadline.webp'),
        ],
        [
            'text'     => 'Urgency',
            'subtitle' => 'The feeling that something must be done quickly',
            'emoji'    => '🚨',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-7/audios/slide5/urgency.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-7/img/slide5/urgency.webp'),
        ],
        [
            'text'     => 'Achieve',
            'subtitle' => 'Successfully reach a goal',
            'emoji'    => '🏆',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-7/audios/slide5/achieve.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-7/img/slide5/achieve.webp'),
        ],
        [
            'text'     => 'Celebrate',
            'subtitle' => 'Do something special after success',
            'emoji'    => '🎉',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-7/audios/slide5/celebrate.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-7/img/slide5/celebrate.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])