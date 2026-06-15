<?php

$content = [
    'title'    => 'Listen again',
    'subtitle' => 'Complete the Third Conditional sentences.',

    'audio' => materialAsset('slider/B1/Beginner/chapter-11/audios/slide18.mp3'),

    'transcript' => [
        "Hi, I'm James. When I think about my life, I realize things could have been different if I had made other choices.

When I was a teenager, I didn't study very hard. If I had studied more, I would have gone to a better university and found a better job earlier.

I also didn't travel much when I was young. If I had traveled more, I would have learned about different cultures and met interesting people.

My parents often told me to save money, but I didn't listen. If I had saved more, I would have had more savings now.

I also didn't take good care of my health. If I had eaten better and exercised more, I wouldn't have faced some health problems today.

Even though I made mistakes, I have learned a lot from them.",

    ],

    'instruction'      => '',
    'instruction_note' => 'Use the audio to complete each sentence',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'If I had studied more, I '],
                [
                    'blank' => true,
                    'answer' => 'would have gone to',
                    'answers' => ['would have gone to'],
                ],
                ['text' => ' a better university.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'If I had traveled, I '],
                [
                    'blank' => true,
                    'answer' => 'would have learned',
                    'answers' => ['would have learned'],
                ],
                ['text' => ' about different cultures.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'If I had saved money, I '],
                [
                    'blank' => true,
                    'answer' => 'would have had',
                    'answers' => ['would have had'],
                ],
                ['text' => ' more savings now.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'If I had eaten better and exercised, I '],
                [
                    'blank' => true,
                    'answer' => 'would not have faced',
                    'answers' => ['would not have faced', "wouldn't have faced"],
                ],
                ['text' => ' some health problems today.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])