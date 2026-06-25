<?php
$content = [
    'type'=>'emoji',

    'title'    => 'Warm up:  Practice 1',
    'subtitle' => 'Random acts of kindness',

    'questions' => [
        [
            'emoji' => '💛🤝',
            'prompt' => 'What is kindness?',
            'correct' => 'being nice and caring',
            'options' => [
                'being mean',
                'being nice and caring',
                'ignoring others',
                'taking things from others',
            ],
        ],
        [
            'emoji' => '📞💬',
            'prompt' => 'Which of these is an act of kindness?',
            'correct' => 'checking on a friend that you haven’t spoken to for a while',
            'options' => [
                'checking on a friend that you haven’t spoken to for a while',
                'making fun of others',
                'yelling at a friend',
                'ignoring a neighbour',
            ],
        ],
        [
            'emoji' => '😊💛',
            'prompt' => 'How do you feel when someone is kind to you?',
            'correct' => 'happy',
            'options' => [
                'sad',
                'happy',
                'angry',
                'scared',
            ],
        ],
        [
            'emoji' => '🙏💬',
            'prompt' => 'What can you say to be kind?',
            'correct' => '"Please and thank you."',
            'options' => [
                '"I don\'t like you."',
                '"Please and thank you."',
                '"Go away."',
                '"You can\'t play with us."',
            ],
        ],
        [
            'emoji' => '🚫🚗',
            'prompt' => 'Which of these is NOT a kind action?',
            'correct' => 'taking someone’s car without asking',
            'options' => [
                'feeding pets',
                'lending money',
                'showing gratitude',
                'taking someone’s car without asking',
            ],
        ],
        [
            'emoji' => '🐾🥣',
            'prompt' => 'How can you show kindness to animals?',
            'correct' => 'feeding and petting them',
            'options' => [
                'hurting them',
                'ignoring them',
                'feeding and petting them',
                'yelling at them',
            ],
        ],
        [
            'emoji' => '🧍🤲',
            'prompt' => 'If a friend falls down, what should you do?',
            'correct' => 'help them up',
            'options' => [
                'laugh at them',
                'help them up',
                'walk away',
                'take their place',
            ],
        ],
        [
            'emoji' => '🏠🧹',
            'prompt' => 'How can you be kind at home?',
            'correct' => 'helping with chores',
            'options' => [
                'helping with chores',
                'making a mess',
                'ignoring your family',
                'taking things without asking',
            ],
        ],
        [
            'emoji' => '✨😊',
            'prompt' => 'Why is it important to be kind?',
            'correct' => 'it helps everyone feel good',
            'options' => [
                'it makes everyone feel bad',
                'it helps everyone feel good',
                'it makes people angry',
                'it causes problems',
            ],
        ],
        [
            'emoji' => '🏘️🍽️',
            'prompt' => 'How can you show kindness to someone new in your neighbourhood?',
            'correct' => 'invite them for dinner',
            'options' => [
                'ignore them',
                'invite them for dinner',
                'disrespect them',
                'take their things',
            ],
        ],
        [
            'emoji' => '❤️🤲',
            'prompt' => 'Why should we be kind to others?',
            'correct' => 'because it feels good to help',
            'options' => [
                'because it’s fun to be mean',
                'because it feels good to help',
                'to make people sad',
                'to get what we want',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])