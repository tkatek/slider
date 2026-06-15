<?php
$content = [

    'title' => 'Practice 4',
    'subtitle' => '',
    'activity_title' => 'Match the sentence halves.',
    'left_label' => 'A',
    'right_label' => 'B',

    'pairs' => [
        [
            'id' => 'd',
            'left' => [
                'type' => 'word',
                'text' => 'I would have been able to get some money out',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'if I hadn’t forgotten my PIN number.',
            ],
        ],
        [
            'id' => 'e',
            'left' => [
                'type' => 'word',
                'text' => 'If you hadn’t waited until the sales,',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'you’d have paid more for your skirt.',
            ],
        ],
        [
            'id' => 'b',
            'left' => [
                'type' => 'word',
                'text' => 'Wendy wouldn’t have lent him the money',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'if she’d known he wasn’t going to pay her back.',
            ],
        ],
        [
            'id' => 'a',
            'left' => [
                'type' => 'word',
                'text' => 'She would have had a coffee',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'if she’d had some small change for the machine.',
            ],
        ],
        [
            'id' => 'c',
            'left' => [
                'type' => 'word',
                'text' => 'If we’d saved some money,',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'we’d have been able to afford a new car.',
            ],
        ],
        [
            'id' => 'f',
            'left' => [
                'type' => 'word',
                'text' => 'If she hadn’t had the receipt,',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'she wouldn’t have got a refund on the trousers.',
            ],
        ],
    ],

    'right_order' => [
        'a',
        'b',
        'c',
        'd',
        'e',
        'f',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])