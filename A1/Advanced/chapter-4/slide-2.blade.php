<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge'  => 'from-blue-500 to-blue-600',
            'title'  => '🗣️ Polite Requests',
            'description' => 'Use can / could to make polite requests.',
        ],
        [
            'number' => '02',
            'badge'  => 'from-violet-500 to-violet-600',
            'title'  => '💬 Asking Prices',
            'description' => 'Ask questions using How much...?',
        ],
        [
            'number' => '03',
            'badge'  => 'from-emerald-500 to-teal-500',
            'title'  => '🧭 Giving Directions',
            'description' => 'Use simple imperatives to give directions.',
        ],
        [
            'number' => '04',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => '🚕 Taxi Role-Play',
            'description' => 'Role-play a taxi conversation using correct grammar and vocabulary.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])