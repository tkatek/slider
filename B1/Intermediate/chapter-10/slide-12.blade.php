<?php

$content = [
    'title' => 'Practice 4',
    'subtitle' => '',
    'activity_title' => 'Match each word with its synonym',
    'left_label' => 'A',
    'right_label' => 'B',

    'pairs' => [
        [
            'id' => 'brave',
            'left' => [
                'type' => 'word',
                'text' => '1. Brave',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. Courageous',
            ],
        ],
        [
            'id' => 'afraid',
            'left' => [
                'type' => 'word',
                'text' => '2. Afraid',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'K. Scared',
            ],
        ],
        [
            'id' => 'help',
            'left' => [
                'type' => 'word',
                'text' => '3. Help',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. Assist',
            ],
        ],
        [
            'id' => 'guilty',
            'left' => [
                'type' => 'word',
                'text' => '4. Guilty',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'F. Ashamed',
            ],
        ],
        [
            'id' => 'strength',
            'left' => [
                'type' => 'word',
                'text' => '5. Strength',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'I. Power',
            ],
        ],
        [
            'id' => 'known',
            'left' => [
                'type' => 'word',
                'text' => '6. Known',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. Famous',
            ],
        ],
        [
            'id' => 'inspire',
            'left' => [
                'type' => 'word',
                'text' => '7. Inspire',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'H. Motivate',
            ],
        ],
        [
            'id' => 'noticed',
            'left' => [
                'type' => 'word',
                'text' => '8. Noticed',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'E. Seen',
            ],
        ],
        [
            'id' => 'recognized',
            'left' => [
                'type' => 'word',
                'text' => '9. Recognized',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'J. Acknowledged',
            ],
        ],
        [
            'id' => 'right',
            'left' => [
                'type' => 'word',
                'text' => '10. Right',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'G. Correct',
            ],
        ],
        [
            'id' => 'small',
            'left' => [
                'type' => 'word',
                'text' => '11. Small',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. Tiny',
            ],
        ],
    ],

    'right_order' => [
        'known',      // A. Famous
        'help',       // B. Assist
        'small',      // C. Tiny
        'brave',      // D. Courageous
        'noticed',    // E. Seen
        'guilty',     // F. Ashamed
        'right',      // G. Correct
        'inspire',    // H. Motivate
        'strength',   // I. Power
        'recognized', // J. Acknowledged
        'afraid',     // K. Scared
    ],
];

?>

@include('slider.game.matching-pairs', ['content' => $content])