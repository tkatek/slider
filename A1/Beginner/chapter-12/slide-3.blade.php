<?php
$content = [
    'page_title' => 'Lesson Objectives',
    'title' => 'Lesson Objectives',
    'subtitle' => 'What We Will Learn Today',
    'top_badge' => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1',
    'outcomes' => [
        [
            'number' => '01',
            'badge' => 'from-blue-500 to-blue-600',
            'title' => 'Understanding Utility Bills',
            'description' => 'Utility bills are important documents. They show how much you owe for services like electricity and water each month.',
            'image' => materialAsset('slider/A1/Beginner/chapter-12/img/bill.webp'),
        ],
        [
            'number' => '02',
            'badge' => 'from-violet-500 to-violet-600',
            'title' => 'Basic Banking Vocabulary',
            'description' => 'Learning key banking terms helps you navigate finances. Knowing words like ATM and deposit is essential for managing your money.',
            'image' => materialAsset('slider/A1/Beginner/chapter-12/img/banking.webp'),
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])