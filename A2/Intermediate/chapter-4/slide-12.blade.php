<?php
$content = [
    'title'    => "Practice 5",
    'subtitle' => 'Choose the correct answer',
    'type' => 'questions_only',
    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',
    'questions' => [
        [
            'prompt'  => 'Hany goes to the doctor by ................',
            'correct' => 'himself',
            'options' => ['herself', 'myself', 'himself', 'Yourself'],
            'audio'   => null,
            'script'  => [
                'Hany goes to the doctor by himself.',
            ],
        ],
        [
            'prompt'  => 'I washed the car by ................',
            'correct' => 'myself',
            'options' => ['herself', 'Yourself', 'itself', 'myself'],
            'audio'   => null,
            'script'  => [
                'I washed the car by myself.',
            ],
        ],
        [
            'prompt'  => 'Mona washes the dishes by ................',
            'correct' => 'herself',
            'options' => ['Yourself', 'herself', 'myself', 'himself'],
            'audio'   => null,
            'script'  => [
                'Mona washes the dishes by herself.',
            ],
        ],
        [
            'prompt'  => 'Solve the problem by ................',
            'correct' => 'Yourself',
            'options' => ['myself', 'herself', 'himself', 'Yourself'],
            'audio'   => null,
            'script'  => [
                'Solve the problem by yourself.',
            ],
        ],
        [
            'prompt'  => 'We buy the food by ................',
            'correct' => 'Ourselves',
            'options' => ['Ourselves', 'Yourself', 'myself', 'himself'],
            'audio'   => null,
            'script'  => [
                'We buy the food by ourselves.',
            ],
        ],
        [
            'prompt'  => 'The dog is scratching by ................',
            'correct' => 'itself',
            'options' => ['herself', 'myself', 'Ourselves', 'itself'],
            'audio'   => null,
            'script'  => [
                'The dog is scratching by itself.',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])