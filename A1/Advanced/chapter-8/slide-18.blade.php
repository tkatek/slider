<?php
$content = [
    'page_title' => 'Writing',
    'title' => 'Writing',
    'subtitle' => 'Describe your own area or neighbourhood.',
    'subtitle_2' => 'Fill in the missing information about your neighbourhood. Use the prompts provided',
    'rows' => [
        [
            'label' => 'Places in my area',
            'placeholder' => 'There is / are ...',
        ],
        [
            'label' => 'Adjectives describing my area',
            'placeholder' => 'It is ...',
        ],
        [
            'label' => 'Negative/positive things about my area',
            'placeholder' => 'There is / are ...',
        ],
        [
            'label' => 'Overall opinion',
            'placeholder' => "It's ...",
        ],
    ],
];
?>

@include('slider.other.writing-table', ['content' => $content])
