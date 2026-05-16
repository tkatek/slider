<?php

$content = [
    'page_title' => 'Practice',
    'title'      => 'Practice 1',
    'subtitle'   => 'Fill in the gaps!',
    'hide_hints' => true,

    'questions' => [
        [
            'prefix'  => '🗣️ During the class',
            'suffix'  => 'students discussed the topic in a structured way.',
            'answers' => ['debate'],
        ],
        [
            'prefix'  => '🛡️ She tried to',
            'suffix'  => 'her opinion using clear examples.',
            'answers' => ['defend'],
        ],
        [
            'prefix'  => '📌 He made a strong',
            'suffix'  => "but he didn't support it with facts.",
            'answers' => ['claim'],
        ],
        [
            'prefix'  => '↩️ The speaker gave a clear',
            'suffix'  => 'to respond to the opposing argument.',
            'answers' => ['rebuttal'],
        ],
        [
            'prefix'  => '⚖️ It’s important to avoid',
            'suffix'  => 'and stay fair during discussions.',
            'answers' => ['bias', 'being biased'],
        ],
    ],
];

?>

@include('slider.game.type-correct-format', ['content' => $content])