<?php

$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset(''),
    'isQuiz'   => 0,

    'questions' => [
        [
            'time' => 18000,
            'type' => 'input',
            'question' => 'Empathy is the ability to think about what someone else is going through and imagine yourself in __________.',
            'accepted_answers' => [
                'that place',
            ],
            'points' => 10,
        ],
        [
            'time' => 79000,
            'type' => 'input',
            'question' => 'We must step out of our comfort zone and be the reason someone __________ today.',
            'accepted_answers' => [
                'smiles',
            ],
            'points' => 10,
        ],
        [
            'time' => 22000,
            'type' => 'multiple_choice',
            'question' => 'What does empathy allow us to do?',
            'options' => [
                "Ignore other people's feelings",
                "Understand and share another person's feelings",
                'Judge people quickly',
                'Avoid helping others',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 33000,
            'type' => 'multiple_choice',
            'question' => 'According to the video, empathy requires us to:',
            'options' => [
                'Think only about ourselves',
                'Avoid difficult situations',
                'Stop thinking only of ourselves and think of others',
                'Agree with everyone',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 83000,
            'type' => 'multiple_choice',
            'question' => 'What can a simple spark of empathy ignite?',
            'options' => [
                'An argument',
                'A chain reaction of compassion',
                'A feeling of loneliness',
                'A competition',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        [
            'start' => 0,
            'end' => 8,
            'text' => "Empathy is a choice, an opportunity to put yourself in someone else's situation, to view the world through the lens of someone else's circumstances.",
        ],
        [
            'start' => 8.5,
            'end' => 18,
            'text' => 'Empathy is the ability to think about what someone else is going through, imagining yourself in that place.',
        ],
        [
            'start' => 18.5,
            'end' => 28,
            'text' => 'Empathy is seeing with the eyes of another, listening with the ears of another, and feeling with the heart of another.',
        ],
        [
            'start' => 28.5,
            'end' => 39,
            'text' => "Empathy is being there for people who are your closest friends or even someone you don't know. Empathy takes work. It takes practice.",
        ],
        [
            'start' => 39.5,
            'end' => 49,
            'text' => 'Empathy requires each one of us to stop thinking only of ourselves and start thinking of others in our world.',
        ],
        [
            'start' => 49.5,
            'end' => 60,
            'text' => 'Everybody has a need for empathy, whether it is great or small. Every day, in every school, students are made fun of, outcasted, looked down upon, and made to feel worthless.',
        ],
        [
            'start' => 60.5,
            'end' => 69,
            'text' => "Life can be lonely at times. It's important to feel like someone has your back.",
        ],
        [
            'start' => 69.5,
            'end' => 78,
            'text' => 'We judge people when we do not understand them. People say, "Sticks and stones may break your bones, but words will never hurt you," as if that were true at all.',
        ],
        [
            'start' => 78.5,
            'end' => 88,
            'text' => "Empathy towards others encourages hope, encourages love, and encourages tolerance. Respect people's feelings.",
        ],
        [
            'start' => 88.5,
            'end' => 97,
            'text' => "Even if it doesn't mean anything to you, it could mean everything to them.",
        ],
        [
            'start' => 97.5,
            'end' => 107,
            'text' => 'Empathy shows people who are hurting that someone cares and that they are not alone.',
        ],
        [
            'start' => 107.5,
            'end' => 116,
            'text' => 'Instead of putting others in their place, put yourself in their place. No prescription works like empathy can.',
        ],
        [
            'start' => 116.5,
            'end' => 126,
            'text' => 'We must step out of our comfort zone and be the reason someone smiles today.',
        ],
        [
            'start' => 126.5,
            'end' => 136,
            'text' => 'Empathy is like a wildfire, a simple spark can ignite a chain reaction of compassion.',
        ],
        [
            'start' => 136.5,
            'end' => 145,
            'text' => 'Empathy can change the world, starting with just one person. And that one person could be you.',
        ],
    ],
];

?>

@include("slider.video.interactive", ['content' => $content])