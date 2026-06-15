<?php
$content = [
    'type' => 'type4',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '🏠',
            'title' => 'Classify and use vocabulary related to indoor and outdoor activities',
        ],
        [
            'emoji' => '💬',
            'title' => "Express preferences about leisure activities using phrases such as I prefer, I enjoy, I like, and I'm more of a ... person",
        ],
        [
            'emoji' => '❓',
            'title' => 'Ask and answer questions about indoor and outdoor activities using appropriate conversational language',
        ],
        [
            'emoji' => '👂',
            'title' => 'Identify the main ideas and specific details in a short conversation about activity preferences',
        ],
        [
            'emoji' => '🚴',
            'title' => 'Use common activity collocations correctly, such as go cycling, play board games, and do yoga',
        ],
        [
            'emoji' => '🌳',
            'title' => 'Distinguish between indoor/indoors and outdoor/outdoors in context',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Write a short paragraph describing their preferred activities and explaining the reasons for their choices',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])