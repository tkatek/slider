<?php

$content = [
    'title' => 'Useful Language',
    'subtitle' => '',
    'groups' => [
        [
            'key' => 'banking-service-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'I’d like to open a savings/checking account.',
                    'emoji' => '🏦',
                    'description' => 'Opening An Account',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/id-like-to-open-a-savings-checking-account.mp3'),
                ],
                [
                    'text' => 'Could you explain the fees, please?',
                    'emoji' => '❓',
                    'description' => 'Asking For Clarification',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/could-you-explain-the-fees-please.mp3'),
                ],
                [
                    'text' => 'Just to confirm, the debit card arrives in 5–7 days?',
                    'emoji' => '✅',
                    'description' => 'Confirming Details',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/just-to-confirm-the-debit-card-arrives-in-5-7-days.mp3'),
                ],
                [
                    'text' => 'Can I set up automatic bill payments?',
                    'emoji' => '💳',
                    'description' => 'Requesting Additional Services',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/can-i-set-up-automatic-bill-payments.mp3'),
                ],
                [
                    'text' => 'Thank you for your assistance.',
                    'emoji' => '🙏',
                    'description' => 'Thanking Politely',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/thank-you-for-your-assistance.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])