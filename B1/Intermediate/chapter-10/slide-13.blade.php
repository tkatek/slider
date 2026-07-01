<?php

$content = [
    'title' => 'Practice 5',
    'subtitle' => '',
    'activity_title' => 'Match each word with its opposite.',
    'left_label' => 'Word',
    'right_label' => 'Antonym',

    'pairs' => [
        [
            'id' => 'brave',
            'left' => [
                'type' => 'word',
                'text' => '1. Brave',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. Cowardly',
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
                'text' => 'H. Fearless',
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
                'text' => 'B. Ignore',
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
                'text' => 'J. Proud',
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
                'text' => 'F. Weakness',
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
                'text' => 'K. Unknown',
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
                'text' => 'A. Discourage',
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
                'text' => 'I. Ignored',
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
                'text' => 'E. Unrecognized',
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
                'text' => 'C. Wrong',
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
                'text' => 'G. Big',
            ],
        ],
    ],

    'right_order' => [
        'inspire',    // A. Discourage
        'help',       // B. Ignore
        'right',      // C. Wrong
        'brave',      // D. Cowardly
        'recognized', // E. Unrecognized
        'strength',   // F. Weakness
        'small',      // G. Big
        'afraid',     // H. Fearless
        'noticed',    // I. Ignored
        'guilty',     // J. Proud
        'known',      // K. Unknown
    ],
];

?>

@include('slider.game.matching-pairs', ['content' => $content])