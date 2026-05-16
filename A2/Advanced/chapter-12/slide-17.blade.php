<?php

$content = [
    'page_title' => 'Writing',
    'title'      => 'Writing',
    'subtitle'   => 'Make sentences to express annoying habits. Use always + Present Continuous.',

    'focus_note' => 'Example: He / leave dirty cups on the table. → He is always leaving dirty cups on the table.',

    'stacked_full_input' => true,
    'stacked_grid_cols_2' => true,

    'questions' => [
        [
            'hint' => '1. She / take my laptop.',
            'answers' => [
                'She is always taking my laptop.',
                "She's always taking my laptop.",
            ],
        ],
        [
            'hint' => '2. You / make the same mistake.',
            'answers' => [
                'You are always making the same mistake.',
                "You're always making the same mistake.",
            ],
        ],
        [
            'hint' => '3. The dog / bark.',
            'answers' => [
                'The dog is always barking.',
            ],
        ],
        [
            'hint' => '4. They / get late for meetings.',
            'answers' => [
                'They are always getting late for meetings.',
                "They're always getting late for meetings.",
            ],
        ],
        [
            'hint' => '5. Simon / lose his keys.',
            'answers' => [
                'Simon is always losing his keys.',
                "Simon's always losing his keys.",
            ],
        ],
        [
            'hint' => '6. You / mispronounce my name.',
            'answers' => [
                'You are always mispronouncing my name.',
                "You're always mispronouncing my name.",
            ],
        ],
        [
            'hint' => '7. They / argue in public.',
            'answers' => [
                'They are always arguing in public.',
                "They're always arguing in public.",
            ],
        ],
        [
            'hint' => '8. He / interrupt me.',
            'answers' => [
                'He is always interrupting me.',
                "He's always interrupting me.",
            ],
        ],
        [
            'hint' => '9. You / wear my clothes.',
            'answers' => [
                'You are always wearing my clothes.',
                "You're always wearing my clothes.",
            ],
        ],
        [
            'hint' => '10. Kate / complain about her boss.',
            'answers' => [
                'Kate is always complaining about her boss.',
                "Kate's always complaining about her boss.",
            ],
        ],
    ],
];

?>

@include('slider.game.type-correct-format', ['content' => $content])
