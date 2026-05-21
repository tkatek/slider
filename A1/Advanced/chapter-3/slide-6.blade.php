@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '1️⃣ Check-Out Vocabulary',
        'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

        'items' => [
            [
                'text'     => 'check out',
                'subtitle' => 'leave the hotel and pay',
                'example'  => 'Example: I’d like to check out.',
                'emoji'    => '🧳',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/check-out.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide6/check-out.webp'),
            ],
            [
                'text'     => 'bill',
                'subtitle' => 'paper showing how much you pay',
                'example'  => 'Example: Here is your bill.',
                'emoji'    => '🧾',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/bill.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide6/bill.webp'),
            ],
            [
                'text'     => 'charge',
                'subtitle' => 'extra money for a service',
                'example'  => 'Example: What is this charge for?',
                'emoji'    => '💳',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/charge.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide6/charge.webp'),
            ],
            [
                'text'     => 'amount',
                'subtitle' => 'total money to pay',
                'example'  => 'Example: Is the amount correct?',
                'emoji'    => '💰',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/amount.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide6/amount.webp'),
            ],
            [
                'text'     => 'receipt',
                'subtitle' => 'paper that shows payment',
                'example'  => 'Example: Here is your receipt.',
                'emoji'    => '📄',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/receipt.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide6/receipt.webp'),
            ],
            [
                'text'     => 'change',
                'subtitle' => 'money you get back',
                'example'  => 'Example: Here is your change.',
                'emoji'    => '🪙',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/change.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide6/change.webp'),
            ],
            [
                'text'     => 'payment',
                'subtitle' => 'money you give',
                'example'  => 'Example: How would you like to make the payment?',
                'emoji'    => '💵',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/payment.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide6/payment.webp'),
            ],
            [
                'text'     => 'pay by card',
                'subtitle' => 'use a bank card',
                'example'  => 'Example: Can I pay by card?',
                'emoji'    => '💳',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/pay-by-card.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide6/pay-by-card.webp'),
            ],
            [
                'text'     => 'passport',
                'subtitle' => 'travel ID document',
                'example'  => 'Example: May I see your passport?',
                'emoji'    => '🛂',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/passport.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide6/passport.webp'),
            ],
            [
                'text'     => 'key',
                'subtitle' => 'room key',
                'example'  => 'Example: Here is the key.',
                'emoji'    => '🔑',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/key.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide6/key.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])