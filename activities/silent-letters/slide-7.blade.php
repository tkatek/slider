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
                'image' => 'https://unsplash.com/photos/7FQIxZDwWhE/download?force=true',
                'alt'   => 'Gnome',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">G</b>nat',
                'image' => 'https://unsplash.com/photos/sbqJ2CzfbF4/download?force=true',
                'alt'   => 'Gnat',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">K</b>nee',
                'image' => 'https://images.unsplash.com/photo-1740512922093-9c2756ab5844?auto=format&fit=crop&fm=jpg&q=80&w=1000&h=800',
                'alt'   => 'Knee',
            ],
            [
                'label' => '<b class="text-orange-500 dark:text-orange-400">K</b>nife',
                'image' => 'https://unsplash.com/photos/f1xj_KeZ5RM/download?force=true',
                'alt'   => 'Knife',
            ],
        ],

        'decorations' => [
            [
                'emoji' => '🧙',
                'class' => 'right-2 top-3 text-4xl rotate-[12deg] opacity-80 sm:text-5xl lg:text-6xl',
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
