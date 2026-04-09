{{-- resources/views/slider/slide-hand-luggage.blade.php --}}
<?php
$content = [
    'page_title' => 'Reading Comprehension',
    'title'      => 'Reading Comprehension',
    'subtitle'   => 'An airport notice ',
    'heading'    => '',
    'passage_title' => 'What can I take on the plane as hand luggage?',
    'passage' => [
        'Bring one suitcase up to 10kg plus a small laptop or handbag. Total weight cannot pass 10kg. Bigger or heavier bags must go in the hold for a fee. Charge your devices before security. Only liquids over 100ml bought after security are allowed.',
    ],

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
];
?>

@include("slider.other.reading-comprehension", ['content' => $content])
