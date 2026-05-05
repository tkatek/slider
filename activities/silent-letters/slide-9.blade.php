@php
    $content = [
        'page_title' => 'Silent L',
        'title_prefix' => 'Silent',
        'title_highlight' => 'l',
        'title_suffix' => 'follows vowels a, o and u.',

        'question' => 'What other words you know with silent l ?',

        'image_fit' => 'cover',

        'items' => [
            [
                'label' => 'Ca<b class="text-orange-500 dark:text-orange-400">l</b>f',
                'image' => materialAsset('slider/activities/silent-letters/img/calf.webp'),
                'alt'   => 'Calf',
            ],
            [
                'label' => 'Sa<b class="text-orange-500 dark:text-orange-400">l</b>mon',
                'image' => materialAsset('slider/activities/silent-letters/img/salmon.webp'),
                'alt'   => 'Salmon',
            ],
            [
                'label' => 'Cha<b class="text-orange-500 dark:text-orange-400">l</b>k',
                'image' => materialAsset('slider/activities/silent-letters/img/chalk.webp'),
                'alt'   => 'Chalk',
            ],
            [
                'label' => 'Yo<b class="text-orange-500 dark:text-orange-400">l</b>k',
                'image' => materialAsset('slider/activities/silent-letters/img/yolk.webp'),
                'alt'   => 'Yolk',
            ],
        ],

        'decorations' => [
            [
                'emoji' => '🐄',
                'class' => 'right-1 top-8 text-4xl rotate-[10deg] opacity-80 sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '🐟',
                'class' => 'right-4 bottom-4 text-4xl rotate-[8deg] opacity-80 sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '🥚',
                'class' => 'left-2 bottom-2 text-4xl -rotate-[12deg] opacity-75 sm:text-5xl lg:text-6xl',
            ],
        ],
    ];
@endphp

@include('slider.activities.silent-letters.template', ['content' => $content])
