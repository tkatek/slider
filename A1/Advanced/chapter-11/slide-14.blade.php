<?php
$content = [
    'page_title' => 'Quick Wrap Up',
    'title' => 'QUICK WRAP UP!',
    'subtitle' => 'What should you do before starting to fill up?',
    'image' => materialAsset('slider/A1/Advanced/chapter-11/img/slide14/steps.webp'),
    'image_alt' => 'Fuel station discussion image',
    'image_size' => 'max-w-[340px] sm:max-w-[420px] lg:max-w-[520px]',
    'cards' => [
        [
            'emoji' => '🛑',
            'label' => 'Option A',
            'text' => 'Stop',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '💳',
            'label' => 'Option B',
            'text' => 'Pay',
            'theme' => 'blue',
        ],
        [
            'emoji' => '🅿️',
            'label' => 'Option C',
            'text' => 'Park',
            'theme' => 'indigo',
        ],
        [
            'emoji' => '✅',
            'label' => 'Option D',
            'text' => 'Check',
            'theme' => 'blue',
        ],
    ],
];
?>

@include('slider.other.discussion', ['content' => $content])
