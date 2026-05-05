@php
    $content = [
        'page_title' => 'Silent W',
        'title_prefix' => 'Silent',
        'title_highlight' => 'W',
        'title_suffix' => 'often goes before R.',

        'question' => 'What other words you know with silent W ?',

        'image_fit' => 'cover',

        'items' => [
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">W</b>rapper',
                'image' => materialAsset('slider/activities/silent-letters/img/wrapper.webp'),
                'alt'   => 'Wrapper',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">W</b>restle',
                'image' => materialAsset('slider/activities/silent-letters/img/wrestle.webp'),
                'alt'   => 'Wrestle',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">W</b>rist',
                'image' => materialAsset('slider/activities/silent-letters/img/wrist.webp'),
                'alt'   => 'Wrist',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">W</b>reck',
                'image' => materialAsset('slider/activities/silent-letters/img/wreck.webp'),
                'alt'   => 'Wreck',
            ],
        ],

        'decorations' => [
            [
                'emoji' => '🍬',
                'class' => 'right-0 top-4 text-4xl rotate-[14deg] opacity-80 sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '🤼',
                'class' => 'left-2 bottom-2 text-4xl -rotate-[10deg] opacity-75 sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '✋',
                'class' => 'right-4 bottom-4 text-4xl rotate-[8deg] opacity-80 sm:text-5xl lg:text-6xl',
            ],
        ],
    ];
@endphp

@include('slider.activities.silent-letters.template', ['content' => $content])
