<?php
$content = [
    'page_title' => 'Comparatives & Superlatives',
    'title' => 'Comparatives & Superlatives',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-1 lg:grid-cols-1',

    'cards' => [
        [
            'type' => 'table',
            'title' => '',
            'tone' => 'from-blue-500 via-indigo-500 to-purple-600',
            'mobile_cards' => true,
            'table_headers' => [
                'Type',
                'Rule',
                'Base Adjective',
                'Comparative',
                'Superlative',
            ],
            'table_rows' => [
                [['text' => '<strong>Short Adjectives</strong>'], 'Add -er / -est', 'noisy', 'noisier', 'the noisiest'],
                ['', '', 'fast', 'faster', 'the fastest'],
                ['', '', 'clean', 'cleaner', 'the cleanest'],
                ['', '', 'green', 'greener', 'the greenest'],
                ['', '', 'fresh', 'fresher', 'the freshest'],
                ['', '', 'cheap', 'cheaper', 'the cheapest'],

                [['text' => '<strong>Long Adjectives</strong>'], 'Use more / the most', 'crowded', 'more crowded', 'the most crowded'],
                ['', '', 'exciting', 'more exciting', 'the most exciting'],
                ['', '', 'difficult', 'more difficult', 'the most difficult'],

                [
                    ['text' => '<strong>Irregular</strong>'],
                    'Change form',
                    ['text' => '<span class="hl-red">good</span>'],
                    ['text' => '<span class="hl-red">better</span>'],
                    ['text' => '<span class="hl-red">the best</span>'],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Can you guess the missing word?',
            'tone' => 'from-indigo-500 via-purple-500 to-violet-600',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'The big phone’s screen is <span class="hl-red">___</span> than the small one’s.',
                        'The small phone is <span class="hl-red">.........$..........</span> than the big one.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
