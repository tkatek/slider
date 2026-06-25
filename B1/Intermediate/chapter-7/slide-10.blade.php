@php
    $content = [
        'title'      => 'New Language & Expressions',
        'subtitle'   => '',
        'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

        'items' => [
            [
                'text'     => 'get full attention',
                'subtitle' => 'receive all care and focus',
                'example'  => 'Firstborns get full attention at first.',
                'emoji'    => '👀',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide10/get-full-attention.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide10/get-full-attention.webp'),
            ],
            [
                'text'     => 'take on responsibility',
                'subtitle' => 'accept duties or roles',
                'example'  => 'Older siblings take on responsibility.',
                'emoji'    => '✅',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide10/take-on-responsibility.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide10/take-on-responsibility.webp'),
            ],
            [
                'text'     => 'feel less noticed',
                'subtitle' => 'feel ignored',
                'example'  => 'Middle children may feel less noticed.',
                'emoji'    => '😶',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide10/feel-less-noticed.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide10/feel-less-noticed.webp'),
            ],
            [
                'text'     => 'get along with others',
                'subtitle' => 'have good relationships',
                'example'  => 'They get along with others easily.',
                'emoji'    => '🤝',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide10/get-along-with-others.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide10/get-along-with-others.webp'),
            ],
            [
                'text'     => 'solve problems',
                'subtitle' => 'find answers to difficulties',
                'example'  => 'They learn to solve problems.',
                'emoji'    => '🧩',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide10/solve-problems.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide10/solve-problems.webp'),
            ],
            [
                'text'     => 'take risks',
                'subtitle' => 'do something bold or unsafe',
                'example'  => 'They enjoy taking risks.',
                'emoji'    => '⚡',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide10/take-risks.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide10/take-risks.webp'),
            ],
            [
                'text'     => 'spend time alone',
                'subtitle' => 'be without others',
                'example'  => 'Only children spend time alone.',
                'emoji'    => '🧘',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide10/spend-time-alone.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide10/spend-time-alone.webp'),
            ],
            [
                'text'     => 'develop skills',
                'subtitle' => 'improve abilities',
                'example'  => 'They develop strong language skills.',
                'emoji'    => '📈',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide10/develop-skills.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide10/develop-skills.webp'),
            ],
            [
                'text'     => 'close bond',
                'subtitle' => 'very strong relationship',
                'example'  => 'Twins have a close bond.',
                'emoji'    => '🔗',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide10/close-bond.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide10/close-bond.webp'),
            ],
            [
                'text'     => 'build identity',
                'subtitle' => 'form who you are',
                'example'  => 'They try to build identity.',
                'emoji'    => '🪪',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide10/build-identity.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-7/img/slide10/build-identity.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])