<?php
$content = [
    'page_title' => 'Irregular Verbs',
    'title' => 'Irregular Verbs',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1',

    'cards' => [
        [
            'type' => 'table',
            'title' => '',
            'title_plain' => true,
            'tone' => 'from-rose-400 to-red-500',
            'table_headers' => ['Base Verb', 'Past Simple', 'Past Participle'],
            'table_rows' => [
                ['go', 'went', 'gone'],
                ['eat', 'ate', 'eaten'],
                ['see', 'saw', 'seen'],
                ['write', 'wrote', 'written'],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
