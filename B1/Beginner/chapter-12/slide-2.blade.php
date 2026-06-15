<?php
$content = [
    'type' => 'type1',

    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '✅',
            'title' => 'Recognize and use should have + past participle.',
        ],
        [
            'emoji' => '💭',
            'title' => 'Talk about mistakes and regrets in the past.',
        ],
        [
            'emoji' => '💡',
            'title' => 'Give advice about past situations.',
        ],
        [
            'emoji' => '❓',
            'title' => 'Discuss what people should or shouldn\'t have done.',
        ],
        [
            'emoji' => '🧩',
            'title' => 'Participate in problem-solving discussions.',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Write about a past mistake and what they should have done differently.',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])