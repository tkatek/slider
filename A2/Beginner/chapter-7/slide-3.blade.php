<?php
$content = [
    'type' => 'image',
    'page_title' => '',
    'title' => 'Practice',
    'subtitle' => 'Can you describe these people?',
    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-4xl',
    'image_panel_col_class' => 'sm:col-span-5',
    'answer_panel_col_class' => 'sm:col-span-7',
    'image_scale' => null,

    'questions' => [

        [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide3/Old-woman.webp'),
            'prompt' => 'The woman is ...',
            'correct' => 'old',
            'options' => ['old', 'young', 'intelligent'],
        ],

        [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide3/Angry-man.webp'),
            'prompt' => 'The man is ...',
            'correct' => 'angry',
            'options' => ['short', 'tall', 'angry'],
        ],

        [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide3/Girl-short.webp'),
            'prompt' => 'The girl is ...',
            'correct' => 'short',
            'options' => ['sad', 'shy', 'short'],
        ],

        [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide3/Boy-intelligent.webp'),
            'prompt' => 'The boy is ...',
            'correct' => 'intelligent',
            'options' => ['old', 'intelligent', 'lazy'],
        ],

        [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide3/Woman-ugly.webp'),
            'prompt' => 'The "woman" is ...',
            'correct' => 'ugly',
            'options' => ['beautiful', 'ugly', 'kind'],
        ],

        [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide3/Young-woman-kind.webp'),
            'prompt' => 'The young woman is ...',
            'correct' => 'kind',
            'options' => ['intelligent', 'shy', 'kind'],
        ],

        [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide3/Tall-woman.webp'),
            'prompt' => 'The woman is ...',
            'correct' => 'tall',
            'options' => ['ugly', 'short', 'tall'],
        ],

        [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide3/Beautiful-woman.webp'),
            'prompt' => 'The woman is ...',
            'correct' => 'beautiful',
            'options' => ['beautiful', 'ugly', 'kind'],
        ],

        [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide3/Lazy-man.webp'),
            'prompt' => 'The man is ...',
            'correct' => 'lazy',
            'options' => ['lazy', 'ugly', 'crazy'],
        ],

        [
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide3/Handsome-man.webp'),
            'prompt' => 'The man is ...',
            'correct' => 'handsome',
            'options' => ['ugly', 'tired', 'handsome'],
        ],

    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])