<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, you will be able to:',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge'  => 'from-blue-500 to-blue-600',
            'title'  => '🗣️ Polite Language',
            'description' => 'Use polite expressions to check out of a hotel.',
        ],
        [
            'number' => '02',
            'badge'  => 'from-violet-500 to-violet-600',
            'title'  => '💳 Hotel Charges',
            'description' => 'Ask and answer questions about hotel charges.',
        ],
        [
            'number' => '03',
            'badge'  => 'from-emerald-500 to-teal-500',
            'title'  => '🔎 Reading Skills',
            'description' => 'Identify key details in a short hotel review.',
        ],
        [
            'number' => '04',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => '✍️ Writing Task',
            'description' => 'Write a structured hotel review (6–8 sentences).',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])