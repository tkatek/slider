<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'Present simple: With verb to (be)',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'We use <span class="hl-gold">am / is / are</span> to describe:',
            'tone' => 'from-blue-400 to-indigo-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'Situations',
                        'Conditions',
                        'Prices',
                        'Facts',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Examples:',
            'tone' => 'from-cyan-400 to-blue-500'

            ,
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'Traffic <span class="hl-gold">is not</span> bad right now.',
                        'It <span class="hl-gold">is</span> 14.25.',
                        'It <span class="hl-gold">is</span> usually around $15.',
                        'We <span class="hl-gold">are</span> here.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
