<?php

$content = [
    'type' => 'reading',

    'page_title' => 'Reading Comprehension',
    'title'      => 'Reading Comprehension',
    'subtitle'   => 'Read & answer the questions',


    'passage' => "People sometimes make mistakes and hurt others without meaning to. When this happens, it is important to apologize and try to fix the problem. A good apology means understanding how the other person feels and showing that we are sorry through our actions, not only our words.

For example, if someone accidentally damages a friend’s things, they should admit the mistake, say sorry, and try to help. This can make the other person feel respected and understood.

Forgiveness is also important. Forgiving someone means letting go of anger or sadness after they apologize. It does not mean forgetting what happened, but it helps people feel better and move on.

Everyone makes mistakes sometimes. The important thing is to learn from them, act respectfully, and try to do better in the future.",



    'questions' => [
        [
            'prompt'  => 'Why is it important to apologize after making a mistake?',
            'correct' => 'To show we are sorry and try to fix the problem',
            'options' => [
                'To ignore the problem',
                'To show we are sorry and try to fix the problem',
                'To blame someone else',
            ],
        ],
        [
            'prompt'  => 'How can forgiveness help people feel better?',
            'correct' => 'It helps people let go of anger or sadness and move on',
            'options' => [
                'It helps people stay angry',
                'It helps people let go of anger or sadness and move on',
                'It makes people forget everything immediately',
            ],
        ],
        [
            'prompt'  => 'What should people do after making a mistake?',
            'correct' => 'Apologize and try to fix it',
            'options' => [
                'Ignore the problem',
                'Apologize and try to fix it',
                'Blame someone else',
            ],
        ],
        [
            'prompt'  => 'What does forgiveness mean?',
            'correct' => 'Letting go of anger or sadness',
            'options' => [
                'Staying angry forever',
                'Forgetting everything immediately',
                'Letting go of anger or sadness',
            ],
        ],
        [
            'prompt'  => 'A good apology means understanding the other person’s . . . . . . . .',
            'correct' => 'feelings',
            'options' => [
                'words',
                'feelings',
                'mistakes',
            ],
        ],
        [
            'prompt'  => 'Forgiveness helps people move . . . . . . . .',
            'correct' => 'on',
            'options' => [
                'back',
                'away',
                'on',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])