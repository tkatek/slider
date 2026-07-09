<?php
$content = [

    'title' => 'Practice 4',
    'subtitle' => '',
    'activity_title' => 'Match the word to the definition',
    'left_label' => 'Word',
    'right_label' => 'Definition',

    'pairs' => [
        [
            'id' => 'kneel',
            'left' => [
                'type' => 'word',
                'text' => '1. kneel',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. to go down onto one or both knees',
            ],
        ],
        [
            'id' => 'muddy',
            'left' => [
                'type' => 'word',
                'text' => '2. muddy',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'E. covered with or full of mud',
            ],
        ],
        [
            'id' => 'footprint',
            'left' => [
                'type' => 'word',
                'text' => '3. footprint',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'L. the mark left by a foot or shoe',
            ],
        ],
        [
            'id' => 'latch',
            'left' => [
                'type' => 'word',
                'text' => '4. latch',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'M. a small device used to keep a door or gate closed',
            ],
        ],
        [
            'id' => 'fasten',
            'left' => [
                'type' => 'word',
                'text' => '5. fasten',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'F. to close or secure something firmly',
            ],
        ],
        [
            'id' => 'force',
            'left' => [
                'type' => 'word',
                'text' => '6. force',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'N. to make something open or move by using strength',
            ],
        ],
        [
            'id' => 'intruder',
            'left' => [
                'type' => 'word',
                'text' => '7. intruder',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. a person who enters a place without permission',
            ],
        ],
        [
            'id' => 'scratch',
            'left' => [
                'type' => 'word',
                'text' => '8. scratch',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'G. a small cut or mark on a surface or skin',
            ],
        ],
        [
            'id' => 'shadow',
            'left' => [
                'type' => 'word',
                'text' => '9. shadow',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'I. a dark shape made when light is blocked',
            ],
        ],
        [
            'id' => 'whisper',
            'left' => [
                'type' => 'word',
                'text' => '10. whisper',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'J. to speak very quietly',
            ],
        ],
        [
            'id' => 'storm',
            'left' => [
                'type' => 'word',
                'text' => '11. storm',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'H. a period of very bad weather with strong wind and rain',
            ],
        ],
        [
            'id' => 'realize',
            'left' => [
                'type' => 'word',
                'text' => '12. realize',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. to suddenly understand something',
            ],
        ],
        [
            'id' => 'freeze',
            'left' => [
                'type' => 'word',
                'text' => '13. freeze',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. to stop moving because of fear or surprise',
            ],
        ],
        [
            'id' => 'clue',
            'left' => [
                'type' => 'word',
                'text' => '14. clue',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'O. a piece of information that helps solve a mystery',
            ],
        ],
        [
            'id' => 'evidence',
            'left' => [
                'type' => 'word',
                'text' => '15. evidence',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'K. facts or objects that help prove what happened',
            ],
        ],
    ],

    'right_order' => [
        'realize',
        'intruder',
        'freeze',
        'kneel',
        'muddy',
        'fasten',
        'scratch',
        'storm',
        'shadow',
        'whisper',
        'evidence',
        'footprint',
        'latch',
        'force',
        'clue',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])