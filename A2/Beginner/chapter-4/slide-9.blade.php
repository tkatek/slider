<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => "",
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-1 lg:grid-cols-1',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Past simple Tense',
            'tone' => 'from-slate-400 to-slate-600',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '&bull; <span class="hl-gold">Affirmative:</span> I watch<span class="hl-red">ed</span> TV.',
                        '&bull; <span class="hl-gold">Negative:</span> I <span class="hl-red">didn’t</span> watch TV.',
                        '&bull; <span class="hl-gold">Questions:</span> <span class="hl-red">Did</span> you watch TV?',
                        '&bull; <span class="hl-gold">Short answers:</span> Yes, I <span class="hl-red">did</span> / No, I <span class="hl-red">didn’t</span>.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])