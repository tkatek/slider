<?php
$content = [
    'page_title' => 'Writing',
    'title' => 'Writing',
    'subtitle' => 'My Last Weekend',
    'subtitle_2' => 'Complete the table :',
    'rows' => [
        [
            'label' => 'Where did you go?',
            'placeholder' => '__________',
        ],
        [
            'label' => 'What did you do?',
            'placeholder' => '__________',
        ],
        [
            'label' => 'Who were you with?',
            'placeholder' => '__________',
        ],
        [
            'label' => 'Did you enjoy it?',
            'placeholder' => '__________',
        ],
    ],
];
?>

@include('slider.other.writing-table', ['content' => $content])