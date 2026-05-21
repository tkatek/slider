<?php
$content = [
    'title' => 'Grammar',
    'subtitle' => 'Preferences',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-3',

    'cards' => [
        [
            'type' => 'sections',
            'title' => ' Do you prefer hot weather or cold weather?',
            'tone' => 'from-slate-500 to-stone-600',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '"I <span class="hl-red">like</span> rainy days when I\'m at home."',
                        '"I <span class="hl-red">love</span> drinking tea and watching movies when it rains."',
                        '"Do you <span class="hl-red">prefer</span> hot weather or cold weather?"',
                        '"I <span class="hl-red">prefer</span> warm weather like spring."',
                        '"Spring is perfect." / "Not too hot, not too cold."',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '✅ Talking about Likes',
            'tone' => 'from-teal-500 to-cyan-600',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '👉 Structure:',
                    'items' => [
                        '<span class="hl-red">I like /prefer/ love + noun / verb-ing</span>',
                        '<span class="font-black">Examples:</span>',
                        'I like rainy days 🌧️',
                        'I love drinking tea ☕',
                        'I like watching movies 🎬',
                        'I prefer warm weather ☀️',
                        'I prefer staying at home',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Talking about Dislikes',
            'tone' => 'from-rose-400 to-red-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '👉 Structure:',
                    'items' => [
                        '<span class="hl-red">I don’t like / I hate + noun / verb-ing</span>',
                        '<span class="font-black">Examples:</span>',
                        'I <span class="hl-red">don’t</span> like cold weather ❄️',
                        'I <span class="hl-red">hate</span> walking in the rain',
                        'I <span class="hl-red">dislike</span> rainy days.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
