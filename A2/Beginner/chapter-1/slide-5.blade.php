<?php
$content = [
    'title' => "Practice 1:  Warm-up",
    'subtitle' => 'Look at the picture & choose the correct answer',
    'type' => 'image',

    'enable_image_zoom' => false, 'game_card_width' => 'max-w-5xl', 'image_panel_col_class' => 'sm:col-span-6', 'answer_panel_col_class' => 'sm:col-span-6', 'image_scale' => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/sunny.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's sunny",
            'options' => ["It's sunny", "It's windy"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/rainy.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's rainy",
            'options' => ["It's rainy", "It's hot"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/snowy.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's snowy",
            'options' => ["It's snowy", "It's hot"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/windy.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's windy",
            'options' => ["It's windy", "It's cold"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/stormy.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's stormy",
            'options' => ["It's stormy", "It's sunny"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/cloudy.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's cloudy",
            'options' => ["It's cloudy", "It's sunny"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/cold.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's cold",
            'options' => ["It's cold", "It's sunny"],
        ],
        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-1/slide5/hot.webp'),
            'prompt'  => "What's the weather like?",
            'correct' => "It's hot",
            'options' => ["It's hot", "It's cold"],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])