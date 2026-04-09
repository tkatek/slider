<?php
$content = [
    'title' => 'Hotel Facilities',
    'type' => 'audio',
    'subtitle' => 'Listen to the conversations and choose the correct answer',
    'audio' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide11/short-dialogue.mpeg'),
    'status_row_width' => 'max-w-4xl',
    'game_card_width' => 'max-w-4xl',

    'script' => [
        'Man: Excuse me, is there a gym in the hotel?',
        'Woman: Yes, there’s one on the first floor.',
        'Man: Great! And is there a pool?',
        'Woman: Yes, there’s a pool on the roof.',
        'Man: Is there a changing room up there?',
        'Woman: No, there isn’t, but there’s a restroom.',
        'Man: OK, thanks.',
    ],

    'questions' => [
        [
            'prompt' => '1) What is on the roof?',
            'correct' => 'A restroom',
            'options' => [
                'A changing room',
                'A restroom',
            ],
        ],
        [
            'prompt' => '2) Is there a changing room on the roof?',
            'correct' => 'No, there isn’t',
            'options' => [
                'Yes, there is.',
                'No, there isn’t',
                'No, there aren’t',
            ],
        ],
        [
            'prompt' => '3) Where is the hotel\'s pool located?',
            'correct' => 'The pool is on the roof',
            'options' => [
                'The pool is on the first floor',
                'There is a changing room on the roof',
                'The pool is on the roof',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])