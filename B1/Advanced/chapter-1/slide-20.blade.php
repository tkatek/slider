<?php
$content = [

    'title' => 'Reading',
    'subtitle' => 'Read each situation and choose the best explanation.',
    'activity_title' => 'Pay attention to the reduced forms in past modals.',
    'left_label' => 'Situation',
    'right_label' => 'Explanation',

    'pairs' => [
        [
            'id' => 'marcia',
            'left' => [
                'type' => 'word',
                'text' => '1. Marcia seems very relaxed.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'c. She may have just come back from vacation.',
            ],
        ],
        [
            'id' => 'claire',
            'left' => [
                'type' => 'word',
                'text' => '2. Claire is packing her things.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'a. She must have gotten fired.',
            ],
        ],
        [
            'id' => 'jeff',
            'left' => [
                'type' => 'word',
                'text' => '3. Jeff got a bad grade on his test.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'e. He might not have studied very hard.',
            ],
        ],
        [
            'id' => 'rodrigo',
            'left' => [
                'type' => 'word',
                'text' => '4. Rodrigo looks very tired today.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'b. He might have worked late last night.',
            ],
        ],
        [
            'id' => 'julia',
            'left' => [
                'type' => 'word',
                'text' => '5. Julia didn’t talk to her friends in the cafeteria.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'f. She must not have seen them.',
            ],
        ],
        [
            'id' => 'ahmed',
            'left' => [
                'type' => 'word',
                'text' => '6. Ahmed got a call and looked worried.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'd. He couldn’t have heard good news.',
            ],
        ],
    ],

    'right_order' => [
        'claire',
        'rodrigo',
        'marcia',
        'ahmed',
        'jeff',
        'julia',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])