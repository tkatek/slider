<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',

    'items' => [
        [
            'text'  => 'Savings account',
            'emoji' => '💰',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter9/Savings-account.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-12/img/slide9/Saving-account.webp'),
        ],
        [
            'text'  => 'Current account',
            'emoji' => '💳',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter9/Current-account.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-12/img/slide9/Current-account.webp'),
        ],
        [
            'text'  => 'Deposit',
            'emoji' => '➕',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter9/Deposit.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-12/img/slide9/Deposit.webp'),
        ],
        [
            'text'  => 'Withdraw',
            'emoji' => '➖',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter9/Withdraw.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-12/img/slide9/Withdraw.webp'),
        ],
        [
            'text'  => 'Bank statement',
            'emoji' => '📄',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter9/Bank-statement.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-12/img/slide9/Bank-statement.webp'),
        ],
        [
            'text'  => 'Balance',
            'emoji' => '⚖️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter9/Balance.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-12/img/slide9/Balance.webp'),
        ],
        [
            'text'  => 'Sign',
            'emoji' => '✍️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter9/Sign.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-12/img/slide9/Sign.webp'),
        ],
        [
            'text'  => 'Transfer',
            'emoji' => '🔄',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter9/Transfer.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-12/img/slide9/Transfer.webp'),
        ],
        [
            'text'  => 'Overdraw',
            'emoji' => '⚠️',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter9/Overdraw.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-12/img/slide9/Overdraw.webp'),
        ],
        [
            'text'  => 'Bank branch',
            'emoji' => '🏦',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter9/Bank-branch.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-12/img/slide9/Bank-branch.webp'),
        ],
        [
            'text'  => 'Transactions',
            'emoji' => '🧾',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter9/Transactions.mp3'),
            'image' => materialAsset('slider/A1/Beginner/chapter-12/img/slide9/Transactions.webp'),
        ],
        [
            'text'  => 'ATM',
            'emoji' => '🏧',
            'sound' => materialAsset('slider/A1/Beginner/chapter-12/audios/chapter9/Atm.mpeg'),
            'image' => materialAsset('slider/A1/Beginner/chapter-12/img/slide9/Atm.webp'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])