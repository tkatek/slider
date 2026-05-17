<?php

$content = [
    'page_title' => 'Types of shops:',
    'title'      => 'Types of shops:',
    'subtitle'   => 'Where can you buy ...?',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',

    'items' => [
        [
            'text'  => 'Grocery Store',
            'emoji' => '🛒',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/grocery-store.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/grocery-store.webp'),
        ],
        [
            'text'  => 'Bakery',
            'emoji' => '🥖',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/bakery.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/bakery.webp'),
        ],
        [
            'text'  => 'Pharmacy / Chemist',
            'emoji' => '💊',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/pharmacy.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/pharmacy.webp'),
        ],
        [
            'text'  => 'Clothing Store',
            'emoji' => '👗',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/clothing-store.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/clothing-store.webp'),
        ],
        [
            'text'  => 'Shoe Store',
            'emoji' => '👟',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/shoe-store.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/shoestore.webp'),
        ],
        [
            'text'  => 'Bookstore',
            'emoji' => '📚',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/bookstore.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/bookstore.webp'),
        ],
        [
            'text'  => 'Toy Store',
            'emoji' => '🧸',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/toy-store.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/toy.webp'),
        ],
        [
            'text'  => 'Hardware Store',
            'emoji' => '🔧',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/hardware-store.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/hardware.webp'),
        ],
        [
            'text'  => 'Electronics Store',
            'emoji' => '💻',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/electronics-store.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/electronics.webp'),
        ],
        [
            'text'  => 'Jewelry Store',
            'emoji' => '💍',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/jewelry-store.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/jewelry.webp'),
        ],
        [
            'text'  => 'Flower Shop',
            'emoji' => '🌸',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/flower-shop.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/flower.webp'),
        ],
        [
            'text'  => 'Pet Store',
            'emoji' => '🐶',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/pet-store.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/pet-store.webp'),
        ],
        [
            'text'  => 'Convenience Store',
            'emoji' => '🏪',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/convenience-store.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/convenience-store.webp'),
        ],
        [
            'text'  => 'Stationery',
            'emoji' => '✏️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/stationery.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/stationery.webp'),
        ],
        [
            'text'  => 'Furniture',
            'emoji' => '🛋️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/furniture.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/furniture.webp'),
        ],
        [
            'text'  => 'Gift Shop',
            'emoji' => '🎁',
            'sound' => materialAsset('slider/A1/Beginner/chapter-10/audios/slide13/gift-shop.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-10/img/slide13/gift-shop.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])