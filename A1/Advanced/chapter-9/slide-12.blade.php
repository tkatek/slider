<?php
$content = [
    'title' => 'New Language',
    'subtitle' => 'Relative pronoun: “where”',

    'cards' => [
        [
            'type' => 'question',
            'title' => 'What is a library?',
            'tone' => 'from-sky-400 to-blue-500',
            'card_class' => 'md:col-span-2',
            'answer' => 'A library is a place where we read books.',
            'highlight_word' => 'where',
        ],
        [
            'type' => 'sections',
            'title' => 'Structure',
            'tone' => 'from-blue-400 to-indigo-500',
            'card_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="hl-gold">Place + where + subject + verb</span>',
                        'Example:',
                        'A mosque is a place where people pray.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Where',
            'tone' => 'from-purple-400 to-violet-500',
            'card_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        'Where is a relative pronoun / relative adverb used to <span class="hl-gold">refer to a place.</span>',
                        'It gives more <span class="hl-gold">information</span> about a <span class="hl-gold">location.</span>',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
