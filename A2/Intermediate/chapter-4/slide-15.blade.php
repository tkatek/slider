<?php
$content = [
    'page_title' => 'Quick Wrap-up',
    'title'      => 'Quick Wrap-up',
    'subtitle'   => 'Fill in with the missing suitable reflexive pronoun<br>Use the correct form of verbs',
    'grid_class' => 'grid-cols-1',

    'items' => [
        [
            'number' => 1,
            'parts'  => [
                ['text' => "What's wrong with your finger? Did you cut "],
                ['answer' => 'yourself'],
                ['text' => '?'],
            ],
        ],
        [
            'number' => 2,
            'parts'  => [
                ['text' => 'I '],
                ['answer' => 'was having', 'placeholder' => 'have'],
                ['text' => ' lunch in a cafe yesterday when the server accidentally '],
                ['answer' => 'spilled', 'placeholder' => 'spill'],
                ['text' => ' tomato sauce on my shirt.'],
            ],
        ],
    ],
];
?>

@include('slider.game.image-missing-words', ['content' => $content])
