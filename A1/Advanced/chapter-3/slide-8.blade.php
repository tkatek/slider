@php
    $content = [
        'page_title' => 'New Language',
        'title'      => 'New Language',
        'subtitle'   => '3️⃣ Polite Expressions',
        'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',

        'items' => [
            [
                'text'     => 'I’d like to…',
                'subtitle' => 'A polite request.',
                'emoji'    => '🙏',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/like-to.mp3'),
            ],
            [
                'text'     => 'May I…?',
                'subtitle' => 'A polite question.',
                'emoji'    => '❓',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/may-i.mp3'),
            ],
            [
                'text'     => 'Could you please…?',
                'subtitle' => 'A polite request.',
                'emoji'    => '🤝',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/could-you-please.mp3'),
            ],
            [
                'text'     => 'One moment, please.',
                'subtitle' => 'Asking someone to wait.',
                'emoji'    => '⏳',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/one-moment.mp3'),
            ],
            [
                'text'     => 'Here you are.',
                'subtitle' => 'Giving something politely.',
                'emoji'    => '🎁',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/here-you-are.mp3'),
            ],
            [
                'text'     => 'Thank you for your stay.',
                'subtitle' => 'A polite closing.',
                'emoji'    => '😊',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/thank-you.mp3'),
            ],
            [
                'text'     => 'Hope to see you again.',
                'subtitle' => 'A polite goodbye.',
                'emoji'    => '👋',
                'sound'    => materialAsset('slider/A1/Advanced/chapter-3/audios/slide8/hope-again.mp3'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])