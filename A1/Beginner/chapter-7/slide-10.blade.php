<?php
$content = [
    'page_title'    => 'Listen & choose the correct answer',
    'title'         => 'Listen & choose the correct answer',
    'title_class'   => 'text-3xl sm:text-4xl lg:text-5xl',
    'subtitle'      => '<span class="text-lg leading-snug sm:text-xl lg:text-2xl">Study the map. Then, listen to each sentence and choose TRUE or FALSE.</span>',
    'question_prompt_label' => 'Choose TRUE or FALSE:',
    'image' => materialAsset('slider/A1/Beginner/chapter-7/img/map.webp'),
    'type'=>'image',
    'questions' => [
        [
            'prompt'  => '',
            'correct' => 'True',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q1.mpeg'),
            'script'  => [
                'The hotel is next to the bank.',
            ],
        ],
        [
            'prompt'  => '',
            'correct' => 'True',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q2.mpeg'),
            'script'  => [
                'The zoo is opposite the police station.',
            ],
        ],
        [
            'prompt'  => '',
            'correct' => 'False',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q3.mpeg'),
            'script'  => [
                'The library is between the post office and the supermarket.',
            ],
        ],
        [
            'prompt'  => '',
            'correct' => 'False',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q4.mpeg'),
            'script'  => [
                'The bowling alley is on East Street.',
            ],
        ],
        [
            'prompt'  => '',
            'correct' => 'True',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q5.mpeg'),
            'script'  => [
                'The bar is on the corner of West Street and South Street.',
            ],
        ],
        [
            'prompt'  => '',
            'correct' => 'False',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q6.mpeg'),
            'script'  => [
                'City hall is in front of the library.',
            ],
        ],
        [
            'prompt'  => '',
            'correct' => 'True',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q7.mpeg'),
            'script'  => [
                'The hospital is near the bus station.',
            ],
        ],
        [
            'prompt'  => '',
            'correct' => 'False',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q8.mpeg'),
            'script'  => [
                'The zoo is behind the post office.',
            ],
        ],
        [
            'prompt'  => '',
            'correct' => 'True',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q9.mpeg'),
            'script'  => [
                'The bowling alley is behind the bookstore.',
            ],
        ],
        [
            'prompt'  => '',
            'correct' => 'False',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q10.mpeg'),
            'script'  => [
                'The school is between the bus station and the police station.',
            ],
        ],
    ],
];
?>

@include("slider.game.multi-choice-all-in-one",['content'=>$content])
