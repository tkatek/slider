@php
    $content = [
        'page_title' => 'Silent B',
        'title_prefix' => 'Silent',
        'title_highlight' => 'B',
        'title_suffix' => 'occurs after m, before t',

        'question' => 'What other words do you with a silent B ?',

        'items' => [
            [
                'label' => 'Lam<b class="text-orange-500 dark:text-orange-400">b</b>',
                'image' => 'https://images.unsplash.com/photo-1484557985045-edf25e08da73?q=80&w=1000&h=800&auto=format&fit=crop',
                'alt'   => 'lamb',
            ],
            [
                'label' => 'Thum<b class="text-orange-500 dark:text-orange-400">b</b>',
                'image' => 'https://images.unsplash.com/photo-1580893211123-627e0262be3a?q=80&w=1000&h=800&auto=format&fit=crop',
                'alt'   => 'thumb',
            ],
            [
                'label' => 'De<b class="text-orange-500 dark:text-orange-400">b</b>t',
                'image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=1000&h=800&auto=format&fit=crop',
                'alt'   => 'debt',
            ],
            [
                'label' => 'Bom<b class="text-orange-500 dark:text-orange-400">b</b>',
                'image' => 'https://images.unsplash.com/photo-1756027132696-f725e53ff15d?q=80&w=1000&h=800&auto=format&fit=crop',
                'alt'   => 'bomb',
            ],
        ],

        'words' => [
            'Clim<b class="text-orange-500 dark:text-orange-400">b</b>',
            'Wom<b class="text-orange-500 dark:text-orange-400">b</b>',
            'tom<b class="text-orange-500 dark:text-orange-400">b</b>',
            'Com<b class="text-orange-500 dark:text-orange-400">b</b>',
            'Crum<b class="text-orange-500 dark:text-orange-400">b</b>',
            'Dum<b class="text-orange-500 dark:text-orange-400">b</b>',
            'Num<b class="text-orange-500 dark:text-orange-400">b</b>',
            'Dou<b class="text-orange-500 dark:text-orange-400">b</b>t',
        ],

        'decorations' => [
            [
                'emoji' => '🐑',
                'class' => 'right-2 top-3 text-4xl rotate-[12deg] opacity-80 sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '👍',
                'class' => 'left-2 bottom-2 text-4xl -rotate-[8deg] opacity-80 sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '💰',
                'class' => 'right-2 bottom-2 text-4xl rotate-[8deg] opacity-80 sm:text-5xl lg:text-6xl',
            ],
        ],
    ];
@endphp

@include('slider.activities.silent-letters.template', ['content' => $content])
