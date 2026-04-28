<?php
$content = [
    'page_title' => 'Practice 2',
    'title' => 'Practice 2',
    'subtitle' => '• Do you remember any of your important occasions?<br>• Can you name some of them?',
    'practice_note' => 'Drag & drop the pictures with the right definition',
    'pool_item_type' => 'image',
    'items_per_line' => 4,
    'items_per_line_mobile' => 2,
    'desktop_game_width' => 65,
    'desktop_pool_width' => 35,
    'categories' => [
        'wedding' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide7/wedding-reception.webp'),
                    'alt' => 'wedding',
                ],
            ],
        ],
        'birthday party' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide7/birthday-party.webp'),
                    'alt' => 'birthday party',
                ],
            ],
        ],
        'carnival' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide5/carnival.webp'),
                    'alt' => 'carnival',
                ],
            ],
        ],
        'graduation party' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide7/graduation.webp'),
                    'alt' => 'graduation party',
                ],
            ],
        ],
        'Christmas celebration' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide7/christmas.webp'),
                    'alt' => 'Christmas celebration',
                ],
            ],
        ],
        'New Year party' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide5/new-year-party.webp'),
                    'alt' => 'New Year party',
                ],
            ],
        ],
        'anniversary' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide5/anniversary.webp'),
                    'alt' => 'anniversary',
                ],
            ],
        ],
        'baby shower' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide7/birth-baby.webp'),
                    'alt' => 'baby shower',
                ],
            ],
        ],
        'festival' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide5/festival.webp'),
                    'alt' => 'festival',
                ],
            ],
        ],
        'engagement' => [
            'emoji' => '',
            'items' => [
                [
                    'image' => materialAsset('slider/A1/Intermediate/chapter-2/img/slide7/engagement.webp'),
                    'alt' => 'engagement',
                ],
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])
