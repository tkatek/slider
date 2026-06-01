<?php

$content = [
    'page_title' => 'Useful Phrases',

    'title'      => 'Quick wrap-up! Remember!',
    'subtitle'   => 'These are some useful phrases for asking a favour politely:',
    'top_badge'  => '💬 Polite Requests',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge'  => 'from-green-700 to-green-500',
            'title'  => 'Have you got a minute?',
            'description' => '',
        ],
        [
            'number' => '02',
            'badge'  => 'from-emerald-600 to-green-500',
            'title'  => 'I need a favour.',
            'description' => '',
        ],
        [
            'number' => '03',
            'badge'  => 'from-lime-600 to-green-500',
            'title'  => 'What do you need help with?',
            'description' => '',
        ],
        [
            'number' => '04',
            'badge'  => 'from-teal-600 to-emerald-500',
            'title'  => 'Would you be able to…?',
            'description' => '',
        ],
        [
            'number' => '05',
            'badge'  => 'from-green-800 to-emerald-600',
            'title'  => 'Is there any chance you could…?',
            'description' => '',
        ],
        [
            'number' => '06',
            'badge'  => 'from-emerald-700 to-lime-500',
            'title'  => 'I would if I could, but I can’t.',
            'description' => '',
        ],
    ],

    'footer_text' => 'Try using these expressions in your own conversations.',
];

?>

@include('slider.objectives.objectives-images', ['content' => $content])