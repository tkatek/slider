<?php

$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-5 lg:grid-cols-5',

    'items' => [
        [
            'text'     => 'Loud',
            'subtitle' => 'Making a lot of noise',
            'emoji'    => '🔊',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-10/audios/slide5/loud.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-10/img/slide5/loud.webp'),
        ],
        [
            'text'     => 'Turn it down',
            'subtitle' => 'Make the volume lower',
            'emoji'    => '🔉',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-10/audios/slide5/turn-it-down.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-10/img/slide5/turn-it-down.webp'),
        ],
        [
            'text'     => 'Security',
            'subtitle' => 'People responsible for safety in a building',
            'emoji'    => '🛡️',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-10/audios/slide5/security.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-10/img/slide5/security.webp'),
        ],
        [
            'text'     => 'Resident',
            'subtitle' => 'A person who lives in a place',
            'emoji'    => '🏠',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-10/audios/slide5/resident.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-10/img/slide5/resident.webp'),
        ],
        [
            'text'     => 'Report a problem',
            'subtitle' => 'Officially tell about a problem',
            'emoji'    => '📢',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-10/audios/slide5/report-a-problem.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-10/img/slide5/report-a-problem.webp'),
        ],
        [
            'text'     => 'Specific',
            'subtitle' => 'Clear and exact',
            'emoji'    => '🎯',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-10/audios/slide5/specific.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-10/img/slide5/specific.webp'),
        ],
        [
            'text'     => 'Building policy',
            'subtitle' => 'Official building rules',
            'emoji'    => '📋',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-10/audios/slide5/building-policy.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-10/img/slide5/building-policy.webp'),
        ],
        [
            'text'     => 'Uncomfortable',
            'subtitle' => 'Not relaxed or not happy',
            'emoji'    => '😟',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-10/audios/slide5/uncomfortable.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-10/img/slide5/uncomfortable.webp'),
        ],
        [
            'text'     => 'Make a report',
            'subtitle' => 'Write official information about a problem',
            'emoji'    => '📝',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-10/audios/slide5/make-a-report.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-10/img/slide5/make-a-report.webp'),
        ],
        [
            'text'     => 'Duty',
            'subtitle' => 'Responsibility or job',
            'emoji'    => '✅',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-10/audios/slide5/duty.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-10/img/slide5/duty.webp'),
        ],
    ],
];

?>

@include("slider.vocab.image-card", ['content' => $content])