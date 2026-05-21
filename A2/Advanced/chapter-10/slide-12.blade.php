<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 4',
    'subtitle' => 'Choose the correct answer',

    'questions' => [
        [
            'emoji' => '🐶🔊',
            'prompt' => 'Which sentence uses keeps + verb-ing correctly?',
            'correct' => 'The dog keeps barking.',
            'options' => [
                'The dog keeps barking.',
                'The dog keep bark.',
                'The dog keeps barked.',
                'The dog is keep.',
            ],
        ],
        [
            'emoji' => '🙏💬',
            'prompt' => 'Which are polite request starters?',
            'correct' => 'Could you / Would you mind',
            'options' => [
                'Could you / Would you mind',
                'Do it now',
                'You must',
                'Do that now',
            ],
        ],
        [
            'emoji' => '🎵😣',
            'prompt' => 'Which sentence is a complaint?',
            'correct' => 'The music is too loud.',
            'options' => [
                'Turn the music down.',
                'The music is too loud.',
                'Music is louding.',
                'The music loudly.',
            ],
        ],
        [
            'emoji' => '🤝✅',
            'prompt' => 'Which is a response?',
            'correct' => 'I’ll do my best to help.',
            'options' => [
                'Can you be quieter?',
                'I’ll do my best to help.',
                'Could you turn the music down?',
                'You are annoying.',
            ],
        ],
        [
            'emoji' => '🙂🙏',
            'prompt' => 'Which option is the most polite?',
            'correct' => 'Would you mind waiting?',
            'options' => [
                'Would you mind waiting?',
                'Wait, I said.',
                'Just wait outside.',
                'Wait there, okay.',
            ],
        ],
        [
            'emoji' => '📢🏠',
            'prompt' => 'Which is a complaint?',
            'correct' => 'The music is too loud.',
            'options' => [
                'The music is too loud.',
                'I’ll speak with him.',
                'I will check the problem.',
                'I’ll look into the smell issue.',
            ],
        ],
        [
            'emoji' => '🚰💧',
            'prompt' => 'Which is grammatically correct?',
            'correct' => 'The tap keeps dripping.',
            'options' => [
                'The tap is keep.',
                'The tap keeps dripping.',
                'The tap keeps drip.',
                'The tap keep dripping.',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])