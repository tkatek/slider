@php
    $content = [
        'page_title' => 'Silent B',
        'title_prefix' => 'Silent',
        'title_highlight' => 'B',
        'title_suffix' => 'occurs after m, before, t',
        'question' => 'What other words do you with a silent B ?',

        'items' => [
            [
                'label' => 'lam<b class="text-orange-500 dark:text-orange-400">b</b>',
                'image' => 'https://images.unsplash.com/photo-1484557985045-edf25e08da73?q=80&w=1000&h=800&auto=format&fit=crop',
                'alt'   => 'lamb',
            ],
            [
                'label' => 'thum<b class="text-orange-500 dark:text-orange-400">b</b>',
                'image' => 'https://images.unsplash.com/photo-1580893211123-627e0262be3a?q=80&w=1000&h=800&auto=format&fit=crop',
                'alt'   => 'thumb',
            ],
            [
                'label' => 'de<b class="text-orange-500 dark:text-orange-400">b</b>t',
                'image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=1000&h=800&auto=format&fit=crop',
                'alt'   => 'debt',
            ],
            [
                'label' => 'bom<b class="text-orange-500 dark:text-orange-400">b</b>',
                'image' => 'https://images.unsplash.com/photo-1756027132696-f725e53ff15d?q=80&w=1000&h=800&auto=format&fit=crop',
                'alt'   => 'bomb',
            ],
        ],

        'decorations' => [
            [
                'src' => 'https://api.iconify.design/fluent-emoji-flat:pencil.svg',
                'alt' => 'Pencil',
                'class' => 'right-3 top-3 w-14 sm:w-16 lg:w-20 rotate-[12deg]',
            ],
            [
                'src' => 'https://api.iconify.design/fluent-emoji-flat:books.svg',
                'alt' => 'Books',
                'class' => 'left-2 bottom-2 w-16 sm:w-20 lg:w-24',
            ],
            [
                'src' => 'https://api.iconify.design/fluent-emoji-flat:books.svg',
                'alt' => 'Books',
                'class' => 'right-2 bottom-2 w-16 sm:w-20 lg:w-24',
            ],
        ],
    ];
@endphp

@include('slider.activities.silent-letters.template', ['content' => $content])