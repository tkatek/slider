<?php
$content = [
    'page_title' => '',
    'title' => 'Practice 2',
    'subtitle' => 'Watch the video again, read the script, and find examples of:',
    'subtitle_2' => '',

    'rows' => [
        [
            'label' => 'who',
            'placeholder' => '...',
        ],
        [
            'label' => 'that',
            'placeholder' => '...',
        ],
        [
            'label' => 'which',
            'placeholder' => '...',
        ],
        [
            'label' => 'where',
            'placeholder' => '...',
        ],
        [
            'label' => 'when',
            'placeholder' => '...',
        ],
    ],
];
?>

@include('slider.other.writing-table', ['content' => $content])