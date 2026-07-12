@php
    $content = [
        'title'    => 'New Language',
        'subtitle' => '',

        'groups' => [
            [
                'key'        => 'with-images',
                'grid_class' => 'grid-cols-2 sm:grid-cols-4',
                'items' => [
                    [
                        'text'     => 'loss of biodiversity (n.)',
                        'subtitle' => 'the loss of different kinds of plants, animals, and living things in an area.',
                        'example'  => 'The loss of biodiversity can upset the balance of nature and harm wildlife.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-6/audios/slide6/loss-of-biodiversity.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide6/loss-of-biodiversity.webp'),
                    ],
                    [
                        'text'     => 'energy efficient appliances (n. phrase)',
                        'subtitle' => 'appliances that use less energy to do the same job.',
                        'example'  => 'Using energy efficient appliances helps us save energy and reduce our carbon footprint.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-6/audios/slide6/energy-efficient-appliances.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide6/energy-efficient-appliances.webp'),
                    ],
                    [
                        'text'     => 'collective actions (n.)',
                        'subtitle' => 'actions taken by a group of people working together to achieve a goal.',
                        'example'  => 'We need collective actions from individuals, governments, and organizations to protect our planet.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-6/audios/slide6/collective-actions.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide6/collective-actions.webp'),
                    ],
                    [
                        'text'     => 'keeps the air cleaner (v. phrase)',
                        'subtitle' => 'helps to reduce pollution in the air.',
                        'example'  => 'Using public transportation keeps the air cleaner and is better for our health.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-6/audios/slide6/keeps-the-air-cleaner.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide6/keeps-the-air-cleaner.webp'),
                    ],
                    [
                        'text'     => 'keeps the ecosystem healthier (v. phrase)',
                        'subtitle' => 'helps to protect the natural balance of plants, animals, and their environment.',
                        'example'  => 'Protecting forests and wildlife habitats keeps the ecosystem healthier for future generations.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-6/audios/slide6/keeps-the-ecosystem-healthier.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide6/keeps-the-ecosystem-healthier.webp'),
                    ],
                    [
                        'text'     => 'make changes (v. phrase)',
                        'subtitle' => 'to do things differently in order to improve a situation.',
                        'example'  => 'We can make changes in our daily lives to reduce our impact on the environment.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-6/audios/slide6/make-changes.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide6/make-changes.webp'),
                    ],
                    [
                        'text'     => 'help create (v. phrase)',
                        'subtitle' => 'to play a part in making something happen.',
                        'example'  => 'By working together, we can help create a cleaner, greener, and more sustainable future.',
                        'emoji'    => '',
                        'sound'    => materialAsset('slider/B1/Advanced/chapter-6/audios/slide6/help-create.mp3'),
                        'image'    => materialAsset('slider/B1/Advanced/chapter-6/img/slide6/help-create.webp'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])