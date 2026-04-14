<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'There is / There are',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Use there is with singular countable nouns.',
            'tone' => 'from-sky-400 to-blue-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="hl-gold">There is</span> a department store in town.',
                        '<span class="hl-gold">There is</span> a big mall in this city.',
                        '<span class="hl-gold">There is not</span> a place to sit.',
                        '<span class="hl-gold">There is no</span> park near my house.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Use there are with plural countable nouns.',
            'tone' => 'from-purple-400 to-violet-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="hl-gold">There are</span> two cars parked outside my house.',
                        '<span class="hl-gold">There are</span> some books on the table.',
                        '<span class="hl-gold">There are not</span> many tall buildings in my town.',
                        '<span class="hl-gold">There are no</span> new students this year.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Use there is with non-countable nouns.',
            'tone' => 'from-cyan-400 to-blue-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="hl-gold">There is</span> crime in the city.',
                        '<span class="hl-gold">There is</span> money on the table.',
                        '<span class="hl-gold">There is not</span> any cheese in the fridge.',
                        '<span class="hl-gold">There is no</span> ice cream in the freezer.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
