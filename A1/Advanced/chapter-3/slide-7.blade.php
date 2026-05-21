@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '2️⃣ Services & Facilities Vocabulary',
        'grid_class' => 'grid-cols-2 sm:grid-cols-4',

        'items' => [
            [
                'text'     => 'airport drop service',
                'subtitle' => 'transport to the airport',
                'emoji'    => '✈️',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/airport.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide7/airport-drop-service.webp'),
            ],
            [
                'text'     => 'cab / taxi',
                'subtitle' => 'car for hire',
                'emoji'    => '🚕',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/cab.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide7/cab-taxi.webp'),
            ],
            [
                'text'     => 'guestbook',
                'subtitle' => 'book for visitors to write comments',
                'emoji'    => '📖',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/guestbook.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide7/guestbook.webp'),
            ],
            [
                'text'     => 'lobby',
                'subtitle' => 'main entrance area',
                'emoji'    => '🏨',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/lobby.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide7/lobby.webp'),
            ],
            [
                'text'     => 'luggage',
                'subtitle' => 'bags',
                'emoji'    => '🧳',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/luggage.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide7/luggage.webp'),
            ],
            [
                'text'     => 'help desk',
                'subtitle' => 'place for guest assistance',
                'emoji'    => '🛎️',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/help-desk.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide7/help-desk.webp'),
            ],
            [
                'text'     => 'room number',
                'subtitle' => 'number of your room',
                'emoji'    => '🔢',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/room-number.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide7/room-number.webp'),
            ],
            [
                'text'     => 'phone call charge',
                'subtitle' => 'cost of calls made',
                'emoji'    => '📞',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/phone.mp3'),
                'image'    => materialAsset('slider/A1/Advanced/chapter-3/img/slide7/phone-call-charge.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])