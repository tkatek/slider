@php
    $content = [
        'page_title' => 'Silent B',
        'title_prefix' => 'Silent',
        'title_highlight' => 'B',
        'title_suffix' => 'occurs after m, before, t',
        'question' => 'What other words do you with a silent B ?',

        'items' => [
            [
                'label' => 'Lam<b class="text-orange-500 dark:text-orange-400">b</b>',
                'image' => materialAsset('slider/activities/silent-letters/img/lamb.webp'),
                'alt'   => 'lamb',
            ],
            [
                'label' => 'Thum<b class="text-orange-500 dark:text-orange-400">b</b>',
                'image' => materialAsset('slider/activities/silent-letters/img/thumb.webp'),
                'alt'   => 'thumb',
            ],
            [
                'label' => 'De<b class="text-orange-500 dark:text-orange-400">b</b>t',
                'image' => materialAsset('slider/activities/silent-letters/img/debt.webp'),
                'alt'   => 'debt',
            ],
            [
                'label' => 'Bom<b class="text-orange-500 dark:text-orange-400">b</b>',
                'image' => materialAsset('slider/activities/silent-letters/img/bomb.webp'),
                'alt'   => 'bomb',
            ],
        ],

        'decorations' => [
            [
                'emoji' => '🐑',
                'class' => 'right-3 top-3 text-4xl rotate-[12deg] sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '👍',
                'class' => 'left-2 bottom-2 text-4xl -rotate-[8deg] sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '💰',
                'class' => 'right-2 bottom-2 text-4xl rotate-[8deg] sm:text-5xl lg:text-6xl',
            ],
        ],
    ];
@endphp

@include('slider.activities.silent-letters.template', ['content' => $content])
