<?php
$content = [
    'type' => 'type3',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of today’s lesson, you can:',

    'objectives' => [
        [
            'emoji' => '',
            'title' => 'Apologize',
            'subtitle' => 'Use common expressions for apologizing like "I\'m sorry" and "I didn\'t mean to..."',
        ],
        [
            'emoji' => '',
            'title' => 'Respond',
            'subtitle' => 'Respond appropriately to apologies with phrases like "That\'s okay" and "No problem."',
        ],
        [
            'emoji' => '',
            'title' => 'Explain',
            'subtitle' => 'Explain simple mistakes politely using phrases like "I accidentally..." or "It was a misunderstanding."',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])