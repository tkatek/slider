<?php
$content = [
    'page_title' => 'Discussion',

    'title'      => 'Discussion',
    'subtitle'   => 'Let’s have a Discussion',

    'cards_grid' => 'grid-cols-1',

    'outcomes' => [
        [
            'number' => '01',
            'badge' => 'from-indigo-500 to-indigo-600',
            'title' => 'Question 1',
            'description' => 'Was your stay good or bad?',
            'image' => materialAsset('slider/A1/Advanced/chapter-3/img/discussion.webp'),
        ],
        [
            'number' => '02',
            'badge' => 'from-blue-500 to-blue-600',
            'title' => 'Question 2',
            'description' => 'What makes a hotel stay perfect?',
            'image' => materialAsset('slider/A1/Advanced/chapter-3/img/slide3/double-room.webp'),
        ],
    ],
];
?>
@include('slider.objectives.objectives-images', ['content' => $content])