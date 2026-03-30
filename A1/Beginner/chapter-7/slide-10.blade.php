<?php
$content = [
    'page_title'    => 'Listen & choose the correct answer',
    'title'         => 'Listen & choose the correct answer',
    'subtitle'      => 'Study the map. Then, listen to each sentence and choose TRUE or FALSE.',
    'image' => materialAsset('slider/A1/Beginner/chapter-7/img/map.webp'),
    'type'=>'image',
    'questions' => [
        [
            'prompt'  => 'The hotel is next to the bank.',
            'correct' => 'True',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q1.mpeg'),
            'script'  => [
                'The hotel is next to the bank.',
            ],
        ],
        [
            'prompt'  => 'The zoo is opposite the police station.',
            'correct' => 'True',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q2.mpeg'),
            'script'  => [
                'The zoo is opposite the police station.',
            ],
        ],
        [
            'prompt'  => 'The library is between the post office and the supermarket.',
            'correct' => 'False',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q3.mpeg'),
            'script'  => [
                'The library is between the post office and the supermarket.',
            ],
        ],
        [
            'prompt'  => 'The bowling alley is on East Street.',
            'correct' => 'False',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q4.mpeg'),
            'script'  => [
                'The bowling alley is on East Street.',
            ],
        ],
        [
            'prompt'  => 'The bar is on the corner of West Street and South Street.',
            'correct' => 'True',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q5.mpeg'),
            'script'  => [
                'The bar is on the corner of West Street and South Street.',
            ],
        ],
        [
            'prompt'  => 'City hall is in front of the library.',
            'correct' => 'False',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q6.mpeg'),
            'script'  => [
                'City hall is in front of the library.',
            ],
        ],
        [
            'prompt'  => 'The hospital is near the bus station.',
            'correct' => 'True',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q7.mpeg'),
            'script'  => [
                'The hospital is near the bus station.',
            ],
        ],
        [
            'prompt'  => 'The zoo is behind the post office.',
            'correct' => 'False',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q8.mpeg'),
            'script'  => [
                'The zoo is behind the post office.',
            ],
        ],
        [
            'prompt'  => 'The bowling alley is behind the bookstore.',
            'correct' => 'True',
            'options' => ['True', 'False'],
            'audio'   => materialAsset('slider/A1/Beginner/chapter-7/audios/q9.mpeg'),
            'script'  => [
                'The bowling alley is behind the bookstore.',
            ],
        ],
        [
            'prompt'  => 'The school is between the bus station and the police station.',
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
