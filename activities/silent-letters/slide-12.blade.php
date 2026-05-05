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
                'label' => '<b class="text-orange-500 dark:text-orange-400">w</b>rapper',
                'image' => 'https://unsplash.com/photos/3KvYQTS_7Tk/download?force=true&w=1000',
                'alt'   => 'Wrapper',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">w</b>restle',
                'image' => 'https://unsplash.com/photos/H-FX-3xmtKU/download?force=true&w=1000',
                'alt'   => 'Wrestle',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">w</b>rist',
                'image' => 'https://unsplash.com/photos/Ks5CgGjKKD4/download?force=true&w=1000',
                'alt'   => 'Wrist',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">w</b>reck',
                'image' => 'https://unsplash.com/photos/MquQzrcY1dk/download?force=true&w=1000',
                'alt'   => 'Wreck',
            ],
        ],

        'words' => [
            '<b class="text-orange-500 dark:text-orange-400">w</b>rite',
            '<b class="text-orange-500 dark:text-orange-400">w</b>rinkle',
            '<b class="text-orange-500 dark:text-orange-400">w</b>riggle',
            '<b class="text-orange-500 dark:text-orange-400">w</b>rong',
            '<b class="text-orange-500 dark:text-orange-400">w</b>rote',
        ],

        'decorations' => [
            [
                'src' => 'https://api.iconify.design/fluent-emoji-flat:sun.svg',
                'alt' => 'Sun',
                'class' => 'right-0 top-4 w-16 rotate-[14deg] opacity-80 sm:w-20 lg:w-24',
            ],
            [
                'src' => 'https://api.iconify.design/fluent-emoji-flat:wrapped-gift.svg',
                'alt' => 'Wrapped gift',
                'class' => 'left-2 bottom-2 w-14 -rotate-[10deg] opacity-75 sm:w-16 lg:w-20',
            ],
            [
                'src' => 'https://api.iconify.design/fluent-emoji-flat:blue-square.svg',
                'alt' => 'Blue square',
                'class' => 'right-2 bottom-3 w-14 rotate-[2deg] opacity-80 sm:w-16 lg:w-20',
            ],
        ],
    ];
@endphp

@include('slider.activities.silent-letters.template', ['content' => $content])
