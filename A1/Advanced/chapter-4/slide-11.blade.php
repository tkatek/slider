<?php
$content = [
    'title' => 'Grammar',
    'subtitle' => '',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Negative Form',
            'tone' => 'from-sky-400 to-blue-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="hl-gold">am/is/are+not</span>',
                        'Traffic <span class="hl-gold">is not</span> bad.',
                        'It <span class="hl-gold">isn’t</span> expensive',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Question Form',
            'tone' => 'from-purple-400 to-violet-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="hl-gold">Be + subject?</span>',
                        '<span class="hl-gold">Is</span> traffic bad?',
                        '<span class="hl-gold">Is</span> it $15?',
                    ],
                ],
            ],
        ],
        [
            'type' => 'table',
            'title' => '',
            'tone' => 'from-purple-400 to-violet-500',
            'badge_class' => '',
            'intro' => '',
            'card_class' => 'md:col-span-2 lg:col-span-2',
            'table_variant' => 'simple',
            'table_headers' => ['Subject', 'Verb “To Be”'],
            'table_rows' => [
                ['I', 'am'],
                ['You / We / They', 'are'],
                ['He / She / It', 'is'],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
