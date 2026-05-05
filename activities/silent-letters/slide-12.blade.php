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
                'image' => 'https://unsplash.com/photos/3KvYQTS_7Tk/download?force=true&w=1000',
                'alt'   => 'Wrapper',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">W</b>restle',
                'image' => 'https://unsplash.com/photos/H-FX-3xmtKU/download?force=true&w=1000',
                'alt'   => 'Wrestle',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">W</b>rist',
                'image' => 'https://unsplash.com/photos/Ks5CgGjKKD4/download?force=true&w=1000',
                'alt'   => 'Wrist',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">W</b>reck',
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
                'emoji' => '✍️',
                'class' => 'right-0 top-4 text-4xl rotate-[14deg] opacity-80 sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '🤼',
                'class' => 'left-2 bottom-2 text-4xl -rotate-[10deg] opacity-75 sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '❌',
                'class' => 'right-2 bottom-3 text-4xl rotate-[2deg] opacity-80 sm:text-5xl lg:text-6xl',
            ],
        ],
    ];
@endphp

@include('slider.activities.silent-letters.template', ['content' => $content])
