<?php
$content = [
    'page_title' => 'Lesson Objectives',

    'title'      => 'Lesson Objectives',
    'subtitle'   => 'By the end of this lesson, you can:',
    'top_badge'  => '🎯 Lesson Goals',

    // control cards grid from content
    'cards_grid' => 'grid-cols-1',

    'outcomes' => [
        [
            'number' => '01',
            'badge' => 'from-blue-500 to-blue-600',
            'title' => 'Speak about yourself confidently',
            'description' => 'You will answer common job interview questions.',
            'image' => materialAsset('slider/A1/Beginner/chapter-3/img/outcome-1.webp'),
        ],
        [
            'number' => '02',
            'badge' => 'from-violet-500 to-violet-600',
            'title' => 'Practice real conversation',
            'description' => 'You will participate in a guided role-play interview.',
            'image' => materialAsset('slider/A1/Beginner/chapter-3/img/outcome-2.webp'),
        ],
    ],
];
?>
@include('slider.objectives.objectives-images', ['content' => $content])