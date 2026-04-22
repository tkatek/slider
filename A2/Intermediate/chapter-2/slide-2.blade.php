<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'  => '🍽️',
            'badge'  => 'from-orange-500 to-red-500',
            'title'  => 'Traditional Foods',
            'description' => 'Identify and name traditional foods from different countries (e.g., couscous, sushi, tagine).',
        ],
        [
            'emoji'  => '👨‍🍳',
            'badge'  => 'from-emerald-500 to-teal-600',
            'title'  => 'Food Preparation',
            'description' => 'Describe how food is prepared using the passive voice: Couscous is eaten in Morocco.',
        ],
        [
            'emoji'  => '🧩',
            'badge'  => 'from-blue-500 to-indigo-600',
            'title'  => 'Present Simple Passive',
            'description' => 'Use the present simple passive structure correctly: is made / is eaten / is served.',
        ],
        [
            'emoji'  => '📖',
            'badge'  => 'from-fuchsia-500 to-violet-600',
            'title'  => 'Reading Understanding',
            'description' => 'Understand short texts about cultural foods and identify key details.',
        ],
        [
            'emoji'  => '✍️',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Passive Sentences',
            'description' => 'Produce simple spoken or written sentences using passive forms.',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])
