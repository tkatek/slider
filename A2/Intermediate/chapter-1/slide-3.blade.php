<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'  => '👋',
            'badge'  => 'from-blue-500 to-blue-600',
            'title'  => 'Greeting Customs',
            'description' => 'Describe greeting customs using: People greet each other by + verb-ing.',
        ],
        [
            'emoji'  => '🌍',
            'badge'  => 'from-emerald-500 to-teal-600',
            'title'  => 'Cultural Vocabulary',
            'description' => 'Identify 6–8 cultural vocabulary items.',
        ],
        [
            'emoji'  => '🎭',
            'badge'  => 'from-fuchsia-500 to-violet-600',
            'title'  => 'Different Cultures',
            'description' => 'Read about different cultures and customs using “famous for”.',
        ],
        [
            'emoji'  => '📖',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Reading Understanding',
            'description' => 'Show understanding of a short reading text with 80% accuracy.',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])
