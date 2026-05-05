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
                'src' => 'https://api.iconify.design/fluent-emoji-flat:pencil.svg',
                'alt' => 'Pencil',
                'class' => 'right-2 top-3 w-12 rotate-[12deg] opacity-80 sm:w-14 lg:w-16',
            ],
            [
                'src' => 'https://api.iconify.design/fluent-emoji-flat:megaphone.svg',
                'alt' => 'Megaphone',
                'class' => 'right-1 top-24 w-16 rotate-[14deg] opacity-75 sm:w-20 lg:w-28',
            ],
            [
                'src' => 'https://api.iconify.design/fluent-emoji-flat:books.svg',
                'alt' => 'Books',
                'class' => 'left-2 bottom-2 w-16 opacity-80 sm:w-20 lg:w-24',
            ],
            [
                'src' => 'https://api.iconify.design/fluent-emoji-flat:sparkles.svg',
                'alt' => 'Sparkles',
                'class' => 'right-3 bottom-3 w-14 opacity-80 sm:w-16 lg:w-20',
            ],
        ],
    ];
@endphp

@include('slider.activities.silent-letters.template', ['content' => $content])