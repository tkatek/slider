<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'outcomes' => [
        [
            'label' => 'Shopping Items',
            'text'  => 'Name common shopping items. 🛒🥫🍎',
        ],
        [
            'label' => 'Item Description',
            'text'  => 'Describe items using size, colour, and material. 📏🎨🧵',
        ],
        [
            'label' => 'Demonstratives',
            'text'  => 'Use this / that / these / those correctly. 👉👈',
        ],
        [
            'label' => 'Prices & Stores',
            'text'  => 'Ask about price and different types of stores. 💶🏪🛍️',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])