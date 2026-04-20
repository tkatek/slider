<?php
$content = [
    'page_title' => 'Writing',
    'title' => 'Writing',
    'subtitle' => '“My Last Holiday”',
    'subtitle_2' => 'Step 1: Plan Your Ideas, Complete the table:',
    'rows' => [
        [
            'label' => 'Where did you go?',
            'placeholder' => '__________',
        ],
        [
            'label' => 'Who did you go with?',
            'placeholder' => '__________',
        ],
        [
            'label' => 'What did you do?',
            'placeholder' => '__________',
        ],
        [
            'label' => 'How was the place?',
            'placeholder' => '__________',
        ],
        [
            'label' => 'What didn’t you like?',
            'placeholder' => '__________',
        ],
    ],
];
?>

@include('slider.other.writing-table', ['content' => $content])