@php
    $content = [
        'title'      => 'New Language Expressions',
        'subtitle'   => 'Learn the following expressions from the text:',
        'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',

        'items' => [
            [
                'text'     => 'My hobby is surfing',
                'subtitle' => "A 'hobby' is something that you do in your free time because it makes you happy.",
                'example'  => 'Example: My hobby is surfing.',
                'emoji'    => '🏄',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-5/audios/slide15/my-hobby-is-surfing.mp3'),
            ],
            [
                'text'     => 'Try to beat the crowds',
                'subtitle' => "If you arrive at a place before a lot of other people then you have 'beaten the crowds.'",
                'example'  => 'Example: Try to beat the crowds.',
                'emoji'    => '🏖️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-5/audios/slide15/try-to-beat-the-crowds.mp3'),
            ],
            [
                'text'     => 'besides',
                'subtitle' => "'Besides' is similar to other than.",
                'example'  => 'Example: What do you do on the beach besides surfing?',
                'emoji'    => '➕',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-5/audios/slide15/besides.mp3'),
            ],
            [
                'text'     => 'catch you later',
                'subtitle' => 'is an informal way to say "I\'ll see you later."',
                'example'  => "Example: I'll catch you later, after I finish work.",
                'emoji'    => '👋',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-5/audios/slide15/catch-you-later.mp3'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])