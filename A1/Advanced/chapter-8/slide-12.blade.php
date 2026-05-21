@php
    $content = [
        'title'      => 'Sentence Patterns',
        'subtitle'   => '',
        'card_type'  => 'text',
        'popup'      => 'focus',

        'groups' => [
            [
                'key'        => 'positive-sentences',
                'title'      => '✅ Positive Sentences',
                'grid_class' => 'grid-cols-1 md:grid-cols-3',
                'items'      => [

                    [
                        'emoji' => '🍽️',
                        'text'  => 'There <span class="text-red-500 font-black">are a lot of restaurants</span> in my neighbourhood.',
                        'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/2.mp3'),
                    ],
                    [
                        'emoji' => '🚦',
                        'text'  => 'There <span class="text-violet-600 font-black">is a lot of traffic</span> downtown.',
                        'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/3.mp3'),
                    ],
                ],
            ],
            [
                'key'        => 'questions',
                'title'      => '❓ Questions',
                'grid_class' => 'grid-cols-1 md:grid-cols-3',
                'items'      => [

                    [
                        'emoji' => '🍽️',
                        'text'  => '<span class="text-red-500 font-black">Are</span> there <span class="text-red-500 font-black">many restaurants</span> near your house?',
                        'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/5.mp3'),
                    ],
                    [
                        'emoji' => '🚦',
                        'text'  => '<span class="text-violet-600 font-black">Is</span> there <span class="text-violet-600 font-black">much traffic</span> in your city?',
                        'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/6.mp3'),
                    ],
                ],
            ],
            [
                'key'        => 'negative-sentences',
                'title'      => '🚫 Negative Sentences',
                'grid_class' => 'grid-cols-1 md:grid-cols-3',
                'items'      => [

                    [
                        'emoji' => '🏬',
                        'text'  => 'There <span class="text-red-500 font-black">aren\'t many shops</span> here.',
                        'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/8.mp3'),
                    ],
                    [
                        'emoji' => '🔇',
                        'text'  => 'There <span class="text-violet-600 font-black">isn\'t much noise</span> in my area.',
                        'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/9.mp3'),
                    ],
                ],
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])