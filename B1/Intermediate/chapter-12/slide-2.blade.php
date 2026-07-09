<?php
$content = [
    'type' => 'type1',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '🌍',
            'title' => 'Define open-mindedness and explain why it is an important human value.',
        ],
        [
            'emoji' => '👀',
            'title' => 'Identify open-minded and close-minded behaviours in everyday situations.',
        ],
        [
            'emoji' => '🗣️',
            'title' => 'Use vocabulary, collocations, and verb + preposition + gerund structures related to open-mindedness accurately in speaking and writing.',
        ],
        [
            'emoji' => '💬',
            'title' => 'Express and justify opinions respectfully using appropriate language.',
        ],
        [
            'emoji' => '🤔',
            'title' => 'Recognize the value of considering different viewpoints before making judgments.',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Write an 80–100-word paragraph about a situation where being open-minded helped someone learn or grow.',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])