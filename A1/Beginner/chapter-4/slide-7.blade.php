<?php
$content = [
    'uid' => 'practice_' . substr(md5(uniqid('', true)), 0, 10),
    'type'=>'emoji',
    'title'    => 'Let’s do some practice!',
    'subtitle' => '',

    'questions'=> [
        [
            'emoji'     => '👧👨‍👩‍👧',
            'prompt'  => 'My brother’s daughter is my…',
            'correct' => 'niece',
            'options' => ['son', 'niece', 'nephew']
        ],
        [
            'emoji'     => '👵❤️',
            'prompt'  => 'My mother’s mother is my…',
            'correct' => 'grandmother',
            'options' => ['great aunt', 'aunt', 'grandmother']
        ],
        [
            'emoji'     => '👨‍👩‍👧‍👧',
            'prompt'  => 'My father’s daughter is my…',
            'correct' => 'sister',
            'options' => ['aunt', 'sister', 'grandmother']
        ],
        [
            'emoji'     => '👫🧩',
            'prompt'  => 'My aunt’s children are my…',
            'correct' => 'cousins',
            'options' => ['sons', 'brothers', 'cousins']
        ],
        [
            'emoji'     => '💍👩‍🦰',
            'prompt'  => 'My sister’s husband is my…',
            'correct' => 'brother-in-law',
            'options' => ['uncle', 'stepfather', 'brother-in-law']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
