<?php
$content = [
    'type' => 'type2',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '🎬',
            'title' => 'Talk About Entertainment Preferences Using Expressions Like Like, Love, And Prefer',
        ],
        [
            'emoji' => '🎵',
            'title' => 'Use Vocabulary Related To Movies, Music, And Entertainment',
        ],
        [
            'emoji' => '❓',
            'title' => 'Ask And Answer Questions About Films, Shows, And Free-Time Activities',
        ],
        [
            'emoji' => '⭐',
            'title' => 'Express Opinions About Movies Using Adjectives And Opinion Phrases',
        ],
        [
            'emoji' => '✨',
            'title' => 'Use -ed And -ing Adjectives Correctly',
        ],
        [
            'emoji' => '👂',
            'title' => 'Understand Simple Listening And Reading Texts About Entertainment',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Write A Short Review With Opinions And Recommendations',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])