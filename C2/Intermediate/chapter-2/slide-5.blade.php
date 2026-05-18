<?php

$content = [
    'title' => 'Useful Language',
    'subtitle' => '',
    'groups' => [
        [
            'key' => 'shipping-service-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'There seems to be an issue with my package.',
                    'emoji' => '⚠️',
                    'description' => 'Reporting a problem',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/there-seems-to-be-an-issue-with-my-package.mp3'),
                ],
                [
                    'text' => 'Could you assist me, please?',
                    'emoji' => '🙋',
                    'description' => 'Asking for help',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/could-you-assist-me-please.mp3'),
                ],
                [
                    'text' => 'Just to confirm, it will arrive by...?',
                    'emoji' => '🔍',
                    'description' => 'Clarifying details',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/just-to-confirm-it-will-arrive-by.mp3'),
                ],
                [
                    'text' => 'Is it possible to upgrade my shipment?',
                    'emoji' => '🚀',
                    'description' => 'Requesting upgrade',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/is-it-possible-to-upgrade-my-shipment.mp3'),
                ],
                [
                    'text' => 'I really appreciate your assistance.',
                    'emoji' => '🙏',
                    'description' => 'Thanking politely',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/i-really-appreciate-your-assistance.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])