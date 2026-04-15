<?php
$content = [
    'page_title' => '',
    'title' => 'Practice 2',
    'subtitle' => " Let's remember some places around town",
    'type' => 'letters',
    'hide_status_bar' => true,
    'questions' => [
        [
            'answer' => 'Park',
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide16/3.webp'),
        ],
        [
            'answer' => 'Police Station',
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide5/police.webp'),
        ],
        [
            'answer' => 'School',
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/school.webp'),
        ],
        [
            'answer' => 'Cafe',
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/cafe.webp'),
        ],
        [
            'answer' => 'Supermarket',
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/supermarket.webp'),
        ],
        [
            'answer' => 'Market',
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide5/market.webp'),
        ],
        [
            'answer' => 'Post Office',
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide5/post-office.webp'),
        ],
        [
            'answer' => 'Mosque',
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide5/mosque.webp'),
        ],
        [
            'answer' => 'Library',
            'image' => materialAsset('slider/A1/Advanced/chapter-9/img/slide7/library.webp'),
        ],
        [
            'answer' => 'Health Centre',
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide5/health-center.webp'),
        ],
        [
            'answer' => 'Takeaway',
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide5/take-out.webp'),
        ],
        [
            'answer' => 'Shops',
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide5/shops.webp'),
        ],
        [
            'answer' => 'Community Centre',
            'image' => materialAsset('slider/A1/Advanced/chapter-8/img/slide5/community-center.webp'),
        ],
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
