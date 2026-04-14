<?php
$content = [
    'title' => "Practice 1:  Warm-up",
    'subtitle' => 'Look at the picture & choose the correct answer',
    'type' => 'image',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/windy.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's windy",
            'options' => ["It's windy", "It's sunny", "It's cloudy"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/rainy.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's rainy",
            'options' => ["It's rainy", "It's hot", "It's cold/freezing"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/sunny.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's sunny",
            'options' => ["It's raining", "It's sunny", "It's cold/freezing"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/cold.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's cold/freezing",
            'options' => ["It's raining", "It's sunny", "It's cold/freezing"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/foggy.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's foggy",
            'options' => ["It's foggy", "It's sunny", "It's snowing"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/cold.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's cold",
            'options' => ["It's windy", "It's foggy", "It's cold"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/cloudy.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's cloudy",
            'options' => ["It's sunny", "It's foggy", "It's cloudy"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/rainy.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's raining",
            'options' => ["It's sunny", "It's raining", "It's windy"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/stormy.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's stormy",
            'options' => ["It's snowing", "It's stormy", "It's sunny"],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
