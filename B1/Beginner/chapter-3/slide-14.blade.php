<?php

$content = [
    'page_title' => 'Writing',
    'title' => 'Writing',
    'subtitle' => 'Read & write the suitable response',
    'subtitle_2' => '',
    'label_header' => 'Situation',
    'input_header' => 'Apology',
    'rows' => [
        [
            'label' => 'broke a cup',
            'placeholder' => '. . . . . . . . . . . . . . . . . .',
        ],
        [
            'label' => 'forgot to water the plants.',
            'placeholder' => '. . . . . . . . . . . . . . . . . .',
        ],
        [
            'label' => 'arrived late at work',
            'placeholder' => '. . . . . . . . . . . . . . . . . .',
        ],
    ],
];

?>

@include('slider.other.writing-table', ['content' => $content])