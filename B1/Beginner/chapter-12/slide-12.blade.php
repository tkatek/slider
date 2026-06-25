<?php

$content = [

    'type'       => 'image',
    'page_title' => 'Practice 6',
    'title'      => 'Practice 6',
    'subtitle'   => 'Choose the correct answer.',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.6,

    'questions' => [
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-12/img/slide12/1.webp'),
            'prompt'  => 'I got really wet walking home last night. I . . . . . . . an umbrella.',
            'correct' => 'should have taken',
            'options' => ['should have taken', 'shouldn’t have taken', 'should have brought'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-12/img/slide12/2.webp'),
            'prompt'  => 'Mum was angry because I didn’t phone her. You . . . . . . . it.',
            'correct' => 'should have done',
            'options' => ['should have done', 'shouldn’t have done', 'should have did'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-12/img/slide12/3.webp'),
            'prompt'  => 'I’m really tired today. I . . . . . . . to bed so late last night.',
            'correct' => 'shouldn’t have gone',
            'options' => ['shouldn’t have gone', 'shouldn’t gone', 'should have gone'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-12/img/slide12/4.webp'),
            'prompt'  => 'I’ve forgotten my passport. That’s why I didn’t fly to Madrid. You . . . . . . . more attentive.',
            'correct' => 'should have been',
            'options' => ['should have been', 'shouldn’t have been', 'should been'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-12/img/slide12/5.webp'),
            'prompt'  => 'You are overweight. You . . . . . . . too much.',
            'correct' => 'shouldn’t have eaten',
            'options' => ['shouldn’t have eaten', 'should have eaten', 'should have ate'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-12/img/slide12/6.webp'),
            'prompt'  => 'What terrible weather! You . . . . . . . during the storm!',
            'correct' => 'shouldn’t have driven',
            'options' => ['shouldn’t have driven', 'shouldn’t have drove', 'should have driven'],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])