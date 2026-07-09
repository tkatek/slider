<?php

$content = [

    'title' => 'Practice 3',
    'subtitle' => 'Match the word to the definition',
    'activity_title' => 'Vocabulary Match!',
    'left_label' => 'Words',
    'right_label' => 'Meanings',

    'pairs' => [
        [
            'id' => 'locked',
            'left' => [
                'type' => 'word',
                'text' => '1. locked',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'H. closed and not able to be opened.',
            ],
        ],
        [
            'id' => 'security_camera',
            'left' => [
                'type' => 'word',
                'text' => '2. security camera',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'E. a camera used to watch and protect a place.',
            ],
        ],
        [
            'id' => 'priceless',
            'left' => [
                'type' => 'word',
                'text' => '3. priceless',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. very valuable; cannot be bought with money.',
            ],
        ],
        [
            'id' => 'disappear',
            'left' => [
                'type' => 'word',
                'text' => '4. disappear',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'J. to go away or be no longer seen.',
            ],
        ],
        [
            'id' => 'flicker',
            'left' => [
                'type' => 'word',
                'text' => '5. flicker',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. to shine with an unsteady or blinking light.',
            ],
        ],
        [
            'id' => 'footprint',
            'left' => [
                'type' => 'word',
                'text' => '6. footprint',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'F. a mark left by a foot or shoe on the ground.',
            ],
        ],
        [
            'id' => 'passage',
            'left' => [
                'type' => 'word',
                'text' => '7. passage',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. a hidden way or corridor.',
            ],
        ],
        [
            'id' => 'handwritten',
            'left' => [
                'type' => 'word',
                'text' => '8. handwritten',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'I. written by hand, not printed or typed.',
            ],
        ],
        [
            'id' => 'clue',
            'left' => [
                'type' => 'word',
                'text' => '9. clue',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. information that helps to solve a mystery.',
            ],
        ],
        [
            'id' => 'investigator',
            'left' => [
                'type' => 'word',
                'text' => '10. investigator',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'G. a person who looks for facts and solves cases.',
            ],
        ],
    ],

    'right_order' => [
        'clue',
        'priceless',
        'passage',
        'flicker',
        'security_camera',
        'footprint',
        'investigator',
        'locked',
        'handwritten',
        'disappear',
    ],
];

?>

@include('slider.game.matching-pairs', ['content' => $content])