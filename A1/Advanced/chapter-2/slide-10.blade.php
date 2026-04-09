@php
    $content = [
        'page_title' => 'New Vocabulary',
        'title'      => 'New Vocabulary',
        'subtitle'   => '',
        'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

        'items' => [
            [
                'text'  => 'Catch (a plane)',
                'emoji' => '✈️',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/catch-plane.mp3'),
            ],
            [
                'text'  => 'Miss (a plane)',
                'emoji' => '😟',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/miss-plane.mp3'),
            ],
            [
                'text'  => 'Arrange a (wake up) call',
                'emoji' => '⏰',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/arrange.mp3'),
            ],
            [
                'text'  => 'Settle (my) bill',
                'emoji' => '🧾',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/settle.mp3'),
            ],
            [
                'text'  => 'Order a (meal)',
                'emoji' => '🍽️',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/order-meal.mp3'),
            ],
            [
                'text'  => 'Get clothes dry cleaned',
                'emoji' => '👕',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/clothes-dry-cleaned.mp3'),
            ],
            [
                'text'  => 'Get my room cleaned',
                'emoji' => '🧹',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/room-cleaned.mp3'),
            ],
            [
                'text'  => 'Get a ticket',
                'emoji' => '🎫',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/get-ticket.mp3'),
            ],
            [
                'text'  => 'Front desk',
                'emoji' => '🛎️',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/front-desk.mp3'),
            ],
            [
                'text'  => 'Laundry',
                'emoji' => '🧺',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/laundry.mp3'),
            ],
            [
                'text'  => 'Concierge',
                'emoji' => '📞',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/concierge.mp3'),
            ],
            [
                'text'  => 'Bell Captain',
                'emoji' => '🧳',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/bell-captain.mp3'),
            ],
            [
                'text'  => 'Room service',
                'emoji' => '🍲',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/room-service.mp3'),
            ],
            [
                'text'  => 'Housekeeping',
                'emoji' => '🧼',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/housekeeping.mp3'),
            ],
            [
                'text'  => 'Gift shop',
                'emoji' => '🎁',
                'sound' => materialAsset('slider/A1/Advanced/chapter-2/audios/slide10/gift-shop.mp3'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.sentence-audio', ['content' => $content])