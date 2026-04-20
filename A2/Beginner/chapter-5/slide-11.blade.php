<?php
$content = [
    'page_title' => 'Grammar 2',
    'title' => 'Grammar 2',
    'subtitle' => 'Verb to “be” in the present & past',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-2',

    'cards' => [
        [
            'type' => 'table',
            'title' => 'Present form of verb to “be”',
            'title_plain' => true,
            'tone' => 'from-teal-500 to-cyan-600',
            'table_headers' => ['Pronoun', 'Affirmative', 'Negative', 'Question'],
            'table_rows' => [
                ['I', 'I am happy', 'I am not (amn’t ❌)', 'Am I happy?'],
                ['You', 'You are happy', 'You are not (aren’t)', 'Are you happy?'],
                ['He', 'He is happy', 'He is not (isn’t)', 'Is he happy?'],
                ['She', 'She is happy', 'She is not (isn’t)', 'Is she happy?'],
                ['It', 'It is nice', 'It is not (isn’t)', 'Is it nice?'],
                ['We', 'We are happy', 'We are not (aren’t)', 'Are we happy?'],
                ['They', 'They are happy', 'They are not (aren’t)', 'Are they happy?'],
            ],
        ],
        [
            'type' => 'table',
            'title' => 'Past form of verb to “be”',
            'title_plain' => true,
            'tone' => 'from-rose-400 to-red-500',
            'table_headers' => ['Pronoun', 'Affirmative', 'Negative', 'Question'],
            'table_rows' => [
                ['I', 'I was happy', 'I was not (wasn’t)', 'Was I happy?'],
                ['You', 'You were happy', 'You were not (weren’t)', 'Were you happy?'],
                ['He', 'He was happy', 'He was not (wasn’t)', 'Was he happy?'],
                ['She', 'She was happy', 'She was not (wasn’t)', 'Was she happy?'],
                ['It', 'It was nice', 'It was not (wasn’t)', 'Was it nice?'],
                ['We', 'We were happy', 'We were not (weren’t)', 'Were we happy?'],
                ['They', 'They were happy', 'They were not (weren’t)', 'Were they happy?'],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])