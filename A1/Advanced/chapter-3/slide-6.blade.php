@php
    $content = [
        'page_title' => 'Services & Facilities Vocabulary',
        'title'      => 'Services & Facilities Vocabulary',
        'subtitle'   => 'Useful words and phrases for talking about hotel services, facilities, and guest support.',
        'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

        'items' => [
            [
                'text'     => 'check out',
                'subtitle' => 'leave the hotel and pay',
                'example'  => 'Example: I’d like to check out.',
                'emoji'    => '🧳',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/check-out.mp3'),
            ],
            [
                'text'     => 'bill',
                'subtitle' => 'paper showing how much you pay',
                'example'  => 'Example: Here is your bill.',
                'emoji'    => '🧾',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/bill.mp3'),
            ],
            [
                'text'     => 'charge',
                'subtitle' => 'extra money for a service',
                'example'  => 'Example: What is this charge for?',
                'emoji'    => '💳',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/charge.mp3'),
            ],
            [
                'text'     => 'amount',
                'subtitle' => 'total money to pay',
                'example'  => 'Example: Is the amount correct?',
                'emoji'    => '💰',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/amount.mp3'),
            ],
            [
                'text'     => 'receipt',
                'subtitle' => 'paper that shows payment',
                'example'  => 'Example: Here is your receipt.',
                'emoji'    => '📄',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/receipt.mp3'),
            ],
            [
                'text'     => 'change',
                'subtitle' => 'money you get back',
                'example'  => 'Example: Here is your change.',
                'emoji'    => '🪙',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/change.mp3'),
            ],
            [
                'text'     => 'payment',
                'subtitle' => 'money you give',
                'example'  => 'Example: How would you like to make the payment?',
                'emoji'    => '💵',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/payment.mp3'),
            ],
            [
                'text'     => 'pay by card',
                'subtitle' => 'use a bank card',
                'example'  => 'Example: Can I pay by card?',
                'emoji'    => '💳',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/pay-by-card.mp3'),
            ],
            [
                'text'     => 'passport',
                'subtitle' => 'travel ID document',
                'example'  => 'Example: May I see your passport?',
                'emoji'    => '🛂',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/passport.mp3'),
            ],
            [
                'text'     => 'key',
                'subtitle' => 'room key',
                'example'  => 'Example: Here is the key.',
                'emoji'    => '🔑',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide6/key.mp3'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.sentence-audio', ['content' => $content])