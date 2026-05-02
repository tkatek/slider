<?php
$content = [
    'page_title' => 'Practice 6: Speaking Time!',
    'title'      => 'Practice 6: Speaking Time!',
    'subtitle'   => 'Say the missing word!',
    'question_prompt' => '',
    'mode'       => 'caption',
    'grid_class' => 'grid-cols-2 md:grid-cols-4',
    'choices_per_question' => 8,
    'center_page' => true,

    'items' => [
        [
            'key'     => 'back-1',
            'text'    => 'back',
            'caption' => 'I will get ........ to you shortly.',
        ],
        [
            'key'     => 'back-2',
            'text'    => 'back',
            'caption' => 'I will call you ........ on Thursday.',
        ],
        [
            'key'     => 'cant',
            'text'    => "can't",
            'caption' => "I ........ connect to the internet.",
        ],
        [
            'key'     => 'on',
            'text'    => 'on',
            'caption' => "Hang ........, I'll move somewhere else.",
        ],
        [
            'key'     => 'repeat',
            'text'    => 'repeat',
            'caption' => 'Can you ........ that again?',
        ],
        [
            'key'     => 'too',
            'text'    => 'too',
            'caption' => 'The connection is ........ slow.',
        ],
        [
            'key'     => 'up',
            'text'    => 'up',
            'caption' => "You're breaking ........",
        ],
    ],
];
?>

@include('slider.game.image-guess-who', ['content' => $content])
