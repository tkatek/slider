<?php
$content = [
    'page_title' => '',
    'title' => 'Complete the sentences about people you know.',
    'subtitle' => '',
    'subtitle_2' => '',

    'rows' => [
        [
            'label' => 'I have a friend who',
            'placeholder' => '...',
        ],
        [
            'label' => 'I know someone who',
            'placeholder' => '...',
        ],
        [
            'label' => 'I admire people who',
            'placeholder' => '...',
        ],
        [
            'label' => "I don't enjoy spending time with people who",
            'placeholder' => '...',
        ],
        [
            'label' => 'A good friend is someone who',
            'placeholder' => '...',
        ],
    ],
];
?>

@include('slider.other.writing-table', ['content' => $content])