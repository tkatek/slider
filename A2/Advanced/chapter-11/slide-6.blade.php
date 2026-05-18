<?php
$content = [
    'page_title' => 'New vocabulary',
    'title'      => 'New vocabulary',
    'subtitle'   => '',
    'popup' => 'card',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

    'items' => [
        [
            'text'     => 'Undercooked',
            'subtitle' => 'Not cooked enough',
            'emoji'    => '🥩',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide6/undercooked.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide6/undercooked.webp'),
        ],
        [
            'text'     => 'Dish',
            'subtitle' => 'A type of prepared food',
            'emoji'    => '🍽️',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide6/dish.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide6/dish.webp'),
        ],
        [
            'text'     => 'Kitchen',
            'subtitle' => 'The place where food is cooked',
            'emoji'    => '👨‍🍳',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide6/kitchen.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide6/kitchen.webp'),
        ],
        [
            'text'     => 'Chef',
            'subtitle' => 'The main cook in a restaurant',
            'emoji'    => '🧑‍🍳',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide6/chef.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide6/chef.webp'),
        ],
        [
            'text'     => 'Patience',
            'subtitle' => 'Waiting calmly',
            'emoji'    => '⏳',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide6/patience.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide6/patience.webp'),
        ],
        [
            'text'     => 'Offer',
            'subtitle' => 'To give something',
            'emoji'    => '🤲',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide6/offer.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide6/offer.webp'),
        ],
        [
            'text'     => 'Free Drink',
            'subtitle' => 'A drink with no cost',
            'emoji'    => '🥤',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide6/free-drink.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide6/free-drink.webp'),
        ],
        [
            'text'     => 'Bill',
            'subtitle' => 'The paper showing the total cost',
            'emoji'    => '🧾',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide6/bill.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide6/bill.webp'),
        ],
        [
            'text'     => 'Remove From The Bill',
            'subtitle' => 'Not charge money for something',
            'emoji'    => '❌',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide6/remove-from-the-bill.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide6/remove-from-the-bill.webp'),
        ],
        [
            'text'     => 'Make Sure',
            'subtitle' => 'Check carefully',
            'emoji'    => '✅',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-11/audios/slide6/make-sure.mp3'),
            'image'    => materialAsset('slider/A2/Advanced/chapter-11/img/slide6/make-sure.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])