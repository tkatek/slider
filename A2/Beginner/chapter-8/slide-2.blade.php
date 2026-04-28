<?php
$content = [
    'type'       => 'image',
    'page_title' => '',
    'title'      => 'Practice 1',
    'subtitle'   => 'What do they look like?',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.72,

    'questions' => [

        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-8/img/slide2/one.webp'),
            'prompt'  => 'What does he look like?',
            'correct' => 'He is tall.',
            'options' => ['He is tall.', 'She is tall.', 'He is short.', 'She is short.'],
        ],

        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-8/img/slide2/two.webp'),
            'prompt'  => 'What does she look like?',
            'correct' => 'She is short.',
            'options' => ['She is tall.', 'She is short.', 'He is handsome.', 'He is short.'],
        ],

        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-8/img/slide2/three.webp'),
            'prompt'  => 'What does he look like?',
            'correct' => 'He is handsome.',
            'options' => ['He is old.', 'He is short.', 'He is handsome.', 'She is pretty.'],
        ],

        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-8/img/slide2/four.webp'),
            'prompt'  => 'What does she look like?',
            'correct' => 'She is beautiful.',
            'options' => ['She is short.', 'She is beautiful.', 'He is handsome.', 'He is tall.'],
        ],

        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-8/img/slide2/five.webp'),
            'prompt'  => 'What does he look like?',
            'correct' => 'He is young.',
            'options' => ['He is old.', 'She is cute.', 'She is young.', 'He is young.'],
        ],

        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-8/img/slide2/six.webp'),
            'prompt'  => 'What does she look like?',
            'correct' => 'She is old.',
            'options' => ['She is old.', 'She is young.', 'She is tall.', 'He is old.'],
        ],

        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-8/img/slide2/seven.webp'),
            'prompt'  => 'What does she look like?',
            'correct' => 'She is good looking.',
            'options' => ['She is old.', 'She is good looking.', 'She is young.', 'He is old.'],
        ],

        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-8/img/slide2/eight.webp'),
            'prompt'  => 'What does she look like?',
            'correct' => 'She is attractive.',
            'options' => ['She is attractive.', 'She is old.', 'She is tall.', 'She is beautiful.'],
        ],

        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-8/img/slide2/nine.webp'),
            'prompt'  => 'What does he look like?',
            'correct' => 'He is fat.',
            'options' => ['He is tall.', 'He is thin.', 'He is handsome.', 'He is fat.'],
        ],

        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-8/img/slide2/ten.webp'),
            'prompt'  => 'What does he look like?',
            'correct' => 'He is handsome.',
            'options' => ['He is old.', 'He is tall.', 'He is handsome.', 'He is thin.'],
        ],

        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-8/img/slide2/eleven.webp'),
            'prompt'  => 'What does she look like?',
            'correct' => 'She is beautiful.',
            'options' => ['She is tall.', 'She is thin.', 'She is beautiful.', 'She is skinny.'],
        ],

        [
            'image'   => materialAsset('slider/A2/Beginner/chapter-8/img/slide2/twelve.webp'),
            'prompt'  => 'What does he look like?',
            'correct' => 'He is skinny.',
            'options' => ['He is tall.', 'He is thin.', 'He is skinny.', 'He is big.'],
        ],

    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
