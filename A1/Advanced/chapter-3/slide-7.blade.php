@php
    $content = [
        'page_title' => 'Services & Facilities Vocabulary',
        'title'      => 'Services & Facilities Vocabulary',
        'subtitle'   => 'Useful words and phrases for talking about hotel services, facilities, and guest support.',
        'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4',

        'items' => [
            [
                'text'     => 'airport drop service',
                'subtitle' => 'transport to the airport',
                'emoji'    => '✈️',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/airport-drop-service.mp3'),
            ],
            [
                'text'     => 'cab / taxi',
                'subtitle' => 'car for hire',
                'emoji'    => '🚕',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/cab-taxi.mp3'),
            ],
            [
                'text'     => 'guestbook',
                'subtitle' => 'book for visitors to write comments',
                'emoji'    => '📖',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/guestbook.mp3'),
            ],
            [
                'text'     => 'lobby',
                'subtitle' => 'main entrance area',
                'emoji'    => '🏨',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/lobby.mp3'),
            ],
            [
                'text'     => 'luggage',
                'subtitle' => 'bags',
                'emoji'    => '🧳',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/luggage.mp3'),
            ],
            [
                'text'     => 'help desk',
                'subtitle' => 'place for guest assistance',
                'emoji'    => '🛎️',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/help-desk.mp3'),
            ],
            [
                'text'     => 'room number',
                'subtitle' => 'number of your room',
                'emoji'    => '🔢',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/room-number.mp3'),
            ],
            [
                'text'     => 'phone call charge',
                'subtitle' => 'cost of calls made',
                'emoji'    => '📞',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/phone-call-charge.mp3'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.sentence-audio', ['content' => $content])

