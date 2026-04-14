<?php
$content = [

    'title' => 'New Language 3',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Grammar Focus: Present Simple + I / You / We / They',
            'tone' => 'from-orange-500 to-red-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '✅ Positive sentences',
                    'items' => [
                        'We use the present simple to talk about things we do regularly.',
                    ],
                ],
                [
                    'heading' => '👉 Structure:',
                    'items' => [
                        'I / You / We / They + verb',
                    ],
                ],
                [
                    'heading' => 'Examples:',
                    'items' => [
                        'I <span class="hl-gold">swim</span> in summer 🏊',
                        'We <span class="hl-gold">play</span> football in spring ⚽',
                        'They <span class="hl-gold">go</span> on vacation in summer ⛱️',
                        'I <span class="hl-gold">build</span> snowmen in winter ⛄',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Grammar Focus: Present Simple (He / She / It)',
            'tone' => 'from-yellow-400 to-amber-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '✅ Positive Sentences',
                    'items' => [
                        '👉 With <span class="hl-gold">he / she / it</span>, we add <span class="hl-gold">-s</span> to the verb',
                    ],
                ],
                [
                    'heading' => 'Structure:',
                    'items' => [
                        'He / She / It + verb (+ <span class="hl-gold">s</span>)',
                    ],
                ],
                [
                    'heading' => 'Examples:',
                    'items' => [
                        'He <span class="hl-gold">swims</span> in summer 🏖️',
                        'She <span class="hl-gold">plays</span> outside in spring 🌸',
                        'It <span class="hl-gold">rains</span> in winter ☔',
                        'He <span class="hl-gold">likes</span> hot weather ☀️',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
