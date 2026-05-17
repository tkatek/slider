@php
    $content = [
        'page_title' => 'New Vocabulary',
        'title'      => 'New Vocabulary',
        'subtitle'   => '2️⃣ Services & Facilities Vocabulary',
        'grid_class' => 'grid-cols-2 sm:grid-cols-3',

        'items' => [
            [
                'text'     => 'airport drop service',
                'subtitle' => 'transport to the airport',
                'emoji'    => '✈️',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/airport.mp3'),
            ],
            [
                'text'     => 'cab / taxi',
                'subtitle' => 'car for hire',
                'emoji'    => '🚕',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/cab.mp3'),
            ],
            [
                'text'     => 'guestbook',
                'subtitle' => 'book for visitors to write comments',
                'emoji'    => '📖',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/guestbook.mp3'),
            ],
            [
                'text'     => 'lobby',
                'subtitle' => 'main entrance area',
                'emoji'    => '🏨',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/lobby.mp3'),
            ],
            [
                'text'     => 'luggage',
                'subtitle' => 'bags',
                'emoji'    => '🧳',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/luggage.mp3'),
            ],
            [
                'text'     => 'help desk',
                'subtitle' => 'place for guest assistance',
                'emoji'    => '🛎️',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/help-desk.mp3'),
            ],
            [
                'text'     => 'room number',
                'subtitle' => 'number of your room',
                'emoji'    => '🔢',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/room-number.mp3'),
            ],
            [
                'text'     => 'phone call charge',
                'subtitle' => 'cost of calls made',
                'emoji'    => '📞',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide7/phone.mp3'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])