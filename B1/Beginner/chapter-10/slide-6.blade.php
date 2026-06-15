<?php
$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Listen again & choose the correct answer',
    'type'     => 'audio',

    'audio' => materialAsset('slider/B1/Beginner/chapter-10/audios/slde6.mp3'),

    'script' => [
        'Emma looked at the cooling rack on the counter. She had baked the cookies with extra chocolate chips. Now, they were all gone.',

        'Emma searched for any clues near the stove. The cookies had vanished while she was playing in the yard. She picked up her magnifying glass to investigate.',

        'She found her brother, Max, in the playroom. He had spent the whole hour building a giant robot out of blocks. Max showed her his clean, dry hands.',

        "Emma went to check on Barnaby the dog. The dog had snoozed soundly in his favorite spot by the window. He woke up and wagged his tail, but he didn't have any crumbs on his fur.",

        'Near the back door, Emma spotted a trail. Someone had left a path of crumbs leading out to the garden. She followed the clues across the grass.',

        'She found Dad, whose name was Arthur, sitting on a bench. He had eaten every single treat on the tray. He still had a tiny smudge of chocolate on his cheek.',

        'Arthur looked very sheepish as he explained. He had assumed the cookies were a special snack for the whole family. He said he was very sorry for eating them all.',

        'Emma and Arthur headed back to the kitchen to start again. They had decided to bake a double batch so there would be plenty for everyone.',
    ],

    'questions' => [
        [
            'prompt'  => 'Why was Emma upset?',
            'correct' => 'The cookies were gone.',
            'options' => [
                'Her robot was broken.',
                'Her dog ran away.',
                'The cookies were gone.',
                'Her toys were missing.',
            ],
        ],
        [
            'prompt'  => 'What tool did Emma use to investigate?',
            'correct' => 'A magnifying glass',
            'options' => [
                'A camera',
                'A flashlight',
                'A telescope',
                'A magnifying glass',
            ],
        ],
        [
            'prompt'  => 'Why was Max not the culprit?',
            'correct' => 'He had been building a robot.',
            'options' => [
                'He was sleeping.',
                'He was outside.',
                'He had been building a robot.',
                'He was at school.',
            ],
        ],
        [
            'prompt'  => 'What clue did Emma find near the back door?',
            'correct' => 'A trail of crumbs',
            'options' => [
                'A chocolate wrapper',
                'A trail of crumbs',
                'A footprint',
                'A note',
            ],
        ],
        [
            'prompt'  => 'Who had eaten the cookies?',
            'correct' => 'Arthur',
            'options' => [
                'Max',
                'Barnaby',
                'Emma',
                'Arthur',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])