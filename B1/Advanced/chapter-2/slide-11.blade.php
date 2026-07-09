<?php
$content = [
    'title' => 'Drag and drop',
    'subtitle' => 'Sort the expressions by degree of certainty.',

    'categories' => [
        'Absolutely Certain' => [
            'emoji' => '💯',
            'items' => [
                'Of course!',
                'Definitely!',
                'I’m a hundred percent certain.',
                'I have no doubt about it.',
                'No chance!',
                'Absolutely certain',
            ],
        ],

        'Almost Certain' => [
            'emoji' => '✅',
            'items' => [
                'It’s not very likely.',
                'It’s doubtful.',
                'I doubt it.',
                'I don’t think so.',
                'Almost certain',
            ],
        ],

        'Not Certain' => [
            'emoji' => '🤔',
            'items' => [
                'Not certain',
                'Anything’s possible.',
                'Perhaps.',
                'He might do.',
                'No one can know for certain.',
                'I’m not sure.',
                'I can’t tell you for sure.',
            ],
        ],
    ],
];
?>

@include('slider.game.drag-and-drop', ['content' => $content])