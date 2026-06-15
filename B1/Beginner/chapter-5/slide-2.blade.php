<?php
$content = [
    'type' => 'type1',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '🌊',
            'title' => 'Identify And Use Vocabulary Related To Seaside Entertainment And Beach Activities',
        ],
        [
            'emoji' => '🏖️',
            'title' => 'Describe Seaside Activities Using The Present Simple And Present Continuous Tenses',
        ],
        [
            'emoji' => '❓',
            'title' => 'Ask And Answer Questions About Beach Activities, Vacations, And Free-Time Interests',
        ],
        [
            'emoji' => '🎬',
            'title' => 'Understand The Main Ideas And Specific Details From A Video And A Listening About Seaside Entertainment',
        ],
        [
            'emoji' => '⭐',
            'title' => 'Express Opinions And Preferences About Seaside Activities And Modern Entertainment',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Write A Short Paragraph About A Day At The Seaside Using Appropriate Seaside Vocabulary And Target Grammar',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])