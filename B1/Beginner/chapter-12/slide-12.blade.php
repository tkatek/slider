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
            'options' => ['should had taken', 'should have taken', 'should have took'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-12/img/slide12/2.webp'),

            'prompt'  => 'Mum was angry because I didn`t phone her. You . . . . . . . it.',
            'correct' => 'should have done',
            'options' => ['should have did', 'should has did', 'should have done'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-12/img/slide12/3.webp'),

            'prompt'  => 'I`m really tired today. I . . . . . . . to bed so late last night.',
            'correct' => 'shouldn`t have gone',
            'options' => ['shouldnt have gone', 'shouldnt gone', 'should have gone'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-12/img/slide12/4.webp'),

            'prompt'  => 'I`ve forgotten my passport thats why I didn`t fly to Madrid. You . . . . . . . more attentive.',
            'correct' => 'should have been',
            'options' => ['should been', 'shouldn`t have been', 'should have been'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-12/img/slide12/5.webp'),

            'prompt'  => 'You are overweight. You . . . . . . . too much.',
            'correct' => 'shouldn`t have eaten',
            'options' => ['should have eaten', 'should have ate', 'shouldn`t have eaten'],
        ],
        [
            'image'   => materialAsset('slider/B1/Beginner/chapter-12/img/slide12/6.webp'),

            'prompt'  => 'What terrible weather! You . . . . . . . during the storm!',
            'correct' => 'shouldnt have driven',
            'options' => ['shouldnt have driven', 'shouldnt have drove', 'should have driven'],
        ],
    ],
];

?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])