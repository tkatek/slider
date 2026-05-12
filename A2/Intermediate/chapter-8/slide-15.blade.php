<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading',
    'title'           => 'Reading',
    'subtitle'        => 'Read the passage and answer the questions',
    'reading_title'   => 'Weekend Plans',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,
    'reading_text_size' => 'small',

    'passage' => "Tom and Sam are talking about their weekend plans. Tom says that if the weather is nice, he will go to the park and relax. Sam agrees and says that if the sun comes out, they will visit a new café together.\n\nTom says that if he meets his friend Jake, he will invite him to join them. Sam likes the idea because they can catch up and talk.\n\nHowever, if it rains, Tom will stay at home and watch a TV series. Sam says that if the rain continues, they will order pizza and spend time at his house.\n\nThey decide that if Tom calls Sam on Saturday morning, they will meet and make a final plan.",

    'questions' => [
        [
            'prompt'  => 'What will Tom do if the weather is nice?',
            'correct' => 'Go to the park',
            'options' => [
                'Stay at home',
                'Go to the park',
                'Visit family',
                'Study',
            ],
        ],
        [
            'prompt'  => 'What will they do if the sun comes out?',
            'correct' => 'Visit a café',
            'options' => [
                'Go shopping',
                'Visit a café',
                'Watch a movie',
                'Travel',
            ],
        ],
        [
            'prompt'  => 'Tom will invite Jake if he sees him.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'They will go out if it rains.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'They may order pizza if the rain continues.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
