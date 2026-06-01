<?php

$content = [
    'page_title' => 'Writing',
    'title'      => 'Writing',
    'subtitle'   => 'Write polite requests for these situations. Use the language from the lesson.',

    'rows' => [
        [
            'label'       => 'You want your friend to help you study for a test.',
            'placeholder' => '',
        ],
        [
            'label'       => 'You want your neighbour to take care of your cat.',
            'placeholder' => '',
        ],
        [
            'label'       => 'You want your classmate to lend you a book.',
            'placeholder' => '',
        ],
        [
            'label'       => 'You want your brother / sister to do the dishes.',
            'placeholder' => '',
        ],
        [
            'label'       => 'You want your colleague to cover your shift.',
            'placeholder' => '',
        ],
    ],
];

?>

@include('slider.other.writing-table', ['content' => $content])