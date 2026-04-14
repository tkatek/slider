<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'Present simple',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Asking for Information:',
            'tone' => 'from-sky-400 to-blue-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'Where <span class="hl-gold">does</span> this bus <span class="hl-gold">go</span>?',
                        'What time <span class="hl-gold">does</span> the bus <span class="hl-gold">leave</span>?',
                        '<span class="hl-gold">Does</span> the bus <span class="hl-gold">go</span> to the airport?',
                        '<span class="hl-gold">Do</span> buse<span class="hl-red">s</span> <span class="hl-gold">leave</span> at night?',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Rule',
            'tone' => 'from-purple-400 to-violet-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'Use <span class="hl-gold">do</span> for plural subjects and <span class="hl-gold">does</span> for singular subjects when asking questions in the present simple.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Question Form',
            'tone' => 'from-cyan-400 to-blue-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'To ask questions in the present simple, we use: <span class="hl-gold">do</span> / <span class="hl-gold">does</span> + the subject + the verb.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
