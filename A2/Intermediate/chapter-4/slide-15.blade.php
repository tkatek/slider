<?php
$content = [
    'page_title' => 'Quick Wrap-up',
    'title'      => 'Quick Wrap-up',
    'subtitle'   => 'Fill in with the missing suitable reflexive pronoun',
    'grid_class' => 'grid-cols-1',

    'instruction'      => 'Use the correct form of verbs',
    'instruction_note' => '',

    'lines' => [
        [
            'speaker' => '1',
            'parts'  => [
                ['text' => "What's wrong with your finger? Did you cut "],
                [
                    'blank' => true,
                    'answer' => 'yourself',
                    'answers' => ['yourself'],
                ],
                ['text' => '?'],
            ],
        ],
        [
            'speaker' => '2',
            'parts'  => [
                ['text' => 'I '],
                [
                    'blank' => true,
                    'answer' => 'was having',
                    'answers' => ['was having'],
                    'placeholder' => 'have',
                ],
                ['text' => ' lunch in a cafe yesterday when the server accidentally '],
                [
                    'blank' => true,
                    'answer' => 'spilled',
                    'answers' => ['spilled'],
                    'placeholder' => 'spill',
                ],
                ['text' => ' tomato sauce on my shirt.'],
            ],
        ],
    ],
];
?>

@include('slider.game.listening-missing-word', ['content' => $content])