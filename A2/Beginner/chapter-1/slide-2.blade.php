<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'  => '☁️',
            'badge'  => 'from-orange-500 to-orange-600',    
            'title'  => 'Weather Vocabulary',
            'description' => 'Use basic weather vocabulary.',
        ],
        [
            'emoji'  => '❓',
            'badge'  => 'from-amber-400 to-orange-500',
            'title'  => 'Weather Questions',
            'description' => 'Ask and answer: What’s the weather like?',
        ],
        [
            'emoji'  => '🌦️',
            'badge'  => 'from-orange-600 to-amber-500',
            'title'  => 'Weather Descriptions',
            'description' => 'Describe weather: It’s + adjective.',
        ],
        [
            'emoji'  => '📻',
            'badge'  => 'from-yellow-400 to-orange-400',
            'title'  => 'Weather Reports',
            'description' => 'Understand short weather reports.', 
        ],
        [
            'emoji'  => '🍂',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Seasons & Activities',
            'description' => 'Talk about seasons and activities.',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])
