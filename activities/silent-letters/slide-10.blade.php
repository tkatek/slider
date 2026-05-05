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
                'image' => 'https://unsplash.com/photos/Xg_PBo-6rsE/download?force=true&w=1000',
                'alt'   => 'Calf',
            ],
            [
                'label' => 'Sa<b class="text-orange-500 dark:text-orange-400">l</b>mon',
                'image' => 'https://unsplash.com/photos/3Px-izUjASw/download?force=true&w=1000',
                'alt'   => 'Salmon',
            ],
            [
                'label' => 'Cha<b class="text-orange-500 dark:text-orange-400">l</b>k',
                'image' => 'https://unsplash.com/photos/rAOBMlo68bo/download?force=true&w=1000',
                'alt'   => 'Chalk',
            ],
            [
                'label' => 'Yo<b class="text-orange-500 dark:text-orange-400">l</b>k',
                'image' => 'https://unsplash.com/photos/vWtfT-o-UOA/download?force=true&w=1000',
                'alt'   => 'Yolk',
            ],
        ],

        'words' => [
            'Pa<b class="text-orange-500 dark:text-orange-400">l</b>m',
            'Ca<b class="text-orange-500 dark:text-orange-400">l</b>m',
            'Ha<b class="text-orange-500 dark:text-orange-400">l</b>f',
            'Wa<b class="text-orange-500 dark:text-orange-400">l</b>k',
            'Ca<b class="text-orange-500 dark:text-orange-400">l</b>f',
            'Fo<b class="text-orange-500 dark:text-orange-400">l</b>k',
            'Ta<b class="text-orange-500 dark:text-orange-400">l</b>k',
            'Yo<b class="text-orange-500 dark:text-orange-400">l</b>k',
        ],

        'decorations' => [
            [
                'src' => 'https://api.iconify.design/fluent-emoji-flat:palm-tree.svg',
                'alt' => 'Palm tree',
                'class' => 'right-1 top-8 w-20 rotate-[10deg] opacity-80 sm:w-24 lg:w-32',
            ],
            [
                'src' => 'https://api.iconify.design/fluent-emoji-flat:thought-balloon.svg',
                'alt' => 'Thought balloon',
                'class' => 'right-4 bottom-4 w-16 opacity-80 sm:w-20 lg:w-24',
            ],
            [
                'src' => 'https://api.iconify.design/fluent-emoji-flat:pencil.svg',
                'alt' => 'Pencil',
                'class' => 'left-2 bottom-2 w-14 -rotate-[12deg] opacity-75 sm:w-16 lg:w-20',
            ],
        ],
    ];
@endphp

@include('slider.activities.silent-letters.template', ['content' => $content])
