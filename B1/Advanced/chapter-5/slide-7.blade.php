@php
    $content = [
        'title'      => 'New Language',
        'subtitle'   => '',
        'grid_class' => 'grid-cols-2 sm:grid-cols-4',

        'items' => [
            [
                'text'     => 'take for granted',
                'subtitle' => 'to fail to appreciate the value of something.',
                'example'  => '',
                'emoji'    => '🌍',
                'sound'    => materialAsset('slider/B1/Advanced/chapter-5/audios/slide7/take-for-granted.mp3'),
                'image'    => materialAsset('slider/B1/Advanced/chapter-5/img/slide7/take-for-granted.webp'),
            ],
            [
                'text'     => 'take action',
                'subtitle' => 'to do something to deal with a problem.',
                'example'  => '',
                'emoji'    => '🚀',
                'sound'    => materialAsset('slider/B1/Advanced/chapter-5/audios/slide7/take-action.mp3'),
                'image'    => materialAsset('slider/B1/Advanced/chapter-5/img/slide7/take-action.webp'),
            ],
            [
                'text'     => 'take steps',
                'subtitle' => 'to do things in order to achieve a goal.',
                'example'  => '',
                'emoji'    => '👣',
                'sound'    => materialAsset('slider/B1/Advanced/chapter-5/audios/slide7/take-steps.mp3'),
                'image'    => materialAsset('slider/B1/Advanced/chapter-5/img/slide7/take-steps.webp'),
            ],
            [
                'text'     => 'counts',
                'subtitle' => 'is important or makes a difference.',
                'example'  => '',
                'emoji'    => '✅',
                'sound'    => materialAsset('slider/B1/Advanced/chapter-5/audios/slide7/counts.mp3'),
                'image'    => materialAsset('slider/B1/Advanced/chapter-5/img/slide7/counts.webp'),
            ],
            [
                'text'     => 'picking up litter',
                'subtitle' => 'collecting and removing rubbish that is lying around.',
                'example'  => '',
                'emoji'    => '🗑️',
                'sound'    => materialAsset('slider/B1/Advanced/chapter-5/audios/slide7/picking-up-litter.mp3'),
                'image'    => materialAsset('slider/B1/Advanced/chapter-5/img/slide7/picking-up-litter.webp'),
            ],
            [
                'text'     => 'keep the air clean',
                'subtitle' => 'to prevent air from being polluted.',
                'example'  => '',
                'emoji'    => '🌬️',
                'sound'    => materialAsset('slider/B1/Advanced/chapter-5/audios/slide7/keep-the-air-clean.mp3'),
                'image'    => materialAsset('slider/B1/Advanced/chapter-5/img/slide7/keep-the-air-clean.webp'),
            ],
            [
                'text'     => 'switch to',
                'subtitle' => 'to change from one thing to another.',
                'example'  => '',
                'emoji'    => '🔄',
                'sound'    => materialAsset('slider/B1/Advanced/chapter-5/audios/slide7/switch-to.mp3'),
                'image'    => materialAsset('slider/B1/Advanced/chapter-5/img/slide7/switch-to.webp'),
            ],
            [
                'text'     => 'it’s up to us',
                'subtitle' => 'it is our responsibility or decision.',
                'example'  => '',
                'emoji'    => '🤝',
                'sound'    => materialAsset('slider/B1/Advanced/chapter-5/audios/slide7/its-up-to-us.mp3'),
                'image'    => materialAsset('slider/B1/Advanced/chapter-5/img/slide7/its-up-to-us.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])