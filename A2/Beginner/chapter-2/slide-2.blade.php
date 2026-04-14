<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'  => '🌦️',
            'badge'  => 'from-orange-500 to-orange-600',
            'title'  => 'Name and describe the four seasons using simple weather adjectives',
            'description' => '(hot, cold, warm, cool)',
        ],
        [
            'emoji'  => '📈',
            'badge'  => 'from-amber-400 to-orange-500',
            'title'  => 'Compare seasons using comparatives',
            'description' => '👉 “Summer is hotter than spring.”',
        ],
        [
            'emoji'  => '❄️',
            'badge'  => 'from-orange-600 to-amber-500',
            'title'  => 'Identify and say the hottest and coldest seasons using superlatives',
            'description' => '👉 “Winter is the coldest season.”',
        ],
        [
            'emoji'  => '🏊',
            'badge'  => 'from-yellow-400 to-orange-400',
            'title'  => 'Talk about seasonal activities using the present simple',
            'description' => '👉 “I swim in summer.”',
        ],
        [
            'emoji'  => '❓',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Ask and answer simple questions about seasons',
            'description' => '👉 “What do you do in summer?”',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])
