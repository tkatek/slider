<?php
$content = [
    'type' => 'type4',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '🏠',
            'title' => 'Describe common roommate and friendship problems',
        ],
        [
            'emoji' => '😤',
            'title' => 'Use vocabulary for complaints and annoying habits',
        ],
        [
            'emoji' => '👥',
            'title' => 'Describe people’s behaviour using adjectives',
        ],
        [
            'emoji' => '🔁',
            'title' => 'Use always + present continuous to express annoyance',
        ],
        [
            'emoji' => '💬',
            'title' => 'Express opinions and complaints about shared living',
        ],
        [
            'emoji' => '🎭',
            'title' => 'Role-play everyday roommate situations naturally',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])