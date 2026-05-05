@php
    $content = [
        'title_prefix' => 'Silent',
        'title_highlight' => 'K',
        'title_suffix' => 'and a silent G are found before N.',

        'question' => 'What other words you know with silent K or G ?',

        'image_fit' => 'cover',

        'items' => [
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">G</b>nome',
                'image' => 'https://unsplash.com/photos/7FQIxZDwWhE/download?force=true&w=1000',
                'alt'   => 'Gnome',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">G</b>nat',
                'image' => 'https://unsplash.com/photos/YfG19i6WPXA/download?force=true&w=1000',
                'alt'   => 'Gnat',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">K</b>nee',
                'image' => 'https://unsplash.com/photos/DA8YF9xqdKU/download?force=true&w=1000',
                'alt'   => 'Knee',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">K</b>nife',
                'image' => 'https://unsplash.com/photos/Ih0GG8HhwJ8/download?force=true&w=1000',
                'alt'   => 'Knife',
            ],
        ],

        'words' => [
            '<b class="text-orange-500 dark:text-orange-400">K</b>new',
            '<b class="text-orange-500 dark:text-orange-400">k</b>nit',
            'si<b class="text-orange-500 dark:text-orange-400">g</b>n',
            '<b class="text-orange-500 dark:text-orange-400">k</b>night',
            '<b class="text-orange-500 dark:text-orange-400">G</b>narl',
            'Assi<b class="text-orange-500 dark:text-orange-400">g</b>n',
            'Forei<b class="text-orange-500 dark:text-orange-400">g</b>n',
            'desi<b class="text-orange-500 dark:text-orange-400">g</b>n',
        ],

        'decorations' => [
            [
                'emoji' => '🧙',
                'class' => 'right-2 top-3 text-4xl rotate-[12deg] opacity-80 sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '🦟',
                'class' => 'right-1 top-24 text-4xl rotate-[14deg] opacity-75 sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '🦵',
                'class' => 'left-2 bottom-2 text-4xl -rotate-[8deg] opacity-80 sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '🔪',
                'class' => 'right-3 bottom-3 text-4xl rotate-[8deg] opacity-80 sm:text-5xl lg:text-6xl',
            ],
        ],
    ];
@endphp

@include('slider.activities.silent-letters.template', ['content' => $content])
