<?php
$content = [
    'page_title' => 'New Language',
    'title' => 'New Language',
    'subtitle' => "Prepositions of time: '<span class=\"hl-gold\">at</span>', '<span class=\"hl-gold\">in</span>', '<span class=\"hl-gold\">on</span>'",
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-1 lg:grid-cols-1',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Look at these examples to see how we use <span class="hl-gold">at</span>, <span class="hl-gold">in</span> and <span class="hl-gold">on</span> to talk about time:',
            'tone' => 'from-slate-400 to-slate-600',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '&bull; <span class="hl-red">At</span> noon, the sun is very bright.',
                        '&bull; <span class="hl-red">In</span> autumn, the weather turns cooler.',
                        '&bull; <span class="hl-red">On</span> foggy days, it is hard to see far.',
                        '&bull; <span class="hl-red">In</span> the morning, the air is fresh.',
                        '&bull; <span class="hl-red">On</span> hot afternoons, people look for shade.',
                        '&bull; <span class="hl-red">At</span> sunset, the sky changes colour.',
                    ],
                ],

            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
