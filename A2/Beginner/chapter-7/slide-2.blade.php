<?php
$content = [
    'page_title' => 'Learning Objectives',
    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge' => 'from-blue-500 to-indigo-600',
            'title' => 'Describe physical appearance',
            'description' => 'Describe people\'s physical appearance using simple adjectives </br> (tall, short, thin, curly hair, etc.).',
        ],
        [
            'number' => '02',
            'badge' => 'from-violet-500 to-purple-600',
            'title' => 'Use verb to be for appearance',
            'description' => 'Use verb to "be" to describe appearances: </br> (He is tall).',
        ],
        [
            'number' => '03',
            'badge' => 'from-emerald-500 to-teal-500',
            'title' => 'Ask and answer appearance questions',
            'description' => 'Ask and answer questions about appearance </br> (What does she look like?).',
        ],
        [
            'number' => '04',
            'badge' => 'from-amber-500 to-orange-500',
            'title' => 'Listen for key details',
            'description' => 'Listen for key details about people\'s appearance.',
        ],
        [
            'number' => '05',
            'badge' => 'from-rose-500 to-pink-600',
            'title' => 'Speak in short sentences',
            'description' => 'Speak in short sentences to describe a person </br> (2-3 sentences).',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])
