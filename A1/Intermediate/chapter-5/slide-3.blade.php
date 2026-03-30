<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of today’s lesson, you can:',

    'outcomes' => [
        [
            'label' => 'Ask for medicine',
            'text'  => 'Ask for medicine at a pharmacy. 💊🏪',
        ],
        [
            'label' => 'Describe symptoms',
            'text'  => 'Describe your symptoms. 🤒🗣️',
        ],
        [
            'label' => 'Dosage instructions',
            'text'  => 'Understand dosage instructions. 🧾⏱️',
        ],
        [
            'label' => 'Price & duration',
            'text'  => 'Ask about price and duration. 💰📅',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])