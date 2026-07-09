@php
    $content = [
        'title'      => 'Key Vocabulary',
        'subtitle'   => '',
        'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-4',

        'items' => [
            [
                'text'     => 'Binary thinking',
                'subtitle' => 'Seeing only two possible sides.',
                'example'  => '',
                'emoji'    => '⚖️',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide16/binary-thinking.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide16/binary-thinking.webp'),
            ],
            [
                'text'     => 'Evidence',
                'subtitle' => 'Facts that support an idea.',
                'example'  => '',
                'emoji'    => '🔎',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide16/evidence.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide16/evidence.webp'),
            ],
            [
                'text'     => 'Bias',
                'subtitle' => 'A preference that may affect judgment.',
                'example'  => '',
                'emoji'    => '🧠',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide16/bias.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide16/bias.webp'),
            ],
            [
                'text'     => 'Prejudice',
                'subtitle' => 'An unfair opinion about others.',
                'example'  => '',
                'emoji'    => '🚫',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide16/prejudice.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide16/prejudice.webp'),
            ],
            [
                'text'     => 'Viewpoint',
                'subtitle' => 'An opinion or way of thinking.',
                'example'  => '',
                'emoji'    => '👀',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide16/viewpoint.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide16/viewpoint.webp'),
            ],
            [
                'text'     => 'Background',
                'subtitle' => "A person's culture, experiences, and history.",
                'example'  => '',
                'emoji'    => '🌍',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide16/background.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide16/background.webp'),
            ],
            [
                'text'     => 'Disagreement',
                'subtitle' => 'A difference of opinion.',
                'example'  => '',
                'emoji'    => '💬',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide16/disagreement.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide16/disagreement.webp'),
            ],
            [
                'text'     => 'Misunderstanding',
                'subtitle' => 'Failure to understand correctly.',
                'example'  => '',
                'emoji'    => '❓',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-12/audios/slide16/misunderstanding.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-12/img/slide16/isunderstanding.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])