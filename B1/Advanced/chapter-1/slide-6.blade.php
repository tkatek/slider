<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read it again & do the quiz',
    'type'     => 'text',

    'questions' => [
        [
            'prompt'  => 'Why did Silas think someone had entered his house?',
            'correct' => 'He found the front door wide open.',
            'options' => [
                'He heard strange voices.',
                'He found the front door wide open.',
                'He saw broken windows.',
                'He found his dog missing.',
            ],
        ],
        [
            'prompt'  => "Why did Silas believe the intruder hadn't forced the door open?",
            'correct' => 'There were no scratches on the lock.',
            'options' => [
                'The windows were open.',
                'There were no scratches on the lock.',
                'The police told him so.',
                'The dog barked loudly.',
            ],
        ],
        [
            'prompt'  => 'What clue made Silas think the intruder might have been a child?',
            'correct' => 'The small, narrow footprints.',
            'options' => [
                'The broken bowl.',
                'The open window.',
                'The small, narrow footprints.',
                'The loud noise upstairs.',
            ],
        ],
        [
            'prompt'  => "Why had Nico entered Silas's house?",
            'correct' => 'To look for his dog, Buster.',
            'options' => [
                'To borrow some tools.',
                'To steal food.',
                'To hide from the storm.',
                'To look for his dog, Buster.',
            ],
        ],
        [
            'prompt'  => 'What was the real reason the house was in a mess?',
            'correct' => 'Buster was frightened by the storm and knocked over the bowl.',
            'options' => [
                'A thief had searched every room.',
                'Nico had broken the bowl.',
                'Buster was frightened by the storm and knocked over the bowl.',
                'Silas forgot to clean the kitchen.',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])