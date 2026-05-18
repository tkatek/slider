<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Useful Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',

    'items' => [
        [
            'text'             => 'Proof Of Address',
            'subtitle'         => 'Official document showing where you live',
            'example_subtitle' => 'Bring a utility bill as proof of address.',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-3/audios/slide4/proof-of-address.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-3/img/slide4/proof-of-address.webp'),
        ],
        [
            'text'             => 'Maintenance Fee',
            'subtitle'         => 'Monthly charge for account',
            'example_subtitle' => 'This account has a $5 maintenance fee.',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-3/audios/slide4/maintenance-fee.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-3/img/slide4/maintenance-fee.webp'),
        ],
        [
            'text'             => 'Debit Card',
            'subtitle'         => 'Card to withdraw or pay money',
            'example_subtitle' => 'I’d like a debit card for my account.',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-3/audios/slide4/debit-card.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-3/img/slide4/debit-card.webp'),
        ],
        [
            'text'             => 'Minimum Balance',
            'subtitle'         => 'Least money required in account',
            'example_subtitle' => 'Keep $500 to avoid the fee.',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-3/audios/slide4/minimum-balance.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-3/img/slide4/minimum-balance.webp'),
        ],
        [
            'text'             => 'Automatic Payment',
            'subtitle'         => 'Bills deducted automatically',
            'example_subtitle' => 'I set up automatic payments for utilities.',
            'sound'            => materialAsset('slider/C2/Intermediate/chapter-3/audios/slide4/automatic-payment.mp3'),
            'image'            => materialAsset('slider/C2/Intermediate/chapter-3/img/slide4/automatic-payment.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])