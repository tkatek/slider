<?php
$content = [
    'page_title' => 'Remember',

    'title'      => 'Remember',
    'subtitle'   => 'When you make your call',
    'top_badge'  => '',

    'outcomes' => [
        [
            'number' => '01',
            'badge'  => 'from-blue-500 to-blue-600',
            'title'  => 'Listen very carefully to the questions',
            'description' => '',
        ],
        [
            'number' => '02',
            'badge'  => 'from-violet-500 to-violet-600',
            'title'  => 'Keep your replies short and precise',
            'description' => '',
        ],
        [
            'number' => '03',
            'badge'  => 'from-emerald-500 to-teal-500',
            'title'  => "Check if you don't understand",
            'description' => '',
        ],
        [
            'number' => '04',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Make sure your voice sounds calm',
            'description' => '',
        ],
    ],
];
?>
@include("slider.other.tips", ['content' => $content])