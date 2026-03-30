{{-- resources/views/slider/slide-hand-luggage.blade.php --}}
<?php
$content = [
    'page_title' => 'Reading Comprehension',
    'title'      => 'Reading Comprehension',
    'subtitle'   => 'An airport notice ',
    'heading'    => '',
    'show_point_dots' => false,
    'point_text_class' => 'text-lg sm:text-xl lg:text-[1.4rem] leading-[1.75]',

    'images' => [
        [
            'src' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide7/liquids.webp'),
            'alt' => 'Suitcase for hand luggage',
        ],
        [
            'src' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide4.webp'),
            'alt' => 'Laptop bag',
        ],
        [
            'src' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide7/take-out.webp'),
            'alt' => 'Airport liquids and security items',
        ],
    ],

    'points' => [
        '<span class="mb-2 inline-block font-black text-slate-900 dark:text-white">What can I take on the plane as hand luggage?</span><br>Bring one suitcase up to 10kg plus a small laptop or handbag. Total weight cannot pass 10kg. Bigger or heavier bags must go in the hold for a fee. Charge your devices before security. Only liquids over 100ml bought after security are allowed.',
    ],
];
?>

@include("slider.other.reading-comprehension", ['content' => $content])
