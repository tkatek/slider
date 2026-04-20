<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'People are talking about their vacations. Did they enjoy them? Listen and check the correct answer.',
    'type'     => 'audio',

    'audio' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide14.mp3'),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        '1.',
        'A: Did you have a nice vacation?',
        'B: It was nothing special. The weather was terrible.',
        'A: That’s too bad.',

        '2.',
        'A: Did you enjoy your trip to Vancouver?',
        'B: Yeah, it was fantastic. The people are so nice.',

        '3.',
        'A: How was your ski trip?',
        'B: Awful.',
        'A: Why?',
        'B: There was no snow!',

        '4.',
        'A: So how was your trip to France?',
        'B: Very disappointing. It was so crowded everywhere. We couldn’t even get a hotel room.',
        'A: That’s too bad. You should never go in July.',
        'B: Now you tell me!',

        '5.',
        'A: When did you get back from the beach?',
        'B: Last weekend. I had a terrific time. I swam every day and I learned how to windsurf.',
        'A: Great!',
    ],

    'questions' => [
        [
            'prompt'  => 'Did they enjoy the vacation?',
            'correct' => 'no',
            'options' => [
                'yes',
                'no',
            ],
        ],
        [
            'prompt'  => 'Did they enjoy the trip to Vancouver?',
            'correct' => 'yes',
            'options' => [
                'yes',
                'no',
            ],
        ],
        [
            'prompt'  => 'Did they enjoy the ski trip?',
            'correct' => 'no',
            'options' => [
                'yes',
                'no',
            ],
        ],
        [
            'prompt'  => 'Did they enjoy the trip to France?',
            'correct' => 'no',
            'options' => [
                'yes',
                'no',
            ],
        ],
        [
            'prompt'  => 'Did they enjoy the trip to the beach?',
            'correct' => 'yes',
            'options' => [
                'yes',
                'no',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])