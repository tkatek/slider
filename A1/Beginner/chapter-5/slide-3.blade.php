<?php
$content = [
    'uid' => 'practice_' . substr(md5(uniqid('', true)), 0, 10),

    'questions'=> [
        [
            'img'     => '👵',
            'prompt'  => "Who is your mother's mother?",
            'correct' => 'grandmother',
            'options' => ['cousin', 'grandmother', 'sister', 'aunt'],
        ],
        [
            'img'     => '💍👩',
            'prompt'  => "Who’s your brother’s wife?",
            'correct' => 'sister-in-law',
            'options' => ['mother', 'aunt', 'daughter', 'sister-in-law'],
        ],
        [
            'img'     => '👧👦',
            'prompt'  => "Who is your aunt’s daughter?",
            'correct' => 'cousin',
            'options' => ['cousin', 'niece', 'nephew', 'son'],
        ],
        [
            'img'     => '👨',
            'prompt'  => "Who is your cousin’s father?",
            'correct' => 'uncle',
            'options' => ['brother', 'nephew', 'uncle', 'father'],
        ],
        [
            'img'     => '👶',
            'prompt'  => "Who is your son’s daughter?",
            'correct' => 'grandchild',
            'options' => ['nephew', 'niece', 'son', 'grandchild'],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])