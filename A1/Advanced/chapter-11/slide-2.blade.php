<?php
$content = [
    'page_title' => 'Lesson Objectives',

    'title'      => 'Lesson Objectives',
    'subtitle'   => 'By the end of this lesson, you can:',
    'top_badge'  => '🎯 Lesson Goals',

    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge' => 'from-blue-500 to-blue-600',
            'title' => 'Name places and things at a gas station',
            'description' => '',
            'image' => '',
        ],
        [
            'number' => '02',
            'badge' => 'from-violet-500 to-violet-600',
            'title' => 'Say what people are doing now',
            'description' => '- He is filling the tank. </br> - They are washing the car.',
            'image' => '',
        ],
        [
            'number' => '03',
            'badge' => 'from-emerald-500 to-teal-500',
            'title' => 'Ask and answer questions about actions',
            'description' => '',
            'image' => '',
        ],
        [
            'number' => '04',
            'badge' => 'from-amber-500 to-orange-500',
            'title' => 'Compare types of fuels',
            'description' => "- What is he doing? </br> - He is paying the cashier.",
            'image' => '',
        ],
        [
            'number' => '05',
            'badge' => 'from-amber-500 to-orange-500',
            'title' => 'Compare types of fuels, using comparatives & superlatives',
            'description' => '',
            'image' => '',
        ],
    ],
];
?>
@include('slider.objectives.objectives-images', ['content' => $content])
