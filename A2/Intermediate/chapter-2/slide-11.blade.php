<?php
$content = [
    'page_title' => 'Practice 3',
    'title'      => 'Practice 3',
    'subtitle'   => 'Rewrite the sentences, Use the passive',
    'section_title' => 'Number 1 is done for you',
    'questions' => [
        [
            'number'      => 1,
            'prompt'      => 'They eat fruits.',
            'answer'      => 'Fruits are eaten by them.',
            'default_value' => 'Fruits are eaten by them.',
            'placeholder' => 'Fruits are eaten by them.',
            'revealed_answer' => 'Fruits are eaten by them.',
        ],
        [
            'number'      => 2,
            'prompt'      => 'French people eat croissants for breakfast.',
            'answer'      => 'Croissants are eaten by French people for breakfast.',
            'placeholder' => 'Croissants...',
        ],
        [
            'number'      => 3,
            'prompt'      => 'Americans eat burger.',
            'answer'      => 'Burger is eaten by Americans.',
            'placeholder' => 'Burger...',
        ],
        [
            'number'      => 4,
            'prompt'      => 'Egyptians eat Fool Medames for breakfast.',
            'answer'      => 'Fool Medames is eaten by Egyptians for breakfast.',
            'placeholder' => 'Fool Medames...',
        ],
        [
            'number'      => 5,
            'prompt'      => 'Moroccan people make couscous.',
            'answer'      => 'Couscous is made by Moroccan people.',
            'placeholder' => 'Couscous...',
        ],
    ],
];
?>

@include('slider.listening.listening-type-answer', ['content' => $content])
