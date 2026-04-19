<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 4',
    'subtitle' => 'Read & choose the right answer',

    'questions' => [
        [
            'emoji'   => '⏰☀️',
            'prompt'  => 'I _____ up early.',
            'correct' => 'got',
            'options' => ['get', 'got', 'gets'],
        ],
        [
            'emoji'   => '🍳👩',
            'prompt'  => 'I _____ breakfast for my mum.',
            'correct' => 'made',
            'options' => ['made', 'make', 'makes'],
        ],
        [
            'emoji'   => '📚✍️',
            'prompt'  => 'I _____ my homework.',
            'correct' => 'did',
            'options' => ['do', 'did', 'done'],
        ],
        [
            'emoji'   => '📺🎬',
            'prompt'  => 'I _____ my favorite film/cartoon on TV.',
            'correct' => 'saw',
            'options' => ['see', 'saw', 'seen'],
        ],
        [
            'emoji'   => '📩👫',
            'prompt'  => 'I _____ a message to my classmates.',
            'correct' => 'wrote',
            'options' => ['wrote', 'write', 'written'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])