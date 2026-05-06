<?php
$content = [
    'page_title' => 'Practice 6',
    'title' => 'Practice 6',
    'subtitle' => '',
    'activity_title' => 'Read & Match the sentences',
    'left_label' => 'Sentences',
    'right_label' => 'Replies',

    'pairs' => [
        [
            'id' => 'question-evening',
            'left' => [
                'type' => 'word',
                'text' => 'Hi Mike! What were you doing yesterday evening?',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Let me think ... why?',
            ],
        ],
        [
            'id' => 'missed-call',
            'left' => [
                'type' => 'word',
                'text' => 'I tried to phone you? But you didn’t answer the phone.',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'No, sorry, I didn’t. So, what were you doing after you couldn’t phone me?',
            ],
        ],
        [
            'id' => 'how-come',
            'left' => [
                'type' => 'word',
                'text' => 'Oh really? How come?',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'My bike had a flat tyre and so I had to find the reason for it.',
            ],
        ],
        [
            'id' => 'mobile-phone',
            'left' => [
                'type' => 'word',
                'text' => 'I see, and you didn’t have your mobile phone around?',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'Now I know: I was fixing the inner tube of my new bike.',
            ],
        ],
        [
            'id' => 'fixing-bike',
            'left' => [
                'type' => 'word',
                'text' => 'You won’t believe it: I was fixing my bike!',
            ],
            'right' => [
                'type' => 'word',
                'text' => '🤣 Haha 🤣, we were both doing the same thing at the same time!',
            ],
        ],
        [
            'id' => 'same-problem',
            'left' => [
                'type' => 'word',
                'text' => 'Yes, I had the same problem with the tyre as you!',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'You too? What a coincidence!',
            ],
        ],
    ],

    'right_order' => [
        'same-problem',
        'question-evening',
        'fixing-bike',
        'how-come',
        'mobile-phone',
        'missed-call',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])
