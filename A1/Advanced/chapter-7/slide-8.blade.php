<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading Comprehension',
    'title'           => 'Reading Comprehension',
    'subtitle'        => 'Choose the correct answer',
    'audio'           => materialAsset('slider/A1/Advanced/chapter-7/audios/slide8.mp3'),
    'reading_title'   => 'Safety Colours',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,

    'passage' => [
        "Safety colours help people understand dangers and safe areas quickly.",
        "Red shows danger or stop.",
        "Yellow warns people to be careful.",
        "Green shows safe actions.",
        "Blue gives notices.",
        "These colours guide people to stay safe in different places.",
    ],

    'questions' => [
        [
            'prompt'  => 'Why do you think safety colours are important?',
            'correct' => 'They help people understand danger and stay safe.',
            'options' => [
                'They make places look colourful.',
                'They help people understand danger and stay safe.',
                'They are only for decoration.',
            ],
        ],
        [
            'prompt'  => 'Which safety colour do you notice most often?',
            'correct' => 'Red',
            'options' => [
                'Green',
                'Red',
                'Blue',
            ],
        ],
        [
            'prompt'  => 'Which colour means danger?',
            'correct' => 'Red',
            'options' => [
                'Green',
                'Red',
                'Blue',
            ],
        ],
        [
            'prompt'  => 'Which colour shows safety?',
            'correct' => 'Green',
            'options' => [
                'Green',
                'Yellow',
                'Red',
            ],
        ],
        [
            'prompt'  => 'Which colour gives notices?',
            'correct' => 'Blue',
            'options' => [
                'Blue',
                'Red',
                'Yellow',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])