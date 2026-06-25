<?php
$content = [
    'type' => 'type1',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '📱',
            'title' => 'Use 8–10 vocabulary items related to influencers and social media accurately.',
        ],
        [
            'emoji' => '⏳',
            'title' => 'Identify and use Present Perfect and Past Simple in context.',
        ],
        [
            'emoji' => '🎧',
            'title' => 'Understand key information from a reading and listening text about influencers.',
        ],
        [
            'emoji' => '💬',
            'title' => 'Express opinions about influencer marketing and support ideas with reasons.',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Write an 80–100 word paragraph about an influencer using both tenses correctly.',
        ],
        [
            'emoji' => '⚖️',
            'title' => 'Participate in discussions about the positive and negative effects of influencers.',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])