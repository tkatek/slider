<?php

$content = [
    'page_title' => 'Practice',
    'title'      => 'Practice 1',
    'subtitle'   => 'Fill in the gaps!',
    'hide_hints' => true,

    'questions' => [
        [
            'prefix'  => '📩 After the meeting, I’ll',
            'suffix'  => 'with the client to discuss the next steps.',
            'answers' => ['follow up'],
        ],
        [
            'prefix'  => '🤝 Building a strong',
            'suffix'  => 'with colleagues helps create a positive work environment.',
            'answers' => ['rapport', 'professional rapport'],
        ],
        [
            'prefix'  => '💼 The teams decided to',
            'suffix'  => 'on the new marketing campaign.',
            'answers' => ['collaborate'],
        ],
        [
            'prefix'  => '💡 That’s an',
            'suffix'  => 'observation; it really shows your understanding of the topic.',
            'answers' => ['insightful'],
        ],
        [
            'prefix'  => '🎤 Before the networking event, prepare a clear',
            'suffix'  => 'to introduce yourself professionally.',
            'answers' => ['elevator pitch'],
        ],
    ],
];

?>

@include('slider.game.type-correct-format', ['content' => $content])