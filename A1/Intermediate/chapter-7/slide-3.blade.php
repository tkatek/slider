<?php

$content = array_replace_recursive([
    'page_title'    => 'Holiday Preferences',
    'title'         => 'Where do you go on holiday?',
    'subtitle'      => 'Tick the places you like, then press confirm.',
    'theme'         => '#6366f1',
    'header_wrap_class' => 'header-spacing text-center space-y-6 my-8 w-full max-w-3xl',
    'title_class' => 'tracking-tight whitespace-nowrap text-4xl md:text-5xl lg:text-6xl font-black mb-5',
    'title_gradient_class' => 'bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent',
    'subtitle_class' => 'text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100',
    'result_modal_variant' => 'game',

    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 2,
            'md'   => 2,
            'lg'   => 3,
        ],
        'gap'         => 'gap-3 sm:gap-4 lg:gap-5',
        'card_height' => 'h-40 sm:h-44 lg:h-48',
    ],

    'sounds' => [
        'click' => materialAsset('slider/sounds/tap.wav'),
        'done'  => materialAsset('slider/sounds/correct.wav'), 
        'skip'  => materialAsset('slider/sounds/click.wav'),
    ],

    'items' => [
        [
            'label' => 'Beach',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/beach.webp'),
        ],
        [
            'label' => 'Hiking',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/mountains.webp'),
        ],
        [
            'label' => 'Cruise',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/cruise.webp'),
        ],
        [
            'label' => 'Historical places',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/historical-places.webp'),
        ],
        [
            'label' => 'Camping',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/camping.webp'),
        ],
        [
            'label' => 'Safari',
            'image' => materialAsset('slider/A1/Intermediate/chapter-7/img/slide-3/safari.webp'),
        ],
    ],
], $content ?? []);

?>

@include('slider.other.warm-up-preferences', ['content' => $content])
